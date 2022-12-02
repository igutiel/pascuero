-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2022 a las 14:22:09
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `deadepascuero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE IF NOT EXISTS `cuota` (
  `id_grupo` int(11) NOT NULL,
  `valor_cuota` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`id_grupo`, `valor_cuota`) VALUES
(1, 3500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE IF NOT EXISTS `deseos` (
  `id_grupo` int(1) NOT NULL,
  `username` varchar(15) NOT NULL,
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`id_grupo`,`username`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`id_grupo`, `username`, `id`, `descripcion`, `url`) VALUES
(1, '14145742', 1, 'aaa', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio_correo`
--

CREATE TABLE IF NOT EXISTS `envio_correo` (
  `envio_correo` int(11) NOT NULL,
  `desc_envio` varchar(45) NOT NULL,
  PRIMARY KEY (`envio_correo`),
  UNIQUE KEY `envio_correo` (`envio_correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `envio_correo`
--

INSERT INTO `envio_correo` (`envio_correo`, `desc_envio`) VALUES
(0, 'No Enviar'),
(1, 'Enviar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `estado` int(11) NOT NULL,
  `desc_estado` varchar(45) NOT NULL,
  PRIMARY KEY (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`estado`, `desc_estado`) VALUES
(0, 'Habilitado'),
(1, 'Inhabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL,
  `desc_grupo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `desc_grupo`) VALUES
(1, 'Departamento de Educación a Distancia'),
(2, 'Grupo Gisselle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pareja`
--

CREATE TABLE IF NOT EXISTS `pareja` (
  `id_grupo` int(11) NOT NULL,
  `username1` varchar(15) NOT NULL,
  `username2` varchar(15) NOT NULL,
  `email_destino` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`,`username1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE IF NOT EXISTS `tipo_user` (
  `tipo_user` int(11) NOT NULL,
  `desc_tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`tipo_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`tipo_user`, `desc_tipo`) VALUES
(0, 'Normal'),
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_grupo` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `usernamed` varchar(15) NOT NULL,
  `run` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tipo_user` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `envia_correo` int(11) NOT NULL,
  PRIMARY KEY (`id_grupo`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_grupo`, `username`, `usernamed`, `run`, `password`, `nombre`, `email`, `tipo_user`, `estado`, `envia_correo`) VALUES
(1, '10920000', '10920000-K', '10.920.000-K', 'Vl1234567$', 'MARÍA VERONICA LANDAETA FERNANDEZ', 'veronica_landaeta@hotmail.com', 0, 0, 0),
(1, '10984975', '10984975-8', '10.984.975-8', '1R0R9R', 'MARIO ENRIQUE PACHECO AREVALO', 'mario.pacheco.arevalo@gmail.com', 0, 0, 0),
(1, '13257517', '13257517-7', '13.257.517-7', '1R3R2R', 'CLAUDIA ALEJANDRA SAAVEDRA ESPINOZA', 'claudia.saavedra@ejercito.cl', 0, 0, 0),
(1, '13720031', '13720031-7', '13.720.031-7', 'Mmorenoo.22', 'VICTOR ALEJANDRO ARANEDA ESPINOZA', 'varanedae1979@gmail.com', 0, 0, 0),
(1, '13829523', '13829523-0', '13.829.523-0', 'Jefedeade2022.', 'EDGARDO ALBERTO ANDRES MERINO MORONG', 'edmerinom@gmail.com', 0, 0, 0),
(1, '13925718', '13925718-9', '13.925.718-9', 'Luarda2021*', 'ANDREA ESTRELLA VILLALOBOS LATORRE', 'avilla.latorre@gmail.com', 0, 0, 0),
(1, '14007075', '14007075-0', '14.007.075-0', '1R4R0R', 'MARCOS ENRIQUE MALDONADO MALDONADO', 'marcos89@hotmail.cl', 0, 0, 0),
(1, '14097454', '14097454-4', '14.097.454-4', '61900338', 'RODRIGO ERNESTO JAVIER PONCE BECKER', 'poncebecker@gmail.com', 0, 0, 0),
(1, '14145742', '14145742-K', '14.145.742-K', '1234567', 'AMADA LILY BARAHONA ORTIZ', 'amadiab@gmail.com', 0, 0, 0),
(1, '15316475', '15316475-4', '15.316.475-4', 'jj623', 'JAVIERA LORENA JIMENEZ LABRA', 'prof.javierajimenez@gmail.com', 0, 0, 0),
(1, '15419268', '15419268-9', '15.419.268-9', 'Joaquin1$', 'DANILO NOLASCO FERRAGUT BERRIOS', 'danilo.ferragut1982@gmail.com', 0, 0, 0),
(1, '16357546', '16357546-9', '16.357.546-9', '18181818', 'FELIPE IGNACIO FIGUEROA MARTIN', 'ffigueroamartin@gmail.com', 0, 0, 0),
(1, '16522549', '16522549-K', '16.522.549-K', 'Miguel.21Â·', 'MIGUEL ANGEL MALDONADO CANALES', 'chava_maldoka@live.cl', 0, 0, 0),
(1, '16770405', '16770405-0', '16.770.405-0', 'BacoRon1987.', 'PABLO ALEJANDRO DELGADO GOLUSDA', 'pabloadg87@gmail.com', 0, 0, 0),
(1, '17308295', '17308295-9', '17.308.295-9', 'Distancia2021##', 'MAURICIO ANDRES CONCHA GALLARDO', 'mauricioconcha89@gmail.com', 0, 0, 0),
(1, '18030261', '18030261-1', '18.030.261-1', 'carla20', 'CARLA IGNACIA GARCÍA ZÚÑIGA', 'carla_garcia_3f@hotmail.com', 0, 0, 0),
(1, '18860120', '18860120-0', '18.860.120-0', 'Danky123$', 'JULIO DIEGO GARCÍA DURÁN', 'juliogarcia.sub@gmail.com', 0, 0, 0),
(1, '19700339', '19700339-1', '19.700.339-1', 'Nino2326$', 'NINOSKA SCARLETT GUZMÁN RODRÍGUEZ', 'guzmaninoska@gmail.com', 0, 0, 0),
(1, '19755697', '19755697-8', '19.755.697-8', 'Js232521$', 'JAVIER IGNACIO SEREÑO MUNDACA', 'sereno.mundaca@gmail.com', 1, 0, 0),
(1, '20336035', '20336035-5', '20.336.035-5', 'Asdfghjkl1.', 'DIEGO ANTONIO CHÁVEZ CAMPOS', 'chavez.cc620@gmail.com', 0, 0, 0),
(1, '20711962', '20711962-8', '20.711.962-8', '29062001Ma.', 'MAITE CATALINA GONZÁLEZ URZUA', 'maite_catalina29@hotmail.com', 0, 0, 0),
(1, '6417928', '6417928-4', '06.417.928-4', 'Dvh2020.', 'RICARDO ALONSO ARANDA VILLALOBOS', 'rarandavi@gmail.com', 0, 0, 0),
(1, '6491491', '6491491-K', '06.491.491-K', 'LuisDE1$', 'LUIS OSVALDO VALDEBENITO CUBILLOS', 'luis.valdebenito@gmail.com', 0, 0, 0),
(1, '7741917', '7741917-9', '7.741.917-9', 'Betty981$', 'ISMAEL ANDRÉS GUTIERREZ LARRAGUIBEL', 'ismael.gutierrez@ejercito.cl', 1, 0, 0),
(1, '8756138', '8756138-0', '08.756.138-0', 'Sokotroko3K!', 'RENE FELIPE VIANCOS SOTO', 'rviancos@gmail.com', 0, 0, 0),
(2, '13257517', '13257517-7', '13.257.517-7', '1234', 'CLAUDIA ALEJANDRA SAAVEDRA ESPINOZA', 'claudia.saavedra@ejercito.cl', 1, 0, 0),
(2, '15796651', '15796651-0', '15.796.651-0', '1234', 'GISSELLE BRAVO', 'gisselle_judith_b@hotmail.com', 1, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
