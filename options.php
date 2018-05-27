<?php
    session_start();
    //Para controlar las peticiones del front.

    $option = $_REQUEST['option'];
    require_once 'classes/conexiones.php';
    require_once 'classes/carro.php';
    
    if($option === "close"){
        session_destroy();
        header('Location:index.php');
    }

    if($option === "log"){
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['pass'];
        
        
        $log = new Conexiones();
        
        $log->loginUsers($user, $pass);
    }
    
    if($option === "register"){
        $nick = $_REQUEST['user'];
        $mail = $_REQUEST['mail'];
        $pass = $_REQUEST['pass'];
        $name = $_REQUEST['name'];
        $surnames = $_REQUEST['surname'];
        $address = $_REQUEST['address'];
        $location = $_REQUEST['location'];
        $cp = $_REQUEST['cp'];
        $birthDate = $_REQUEST['birthdate'];
        
        $date = new DateTime($birthDate);
        $dateBD = $date->format('d-m-Y');
        
        $register = new Conexiones();
        
        if(!$register->checkUser($mail)){
            if($register->registerUser($nick, $mail, $pass, $name, $surnames,
                $address, $location, $cp,$dateBD)){
            echo '<script type="text/javascript">alert("Registro completado '
                . 'correctamente!!");window.location="index.php";</script>';
            }else{
                echo '<script type="text/javascript">alert("Algo ha fallado en el '
                . 'registro, vuelve a intentarlo");window.location="register.php";</script>';
            }
        }else{
            echo '<script type="text/javascript">alert("Email ya registrado!")'
            . ';window.location="login.php";</script>';
        }
 
    }
    
    if($option === "add"){
        $id = $_REQUEST['id'];
        
        $carro = new Carro();
        $product = new Conexiones();
        $carro->add($product->getProduct($id));
        header('location:vistacarro.php');
    }
    
    if($option === "addPedido"){
        $totalPrec = $_REQUEST['prec'];
        $mail = $_SESSION['mailUsu'];

        $carritoSesion = $_SESSION['carrito'];
        
        $init = new Conexiones();
               
        if($init->initPedidos($mail)){
            $numPedido = $init->numPedido();
            crearFactura($totalPrec, $carritoSesion,$numPedido);
            echo '<script type="text/javascript">alert("¡El pedido se ha realizado correctamente!");window.location="index.php";</script>';
        }else{
                echo '<script type="text/javascript">alert("¡Fallo al realizar la compra!");window.location="index.php";</script>';
        }
    }
	function crearFactura($totalPrecio, $carritoSesion, $numPedido){
		
		include('pdf/fpdf.php');
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 13);
		//inserto la cabecera poniendo una imagen dentro de una celda
		$pdf->Cell(700,150,$pdf->Image('img/banner.png',5,10,200),0,0,'C');
		$pdf->Ln(50);
		$pdf->Cell(130,12,"Numero de factura:  ".$numPedido[0]);
		$pdf->Cell(60,12,"Fecha: ". date('d/m/Y'));
		$pdf->Ln(16);
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(100,10,'Descripcion');
		$pdf->Cell(10,10,'Precio');
		$pdf->Ln(15);
		$pdf->SetFont('Arial','',13);
                    foreach($carritoSesion as $produ){
                            $pdf->Cell(110,10,$produ['nombre']);
                            $pdf->Cell(10,10,$produ['precio']);
                            $pdf->Ln(8);
                    }
		$pdf->Ln(10);
		$pdf->SetFont('Arial','I',13);
		$pdf->Cell(100,8," ");
		$pdf->Cell(80,8,"Total a pagar con IVA: ".$totalPrecio." Euros",1);
		$pdf->Ln (25);
                $pdf->SetFont('Arial','',8);
		$pdf->Cell(155,8,"");
		$pdf->Cell(50,8,"VillaGaming S.L");
		$pdf->SetFont('Arial','',6);
		$pdf->Ln(8);
		$pdf->Cell(80,8,"");
		$pdf->Cell(10,8,"Todos los derechos reservados");
		
		$directFactu = 'facturas/Factura'.$numPedido[0].'.pdf';
//		$init = new Conexiones();
//                $init->addPdfDirect($directFactu,$numPedido[0]);
                
                //I -> Para ver sin guardar.
                //F -> Para guardar directamente
		$pdf->Output('I',$directFactu);	
		
//                unset($_SESSION['carrito']);
	}
    
    

    