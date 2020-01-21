<?php
session_start();

include("connection.php");
   
	$con=connect();

    $nom_aeroport=$_POST['nom_aeroport'];
	$no_aeroport=$_POST['no_aeroport'];
	

    if($con){
		 if(isset($_POST['edit'])){
		if(!(empty($_POST['nom_aeroport']))){$req1="UPDATE aeroport SET nom_aeroport='$nom_aeroport' where no_aeroport='$no_aeroport'";
		    $res1=$con->exec($req1);}
		
			header("location: aeroports.php");  
		
	}
	  if(isset($_POST['delete']))
  {
   
$req = "DELETE FROM aeroport where no_aeroport='$no_aeroport'";
$res = $con->exec($req);
if ($res) {
  header("Location:aeroports.php");
}
  }
	
	}

?>