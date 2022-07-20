<?php include "../includes/header.php"; ?>

<section class="bg-secondary text-center p-1">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div style="background-color: darkblue" class="card-header text-white">Create Request</div>
                    <div class="card-body">
                        <?php

                        if(isset($_POST['submit'])){

                            $title = $conn -> real_escape_string($_POST['title']);
                            $description = $conn -> real_escape_string($_POST['description']);
                            $department = $conn -> real_escape_string($_POST['dept']);

                            $sql = "INSERT INTO requests (tech_id, title, description, department, date)
                         VALUES ('{$_SESSION['tech_id']}','{$title}', '{$description}', '{$department}', now())";

                            if ($conn->query($sql) === TRUE) {
                                echo "<p class='text-success text-center alert alert-success'>Request successfully sent</p>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                        }

                        ?>
                        <form class="" method="post" action="">
                            <div class="form-group mt-2">
                                <input type="text" name="title" class="form-control" placeholder="Title :" minlength="4" required>
                            </div>
                            <div class="form-group mt-2">
                                <textarea name="description" id="" class="form-control" placeholder="Description" cols="5" rows="3"
                                          minlength="4" required></textarea>
                            </div>
                            <div class="form-group mt-2">
                                <select name="dept" class="form-control" id="">
                                    <option value="">select department</option>
                                    <option value="Insurance">Insurance</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Logistics">Logistics</option>
                                    <option value="HR">HR</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Survey">Survey</option>
                                </select>
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




