<div class="container py-3">
    <div class="row">
        <div class="col-12 text-center">
            <h2>BORRAR MONEDA</h2>
        </div>
    </div>
    <div style="margin-top:10%" class="row">
        <div class="col-12">
            <form>
                <div class="form-group">
                    <label for="nmoneda">Borrar moneda</label>
                    <select id="nmoneda" name="nmoneda" required>
                        <option selected disabled>Selecciona una moneda</option>
                        <?php
                        $app = new App();
                        try {
                            $options=$app->mostrarSelectMoneda();
                            echo $options;
                        } catch (Exception $exception) {
                            $exception->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="func" value="1" >
                <button type="submit" class="btn btn-primary">Borrar</button>
            </form>
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
<style>
    @media only screen and (max-width: 300px) {
        #ulfooter{
            margin-left:100px;
            margin-bottom: 10px;
        }
    }
</style>
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