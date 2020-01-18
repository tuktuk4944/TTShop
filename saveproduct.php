<?php 
    include("connect.php");
    echo ini_get("upload_max_filesize")."<br>";//ใช้ตรวจสอบการกำหนดค่าของบางออปชั่นโดย upload Max file size คือขนาดสูงสุดของไฟล์ที่สามารถอัปโหลดได้ ค่า default คือ ไม่เกิน 2 MB โดยสามารถแก้ขนาดไฟล์ที่ต้องฃการได้ในออปชั่น upload Max file size ซึ่งอยู่ในไฟล์ php.ini
    $allowedType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filepic"]["type"]); //เป็นการสร้างตัวอปรเพื่อเก็บชนิดของไฟล์ที่ถูกอัปโหลดมา filepic เป็นชื่อของ input ที่ใช้อัปโหลด
    $size=$_FILES["filepic"]["size"]/1024/1024; //เป็นการสร้างตัวแปรเพื่อเก็บขนาดของไฟล์ที่ถูกอัปโหลด มีหน่วยเป็นไบต์
    //image/png filetype=["image","png"]
    if(!in_array($fileType[1],$allowedType)){
        //เมื่ออัปโหลดไฟล์ที่ไม่ตรงกับ type ใน aloowType
        echo "Non-Image file is not allowed. <br>";
    }
    else if($size>1.00){
        //ถ้าอัปโหลดแล้วขนาดไฟล์เกินขีดจำกัดสูงสุด ให้แอคโค่
        echo "File size exceeds the maximum threshold. <br>";
    }
    else{ //ถ้าไม่ตรงกับเงื่อนไขอะไรเลย
        $name = $_POST['txtname'];
        $desc = $_POST['txtdescription'];
        $price = $_POST['txtprice'];
        $unitInStock = $_POST['txtstock'];
        $cat = $_POST['txtcat'];
        $filename = $_FILES['filepic']['name']; //เก็บชื่อไฟลืที่ถูกอัปโหลดมา

        move_uploaded_file($_FILES["filepic"]["tmp_name"],"img/product/".$_FILES["filepic"]["name"]);

        $sqlInsert = "INSERT INTO product (name,description,price,unitInStock,picture,category)VALUES('$name','$desc','$price','$unitInStock','$filename',$cat)";
        $result=$conn->query($sqlInsert);
        //ไม่ต้องมี
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