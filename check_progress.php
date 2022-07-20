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
            <?php
            $sql = "SELECT * FROM problems 
            JOIN technicians ON problems.tech_id = technicians.tech_id WHERE status = 'pending'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    $prob_id = $row["prob_id"];
                    $dept= $row["dept"];
                    $dept_email = $row["dept_email"];
                    $title = $row["title"];
                    $description = $row["description"];
                    $tech_id = $row["tech_id"];
                    $tech_names = $row["tech_names"];
                    $date = $row["date"];
                    $status = $row["status"];
                    ?>
                    <div class="col-md-3 mt-2">
                        <div class="card">
                            <div class="card-header font-weight-bold">RefNo:00<?php echo $prob_id; ?></div>
                            <div class="card-body">
                                <div class="mb-2 ng-binding font-weight-bold ">
                                        <span class="text-dark">
                                                    <?php echo $dept?>
                                                    <br>
                                                    <small>(<?php echo $dept_email; ?>)</small>
                                </div>
                                <hr>
                                <div class="mb-2 ng-binding">
                                    <span class="font-weight-bold text-dark">Title :</span> <?php echo $title; ?>
                                </div>
                                <div class="mb-2 ng-binding bg-light">
                                    <span class="font-weight-bold text-dark">Message :</span> <?php echo $description; ?>
                                </div>
                                <small class="text-muted text-info">Date: <?php echo $date; ?></small>
                                <br>
                                <small style="background-color: lightgrey" class="text-dark p-1 text-secondary">Technician Assigned: <?php echo $tech_names; ?></small>

                                <div class="mb-2 ng-binding bg-light">
                                    <p>
                                        <?php
                                        if ($status === "rejected") {
                                            echo "<p class='text-danger'> Status : $status </p>";
                                        }elseif($status === "approved") {
                                            echo "<p class='text-success'> Status : $status </p>";
                                        }
                                        else {
                                            echo "<p class='text-info'> Status : $status </p>";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
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