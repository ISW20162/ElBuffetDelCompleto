<?php

    session_start();

    if(empty($_SESSION['id_us'])){
        session_start();
        session_destroy();
        header("location:index.php");
    }

     if(isset($_POST['cerrar_sesion'])){
         session_start();
         session_destroy();
         header("location:index.php");
     }
 
?>
   

<html>    
    <head>
		<title>Menu ADM 1 LVL</title>
		<link type="text/css" rel="stylesheet" href="estilos/stylePrimer.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	
	<body>
    
        <h1>Bienvenido ADM 1 LVL</h1>
        <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post">
            <input type="hidden" name="cerrar_sesion">
            <input type="submit" value="cerrar sesion">
        </form>
	    
	</body>
	
</html>