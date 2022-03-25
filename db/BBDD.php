<?php


class BBDD
{
    public const HOST="localhost";
    public const US="root";
    public const PW="";
    public const BBDD="numismatica";
    public $bbdd;

    /**
     * BBDD constructor.
     * @throws Exception muestra mensaje de error en el intento de conexión con la BBDD
     */
    public function __construct()
    {
        $this->bbdd = new mysqli();
        try {
            $this->bbdd->connect(self::HOST, self::US, self::PW, self::BBDD);
            $this->bbdd->query("SET NAMES 'utf8'");
        } catch (Exception $e) {
            $this->bbdd = null;
            throw new Exception ("Error de conexión".$e->getMessage());
        }
    }
    

    /**
     * cierra la conexión a la BBDD
     */
    public function __destruct()
    {
        $this->bbdd->close();
        $this->bbdd=null;
    }

   
        public function validateUser ($user, $password) {
            $validated=false;
            $passwordhash=hash('md5',$password);
            $sql=$this->bbdd->query("SELECT usuario, password FROM usuarios WHERE usuario LIKE '$user' AND password LIKE '$passwordhash'");
    
            if ($sql->num_rows==1) {
                $validated=true;
            } else {
                $validated=false;
            }
            return $validated;
        }
    

    public function validateDuplicateUser ($user) {
        $validated=true;
        $sql=$this->bbdd->query("SELECT usuario FROM usuarios WHERE usuario LIKE '$user'");

        if ($sql->num_rows==1) {
            $validated=false;
        }
        return $validated;
    }

  
    public function validateDuplicateEmail ($email) {
        $validated=true;
        $sql=$this->bbdd->query("SELECT email FROM usuarios WHERE email LIKE '$email'");

        if ($sql->num_rows==1) {
            $validated=false;
        }
        return $validated;
    }
    
    public function validarMoneda ($nombre) {
        $validar=false;
        $sql=$this->bbdd->query("SELECT nombre_moneda FROM monedas WHERE nombre_moneda LIKE '$nombre'");

    }
    public function validarComentario ($nombre) {
        $validar=false;
        $sql=$this->bbdd->query("SELECT nombre_usuario FROM comentarios WHERE nombre_usuario LIKE '$nombre'");

    }

    public function validarEpoca ($nombre) {
        $validar=false;
        $sql=$this->bbdd->query("SELECT nombre_epoca FROM epocas WHERE nombre_epoca LIKE '$nombre'");

    }
  
    public function uploadUser (User $user) {
        $nombre=$user->getUser();
        $clave=$user->getClave();
        $clavehash=hash('md5',$clave);
        $email=$user->getEmail();

        $sql=$this->bbdd->query("INSERT INTO usuarios (usuario, password, email) VALUES ('$nombre', '$clavehash', '$email')");
    }
    public function listadoCodigosComentarios () {
        $ret=[];
        $sql=$this->bbdd->query("SELECT cod_comentario FROM comentarios ORDER BY cod_comentario DESC ");

        foreach ($sql as $valor) {
            $ret[]=$valor['cod_comentario'];
        }
        return $ret;
    }

