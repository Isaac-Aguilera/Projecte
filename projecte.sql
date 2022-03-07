-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-03-2022 a las 18:24:07
-- Versión del servidor: 8.0.25-0ubuntu0.20.04.1
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
-- Base de datos: `projecte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categories`
--

CREATE TABLE `Categories` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Categories`
--

INSERT INTO `Categories` (`id`, `name`) VALUES
(1, 'Music'),
(3, 'Videogame'),
(5, 'Sports'),
(6, 'Agriculture'),
(7, 'Arts'),
(8, 'Dancing'),
(9, 'History'),
(10, 'Science'),
(11, 'Beauty'),
(12, 'Education'),
(13, 'Finances'),
(14, 'Food'),
(15, 'Legality'),
(16, 'Vacations'),
(17, 'Trip'),
(18, 'Media'),
(19, 'Medical'),
(20, 'Environment'),
(21, 'Shopping'),
(22, 'Blogs'),
(23, 'Vehicle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comentaris`
--

CREATE TABLE `Comentaris` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `contingut` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Comentaris`
--

INSERT INTO `Comentaris` (`id`, `user_id`, `video_id`, `contingut`, `created_at`) VALUES
(88, 23, 96, 'Vaja q cracks!', '2021-05-21 15:10:21'),
(89, 23, 94, 'pilotes! que en són de bones!!', '2021-05-21 15:11:18'),
(90, 23, 86, 'ostres el Paquito!', '2021-05-21 15:14:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(10, 'cbee8809-cb17-49f5-a962-48df50fa9770', 'database', 'default', '{\"uuid\":\"cbee8809-cb17-49f5-a962-48df50fa9770\",\"displayName\":\"App\\\\Jobs\\\\UploadVideo\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\UploadVideo\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\UploadVideo\\\":11:{s:26:\\\"\\u0000App\\\\Jobs\\\\UploadVideo\\u0000data\\\";a:7:{s:6:\\\"_token\\\";s:40:\\\"hI1gtG3KS0enN6Sw56hgsbwETROlU6yW6eGwem4s\\\";s:7:\\\"user_id\\\";s:1:\\\"4\\\";s:5:\\\"title\\\";s:8:\\\"asdasdas\\\";s:11:\\\"description\\\";s:7:\\\"adasdas\\\";s:12:\\\"categoria_id\\\";s:1:\\\"5\\\";s:10:\\\"video_path\\\";s:51:\\\"videos\\/d6hEMFBxJ9MulTQXR9yQCvhZRft14aCd0uFEiDU5.mp4\\\";s:5:\\\"image\\\";s:55:\\\"miniaturas\\/bbFfXnGbakKl99kxFVJuCczCudYGPyNm7Dn5m5aa.jpg\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\UploadVideo has been attempted too many times or run too long. The job may have previously timed out. in /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:717\nStack trace:\n#0 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(486): Illuminate\\Queue\\Worker->maxAttemptsExceededException()\n#1 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(400): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts()\n#2 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(360): Illuminate\\Queue\\Worker->process()\n#3 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(158): Illuminate\\Queue\\Worker->runJob()\n#4 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon()\n#5 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#6 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#9 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#10 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#11 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call()\n#12 /home/projecte/Escritorio/Projecte/Projecte/vendor/symfony/console/Command/Command.php(256): Illuminate\\Console\\Command->execute()\n#13 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run()\n#14 /home/projecte/Escritorio/Projecte/Projecte/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run()\n#15 /home/projecte/Escritorio/Projecte/Projecte/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand()\n#16 /home/projecte/Escritorio/Projecte/Projecte/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun()\n#17 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run()\n#18 /home/projecte/Escritorio/Projecte/Projecte/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run()\n#19 /home/projecte/Escritorio/Projecte/Projecte/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#20 {main}', '2021-05-03 12:44:15'),
(12, 'd322f3f8-c5ee-4c5f-b021-37b005c9c3bc', 'database', 'default', '{\"uuid\":\"d322f3f8-c5ee-4c5f-b021-37b005c9c3bc\",\"displayName\":\"App\\\\Jobs\\\\UploadVideo\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\UploadVideo\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\UploadVideo\\\":11:{s:26:\\\"\\u0000App\\\\Jobs\\\\UploadVideo\\u0000data\\\";a:7:{s:6:\\\"_token\\\";s:40:\\\"SRhRbPhW9Som5LPhaCFrVawUxdOehl8wzoSLo6G2\\\";s:7:\\\"user_id\\\";s:1:\\\"5\\\";s:5:\\\"title\\\";s:7:\\\"Dancing\\\";s:11:\\\"description\\\";s:20:\\\"Video Dancing Monkas\\\";s:12:\\\"categoria_id\\\";s:1:\\\"8\\\";s:10:\\\"video_path\\\";s:51:\\\"videos\\/dDiOm9aspHRImnNvegY6R5PZPgUt0zKIkcaQPlCK.mp4\\\";s:5:\\\"image\\\";s:55:\\\"miniaturas\\/Or6WquEGjso6QdiFheaYdmDeujjltMKgipV3MTiF.jpg\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\UploadVideo has been attempted too many times or run too long. The job may have previously timed out. in /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:717\nStack trace:\n#0 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(199): Illuminate\\Queue\\Worker->maxAttemptsExceededException()\n#1 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Pipes/AbstractPipes.php(176): Illuminate\\Queue\\Worker->Illuminate\\Queue\\{closure}()\n#2 [internal function]: Symfony\\Component\\Process\\Pipes\\AbstractPipes->handleError()\n#3 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Pipes/UnixPipes.php(113): stream_select()\n#4 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(1434): Symfony\\Component\\Process\\Pipes\\UnixPipes->readAndWrite()\n#5 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(427): Symfony\\Component\\Process\\Process->readPipes()\n#6 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(249): Symfony\\Component\\Process\\Process->wait()\n#7 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/ProcessRunner.php(64): Symfony\\Component\\Process\\Process->run()\n#8 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/AbstractBinary.php(207): Alchemy\\BinaryDriver\\ProcessRunner->run()\n#9 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/AbstractBinary.php(136): Alchemy\\BinaryDriver\\AbstractBinary->run()\n#10 /home/projecte/Escritorio/Projecte/Goocrux/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/Media/AbstractVideo.php(100): Alchemy\\BinaryDriver\\AbstractBinary->command()\n#11 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): FFMpeg\\Media\\AbstractVideo->save()\n#12 /home/projecte/Escritorio/Projecte/Goocrux/vendor/pbmedia/laravel-ffmpeg/src/Drivers/PHPFFMpeg.php(272): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->forwardCallTo()\n#13 /home/projecte/Escritorio/Projecte/Goocrux/vendor/pbmedia/laravel-ffmpeg/src/Exporters/MediaExporter.php(168): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->__call()\n#14 /home/projecte/Escritorio/Projecte/Goocrux/app/Jobs/UploadVideo.php(42): ProtoneMedia\\LaravelFFMpeg\\Exporters\\MediaExporter->save()\n#15 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\UploadVideo->handle()\n#16 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#17 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#18 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#19 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#20 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#21 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#22 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#23 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#24 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#25 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#26 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#27 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#28 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#29 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#30 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#31 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(360): Illuminate\\Queue\\Worker->process()\n#32 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(158): Illuminate\\Queue\\Worker->runJob()\n#33 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon()\n#34 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#35 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#36 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#37 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#38 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#39 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#40 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call()\n#41 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Command/Command.php(256): Illuminate\\Console\\Command->execute()\n#42 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run()\n#43 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run()\n#44 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand()\n#45 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun()\n#46 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run()\n#47 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run()\n#48 /home/projecte/Escritorio/Projecte/Goocrux/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#49 {main}', '2021-05-21 12:59:44'),
(13, '25ea4471-60d0-4887-982d-0869f660399d', 'database', 'default', '{\"uuid\":\"25ea4471-60d0-4887-982d-0869f660399d\",\"displayName\":\"App\\\\Jobs\\\\UploadVideo\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\UploadVideo\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\UploadVideo\\\":11:{s:26:\\\"\\u0000App\\\\Jobs\\\\UploadVideo\\u0000data\\\";a:7:{s:6:\\\"_token\\\";s:40:\\\"SRhRbPhW9Som5LPhaCFrVawUxdOehl8wzoSLo6G2\\\";s:7:\\\"user_id\\\";s:1:\\\"5\\\";s:5:\\\"title\\\";s:68:\\\"Magnus Carlsen plays the King\'s Gambit vs. chess24 user FireMarshall\\\";s:11:\\\"description\\\";s:66:\\\"World Chess Champion Magnus Carlsen plays the famous King\'s Gambit\\\";s:12:\\\"categoria_id\\\";s:1:\\\"3\\\";s:10:\\\"video_path\\\";s:51:\\\"videos\\/0kB3dUeENNa1W8iJGKnTB1RuYzDVl9Nfu5TeukcH.mp4\\\";s:5:\\\"image\\\";s:55:\\\"miniaturas\\/iDq9TO9scwAYeqm7YUphBN4pApB3s0a2iQkXoHj8.jpg\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\UploadVideo has been attempted too many times or run too long. The job may have previously timed out. in /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:717\nStack trace:\n#0 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(199): Illuminate\\Queue\\Worker->maxAttemptsExceededException()\n#1 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Pipes/AbstractPipes.php(176): Illuminate\\Queue\\Worker->Illuminate\\Queue\\{closure}()\n#2 [internal function]: Symfony\\Component\\Process\\Pipes\\AbstractPipes->handleError()\n#3 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Pipes/UnixPipes.php(113): stream_select()\n#4 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(1434): Symfony\\Component\\Process\\Pipes\\UnixPipes->readAndWrite()\n#5 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(427): Symfony\\Component\\Process\\Process->readPipes()\n#6 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(249): Symfony\\Component\\Process\\Process->wait()\n#7 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/ProcessRunner.php(64): Symfony\\Component\\Process\\Process->run()\n#8 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/AbstractBinary.php(207): Alchemy\\BinaryDriver\\ProcessRunner->run()\n#9 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/AbstractBinary.php(136): Alchemy\\BinaryDriver\\AbstractBinary->run()\n#10 /home/projecte/Escritorio/Projecte/Goocrux/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/Media/AbstractVideo.php(100): Alchemy\\BinaryDriver\\AbstractBinary->command()\n#11 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): FFMpeg\\Media\\AbstractVideo->save()\n#12 /home/projecte/Escritorio/Projecte/Goocrux/vendor/pbmedia/laravel-ffmpeg/src/Drivers/PHPFFMpeg.php(272): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->forwardCallTo()\n#13 /home/projecte/Escritorio/Projecte/Goocrux/vendor/pbmedia/laravel-ffmpeg/src/Exporters/MediaExporter.php(168): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->__call()\n#14 /home/projecte/Escritorio/Projecte/Goocrux/app/Jobs/UploadVideo.php(42): ProtoneMedia\\LaravelFFMpeg\\Exporters\\MediaExporter->save()\n#15 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\UploadVideo->handle()\n#16 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#17 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#18 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#19 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#20 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#21 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#22 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#23 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#24 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#25 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#26 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#27 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#28 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#29 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#30 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#31 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(360): Illuminate\\Queue\\Worker->process()\n#32 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(158): Illuminate\\Queue\\Worker->runJob()\n#33 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon()\n#34 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#35 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#36 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#37 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#38 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#39 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#40 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call()\n#41 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Command/Command.php(256): Illuminate\\Console\\Command->execute()\n#42 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run()\n#43 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run()\n#44 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand()\n#45 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun()\n#46 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run()\n#47 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run()\n#48 /home/projecte/Escritorio/Projecte/Goocrux/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#49 {main}', '2021-05-21 13:02:03'),
(14, '68227d28-1adc-44c1-8c05-00c7bbf94992', 'database', 'default', '{\"uuid\":\"68227d28-1adc-44c1-8c05-00c7bbf94992\",\"displayName\":\"App\\\\Jobs\\\\UploadVideo\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\UploadVideo\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\UploadVideo\\\":11:{s:26:\\\"\\u0000App\\\\Jobs\\\\UploadVideo\\u0000data\\\";a:7:{s:6:\\\"_token\\\";s:40:\\\"SRhRbPhW9Som5LPhaCFrVawUxdOehl8wzoSLo6G2\\\";s:7:\\\"user_id\\\";s:1:\\\"5\\\";s:5:\\\"title\\\";s:47:\\\"8 MENTIRAS M\\u00c1S GRANDES CONTADAS EN LA HISTORIA\\\";s:11:\\\"description\\\";s:96:\\\"Alguna vez pensaste que lo sabes todo? No estamos hablando de ser un experto en f\\u00edsica nuclear?\\\";s:12:\\\"categoria_id\\\";s:1:\\\"9\\\";s:10:\\\"video_path\\\";s:51:\\\"videos\\/hIcXg1i45mWjuKlgvM1klzmCSZf4jD7o5w0pMEEX.mp4\\\";s:5:\\\"image\\\";s:55:\\\"miniaturas\\/rYNsukk5bztUwMo99gYMhh7OcKBWB623RLHswTal.jpg\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\UploadVideo has been attempted too many times or run too long. The job may have previously timed out. in /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:717\nStack trace:\n#0 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(199): Illuminate\\Queue\\Worker->maxAttemptsExceededException()\n#1 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Pipes/AbstractPipes.php(176): Illuminate\\Queue\\Worker->Illuminate\\Queue\\{closure}()\n#2 [internal function]: Symfony\\Component\\Process\\Pipes\\AbstractPipes->handleError()\n#3 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Pipes/UnixPipes.php(113): stream_select()\n#4 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(1434): Symfony\\Component\\Process\\Pipes\\UnixPipes->readAndWrite()\n#5 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(427): Symfony\\Component\\Process\\Process->readPipes()\n#6 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(249): Symfony\\Component\\Process\\Process->wait()\n#7 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/ProcessRunner.php(64): Symfony\\Component\\Process\\Process->run()\n#8 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/AbstractBinary.php(207): Alchemy\\BinaryDriver\\ProcessRunner->run()\n#9 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/AbstractBinary.php(136): Alchemy\\BinaryDriver\\AbstractBinary->run()\n#10 /home/projecte/Escritorio/Projecte/Goocrux/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/Media/AbstractVideo.php(100): Alchemy\\BinaryDriver\\AbstractBinary->command()\n#11 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): FFMpeg\\Media\\AbstractVideo->save()\n#12 /home/projecte/Escritorio/Projecte/Goocrux/vendor/pbmedia/laravel-ffmpeg/src/Drivers/PHPFFMpeg.php(272): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->forwardCallTo()\n#13 /home/projecte/Escritorio/Projecte/Goocrux/vendor/pbmedia/laravel-ffmpeg/src/Exporters/MediaExporter.php(168): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->__call()\n#14 /home/projecte/Escritorio/Projecte/Goocrux/app/Jobs/UploadVideo.php(42): ProtoneMedia\\LaravelFFMpeg\\Exporters\\MediaExporter->save()\n#15 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\UploadVideo->handle()\n#16 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#17 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#18 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#19 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#20 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#21 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#22 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#23 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#24 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#25 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#26 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#27 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#28 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#29 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#30 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#31 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(360): Illuminate\\Queue\\Worker->process()\n#32 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(158): Illuminate\\Queue\\Worker->runJob()\n#33 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon()\n#34 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#35 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#36 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#37 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#38 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#39 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#40 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call()\n#41 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Command/Command.php(256): Illuminate\\Console\\Command->execute()\n#42 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run()\n#43 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run()\n#44 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand()\n#45 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun()\n#46 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run()\n#47 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run()\n#48 /home/projecte/Escritorio/Projecte/Goocrux/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#49 {main}', '2021-05-21 13:03:54'),
(15, 'bd87d1ff-1f6d-4462-be34-3ce27533ad2e', 'database', 'default', '{\"uuid\":\"bd87d1ff-1f6d-4462-be34-3ce27533ad2e\",\"displayName\":\"App\\\\Jobs\\\\UploadVideo\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\UploadVideo\",\"command\":\"O:20:\\\"App\\\\Jobs\\\\UploadVideo\\\":11:{s:26:\\\"\\u0000App\\\\Jobs\\\\UploadVideo\\u0000data\\\";a:7:{s:6:\\\"_token\\\";s:40:\\\"H5LjE2elnxwDCfDd8NZmB17dKbM6tH8i6gA7wW2m\\\";s:7:\\\"user_id\\\";s:1:\\\"4\\\";s:5:\\\"title\\\";s:84:\\\"Marron pone a prueba uno de los misterios de la ciencia: El Starlite - El Hormiguero\\\";s:11:\\\"description\\\";s:95:\\\"El colaborador del programa nos ha contado la curiosa historia tras el invento de Maurice Ward.\\\";s:12:\\\"categoria_id\\\";s:2:\\\"10\\\";s:10:\\\"video_path\\\";s:51:\\\"videos\\/3glCBaP0UX8GPuTyfUccbVFuJBaf6Gs7htwNLq8W.mp4\\\";s:5:\\\"image\\\";s:55:\\\"miniaturas\\/KiLHkzoSMJF06mCz3wAXUFwIQ92ckiG7LSYDBKlc.jpg\\\";}s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\UploadVideo has been attempted too many times or run too long. The job may have previously timed out. in /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php:717\nStack trace:\n#0 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(199): Illuminate\\Queue\\Worker->maxAttemptsExceededException()\n#1 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Pipes/AbstractPipes.php(176): Illuminate\\Queue\\Worker->Illuminate\\Queue\\{closure}()\n#2 [internal function]: Symfony\\Component\\Process\\Pipes\\AbstractPipes->handleError()\n#3 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Pipes/UnixPipes.php(113): stream_select()\n#4 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(1434): Symfony\\Component\\Process\\Pipes\\UnixPipes->readAndWrite()\n#5 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(427): Symfony\\Component\\Process\\Process->readPipes()\n#6 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/process/Process.php(249): Symfony\\Component\\Process\\Process->wait()\n#7 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/ProcessRunner.php(64): Symfony\\Component\\Process\\Process->run()\n#8 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/AbstractBinary.php(207): Alchemy\\BinaryDriver\\ProcessRunner->run()\n#9 /home/projecte/Escritorio/Projecte/Goocrux/vendor/alchemy/binary-driver/src/Alchemy/BinaryDriver/AbstractBinary.php(136): Alchemy\\BinaryDriver\\AbstractBinary->run()\n#10 /home/projecte/Escritorio/Projecte/Goocrux/vendor/php-ffmpeg/php-ffmpeg/src/FFMpeg/Media/AbstractVideo.php(100): Alchemy\\BinaryDriver\\AbstractBinary->command()\n#11 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): FFMpeg\\Media\\AbstractVideo->save()\n#12 /home/projecte/Escritorio/Projecte/Goocrux/vendor/pbmedia/laravel-ffmpeg/src/Drivers/PHPFFMpeg.php(272): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->forwardCallTo()\n#13 /home/projecte/Escritorio/Projecte/Goocrux/vendor/pbmedia/laravel-ffmpeg/src/Exporters/MediaExporter.php(168): ProtoneMedia\\LaravelFFMpeg\\Drivers\\PHPFFMpeg->__call()\n#14 /home/projecte/Escritorio/Projecte/Goocrux/app/Jobs/UploadVideo.php(42): ProtoneMedia\\LaravelFFMpeg\\Exporters\\MediaExporter->save()\n#15 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Jobs\\UploadVideo->handle()\n#16 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#17 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#18 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#19 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#20 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#21 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#22 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#23 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#24 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#25 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#26 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#27 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then()\n#28 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#29 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#30 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#31 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(360): Illuminate\\Queue\\Worker->process()\n#32 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(158): Illuminate\\Queue\\Worker->runJob()\n#33 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon()\n#34 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#35 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#36 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#37 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#38 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#39 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Container/Container.php(611): Illuminate\\Container\\BoundMethod::call()\n#40 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call()\n#41 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Command/Command.php(256): Illuminate\\Console\\Command->execute()\n#42 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run()\n#43 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(971): Illuminate\\Console\\Command->run()\n#44 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand()\n#45 /home/projecte/Escritorio/Projecte/Goocrux/vendor/symfony/console/Application.php(166): Symfony\\Component\\Console\\Application->doRun()\n#46 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Console/Application.php(92): Symfony\\Component\\Console\\Application->run()\n#47 /home/projecte/Escritorio/Projecte/Goocrux/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run()\n#48 /home/projecte/Escritorio/Projecte/Goocrux/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#49 {main}', '2021-05-21 13:05:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_04_29_135022_create_jobs_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Notifications`
--

