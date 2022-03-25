<?php $bbdd = new BBDD(); ?>
<section>
    <div class="container py-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>INGRESE SU DINERO</h1>
            </div>
        </div>
        
        <div style="margin-top:5%"class="row">
            <div class="col-12">
                <form>
                    <div class="form-group form-check">
                    <label class="form-check-label" for="inputUser">Usuario</label>
                        <input type="text" name="user" class="form-control" id="inputUser" required>
                        
                    </div>
                    <div class="form-group form-check">
                    <label class="form-check-label" for="inputSaldo">¿Cuanto desaea ingresar? (€)</label>
                        <input type="number" class="form-control" id="inputSaldo" min="10" max="500" step="0.01" name="money" required>

                    </div>
                    <input type="hidden" name="func" value="3">
                    <button style="margin-left:2%" type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
            <div class="col-12 text-center">
            <br>
                <!-- muestra el salario actual del que dispone el usuario y sus compras-->
                <h5>Salario actual: </h5> <?php echo $bbdd->getSaldo($_SESSION['login']).'€'; ?>
                <h5>¿Cuantas monedas has comprado?</h5> <?php echo $bbdd->getCompras($_SESSION['login']); ?>
            </div>
        </div>
    </div>
</section>
<hr>
<?php $app = new App(); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>AÑADIR COMENTARIO</h2>
        </div>
    </div>
    <div style="margin-top:5%" class="row">
        <div class="col-12">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="ncoment">Nombre usuario:</label>
                    <input type="text" class="form-control" id="ncoment" name="ncoment" aria-describedby="ncoment" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="mon">Moneda</label>
                    <input type="text" class="form-control" id="mon" name="mon" aria-describedby="mon" maxlength="300" required>
                </div>
                <div class="form-group">
                    <label for="cc">Comentario</label>
                    <input type="text" class="form-control" id="cc" name="cc" aria-describedby="cc" maxlength="300" required>
                </div>
                <div class="form-group">
                    <label for="icom">Imagen época</label>
                    <input type="file" class="class=custom-file-input" id="icom" name="icom" required
                           accept="image/jpeg image/png">
                </div>
                <input type="hidden" name="func" value="7" >
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning">Resetear</button>
            </form>
        </div>
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