    // Codigo éepoca
    public function listadoCodigos () {
        $ret=[];
        $sql=$this->bbdd->query("SELECT cod_epoca FROM epoca ORDER BY año_inicio ASC");

        foreach ($sql as $valor) {
            $ret[]=$valor['cod_epoca'];
        }
        return $ret;
    }
 // Codigo monedas
 public function listadoCodigosMonedas () {
    $ret=[];
    $sql=$this->bbdd->query("SELECT cod_moneda FROM monedas ORDER BY fecha_acuñacion ASC");

    foreach ($sql as $valor) {
        $ret[]=$valor['cod_moneda'];
    }
    return $ret;
}
public function listadoCodigosMonedasBuscador () {
    $ret=[];
    $sql=$this->bbdd->query("SELECT cod_moneda FROM monedas WHERE nombre_moneda LIKE '%buscar%'");

    foreach ($sql as $valor) {
        $ret[]=$valor['cod_moneda'];
    }
    return $ret;
}
    public function selectMoneda () {
        $ret=[];

        $sql=$this->bbdd->query("SELECT cod_moneda, valor_moneda, nombre_moneda, fecha_acuñacion FROM monedas");

        foreach ($sql as $indice => $valor) {
            $ret[]=array("COD" => $valor['cod_moneda'], "VALOR" => $valor['valor_moneda'], "NOMBRE" => $valor['nombre_moneda'], "FECHA" => $valor['fecha_acuñacion']);
        }
        return $ret;
    }
    public function selectEpoca() {
        $ret=[];

        $sql=$this->bbdd->query("SELECT cod_epoca, nombre_epoca, año_inicio, año_final FROM epoca ORDER BY año_inicio ASC");

        foreach ($sql as $indice => $valor) {
            $ret[]=array("COD" => $valor['cod_epoca'], "NOMBRE" => $valor['nombre_epoca'],  "FECHAI" => $valor['año_inicio'], "FECHAF" => $valor['año_final']);
        }
        return $ret;
    }
    public function selectMaterial() {
        $ret=[];

        $sql=$this->bbdd->query("SELECT cod_material, nombre_material FROM material");

        foreach ($sql as $indice => $valor) {
            $ret[]=array("COD" => $valor['cod_material'], "NOMBRE" => $valor['nombre_material']);
        }
        return $ret;
    }
/* funciones de saldo*/
    /**
     * @param $user (se le pasa un usuario)
     * @return int|mixed (devuelve el saldo del que dispone en el momento)
     */
    public function getSaldo ($user) {
        $saldo=0;
        $sql=$this->bbdd->query("SELECT saldo FROM usuarios WHERE usuario LIKE '$user'");

        foreach ($sql as $valor) { $saldo=$valor['saldo']; }

        return $saldo;
    }

    /**
     * @param $user (usuario al que se la va a añadir saldo)
     * @param $money (cantidad a añadir)
     * añade saldo a la cuenta de usuario con la que se ha iniciado sesión
     */
    public function addSalary ($user,$money) {
        if (isset($user)) {
            $saldo_previo=$this->getSaldo($user);
            if (is_numeric($money)) {
                $saldo_nuevo=$saldo_previo+$money;
                $this->bbdd->query("UPDATE usuarios SET saldo='$saldo_nuevo' WHERE usuario LIKE '$user'");
            }
        }
    }
 
    public function obtenerDatosMonedas (array $cod) {
        $ret=[];

        foreach ($cod as $valor) {
            $sql=$this->bbdd->query("SELECT nombre_moneda, valor_moneda, imagen_moneda, fecha_acuñacion, cod_moneda FROM monedas WHERE cod_moneda LIKE '$valor' ");
            foreach ($sql as $data) {
                $ret[]=array("COD" => $valor, "NOMBRE" => $data['nombre_moneda'],"VALOR" => $data['valor_moneda'], "IMAGEN" => $data['imagen_moneda'], "FECHA" => $data['fecha_acuñacion'],
                    "MONEDA" => $data['cod_moneda']);
            }
        }
        return $ret;
    }
    public function obtenerDatosComentarios (array $cod) {
        $ret=[];

        foreach ($cod as $valor) {
            $sql=$this->bbdd->query("SELECT DISTINCT nombre_usuario, comentario, imagen, titulo, cod_comentario FROM comentarios WHERE cod_comentario LIKE '$valor' ");
            foreach ($sql as $data) {
                $ret[]=array("COD" => $valor, "NOMBRE" => $data['nombre_usuario'],"COMENTARIO" => $data['comentario'],"TITULO" => $data['titulo'],"IMAGEN" => $data['imagen'], "EPOCA" => $data['cod_comentario']);
            }
        }
        return $ret;
    }

