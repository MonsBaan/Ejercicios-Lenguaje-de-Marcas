-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-02-2021 a las 13:39:56
-- Versión del servidor: 8.0.23-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mastodonn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE DATABASE mastodon;
USE mastodon;

CREATE TABLE `galeria` (
  `id_galeria` int NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `id_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_galeria`, `imagen`, `id_usuario`) VALUES
(1, 'images/mastodon1.jpg', 3),
(2, 'images/mastodon2.jpg', 4),
(3, 'images/mastodon3.jpg', 8),
(4, 'images/mastodon4.jpg', 9),
(5, 'images/mastodon5.jpg', 10),
(6, 'images/mastodon6.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giras`
--

CREATE TABLE `giras` (
  `id_gira` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `fecha` date NOT NULL,
  `localizacion` varchar(100) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `enlace` varchar(500) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `id_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `giras`
--

INSERT INTO `giras` (`id_gira`, `nombre`, `fecha`, `localizacion`, `enlace`, `id_usuario`) VALUES
(1, 'DOWNLOAD FESTIVAL 2021', '2021-06-05', 'Donington ParkCastle, Donington, UK', 'https://www.songkick.com/festivals/1948-download/id/39585273-download-festival-2021?utm_source=46422&utm_medium=partner', 3),
(2, 'ROCK AM RING 2021', '2021-06-11', 'Nürburgring, Nürburg, Germany', 'https://www.songkick.com/festivals/1237-rock-am-ring/id/39558573-rock-am-ring-2021?utm_source=46422&utm_medium=partner', 4),
(3, 'ROCK IM PARK 2021', '2021-06-12', 'Zeppelinfeld, Nuremberg, Germany', 'https://www.songkick.com/festivals/19-rock-im-park/id/39617093-rock-im-park-2021?utm_source=46422&utm_medium=partner', 8),
(4, 'DAGSPASS - TONS OF ROCK', '2021-06-24', 'Ekeberg, Oslo, Norway', 'https://www.songkick.com/festivals/3274536-dagspass-tons-of-rock/id/39706851-dagspass--tons-of-rock-2021?utm_source=46422&utm_medium=partner', 9),
(5, 'MONSTER ENERGY AFTERSHOCK 2021', '2021-10-10', 'Discovery Park, Sacramento, CA, US', 'https://www.songkick.com/festivals/745774-monster-energy-aftershock/id/39649774-monster-energy-aftershock-2021?utm_source=46422&utm_medium=partner', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_user` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `contraseña` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_user`, `nombre`, `contraseña`, `email`) VALUES
(1, 'admin', 'password', ''),
(3, 'BunsBun', 'bun', 'bunsbun@gmail.com'),
(8, 'mas_2_de_fracaso', '123', 'mas_2_de_fracaso@gmail.com'),
(9, 'LaCantinaRolera', '123', 'LaCantinaRolera@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merch`
--

CREATE TABLE `merch` (
  `id_merch` int NOT NULL,
  `imagen` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `enlace` varchar(100) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `audio` varchar(100) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `id_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `merch`
--

INSERT INTO `merch` (`id_merch`, `imagen`, `nombre`, `enlace`, `audio`, `id_usuario`) VALUES
(1, 'images\\album_mediumrarities.jpg', 'Medium Rarities', 'https://open.spotify.com/album/3xeGtowrXCRjPOmZahNAoW?si=dlR65IMdSpmEtAlXBrVMyw', 'audio\\mastodon_fallenTorches.mp3', 3),
(2, 'images\\album_emperorOfSand.jpg', 'Emperor of Sand', 'https://open.spotify.com/album/37uT9eDEnoM28qsPUgNyEs?si=Y6mI4I0mTx-QwP50PG1c0A', 'audio\\mastodon_jaguarGod.mp3', 4),
(3, 'images\\album_OMRTS.jpg', 'Once More \'Round The Sun', 'https://open.spotify.com/album/7mEkBi9a2p2f1WQbnH8Qk5?si=-rTD5D3kTwe3YnWjuXwzpQ', 'audio\\mastodon_theMotherload.mp3', 8),
(4, 'images\\album_thehunter.jpg', 'The Hunter', 'audio\\mastodon_theHunter.mp3', 'https://open.spotify.com/album/5Zjhls03el4wXkmtcZEi8b', 9),
(5, 'images\\album_cracktheskye.jpg', 'Crack The Skye', 'https://open.spotify.com/album/2W2nqEKXWBorbq5yvm3jZg', 'audio\\mastodon_oblivion.mp3', 10),
(6, 'images\\album_bloodMountain.jpg', 'Blood Mountain', 'https://open.spotify.com/album/1n8QZFcwx5aQ2LIIlj0iYe', 'audio\\mastodon_skin.mp3', 3),
(7, 'images\\album_CalloftheMastodon.jpg', 'Call of the Mastodon', 'https://open.spotify.com/album/1jEzsqPzCsBtkdBOKseLy9', 'audio\\mastodon_calloftheMastodon.mp3', 4),
(8, 'images\\album_leviathan.jpg', 'Leviathan', 'https://open.spotify.com/album/6khFoLWnJZDQvZ7Pijym3b', 'audio\\mastodon_bloodandThunder.mp3', 8),
(9, 'images\\album_remission.jpg', 'Remission', 'https://open.spotify.com/album/1aQZecM7d2R3SvPs2HNNIA', 'audio\\mastodon_trainwreck.mp3', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `id_miembro` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `descripcion` varchar(300) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `posicion` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `id_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id_miembro`, `nombre`, `descripcion`, `imagen`, `posicion`, `id_usuario`) VALUES
(1, 'Brent Hinds', 'William Brent Hinds, conocido como Brent Hinds es un cantante y guitarrista estadounidense que forma parte de las bandas de Sludge metal, Mastodon y, a su vez, de proyecto paralelo, Friend Without a Face', 'images/BrentHinds.jpg', 'Vocalista', 3),
(2, 'Troy Sanders', 'Troy Jayson Sanders es el bajista y uno de los vocalistas de la banda de Sludge metal Mastodon. Sanders se introdujo en el mundo de la música robándole el bajo a su hermano mayor. A pesar de ser un bajo para zurdos y ser diestro Troy, aprendió a tocar hasta que consiguió un bajo propio.', 'images/TroySanders.jpg', 'Bajista', 4),
(3, 'Bill Kelliher', 'Bill Kelliher es un guitarrista estadounidense que forma parte de la banda de Sludge metal, Mastodon, en la que permanece como miembro fundador junto con el batería Brann Dailor. Junto con el otro guitarrista de la banda, Brent Hinds, recibió el premio Golden Gods el 12 de junio de 2007', 'images/BillKelliher.jpg', 'Guitarrista', 8),
(4, 'Brann Dailor', 'Brann Timothy Dailor es un baterista estadounidense conocido por ser uno de los miembros fundadores de la banda de Sludge metal Mastodon. Su estilo de tocar la batería está influenciado por el jazz y el rock progresivo, siendo una pieza fundamental a la hora de asentar el sonido de Mastodon.', 'images/BrannDailor.jpg', 'Bateria', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `resumen` varchar(100) COLLATE utf32_bin NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `enlace` varchar(100) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `resumen`, `descripcion`, `enlace`, `fecha`, `id_usuario`) VALUES
(1, 'AFTERSHOCK 2021', 'Festival AFTERSHOCK 2021', 'Tenemos muchas ganas de veros a todos en el festival AFTERSHOCK 2021!', 'https://www.mastodonrocks.com/news/aftershock-2021-142516', '2020-10-22', 3),
(2, 'Tons of Rock 2021', 'Festival Tons of Rock 2021', 'Noruega - Estamos emocionados para tocan en el festival Tons of Rock 2021', 'https://www.mastodonrocks.com/news/tons-rock-2021-142511', '2020-10-21', 4),
(3, 'Cocinando con Mastodon', 'Documental Mastodon', 'Podrán cocinar algo tan especial que pueda sacarles de la cocina?', 'https://www.mastodonrocks.com/news/cooking-mastodon-142506', '2020-10-15', 8),
(5, 'Noticia 5', 'Noticia 5', 'Noticia5 Noticia5 Noticia5 ', '', '2020-04-13', 10),
(7, 'Noticia 7', 'Noticia 7', 'Noticia7 Noticia7 Noticia7 ', '', '2020-10-19', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `giras`
--
ALTER TABLE `giras`
  ADD PRIMARY KEY (`id_gira`),
  ADD KEY `enlace` (`enlace`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `enlace_2` (`enlace`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `merch`
--
ALTER TABLE `merch`
  ADD PRIMARY KEY (`id_merch`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`id_miembro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `giras`
--
ALTER TABLE `giras`
  MODIFY `id_gira` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `merch`
--
ALTER TABLE `merch`
  MODIFY `id_merch` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `id_miembro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
