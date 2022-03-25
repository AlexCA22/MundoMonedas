<?php $app = new App(); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Añadir Moneda</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="valor">Valor Moneda</label>
                    <input type="text" class="form-control" id="valor" name="valor" aria-describedby="valor" required>
                </div>
                <div class="form-group">
                    <label for="nmonedas">Nombre moneda</label>
                    <input type="text" class="form-control" id="nmonedas" name="nmonedas" aria-describedby="nmonedas" required>
                </div>
                <div class="form-group">
                    <label for="imoneda">Informacion moneda</label>
                    <input type="text" class="form-control" id="imoneda" name="imoneda" aria-describedby="imoneda" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha acuñación </label>
                    <input type="text" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div style="margin-left:-2%"class="form-group form-check">
                    <label for="precio">Precio moneda</label>  &nbsp; &nbsp; &nbsp;
                    <input type="number" min="5" max="1000" step="0.01" class="form-check-input"
                           id="precio" name="precio" required>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="class=custom-file-input" id="imagen" name="imagen" required
                           accept="image/jpeg image/png">
                </div>
                <div class="form-group">
                    <label for="material">Material</label>
                    <select id="material" name="material" required>
                        <option selected disabled>Seleccione Material</option>
                        <?php
                        $app = new App();
                        try {
                            $options=$app->mostrarSelectMaterial();
                            echo $options;
                        } catch (Exception $exception) {
                            $exception->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="epocam">Epoca</label>
                    <select id="epocam" name="epocam" required>
                        <option selected disabled>Seleccione Epoca</option>
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
               
                <input type="hidden" name="func" value="0" >
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning">Resetear</button>
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