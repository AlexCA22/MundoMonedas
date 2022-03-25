<?php
$bbdd = new BBDD();
$app = new App();
?>

<div class="container pt-4">
    <div class="row">
        <?php
       
        $tablaMonedasRey=$app->mostrarMonedas($_REQUEST['ver']);
        echo $tablaMonedasRey;
        ?>
    </div>  
  <br><br><br>
</div>
