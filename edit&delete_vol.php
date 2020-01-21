<?php
session_start();

include("connection.php");
   
	$con=connect();
    $no_vol=$_POST['no_vol'];
	$no_aeroport=$_POST['no_aeroport'];
	$no_escale=$_POST['no_escale'];
	$jour=$_POST['jour'];
	$heure_depart=$_POST['heure_depart'];
	$heure_arrivee=$_POST['heure_arrivee'];
	
	

    if($con){
		 if(isset($_POST['edit'])){
		if(!(empty($_POST['no_aeroport']))){$req1="UPDATE vol_generique SET date_sou='$date' where no_vol='$no_vol'";
		    $res1=$con->exec($req1);}
		if(!(empty($_POST['no_escale']))){$req2="UPDATE vol_generique SET no_aeroport='$no_aeroport' where no_vol='$no_vol'";
			$res1=$con->exec($req2);}
	    if(!(empty($_POST['jour']))){$req2="UPDATE vol_generique SET no_escale='$no_escale' where no_vol='$no_vol'";
			$res1=$con->exec($req2);}
		if(!(empty($_POST['heure_depart']))){$req2="UPDATE vol_generique SET heure_depart='$heure_depart' where no_vol='$no_vol'";
				$res1=$con->exec($req2);}
		if(!(empty($_POST['heure_arrivee']))){$req2="UPDATE vol_generique SET heure_arrivee='$heure_arrivee' where no_vol='$no_vol'";
					$res1=$con->exec($req2);}
		

		
			header("location: vols.php");  
		
	}
	  if(isset($_POST['delete']))
  {
   
$req = "DELETE FROM vol_generique where no_vol='$no_vol'";
$res = $con->exec($req);
if ($res) {
  header("Location: vols.php");
}
  }
	
	}

?>