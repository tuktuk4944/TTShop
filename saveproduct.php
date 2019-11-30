<?php 
    include("connect.php");
    echo ini_get("upload_max_filesize")."<br>";
    $allowedType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filepic"]["type"]);
    $size=$_FILES["filepic"]["size"]/1024/1024;
    //image/png filetype=["image","png"]
    if(!in_array($fileType[1],$allowedType)){
        //เมื่ออัปโหลดไฟล์ที่ไม่ตรงกับ type ใน aloowType
        echo "Non-Image file is not allowed. <br>";
    }
    else if($size>1.00){
        echo "File size exceeds the maximum treshold. <br>";
    }
    else{
        $name = $_POST['txtname'];
        $desc = $_POST['txtdescription'];
        $price = $_POST['txtprice'];
        $unitInStock = $_POST['txtstock'];
        $filename = $_FILES['filepic']['name'];

        move_uploaded_file($_FILES["filepic"]["tmp_name"],"img/product/".$_FILES["filepic"]["name"]);

        $sqlInsert = "INSERT INTO product (name,description,price,unitInStock,picture)VALUES('$name','$desc','$price','$unitInStock','$filename')";
        $result=$conn->query($sqlInsert);
        if($result){
           echo "<script language='javascript'>alert('Insert Product Complete');</script>"; 
           header("Location: index.php");
        }
        else{
            echo "Error during insert: ".$conn->error;
        }

        //echo $sqlInsert;
    }
    

?>