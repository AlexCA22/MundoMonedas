-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2021 a las 20:14:29
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `numismatica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `cod_comentario` int(255) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `comentario` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`cod_comentario`, `nombre_usuario`, `comentario`, `imagen`, `titulo`) VALUES
(28, 'Mario', 'Esta moneda de 4 maravedis del año 1990 tiene muy buen diseño, lo recomiendo!!1', 'img/Comentarios/prueba.jpg', 'prueba.jpg'),
(33, 'Luis', 'Muy contento de esta moneda, la recominedo para novatos', 'img/Comentarios/prueba1.jpg', 'prueba1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epoca`
--

CREATE TABLE `epoca` (
  `cod_epoca` int(11) NOT NULL,
  `nombre_epoca` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `año_inicio` int(255) NOT NULL,
  `año_final` int(255) NOT NULL,
  `imagen_epoca` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `epoca`
--

INSERT INTO `epoca` (`cod_epoca`, `nombre_epoca`, `año_inicio`, `año_final`, `imagen_epoca`) VALUES
(1, 'Carlos I', 1516, 1556, 'img/Epocas/CarlosI.png'),
(2, 'Felipe II', 1556, 1598, 'img/Epocas/FelipeII.png'),
(3, 'Felipe III', 1598, 1621, 'img/Epocas/FelipeIII.png'),
(4, 'Felipe IV', 1621, 1665, 'img/Epocas/FelipeIV.png'),
(5, 'Carlos II', 1665, 1700, 'img/Epocas/CarlosII.png'),
(6, 'Felipe V', 1700, 1746, 'img/Epocas/FelipeV.png'),
(7, 'Carlos III', 1759, 1788, 'img/Epocas/CarlosIII.png'),
(9, 'Fernando VII', 1808, 1833, 'img/Epocas/FernandoVII.png'),
(10, 'Isabel II', 1833, 1871, 'img/Epocas/IsabelII.png'),
(11, 'Alfonso XII', 1874, 1885, 'img/Epocas/AlfonsoXII.png'),
(12, 'Alfonso XIII', 1885, 1931, 'img/Epocas/AlfonsoXIII.png'),
(13, 'II República', 1931, 1939, 'img/Epocas/IIRepublica.png'),
(14, 'Francisco Franco', 1939, 1975, 'img/Epocas/Franco.png'),
(15, 'Juan Carlos I', 1975, 2014, 'img/Epocas/JuanCarlosI.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `cod_material` int(11) NOT NULL,
  `nombre_material` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`cod_material`, `nombre_material`) VALUES
(1, 'Cobre'),
(2, 'Plata'),
(3, 'Oro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE `monedas` (
  `cod_moneda` int(11) NOT NULL,
  `valor_moneda` int(25) NOT NULL,
  `nombre_moneda` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `material_moneda` int(25) NOT NULL,
  `fecha_acuñacion` int(25) NOT NULL,
  `cod_epoca` int(25) NOT NULL,
  `imagen_moneda` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `info_moneda` mediumtext COLLATE utf8_spanish2_ci NOT NULL,
  `precio_moneda` decimal(35,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`cod_moneda`, `valor_moneda`, `nombre_moneda`, `material_moneda`, `fecha_acuñacion`, `cod_epoca`, `imagen_moneda`, `info_moneda`, `precio_moneda`) VALUES
(1, 4, 'Maravedis', 1, 1542, 1, 'img/Monedas/4MaravedisCI.png', 'Esta moneda es un 4 Maravedís del reinado de Carlos I. Fue una moneda acuñada en el año 1542, hecha de cobre. La pieza presenta los típicos defectos de las primeras acuñaciones del Nuevo Mundo y, este ejemplar en concreto, parece haber resistido al paso de los siglos e incluso, conserva una tonalidad marrón atractiva. Cuando admiramos esta pieza nos sumergimos en los tiempos del descubrimiento de América, los viajes de Cristóbal Colón y la expansión por el continente a manos de los grandes conquistadores que dieron gloria y riquezas al Reino de España en su camino a convertirse en el mayor imperio que ha visto el mundo, un imperio en el que “nunca se ponía el sol”. En lo que respecta, este es el primer ejemplar con la variante del “4” arábigo en el lado izquierdo del anverso.', '70.00'),
(18, 4, 'Ducados', 3, 1526, 1, 'img/Monedas/4DucadosCI.png', 'Los Reyes Católicos reformaron el sistema monetario de la Corona de Castilla. El ducado de oro español tiene un peso de 3,6 g (ley 23 3/4 quilates), fue la moneda unitaria de oro (medio doblón) y fue una de las unidades de cuenta durante los siglos XVI y XVII.5​ Fue por primera vez acuñado por los Reyes Católicos, con el nombre de Excelente de Granada, recibiendo después el nombre de ducado, y según el «Cuaderno de Ordenanzas de la labor de las monedas», también conocido como la «Real Pragmática de Medina del Campo», de 13 de junio de 1497, equivalía a 11 reales castellanos y 1 maravedí o bien 375 maravedíes (1500 cornados).6​  En 1536 se introdujo una nueva moneda de oro de menos peso y ley que el ducado, pasando a tener una ley de 22 quilates, con la finalidad de igualar la moneda de oro castellana a la de otros países y evitar su fuga al exterior.[cita requerida] Dicha moneda fue el escudo o corona (350 maravedíes), con lo que el ducado dejó de acuñarse y se convirtió en moneda de cuenta. Los Reyes Católicos fijaron un límite máximo a la cantidad de vellón circulante, con lo que establecieron un sistema estable que funcionó prácticamente durante todo el siglo XVI.[cita requerida] En 1548 Carlos I autoriza una mayor cantidad de vellón y en 1552 reduce su contenido de plata de 7 a 5 1/2 granos de ley.[cita requerida]  El ducado del siglo XVI y de comienzos del siglo XVII, tendría una equivalencia actual a unos 167,1 euros (según el precio del oro en peso y calidad).', '500.00'),
(19, 1, 'Peseta', 2, 1860, 10, 'img/Monedas/1PesetaIsII.png', 'Las acuñaciones de la moneda de 1 Peseta en plata, y calderilla de 3 y 6 cuartos en cobre, se iniciaron el 11 de septiembre de 1836, en la Ceca de Barcelona, durante la I Guerra Carlista (1833-1840). A esta peseta, se le llamará “la peseta de los Peseteros”. Los Carlistas empezaron a llamar a los Soldados Isabelinos, Peseteros, por el pago que recibían. Estas pesetas se acuñaron a Volante. Su canto era añadido a Cerrilla. Los ensayadores fueron Francisco Paradaltas y Simeón Sala i Roca. En las Pesetas de 1836 y 1837, encontré lo que a continuación expongo.', '34.00'),
(20, 1, 'Croat', 2, 1538, 1, 'img/Monedas/1CroatCI.png', 'El croat fue una moneda de plata de la corona de Aragón creada en 1285 por el rey Pedro III, llamado el Grande, hijo de Jaime I el Conquistador. Se conoció como \"croat barceloní\" y tambien como \"xamberg\". Estas monedas se caracterizan por la existencia de una cruz patada equilátera en su reverso, de donde viene su nombre. Los croats se fabricaron de manera regular en Barcelona y Perpiñán y eventualmente también en Tortosa. Los últimos croats se acuñaron en Barcelona en 1705 y 1706, primero a nombre de Felipe V de Borbón y posteriormente a nombre del pretendiente Carlos III de Austria. Con casi 500 años de historia, el croat fue una de las monedas catalanas de mayor utilización y más larga duración. Su valor era equivalente a un real castellano.  Hace referencia a Fernando II.', '300.00'),
(21, 1, 'Escudo', 3, 1535, 1, 'img/Monedas/1EscudoCI.png', 'En 1535, durante el reinado de Carlos I, se acuña por primera vez en Barcelona una moneda de oro con un peso de 3,4 gramos y un valor de 350 maravedíes, esta moneda estaba destinada a pagar los gastos de la Expedición a Túnez.  Pero no es hasta el reinado de Felipe II cuando el escudo de oro se convierte en la principal unidad monetaria de todo el territorio español, estando subdividido a su vez en reales y maravedíes. Desde la época de Felipe II hasta tiempos de Fernando VII se acuñan monedas en diferentes metales y denominaciones, pero todas ellas con el escudo como unidad de referencia, ya que éste equivalía bien a 16 reales de plata o a 40 reales de vellón.  Las monedas de oro se emitieron con faciales de ½, 1, 2, 4 y 8 escudos. La pieza de 2 escudos era conocida por el nombre de doblón, pues su peso correspondía exactamente al doble que el de la moneda de un escudo, 6,77 gramos de oro. Además de estas monedas también fueron emitidas entre 1809 y 1839 otras similares compuestas del mismo metal, pureza y peso, con valores de 80, 160 y 320 reales de vellón (2, 4 y 8 escudos).  El diseño de estas monedas estaba formado por el busto del monarca reinante en el anverso y por el escudo real en el reverso, además todas llevaban inscrita la letra correspondiente a la ceca en la que se acuñaron. La mayoría de las piezas de oro fueron acuñadas en las cecas de Madrid y Sevilla, y por tanto estas monedas llevaban grabadas bien una M o una S.', '700.99'),
(22, 4, 'Reales', 2, 1538, 1, 'img/Monedas/4RealesCI.png', 'El real español es una moneda de plata de 3,35 gramos que empezó a circular en Castilla en el siglo XIV y fue la base del sistema monetario español hasta mediados del siglo XIX. En 1480, durante el reinado de Isabel y Fernando, se fijó su valor en 31 maravedíes.1​ A partir del año 1497 pasó a valer 34 maravedíes por la Pragmática de Medina del Campo, que estableció en detalle el peso y la cantidad de plata que debía poseer el real acuñado (1 marco de plata = 67 monedas de real),1​ además de ordenar la presencia de la sigla del ensayador respectivo en cada moneda, así como la sigla de la ceca (Casa de Moneda) donde fuera acuñada. Su cambio en época de Felipe II seguía siendo de 1 real de plata por 34 maravedíes y, a su vez, 1 escudo de oro por 16 reales de plata. Durante el reinado de Felipe II, entre los años 1556 y 1598, se acuñaron escudos con un peso de 3,4 gramos de oro, cada uno de ellos equivalente a 544 maravedíes.', '90.00'),
(26, 1, 'Real', 2, 1557, 2, 'img/Monedas/1RealFII.png', 'El real español es una moneda de plata de 3,35 gramos que empezó a circular en Castilla en el siglo XIV y fue la base del sistema monetario español hasta mediados del siglo XIX. En 1480, durante el reinado de Isabel y Fernando, se fijó su valor en 31 maravedíes.1​ A partir del año 1497 pasó a valer 34 maravedíes por la Pragmática de Medina del Campo, que estableció en detalle el peso y la cantidad de plata que debía poseer el real acuñado (1 marco de plata = 67 monedas de real),1​ además de ordenar la presencia de la sigla del ensayador respectivo en cada moneda, así como la sigla de la ceca (Casa de Moneda) donde fuera acuñada. Su cambio en época de Felipe II seguía siendo de 1 real de plata por 34 maravedíes y, a su vez, 1 escudo de oro por 16 reales de plata. Durante el reinado de Felipe II, entre los años 1556 y 1598, se acuñaron escudos con un peso de 3,4 gramos de oro, cada uno de ellos equivalente a 544 maravedíes.', '53.00'),
(30, 2, 'Principats', 3, 1556, 2, 'img/Monedas/2PrincipatsFII.png', 'Los Reyes Católicos reformaron el sistema monetario de la Corona de Castilla. El principats de oro español tiene un peso de 3,6 g (ley 23 3/4 quilates), fue la moneda unitaria de oro (medio doblón) y fue una de las unidades de cuenta durante los siglos XVI y XVII. Fue por primera vez acuñado por los Reyes Católicos, con el nombre de Excelente de Granada, recibiendo después el nombre de ducado, y según el «Cuaderno de Ordenanzas de la labor de las monedas», también conocido como la «Real Pragmática de Medina del Campo», de 13 de junio de 1497, equivalía a 11 reales castellanos y 1 maravedí o bien 375 maravedíes (1500 cornados).6​  En 1536 se introdujo una nueva moneda de oro de menos peso y ley que el ducado, pasando a tener una ley de 22 quilates, con la finalidad de igualar la moneda de oro castellana a la de otros países y evitar su fuga al exterior. Hace referencia a los Reyes Catolicos.', '900.00'),
(34, 8, 'Maravedis', 1, 1598, 3, 'img/Monedas/8MaravedisFIII.png', 'Esta moneda es un 8 Maravedis del reinado de Felipe III. Una moneda de cobre, que se acuñó en el año 1598, con el fin de seguir a los sucesores en el trono a través de la numismática española de aquella época, que buscaba expandirse por todo el mundo. En el anverso se puede leer PHILIPPVS · III · D · G · OMNIVM +, su traducción sería: Felipe III por la gracia de Dios y tambien podemos ver el Castillo en octolobe. En su reverso podemos ver el León rampante en octolobe y leer: HISPAN · REGNORVM · REX · 1598, cuya traducción sería: Rey de todos los reinos españoles.', '34.00'),
(35, 1, 'Potosí', 2, 1603, 3, 'img/Monedas/1PotosiFIII.png', 'Potosí es una de las cecas gubernamentales americanas, y corresponde a la Villa Imperial de Potosí (título otorgado por Carlos I), en la actual Bolivia. Comienza a acuñar moneda con Felipe III y termina con Fernando VII en 1825. La gran producción de plata de la mina era, de por sí, un inconveniente que no permitía detener la producción monetaria ni en plazos cortos. De ahí que continuase empleándose el antiguo procedimiento de acuñación llamado de martillo cuando según la normativa habría debido desaparecer. La expresión “vale un Potosí” hace alusión a algo que tiene gran valor.', '56.00'),
(36, 8, 'Reales', 2, 1602, 3, 'img/Monedas/8RealesFIII.png', 'El 8 reales español es una moneda de plata de 6,35 gramos que empezó a circular en Castilla en el siglo XIV y fue la base del sistema monetario español hasta mediados del siglo XIX. En 1480, durante el reinado de Isabel y Fernando, se fijó su valor en 64 maravedíes. A partir del año 1609 pasó a valer 70 maravedíes por la Pragmática de Medina del Campo, que estableció en detalle el peso y la cantidad de plata que debía poseer el 8 reales acuñado, además de ordenar la presencia de la sigla del ensayador respectivo en cada moneda, así como la sigla de la ceca (Casa de Moneda) donde fuera acuñada. Su cambio en época de Felipe III seguía siendo de 8 Reales de plata por 70 maravedíes y, a su vez, 1 escudo de oro por 16 reales de plata. Durante el reinado de Felipe III, entre los años 1600 y 1618, se acuñaron escudos con un peso de 3,4 gramos de oro, cada uno de ellos equivalente a 544 maravedíes.', '100.00'),
(37, 8, 'Escudos', 3, 1611, 3, 'img/Monedas/8EscudosFIII.png', 'Los 8 escudos, básicamente hay cinco reyes que las emitieron: Felipe V, Fernando VI, Carlos III, Carlos IV y Fernando VII. Luis I y José Bonaparte también emitieron monedas de 8 escudos, pero son muy raras y valoradas. En cuanto a las cecas, en la Península hay fundamentalmente dos, que perduraron durante todo el periodo: Madrid y Sevilla; mientras que en las colonias están Lima, México, Santa Fe (raras en Fernando VI y rarísimas en Felipe V), Popayán (a partir de Fernando VI), Santiago (a partir de Fernando VI), Potosí (a partir de Carlos III). También hay otras cecas raras y valoradas: Barcelona, Segovia, Cataluña, Cuzco, Cuenca, Guatemala, Cádiz y Guadalajara. También se podría hablar de la gran variedad de diseños que presenta cada rey, lo que hace que una colección de onzas no resulte repetitiva.', '1000.00'),
(38, 4, 'Coronados', 1, 1622, 4, 'img/Monedas/4CoronadosFIV.png', 'Moneda de cobre de curso legal desde los Reyes Católicos en la Corona de Castilla y en Navarra, y a partir de la Guerra de Sucesión, también en la Corona de Aragón, salvo en el Reino de Mallorca; estuvo vigente hasta la primera reforma en el sistema monetario de Isabel II (1474-1854).  En 1854, bajo el reinado de Isabel II, el maravedí empezó a sustituirse por el \"céntimo de real\". Se buscaba simplificar y dejar atrás la vieja y compleja contabilidad en maravedíes, más propios del medievo que del siglo xix d. C. Para ello se estableció que un maravedí valiera 3 céntimos de real y que 17 maravedís fueran equivalentes a medio real o 5 céntimos de escudo (en vez de 5,1). Todo para conseguir un nuevo sistema monetario de base decimal mucho más moderno y fácil de usar.  Las emisiones de céntimos de real se mantuvieron hasta 1864, a partir de esa fecha, las monedas de cobre que se empezaron a acuñar, pasaron a llamarse \"céntimo de escudo\" (también denominado \"décima\" por ser equivalente a la décima de real).', '10.00'),
(39, 8, 'Maravedis', 1, 1605, 4, 'img/Monedas/8MaravedisFIV.png', 'Esta moneda es un 8 Maravedis del reinado de Felipe IV. Una moneda de cobre, que se acuñó en el año 1605, principalmente en las localidades de Segovia, Madrid, Valencia, Barcelona y León. En el anverso se puede leer PHILIPPVS · III · D · G · OMNIVM +, su traducción sería: Felipe III por la gracia de Dios y tambien podemos ver el Castillo en octolobe. En su reverso podemos ver el León rampante en octolobe y leer: HISPAN · REGNORVM · REX · 1598, cuya traducción sería: Rey de todos los reinos españoles.', '20.00'),
(40, 8, 'Reales Maria', 2, 1671, 5, 'img/Monedas/8RealesCII.png', 'El 8 reales español es una moneda de plata de 6,35 gramos que empezó a circular en Castilla en el siglo XIV y fue la base del sistema monetario español hasta mediados del siglo XIX. En 1480, durante el reinado de Isabel y Fernando, se fijó su valor en 64 maravedíes. A partir del año 1609 pasó a valer 70 maravedíes por la Pragmática de Medina del Campo, que estableció en detalle el peso y la cantidad de plata que debía poseer el 8 reales acuñado, además de ordenar la presencia de la sigla del ensayador respectivo en cada moneda, así como la sigla de la ceca (Casa de Moneda) donde fuera acuñada. Su cambio en época de Felipe III seguía siendo de 8 Reales de plata por 70 maravedíes y, a su vez, 1 escudo de oro por 16 reales de plata. Durante el reinado de Carlos II, entre los años 1660 y 1700, se acuñaron escudos con un peso de 3,4 gramos de oro, cada uno de ellos equivalente a 544 maravedíes.', '800.00'),
(41, 2, 'Escudos', 3, 1666, 5, 'img/Monedas/2EscudosCII.png', 'Las monedas de 2 escudos, básicamente hay cinco reyes que las emitieron: Felipe V, Fernando VI, Carlos II, Carlos IV y Fernando VII. Luis I y José Bonaparte también emitieron monedas de 8 escudos, pero son muy raras y valoradas. En cuanto a las cecas, en la Península hay fundamentalmente dos, que perduraron durante todo el periodo: Madrid y Sevilla; mientras que en las colonias están Lima, México, Santa Fe (raras en Fernando VI y rarísimas en Felipe V), Popayán (a partir de Fernando VI), Santiago (a partir de Fernando VI), Potosí (a partir de Carlos III). También hay otras cecas raras y valoradas: Barcelona, Segovia, Cataluña, Cuzco, Cuenca, Guatemala, Cádiz y Guadalajara. También se podría hablar de la gran variedad de diseños que presenta cada rey, lo que hace que una colección de onzas no resulte repetitiva.', '909.00'),
(42, 1, 'Real', 2, 1711, 6, 'img/Monedas/1RealFV.png', 'El real español es una moneda de plata de 3,35 gramos que empezó a circular en Castilla en el siglo XIV y fue la base del sistema monetario español hasta mediados del siglo XIX. En 1480, durante el reinado de Isabel y Fernando, se fijó su valor en 31 maravedíes.1​ A partir del año 1497 pasó a valer 34 maravedíes por la Pragmática de Medina del Campo, que estableció en detalle el peso y la cantidad de plata que debía poseer el real acuñado (1 marco de plata = 67 monedas de real),1​ además de ordenar la presencia de la sigla del ensayador respectivo en cada moneda, así como la sigla de la ceca (Casa de Moneda) donde fuera acuñada. Su cambio en época de Felipe V seguía siendo de 1 real de plata por 34 maravedíes y, a su vez, 1 escudo de oro por 16 reales de plata. Durante el reinado de Felipe V, entre los años 1700 y 1746, se acuñaron escudos con un peso de 3,4 gramos de oro, cada uno de ellos equivalente a 544 maravedíes.', '66.00'),
(43, 4, 'Maravedies', 1, 1808, 9, 'img/Monedas/4MaravedisFerVII.png', 'Esta moneda es un 4 Maravedies del reinado de Fernando VII. Una moneda de cobre, que se acuñó en el año 1808. En el anverso se puede leer FERDIN · VII · D · G · OMNIVM +, su traducción sería: Fernando VII por la gracia de Dios y tambien podemos ver el Castillo en octolobe. En su reverso podemos ver el León rampante en octolobe y leer: HISPAN · REGNORVM · REX · 1808, cuya traducción sería: Rey de todos los reinos españoles. A través del reinado de Fernando VII se empezó a utilizar el busto del rey en el anverso de la moneda.', '44.00'),
(44, 2, 'Reales', 2, 1810, 9, 'img/Monedas/2RealesVII.png', 'El real español es una moneda de plata de 3,35 gramos que empezó a circular en Castilla en el siglo XIV y fue la base del sistema monetario español hasta mediados del siglo XIX. En 1480, durante el reinado de Isabel y Fernando, se fijó su valor en 31 maravedíes.1​ A partir del año 1497 pasó a valer 34 maravedíes por la Pragmática de Medina del Campo, que estableció en detalle el peso y la cantidad de plata que debía poseer el real acuñado (1 marco de plata = 67 monedas de real),1​ además de ordenar la presencia de la sigla del ensayador respectivo en cada moneda, así como la sigla de la ceca (Casa de Moneda) donde fuera acuñada. Su cambio en época de Felipe II seguía siendo de 1 real de plata por 34 maravedíes y, a su vez, 1 escudo de oro por 16 reales de plata. Durante el reinado de Fernando VII, entre los años 1808 y 1833, se acuñaron escudos con un peso de 3,4 gramos de oro, cada uno de ellos equivalente a 544 maravedíes.', '50.00'),
(45, 2, 'Pesetas', 2, 1882, 11, 'img/Monedas/2PesetasAXII.png', 'Las acuñaciones de la moneda de 2 Peseta en plata, y calderilla de 3 y 6 cuartos en cobre, se iniciaron el 11 de septiembre de 1836, en la Ceca de Barcelona, durante la I Guerra Carlista (1833-1840). A esta peseta, se le llamará “la peseta de los Peseteros”. Los Carlistas empezaron a llamar a los Soldados Isabelinos, Peseteros, por el pago que recibían. Estas pesetas se acuñaron a Volante. Su canto era añadido a Cerrilla. Los ensayadores fueron Francisco Paradaltas y Simeón Sala i Roca.', '20.00'),
(46, 25, 'Pesetas', 3, 1881, 11, 'img/Monedas/25PesetasAXII.png', 'Las acuñaciones de la moneda de 25 Peseta en oro, y calderilla de 3 y 6 cuartos en cobre, se iniciaron el 11 de septiembre de 1808, en la Ceca de Barcelona, durante el reinado de Alfonso XII (1874-1885). A esta peseta, se le llamará “la peseta de los Ricos”. Los Alfonsinos empezaron a llamar a los Soldados Carlistas, Peseteros, por el pago que recibían. Estas pesetas se acuñaron a Volante. Su canto era añadido a Cerrilla. Los ensayadores fueron Francisco Paradaltas y Simeón Sala i Roca. Moneda de gran valor ya que se fabricaron pocas unidades.', '340.00'),
(48, 2, 'Centavos', 1, 1891, 12, 'img/Monedas/2CentavosAXIII.png', '2 céntimos de Alfonso XIII del año 1904. Estrella *04 (floja). Peso 2 gr. de cobre. Diámetro 20,5 mm - canto liso, ceca de Madrid. SMV. alrededor de un escudo coronado de España entre valor 2 Centavos. EN el anverso podemos leer ALFONSO XIII POR LA G DE DIOS * alrededor de un busto del rey a derechas. Vemos como fue el inicio del cambio monetario en España, dejando atrás monedas como el Real, el Escudo, el maravedi, Empezando a utilizar ahora la peseta o los centavos. Muy populares en España durante el S.XX', '5.00'),
(49, 25, 'Céntimos', 1, 1932, 13, 'img/Monedas/25centimosIIR.png', 'En el anverso podemos ver representado un libro de ciencias rompiendo unas cadenas que se entrecruzan. En el reverso podemos ver el valor y las típicas espigas que también se acuñaron en la moneda de 25 centimos de 1934 en Niquel.  A mi personalmente me gusta este tipo de diseños de la II Republica, son monedas que tienen su encanto y lo tendrán mucho mas en unos años, algunas son dificilillas de ver tanto de la II Republica como de la guerra civil.  Esta no es de las mas difíciles pero su estado de conservación le hace tener  su encanto. En el anverso podemos ver representado un libro de ciencias rompiendo unas cadenas que se entrecruzan. En el reverso podemos ver el valor y las típicas espigas que también se acuñaron en la moneda de 25 centimos de 1934 en Niquel.  A mi personalmente me gusta este tipo de diseños de la II Republica, son monedas que tienen su encanto y lo tendrán mucho mas en unos años, algunas son dificilillas de ver tanto de la II Republica como de la guerra civil.  Esta no es de las mas difíciles pero su estado de conservación le hace tener su encanto. a moneda de 50 cts al ser con troqueles re-fritos de la peseta de plata, pues se vé claramente lo que decías el cordoncillo. Aún así, esta moneda tiene el encanto y el atractivo de la cantidad tan grande de variantes que tiene. A pesar de que q se catalogan 4, en reliadad son muchas más:', '5.05'),
(50, 2, 'Pesetas', 1, 1940, 14, 'img/Monedas/2PesetasFranco.png', 'En abril de 1937, se autoproclamó jefe nacional de la Falange Española Tradicionalista y de las Juntas de Ofensiva Nacional Sindicalista (FET y de las JONS), partido único resultado de la fusión de la fascista Falange Española de las JONS y de la Comunión Tradicionalista. Acabada la guerra, instauró una dictadura fascistizada13​ o régimen semifascista,14​ e incorporó una influencia clara de los totalitarismos alemán e italiano en campos como las relaciones laborales, la política económica autárquica, la estética, el uso de los símbolos y el denominado «Movimiento Nacional».15​ En sus últimos estertores, el régimen transitó más próximo a las dictaduras desarrollistas,16​ aunque siempre conservó rasgos fascistas vestigiales,14​ régimen que en su conjunto es conocido como franquismo, caracterizado por la ausencia de una ideología claramente definida más allá del anticomunismo y el nacionalcatolicismo.', '17.00'),
(51, 2000, 'Pesetas', 2, 1994, 15, 'img/Monedas/2000PesetasJC.png', 'La peseta fue la moneda de España durante más de 100 años, por lo que tiene una gran repercusión en la historia de nuestro país. Algunas pesetas, por diferentes razones, se han vuelto más populares que otras, con un valor que puede parecernos increíbles.  Las monedas de 2000 pesetas de plata son  de las más singulares, aunque no necesariamente de las más caras. En el año 1995, con motivo de la 1ª Presidencia española de la UE se emitió una nueva peseta. Muestra el Palacio real en la otra cara. Es una moneda que representa un homenaje. En definitiva, es una edición especial que se sacó por aquella época.', '12.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `saldo` decimal(65,2) NOT NULL,
  `n_compras` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `usuario`, `password`, `email`, `saldo`, `n_compras`) VALUES
(1, 'Albertito', '81dc9bdb52d04dc20036dbd8313ed055', 'alexca22.13@gmail.com', '0.00', 0),
(2, 'Albertit0', '81dc9bdb52d04dc20036dbd8313ed055', 'alexca2a2.13@gmail.com', '0.00', 0),
(3, 'Alejandrito', '827ccb0eea8a706c4c34a16891f84e7b', 'alexcsa22.13@gmail.com', '0.00', 0),
(4, 'Alejandritos', '81dc9bdb52d04dc20036dbd8313ed055', 'alexcassss22.13@gmail.com', '80.00', 0),
(5, 'Alejandritoss', '81dc9bdb52d04dc20036dbd8313ed055', 'alexcaaaa22.13@gmail.com', '0.00', 0),
(14, 'Alonso', '81dc9bdb52d04dc20036dbd8313ed055', 'elplan@gmail.com', '0.00', 0),
(15, 'Alonsos', '81dc9bdb52d04dc20036dbd8313ed055', 'qwealexca22.13@gmail.com', '0.00', 0),
(16, 'Jaime', '81dc9bdb52d04dc20036dbd8313ed055', 'alexca2aaa2.13@gmail.com', '0.00', 0),
(17, 'Jaimess', '81dc9bdb52d04dc20036dbd8313ed055', 'alexcaaaaa22.13@gmail.com', '0.00', 0),
(18, 'Sergio', '81dc9bdb52d04dc20036dbd8313ed055', 'alessaaxca22.13@gmail.com', '54.01', 4),
(19, 'Luis', '81dc9bdb52d04dc20036dbd8313ed055', 'asdfsgdhjsda@gmail.com', '279.50', 2),
(21, 'Sergios', '81dc9bdb52d04dc20036dbd8313ed055', 'aledvbfdssxca22.13@gmail.com', '149.50', 1),
(22, 'admin', '0192023a7bbd73250516f069df18b500', 'alexcasadsfgh22.13@gmail.com', '0.00', 0),
(23, 'Miguel', 'd622db89866532f89625db5a6b33a95b', 'alexca2sdfhgf2.13@gmail.com', '49.50', 1),
(24, 'Daniel22', 'e94d51a35484755a9f9672d13687f499', 'dani22.13@gmail.com', '230.00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`cod_comentario`);

--
-- Indices de la tabla `epoca`
--
ALTER TABLE `epoca`
  ADD PRIMARY KEY (`cod_epoca`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`cod_material`,`nombre_material`);

--
-- Indices de la tabla `monedas`
--
ALTER TABLE `monedas`
  ADD PRIMARY KEY (`cod_moneda`,`nombre_moneda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`,`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `cod_comentario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `epoca`
--
ALTER TABLE `epoca`
  MODIFY `cod_epoca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `cod_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `monedas`
--
ALTER TABLE `monedas`
  MODIFY `cod_moneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
