<?php

include("connection.php");
	$con=connect();
	$nom=$_POST['nom_aeroport'];
	
    
    if($con){
		if(isset($_POST['ajout'])){
            $req1="INSERT INTO aeroport (nom_aeroport) VALUES ('$nom')";
		    $res1=$con->exec($req1);
		if($req1){
			header("location: aeroports.php"); 
			
		}  
		
	}

	if(isset($_POST['delete']))
  {
   
$req = "DELETE FROM aeroport";
$res = $con->exec($req);
if ($res) {
  header("Location:aeroports.php");
}
  }
	

}

?>