CREATE TABLE `Notifications` (
  `id` int NOT NULL,
  `noti_desc` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `state` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Notifications`
--

INSERT INTO `Notifications` (`id`, `noti_desc`, `user_id`, `video_id`, `state`, `type`, `created_at`) VALUES
(19, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on video quality', 4, 85, 0, 'video', '2021-05-21 14:43:45'),
(20, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on audio quality', 4, 85, 0, 'audio', '2021-05-21 14:43:46'),
(21, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on content quality', 4, 85, 0, 'content', '2021-05-21 14:43:48'),
(22, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on video quality', 4, 86, 0, 'video', '2021-05-21 14:43:48'),
(23, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on audio quality', 4, 86, 0, 'audio', '2021-05-21 14:43:49'),
(24, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on content quality', 4, 86, 0, 'content', '2021-05-21 14:43:50'),
(25, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on video quality', 4, 86, 0, 'video', '2021-05-21 14:45:20'),
(26, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on audio quality', 4, 86, 0, 'audio', '2021-05-21 14:45:20'),
(27, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on content quality', 4, 86, 0, 'content', '2021-05-21 14:45:21'),
(28, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on video quality', 4, 86, 0, 'video', '2021-05-21 14:46:00'),
(29, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on audio quality', 4, 86, 0, 'audio', '2021-05-21 14:46:01'),
(30, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on content quality', 4, 86, 0, 'content', '2021-05-21 14:46:02'),
(31, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on content quality', 4, 86, 0, 'content', '2021-05-21 14:46:31'),
(32, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on audio quality', 4, 86, 0, 'audio', '2021-05-21 14:46:32'),
(33, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on video quality', 4, 86, 0, 'video', '2021-05-21 14:46:33'),
(34, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on content quality', 4, 86, 0, 'content', '2021-05-21 14:47:44'),
(35, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on audio quality', 4, 86, 0, 'audio', '2021-05-21 14:47:48'),
(36, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on video quality', 4, 86, 0, 'video', '2021-05-21 14:47:48'),
(37, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on audio quality', 4, 85, 0, 'audio', '2021-05-21 14:49:48'),
(38, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on content quality', 4, 85, 0, 'content', '2021-05-21 14:49:48'),
(39, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on video quality', 4, 85, 0, 'video', '2021-05-21 15:08:52'),
(40, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on audio quality', 4, 85, 0, 'audio', '2021-05-21 15:08:52'),
(41, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on content quality', 4, 85, 0, 'content', '2021-05-21 15:08:52'),
(42, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on video quality', 4, 85, 0, 'video', '2021-05-21 16:35:08'),
(43, 'The video BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial) has bad valorations on content quality', 4, 85, 0, 'content', '2021-05-21 16:35:11'),
(44, 'The video El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour has bad valorations on audio quality', 4, 86, 0, 'audio', '2022-03-07 17:15:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `channel_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `banner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `nick`, `email`, `password`, `remember_token`, `image`, `role`, `created_at`, `channel_desc`, `banner`) VALUES
(4, 'Pol', 'Romero Cebrian', 'PolR', 'pol@gmail.com', '$2y$10$RNPD/5gU6rjDI31VmdzUG.xsO/oohjaHzySYNdA9bZXxIDQy0ArU2', 'CmoVuNf1hEDnPYUir9P5vZ0ex9Szdw0b1HcSXuhH3N8kJmBefhO9mOvbom4w', 'avatars/jrENKJGIhLzMaxdCwI8WYI82B5QKTRC0IReHLWyT.jpg', 'user', '2021-04-19 14:11:36', 'Descripció de provaasd', 'banner/TOX4LqUWwykpFZs6mBCTxQOtncrPxIDWzJZDs8OS.jpg'),
(5, 'Isaac', 'Aguilera Cano', 'isi.260', 'isaac.aguilera.29@lacetania.cat', '$2y$10$cHqK41Yg4l.Zma.onkYL4uWheadIVBsLkUmBiq5G8Zrj.JR5p0a.i', NULL, 'avatars/2KW0TgoF2QWPItLrKjOfRVpURpLQkQ5vY5uXmkzN.jpg', 'user', '2021-04-19 15:13:25', 'Aixo es la descripcio del canal!', 'banner/f0g81f7feagtu9oiYHl5VNbgnlfDWb3Hm5Vh792D.jpg'),
(12, 'Isaac', 'Aguilera Cano', 'isaac.260', 'isaac-260@hotmail.com', '$2y$10$cHqK41Yg4l.Zma.onkYL4uWheadIVBsLkUmBiq5G8Zrj.JR5p0a.i', NULL, 'avatars/ZersFepybkv6koO16kYznuwfu0w8oJ0U0VcYLy7c.jpg', 'user', '2021-04-21 17:30:30', 'Aixo es la descripcio del canal!', 'banner/8vcQj7WZ6NZcGV01d7UHHM6EFfKziky8OuZH91Dw.jpg'),
(18, 'Abraham', 'Villar', 'abram7', 'abram_7@hotmail.com', '$2y$10$ECbIZlHMqE5C5T201U1SwO/IRHuqzykIl0S.i/l6A39HuaBdYuDgu', NULL, 'avatars/YrabxqVt85CxJSOmczx5pLPjyaQpqnPX1JWV0qKp.jpg', 'user', '2021-05-13 13:34:24', 'aefsdgsdgsfdg', 'banner/CBl7ubrZ34r3qaedLb9grx4Mfczq1ZAIwdwEJxFG.jpg'),
(23, 'Pilar', 'Mote', 'pilarMT', 'pilar@pilar.com', '$2y$10$j4iaXrY8mP3.1Ojrw5Oy2uOQNB4CAGxu6FKtGNJcd4PNNPPsPJWju', NULL, 'avatars/TwBmBwnOrQPSxT4Ioj9VrWBphqCYSYEq5dre5BcF.jpg', 'user', '2021-05-21 15:09:28', NULL, 'banner/ni2EqvDX7S4aVhdm0bl9pXvIbYPECBrRtF7txOYC.jpg'),
(24, 'Prova1', 'Prova', 'Prova12', 'prova1@gmail.com', '$2y$10$5r.vjMVCKbf2gNhpPS.B3ujQec3fBQFM2py.ypr/TPziVGdIfFuc.', NULL, 'avatars/hSj26zc3QXF59fZFh4gkB126dAEGePduIaUtXpLO.jpg', 'user', '2021-05-21 16:33:53', 'asdasdas', 'banner/VITTLO7zzYtgwfR9ThnNxzOdVzLHN3q97qRnRXQB.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Valoracions`
--

CREATE TABLE `Valoracions` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `valoracio` int NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Valoracions`
--

INSERT INTO `Valoracions` (`id`, `user_id`, `video_id`, `name`, `valoracio`, `created_at`) VALUES
(103, 5, 86, 'video', 1, '2021-05-21 14:43:11'),
(104, 5, 86, 'audio', 1, '2021-05-21 14:43:12'),
(105, 5, 86, 'content', 1, '2021-05-21 14:43:13'),
(106, 12, 85, 'video', 2, '2021-05-21 14:43:45'),
(107, 12, 85, 'audio', 2, '2021-05-21 14:43:46'),
(108, 12, 85, 'content', 2, '2021-05-21 14:43:48'),
(128, 24, 85, 'video', 1, '2021-05-21 16:35:08'),
(129, 24, 85, 'audio', 5, '2021-05-21 16:35:10'),
(130, 24, 85, 'content', 1, '2021-05-21 16:35:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Videos`
--

CREATE TABLE `Videos` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `categoria_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Videos`
--

INSERT INTO `Videos` (`id`, `user_id`, `categoria_id`, `title`, `description`, `image`, `video_path`, `views`, `created_at`) VALUES
(85, 4, 1, 'BAD BUNNY x JHAY CORTEZ - DÁKITI (Video Oficial)', 'BAD BUNNY x JHAY CORTEZ\r\nDÁKITI | EL ÚLTIMO TOUR DEL MUNDO (Video Oficial)\r\nhttps://elultimotourdelmundo.com/', 'miniaturas/IiyuCtvEQLak95U0OhmcJliv9MGDXeNm7kj6l6tM.jpg', 'videos/XFEAWjIwcdojXeaQ76R1CasxzmpMWrmLZP2Np9es.webm', 18, '2021-05-21 14:12:57'),
(86, 4, 5, 'El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour', 'El Mejor Golpe del Cupra Vigo Open 2021 | World Padel Tour\r\n\r\nPágina web de World Padel Tour:  http://www.worldpadeltour.com/', 'miniaturas/FWJh6KjVOB0oCBWBmSjNSoUR0Mb3JG14xOe4vX32.jpg', 'videos/G8emZE0xk8K8TrIjhvUypP7il1BD7FL3pL8Z21uV.webm', 23, '2021-05-21 14:14:54'),
(90, 4, 23, 'Drag race: Kia EV6 GT vs McLaren 570S, Porsche 911 Targa 4, AMG GT, Urus and Ferrari California T', 'This is how Kia is announcing its new EV6 GT electric model: by setting up a drag race with some of the world\'s best supercars. Even though the video is edited rather heavily and all the rivals are powered by internal combustion engines, the fact that the EV6 can hang with them alone is impressive for a car maker like Kia.', 'miniaturas/PEBEHMKDVOaWQXvgUx27uO9z5K74VEaOYTxpuXtC.jpg', 'videos/KlyRHebp5JfB9soy0X9ChBzmWdRaCi1gRT9RcJKu.webm', 3, '2021-05-21 14:36:09'),
(92, 4, 12, 'The problem of education inequality | CNBC Reports', 'The Covid-19 pandemic has highlighted education inequality affecting both poor and rich nations across the world. CNBC’s Tom Chitty goes to find out the best ways of tackling what many believe is at the root of all inequality.', 'miniaturas/T7m9aP4znI1qDVHlYJt3lVnC271StOsI01l8TQIx.jpg', 'videos/73wvMNsaWSJ7kezor0Mb8LaOHJJyfnksrwc4tiEc.webm', 2, '2021-05-21 14:56:55'),
(93, 12, 9, 'Los DIOSES GRIEGOS del OLIMPO | Draw My Life en Español', 'Si tus conocimientos sobre la mitología griega se limitan a Zeus, Hércules y Afrodita, necesitas ver este vídeo urgentemente. Hoy en Draw My Life te contamos la historia completa sobre los dioses griegos.', 'miniaturas/ma99IFi6401053PIKUsu6wsVO8L1skjptlaHiuNf.jpg', 'videos/GYbLWeXXclW44fdguGCGgpcZCwlDyXwMD5da4GCj.webm', 3, '2021-05-21 14:57:52'),
(94, 4, 6, 'Miquel Montoro, el youtuber del campo | Aquí la tierra', 'Se llama Miquel Montoro y con solo doce años es una estrella conocida en medio mundo gracias a sus lecciones. Porque el aula de Miquel está en Internet y con sus vídeos nos demuestra que es el que más sabe del campo y nos enseña cómo ser el mejor payés.', 'miniaturas/rAk3AzqUolTqYKxNo7xX0dEIyKB2IcGHTYhjwtqV.jpg', 'videos/hY5CXKYMixbBXfLHv3vmXNYTRFpeVKPt262dseZI.webm', 3, '2021-05-21 15:03:29'),
(95, 4, 3, '80s Action Heroes Trailer | Season Three | Call of Duty®: Black Ops Cold War & Warzone™', 'Lights. Camera. Action Heroes. 🎥\r\n\r\nACTION THIS STACKED, RACKED AND JACKED, \r\nIS SO PACKED... IT OUGHTA BE ILLEGAL.\r\nSO TIGHTEN YOUR HEADBAND\r\nAND DON’T FORGET YOUR SHOES.\r\n \r\nTHE ACTION BEGINS MAY 20 in #BlackOpsColdWar, #Warzone, and #CODMobile', 'miniaturas/WQnPQxJ3l2cORSZXsVo0vAkg6uyiz48ZE9DJeZ6N.jpg', 'videos/PSoxCynAYFOq5r8nSLZZpqtV1qrYiqNBKEcsYrBB.webm', 5, '2021-05-21 15:05:33'),
(96, 12, 14, 'ANUNCIOS DE PIPAS G DE GREFUSA', 'TODOS LOS ANUNCIOS DE PIPAS G DE GREFUSA Solo pasa con Pipas G de Grefusa!', 'miniaturas/HNng2IygnWrYfWE614FATjJGy3Fe6Co1LRwyTnfC.jpg', 'videos/7rFGXNdl9oOGrnia8Uqipa2EtCNB8L4J2gvsFtCI.webm', 11, '2021-05-21 15:07:29'),
(97, 4, 8, 'TONES AND I - DANCE MONKEY (OFFICIAL VIDEO)', 'Tones and I busts out \'Dance Monkey\' with the biggest crowd singalong we\'ve ever seen for a Splendour In The Grass opener.', 'miniaturas/aAEcfJv6vzr7V23XVR3mNpzy7EK2HKZ4ui4ngXrR.jpg', 'videos/956OLYFCJjKkDUsynnrRgGZLk5yE9QrLhGtac2rl.webm', 1, '2021-05-21 15:09:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vots`
--

CREATE TABLE `Vots` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `votacio` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Vots`
--

INSERT INTO `Vots` (`id`, `user_id`, `video_id`, `votacio`, `created_at`) VALUES
(40, 4, 90, 1, '2021-05-21 14:38:31'),
(41, 23, 96, 1, '2021-05-21 15:09:57'),
(42, 23, 86, 1, '2021-05-21 15:14:16'),
(43, 24, 85, 0, '2021-05-21 16:35:27'),
(46, 12, 86, 1, '2022-03-07 17:15:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Comentaris`
--
ALTER TABLE `Comentaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Notifications_ibfk_2` (`video_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `Valoracions`
--
ALTER TABLE `Valoracions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indices de la tabla `Videos`
--
ALTER TABLE `Videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `Vots`
--
ALTER TABLE `Vots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `Comentaris`
--
ALTER TABLE `Comentaris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `Valoracions`
--
ALTER TABLE `Valoracions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `Videos`
--
ALTER TABLE `Videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `Vots`
--
ALTER TABLE `Vots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Comentaris`
--
ALTER TABLE `Comentaris`
  ADD CONSTRAINT `Comentaris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Comentaris_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `Videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Notifications`
--
ALTER TABLE `Notifications`
  ADD CONSTRAINT `Notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Notifications_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `Videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Valoracions`
--
ALTER TABLE `Valoracions`
  ADD CONSTRAINT `Valoracions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Valoracions_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `Videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Videos`
--
ALTER TABLE `Videos`
  ADD CONSTRAINT `categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `Categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Vots`
--
ALTER TABLE `Vots`
  ADD CONSTRAINT `video_id` FOREIGN KEY (`video_id`) REFERENCES `Videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Vots_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
