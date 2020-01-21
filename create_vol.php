<?php

include("connection.php");
	$con=connect();
	
	$no_aeroport=$_POST['no_aeroport'];
	$no_escale=$_POST['no_escale'];
	$jour=$_POST['jour'];
	$heure_depart=$_POST['heure_depart'];
	$heure_arrivee=$_POST['heure_arrivee'];
    
    if($con){
		if(isset($_POST['ajout'])){
            $req1="INSERT INTO vol_generique (no_aeroport, no_escale, jour, heure_depart, heure_arrivee) VALUES ('$no_aeroport', '$no_escale', '$jour', '$heure_depart', '$heure_arrivee')";
		    $res1=$con->exec($req1);
		if($req1){
			header("location: vols.php"); 
			
		}  
		
	}

	if(isset($_POST['delete']))
  {
   
$req = "DELETE FROM vol_generique";
$res = $con->exec($req);
if ($res) {
  header("Location:vols.php");
}
  }
	

}

?>