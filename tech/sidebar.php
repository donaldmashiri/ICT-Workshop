<?php
$sql = "SELECT * FROM technicians WHERE tech_id = '{$_SESSION['tech_id']}'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$tech_id = $row["tech_id"];
$tech_names = $row["tech_names"];
$gender = $row["gender"];
$phonenumber = $row["phonenumber"];
$email = $row["email"];
$address = $row["address"];
$date = $row["date"];
?>

<ul class="list-group list-group-flush">
    <li style="background-color: darkblue" class="list-group-item">
        <a href="index.php" class="text-white text-decoration-none" aria-current="page" > Technician (<?php echo $tech_names ?>)  </a>
    </li>
    <li class=" list-group-item">
        <a style="background-color: #0d6efd"  href="index.php" class=" list-group-item text-white text-decoration-none list-group-item-action">Profile</a>
    </li>
    <li class="list-group-item">
        <a  style="background-color: #0d6efd" href="ict_faults.php" class=" list-group-item text-white text-decoration-none list-group-item-action">ICT Faults</a>
    </li>
    <li class="list-group-item">
        <a style="background-color: #0d6efd" href="add_req.php" class="list-group-item text-white text-decoration-none list-group-item-action">Add Requests</a>
    </li>
    <li class="list-group-item">
        <a style="background-color: #0d6efd" href="view_req.php" class="list-group-item text-white text-decoration-none list-group-item-action">View Requests</a>
    </li>
    <li class="list-group-item">
        <a  href="../index.php" class="bg-danger list-group-item text-white text-decoration-none list-group-item-action">Logout</a>
    </li>
</ul>