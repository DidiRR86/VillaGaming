<?php 
    include 'classes/PHPMailer/class.phpmailer.php'; 
    include 'classes/PHPMailer/class.smtp.php';
    include 'classes/conexiones.php'; 
    session_start(); 
    
    $option = $_REQUEST['option'];
    $consulta = new CONEXIONES();
    
    $correo = null;
    $titulo = null;
    $body = null;
    
    if($option == "recupass"){
        $correo = $_REQUEST['correo'];
        $body = "Tu contraseña es: ".$consulta -> recuperarPass($correo);
        $titulo = "Recordatorio de Contraseña";
    }else if($option == "bienvenida"){
        $correo = $_REQUEST['correo'];
        $titulo = "Bienvenido a VillaGaming";
        $body = "De parte de todo el equipo de VillaGaming, queriamos darte la bienvenida a esta nuestra familia.<br>"
                . "Espero que esta relación dure muchos años, y que si surge algun problema pueda contar con nosotros.<br>"
                . "<br>Un saludo del equipo de VillaGaming.";
    }else if($option== "compra"){
        $correo = $_REQUEST['correo'];
        $archivo = $_REQUEST['factu'];
        $titulo = "Recibo de su compra VillaGaming";
        $body = "Gracias por su nueva compra, le adjuntamos la factura.<br>Reciba un cordial saludo.";
    }
     
     
    $mail = new PHPMailer(); 
    
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
        $mail->Subject = $titulo; // Este es el titulo del email.
        
        if($option == "compra"){
            $mail->AddAttachment($archivo);
        }
         
        $mail->Body = $body; // Mensaje a enviar. $exito = $mail->Send(); // Envía el correo. 
        if($mail -> send()){  
            if($option == "recupass"){
                echo '<script type="text/javascript">alert("Correo enviado '
                . 'correctamente!!");window.location="index.php";</script>';
            }
             
 
        } else {  
            if($option == "recupass"){
                echo '<script type="text/javascript">alert("Fallo en el envio del mail'
                . '");window.location="olvidoPass.php";</script>';
            }
             
        }  
    } else { 
        echo '<script type="text/javascript">alert("No se ha encontrado'
                . 'ningun correo");window.location="olvidoPass.php";</script>';  
    } 
?> 

