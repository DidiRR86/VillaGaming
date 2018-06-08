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
        if(!isset($_SESSION['loginUsu'])){
            header('Location:login.php');
        }else{
            $id = $_REQUEST['id'];

            $carro = new Carro();
            $product = new Conexiones();
            $carro->add($product->getProduct($id));
            header('location:vistacarro.php');   
        }
    }
    
    if($option === "addLike"){
        $id = $_REQUEST['id'];
        $mail = $_SESSION['mailUsu'];
        $init = new Conexiones();
        if($init->addListaDeseos($id, $mail)){
            echo true;
        }else{
            echo false;
        }
    }
    
    if($option === "delLike"){
        $id = $_REQUEST['id'];
        $mail = $_SESSION['mailUsu'];
        $init = new Conexiones();
        $init->delListaDeseos($id, $mail);
        
        if($init->delListaDeseos($id, $mail)){
            header('Location: userproperties.php');
        }else{
            return "fallo";
        }
    }
    
    if($option === "del"){
        $id = $_REQUEST['delete'];
        unset($_SESSION['carrito'][$id]);
        header('location:vistacarro.php'); 
    }
    
    if($option === "addPedido"){
        $totalPrec = $_REQUEST['prec'];
        $mail = $_SESSION['mailUsu'];
        $pago = "paypal";
        //$_REQUEST['group1']
        $carritoSesion = $_SESSION['carrito'];
        
        $init = new Conexiones();
        $datosUsu = $init->getUser($mail);
        
        $numGame = [];
        $correctNumGame = true;
        for($i=0;$i<count($carritoSesion);$i++){
            $correctNumGame = true;
            do{
                $num = generateNumGame();
                $correctNumGame = $init->checkNumGame($num);
            }while($correctNumGame);
            array_push($numGame, $num);
        }
               
        if(true){
            $numPedido = $init->numPedido();
            $num = 0;
            foreach($carritoSesion as $arti){
                $init->addNumGame($numGame[$num],$arti['idproducto'],(int)$numPedido[0]);
                $init->setPuPurchasesProduct($arti['idproducto']);
                $num++;
            }
            crearFactura($totalPrec, $carritoSesion,$numPedido, $pago, $datosUsu, $numGame);
                echo '<script type="text/javascript">alert("¡El pedido se ha realizado correctamente!");window.location="index.php";</script>';
        }else{
                echo '<script type="text/javascript">alert("¡Fallo al realizar la compra!");window.location="index.php";</script>';
        }
    }
	function crearFactura($totalPrecio, $carritoSesion, $numPedido, $pago, $datosUsu, $numGame){
		
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
		$pdf->Cell(100,10,'Nombre');
		$pdf->Cell(40,10,'Precio');
                $pdf->Cell(10,10,'Clave');
		$pdf->Ln(15);
		$pdf->SetFont('Arial','',13);
                    //Listado de productos
                $num = 0;
                    foreach($carritoSesion as $produ){
                        $pdf->Cell(100,10,$produ['nombre']);
                        $pdf->Cell(40,10,$produ['precio']);
                        $pdf->Cell(10,10,$numGame[$num]);
                        $pdf->Ln(8);
                        $num++;    
                    }
		$pdf->Ln(20);
                $pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(100,10,'Direccion de envio');
		$pdf->SetFont('Arial','I',13);
                $pdf->Ln(13);
                
                //DIreccion de envio
                $pdf->Cell(10,5,$datosUsu['nombre']);
                $pdf->Cell(3,8," ");
                $pdf->Cell(10,5,$datosUsu['apellidos']);
                $pdf->Ln(2);
                $pdf->Cell(10,15,$datosUsu['direccion']);
                $pdf->Cell(3,8," ");
                $pdf->Ln(2);
                $pdf->Cell(10,25,$datosUsu['localidad']);
                $pdf->Cell(15,8," ");
                $pdf->Cell(10,25,$datosUsu['cp']);
                $pdf->Ln(5);
                
                //Metodo de pago
                if($pago === "tarjeta"){
                    $pdf->Cell(100,8," ");
                    $pdf->Cell(40,8,"Metodo de pago: Tarjeta");
                }else if($pago === "paypal"){
                    $pdf->Cell(100,8," ");
                    $pdf->Cell(40,8,"Metodo de pago: Paypal");
                }
                
                $pdf->Ln(20);
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
//              $init = new Conexiones(); 
//                $init->addPdfDirect($directFactu,$numPedido[0]); 
                
                //I -> Para ver sin guardar.
                //F -> Para guardar directamente
		$pdf->Output('I',$directFactu);	
		
//                unset($_SESSION['carrito']);
	}
        
        function generateNumGame(){
            $num = [];
            for($i=0;$i<3;$i++){
                array_push($num,rand(100,999));
            }
            $numGame = $num[0]."-".$num[1]."-".$num[2];
            return $numGame;
        }
        
    
    

    