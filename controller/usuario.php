<?php
require_once("/PARCIAL3333/config/conexion.php");

require_once("/PARCIAL3333/models/Usuario.php");

$usuario = new Usuario();
switch($_GET["opc"]){
        case "Listar_cursos   ";
        $datos=$usuario->cursos_x_usuarios($_POST["usu_id"]);
        $data=Array();
        foreach($datos as $row){
            $sub_array = array();
            //columns de las tablas a mostrt segun select del modelo
            $sub_array[] = $row["curso"];
            $sub_array[] = $row["Fecha_ini"];
            $sub_array[] = $row["Fecha_fin"];
            $sub_array[] = $row["nombrei"].$row["apellido"];
            $sub_array[]= '<button type="button" class="btn btn-outline-primary"> Crtificado></button>';
            $data[] = $row_array;
        }
        //*Formato del datable, se usa siempre*/
        $results = array("sEcho"=>1,
        "iTotalRecors"=>count($data),
        "iTotalDisplayRecors"=>count($data),
        "aaData"=>$data);
        echo json_encode($results);
        break;
}
?>