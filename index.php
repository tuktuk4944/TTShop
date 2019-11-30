<?php
    session_start();
    include("connect.php");
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Product</a></li>
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
                            <li><a href="<?php session_destroy(); ?>">Logout</a></li>
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

    <div class="container text-center">
        <div class="jumbotron">
            <h1>TingTong Shop</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores nihil omnis amet temporibus rem id odit veritatis ea numquam molestiae.</p>
        </div>
        <div class="container">
            <div class="row">
            <?php
                $sql = "SELECT * FROM product ORDER BY id";
                $result = $conn->query($sql);
                if(!$result){
                    echo "Error during data retrieval";
                }
                else{
                    //fetch data
                    while($prd = $result->fetch_object()){
                        ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="thumbnail">
                        <a href="productdetail.php?pid=<?php echo $prd->id; ?>">
                            <img src="img/product/<?php echo $prd->picture ?>" alt="">
                        </a>
                        <div class="caption">
                            <h3><?php echo $prd->name ?></h3>
                            <p><?php echo $prd->description ?></p>
                            <h4>Price : <?php echo $prd->price ?> Baht</h4>
                        </div>
                            <p><a href="#" class="btn btn-success">Add To Cart.</a></p>
                    </div>
                </div>
                        <?php
                    }
                }
            ?>
                
            </div>
        </div>
    </div>
</body>
</html>