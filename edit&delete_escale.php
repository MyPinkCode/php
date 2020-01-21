<?php
session_start();

include("connection.php");
   
	$con=connect();
	$no_escale=$_POST['no_escale'];
    $no_aeroport=$_POST['no_aeroport'];
	$heure_depart=$_POST['heure_depart'];
	$heure_arrivee=$_POST['heure_arrivee'];
	

    if($con){
		 if(isset($_POST['edit'])){
		if(!(empty($_POST['no_aeroport']))){$req1="UPDATE escale SET no_aeroport='$no_aeroport' where no_escale='$no_escale'";
		    $res1=$con->exec($req1);}
		if(!(empty($_POST['heure_depart']))){$req2="UPDATE escale SET heure_depart='$heure_depart' where no_escale='$no_escale'";
			$res1=$con->exec($req2);}
	    if(!(empty($_POST['heure_arrivee']))){$req2="UPDATE escale SET heure_arrivee='$heure_arrivee' where no_escale='$no_escale'";
			$res1=$con->exec($req2);}

		
			header("location: escales.php");  
		
	}
	  if(isset($_POST['delete']))
  {
   
$req = "DELETE FROM escale where no_escale='$no_escale'";
$res = $con->exec($req);
if ($res) {
  header("Location: escales.php");
}
  }
	
	}

?>