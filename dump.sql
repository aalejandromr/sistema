
-- Database: `db_skyfleeter`
--

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `created_at`, `updated_at`) VALUES
(1, 'Test Editado', '2018-01-08 00:10:19', '2018-01-09 09:04:07'),
(2, 'Marca', '2018-01-09 09:04:27', '2018-01-16 07:04:08'),
(3, 'Marca II', '2018-01-09 09:05:27', '2018-01-09 09:05:27'),
(4, 'Micheline', '2018-01-16 07:03:23', '2018-01-16 07:03:23'),
(5, 'toyo', '2018-01-16 07:03:41', '2018-01-16 07:03:41');

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `descripcion`, `vigente`, `fecha_facturacion`, `ultimo_pago`, `created_at`, `updated_at`) VALUES
(1, 'Empresa Test 1', 1, '2017-12-31', '2017-11-29 00:00:00', '2017-12-11 04:19:52', '2017-12-11 04:19:52');

--
-- Dumping data for table `fabricantes`
--

INSERT INTO `fabricantes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fabricante prueba editado', '2018-01-15 00:37:20', '2018-01-15 00:40:18');

--
-- Dumping data for table `medidas`
--

INSERT INTO `medidas` (`id`, `medida`, `created_at`, `updated_at`) VALUES
(1, 'Test editado medida', '2018-01-09 09:28:33', '2018-01-09 09:42:46');

--
-- Dumping data for table `aplicacions`

INSERT INTO `aplicacions` (`id`, `aplicacion`, `created_at`, `updated_at`) VALUES
(1, 'Aplicacion Prueba Editado', '2018-01-15 00:05:25', '2018-01-15 00:06:16');

--
-- Dumping data for table `construccions`
--

INSERT INTO `construccions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Test construccion editado', '2018-01-09 10:10:30', '2018-01-10 08:36:32'),
(2, 'Test construccion', '2018-01-09 10:12:53', '2018-01-09 10:12:53');

--
-- Dumping data for table `fabricantes`
--

INSERT INTO `fabricantes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fabricante prueba editado', '2018-01-15 00:37:20', '2018-01-15 00:40:18');

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `design`, `aplicacion_id`, `fabricante_id`, `created_at`, `updated_at`) VALUES
(1, 'Prueba design editado', 1, 1, '2018-01-14 20:16:57', '2018-01-23 10:50:34'),
(2, 'Test Design 2', 1, 1, '2018-01-23 10:22:45', '2018-01-23 10:50:41');


--
-- Dumping data for table `distributions`
--

INSERT INTO `distributions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'VMAB', '2018-02-08 21:52:47', '2018-02-08 22:07:00'),
(2, 'WIENS', '2018-02-08 21:53:23', '2018-02-08 21:53:23');

--
-- Dumping data for table `distribution_positions`
--

