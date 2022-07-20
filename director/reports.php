<?php //include "../includes/db.php"; ?>
<?php include "../includes/header.php"; ?>

<section class="bg-secondary text-center p-1">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-dark text-white">Reports</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-info">
                            <tr>
                                <th scope="col">ref no:</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Department</th>
                                <th scope="col">Date</th>
                                <th scope="col">Director Status</th>
                                <th scope="col">Assets Status</th>
                                <th scope="col">Security Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql = "SELECT * FROM requests WHERE tech_id = '{$_SESSION['tech_id']}'  ORDER BY req_id DESC ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {

                                    $req_id = $row["req_id"];
                                    $tech_id = $row["tech_id"];
                                    $title = $row["title"];
                                    $description = $row["description"];
                                    $department = $row["department"];
                                    $director_status = $row["director_status"];
                                    $assets_status = $row["assets_status"];
                                    $security_status = $row["security_status"];
                                    $date = $row["date"];

                                    ?>
                                    <tr>
                                        <th scope="row">Ref<?php echo $req_id ?></th>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $description ?></td>
                                        <td><?php echo $department ?></td>
                                        <td><?php echo $date ?></td>
                                        <td>
                                            <?php
                                            if ($director_status === "rejected") {
                                                echo "<p class='text-danger'> $director_status </p>";
                                            }elseif($director_status === "approved") {
                                                echo "<p class='text-success'>$director_status </p>";
                                            }
                                            else {
                                                echo "<p class='text-info'> $director_status </p>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($assets_status === "rejected") {
                                                echo "<p class='text-danger'> $assets_status </p>";
                                            }elseif($assets_status === "approved") {
                                                echo "<p class='text-success'>$assets_status </p>";
                                            }
                                            else {
                                                echo "<p class='text-info'> $assets_status </p>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($security_status === "rejected") {
                                                echo "<p class='text-danger'> $security_status </p>";
                                            }elseif($security_status === "approved") {
                                                echo "<p class='text-success'>$security_status </p>";
                                            }
                                            else {
                                                echo "<p class='text-info'> $security_status </p>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include "../includes/footer.php"; ?>
