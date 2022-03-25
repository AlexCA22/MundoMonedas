<div class="container py-3">
    <div class="row">
        <div class="col-12 text-center">
            <h2>BORRAR ÉPOCA</h2>
        </div>
    </div>
    <div style="margin-top:10%" class="row">
        <div class="col-12">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="nepoca">Borrar época</label>
                    <select id="nepoca" name="nepoca" required>
                        <option selected disabled>Selecciona una época</option>
                        <?php
                        $app = new App();
                        try {
                            $options=$app->mostrarSelectEpoca();
                            echo $options;
                        } catch (Exception $exception) {
                            $exception->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="func" value="3" >
                <button type="submit" class="btn btn-primary">Borrar</button>
            </form>
        </div>
    </div>
    <div class="container py-3">
    
    <div class="row">
        <?php
        $app = new App();
        $catalogo=$app->mostrarCatalogoAdmin();
        echo $catalogo;
        ?>
    </div>
</div>
</div>
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