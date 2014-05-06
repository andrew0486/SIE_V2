<?php 
$py = $_SESSION['save_py'];
if ((isset($py) && !empty($py))){
?>
<script type="text/javascript"> 
var PreventExitSplash=false; 
var exitsplashalertmessage = 'Al abandonar o recargar esta página se perdera la informacion ingresada'; 
var exitsplashmessage = 'Al abandonar o recargar esta página se perderán los datos ingresados en el actual formulario.';
function DisplayExitSplash() { 
    if (PreventExitSplash == false) { 
        window.scrollTo(0, 0); 
        window.alert(exitsplashalertmessage); 
       //aquí ponés el código para mostrar una capa con un iframe que apunte a la página que necesites mostrar 
        return exitsplashmessage; 
    }
} 
window.onbeforeunload=DisplayExitSplash; 
</script>
<?php } ?>