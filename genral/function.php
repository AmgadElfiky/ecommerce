<?php

function auth(){
    if(!$_SESSION['admin']){
        header("location: /ecommerce/admin/login.php");
    }
}
  
function testMessage($condition, $mess){
    if($condition){
        echo"<div class='alert alert-success text-center mx-auto w-50'>
            <h5>$mess success</h5>
            </div>";
    }else{
        echo"<div class='alert alert-danger text-center mx-auto w-50'>
            <h5>$mess Failed</h5>
            </div>";
    }
}

?>