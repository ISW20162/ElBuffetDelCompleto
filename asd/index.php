
 <?php
       
        session_start();

        include("conexion.php");
        include("db.php");	
        
        if(!isset($_SESSION['id_us'])){
            
            if(isset($_POST['login'])){
                
                $wish=new conexion($serverDB,$userDB,$passwordDB,$bdDB);
                
                if($wish->login($_POST['userIN'],$_POST['passIN'])){
                    
                    $wish=new conexion($serverDB,$userDB,$passwordDB,$bdDB);
                    $_SESSION['id_us']=$wish->getID($_POST['userIN'],$_POST['passIN']);
                    $_SESSION['nombre']=$wish->getNombre($_SESSION['id_us']);
                    $_SESSION['tipo']=$wish->getTipo($_SESSION['id_us']);
                    $wish->cerrar();
                    header("location:index.php");
                    
                }else{   
                    
                    $wish->cerrar();
                    echo "<script> alert('Usuario o Contraseña incorrectos'); </script>";
                    
                }
            }
            
        }else{            
            
            header("Location:tipos/siguiente.php");
        }
        
       ?>
       
<html>

	<head>
		<title>Reconocimiento de Usuario</title>
		<link type="text/css" rel="stylesheet" href="estilos/style.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	
	<body>
     
       
	   <form action="" method="post">        
           <h2>Formulario de Reconocimiento</h2>
            <input type="text" placeholder="&#128588; Usuario" name="userIN" required>
            <input type="password" placeholder="&#128273; Contraseña" name="passIN" required>
            <input type="submit" value="Ingresar" name="login">            
        </form>
        
	
	</body>

</html>