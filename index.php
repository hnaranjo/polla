<?php
$ses_actual = session_name();
if ($ses_actual != '')
{	session_start();
	session_destroy(); 
	session_start(); }
 else
{  
	session_start();
}

if(isset($_POST['cerr']))$cerr=$_POST['cerr'];else $cerr=0;
if(isset($_GET['mal']))$mal=$_GET['mal'];else $mal=0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polla empresarial</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/estilos.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="js/globo.css" type="text/css" />
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<SCRIPT language=JavaScript src="js/globo.js"></SCRIPT>
<script type="text/javascript">
$(document).ready(function(){
    $(".popover-right").popover({
        placement : 'right'
    });
});
</script>
<style type="text/css">
	.bs-example{
    	margin: 150px 50px;
    }
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
      	<a class="navbar-brand" href="#">Polla</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">           
          <li></li>
        </ul>  
        <ul class="nav navbar-nav navbar-right">
          <li><a href="acerca.php" title="Informaci&oacute;n">Ayuda</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
	<?php readfile('header.php');?>	
    <div class="container">
        <div class="row" id="bg">
        <div class="col-md-1"></div>
          <div class="col-md-4">
          <div class="panel panel-primary">
                <div class="panel-heading">
                  <h2 class="panel-title"><font size="4">Ingresar</font></h2>
                </div>
                <div class="panel-body">
                  <div align="center">
                    <h6>
                      <p>
                        <?php
                            $fecha=date("m/d/Y");
                            $fechab=date("d/m/Y");
                        
                         	if($mal==2)
                         	{
                         ?>
                         	<div class="alert-danger">El usuario y/o la contrase&ntilde;a pueden estar incorrectos.</div>
							<?php
                            }
                            ?> 
                      </p>
                    </h6>
                  </div>
                	<div class="form-group">
                        <form class="form-ingreso" name="ingreso" action="validar.php" method="post" onSubmit="return validar(this);">
                          <div class="form-group">
                            <label class="sr-only" for="inputUser">Usuario:</label>
                            <input name="nameUser" type="usuario" class="form-control" id="nameUser" placeholder="Usuario" autofocus required>
                          </div>
                          <div class="form-group">
                            <label class="sr-only" for="InputPassword">Contrase&ntilde;a:</label>
                            <input name="claveUser" type="password" class="form-control" id="claveUser" placeholder="Contrase&ntilde;a" required>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">Recordarme
                            </label>
                          </div>
                           <div class="alert alert-info"><a href="#"> Olvido su contrase&ntilde;a?</a></div>
                          <div class="form-group" align="center"><button type="submit" class="btn btn-primary">Iniciar</button></div>
                        </form>
                   </div>
               </div>
            </div>       
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h2 class="panel-title"><font size="4">Registrarse</font></h2>
                </div>
                <div class="panel-body"> 
             		<div class="form-group has-primary">
                        <form class="form-registro" name="ingreso" action="registrarse.php" method="post" onSubmit="return validar(this);">
                          <h2 class="form-signin-heading"><font size="4">Formulario de registro.</font></h2>
                          <h5>Por favor registre sus datos para poder acceder al sistema.<br/><font class="alert-danger" size="2"> * Requerido</font></h5>
                          <label class="label label-primary">* Usuario:</label>
                            <div class="form-group">
                              <input id="element_2" name="usuario" class="form-control" type="text" placeholder="Usuario" autofocus required/> 
                          </div>
                          <label class="label label-primary">* Contrase&ntilde;a: </label>
                              <div class="form-group">
                                  <input id="element_3" name="nv_clave" class="form-control" type="password" placeholder="Contrase&ntilde;a" required/> 
                              </div>
                          <label class="label label-primary">* Repetir contrase&ntilde;a: </label>
                              <div class="form-group">
                                  <input id="element_3" name="r_clave" class="form-control" type="password" placeholder="Repetir contrase&ntilde;a" required/> 
                              </div>
                           <label class="label label-primary">* Correo electr&oacute;nico: </label>
                              <div class="form-group">
                                  <input id="element_3" name="mail" class="form-control" type="text" placeholder="Correo electr&oacute;nico" required/>
                              </div>
                           <label class="label label-primary">* Usuario administrador: </label>
                           <div class="form-group">
                             <input id="element_3" name="mail" class="form-control" type="text" placeholder="Usuario administrador" required/>                         
                           </div> 
                              <div class="form-group" align="center">
                                  <input id="ingreso" class="btn btn-lg btn-success" type="submit" name="submit" value="Guardar" required/>
                              </div>
                        </form>
                    </div>
                 </div>
              </div>
            </div>
            <div class="col-md-1"></div>
      </div>
    </div> 
<?php readfile('footer.php');?>	
</body>
</html>