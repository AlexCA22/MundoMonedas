<div class="container py-3">

    <div class="row">
        <?php
        $app = new App();
        $catalogo=$app->mostrarComentarios();
        echo $catalogo;
        ?>
    </div>