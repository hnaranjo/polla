<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Copa Am&eacute;rica</title>
<?php 
$servi='localhost';
$username='root';
$passw='zitiz'; 

function Conectarse() 
{
$servi='localhost';
$username='root';
$passw='zitiz'; 

if (!($link=mysql_connect("$servi","$username","$passw"))) 
   { 
      echo "Error no fue posible conectarse a la base de datos."; 
      exit(); 
   }
   
   if (!mysql_select_db("db_polla",$link))  
  
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
} 

$link=Conectarse(); 
mysql_query ("SET NAMES 'utf8'");

//echo "Conexión establecida.<br>"; 

mysql_close($link); //cierra la conexion 

?>