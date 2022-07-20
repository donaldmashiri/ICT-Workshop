<?php include "../includes/header.php"; ?>

<section class="bg-secondary text-center p-1">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-dark text-white">ICT Support Reported Issues </div>
                    <div class="card-body">
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
                                        <small style="background-color: lightskyblue" class="p-1 text-dark text-secondary">Technician Assigned: <?php echo $tech_names; ?></small>

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
                </div>
            </div>
        </div>
    </div>

</section>

<?php include "../includes/footer.php"; ?>




