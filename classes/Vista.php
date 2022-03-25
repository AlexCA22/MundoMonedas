<?php

class Vista
{
    /**
     * imprime el código html correspondiente a la cabecera
     */
    public function printCabecera () {
        include 'gui/html/cabecera.html';
    }

    /**
     * imprime el código html correspondiente al footer
     */
    public function printFooter () {
        include 'gui/html/footer.php';
    }
    public function printFooter2 () {
        include 'gui/html/footer2.php';
    }

    /**
     * imprime el código html de la página de log in
     */
    public function printLogIn () {
        include 'gui/html/logIn.html';
    }

    public function printRgistro () {
        include 'gui/html/registro.html';
    }

    public function printEncabezado ()
    {
        include 'gui/html/encabezado.html';
    }

    public function printEncabezadoAdmin () {
        include 'gui/html/encabezado_admin.html';
    }

    public function printAñadirM () {
        include 'gui/html/añadir_moneda.php';
    }

    public function printBorrarM () {
        include 'gui/html/borrar_moneda.php';
    }

    public function printSaldo () {
        include 'gui/html/saldo.php';
    }

    public function printPagGeneros () {
        include 'gui/html/monedas.php';
    }
    public function printComentarios () {
        include 'gui/html/comentarios.php';
    }
    public function printPagCatalogo () {
        include 'gui/html/catalogo.php';
    }

    /**
     * imprime el código html de la página de bienvenida tras hacer log in
     */
    public function printPagBienvenida () {
        include 'gui/html/bienvenida.html';
    }
    public function printInfoMonedas () {
        include 'gui/html/info_monedas.php';
    }


    public function printMonedasRey () {
        include 'gui/html/monedasrey.php';
    }

    public function printAñadirE () {
        include 'gui/html/añadir_epoca.php';
    }

    public function printBorrarE() {
        include 'gui/html/borrar_epoca.php';
    }
}