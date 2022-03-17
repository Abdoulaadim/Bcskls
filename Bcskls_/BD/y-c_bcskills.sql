-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 17 mars 2022 à 09:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `y-c_bcskills`
--

-- --------------------------------------------------------

--
-- Structure de la table `centrants`
--

DROP TABLE IF EXISTS `centrants`;
CREATE TABLE IF NOT EXISTS `centrants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiditeur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depart` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `centrants`
--

INSERT INTO `centrants` (`id`, `reference`, `objet`, `type`, `expiditeur`, `division`, `service`, `employee`, `etat`, `depart`, `created_at`, `updated_at`) VALUES
(1, 'lllfd', 'kdkdfk', 'kdskdslk', 'dslkdsk', 'kdkdskl', 'sldslkl', 'sdmlsdlm', 'dldslkm', '2021-10-19', '2021-10-25 15:12:38', '2021-10-25 15:12:38'),
(3, 'dss', 'sqs', 'sqqs', 'cdcd', 'DIVISION 1', 'Service 5.1', 'Employe 1.2', 'cdds', '2021-10-13', '2021-10-26 22:22:13', '2021-10-26 22:22:13');

-- --------------------------------------------------------

--
-- Structure de la table `csortants`
--

DROP TABLE IF EXISTS `csortants`;
CREATE TABLE IF NOT EXISTS `csortants` (
  `reference` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `expiditeur` varchar(191) NOT NULL,
  `destinataire` varchar(191) NOT NULL,
  `division` varchar(191) NOT NULL,
  `service` varchar(191) NOT NULL,
  `employee` varchar(191) NOT NULL,
  `etat` varchar(191) NOT NULL,
  `depart` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamps` datetime NOT NULL,
  `objet` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `csortants`
--

INSERT INTO `csortants` (`reference`, `type`, `expiditeur`, `destinataire`, `division`, `service`, `employee`, `etat`, `depart`, `id`, `timestamps`, `objet`) VALUES
('azzaaz', 'zaazaz', 'zaazaz', 'zaazza', 'zazaz', 'zazazzaza', 'zaaa', 'azazaz', '2021-10-12', 1, '2021-10-25 11:08:09', 'ssddsdsds');

-- --------------------------------------------------------

--
-- Structure de la table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomdivision` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `divisions`
--

INSERT INTO `divisions` (`id`, `nomdivision`, `created_at`, `updated_at`) VALUES
(8, 'DIVISION 4', NULL, NULL),
(7, 'DIVISION 3', NULL, NULL),
(6, 'DIVISION 2', NULL, NULL),
(5, 'DIVISION 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomemployee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomemployee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_service` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_id_service_foreign` (`id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id`, `nomemployee`, `prenomemployee`, `id_service`, `created_at`, `updated_at`) VALUES
(8, 'Employe 1.3', 'Employe 1.3', 7, NULL, NULL),
(6, 'Employe 1.1', 'Employe 1.1', 7, NULL, NULL),
(7, 'Employe 1.2', 'Employe 1.2', 7, NULL, NULL),
(9, 'Employe 2.1', 'Employe 2.1', 11, NULL, NULL),
(10, 'Employe 2.1', 'Employe 2.1', 11, NULL, NULL),
(11, 'Employe 2.3', 'Employe 2.3', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faxes`
--

DROP TABLE IF EXISTS `faxes`;
CREATE TABLE IF NOT EXISTS `faxes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numfax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emetteur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recepteur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefax` date NOT NULL,
  `objet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `faxes`
--

INSERT INTO `faxes` (`id`, `numfax`, `telefax`, `telephone`, `emetteur`, `recepteur`, `datefax`, `objet`, `description`, `name`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'lmdldlms', '3232', '323', 'sdd', 'slsl', '2021-10-12', 'llsdl', 'lsqlsqlmsq', '1635242328_Cv_Abdoulaadim.pdf', '/storage/uploads/1635242328_Cv_Abdoulaadim.pdf', '2021-10-26 08:58:48', '2021-10-26 08:58:48'),
(2, '4334', '3232', 'lmdsldls', 'llmsddsl', 'dssdds', '2021-10-13', 'mldllmlll', 'sldmsdllsd', '1635287000_CV_mabrouki.pdf', '/storage/uploads/1635286999_CV_mabrouki.pdf', '2021-10-26 21:23:20', '2021-10-27 21:48:50');

-- --------------------------------------------------------

--
-- Structure de la table `ivisiteurs`
--

DROP TABLE IF EXISTS `ivisiteurs`;
CREATE TABLE IF NOT EXISTS `ivisiteurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_visiteur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ivisiteurs_id_visiteur_foreign` (`id_visiteur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ivisiteurs`
--

INSERT INTO `ivisiteurs` (`id`, `division`, `service`, `type`, `description`, `id_visiteur`, `created_at`, `updated_at`) VALUES
(1, 'DIVISION 1', 'Service 5.1', 'qssq', 'sqsqsq', 85, '2021-10-25 22:04:49', '2021-10-25 22:04:49');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2021_10_07_145600_create_sessions_table', 1),
(25, '2021_10_12_083711_create_motifs_table', 1),
(26, '2021_10_21_093654_create_divisions_table', 1),
(27, '2021_10_21_134807_create_services_table', 1),
(28, '2021_10_21_153922_create_employees_table', 2),
(29, '2021_10_23_165312_create_visiteurs_table', 3),
(30, '2021_10_23_203804_create_s__visiteurs_table', 4),
(31, '2021_10_25_083446_create_csortants_table', 5),
(32, '2021_10_25_145719_create_centrants_table', 6),
(33, '2021_10_25_152945_create_rvisiteurs_table', 7),
(34, '2021_10_25_224800_create_ivisiteurs_table', 8),
(35, '2021_10_26_081833_create_telephones_table', 9),
(36, '2021_10_26_092729_create_faxes_table', 10);

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

DROP TABLE IF EXISTS `motifs`;
CREATE TABLE IF NOT EXISTS `motifs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `motif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rvisiteurs`
--

DROP TABLE IF EXISTS `rvisiteurs`;
CREATE TABLE IF NOT EXISTS `rvisiteurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_visiteur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rvisiteurs_id_visiteur_foreign` (`id_visiteur`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rvisiteurs`
--

INSERT INTO `rvisiteurs` (`id`, `division`, `service`, `objet`, `description`, `name`, `file_path`, `id_visiteur`, `created_at`, `updated_at`) VALUES
(1, 'DIVISION 4', 'Service 8.1', ';flmflm', 'aldlslm', '1635178359_CV .pdf', '/storage/uploads/1635178358_CV .pdf', 77, '2021-10-25 15:12:39', '2021-10-25 15:12:39'),
(2, 'DIVISION 2', 'Service 6.2', ';flmflm', 'aldlslm', '1635178999_CV .pdf', '/storage/uploads/1635178999_CV .pdf', 77, '2021-10-25 15:23:19', '2021-10-25 15:23:19'),
(3, 'DIVISION 1', 'Service 5.1', 'ldlmfdl', 'dkkdklsd', '1635415482_CV .pdf', '/storage/uploads/1635415482_CV .pdf', 87, '2021-10-28 09:04:42', '2021-10-28 09:04:42');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomservice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_division` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_id_division_foreign` (`id_division`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nomservice`, `id_division`, `created_at`, `updated_at`) VALUES
(9, 'Service 5.3', 5, NULL, NULL),
(8, 'Service 5.2', 5, NULL, NULL),
(7, 'Service 5.1', 5, NULL, NULL),
(10, 'Service 5.4', 5, NULL, NULL),
(11, 'Service 6.1', 6, NULL, NULL),
(12, 'Service 6.2', 6, NULL, NULL),
(13, 'Service 6.3', 6, NULL, NULL),
(14, 'Service 6.4', 6, NULL, NULL),
(15, 'Service 7.1', 7, NULL, NULL),
(16, 'Service 7.2', 7, NULL, NULL),
(17, 'Service 7.3', 7, NULL, NULL),
(18, 'Service 7.4', 7, NULL, NULL),
(19, 'Service 8.1', 8, NULL, NULL),
(20, 'Service 8.2', 8, NULL, NULL),
(21, 'Service 8.3', 8, NULL, NULL),
(22, 'Service 8.4', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YJYFju33XI9eWFvJ8g75GLShaSPX046ZHObR5twA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkNNemp2UGdmUzZnWlQ4OTdKejhVWGZNdG1EeTJzMktZV1N2WmxBcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1647438662);

-- --------------------------------------------------------

--
-- Structure de la table `s__visiteurs`
--

DROP TABLE IF EXISTS `s__visiteurs`;
CREATE TABLE IF NOT EXISTS `s__visiteurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_visiteur` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `s__visiteurs_id_visiteur_foreign` (`id_visiteur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `s__visiteurs`
--

INSERT INTO `s__visiteurs` (`id`, `division`, `service`, `employee`, `description`, `id_visiteur`, `created_at`, `updated_at`) VALUES
(1, 'DIVISION 1', 'Service 5.1', 'Employe 1.1', 'aaeeaazazaz', 77, '2021-10-24 21:59:35', '2021-10-24 21:59:35'),
(2, 'DIVISION 2', 'Service 6.1', 'Employe 2.1', 'azzazaezds', 80, '2021-10-24 22:00:58', '2021-10-24 22:00:58'),
(3, 'DIVISION 1', 'Service 5.1', 'Employe 1.2', 'qqqqqq', 80, '2021-10-24 22:03:32', '2021-10-24 22:03:32'),
(4, 'DIVISION 1', 'Service 5.1', 'Employe 1.3', 'zaazza', 81, '2021-10-24 23:01:56', '2021-10-24 23:01:56');

-- --------------------------------------------------------

--
-- Structure de la table `telephones`
--

DROP TABLE IF EXISTS `telephones`;
CREATE TABLE IF NOT EXISTS `telephones` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `telephones`
--

INSERT INTO `telephones` (`id`, `nom`, `prenom`, `telephone`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mohamd', 'sdsdsd', 3329292, 'dfffdfd', 'fdfdffdfd', '2021-10-26 08:47:22', '2021-10-26 08:47:22'),
(2, 'ccxccx', 'cccvv', 3329292, 'dfffdfd', 'fdfdffdfd', '2021-10-26 08:47:22', '2021-10-26 08:47:22'),
(3, 'mdldllf', 'lsdldsl', 3232, 'lsd;lds', 'xxxxxx', '2021-10-26 08:00:28', '2021-10-26 08:03:06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_cin_unique` (`cin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cin`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed benmohamed', 'Ahmed@bcskills.com', 'HE1212', 'Admin', NULL, '$2y$10$i51EIlRwA3uqGczurH.7GeSNAgoVOr3m7LV1fbbLPgrN7cNxY/KRy', NULL, NULL, NULL, NULL, NULL, '2021-10-21 14:09:05', '2021-10-21 14:09:05'),
(2, 'Morad benhamid', 'Morad@bcskills.com', 'HH3321', 'User', NULL, '$2y$10$CVT9CE2NmxzKAfDNVujTc.lAk2u84T/JyAfEsm5cdxXhhiAl4NDKy', NULL, NULL, NULL, NULL, NULL, '2021-10-23 12:31:20', '2021-10-23 12:31:20');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

DROP TABLE IF EXISTS `visiteurs`;
CREATE TABLE IF NOT EXISTS `visiteurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `badge` int(11) NOT NULL,
  `nomvisiteur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomvisiteur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adressevisiteur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailvisiteur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(18) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `cin`, `badge`, `nomvisiteur`, `prenomvisiteur`, `adressevisiteur`, `mailvisiteur`, `telephone`, `created_at`, `updated_at`) VALUES
(84, 'HH212', 11, 'zaza', 'sqqs', 'zdssldld', 'sq@gmail.com', 329239288, '2021-10-25 21:43:29', '2021-10-28 09:03:30'),
(83, 'HH65342', 21, 'lksdk', 'lmdsmdlm', 'dskdk', 'ldlsml@gmail.com', 433439, '2021-10-25 14:43:11', '2021-10-25 14:43:11'),
(82, 'HH65342', 21, 'lksdk', 'lmdsmdlm', 'dskdk', 'ldlsml@gmail.com', 433439, '2021-10-25 14:40:33', '2021-10-25 14:40:33'),
(73, 'HH1212', 13, 'sdsd', 'sdsd', 'zsdsds', 'cdsd@gmail.com', 434838, '2021-10-23 22:26:39', '2021-10-23 22:26:39'),
(74, 'HH1212', 13, 'sdsd', 'sdsd', 'zsdsds', 'cdsd@gmail.com', 434838, '2021-10-23 22:26:56', '2021-10-23 22:26:56'),
(75, 'HH1212', 13, 'sdsd', 'sdsd', 'zsdsds', 'cdsd@gmail.com', 434838, '2021-10-23 22:27:55', '2021-10-23 22:27:55'),
(76, 'HH22', 11, 'dssd', '3223', 'ssdd', 'ZAZA@dsds.com', 221311, '2021-10-24 11:53:47', '2021-10-24 11:53:47'),
(85, 'za121', 21, 'sdsdds', 'dssd', 'sdd', 'ssdds@gmail.com', 322323, '2021-10-25 22:01:22', '2021-10-25 22:01:22'),
(86, 'FFDFD223', 11, 'dsdsd', 'dds', 'dd', 'sdd@gmail.com', 943934, '2021-10-26 16:00:26', '2021-10-26 16:00:26'),
(87, 'lllsdlds', 22, 's;lsdl', 'smldsl', 'kksdkd', 'lmdssdk@gmail.com', 3434, '2021-10-27 07:39:10', '2021-10-27 07:39:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
