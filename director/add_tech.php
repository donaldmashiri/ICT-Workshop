<?php include "../includes/header.php"; ?>

<section class="bg-secondary text-center p-1">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-dark text-white">Add Technician</div>
                    <div class="card-body">
                        <?php

                        if(isset($_POST['submit'])){

                            $names = $conn -> real_escape_string($_POST['names']);
                            $email = $conn -> real_escape_string($_POST['email']);
                            $phonenumber = $conn -> real_escape_string($_POST['phonenumber']);
                            $address = $conn -> real_escape_string($_POST['address']);
                            $gender = $conn -> real_escape_string($_POST['gender']);

                            $sql = "INSERT INTO technicians (tech_names, email, phonenumber, address, gender, date)
                         VALUES ('{$names}', '{$email}', '{$phonenumber}', '{$address}', '{$gender}', now())";

                            if ($conn->query($sql) === TRUE) {
                                echo "<p class='text-success text-center alert alert-success'>Technicians successfully Added</p>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                        }

                        ?>
                        <form class="" method="post" action="">
                            <div class="form-group mt-2">
                                <input type="text" name="names" class="form-control" placeholder="Fullnames :" minlength="4" required>
                            </div>
                            <div class="form-group mt-2">
                                <select name="gender" class="form-control" id="">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <input type="email" name="email" class="form-control" placeholder="Email :" minlength="4" required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="number" name="phonenumber" class="form-control" placeholder="Phone Number :" minlength="4" required>
                            </div>
                            <div class="form-group mt-2">
                                <textarea name="address" id="" class="form-control" placeholder="Address" cols="5" rows="3" minlength="4" required></textarea>
                            </div>
                                <button type="submit" name="submit" class="btn btn-primary btn- text-center mt-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include "../includes/footer.php"; ?>




