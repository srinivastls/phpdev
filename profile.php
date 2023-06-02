<?php
session_start();
require 'db_conc.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="edit.css">

    <title>profile View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Basic profile 
                            <a href="pedit.php" class="btn btn-danger float-end back">EDIT</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        $s=$_SESSION['msg'];
                        if(isset($s))
                        {
                            
                            $query = "SELECT * FROM user WHERE `username`='$s' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $profile = mysqli_fetch_array($query_run);
                                $_SESSION['msg'] =$profile['username'];
                                ?>
                                
                                    <div class="mb-3">
                                        <label class='tex'>Name</label>
                                        <p class="form-control">
                                            <?=$profile['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class='tex'>Email</label>
                                        <p class="form-control">
                                            <?=$profile['mailid'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class='tex'>User Name</label>
                                        <p class="form-control">
                                            <?=$profile['username'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class='tex'>Phone No</label>
                                        <p class="form-control">
                                            <?=$profile['phoneno'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>