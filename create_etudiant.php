<?php

include("connection.php");
	$con=connect();
	$no_aeroport=$_POST['no_aeroport'];
	$heure_depart=$_POST['heure_depart'];
	$heure_arrivee=$_POST['heure_arrivee'];
    
    if($con){
		if(isset($_POST['ajout'])){
            $req1="INSERT INTO escale (no_aeroport, heure_depart, heure_arrivee) VALUES ('$no_aeroport', '$heure_depart', '$heure_arrivee')";
		    $res1=$con->exec($req1);
		if($req1){
			header("location: escales.php"); 
			
		}  
		
	}

	if(isset($_POST['delete']))
  {
   
$req = "DELETE FROM escale";
$res = $con->exec($req);
if ($res) {
  header("Location:escales.php");
}
  }
	

}

?>