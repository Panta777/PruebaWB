<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //select * from empleado inner join rol on empleado.id_rol = rol.Id_Rol where Sueldo >5000
    public function getEmpleadosPorSueldo($salario) {
        $this->db->select("*");
        $this->db->from("empleado E");
        $this->db->join("rol R ", "E.id_rol = R.Id_Rol");
        $this->db->where("R.Sueldo >", $salario);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->result_array();
        }
    }

    public function getEmpleadosPorPuesto($puesto) {
        $this->db->select("*");
        $this->db->from("empleado E");
        $this->db->join("rol R ", "E.id_rol = R.Id_Rol");
        $this->db->like("R.NombrePuesto", $puesto);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->result_array();
        }
    }

    public function getEmpleadosPorFechaNac($fechaIni, $fechaFin) {
        $this->db->select("*");
        $this->db->from("empleado E");
        $this->db->join("rol R ", "E.id_rol = R.Id_Rol");
        $this->db->where("E.Fecha_Nac >=", $fechaIni);
         $this->db->where("E.Fecha_Nac <=", $fechaFin);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->result_array();
        }
    }

    public function getEmpleadosPorNIT($nit) {
        $this->db->select("*");
        $this->db->from("empleado E");
        $this->db->join("rol R ", "E.id_rol = R.Id_Rol");
        $this->db->like("E.NIT", $nit);
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            return $res->result_array();
        }
    }

}

?>
