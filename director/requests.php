<?php //include "../includes/db.php"; ?>
<?php include "../includes/header.php";
// REJECT
if (isset($_GET['reject'])) {

    $req_id = $_GET['reject'];
    $status = "rejected";

    $query = "UPDATE requests SET ";
    $query .= "director_status  = '{$status}' ";
    $query .= "WHERE req_id = '{$req_id}' ";


    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
};

if (isset($_GET['approve'])) {

    $req_id = $_GET['approve'];
    $status = "approved";

    $query = "UPDATE requests SET ";
    $query .= "director_status  = '{$status}' ";
    $query .= "WHERE req_id = '{$req_id}' ";


    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
};


?>

<section class="bg-secondary text-center p-1">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-dark text-white">Requests</div>
                    <div class="card-body">
                        <table class="table">
                        <?php
                        $sql = "SELECT * FROM requests WHERE director_status = 'pending' OR director_status = 'rejected'
                                    ORDER BY req_id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
 ?>
                            <thead class="table-info">
                            <tr>
                                <th scope="col">ref no:</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Department</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php


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
                                        <td class="fw-bolder">
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
                                            <a href="requests.php?approve=<?php echo $req_id ?>" class="btn btn-success btn-sm">Approve</a>
                                            <a href="requests.php?reject=<?php echo $req_id ?>" class="btn btn-danger btn-sm">Reject</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<p class='alert alert-danger'>No Requests have been made</p>";
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
