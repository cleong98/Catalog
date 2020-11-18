<?php 
 function JsAlert($msg) {
    echo '<script> 
    window.alert(" ' . $msg . ' ");
    </script>';

}

function redirect($url)  {
    echo '<script> 
    window.location = " ' .$url . ' "
    </script>';
}


?>