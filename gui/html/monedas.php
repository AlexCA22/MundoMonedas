<div class="container py-3">
<div class="row">
        <div class="col-12 text-center">
            <h2>CATÁLOGO DE MONEDAS</h2>
         
        </div>
    </div>
    <div class="row">
        <?php
        $app = new App();
        $listadoMonedas=$app->mostrarListadoMonedas();
            echo $listadoMonedas;
        ?>
    </div>
    
</div>
<footer style=""id="footer">
            <div  class="col-lg-12">
                <ul style=" position:absolute; margin-right:0% !important; top:10px; bottom:0;border:0; width:100%" class="row">
                    <li class="col-lg-5">
                        <a href="https://twitter.com/MonedaReino?t=899ZkdV1jesWhyzbDJa34g&s=09" target="_blank"> 
                            <img src="img/twitter2.png" alt="twitter">
                        </a>
                    </li>
                    <li style=""class="col-lg-5">
                        ©reinomoneda.com</li>
                    <li style=""class="col-lg-2"><a href="gui/html/avisoslegales.php" target="_blank">Avisos Legales</a></li>

                </ul>
            </div>
          
        </footer>	
