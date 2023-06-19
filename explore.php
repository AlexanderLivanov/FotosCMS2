<?php

$uname = "";

if(!empty($_POST['username'])){




    
//     $requser = $_POST['username'];
//     $userfolder = "";

//     function findUser($requser){
//         $directory = "content";
//         $users = glob($directory . '/*', GLOB_ONLYDIR);

//         foreach ($users as $user) {
//             if ($user == $directory . '/' . $requser) {
//                 $userfolder = $user;
//                 echo 'good' . '<br>';
//                 break;
//             } else {

//                 echo "not found<br>";
//             }
//         }
//     }

// //findUser($_POST['username']);
// if(findUser($_POST['username'])){
//     echo 'good<br>';
// }else{
//     echo 'bad<br>';
// }
}else{
    echo 'Запрос не определен';
}

?>