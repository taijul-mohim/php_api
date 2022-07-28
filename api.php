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
                $data=json_decode(file_get_contents('php://input'),true);
                putmethod($data);
                break;  
                case 'DELETE':
                    $data=json_decode(file_get_contents('php://input'),true);
                deletemethod($data);
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
$name=$data['name'];
$email=$data['email'];

$sql="INSERT INTO new(name,email)VALUES('$name','$email')";
if(mysqli_query($con , $sql)){
    echo '{"result" : "done"}';
}else{
    echo '{"result" : "not done"}';
}

 
}



 function putmethod($data){
    global $con;
    $id=$data['id'];
    $name=$data['name'];
    $email=$data['email'];
    $sql="UPDATE new SET name='$name',email='$email' WHERE id='$id' ";
if(mysqli_query($con , $sql)){
    echo '{"result" : "done"}';
}else{
    echo '{"result" : "not done"}';
}
    
    
    
 }



 function  deletemethod($data){
    global $con;
    $id=$data['id'];
    $sql="DELETE FROM new WHERE id='$id' ";
    if(mysqli_query($con , $sql)){
        echo '{"result" : "DELETE successfully"}';
    }else{
        echo '{"result" : "not done"}';
    }

 }


?>