<?php 
    $allowedType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filepic"]["type"]);
    //image/png filetype=["image","png"]
    if(!in_array($fileType[1],$allowedType)){
        //เมื่ออัปโหลดไฟล์ที่ไม่ตรงกับ type ใน aloowType
        echo "Non-Image file is not allowed. <br>";
    }
    else{
        echo "Type: ". $_FILES["filepic"]["type"]."<br>";
        echo "Name: ". $_FILES["filepic"]["name"]."<br>";
        echo "Size: ". $_FILES["filepic"]["size"]."<br>";
        echo "Tmp Name: ". $_FILES["filepic"]["tmp_name"]."<br>";
        echo "Error: ". $_FILES["filepic"]["error"]."<br>";

        move_uploaded_file($_FILES["filepic"]["tmp_name"],"img/product/".$_FILES["filepic"]["name"]);
    }
    

?>