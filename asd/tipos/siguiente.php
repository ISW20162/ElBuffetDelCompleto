<?php 
session_start();
    
if(empty($_SESSION['id_us'])){
    session_start();
    session_destroy();
    header("location:index.php");
}



?>

<html>
    <head>  
        <title>Redireccionando</title>      
    </head>
    
    <body> 
       <p> <?php echo "Bienvenido/a ".$_SESSION['nombre']." en un momento sera redireccionado..."; ?> </p>
       <?php 
            if($_SESSION['tipo']=='primer'){ 
                $_SESSION['redirecciona']='location.href="primer.php"';
                
            }else{
                if($_SESSION['tipo']=='segundo'){
                    $_SESSION['redirecciona']='location.href="segundo.php"';
                    
                }else{
                    $_SESSION['redirecciona']='location.href="caja.php"';                    
                }
            }        
        ?>
        <script language='javascript'>
           window.setTimeout('<?php echo $_SESSION['redirecciona']; ?>', 3000);
        </script>         
    </body>
    
    
</html>