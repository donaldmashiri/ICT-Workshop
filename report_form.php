<div class="col-md-8">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Need Assistance from the ICT Department</h6>
            <a class="btn btn-outline-info btn-sm text-dark justify-content-end" href="check_progress.php">Check Progress</a>
        </div>
        <div class="card-body">
            <?php

            $query = "SELECT count(tech_id) As TechAss FROM technicians";
            $select_tech = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($select_tech)) {
                $count = $row['TechAss'];
//                  echo "<b class='badge badge-primary'>$count</b>";
//                $tech_ass = rand(1,$count);
//                echo $tech_ass;

            }


            if(isset($_POST['submit'])){

                $date = "2021/03/13";
                $newdate= date('d M, Y', strtotime($date));
                $time  = date("h:i:sa");
                $datetime  = $newdate .' '. $time;

                $tech_ass = rand(1,$count);
                            echo $tech_ass;

                $title = $conn -> real_escape_string($_POST['title']);
                $names = $conn -> real_escape_string($_POST['names']);
                $dept = $conn -> real_escape_string($_POST['dept']);
                $dept_email = $conn -> real_escape_string($_POST['dept_email']);
                $description = $conn -> real_escape_string($_POST['description']);
                $status = "not approved";


                $sql = "INSERT INTO problems (names, title, dept, dept_email, description, tech_id, date)
                         VALUES ('{$names}', '{$title}', '{$dept}', '{$dept_email}', '{$description}', '{$tech_id}', '$datetime')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='text-success text-center alert alert-success'>Your application successfully</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }

            ?>

            <form class="form" method="post" action="">
                <div class="form-group mt-2">
                    <label for="">Your name</label>
                    <input type="text" name="names" class="form-control" placeholder="Your name: " minlength="4" required>
                </div>
                <div class="form-group mt-2">
                    <label for="" class="form-label">Select Department</label>
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
                <div class="form-group mt-2">
                    <label for="" class="form-label">Department Email </label>
                    <input type="email" name="dept_email" class="form-control" placeholder="Department Email :" minlength="4" required>
                </div>
                <div class="form-group mt-2">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" minlength="4" required>
                </div>
                <div class="form-group mt-2">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="10" rows="3" minlength="4" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn- float-end mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>