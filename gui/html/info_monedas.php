<?php
$bbdd = new BBDD();
$app = new App();
?>
 
<div class="container pt-4">
   
    <div style="font-size:15px !important"class="row">
        <?php
        $app = new App();
        $datos_compra=$app->gestionDatosCompra();
        echo $datos_compra;
        ?>

    </div>
</div>

<br><br>
<style>
    @media only screen and (max-width: 300px) {
        #ulfooter{
            margin-left:100px;
            margin-bottom: 10px;
        }
    }
</style>
<footer style=""id="footer">
    <div  id="divfooter"class="col-lg-12 col-sm-12">
        <ul id="ulfooter"style=" position:absolute; margin-right:0% !important; top:10px; bottom:0;border:0; width:100%" class="row">
            <li class="col-lg-5 col-sm-12">
                <a href="https://twitter.com/MonedaReino?t=899ZkdV1jesWhyzbDJa34g&s=09" target="_blank"> 
                    <img src="img/twitter2.png" alt="twitter">
                </a>
            </li>
            <li style=""class="col-lg-5 col-sm-12">
                ©reinomoneda.com</li>
            <li style=""class="col-lg-2 col-sm-12"><a href="gui/html/avisoslegales.php" target="_blank">Avisos Legales</a></li>

        </ul>
        
    </div>
    <br><br>
</footer>