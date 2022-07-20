<?php include "../includes/header.php";
// Started
if (isset($_GET['started'])) {

    $prob_id = $_GET['started'];
    $status = "started";

    $query = "UPDATE problems SET ";
    $query .= "status  = '{$status}' ";
    $query .= "WHERE prob_id = '{$prob_id}' ";


    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
};

// progress
if (isset($_GET['progress'])) {

    $prob_id = $_GET['progress'];
    $status = "In progress";

    $query = "UPDATE problems SET ";
    $query .= "status  = '{$status}' ";
    $query .= "WHERE prob_id = '{$prob_id}' ";


    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
};

// Done
if (isset($_GET['done'])) {

    $prob_id = $_GET['done'];
    $status = "work done";

    $query = "UPDATE problems SET ";
    $query .= "status  = '{$status}' ";
    $query .= "WHERE prob_id = '{$prob_id}' ";


    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
};










?>





<section class="bg-secondary text-center p-1">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-dark text-white">Assigned Reported ICT Issues </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM problems WHERE tech_id = '$tech_id' AND status = 'pending'";
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
                                                <div class="mb-2 ng-binding fw-bolder bg-light">
                                                    <p class="fw-bolder">
                                                        <?php
                                                        if ($status === "pending") {
                                                            echo "<p class='alert alert-info'> Status : $status </p>";
                                                        }
                                                        else {
                                                            echo "<p class='alert alert-success'> Status : $status </p>";
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div>
                                                    <a href="ict_faults.php?started=<?php echo $prob_id ?>" class="btn btn-warning m-1 btn-sm">Started</a>
                                                    <a href="ict_faults.php?progress=<?php echo $prob_id ?>" class="btn btn-dark m-1 btn-sm">In progress</a>
                                                    <a href="ict_faults.php?done=<?php echo $prob_id ?>" class="btn btn-success m-1 btn-sm">Done</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }}else{
                                echo "<p class='alert alert-info'>No Assigned tasks for you</p>";
                            } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include "../includes/footer.php"; ?>




