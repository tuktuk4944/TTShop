<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
        //รับข้อมูลจากform register 
        include("connect.php");
        if(isset($_POST['submit'])){    //Check if it is posted back
            //รับข้อมูล
            $firstname =$_POST['firstname'];
            $lastname =$_POST['lastname'];
            $username =$_POST['username'];
            $password =md5($conn->real_escape_string($_POST['password']));
            $email =$_POST['email'];

            //echo "$firstname $lastname $username $password $email";
            //Insert to table
            $sqlInsert = "INSERT INTO customer (firstname,lastname,username,password,email,active)VALUES('$firstname','$lastname','$username','$password','$email','0')";
            //echo $sqlInsert;

            //Mysqli_query
            $result=$conn->query($sqlInsert);
            if($result){
                //เมื่อ register สำเร็จ
               echo "<script language='javascript'>alert('Register Complete');</script>"; 
               header("Location: login.php");
            }
            else{
                echo "Error during insert: ".$conn->error;
            }

        }

    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
                    <div class="panel panel-warning">
                        <div class="panel-heading text-center">
                            Register
                        </div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="firstname" class="col-md-3">Firstname : </label>
                                <div class="col-md-9">
                                    <input type="text" name="firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-3">Lastname : </label>
                                <div class="col-md-9">
                                    <input type="text" name="lastname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-3">E-mail : </label>
                                <div class="col-md-9">
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Username : </label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-3">Password : </label>
                                <div class="col-md-3">
                                    <input type="password" name="password" class="form-control">
                                </div>
                           <!-- </div>
                            <div class="form-group row"> -->
                                <label for="confirmpassword" class="col-md-3">Confirm Password : </label>
                                <div class="col-md-3">
                                    <input type="password" name="confirmpassword" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="submit" class="btn btn-warning btn-block">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>