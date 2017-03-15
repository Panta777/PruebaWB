<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Puntos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function get_puntos() {
        $this->db->select("P.id_punto AS punto,
            cadena, 
            direccion, 
            latitud,
            longitud,
            departamento,
            horario, PS.id_servicio,
            (SELECT group_concat(nombre) FROM servicios Ser INNER JOIN punto_servicio pu ON pu.id_servicio = Ser.id WHERE pu.id_punto = P.id_punto) as nombre_servicio");

        $this->db->from("puntos P");
        $this->db->join("punto_servicio PS ", "PS.id_punto = P.id_punto", "left");
        $this->db->join("servicios S ", "PS.id_servicio = S.id", "left");

        $this->db->group_by('PS.id_punto');

        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->result_array();
        }
    }

    public function get_puntos_depa($depa, $ser) {
        $this->db->select("P.id_punto AS punto,
            cadena, 
            direccion, 
            latitud,
            longitud,
            departamento,
            horario, PS.id_servicio");
        if ($ser == "*") {
            $this->db->select("(SELECT group_concat(nombre) FROM servicios Ser INNER JOIN punto_servicio pu ON pu.id_servicio = Ser.id WHERE pu.id_punto = P.id_punto) as nombre_servicio");
        } else {
            $this->db->select("S.nombre AS nombre_servicio");
        }
        $this->db->from("puntos P");
        $this->db->join("punto_servicio PS ", "PS.id_punto = P.id_punto");
        $this->db->join("servicios S ", "PS.id_servicio = S.id");
        
        if ($ser == "*" && $depa != "*") {
            $this->db->where('P.departamento', $depa);
        } else if ($ser != "*" && $depa != "*") {
            $this->db->where('PS.id_servicio', $ser);
            $this->db->where('P.departamento', $depa);
        } else if ($ser != "*" && $depa == "*") {
            $this->db->where('PS.id_servicio', $ser);
        }
        
        
        
        $this->db->group_by('PS.id_punto');

        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->result_array();
        }
    }

    public function getDepartamentos($pais) {
        $this->db->select("(`Id_Departamento` * 1) AS `Id_Departamento`, Departamento");
        $this->db->from("pais_departamento");
        $this->db->where('Pais', $pais);
        $this->db->group_by('Departamento');
        //->db->order_by('Departamento', 'asc');
        $provincia = $this->db->get();
        if ($provincia->num_rows() > 0) {
            return $provincia->result();
        }
    }

    //select S.nombre, P.Departamento from servicios S inner join pais_departamento  P on S.id = P.Cod_Servicio where P.Departamento = 'Chimaltenango'
    public function getServiciosPorDepartamento($depa) {
        $this->db->select("S.nombre, S.id, P.Departamento");
        $this->db->from("servicios S");
        $this->db->join("pais_departamento P ", "S.id = P.Cod_Servicio");
        $this->db->where('P.Departamento', $depa);
        $servicios = $this->db->get();
        if ($servicios->num_rows() > 0) {
            return $servicios->result();
        }
    }

    public function getValoresCombos(
    $action, $valor) {
        if (isset($action) && $action !== null) {
            if ($action === 'getDepartamentos') {
                $this->debug->sD($this->puntos_model->getDepartamentos($valor));
                return $this->puntos_model->getDepartamentos($valor);
            }
            if ($action === 'getServiciosPorDepartamento') {
                return $this->puntos_model->getServiciosPorDepartamento($valor);
            }
        }
    }

}

?>
