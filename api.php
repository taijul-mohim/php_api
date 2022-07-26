<?php
include("db.php");
header("content-type: apllocation/json");
$REQ=$_SERVER['REQUEST_METHOD'];

switch ($REQ) {
    case 'GET':
        getmethod();
        break;
        case 'POST':
            $data=json_decode(file_get_contents('php://input'),true);
            postmethod($data);
            break;
            case 'PUT':
                echo '{"name":  "put ... mohim"}';
                break;
                                         
    default:
    echo '{"name":  "data cant found"}';
        break;
}


function getmethod(){
    global $con;
    $querry="SELECT  * FROM new ";
    $result=mysqli_query($con,$querry);
     if(mysqli_num_rows($result)>0){
        $rows=array();
        while($r=mysqli_fetch_assoc($result)){
            $rows['result'][]=$r;
        }
        echo json_encode($rows);
     }else{
        echo '{"result" : "no data found"}';
     }
}

function  postmethod($data){
    global $con;
    // $name=$data["name"];
    // $email=$data["email"];
    // $sqli="INSERT INTO new(name,email,create)VALUES('$name','$email',NOW())";
    //  $querry=mysqli_query($con,$sqli);
    //  if($querry){
    //     echo '{"result" : "data insert"}';
    //  }
    echo '{"result" :"done"}';
}


?>