<?php session_start();
@$sb = $_SESSION['project'];
if (!isset($sb) || empty($sb)) {
    echo 'esta vacia la cookie';
}else{
    
    echo "<br>con proj ".$sb['name'];
}
    
?>
