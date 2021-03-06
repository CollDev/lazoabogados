<?php
if (!empty($_GET)) {
    if (isset($_GET['abogado'])) {
//        require_once 'db.php';
//        $query = "SELECT `id`,
//`nombre`
//FROM `productos`
//ORDER BY `orden` ASC;";
//        $result = mysql_query($query);
//        $response = array();
//        while ($array = mysql_fetch_assoc($result)) {
//            $response[] = $array;
//        }
//        echo json_encode($response);
//    } elseif (isset($_GET['product_id'])) {
//        require_once 'db.php';
//        $query = "SELECT `id`,
//`descripcion`,
//`precio`,
//`oferta`
//FROM `productos`
//WHERE `id` = " . $_GET['product_id'] . ";";
//        $result = mysql_query($query);
//        $response = mysql_fetch_assoc($result);
//        $response["descripcion"] = htmlentities($response["descripcion"]);
//        $response["oferta"] = htmlentities($response["oferta"]);
//        echo json_encode($response);
        require_once 'abogados.php';
        $response = $response['abogados'][$_GET['abogado']];
        
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($response);
    } else if (isset($_GET['especialidad'])) {
        require_once 'especialidades.php';
        require_once 'abogados.php';
        foreach ($resp['especialidades'][$_GET['especialidad']]['abogados'] as $especialidad) {
            $rpta['especialidades'][] = $response['abogados'][$especialidad['abogado']];
        }
        
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($rpta);
    } else {
        echo 'La opción enviada no es válida';
    }
} elseif (!empty($_POST)) {
    if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['comentario'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $comentario = $_POST['comentario'];

        if ($nombre != '' && $email != '' && $comentario != '') {
            $nameRegex = '/^[a-zA-Záéíóú]+$/';
            $emailRegex = '/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/';
            if (preg_match($nameRegex, $nombre) == 0)
                $return = array('responseCode' => 400, 'response' => 'Ha ingresado un nombre no válido.');
            elseif (preg_match($emailRegex, $email) == 0)
                $return = array('responseCode' => 400, 'response' => 'Ha ingresado un email no válido.');
            elseif (isset($_POST['empresa']) && $_POST['empresa'] != '' && preg_match($nameRegex, $_POST['empresa']) == 0)
                $return = array('responseCode' => 400, 'response' => 'Ha ingresado un teléfono no válido.');
            else {
                $apellidos = isset($_POST['apellidos']) ? "'" . $_POST['apellidos'] . "'" : NULL;
                $empresa = isset($_POST['empresa']) ? "'" . $_POST['empresa'] . "'" : NULL;
                //enviar el correo
                require_once 'eml.php';
                $message = Swift_Message::newInstance()
                    ->setSubject('Mensaje desde la página web')
                    ->setFrom($email)
                    ->setTo($email)
                    ->setBcc($emlusername)
                    ->setBody('Hola:' . '
' . '
Nombre: ' . $nombre . '
Apellidos: ' . $apellidos . '
Empresa: ' . $empresa . '
Email: ' . $email . '
Escribió el siguiente comentario:' . '
' . $comentario . '
' . '
Que tenga un buen dia.')
                    ;
                $sent = $mailer->send($message);
//                //guardar en la base de datos
//                require_once 'db.php';
//                $query = "INSERT INTO `correos` (
//`id`,
//`nombre`,
//`apellidos`,
//`empresa`,
//`email`,
//`comentario`,
//`creado`,
//`estado`
//) VALUES (
//NULL,
//'". $nombre . "',
//" . $apellidos . ",
//" . $empresa . ",
//'". $email . "',
//'". $comentario . "',
//NOW(),
//'". $sent . "'
//);";
//                $inserted = mysql_query($query);
                $inserted = false;
                if ($sent && $inserted)
                    $return = array('responseCode' => 200, 'response' => 'Mensaje enviado y almacenado.');
                else if ($sent)
                    $return = array('responseCode' => 200, 'response' => 'Mensaje enviado.');
                else if ($inserted)
                    $return = array('responseCode' => 200, 'response' => 'Mensaje almacenado.');
                else
                    $return = array('responseCode' => 400, 'response' => 'No se pudo enviar, intente más tarde.');
            }
        } else {
            if ($nombre == '')
                $return = array('responseCode' => 400, 'response' => 'Debe ingresar su nombre.');
            elseif ($email == '')
                $return = array('responseCode' => 400, 'response' => 'Debe ingresar su correo electrónico.');
            elseif ($comentario == '')
                $return = array('responseCode' => 400, 'response' => 'Debe ingresar un mensaje.');
        }
    } else {
        $return = array('responseCode' => 400, 'response' => 'Debe usar el formulario de contácto de la página web.');
    }
    echo json_encode($return);
} else {
    echo 'No esta permitido a esta sección.';
}