INSERT INTO `distribution_positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Frontal Editado', '2018-02-06 11:45:04', '2018-02-06 11:50:25'),
(2, 'TRASERA', '2018-02-08 22:13:32', '2018-02-08 22:14:22');

--
-- Dumping data for table `ejes`
--

INSERT INTO `ejes` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-02-08 04:41:34', '2018-02-08 05:22:52', 'Eje Principal'),
(2, '2018-02-08 04:41:34', '2018-02-08 05:22:52', 'Eje Repuesto');

--
-- Dumping data for table `eje_distributions`
--

INSERT INTO `eje_distributions` (`id`, `eje_id`, `distribution_id`, `created_at`, `updated_at`, `posicion`, `distribution_position_id`) VALUES
(1, 1, 1, '2018-02-08 16:16:58', '2018-02-08 16:16:59', 2, 1),
(3, 2, 1, '2018-02-08 16:16:58', '2018-02-08 16:16:59', 1, 2),
(4, 1, 1, '2018-02-08 16:16:58', '2018-02-08 16:16:59', 1, 1);

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `descripcion`, `vigente`, `fecha_facturacion`, `ultimo_pago`, `created_at`, `updated_at`) VALUES
(1, 'Empresa Test 1', 1, '2017-12-31', '2017-11-29 00:00:00', '2017-12-11 04:19:52', '2017-12-11 04:19:52');


--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `created_at`, `updated_at`) VALUES
(1, 'Test Editado', '2018-01-08 00:10:19', '2018-01-09 09:04:07'),
(2, 'Marca', '2018-01-09 09:04:27', '2018-01-16 07:04:08'),
(3, 'Marca II', '2018-01-09 09:05:27', '2018-01-09 09:05:27'),
(4, 'Micheline', '2018-01-16 07:03:23', '2018-01-16 07:03:23'),
(5, 'toyo', '2018-01-16 07:03:41', '2018-01-16 07:03:41');

--
-- Dumping data for table `medidas`
--

INSERT INTO `medidas` (`id`, `medida`, `created_at`, `updated_at`) VALUES
(1, 'Test editado medida', '2018-01-09 09:28:33', '2018-01-09 09:42:46');

--
-- Dumping data for table `migrations`
--

-- Dumping data for table `tipos`
--

INSERT INTO `tipos` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tipo Prueba Editado', '2018-01-14 23:16:27', '2018-01-14 23:27:02');

--
-- Dumping data for table `tipoUsuarios`
--

INSERT INTO `tipoUsuarios` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Administrador Global', '2017-12-11 03:58:20', '2017-12-11 03:58:20'),
(2, 'Super Administrador', '2017-12-11 04:00:47', '2017-12-11 04:00:47'),
(3, 'Administrador', '2017-12-11 04:00:47', '2017-12-11 04:00:47'),
(4, 'Llantero', '2017-12-11 04:00:47', '2017-12-11 04:00:47'),
(5, 'Encargado de Almacen', '2017-12-11 04:00:47', '2017-12-11 04:00:47');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `empresa_id`, `intentos_login`, `ultimo_logueo`, `tipoUsuario_id`) VALUES
(8, 'SPAD', 'superadministrador@administracion.com', '$2y$10$7wY.GKvmSDsTO7.VVRYuyuNHPyxoea5HdatMnZst72WcGcmDWQqYW', 'mI6CV1smVQeGFPShXoRHW1uzo3dbBQw551D5iiUOsC5DQpAEvm3XiFebmh5F', '2017-12-20 08:26:03', '2017-12-20 08:26:03', 1, 0, '2017-12-20', 1),
(9, 'AINS', 'administrador_instancias@administracion.com', '$2y$10$yOKL7lRlR.jvE/Y18AgFM.ivVgoquRhMGKKV4SUYj.F62Yzip9x3K', NULL, '2017-12-20 08:26:03', '2017-12-20 08:26:03', 1, 0, '2017-12-20', 2),
(10, 'AIN', 'administrador_instancia@administracion.com', '$2y$10$o8/eGCcsM7Gh8Cs7KKjOKe18orrWFLAzmoLd/vroG.MNJ1kHH/yl6', NULL, '2017-12-20 08:26:03', '2017-12-20 08:26:03', 1, 0, '2017-12-20', 3),
(11, 'LLNTR', 'llantero@administracion.com', '$2y$10$X6OnGgsx8XAE.wG2BmQLn.c6PqC9WgCObKeDPxUl8wd04wXtL5szy', '9d56IsZj3x5lNoK7tus24FJQFD6VLUK0BOKvYMqRHGz6cCdca1TzD1cjFGSC', '2017-12-20 08:27:40', '2017-12-20 08:27:40', 1, 0, '2017-12-20', 4),
(12, 'EDBG', 'encargado_bodega@administracion.com', '$2y$10$CjtcGRZiEHE8ldZuTNy5bu1J2WPJGnFkMs8KMNYP2QP/B6wd9g2pq', 'J6hVtQRxHayebpfti1dc5xosLwiP57NCIKy1wb8Bs2TiagKsuEuvbAgpIpP4', '2017-12-20 08:29:29', '2017-12-20 08:29:29', 1, 0, '2017-12-20', 5);

-- Dumping data for table `almacens`
--

INSERT INTO `almacens` (`id`, `marca_id`, `medida_id`, `dot`, `profundidad`, `construccion_id`, `tipo_id`, `design_id`, `costo`, `factura`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1006', '0', 1, 1, 1, 3, '', NULL, NULL),
(2, 3, 1, 'DOT', 'Prof', 2, 1, 2, 3, 'N/A', '2018-01-24 00:24:59', '2018-01-24 00:24:59'),
(3, 2, 1, 'DOTRGSTR', '93', 2, 1, 2, NULL, NULL, '2018-01-28 08:55:59', '2018-01-28 08:55:59');