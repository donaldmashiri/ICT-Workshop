
<div class="col-md-5">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary"> Log in As <b> <?php echo $role ?> </b></h5>

        </div>
        <div class="card-body">
            <?php
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                if($change === 'tech'){
                    $query = "select * from technicians where email = '$email' and phonenumber = '$password'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $count = mysqli_num_rows($result);

                    if ($count == 1) {
                        $_SESSION['tech_id'] = $row['tech_id'];
                        header('location: tech/index.php');
                    } else {
                        echo "<p class='alert alert-danger'>Incorrect Password</p>";
                    }

                }else{
                    $query = "select * from logins where email = '$email' and password = '$password'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $count = mysqli_num_rows($result);

                    if ($count == 1) {
                        $_SESSION['password'] = $row['password'];
                        if($_SESSION['password'] === "director"){
                            header('location: director/index.php');
                        }elseif ($_SESSION['password'] === "assets"){
                            header('location: ass/index.php');
                        }elseif ($_SESSION['password'] === "security"){
                            header('location: security/index.php');
                        }
                    } else {
                        echo "<p class='alert alert-danger'>Incorrect Password</p>";
                    }
                }
            }
            ?>

            <form class="form" method="post" action="">
                <div class="form-group mt-2">
                    <label for="" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" placeholder="Email :" minlength="4" required>
                </div>

            <?php if($change === 'tech'){
            ?>
                <div class="form-group mt-2">
                    <label for="">Phone Number</label>
                    <input type="number" name="password" class="form-control" placeholder="Phone Number :" minlength="4" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn- float-end mt-2">Login</button>
                <?php }else{

           ?>
                <div class="form-group mt-2">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password :" minlength="4" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn- float-end mt-2">Login</button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
