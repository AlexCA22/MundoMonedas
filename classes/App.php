<?php


class App
{
    /**
     * @param User $user
     * @return bool true si se han confirmado las validaciones y se ha subido el usuario a la bbdd
     * @throws Exception
     */
    public function validacionFinalUser (User $user) {
        $subido=false;
        $nombre=$user->getUser();
        $email=$user->getEmail();
        $bbdd = new BBDD();

        //valida duplicados
        $duplicatedUser=$bbdd->validateDuplicateUser($nombre);
        $duplicatedEmail=$bbdd->validateDuplicateEmail($email);

        //si no están duplicados...
        if ($duplicatedUser==true && $duplicatedEmail==true) {
            //se suben los datos a la bbdd
            $bbdd->uploadUser($user);
            $subido=true;
        }
        return $subido;
    }

   
    public function validarCompra ($saldo, $precio) {
        $validada=false;

        if ($saldo>$precio) {
            $validada=true;
        } else {
            $validada=false;
        }
        return $validada;
    }

 
    public function mostrarSelectMaterial () {
        $select="";
        $bbdd = new BBDD();
        $datos=$bbdd->selectMaterial();

        foreach ($datos as $valor) {
            $select.="<option value='$valor[COD]'> $valor[NOMBRE] </option>";
        }
        return $select;
    }
    public function mostrarSelectEpoca () {
        $select="";
        $bbdd = new BBDD();
        $datos=$bbdd->selectEpoca();

        foreach ($datos as $valor) {
            $select.="<option value='$valor[COD]'> $valor[NOMBRE] $valor[FECHAI]-$valor[FECHAF] </option>";
        }
        return $select;
    }
    public function mostrarSelectMoneda () {
        $select="";
        $bbdd = new BBDD();
        $datos=$bbdd->selectMoneda();

        foreach ($datos as $valor) {
            $select.="<option value='$valor[COD]'>$valor[VALOR] $valor[NOMBRE] ($valor[FECHA]) </option>";
        }
        return $select;
    }

  
    public function mostrarListadoMonedasAdmin () {
        $html="";
        $bbdd = new BBDD();
        $cod=$bbdd->listadoCodigosMonedas();
        $info=$bbdd->obtenerDatosMonedas($cod);

        foreach ($info as $valor) {
            $html.="<div  class='col-12 col-sm-4 text-center p-3'><img style='width: 90%; height:80%' class='' src=\"$valor[IMAGEN]\" alt='portada'/>
                      <p value=\"$valor[COD]\">$valor[VALOR] $valor[NOMBRE] <br>
                      $valor[FECHA]</p>
                      </div>";
        }
        return $html;
    }
    public function mostrarListadoMonedasBuscador () {
        $html="";
        $bbdd = new BBDD();
        $cod=$bbdd->listadoCodigosMonedasBuscador();
        $info=$bbdd->obtenerDatosMonedas($cod);

        foreach ($info as $valor) {
            $html.="<div  class='col-12 col-sm-4 text-center p-3'><img style='width: 90%; height:80%' class='' src=\"$valor[IMAGEN]\" alt='portada'/>
                      <form><button class='btn' name='ver' value=\"$valor[COD]\">$valor[VALOR] $valor[NOMBRE] <br>
                      $valor[FECHA]</button>
                      <input type='hidden' name='moneda' value=\"$valor[MONEDA]\">
                      <input type='hidden' name='func' value='6' /></form></div>";
        }
        return $html;
    }
    public function mostrarListadoMonedas () {
        $html="";
        $bbdd = new BBDD();
        $cod=$bbdd->listadoCodigosMonedas();
        $info=$bbdd->obtenerDatosMonedas($cod);

        foreach ($info as $valor) {
            $html.="<div  class='col-12 col-sm-4 text-center p-3'><img style='width: 90%; height:80%' class='' src=\"$valor[IMAGEN]\" alt='portada'/>
                      <form><button class='btn' name='ver' value=\"$valor[COD]\">$valor[VALOR] $valor[NOMBRE] <br>
                      $valor[FECHA]</button>
                      <input type='hidden' name='moneda' value=\"$valor[MONEDA]\">
                      <input type='hidden' name='func' value='6' /></form></div>";
        }
        return $html;
    }
   
