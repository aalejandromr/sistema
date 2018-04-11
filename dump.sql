
/*!40000 ALTER TABLE `almacens` ENABLE KEYS */;

-- Dumping data for table skyfleeter.aplicacions: ~1 rows (approximately)
/*!40000 ALTER TABLE `aplicacions` DISABLE KEYS */;
INSERT INTO `aplicacions` (`id`, `aplicacion`, `created_at`, `updated_at`) VALUES
	(1, 'Aplicacion Prueba Editado', '2018-01-14 18:05:25', '2018-01-14 18:06:16');
/*!40000 ALTER TABLE `aplicacions` ENABLE KEYS */;

-- Dumping data for table skyfleeter.clases: ~0 rows (approximately)
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;

-- Dumping data for table skyfleeter.construccions: ~2 rows (approximately)
/*!40000 ALTER TABLE `construccions` DISABLE KEYS */;
INSERT INTO `construccions` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Test construccion editado', '2018-01-09 04:10:30', '2018-01-10 02:36:32'),
	(2, 'Test construccion', '2018-01-09 04:12:53', '2018-01-09 04:12:53');
/*!40000 ALTER TABLE `construccions` ENABLE KEYS */;


/*!40000 ALTER TABLE `designs` ENABLE KEYS */;

-- Dumping data for table skyfleeter.distributions: ~2 rows (approximately)
/*!40000 ALTER TABLE `distributions` DISABLE KEYS */;
INSERT INTO `distributions` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'VMAB', '2018-02-08 15:52:47', '2018-02-08 16:07:00'),
	(2, 'WIENS', '2018-02-08 15:53:23', '2018-02-08 15:53:23');
/*!40000 ALTER TABLE `distributions` ENABLE KEYS */;

