<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportePorSalario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Login_model");
    }

    public function index() {

        $data["activado"] = "ReportePorSalario";
        if (!isset($this->session->user1)) {
            $data["activado"] = "login";
            $data["mainContent"] = "admin/logueo";
        } else {

            $data["mainContent"] = "admin/report1_view";
        }


        $this->load->view("template", $data);
    }

    public function EmployeeEarn() {
        $sueldo = $this->input->get('sal');

        if ($sueldo != null) {
            if ($sueldo != "") {
                $empleados = $this->Reports_model->getEmpleadosPorSueldo($sueldo);
                //$data['empleados'] = $empleados;
                if ($empleados != null) {
                    foreach ($empleados as $pun) {
                        echo ' <tr> ';
                        echo '<td>' . $pun["Id_Empleado"] . '</td>';
                        echo '<td>' . $pun["Nombre_Completo"] . '</td>';
                        echo '<td>' . $pun["Sueldo"] . '</td>';
                        echo '<td>' . $pun["Direccion"] . '</td>';
                        echo '<td>' . $pun["NombrePuesto"] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo 'SIN EMPLEADOS';
                }
            }
        }
    }

    public function generar() {

        $sueldo = $this->input->get('sal');

        if ($sueldo != null) {
            if ($sueldo != "") {
                $this->load->library('Pdf');
                $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                //  echo $pdf;
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Pantaleon Medrano');
                $pdf->SetTitle('Empleados Buscados por su Salario');
                $pdf->SetSubject('Control Personal');
                $pdf->SetKeywords('PDF, SALARIO, PRUEBAWB');

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
                $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
                $pdf->setFontSubsetting(true);

// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
                $pdf->SetFont('freemono', '', 14, '', true);

// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
                $pdf->AddPage();

//fijar efecto de sombra en el texto
                $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir
                //  $empleados = $this->input->post('empleados');
                $empleados = $this->Reports_model->getEmpleadosPorSueldo($sueldo);
                foreach ($empleados as $fila) {
                    $prov = $fila['Nombre_Completo'];
                }
                //preparamos y maquetamos el contenido a crear
                $html = '';
                $html .= "<style type=text/css>";
                $html .= "th{color: #fff; font-weight: bold; background-color: #222}";
                $html .= "td{background-color: #AAC7E3; color: #fff}";
                $html .= "</style>";
                $html .= "<h2>Empleados: " . $prov . "</h2><h4>Actualmente: " . count($empleados) . " Empleados</h4>";
                $html .= "<table width='100%'>";
                //  $html .= "<tr><th>Id localidad</th><th>Localidades</th></tr>";
                //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
                foreach ($empleados as $fila) {
                    $id = $fila['Id_Empleado'];
                    $localidad = $fila['Sueldo'];

                    $html .= "<tr><td class='id'>" . $id . "</td><td class='localidad'>" . $localidad . "</td></tr>";
                }
                $html .= "</table>";

// Imprimimos el texto con writeHTMLCell()
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
                $nombre_archivo = utf8_decode("Empleados con salario mayor a " . $sueldo . ".pdf");
                $pdf->Output($nombre_archivo, 'I');
            }
        }
    }

}

?>