    // mostramos las etapas
    public function mostrarCatalogoAdmin () {
        $html="";
        $bbdd = new BBDD();
        $cod=$bbdd->listadoCodigos();
        $info=$bbdd->obtenerDatosEpoca($cod);

        foreach ($info as $valor) {
            $html.="<div  class='col-sm-4 col-12 text-center p-3'><img style='width: 70%; height:86%' class='' src=\"$valor[IMAGEN]\" alt='portada'/>
                      <p value=\"$valor[COD]\">$valor[NOMBRE] <br> $valor[AÑOI] - $valor[AÑOF] </p>
                      <input type='hidden' name='epoca' value=\"$valor[EPOCA]\">
                      </div>";
        }
        return $html;
    }
    public function mostrarCatalogo () {
        $html="";
        $bbdd = new BBDD();
        $cod=$bbdd->listadoCodigos();
        $info=$bbdd->obtenerDatosEpoca($cod);

        foreach ($info as $valor) {
            $html.="<div  class='col-sm-4 col-12 text-center p-3'><img style='width: 70%; height:86%' class='' src=\"$valor[IMAGEN]\" alt='portada'/>
                      <form><button class='btn' name='ver' value=\"$valor[COD]\">$valor[NOMBRE] <br> $valor[AÑOI] - $valor[AÑOF] </button>
                      <input type='hidden' name='epoca' value=\"$valor[EPOCA]\">
                      <input type='hidden' name='func' value='5' /></form></div>";
        }
        return $html;
    }
    public function mostrarComentarios () {
        $html="";
        $bbdd = new BBDD();
        $cod=$bbdd->listadoCodigosComentarios();
        $info=$bbdd->obtenerDatosComentarios($cod);
        $html .="<h2 class='col-12 text-center p-3'>COMENTARIOS</h2>";
        foreach ($info as $valor) {
            $html.="<div style='border: 1px solid #000000;' class=' col-12 text-center p-3'>
                      <p  style='margin-left: 6%' value=\"$valor[COD]\"><h3 style='margin-left:15%'>$valor[NOMBRE]:</h3> <br> 
                      <div><p><img style='width: 180px; height:120px; float:left; margin-top:-20px' class='' src=\"$valor[IMAGEN]\" alt='portada'/></p>
                      <p> $valor[COMENTARIO]</p></div> </p>
                      <input type='hidden' name='epoca' value=\"$valor[EPOCA]\">
                      </div><br><br>";
        }
        return $html;
    }
    // public function mostrarComentarios ($cod_moneda) {
    //         $html="";
    //         $bbdd = new BBDD();
    //         $info=$bbdd->obtenerDatosComentarios($cod_moneda);
    //         $html .="<h2 class='col-12 text-center p-3'>COMENTARIOS</h2>";
    //         foreach ($info as $valor) {
    //             $html.="<div style='border: 1px solid #000000;' class=' col-12 text-center p-3'>
    //                       <p value=\"$valor[COD]\"><h3>$valor[NOMBRE]:</h3> <br> $valor[COMENTARIO] </p>
    //                       <input type='hidden' name='epoca' value=\"$valor[COD]\">
    //                       </div>";
    //         }
    //         return $html;
    //     }
   
// MOSTRAMOS LAS MONEDAS
    public function mostrarMonedas ($cod_moneda) {
        $html="";
        $bbdd = new BBDD();
        $monedasC=$bbdd->datoMonedasCobre($cod_moneda);
        $monedasP=$bbdd->datoMonedasPlata($cod_moneda);
        $monedasO=$bbdd->datoMonedasOro($cod_moneda);

        if($monedasC == true){
            foreach ($monedasC as $valor) {
                $html.="<div  class='col-12 col-sm-4 text-center p-3'><img style='width: 280px; height:120px' class='' src=\"$valor[MONEDA]\" alt='portada'/>
                <form><button class='btn' name='ver' value=\"$valor[COD]\">$valor[VALOR] $valor[NOMBRE]</button>
                <input type='hidden' name='moneda' value=\"$valor[COD]\">
                <input type='hidden' name='func' value='6' /></form></div><br><br>";
            }
        }
        if($monedasP == true){
            foreach ($monedasP as $valor) {
                $html.="<div  class='col-12 col-sm-4 text-center p-3'><img style='width: 280px; height:120px' class='' src=\"$valor[MONEDA]\" alt='portada'/>
                <form><button class='btn' name='ver' value=\"$valor[COD]\">$valor[VALOR] $valor[NOMBRE]</button>
                <input type='hidden' name='moneda' value=\"$valor[COD]\">
                <input type='hidden' name='func' value='6' /></form></div>";
            }
        }
        if($monedasO == true){
            foreach ($monedasO as $valor) {
                $html.="<br><br><div  class='col-12 col-sm-4 text-center p-3'><img style='width: 280px; height:120px' class='' src=\"$valor[MONEDA]\" alt='portada'/>
                <form><button class='btn' name='ver' value=\"$valor[COD]\">$valor[VALOR] $valor[NOMBRE]</button>
                <input type='hidden' name='moneda' value=\"$valor[COD]\">
                <input type='hidden' name='func' value='6' /></form></div>";
            }
        }

        return $html;
    }

  




