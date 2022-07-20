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
                    <div style="background-color: darkblue" class="card-header text-white">Home</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-light">
                            <?php
                                    echo "<tr><th scope='col'>Tech#: </th> <td>MSU00$tech_id</td></tr>";
                                    echo "<tr><th scope='col'>Full Names: </th> <td>$tech_names</td></tr>";
                                    echo "<tr><th scope='col'>Gender: </th> <td>$gender</td></tr>";
                                    echo "<tr><th scope='col'>Email: </th> <td>$email</td></tr></tr>";
                                    echo "<tr><th scope='col'>Address: </th> <td>$address</td></tr>";
                                    echo "<tr><th scope='col'>Date: </th> <td>$date</td></tr>";
                            ?>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include "../includes/footer.php"; ?>
