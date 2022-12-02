-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2021 a las 16:24:56
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `wish`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE IF NOT EXISTS `deseos` (
  `username` varchar(15) NOT NULL,
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`username`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`username`, `id`, `descripcion`, `url`) VALUES
('cpizarrot', 1, 'juguete star wars', ''),
('ddominf', 1, 'Mascara de pestañas', 'https://www.falabella.com/falabella-cl/product/4478017/Mascara-de-Pestanas-Lash-Sensational-Lavable-Negro'),
('ddominf', 2, 'Polera M ', 'https://simple.ripley.cl/polera-manga-corta-sfera-2000370113803?color_80=blanco&talla=m'),
('ddominf', 3, 'Blusa M ', 'https://simple.ripley.cl/blusa-off-shoulder-print-index-2000367859271?talla=m'),
('ddominf', 4, 'Falda M ', 'https://www.falabella.com/falabella-cl/product/881253288/Falda-Mezclilla'),
('ddominf', 5, 'Polera M ', 'https://www.falabella.com/falabella-cl/product/881248635/Polera/881248636'),
('dferrab', 1, 'boxer talla L', 'https://www.falabella.com/falabella-cl/product/881167592/Boxer/881167593'),
('ereyesr', 1, 'Cristal,  Pack Cerveza Lager 12 Latas 350 cc c/u', 'https://www.lider.cl/supermercado/product/Cristal-Pack-Cerveza-Lager/312203'),
('ereyesr', 2, 'Malpaso,  Pisco Especial 35° Botella', 'https://www.lider.cl/supermercado/product/Malpaso-Pisco-Especial-35-Botella/443085'),
('ereyesr', 3, '100 Pipers,  Whisky 5-6 años Botella 750 cc', 'https://www.lider.cl/supermercado/product/100-Pipers-Whisky-5-6-a%C3%B1os-Botella/321861'),
('ffigueroam', 1, 'audífonos', 'https://www.lider.cl/electrohogar/product/Sony-Aud%C3%ADfonos-MDR-E9LP-Negro/676050'),
('ffigueroam', 2, 'artículos de escritorio, cuaderno para tomar apuntes, lápices, etc.', ''),
('ffigueroam', 3, 'marco de foto (que me sirva para poner una foto de mi enano en el escritorio)', ''),
('ffigueroam', 4, 'NO tomo vino, ni espumante, ni nada de ese estilo. Pero una cerveza siempre será bien recibida.', ''),
('ffigueroam', 5, 'Algo relacionado con star wars ( un tazón o figura pequeña, etc..)', ''),
('igutierrl', 1, 'aaaa', 'aaaaaaaa'),
('igutierrl', 2, 'xxxxxxxx', 'xxxxxxxxxxx'),
('jgarciad', 1, 'Comodidad para trabajar XD', 'https://articulo.mercadolibre.cl/MLC-439347126-mouse-pad-xl-goliathus-proglobal-_JM?quantity=1#reco_item_pos=3&reco_backend=l3-l7-v2p-ngrams-unified-model&reco_backend_type=function&reco_client=navigation_homes&reco_id=02f6b493-b0ea-4e0e-aff2-d0ef5ff'),
('jjimenezl', 1, 'artículos de escritorio - crema de manos - adorno de navidad', ''),
('jserenom', 1, 'calcetines talla 38-39', 'https://articulo.mercadolibre.cl/MLC-473656402-pack-3-calcetines-puma-cortos-varios-colores-stgo-boxer-_JM?quantity=1&variation=31081243573'),
('jserenom', 2, 'para sol ', 'https://articulo.mercadolibre.cl/MLC-454035828-parasol-de-aluminio-sparco-130cm-x-70cm-zofree-_JM?quantity=1'),
('jserenom', 3, 'soporte celular para cama', 'https://articulo.mercadolibre.cl/MLC-443837141-soporte-celular-largo-flexible-cama-sillon-mesa-_JM?quantity=1'),
('jserenom', 4, 'cubre tablero para auto(palio2006)', 'https://articulo.mercadolibre.cl/MLC-473713472-cubre-tableros-economicos-de-buena-calidad-alfombra-120-mm-_JM?quantity=1'),
('jserenom', 5, 'cargador portatil', 'https://articulo.mercadolibre.cl/MLC-442601621-power-bank-cargador-portatil-10000-mah-1822-_JM?quantity=1'),
('jserenom', 6, 'gorro frio color cafe', 'https://articulo.mercadolibre.cl/MLC-460725472-gorro-de-lana-forrado-nieve-ski-snowboar-variedad-bigbull-_JM?quantity=1'),
('jserenom', 7, 'bufanda', 'https://articulo.mercadolibre.cl/MLC-433647474-bufanda-camel-100-lana-_JM'),
('jserenom', 8, 'chumbeque tradicional', 'https://articulo.mercadolibre.cl/MLC-447629345-chumbeques-mkoo-guayaba-maracuya-mango-naranja-papaya-tradic-_JM?quantity=1'),
('jserenom', 9, 'manta gris', 'https://www.falabella.com/falabella-cl/product/880738446/Manta-Lisa-Melange-Gris-130-x-150-cm/880738446'),
('kgonzalezf', 1, 'Vino Cabernet Sauvignon, por ejemplo Doña Dominga de Casa Silva', ''),
('kgonzalezf', 3, 'Cáctus o plantita pequeña para mi escritorio', ''),
('kgonzalezf', 4, 'Crema de manos', ''),
('lbarahonao', 1, 'esmaltes', 'https://www.falabella.com/falabella-cl/product/4935155/Nail-Lacquer-Set-Nude-2/4935155'),
('lbarahonao', 2, 'mascara de pestañas', 'https://www.falabella.com/falabella-cl/product/prod12420032/Mascara-Lash-Sensational-Curvitude/6356636'),
('lbarahonao', 3, 'polera ', 'https://simple.ripley.cl/blusa-off-sh-crudo-l-75-setepontocinco-mpm00000423871?MKP_talla_textil=m'),
('lbarahonao', 4, 'difusor de aroma > ejemplo', 'https://www.casaideas.cl/set-aroma-difusor-frasco-3217380000019/p'),
('lbarahonao', 5, 'guirnaldas de luces ejemplo', 'https://www.casaideas.cl/luces-decorativas-3211573000039/p'),
('lpachecoj', 1, 'Un Dildo XL', ''),
('lvaldebc', 1, 'Una peluca', ''),
('mvillegp', 1, 'sandalias >38', ''),
('mvillegp', 2, 'perfume ', ''),
('rponceb', 1, 'Calcetín', 'https://www.inlov.cl/calcetin-rickandmorty'),
('rponceb', 2, 'Jarro Shopero', 'https://www.casaideas.cl/set-4-schop-cerveza-3209282000013/p'),
('troldane', 1, 'Máscara de pestañas como el ejemplo o similar máximo volumen', 'https://www.falabella.com/falabella-cl/product/4478027/Mascara-de-Pestanas-Lash-Sensational-a-Prueba-de-Agua-Negro/4478027'),
('troldane', 2, 'Desenrredante o similar con algún aroma especial; berries, caramelo, coco, etc.', 'https://www.falabella.com/falabella-cl/product/5529277/Spray-Desenredante-Durazno-Flor-de-Parra/5529277'),
('troldane', 3, 'Aceite para puntas partidas o similar, de reparación capilar ', 'https://www.falabella.com/falabella-cl/product/4977051/Aceite-Capilar-Acail-Oil-60-ML/4977051'),
('troldane', 4, 'Limpiador facial o similar al ejemplo tipo gel, jabón o espuma', 'https://www.falabella.com/falabella-cl/product/6058100/Gel-Limpiador-Facil-Libre-de-Aceites/6058100'),
('troldane', 5, 'Brochas para maquillaje (la imagen es solo un ejemplo)', 'https://www.google.cl/search?q=brochas+para+maquillaje&rlz=1C1MSIM_enCL699CL700&source=lnms&tbm=isch&sa=X&ved=0ahUKEwi109qGwp3fAhUDf5AKHa5jC_8Q_AUIDigB&biw=1920&bih=938#imgrc=s-ncbogU4_MFYM:'),
('troldane', 6, 'Delineador de ojos color negro (quisiera con ese tipo de punta como el ejemplo porfis jiiiiiii)', 'https://www.falabella.com/falabella-cl/product/5011603/Delineador-de-Ojos-Superliner-Superstar/5011603'),
('varanedae', 1, 'Conversar mas ', ''),
('vlandaetaf', 1, 'Chocolate After Eight de Nestlé 200g, crema de menta con chocolate', 'https://www.lider.cl/supermercado/product/Nestl%C3%A9-Chocolate-de-Menta-After-Eight/874928');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pareja`
--

CREATE TABLE IF NOT EXISTS `pareja` (
  `username1` varchar(15) NOT NULL,
  `username2` varchar(15) NOT NULL,
  `email_destino` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`username1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pareja`
--

INSERT INTO `pareja` (`username1`, `username2`, `email_destino`, `fecha`, `estado`) VALUES
('avillarrv', 'jserenom', 'alfredo.villarroel@live.cl', '2018-12-18', 1),
('cpizarrot', 'igutierrl', 'c.pizarrot@hotmail.com', '2018-12-18', 1),
('ddominf', 'mpachecop', 'dayanadf94@gmail.com', '2018-12-18', 1),
('dferrab', 'emerinom', 'danilo.ferragut1982@gmail.com', '2018-12-18', 1),
('emerinom', 'jjimenezl', 'edmerinom@gmail.com', '2018-12-18', 1),
('ereyesr', 'lbarahonao', 'enriquedomreyes@gmail.com', '2018-12-18', 1),
('ffigueroam', 'rarandav', 'ffigueroamartin@gmail.com', '2018-12-18', 1),
('fhermosc', 'sfuenzalidaa', 'felipehermoc@gmail.com', '2018-12-18', 1),
('igutierrl', 'cpizarrot', 'igutiel@gmail.com', '2019-12-05', 1),
('jgarciad', 'vlandaetaf', 'juliogarcia.sub@gmail.com', '2018-12-18', 1),
('jjimenezl', 'troldane', 'prof.javierajimenez@gmail.com', '2018-12-18', 1),
('jserenom', 'mvillegp', 'sereno.mundaca@gmail.com', '2018-12-18', 1),
('kgonzalezf', 'varanedae', 'katherine.gonzalez.prof@gmail.com', '2018-12-18', 1),
('lbarahonao', 'rponceb', 'amada_lily@yahoo.com', '2018-12-18', 1),
('lpachecoj', 'lvaldebc', 'jorgeleoniciopacheco@gmail.com', '2018-12-18', 1),
('lvaldebc', 'jgarciad', 'luis.valdebenito@gmail.com', '2018-12-18', 1),
('mmaldonm', 'ddominf', 'marcos89@hotmail.cl', '2018-12-18', 1),
('mpachecop', 'vsuarezf', 'mario.pacheco.arevalo@gmail.com', '2018-12-18', 1),
('mvillegp', 'fhermosc', 'melanievillegas95@gmail.com', '2018-12-18', 1),
('rarandav', 'kgonzalezf', 'rarandav@vtr.net', '2018-12-18', 1),
('rponceb', 'lpachecoj', 'poncebecker@gmail.com', '2018-12-18', 1),
('sfuenzalidaa', 'ereyesr', 'soraya.fuenzalida@gmail.com', '2018-12-18', 1),
('troldane', 'dferrab', 'tamararoldane@gmail.com', '2018-12-18', 1),
('varanedae', 'mmaldonm', 'varanedae1979@gmail.com', '2018-12-18', 1),
('vlandaetaf', 'avillarrv', 'veronica_landaeta@hotmail.com', '2018-12-18', 1),
('vsuarezf', 'ffigueroam', 'vmsuarezf@yahoo.es', '2018-12-18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tipo_user` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `envia_correo` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `nombre`, `email`, `tipo_user`, `estado`, `envia_correo`) VALUES
('avillarrv', '1234', 'VILLARROEL VILLARROEL ALFREDO', 'alfredo.villarroel@live.cl', 0, 0, 0),
('cpizarrot', '1234', 'PIZARRO TORO CLAUDIO', 'c.pizarrot@hotmail.com', 0, 0, 0),
('ddominf', '4321', 'DOMÍNGUEZ FARÍAS DAYANA', 'dayanadf94@gmail.com', 0, 0, 0),
('dferrab', 'Danilof30', 'FERRAGUT BERRIOS DANILO', 'danilo.ferragut1982@gmail.com', 0, 0, 0),
('emerinom', '1234', 'MERINO MORONG EDGARDO', 'edmerinom@gmail.com', 0, 0, 0),
('ffigueroam', '180311', 'FIGUEROA MARTIN FELIPE', 'ffigueroamartin@gmail.com', 0, 0, 0),
('fhermosc', '1234', 'HERMOSILLA CANCINO FELIPE', 'felipehermoc@gmail.com', 0, 0, 0),
('igutierrl', '4321', 'GUTIERREZ LARRAGUIBEL ISMAEL', 'igutiel@gmail.com', 1, 0, 1),
('jgarciad', '1234', 'GARCÍA DURÁN JULIO', 'juliogarcia.sub@gmail.com', 0, 0, 0),
('jjimenezl', '1234', 'JIMENEZ LABRA JAVIERA', 'prof.javierajimenez@gmail.com', 0, 0, 0),
('jserenom', '1234', 'SEREÑO MUNDACA JAVIER ', 'sereno.mundaca@gmail.com', 0, 0, 0),
('kgonzalezf', '1234', 'GONZALEZ FLORES KATHERINE', 'katherine.gonzalez.prof@gmail.com', 0, 0, 0),
('lbarahonao', '1234', 'BARAHONA ORTIZ LILY', 'amada_lily@yahoo.com', 0, 0, 0),
('lpachecoj', '1234', 'PACHECO JORGE LEONICIO', 'jorgeleoniciopacheco@gmail.com', 0, 0, 0),
('lvaldebc', '1234', 'VALDEBENITO CUBILLOS LUIS', 'luis.valdebenito@gmail.com', 0, 0, 0),
('mmaldonm', '1234', 'MALDONADO MALDONADO MARCOS', 'marcos89@hotmail.cl', 0, 0, 0),
('mpachecop', '1234', 'PACHECO ARÉVALO MARIO', 'mario.pacheco.arevalo@gmail.com', 0, 0, 0),
('rarandav', '1234', 'ARANDA VILLALOBOS RICARDO', 'rarandav@vtr.net', 0, 0, 0),
('rponceb', '2222', 'PONCE BECKER RODRIGO JAVIER', 'poncebecker@gmail.com', 0, 0, 0),
('troldane', '4321', 'ROLDÁN ESPINDOLA TAMARA', 'tamararoldane@gmail.com', 0, 0, 0),
('varanedae', '1234', 'ARANEDA ESPINOZA VICTOR', 'varanedae1979@gmail.com', 0, 0, 0),
('vlandaetaf', 'vl12', 'LANDAETA FERNANDEZ VERONICA', 'veronica_landaeta@hotmail.com', 0, 0, 0),
('vsuarezf', '1234', 'SUAREZ FUENTES VICTOR', 'vmsuarezf@yahoo.es', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