    /**
     * gestiona la aplicación cuando no se está logueado
     * @throws Exception
     */
    public function logueo () {
        $user=$_REQUEST['user']??null;
        $password=$_REQUEST['password']??null;
        $email=$_REQUEST['email']??null;
        $btnRegistro=$_REQUEST['btnRegistro']??null;
        $registro=$_REQUEST['registro']??null;
        $login=$_REQUEST['login']??null;
        $bbdd = new BBDD();
        $vista = new Vista();

        /* registro */
        //si se han mandado los datos de registro
        if (isset($registro) && $registro==true) {
            $newUser = new User($user, $password, $email);
            //limpiamos los campos de user y email
            $userLimpio = $newUser->limpiarDato($user);
            $emailLimpio = $newUser->limpiarDato($email);
            $newUser->setNombre($userLimpio);
            $newUser->setEmail($emailLimpio);

            //se validan duplicados y en caso de no haber duplicados, se guarda el nuevo usuario
            $subida=$this->validacionFinalUser($newUser);

            if ($subida==true) {
                $_SESSION['login']="$userLimpio";
                $btnRegistro=null;
            }
        }
        //si se pulsa el enlace de "¿No tienes cuenta?" carga el formulario de registro
        if (isset($btnRegistro)) {
            $vista->printCabecera();
            $vista->printRgistro();
        }

        /** comprobación de usuario en caso de haber introducido datos en el formulario de log in **/
        //si hemos enviado los datos del formulario
        if(isset($_POST['login'])) {
            //validamos
            $validated=$bbdd->validateUser($user, $password);

            //si la validación es correcta
            if ($validated==true) {
                //si se ha accedido con el usuario administrador, se refleja en la sesión
                if ($user==="admin" || $user==="a") { 
                    $_SESSION['login']="admin";}
                else {
                    //se crea la sesión
                    $_SESSION['login']="$user";
                }
            }
        }
    }
    
    /**
     * Gestiona todo el movimiento entre ventanas una vez se ha completado el log in
     * @throws Exception
     */
    public function tienda () {
        $vista = new Vista();
        $func=$_REQUEST['func']??null;
        $money=$_REQUEST['money']??null; //manda saldo a añadir

        $vista->printCabecera();

        //si se ha conectado un administrador...
        if ($_SESSION['login']=="admin") {
            $vista->printEncabezadoAdmin();
            //dependiendo de la opción que seleccione el administrador, se pinta el código
            switch ($func) {
                case 0:
                    $vista->printAñadirM();
                    break;
                case 1:
                    //si se ha seleccionado una moneda para eliminarlo...
                    if (isset($_REQUEST['nmoneda'])) {
                        $bbdd = new BBDD();
                        $bbdd->borrarMoneda($_REQUEST['nmoneda']);
                    }
                    $vista->printBorrarM();
                    break;
                case 2:
                    //si se han enviado datos para subir una epoca a la bbdd...
                    if (isset($_REQUEST['nepoca'])) {
                        $this->gestionEpoca($_REQUEST['nepoca'], $_REQUEST['fepocai'],$_REQUEST['fepocaf'], $_REQUEST['iepoca']);
                    }
                    $vista->printAñadirE();
                    break;
                case 3:
                    if (isset($_REQUEST['nepoca'])) {
                        $bbdd = new BBDD();
                        $bbdd->borrarEpoca($_REQUEST['nepoca']);
                    }
                    $vista->printBorrarE();
                    break;
                    case 6:
                        $vista->printInfoMonedas();
                        break;
            }
        } else { //si se conecta un usuario, accede a la tienda
            $vista->printEncabezado();
            switch ($func) {
                case 0:
                    $vista->printPagBienvenida();
                    break;
                case 1:
                    $vista->printPagCatalogo();
                    break;
                case 2:
                    $vista->printPagGeneros();
                    break;
                case 3:
                    //si se han enviado los datos para añadir saldo...
                    if (isset($money) && isset($_REQUEST['user']) && $_REQUEST['user']===$_SESSION['login']) {
                        $bbdd = new BBDD();
                        $bbdd->addSalary( $_REQUEST['user'],$money);
                    }
                    $vista->printSaldo();
                    break;
                case 4:
                    $vista->printInfoMonedas();
                    break;
                case 5:
                    $vista->printMonedasRey();
                    break;
                case 6:
                    $vista->printInfoMonedas();
                    break;
                case 7:
                    if (isset($_REQUEST['ncoment'])) {
                        $this->gestionComentarios($_REQUEST['ncoment'], $_REQUEST['cc'],$_REQUEST['mon'],$_REQUEST['icom']);
                    }
                    $vista->printComentarios ();
                    break;
                
            }
        }
    }

