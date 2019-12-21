<?php
    session_start();
    include("connect.php");
    if(!isset($_GET['pid'])|| $_GET['pid']==""){
        header("location:index.php");
    }
    else{
        $pid = $_GET['pid'];
    }
    $sql="SELECT * FROM product Where id=$pid";
    $result=$conn->query($sql);
    if(!$result){
        echo "ERROR : ".$conn->error;
    }
    else{
        if($result->num_rows>0){
            $prd = $result->fetch_object();
        }
        else{
            $prd=NULL;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TingTong Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">TingTong Shop</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hapopup="true" aria-expanded="false"> 
                           Product <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="showproduct.php?category=1">Notebook</a></li>
                            <li><a href="showproduct.php?category=2">All in One</a></li>
                            <li><a href="showproduct.php?category=3">PC</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php
                    if(isset($_SESSION['id'])){
                    ?>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-hapopup="true" aria-expanded="false"> 
                            <i class="glyphicon glyphicon-user"></i> Welcome <?php echo $_SESSION['name']; ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Order</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="glyphicon glyphicon-shopping-cart"></i>(0)
                        </a>
                    </li>
                    <?php
                        }
                        else{
                    ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <form action="updateproduct.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Name: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtname" id=""class="form-control" value="<?php echo  $prd->name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Description: </label>
                    <div class="col-md-9">
                        <input type="text-area" name="txtdescription" id=""class="form-control" value="<?php echo $prd->description; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Price: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtprice" id=""class="form-control" value="<?php echo  $prd->price; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Stock: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtstock" id=""class="form-control" value="<?php echo  $prd->unitInStock; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Picture: </label>
                    <div class="col-md-9">
                    <img src="img/product/<?php echo $prd->picture; ?>" alt="">
                        <input type="file" name="filepic" id=""class="form-control-file" accept="image/*" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3">
                        <input type="hidden" name="hdnProductID" value="<?php echo $prd->id;?>">
                        <input type="hidden" name="hdnProductPic" value="<?php echo $prd->picture;?>">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>