-- Dumping data for table skyfleeter.distribution_positions: ~2 rows (approximately)
/*!40000 ALTER TABLE `distribution_positions` DISABLE KEYS */;
INSERT INTO `distribution_positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Frontal Editado', '2018-02-06 05:45:04', '2018-02-06 05:50:25'),
	(2, 'TRASERA', '2018-02-08 16:13:32', '2018-02-08 16:14:22');
/*!40000 ALTER TABLE `distribution_positions` ENABLE KEYS */;

-- Dumping data for table skyfleeter.ejes: ~2 rows (approximately)
/*!40000 ALTER TABLE `ejes` DISABLE KEYS */;
INSERT INTO `ejes` (`id`, `created_at`, `updated_at`, `name`) VALUES
	(1, '2018-02-07 22:41:34', '2018-02-07 23:22:52', 'Eje Principal'),
	(2, '2018-02-07 22:41:34', '2018-02-07 23:22:52', 'Eje Repuesto');
/*!40000 ALTER TABLE `ejes` ENABLE KEYS */;



-- Dumping data for table skyfleeter.fabricantes: ~1 rows (approximately)
/*!40000 ALTER TABLE `fabricantes` DISABLE KEYS */;
INSERT INTO `fabricantes` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Fabricante prueba editado', '2018-01-14 18:37:20', '2018-01-14 18:40:18');
/*!40000 ALTER TABLE `fabricantes` ENABLE KEYS */;

-- Dumping data for table skyfleeter.llanta_ejes: ~0 rows (approximately)
/*!40000 ALTER TABLE `llanta_ejes` DISABLE KEYS */;
/*!40000 ALTER TABLE `llanta_ejes` ENABLE KEYS */;

-- Dumping data for table skyfleeter.marcas: ~5 rows (approximately)
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`id`, `marca`, `created_at`, `updated_at`) VALUES
	(1, 'Test Editado', '2018-01-07 18:10:19', '2018-01-09 03:04:07'),
	(2, 'Marca', '2018-01-09 03:04:27', '2018-01-16 01:04:08'),
	(3, 'Marca II', '2018-01-09 03:05:27', '2018-01-09 03:05:27'),
	(4, 'Micheline', '2018-01-16 01:03:23', '2018-01-16 01:03:23'),
	(5, 'toyo', '2018-01-16 01:03:41', '2018-01-16 01:03:41');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Dumping data for table skyfleeter.medidas: ~1 rows (approximately)
/*!40000 ALTER TABLE `medidas` DISABLE KEYS */;
INSERT INTO `medidas` (`id`, `medida`, `created_at`, `updated_at`) VALUES
	(1, 'Test editado medida', '2018-01-09 03:28:33', '2018-01-09 03:42:46');
/*!40000 ALTER TABLE `medidas` ENABLE KEYS */;


-- Dumping data for table skyfleeter.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table skyfleeter.role_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping data for table skyfleeter.statuses: ~0 rows (approximately)
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;



-- Dumping data for table skyfleeter.tipos: ~1 rows (approximately)
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Tipo Prueba Editado', '2018-01-14 17:16:27', '2018-01-14 17:27:02');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;

-- Dumping data for table skyfleeter.tipousuarios: ~5 rows (approximately)
/*!40000 ALTER TABLE `tipousuarios` DISABLE KEYS */;
INSERT INTO `tipousuarios` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador Global', '2017-12-10 21:58:20', '2017-12-10 21:58:20'),
	(2, 'Super Administrador', '2017-12-10 22:00:47', '2017-12-10 22:00:47'),
	(3, 'Administrador', '2017-12-10 22:00:47', '2017-12-10 22:00:47'),
	(4, 'Llantero', '2017-12-10 22:00:47', '2017-12-10 22:00:47'),
	(5, 'Encargado de Almacen', '2017-12-10 22:00:47', '2017-12-10 22:00:47');
/*!40000 ALTER TABLE `tipousuarios` ENABLE KEYS */;

-- Dumping data for table skyfleeter.tropas: ~0 rows (approximately)
/*!40000 ALTER TABLE `tropas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tropas` ENABLE KEYS */;

-- Dumping data for table skyfleeter.tropa_models: ~0 rows (approximately)
/*!40000 ALTER TABLE `tropa_models` DISABLE KEYS */;
/*!40000 ALTER TABLE `tropa_models` ENABLE KEYS */;

-- Dumping data for table skyfleeter.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `empresa_id`, `intentos_login`, `ultimo_logueo`, `tipoUsuario_id`) VALUES
	(8, 'SPAD', 'superadministrador@administracion.com', '$2y$10$7wY.GKvmSDsTO7.VVRYuyuNHPyxoea5HdatMnZst72WcGcmDWQqYW', '8UGpTaaglW753CD32fqDYGdnouRFe22Cp1cmL57LXQXi9DFPvacBr06zDGUc', '2017-12-20 02:26:03', '2017-12-20 02:26:03', 1, 0, '2017-12-20', 1),
	(9, 'AINS', 'administrador_instancias@administracion.com', '$2y$10$yOKL7lRlR.jvE/Y18AgFM.ivVgoquRhMGKKV4SUYj.F62Yzip9x3K', 'fmBTKLRGk5WtzkxBGmuRGWJdeiCb5TdF8LrQd68pmDzZ43o3UJNwpBXAAmos', '2017-12-20 02:26:03', '2017-12-20 02:26:03', 1, 0, '2017-12-20', 2),
	(10, 'AIN', 'administrador_instancia@administracion.com', '$2y$10$o8/eGCcsM7Gh8Cs7KKjOKe18orrWFLAzmoLd/vroG.MNJ1kHH/yl6', 'qCe1p9UDWlAsfTFj0EI3vlxWQThiVLz5P5j5QxLzY3nhbeFfrw20ZmPo8f6H', '2017-12-20 02:26:03', '2017-12-20 02:26:03', 1, 0, '2017-12-20', 3),
	(11, 'LLNTR', 'llantero@administracion.com', '$2y$10$X6OnGgsx8XAE.wG2BmQLn.c6PqC9WgCObKeDPxUl8wd04wXtL5szy', '9d56IsZj3x5lNoK7tus24FJQFD6VLUK0BOKvYMqRHGz6cCdca1TzD1cjFGSC', '2017-12-20 02:27:40', '2017-12-20 02:27:40', 1, 0, '2017-12-20', 4),
	(12, 'EDBG', 'encargado_bodega@administracion.com', '$2y$10$CjtcGRZiEHE8ldZuTNy5bu1J2WPJGnFkMs8KMNYP2QP/B6wd9g2pq', '1xrIGa0aAvip9dGgOx6Q7YGJVY3B3T2gpepTRjgxJE7DV6cFXRQpWjeIGV4L', '2017-12-20 02:29:29', '2017-12-20 02:29:29', 1, 0, '2017-12-20', 5);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table skyfleeter.almacens: ~3 rows (approximately)
/*!40000 ALTER TABLE `almacens` DISABLE KEYS */;
INSERT INTO `almacens` (`id`, `marca_id`, `medida_id`, `dot`, `profundidad`, `construccion_id`, `tipo_id`, `design_id`, `costo`, `factura`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '1006', '0', 1, 1, 1, 3, '', NULL, NULL),
	(2, 3, 1, 'DOT', 'Prof', 2, 1, 2, 3, 'N/A', '2018-01-23 18:24:59', '2018-01-23 18:24:59'),
	(3, 2, 1, 'DOTRGSTR', '93', 2, 1, 2, NULL, NULL, '2018-01-28 02:55:59', '2018-01-28 02:55:59');


	-- Dumping data for table skyfleeter.designs: ~2 rows (approximately)
/*!40000 ALTER TABLE `designs` DISABLE KEYS */;
INSERT INTO `designs` (`id`, `design`, `aplicacion_id`, `fabricante_id`, `created_at`, `updated_at`) VALUES
	(1, 'Prueba design editado', 1, 1, '2018-01-14 14:16:57', '2018-01-23 04:50:34'),
	(2, 'Test Design 2', 1, 1, '2018-01-23 04:22:45', '2018-01-23 04:50:41');

-- Dumping data for table skyfleeter.eje_distributions: ~3 rows (approximately)
/*!40000 ALTER TABLE `eje_distributions` DISABLE KEYS */;
INSERT INTO `eje_distributions` (`id`, `eje_id`, `distribution_id`, `created_at`, `updated_at`, `posicion`, `distribution_position_id`) VALUES
	(1, 1, 1, '2018-02-08 10:16:58', '2018-02-08 10:16:59', 2, 1),
	(3, 2, 1, '2018-02-08 10:16:58', '2018-02-08 10:16:59', 1, 2),
	(4, 1, 1, '2018-02-08 10:16:58', '2018-02-08 10:16:59', 1, 1);
/*!40000 ALTER TABLE `eje_distributions` ENABLE KEYS */;


-- Dumping data for table skyfleeter.empresas: ~1 rows (approximately)
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` (`id`, `descripcion`, `vigente`, `fecha_facturacion`, `ultimo_pago`, `created_at`, `updated_at`) VALUES
	(1, 'Empresa Test 1', 1, '2017-12-31', '2017-11-29 00:00:00', '2017-12-10 22:19:52', '2017-12-10 22:19:52');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;


-- Dumping data for table skyfleeter.sucursals: ~2 rows (approximately)
/*!40000 ALTER TABLE `sucursals` DISABLE KEYS */;
INSERT INTO `sucursals` (`id`, `sucursal_name`, `empresa_id`, `expired_on`, `created_at`, `updated_at`) VALUES
	(3, 'Sucursal Test', 1, '2018-04-09', '2018-04-09 16:15:03', '2018-04-09 16:15:04'),
	(4, 'Sucursal Test Editado', 1, '2018-04-09', '2018-04-10 05:42:17', '2018-04-10 05:42:17');
/*!40000 ALTER TABLE `sucursals` ENABLE KEYS */;