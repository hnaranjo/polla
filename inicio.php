<?php
	session_start();
	if(isset($_SESSION['idusu']))$idusu=$_SESSION['idusu'];else $idusu=""; 
	if(isset($_SESSION['ncomp']))$ncomp=$_SESSION['ncomp'];else $ncomp=""; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polla - Sistema empresarial</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/estilos.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
</head>

<body>
<?php 
readfile('navbar.php');
readfile('header.php');		
include("conexion.php");
	$link=conectarse();
	$cons = mysql_query("SELECT * FROM EQUIPO ORDER BY 1",$link);
	while ($row = mysql_fetch_row($cons)){
}
?>
    <div class="container">
    	<div class="row">
        	<div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><font size="4">Bienvenidos.</font></h2>
                    </div>  
                    <div class="panel-body">
                        <p>
                        <div><label class="label label-info">Usuario:</label><?php echo $ncomp;?></div>
                        <?php 
							$cons_t = mysql_query("SELECT * FROM TORNEO",$link);
							while ($row_t = mysql_fetch_row($cons_t)){
						 ?>
                            <h4>Torneo registrado:<br /><?php echo $row_t[1]." ".$row_t[2];?>.</h4>
                            <div>
        	               		<img src="<?php echo $row_t[5]; ?>" border="0" width="150" />
                        	</div>
                         <?php 
							}//fin del while
						 ?>
                        </p>
                        
                     </div>
                </div>      
           </div>              
       	   <div class="col-lg-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title"><font size="4">Tabla de posiciones.</font></h2>
                        </div>  
                        <div class="panel-body"> 
                        <div class="table-responsive">
                        <table class="table">
                        	<tr><td>Grupo</td><td>Equipo</td><td>PG</td><td>PE</td><td>PP</td><td>GF</td><td>GC</td><td>PTS</td></tr>
                            <?php
							$cons_f = mysql_query("SELECT * FROM FASE WHERE ID_FASE=1",$link);
								while($row_f=mysql_fetch_row($cons_f)){
									$cons_g = mysql_query("SELECT * FROM GRUPO",$link); 
									while ($row_g=mysql_fetch_row($cons_g)){
										//echo '<div class="label label-info">'.$row_g[1].'</div>';
										$cons_e = mysql_query("SELECT E.*, G.*, TP.* 
																FROM EQUIPO E 
																INNER JOIN TABLA_POSICION TP ON(TP.ID_EQUIPO = E.ID_EQUIPO)
																INNER JOIN EQUIPO_GRUPO EG ON(E.ID_EQUIPO=EG.ID_EQUIPO) 
																INNER JOIN GRUPO G ON(G.ID_GRUPO=EG.ID_GRUPO) 
																WHERE G.ID_GRUPO=".$row_g[0]." AND TP.ID_FASE=".$row_f[0]." ORDER BY G.ID_GRUPO",$link);												
										while ($row_e = mysql_fetch_row($cons_e)){
											//echo $row_g[0]." ".$row_e[3];
										if(strcmp($row_f[0],$row_e[6])==0){
											 if(strcmp($row_g[0],$row_e[3])==0){
												 echo '<tr><td>'.$row_g[1].'</td><td><img src="'.$row_e[2].'"/>'.$row_e[1].'</td><td>'.$row_e[9].'</td><td>'.$row_e[10].'</td><td>'.$row_e[11].'</td><td>'.$row_e[12].'</td><td>'.$row_e[13].'</td><td>'.$row_e[14].'</td></tr>';
														//echo '<h6><img src="'.$row_e[2].'"/>'.$row_e[1].'</h6>'; 
											 }//fin del if
											}//fin del if
										}//fin del while
									}//fin del while?>
						<?php }?>
                         </table>
                         </div>
                        </div>
                    </div>
                  </div>
            	</div> 
            
          <div class="page-header">      
            <div class="col-lg-3">
               
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title"><font size="4">Condiciones.</font></h2>
                        </div>  
                        <div class="panel-body">
                            <p>
                            <h4>Condiciones de la polla</h4>
                            	<ul type="1">
                                	<li value="1">Registrar todos los marcadores del torneo.</li>
                                    <li>Si coincide el equipo ganador, gana 3 puntos.</li>
                                    <li>Si coincide el marcador de los dos equipos, gana 2 puntos.</li>
                                    <li>Si coincide el marcador de 1 equipo, gana 1 punto.</li>
                                    <li>Si coincide el campe&oacute;n gana 10 puntos.</li>
                                    <li>Si coincide el Subcampe&oacute;n, gana 7 puntos.</li>
                                    <li>Si coincide el tercer puesto, gana 5 puntos.</li>
                                    <li>Si coinicide el cuarto puesto, gana 2 puntos.</li>
                                    <li>El puntaje se acumula durante todo el torneo.</li>
                                    <li>Los resultados juegan unicamente en los primeros 90 Minutos del partido.</li>
                                    <li>Al final gana el que tenga mas puntos.</li>                                                                        
                                </ul>
                            </p>
                        </div>
                    </div>
               
               </div>
           <div class="col-lg-6">
          
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><font size="4">Horarios de Partidos.</font></h2>
                    </div>  
                    <div class="panel-body"> 
                      <div class="table-responsive">
                        <table class="table" width="50%">
                            <tr><th>No.</th><th>Fecha y Hora</th><th>Partido</th></tr>
                            <?php 
                                $cons_p = mysql_query("SELECT P.ID_PARTIDO, E1.NOMBRE_EQUIPO, E2.NOMBRE_EQUIPO, P.FECHA, E1.LOGO, E2.LOGO FROM PARTIDO P, EQUIPO E1, EQUIPO E2 WHERE E1.ID_EQUIPO = P.EQUIPOA AND E2.ID_EQUIPO = P.EQUIPOB ORDER BY 1",$link);
                                while($row_p = mysql_fetch_row($cons_p)){
                                    echo '<tr><td>'.$row_p[0].'</td><td>'.$row_p[3].'</td><td>'.$row_p[1].' <img src="'.$row_p[4].'"/> vs <img src="'.$row_p[5].'"/> '.$row_p[2].'</td></tr>';
                                }
                            ?>
                       </table>
                    </div>
                   </div>
              </div>          
            </div>
            <div class="col-lg-3">
            
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title"><font size="4">Resultados Hoy.</font></h2>
                    </div>  
                    <div class="panel-body"> 
                    </div>
               </div>

            </div>  
            <div class="col-lg-3">
               <object  width='300' height='400' id='flashLatestNews' classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'>
                <param name='movie' value='http://www.fifa.com/flash/widgets/newsreader/app.swf?lang='es'/>
                <param name='bgcolor' value='#ffffff'/>
                <param name='quality' value='high'/>
                <param name='wmode' value='transparent'/>
                <param name='flashvars' value='lang=es'>
                <embed width='300' height='400' flashvars='lang=es' wmode='transparent' quality='high' bgcolor='#ffffff' name='flashLatestNews' id='flashLatestNews' src=http://www.fifa.com/flash/widgets/newsreader/app.swf?lang='es type='application/x-shockwave-flash'/>
                </object>
                  </div>      
        </div>
    </div>
   </div> 
</div>
<?php readfile('footer.php');?>	
</body>
</html>