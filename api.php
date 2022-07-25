<?php
include("db.php");
header("content-type: apllocation/json");
$REQ=$_SERVER['REQUEST_METHOD'];

switch ($REQ) {
    case 'GET':
        getmethod();
        break;
        case 'POST':
            echo '{"name": "post ... taijul"}';
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




?>