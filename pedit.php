<?php
session_start();
$t=$_SESSION['msg'];
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
        
    <title>profile Edit</title>
</head>
<body>
    
    <div class="container mt-5">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>profile Edit 
                            <a href="profile.php" class="btn btn-danger float-end back">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($t))
                        {
                            $profile_id = mysqli_real_escape_string($conn, $t);
                            
                            $query = "SELECT * FROM user WHERE `username`='$profile_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $profile = mysqli_fetch_array($query_run);
                                $_SESSION['msg'] =$profile['username'];
                                ?>
                               
                                <form action="p_update.php" method="POST" class="containe">
                                    <input type="hidden" name="username" value="<?= $profile['username']; ?>">

                                    <div class="mb-3">
                                        <label class='tex'>profile Name</label>
                                        <input type="text" name="name" value="<?=$profile['name'];?>" class="form-control box">
                                    </div>
                                    <div class="mb-3">
                                        <label class='tex'>profile Email</label>
                                        <input type="email" name="mailid" value="<?=$profile['mailid'];?>" class="form-control box">
                                    </div>
                                   
                                        
                                    
                                    <div class="mb-3">
                                        <label class='tex'>Captain RollNo</label>
                                        <input type="text" name="phoneno" value="<?=$profile['phoneno'];?>" class="form-control box">
                                    </div>
                                    <div class="mb-3">
                                        <center>
                                        <button type="submit" name="update_profile" class="btn btn-primary submit">
                                            Update profile
                                        </button>
                                        </center>
                                    </div>

                                </form>
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