    /**
     * pinta por pantalla la interfaz inicial de log in, la que se muestra cuando entramos a la aplicación o cuando
     * hacemos log out
     */
    public function logIn() {
        $vista = new Vista();
        $vista->printCabecera();
        $vista->printLogIn();
    }


   
    public function mostrarInfoMonedas ($cod_moneda) {
        $html="";
        $bbdd = new BBDD();
        $canciones=$bbdd->dataInfoMoneda($cod_moneda);

        foreach ($canciones as $valor) {
            $html.="<tr><td><div style='margin-top:10%' class='col-4 text-center p-3'><img style='width: 380px; height:200px ' class='' src=\"$valor[IMAGEN]\" alt='portada'/></td></div>
            <td><div style='float:center; margin-left:10%' class='col-6 text-center mt-5'value=\"$valor[COD]\"><h1> $valor[VALOR] $valor[NOMBRE]</h1><br>
            <h6>$valor[INFO]</h6><br>
            <h6>Precio: $valor[PRECIO]€</h6></div></td></tr>";
        }

        return $html;
    }
    // 
    // 

    public function mostrarInfoCompra (array $datos) {
        $html="";

        for ($i=0; $i<=2; $i++) {
            switch ($i) {
                case 0:
                    $html.="<tr><td><div style='margin-top:10%' class='col-12 col-xsm-12 col-lg-4  col-md-4 col-sm-12'><img style='width: 90%; height:auto% '  class='portada' src='$datos[imagen_moneda]' alt='portada'/></div></td>";
                    break;
                case 1:
                    $html.="<td><div style='float:center; margin-left:0%' class='col-12 col-lg-6 col-md-6 col-xsm-12 col-sm-12 text text-center mt-5'> <h1>$datos[valor_moneda] $datos[nombre_moneda]</h1>";
                    break;
                case 2:
                    $html.="<div style='float:center; margin-left:0%; text-align:left !important; font-size:25px !important' class='col-12 text-center mt-5'><h4>$datos[info_moneda]</h4> ";
                case 3:
                    $html.="<br><h4 style='text-align:center !important'>Precio: $datos[precio_moneda]€</h4></td></tr>";
                    break;
                
            }
        }
        return $html;
    }

 
    public function gestionDatosCompra() {
        //si se ha pulsado el botón de compra..
        if (isset($_REQUEST['compra'])) {
            $bbdd = new BBDD();
            //validamos si el usuario dispone del saldo y gestiona la compra
            $saldo=$bbdd->getSaldo($_SESSION['login']);
            $precio=$bbdd->getPrecioMoneda($_REQUEST['ver']);
            $compra=$this->validarCompra($saldo, $precio);
        }

        //si se ha seleccionado una moneda
        if (isset($_REQUEST['ver'])) {
            $bbdd = new BBDD();
            //obtenemos los datos de la moneda seleccionado y los mostramos
            $info=$bbdd->obtenerDatosCompra($_REQUEST['ver']);
            $datos=$this->mostrarInfoCompra($info);

            $datos.="<form style='text-align:center !important' action=\"index.php\" method=\"post\">
             <input type='hidden' name='func' value='4'> <input type='hidden' name='ver' value='$_REQUEST[ver]'>
             <input type='hidden' name='moneda' value='$_REQUEST[moneda]' ><br>
            <button name=\"compra\" class=\"btn btn-warning\">Comprar</button></form>";

            //si se ha realizado la compra, actualizamos datos de ventas y compras
            if (isset($compra)) {
                if ($compra==true) {
                    $nuevo_saldo=$saldo-$precio;
                    $bbdd->updateSalary($_SESSION['login'],$nuevo_saldo);
                    $bbdd->updateCompras( $_SESSION['login']);
                    $datos.="<h6 style='text-align:center !important' class='pt-2'>Compra realizada con éxito</h6></div>";
                } else {$datos.="<h6 style='text-align:center !important; color: red' class='pt-2' >No dispones del saldo suficiente para comprar esta moneda</h6></div>";}
            } else {
                $datos.="</div>";
            }
            
           
            

        }
     
        return $datos;
    }

   
    public function gestionMoneda () {
        // echo "hola";
        if (isset($_REQUEST['nmonedas'])) {
            $mon = new Moneda($_REQUEST['valor']??null,$_REQUEST['nmonedas']??null,$_REQUEST['fecha']??null, $_REQUEST['imoneda']??null , $_FILES['imagen']['tmp_name']??null, $_REQUEST['material']??null,  $_REQUEST['epocam']??null, $_REQUEST['precio']??null);
            //var_dump($mon);
            $nombreMon=$mon->limpiarDato($_REQUEST['nmonedas']); //limpiamos datos de código html y espacios en blanco
            // var_dump($jug);
            $mon->setNombre($nombreMon);

            //guardamos la imagen en el directorio correspondiente
            @rename($_FILES['imagen']['tmp_name'],"img/Monedas/{$_FILES['imagen']['name']}");
            @$foto="img/Monedas/{$_FILES['imagen']['name']}";
            // var_dump ($foto);
            @$foto=($foto);
            // var_dump ($foto);
            $mon->setImagen($foto);
    
            //subimos los datos a la bbdd
            $bbdd = new BBDD();
            $bbdd->subirMoneda($mon);
            
        }
    }
    public function gestionMonedas ($valor, $nombre, $fecha, $foto, $cod_epoca, $cod_material, $info, $precio) {
        if (strlen($nombre)<=255) {
            $competicion = new Moneda($valor, $nombre, $fecha, $foto, $cod_epoca, $cod_material, $info, $precio);
            //Guardamos el logo en el directorio correspondiente
            @rename($foto, "img/Monedas/$foto");
            @$foto="img/Monedas/$foto";
            @$foto=($foto);
            //var_dump ($logo);
            $competicion->setImagen($foto);
            $bbdd = new BBDD();
            $validar=$bbdd->validarMoneda($nombre);
            if ($validar==false) {
                //limpiamos los datos y se sube a la bbdd
                $competicion->limpiarMoneda($nombre);
                $bbdd->subirMoneda($competicion);
     
            }
        }
    }
    // public function gestionComentarios ($nombre, $comentario, $moneda) {
    //     if (strlen($nombre)<=300) {
    //         $comentarios = new Comentario($nombre, $comentario, $moneda);
          
