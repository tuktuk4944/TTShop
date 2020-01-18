<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX</title>
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <button id="btn1">Click</button>
    <p id="para1"></p>
    <p id="para2"></p>
    <script>
        $(document).ready(function(){
            $("#btn1").click(function(){
                $.ajax({
                    url:"result.php",
                    type:"post",
                    dataType:"json",
                    data:{ 
                        name:"Padrada",
                        lastname:"Promkijjanon"
                    },
                    success:function(res){
                        //alert("สวัสดี "+res.name+" "+res.lastname);
                        $("#para1").html(res.name);
                        $("#para2").html(res.lastname);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>