      // Datos catalogo epoca
    public function obtenerDatosEpoca (array $cod) {
        $ret=[];

        foreach ($cod as $valor) {
            $sql=$this->bbdd->query("SELECT nombre_epoca, año_inicio, año_final, imagen_epoca, cod_epoca FROM epoca WHERE cod_epoca LIKE '$valor' ");
            foreach ($sql as $data) {
                $ret[]=array("COD" => $valor, "NOMBRE" => $data['nombre_epoca'],"AÑOI" => $data['año_inicio'],"AÑOF" => $data['año_final'], "IMAGEN" => $data['imagen_epoca'],"EPOCA" => $data['cod_epoca']);
            }
        }
        return $ret;
    }
    public function dataInfoMoneda ($cod_moneda) {
        $ret=null;
        $sql=$this->bbdd->query("SELECT cod_moneda, nombre_moneda, info_moneda, valor_moneda, precio_moneda, imagen_moneda FROM monedas WHERE cod_moneda='$cod_moneda' ");

        foreach ($sql as $valor) {$ret[]=array("COD" => $valor['cod_moneda'],"PRECIO" => $valor['precio_moneda'],"IMAGEN" => $valor['imagen_moneda'],"INFO" => $valor['info_moneda'],"VALOR" => $valor['valor_moneda'], "NOMBRE" => $valor['nombre_moneda'] );}

        return $ret;
    }
    // Esto vale
    public function datoMonedasCobre ($cod_moneda) {
        $ret=null;
        $sql=$this->bbdd->query("SELECT cod_moneda, nombre_moneda, valor_moneda, imagen_moneda FROM monedas WHERE cod_epoca='$cod_moneda' AND material_moneda=1 ORDER BY material_moneda ASC");

        foreach ($sql as $valor) {$ret[]=array("COD" => $valor['cod_moneda'],"MONEDA" => $valor['imagen_moneda'],"VALOR" => $valor['valor_moneda'], "NOMBRE" => $valor['nombre_moneda'] );}

        return $ret;
    }
    public function datoMonedasPlata ($cod_moneda) {
        $ret=null;
        $sql=$this->bbdd->query("SELECT cod_moneda, nombre_moneda, valor_moneda, imagen_moneda FROM monedas WHERE cod_epoca='$cod_moneda' AND material_moneda=2 ORDER BY material_moneda ASC");

        foreach ($sql as $valor) {$ret[]=array("COD" => $valor['cod_moneda'],"MONEDA" => $valor['imagen_moneda'],"VALOR" => $valor['valor_moneda'], "NOMBRE" => $valor['nombre_moneda'] );}

        return $ret;
    }
    public function datoMonedasOro ($cod_moneda) {
        $ret=null;
        $sql=$this->bbdd->query("SELECT cod_moneda, nombre_moneda, valor_moneda, imagen_moneda FROM monedas WHERE cod_epoca='$cod_moneda' AND material_moneda=3 ORDER BY material_moneda ASC");

        foreach ($sql as $valor) {$ret[]=array("COD" => $valor['cod_moneda'],"MONEDA" => $valor['imagen_moneda'],"VALOR" => $valor['valor_moneda'], "NOMBRE" => $valor['nombre_moneda'] );}

        return $ret;
    }

    // Actualiza el salario del usuario
    public function updateSalary ($user, $money) {
        $this->bbdd->query("UPDATE usuarios SET saldo='$money' WHERE usuario LIKE '$user'");
    }

    // muestra el  precio de la moneda
    public function getPrecioMoneda ($cod_moneda) {
        $precio=0;

        $sql=$this->bbdd->query("SELECT precio_moneda FROM monedas WHERE cod_moneda LIKE '$cod_moneda'");

        foreach ($sql as $valor) {$precio=$valor['precio_moneda'];}
        return $precio;
    }

//    Obtiene el numero de compras del usuario
    public function obtainCompras ($user) {
        $compras="";
        $sql=$this->bbdd->query("SELECT n_compras FROM usuarios WHERE usuario LIKE '$user'");

        foreach ($sql as $valor) {$compras=$valor['n_compras'];}

        return $compras;
    }

    // Actualiza las compreas del usuario
    public function updateCompras ( $user) {
       
        $comprasUser=$this->obtainCompras($user); //obtenemos las compras del usuario

        
        $n_compras=$comprasUser + 1;

        $actualizacionCompras=$this->bbdd->query("UPDATE usuarios SET n_compras='$n_compras' WHERE usuario LIKE '$user'");
    }


//   borramos moneda
    public function borrarMoneda ($cod) {
        $sql=$this->bbdd->query("DELETE FROM monedas WHERE cod_moneda LIKE '$cod'");
    }
    //   borramos epoca
    public function borrarEpoca ($cod) {
        $sql=$this->bbdd->query("DELETE FROM epoca WHERE cod_epoca LIKE '$cod'");
    }


    /**
     * valida si la imagen pasada está duplicada, para no subir duplicaciones a la base de datos
     * @param $img (ruta de la imagen a validar)
     * @return bool (true si no hay duplicados, false en caso contrario)
     */
    public function validarRuta ($img) {
        $validado=true;
        $sql=$this->bbdd->query("SELECT imagen_moneda FROM monedas");

        foreach ($sql as $valor) {if ($valor['imagen_moneda']==$img) {$validado=false;}}

        return $validado;
    }

