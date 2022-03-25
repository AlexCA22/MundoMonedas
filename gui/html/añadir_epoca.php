<?php $app = new App(); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>AÑADIR ÉPOCA</h2>
        </div>
    </div>
    <div style="margin-top:10%" class="row">
        <div class="col-12">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="nepoca">Nombre época:</label>
                    <input type="text" class="form-control" id="nepoca" name="nepoca" aria-describedby="nepoca" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="fepocai">Fecha inicio época </label>
                    <input type="text" class="form-control" id="fepocai" name="fepocai" aria-describedby="fepocai" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="fepocaf">Fecha final época </label>
                    <input type="text" class="form-control" id="fepocaf" name="fepocaf" aria-describedby="fepocaf" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="iepoca">Imagen época</label>
                    <input type="file" class="class=custom-file-input" id="iepoca" name="iepoca" required
                           accept="image/jpeg image/png">
                </div>
                <input type="hidden" name="func" value="2" >
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning">Resetear</button>
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