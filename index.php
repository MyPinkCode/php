<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tunisair</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
    -->
    <?php
	session_start();
	include("connection.php");

    if (!isset($_SESSION['id'])) { header("location:login.php"); } 
    
	
?>
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.php">
                    <h1 class="tm-site-title mb-0">Tunisair</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

              <?php if($_SESSION['status'] == 1){
                echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link" href="vols.php">
                                <i class="far fa-file-alt"></i>
                                    Vols 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aeroports.php">
                            <i class="fas fa-users"></i>
                            Aeroports
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="escales.php">
                            <i class="fas fa-user-graduate"></i>
                                Etudiants
                            </a>
                        </li>
                        
                    </ul>';} ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="logout.php">
                            <?php echo $_SESSION['login_admin']; ?>, <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b><?php echo $_SESSION['login_admin']; ?></b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
               
                
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Liste de Vols pour Utilisateur</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">N° Vol.</th>
                                    <th scope="col">N° Escale</th>
                                    <th scope="col">N° Aeroport</th>
                                    
                                    <th scope="col">Jour</th>
                                    <th scope="col">Heure Depart vol</th>
                                    <th scope="col">Heure Arrive vol</th>
                                    
                        
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                $conn=connect();	
	
                if($conn){ 
                  $req = "SELECT no_vol, jour, heure_depart, heure_arrivee, no_aeroport, no_escale FROM vol_generique";
                  $result = $conn->query($req);
                  if ($result->rowCount() > 0) {
                    while($row = $result->fetch()) {
               
                              echo  '<tr>
                                    <td><b>#'. $row['no_vol'] .'</b></td>
                                    <td><b>#'. $row['no_escale'] .'</b></td>
                                    <td><b>#'. $row['no_aeroport'] .'</b></td>
                                    <td><b>'. $row['jour'] .'</b></td>
                                    <td><b>'.  $row['heure_depart'] .'</b></td>
                                    <td><b>'. $row['heure_arrivee'] .'</b></td>
                                    </tr>';
                                    }
                                    }
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2019</b> All rights reserved. 
                    
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
</body>

</html>