<?php

if (isset($_POST)) {

    require_once './conexion.php';
    require_once './main.php';

    // buscar por id
    if (($_POST['action']) == 'searchContactId') { 
        if (!empty($_POST['id_contacto'])) {
            $intId = intval($_POST['id_contacto']);
            $resultado = mysqli_query($conn ,"SELECT * FROM ag_contacto WHERE id_contacto = $intId");
            if (mysqli_num_rows($resultado) > 0) {
                $contactoArray = pasar_array_utf8(mysqli_fetch_assoc($resultado));
                echo json_encode($contactoArray, JSON_UNESCAPED_UNICODE);
            } else {
                echo 'not data';
            }
            mysqli_free_result($resultado);
            mysqli_close($conn);
            exit();
        } 
    }
    
    // buscar por caracter relacionado
    if (($_POST['action']) == 'searchContactText') { 
        $text = $_POST['text'];
        $resultado = mysqli_query(
            $conn ,
            "SELECT * FROM ag_contacto WHERE 
            id_contacto LIKE '%$text%' OR
            nombre LIKE '%$text%' OR
            apellido LIKE '%$text%' OR
            telefono LIKE '%$text%' OR
            email LIKE '%$text%'"
        );
        if (mysqli_num_rows($resultado) > 0) {
            $jsonData = array();
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $fila = pasar_array_utf8($fila);
                array_push($jsonData, $fila);
            }
            echo json_encode($jsonData, JSON_UNESCAPED_UNICODE);
        } else {
            echo 'not data';
        }
        mysqli_free_result($resultado);
        mysqli_close($conn);
        exit();
    }

    // todos los contactos
    if (($_POST['action']) == 'listContact') { 
        $resultado = mysqli_query($conn ,"SELECT * FROM ag_contacto");
        if (mysqli_num_rows($resultado) > 0) {
            $jsonData = array();
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $fila = pasar_array_utf8($fila);
                array_push($jsonData, $fila);
            }
            echo json_encode($jsonData, JSON_UNESCAPED_UNICODE);
        } else {
            echo 'not data';
        }
        mysqli_free_result($resultado);
        mysqli_close($conn);
        exit();
    }
}