<?php

header("content-type: apllocation/json");
$REQ=$_SERVER['REQUEST_METHOD'];

switch ($REQ) {
    case 'GET':
        echo '{"name": "get ... taijul"}';
        break;
        case 'POST':
            echo '{"name": "post ... taijul"}';
            break;
            case 'PUT':
                echo '{"name":  "put ... mohim"}';
                break;
              
                
                   
                            
    default:
        
        break;
}


?>