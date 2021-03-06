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
                    <li><a href="searchProduct.php">Search</a></li>
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
            <h2>Search Product</h2>
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="col-md-1">
                            <label for="">ค้นหาตาม</label>
                        </div>
                        <div class="col-md-2">
                            <select name="searchcol"  class="form-control btn btn-info">
                                <option value="1" >ชื่อสินค้า</option>    
                                <option value="2" >รายละเอียด</option>    
                                <option value="3" >ราคา</option>    
                            </select>
                        </div>
                        <div class="col-md-8 content1">
                            <input type="text" class="form-control" name="txtsearch" placeholder="Search..">
                        </div>
                        <div class="col-md-8 content2">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="txtsearch1" placeholder="ราคาต่ำสุด">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="txtsearch2" placeholder="ราคาสูงสุด">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button name="submit" class="btn btn-block btn-light">
                                <i class="glyphicon glyphicon-search"></i> Go!
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.content2').hide();
            $("select").change(function(e){
                if ($("select option:selected").val() == '1' || '2')
                {
                    $('.content1').show();
                    $('.content2').hide();
                } 
                if ($("select option:selected").val() == '3') {
                    $('.content2').show();
                    $('.content1').hide();
                }
            }); 
        });
    </script>
    <?php
        if(isset($_POST['submit'])){  
            $searchcol = $_POST['searchcol'];
            $search = $_POST['txtsearch'];
            $sql = "SELECT * FROM product";
            switch($searchcol){
                case 1 : $sql .= " WHERE name LIKE '%$search%'";
                        break;
                case 2 : $sql .= " WHERE description LIKE '%$search%'";
                        break;
                case 3 : 
                    $search1 = $_POST['txtsearch1'];
                    $search2 = $_POST['txtsearch2'];
                    $sql .= " WHERE price BETWEEN '$search1' AND '$search2'" ;
                        break;
            }
    ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top:50px;">
            <h3><?php echo "ผลการค้นหา : ".$search .$search1 .$search2; ?></h3>
            <?php
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
                            <p>
                            <a href="#" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Add To Cart.</a>
                            <a href="editproduct.php?pid=<?php echo $prd->id ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="deleteproduct.php?pid=<?php echo $prd->id ?>" class="btn btn-danger lnkDelete" ><i class="glyphicon glyphicon-trash"></i></a>
                            </p>
                    </div>
                </div>
                        <?php
                    }
                }
            ?>
            </div>
        </div>

    <?php
        }   
    ?>
  
</body>
</html>