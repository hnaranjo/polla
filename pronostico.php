<?php
	session_start();
	include("conexion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polla - Copa America!</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/estilos.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script>
$(function(){
	$("btn-enviar").click(function(){
		var url = "actualizar.php";
		
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formulario").serialize(),
			success: function(data)
			{
				$("#resultado").html(data);
			}
		});
		return false;
	});
});
</script>
</head>

<body>
	<?php readfile('navbar.php');?>
	<?php readfile('header.php');?>		
	<?php $link=conectarse();?>
</div>
    <div class="container">
    	<div class="row">
           
           <div class="col-lg-8">
            <div class="page-header">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title">Pron&oacute;stico de partidos. Primera Fase</h2>
                    </div>  
                    <div class="panel-body"> 
                      <div class="table-responsive">
                        <table class="table" width="50%">
                            <tr><th>No.</th><th>R1</th><th colspan="3" width="40%">Pron&oacute;stico de encuentros</th><th>R2</th><th width="50%">Opciones</th></tr>
                            <form id="formulario" method="post">  
                            <?php 
                                $cons_p = mysql_query("SELECT P.ID_PARTIDO, E1.NOMBRE_EQUIPO, E2.NOMBRE_EQUIPO, P.FECHA, E1.LOGO, E2.LOGO, F.DESC_FASE FROM EQUIPO E1, EQUIPO E2, PARTIDO P INNER JOIN EQUIPO_FASE EF ON ( P.ID_PARTIDO = EF.ID_PARTIDO ) INNER JOIN FASE F ON (F.ID_FASE = EF.FASE) WHERE E1.ID_EQUIPO = P.EQUIPOA AND E2.ID_EQUIPO = P.EQUIPOB ORDER BY 1",$link);
                                while($row_p = mysql_fetch_row($cons_p)){
                                    echo '<tr><td>'.$row_p[0].'</td><td><input name="r1" type="text" value="" size="1"></td>
									<td align="right">'.$row_p[1].' <img src="'.$row_p[4].'"/></td>
									<td> vs </td><td><img src="'.$row_p[5].'"/> '.$row_p[2].'</td>
									<td><input name="r2" type="text" value="" size="1"></td>
									<td><button class="btn btn-success" id="btn-enviar"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td></tr>';
                                }
                            ?>
                       		</form>
                       </table>
                    </div>
                   </div>
                </div>
              </div>                          
            </div>
            <form> 
            <div class="col-lg-4">
            	<div class="page-header">
                	<div class="panel panel-success">
                        <div class="panel panel-heading">
                            <h2 class="panel-title">Finalistas.</h2>
                        </div>
                        <div class="panel-body">
                            <label>Equipo Campe&oacute;n</label>
                           <div class="form-group">
                            <select name="equipo1">
                            	<option value="">Seleccione:</option>
                                <?php 
									$cons_e = mysql_query("SELECT * FROM EQUIPO ORDER BY 1",$link);
									while ($row_e = mysql_fetch_row($cons_e)){
										echo '<option value="'.$row_e[0].'">'.$row_e[1].'</option>';
									}
								?>
                            </select>
                            <button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                            </div>
                            
                            <label>Equipo Sub campe&oacute;n</label>
                            <div class="form-group">
                            <select name="equipo2">
                            	<option value="">Seleccione:</option>
                                <?php 
									$cons_e = mysql_query("SELECT * FROM EQUIPO ORDER BY 1",$link);
									while ($row_e = mysql_fetch_row($cons_e)){
										echo '<option value="'.$row_e[0].'">'.$row_e[1].'</option>';
									}
								?>
                            </select>
                             <button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                            </div>
                           
                            <label>Equipo tercer lugar</label>
                            <div class="form-group">
                            <select name="equipo3">
                            	<option value="">Seleccione:</option>
                                <?php 
									$cons_e = mysql_query("SELECT * FROM EQUIPO ORDER BY 1",$link);
									while ($row_e = mysql_fetch_row($cons_e)){
										echo '<option value="'.$row_e[0].'">'.$row_e[1].'</option>';
									}
								?>
                            </select>
                             <button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                            </div>
                            
                            <label>Equipo cuarto lugar</label>
                            <div class="form-group">
                            <select name="equipo4">
                            	<option value="">Seleccione:</option>
                                <?php 
									$cons_e = mysql_query("SELECT * FROM EQUIPO ORDER BY 1",$link);
									while ($row_e = mysql_fetch_row($cons_e)){
										echo '<option value="'.$row_e[0].'">'.$row_e[1].'</option>';
									}
								?>
                            </select>
                             <button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                           </div>
                        </div>
                   </div>
                </div>
            </div>
			</form>             
            <div class="col-lg-12">
            	<div class="page-header">
                	<div class="panel panel-success">
                        <div class="panel-heading">
                            <h2 class="panel-title"><font size="4">Pronostico de partidos - Cuartos de final</font></h2>
                        </div>  
                    	<div class="panel-body"> 
                      		<div class="table-responsive">
	                            
                      		</div>
                    	</div>
                	</div>
            	 </div>
             </div>         
        </div>
    </div>
</div>
<?php readfile('footer.php');?>	
</body>
</html>