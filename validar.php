<?php
session_start();
if(isset($_POST['nameUser']))$nameUser=$_POST['nameUser'];else $nameUser="";
if(isset($_POST['claveUser']))$claveUser=$_POST['claveUser'];else $claveUser="";
if(isset($_POST['valida']))$valida=$_POST['valida'];else $valida="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Validar</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/estilos.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>
<div class="page-header">
    <div class="container">
        <div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Atenci&oacute;n:</span>
            Validando ingreso de usuario.
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                <span class="sr-only">70% Completado</span>
              </div>
            </div>
        </div>        
    </div>
</div>
<?php
include("conexion.php");
$link=Conectarse(); 
//echo "Usuario: $usuario - Contrase&ntilde;a: $clave<br>";
$result=mysql_query("select U.ID_USUARIO, U.NOMBRE_COMPLETO, U.USUARIO, T.DESC_TIP_USU, E.DESC_ESTADO
	from usuario U
	inner join tipo_usuario T on(T.ID_TIP_USU=U.TIPO_USUARIO)
	inner join estado_usuario E on(E.ID_ESTADO=U.ESTADO)
	where U.USUARIO='$nameUser' and U.CLAVE='$claveUser' and U.ESTADO=1",$link);
   		while ($row = mysql_fetch_array($result))
		{
			$_SESSION['idusu'] = $idusu;
			$_SESSION['ncomp'] = $ncomp;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['tipo'] = $tipo;
			$_SESSION['estado'] = $estado;
			
			$valida = $row["ID_USUARIO"]; 
		}

		if($valida > 0)
		{
			echo "<script>document.location='inicio.php';</script>";
		} else {
			echo "<script>document.location='index.php?mal=2';</script>";
		}
		?>
</body>
</html>