     /**
     * @param $user (se le pasa un nombre de usuario)
     * @return int|mixed (devuelve el número de compras que ha realizado)
     */
    public function getCompras ($user) {
        $compras=0;
        $sql=$this->bbdd->query("SELECT n_compras FROM usuarios WHERE usuario LIKE '$user'");

        foreach ($sql as $valor) { $compras=$valor['n_compras']; }

        return $compras;
    }


    // public function  subirComentario (Comentario $nombreC) {
    //     if ($nombreC instanceof Comentario) {
    //         $nombre=$nombreC->getNombre();
    //         $comentario= $nombreC->getComentario();
    //         $moneda=$nombreC->getMoneda();
    //         $sql=$this->bbdd->query("INSERT INTO comentarios ( nombre_usuario ,comentario,moneda) 
    //         VALUES ( \"$nombre\",'$comentario', '$moneda')");
    //     }
    // }
   
    public function subirComentario (Comentario $nombreC){
        $correcto=false;
        if ($nombreC instanceof Comentario) {
            $foto=$nombreC->getFoto();
            //var_dump ($foto);
            if ($this->validarRuta($foto)==true) {
                $nombre=$nombreC ->getNombre();
                $comentario=$nombreC ->getComentario();
                $titulo=$nombreC ->getTitulo();
                $foto=$nombreC ->getFoto();
                //var_dump($titulo);
                $sql=$this->bbdd->query("INSERT INTO comentarios ( nombre_usuario ,comentario,  imagen, titulo) 
                VALUES ( \"$nombre\",'$comentario', '$foto','$titulo' )");
                if ($sql==true) {
                    $correcto=true;
                }
            } else {
                $correcto=false;
            }
        } else {
            $correcto=false;
        }
        return $correcto;
    }

    public function subirEpoca (Epoca $nombreE) {
        $correcto=false;
        if ($nombreE instanceof Epoca) {
            $foto=$nombreE->getFoto();
            //var_dump ($foto);
            if ($this->validarRuta($foto)==true) {
                $nombre=$nombreE->getNombre();
                $fechaI=$nombreE->getFechaI();
                $fechaF=$nombreE->getFechaF();
                $foto=$nombreE->getFoto();
                $sql=$this->bbdd->query("INSERT INTO epoca (nombre_epoca ,año_inicio, año_final, imagen_epoca) 
                VALUES (\"$nombre\", '$fechaI', '$fechaF','$foto')");
                if ($sql==true) {
                    $correcto=true;
                }
            } else {
                $correcto=false;
            }
        } else {
            $correcto=false;
        }
        return $correcto;
    }
  
    public function subirMoneda (Moneda $nombreM) {
        $correcto=false;
        if ($nombreM instanceof Moneda) {
            $foto=$nombreM->getImagen();
            //var_dump ($foto);
            if ($this->validarRuta($foto)==true) {
                $nombre=$nombreM->getNombre();
                $valor= $nombreM->getValor();
                $fecha=$nombreM->getFecha();
                $info_moneda=$nombreM->getInfo();
                $foto=$nombreM->getImagen();
                $precio=$nombreM->getPrecio();
                $cod_epoca=$nombreM->getCodMaterial();
                $cod_material=$nombreM->getCodEpoca();
                $sql=$this->bbdd->query("INSERT INTO monedas (valor_moneda, nombre_moneda ,fecha_acuñacion, info_moneda, imagen_moneda, cod_epoca, material_moneda, precio_moneda) 
                VALUES ('$valor', \"$nombre\",'$fecha', '$info_moneda','$foto', '$cod_epoca', '$cod_material' ,'$precio')");
                if ($sql==true) {
                    $correcto=true;
                }
            } else {
                $correcto=false;
            }
        } else {
            $correcto=false;
        }
        return $correcto;
    }
   
   
   
   

  


    public function obtenerDatosCompra ($cod_moneda) {
        $ret=[];
        $sql=$this->bbdd->query("SELECT imagen_moneda, valor_moneda, nombre_moneda, info_moneda, precio_moneda FROM monedas WHERE cod_moneda LIKE '$cod_moneda'");

        foreach ($sql as $valor) {$ret=$valor;}

        return $ret;
    }

}