<?php include ("includes/db.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>msu workshop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/msu.jpg" />
</head>
<body>
<div class="bg-primary d-flex justify-content-center">
    <div class="p-2 bd-highlight">
        <img src="img/msu.jpg" width="130" height="100" class="rounded" >
    </div>
    <div class="p-2 bd-highlight">
        <h1 class="text-white mt-3">Midlands State University</h1>
    </div>
</div>

<section class="bg-secondary text-center p-1">
    <h2 class="text-warning">ITS eWorkshop Ticketing System</h2>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a href="index.php?change=<?php echo 'director' ?>" class="nav-link btn btn-sm btn-info m-2 text-white" aria-current="page" >ICT Director</a>
        </li>
        <li class="nav-item">
            <a href="index.php?change=<?php echo 'tech' ?>" class="nav-link btn btn-sm btn-dark m-2 text-white" aria-current="page" >ICT Technicians</a>
        </li>
        <li class="nav-item">
            <a href="index.php?change=<?php echo 'ass' ?>" class="nav-link btn btn-warning m-2 text-dark" aria-current="page" >Assets Department</a>
        </li>
        <li class="nav-item">
            <a href="index.php?change=<?php echo 'security' ?>" class="nav-link btn btn-sm btn-primary m-2 text-white" aria-current="page" >Security</a>
        </li>
        <li class="nav-item">
            <a href="index.php" class="nav-link btn btn-danger mt-2 btn-sm text-white float-end" aria-current="page" >ICT Support</a>
        </li>

    </ul>

</section>

<section class="bg-light p-2">
    <div class="container mt-2">
        <div class="row">
           <div class="col-md-3"></div>
            <?php
            if(isset($_GET['change'])){
                $change = $_GET['change'];

                if($change === 'director'){
                    $role = "<b class='text-info'>ICT Director</b>";
                }elseif($change === 'tech'){
                    $role = "<b class='text-dark'>Technicians</b>";
                }
                elseif($change === 'ass'){
                    $role = "<b class='text-warning'>Assets Department</b>";
                }
                elseif($change === 'security'){
                    $role = "<b class='text-danger'>Security Department</b>";
                }
            }

            if (!empty($change)) {
                include ("logins.php");
            } else {
                include ("report_form.php");
            }
            ?>
        </div>
    </div>
</section>


<section class="footer mt-5">
    <div class="container bg-white text-center">
        <div class="row">
            <h4>MSU ITS eWorkshop Ticketing System</h4>
            <p>by</p>
            <p>Marshall Saurombe </p>
        </div>
    </div>
</section>


<script src="js/bootstrap.min.js"></script>
</body>
</html>