    //         $bbdd = new BBDD();
    //         $validar=$bbdd->validarComentario($nombre);
    //         if ($validar==false) {
    //             //limpiamos los datos y se sube a la bbdd
    //             $comentarios->limpiarComentario($nombre);
    //             $bbdd->subirComentario($comentarios);
     
    //         }
    //     }
    // }
    public function gestionComentarios ($nombre, $comentario, $titulo, $foto) {
        if (strlen($nombre)<=255) {
            $comentarios = new Comentario($nombre, $comentario,$titulo, $foto);
            //Guardamos el logo en el directorio correspondiente
            @rename($foto, "img/Comentarios/$foto");
            @$foto="img/Comentarios/$foto";
            @$foto=($foto);
            //var_dump ($logo);
            $comentarios->setFoto($foto);
            $bbdd = new BBDD();
            $validar=$bbdd->validarEpoca($nombre);
            if ($validar==false) {
                //limpiamos los datos y se sube a la bbdd
                $comentarios->limpiarComentario($nombre);
                $bbdd->subirComentario($comentarios);
     
            }
        }
    }
    public function gestionEpoca ($nombre, $fecha_inicio, $fecha_final, $foto) {
        if (strlen($nombre)<=255) {
            $epocas = new Epoca($nombre, $fecha_inicio,$fecha_final, $foto);
            //Guardamos el logo en el directorio correspondiente
            @rename($foto, "img/Epocas/$foto");
            @$foto="img/Epocas/$foto";
            @$foto=($foto);
            //var_dump ($logo);
            $epocas->setFoto($foto);
            $bbdd = new BBDD();
            $validar=$bbdd->validarEpoca($nombre);
            if ($validar==false) {
                //limpiamos los datos y se sube a la bbdd
                $epocas->limpiarEpoca($nombre);
                $bbdd->subirEpoca($epocas);
     
            }
        }
    }
}
