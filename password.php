<?php
    include 'classes/PHPMailer/PHPMailer.php';
    include 'classes/conexiones.php';
    
    session_start();
    if(isset($_SESSION['loginUsu'])){
        header("Location:admin/index.php");
    }
    $consulta = new CONEXIONES();
    
    $mail = new PHPMailer();
    $correo = $_REQUEST['correo'];
    if($consulta -> comprobarPass($correo)){
        $mail->IsSMTP();
        //$mail->SMTPDebug  = 4;
        $mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
        $mail->Port = 587; // Puerto de conexión al servidor de envio. 
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "villagamingv@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
        $mail->Password = "VillaGaming5"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
        //$mail->From = "dayanarod86@gmail.com"; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
        //$mail->FromName = "Diana Rod"; //A RELLENAR Nombre a mostrar del remitente. 
        $mail ->setFrom('villagamingv@gmail.com', 'VillaGaming');
        $mail->AddAddress($correo); // Esta es la dirección a donde enviamos 
        $mail->IsHTML(true); // El correo se envía como HTML
        $mail->CharSet = 'UTF-8'; // Activo condificacción utf-8
        $mail->Subject = "Recordatorio de Contraseña"; // Este es el titulo del email. 
        $body = "Tu contraseña es: ".$consulta -> recuperarPass($correo);
        
        $mail->Body = $body; // Mensaje a enviar. $exito = $mail->Send(); // Envía el correo.
        if($mail -> send()){ 
            echo 'El correo fue enviado correctamente.<br>';
            echo 'Pincha <a href=login.php>aquí</a> para volver a loguearte con la contraseña enviada';

        } else { 
            echo 'Hubo un problema. Contacta a un administrador.';
        } 
    } else {
        echo "El correo no existe";
    }
?>
