<?php
	
	include "basedatos.php";

	if(isset($_POST['mesdesde']) and (($_POST['mesdesde'])!=0)  and  isset($_POST['aniodesde']) and (($_POST['aniodesde'])!=0) and isset($_POST['meshasta']) and (($_POST['meshasta'])!=0) and isset($_POST['aniohasta']) and (($_POST['aniohasta'])!=0))
	{

		$mesdesde=$_POST['mesdesde'];
		$aniodesde=$_POST['aniodesde'];
		$meshasta=$_POST['meshasta'];
		$aniohasta=$_POST['aniohasta'];
		
		$ultimodiameshasta=date('d',(mktime(0,0,0,$meshasta+1,1,$aniohasta)-1));
		
		$fechadesde=$aniodesde."-".$mesdesde."-01";
		$fechahasta=$aniohasta."-".$meshasta."-".$ultimodiameshasta;
		
		$query= mysql_query("select count(*) from asistencia where fecha>='".$fechadesde."' and fecha<='".$fechahasta."' and tipo=0 and motivo<>10");
		
		$cant_inas = mysql_result($query, 0);
	 
		echo "<font size=\"5\"><b>".$cant_inas."</b></font>";
		
	}
	else
	{
		$query= mysql_query("select count(*) from asistencia where month(fecha)=".date("n")." and year(fecha)=".date("Y")." and tipo=0 and motivo<>10");
		
		$cant_inas = mysql_result($query, 0);
	 
		echo "<font size=\"5\"><b>".$cant_inas."</b></font>";
		}

	mysql_close();
	


?>