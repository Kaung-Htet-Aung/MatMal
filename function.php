<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
function alertMessage() {

    if (isset($_SESSION['status'])) {
      
        $message='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . $_SESSION['status'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    
                </button>
            </div>
        ';
        echo $message;       
         unset($_SESSION['status']);
    } 
   
}

function checkParam($param) {
    if(isset($_GET[$param])){
        if($_GET[$param]!=''){
            return $_GET[$param];
        }else{
            return false;
        }
    }
}

function logout(){
    unset($_SESSION['loggedInUser']);
    unset($_SESSION['loggedIn']);
}
?>
