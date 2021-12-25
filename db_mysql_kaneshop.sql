-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2021 lúc 10:17 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: kaneshop
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng admins
--

CREATE TABLE admins (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  phone varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  admin_role_id bigint(20) NOT NULL DEFAULT 2,
  image varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  email varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng admins
--

INSERT INTO admins (id, name, phone, admin_role_id, image, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES(1, 'Kane Le', '0911445595', 1, 'def.png', 'lhgia1308@gmail.com', NULL, '$2y$10$aACTv4DDD6Ieon9Mh1Vy3eX/jzpgCac2HbUiU0nrXc4gagi4D0al6', NULL, '2021-11-24 14:03:15', '2021-11-24 14:03:15');
INSERT INTO admins (id, name, phone, admin_role_id, image, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES(2, 'Phạm Văn Thuyền', '0911465859', 7, '2021-11-26-61a0624ac8d39.png', 'pvthuyen68@gmail.com', NULL, '$2y$10$YI.L.YeXYbyyUr/J1T9LauCefdo1rnYKJEJPhHnv0//C1rA8Xa8UK', NULL, '2021-11-26 03:27:54', '2021-11-26 03:27:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng admin_roles
--

CREATE TABLE admin_roles (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  module_access varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng admin_roles
--

INSERT INTO admin_roles (id, name, module_access, status, created_at, updated_at) VALUES(1, 'Master Admin', NULL, 1, NULL, NULL);
INSERT INTO admin_roles (id, name, module_access, status, created_at, updated_at) VALUES(7, 'Seller', '[\"order\",\"product\"]', 1, '2021-11-26 03:22:02', '2021-11-26 03:22:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng admin_wallets
--

CREATE TABLE admin_wallets (
  id bigint(20) UNSIGNED NOT NULL,
  admin_id bigint(20) DEFAULT NULL,
  balance double NOT NULL DEFAULT 0,
  withdrawn double NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng admin_wallets
--

INSERT INTO admin_wallets (id, admin_id, balance, withdrawn, created_at, updated_at) VALUES(1, 1, 401.36, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng admin_wallet_histories
--

CREATE TABLE admin_wallet_histories (
  id bigint(20) UNSIGNED NOT NULL,
  admin_id bigint(20) DEFAULT NULL,
  amount double NOT NULL DEFAULT 0,
  order_id bigint(20) DEFAULT NULL,
  product_id bigint(20) DEFAULT NULL,
  payment varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng admin_wallet_histories
--

INSERT INTO admin_wallet_histories (id, admin_id, amount, order_id, product_id, payment, created_at, updated_at) VALUES(1, 1, 186.56, 100002, 87, 'received', '2021-11-27 07:20:39', '2021-11-27 07:20:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng attributes
--

CREATE TABLE attributes (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng attributes
--

INSERT INTO attributes (id, name, created_at, updated_at) VALUES(1, 'Size', '2021-11-26 03:43:55', '2021-11-26 03:43:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng banners
--

CREATE TABLE banners (
  id bigint(20) UNSIGNED NOT NULL,
  photo varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  banner_type varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  published int(11) NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  url varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng banners
--

INSERT INTO banners (id, photo, banner_type, published, created_at, updated_at, url) VALUES(1, '2021-11-26-61a0977c160d2.png', 'Main Banner', 1, '2021-11-26 07:14:52', '2021-11-26 07:15:36', 'http://localhost/kaneshop/');
INSERT INTO banners (id, photo, banner_type, published, created_at, updated_at, url) VALUES(2, '2021-11-26-61a0978573bc9.png', 'Main Banner', 1, '2021-11-26 07:15:01', '2021-11-26 07:15:35', 'http://localhost/kaneshop/');
INSERT INTO banners (id, photo, banner_type, published, created_at, updated_at, url) VALUES(3, '2021-11-26-61a0978c945dd.png', 'Main Banner', 1, '2021-11-26 07:15:08', '2021-11-26 07:15:35', 'http://localhost/kaneshop/');
INSERT INTO banners (id, photo, banner_type, published, created_at, updated_at, url) VALUES(4, '2021-11-26-61a0979847059.png', 'Main Banner', 1, '2021-11-26 07:15:20', '2021-11-26 07:15:34', 'http://localhost/kaneshop/');
INSERT INTO banners (id, photo, banner_type, published, created_at, updated_at, url) VALUES(5, '2021-11-26-61a097c67502a.png', 'Footer Banner', 1, '2021-11-26 07:16:06', '2021-11-26 07:16:42', 'http://localhost/kaneshop/');
INSERT INTO banners (id, photo, banner_type, published, created_at, updated_at, url) VALUES(6, '2021-11-26-61a097cd48b68.png', 'Footer Banner', 1, '2021-11-26 07:16:13', '2021-11-26 07:16:42', 'http://localhost/kaneshop/');
INSERT INTO banners (id, photo, banner_type, published, created_at, updated_at, url) VALUES(7, '2021-11-26-61a097d444ff4.png', 'Footer Banner', 1, '2021-11-26 07:16:20', '2021-11-26 07:16:41', 'http://localhost/kaneshop/');
INSERT INTO banners (id, photo, banner_type, published, created_at, updated_at, url) VALUES(8, '2021-11-26-61a097dd19941.png', 'Popup Banner', 0, '2021-11-26 07:16:29', '2021-11-27 06:16:53', 'http://localhost/kaneshop/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng brands
--

CREATE TABLE brands (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  image varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng brands
--

INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(1, 'Tell Us', '2021-11-26-61a05da5369ce.png', 1, '2021-11-26 03:08:05', '2021-11-26 03:08:05');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(2, 'The Wall', '2021-11-26-61a05dd03b659.png', 1, '2021-11-26 03:08:48', '2021-11-26 03:08:48');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(3, 'Dynamova', '2021-11-26-61a05deb3e5bb.png', 1, '2021-11-26 03:09:15', '2021-11-26 03:09:15');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(4, 'Crave', '2021-11-26-61a05e0097fab.png', 1, '2021-11-26 03:09:36', '2021-11-26 03:09:36');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(5, 'Arkohub', '2021-11-26-61a05e12be863.png', 1, '2021-11-26 03:09:54', '2021-11-26 03:09:54');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(6, 'Axxelus', '2021-11-26-61a05e2d9011b.png', 1, '2021-11-26 03:10:21', '2021-11-26 03:10:21');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(7, 'Market Miracle', '2021-11-26-61a05e41ba570.png', 1, '2021-11-26 03:10:41', '2021-11-26 03:10:41');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(8, 'Vivatiqo', '2021-11-26-61a05e56a71c1.png', 1, '2021-11-26 03:11:02', '2021-11-26 03:11:02');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(9, 'TrueMake', '2021-11-26-61a05e67ed010.png', 1, '2021-11-26 03:11:19', '2021-11-26 03:11:19');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(10, 'Hexanate', '2021-11-26-61a05e7f6764f.png', 1, '2021-11-26 03:11:43', '2021-11-26 03:11:43');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(11, 'Modentum', '2021-11-26-61a05e903edcd.png', 1, '2021-11-26 03:12:00', '2021-11-26 03:12:00');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(12, 'Framerce', '2021-11-26-61a05ea81a2da.png', 1, '2021-11-26 03:12:24', '2021-11-26 03:12:24');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(13, 'Center Point', '2021-11-26-61a05ebc9ca11.png', 1, '2021-11-26 03:12:44', '2021-11-26 03:12:44');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(14, 'Yo Merce', '2021-11-26-61a05ed20d8d7.png', 1, '2021-11-26 03:13:06', '2021-11-26 03:13:06');
INSERT INTO brands (id, name, image, status, created_at, updated_at) VALUES(15, 'Great Hall', '2021-11-26-61a05ee62c21f.png', 1, '2021-11-26 03:13:26', '2021-11-26 03:13:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng business_settings
--

CREATE TABLE business_settings (
  id bigint(20) UNSIGNED NOT NULL,
  type varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  value longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng business_settings
--

INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(1, 'system_default_currency', '8', '2020-10-11 07:43:44', '2021-12-20 13:16:55');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(2, 'language', '[{\"id\":\"1\",\"name\":\"english\",\"code\":\"en\",\"status\":1},{\"id\":3,\"name\":\"Ti\\u1ebfng Vi\\u1ec7t\",\"code\":\"vn\",\"status\":1},{\"id\":4,\"name\":\"Chinese\",\"code\":\"zh\",\"status\":1}]', '2020-10-11 07:53:02', '2021-12-20 13:47:05');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(3, 'mail_config', '{\"name\":\"Kane Le\",\"host\":\"smtp.gmail.com\",\"driver\":\"SMTP\",\"port\":\"587\",\"username\":\"gialh1308@gmail.com\",\"email_id\":\"gialh1308@gmail.com\",\"encryption\":\"TLS\",\"password\":\"Longmycantho2\"}', '2020-10-12 10:29:18', '2021-11-27 07:05:35');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(4, 'cash_on_delivery', '{\"status\":\"1\"}', NULL, '2021-05-25 21:21:15');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(6, 'ssl_commerz_payment', '{\"status\":\"0\",\"store_id\":null,\"store_password\":null}', '2020-11-09 08:36:51', '2021-07-06 12:29:46');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(7, 'paypal', '{\"status\":\"0\",\"paypal_client_id\":null,\"paypal_secret\":null}', '2020-11-09 08:51:39', '2021-07-06 12:29:57');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(8, 'stripe', '{\"status\":\"0\",\"api_key\":null,\"published_key\":null}', '2020-11-09 09:01:47', '2021-07-06 12:30:05');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(9, 'paytm', '{\"status\":\"0\",\"paytm_merchant_id\":\"dbzfb\",\"paytm_merchant_key\":\"sdfbsdfb\",\"paytm_merchant_website\":\"dsfbsdf\",\"paytm_channel\":\"sdfbsdf\",\"paytm_industry_type\":\"sdfb\"}', '2020-11-09 09:19:08', '2020-11-09 09:19:56');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(10, 'company_phone', '0911445595', NULL, '2021-11-26 08:27:02');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(11, 'company_name', 'Kane Shop', NULL, '2021-02-27 18:11:53');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(12, 'company_web_logo', '2021-11-26-61a0a89a01e1b.png', NULL, '2021-11-26 08:27:54');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(13, 'company_mobile_logo', '2021-11-26-61a0a8b09a33e.png', NULL, '2021-11-26 08:28:16');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(14, 'terms_condition', '<p>eeverferfervtsS</p>', NULL, '2021-06-11 01:51:36');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(15, 'about_us', '<p>this is about us page. hello and hi from about page description..</p>', NULL, '2021-06-11 01:42:53');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(16, 'sms_nexmo', '{\"status\":\"0\",\"nexmo_key\":\"custo5cc042f7abf4c\",\"nexmo_secret\":\"custo5cc042f7abf4c@ssl\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(17, 'company_email', 'kaneshop@gmail.com', NULL, '2021-11-26 08:26:18');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(18, 'colors', '{\"primary\":\"#1b7fed\",\"secondary\":\"#061fe0\"}', '2020-10-11 13:53:02', '2021-11-26 08:30:55');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(19, 'company_footer_logo', '2021-11-26-61a0a8b88008f.png', NULL, '2021-11-26 08:28:24');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(20, 'company_copyright_text', 'CopyRight KaneShop', NULL, '2021-11-26 08:27:17');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(21, 'download_app_apple_stroe', '{\"status\":\"1\",\"link\":\"https:\\/\\/www.target.com\\/s\\/apple+store++now?ref=tgt_adv_XS000000&AFID=msn&fndsrc=tgtao&DFA=71700000012505188&CPNG=Electronics_Portable+Computers&adgroup=Portable+Computers&LID=700000001176246&LNM=apple+store+near+me+now&MT=b&network=s&device=c&location=12&targetid=kwd-81913773633608:loc-12&ds_rl=1246978&ds_rl=1248099&gclsrc=ds\"}', NULL, '2020-12-08 12:54:53');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(22, 'download_app_google_stroe', '{\"status\":\"1\",\"link\":\"https:\\/\\/play.google.com\\/store?hl=en_US&gl=US\"}', NULL, '2020-12-08 12:54:48');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(23, 'company_fav_icon', '2021-11-26-61a0a8be772c6.png', '2020-10-11 13:53:02', '2021-11-26 08:28:30');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(24, 'fcm_topic', '', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(25, 'fcm_project_id', '', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(26, 'push_notification_key', 'Put your firebase server key here.', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(27, 'order_pending_message', '{\"status\":\"1\",\"message\":\"order pen message\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(28, 'order_confirmation_msg', '{\"status\":\"1\",\"message\":\"Order con Message\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(29, 'order_processing_message', '{\"status\":\"1\",\"message\":\"Order pro Message\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(30, 'out_for_delivery_message', '{\"status\":\"1\",\"message\":\"Order ouut Message\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(31, 'order_delivered_message', '{\"status\":\"1\",\"message\":\"Order del Message\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(32, 'razor_pay', '{\"status\":\"0\",\"razor_key\":null,\"razor_secret\":null}', NULL, '2021-07-06 12:30:14');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(33, 'sales_commission', '10', NULL, '2021-11-26 08:12:54');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(34, 'seller_registration', '0', NULL, '2021-11-26 08:13:04');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(35, 'pnc_language', '[\"en\",\"vn\",\"zh\",\"af\"]', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(36, 'order_returned_message', '{\"status\":\"1\",\"message\":\"Order hh Message\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(37, 'order_failed_message', '{\"status\":null,\"message\":\"Order fa Message\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(40, 'delivery_boy_assign_message', '{\"status\":0,\"message\":\"\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(41, 'delivery_boy_start_message', '{\"status\":0,\"message\":\"\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(42, 'delivery_boy_delivered_message', '{\"status\":0,\"message\":\"\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(43, 'terms_and_conditions', '', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(44, 'minimum_order_value', '1', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(45, 'privacy_policy', '<p>my privacy policy</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2021-07-06 11:09:07');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(46, 'paystack', '{\"status\":\"0\",\"publicKey\":null,\"secretKey\":null,\"paymentUrl\":\"https:\\/\\/api.paystack.co\",\"merchantEmail\":null}', NULL, '2021-07-06 12:30:35');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(47, 'senang_pay', '{\"status\":\"0\",\"secret_key\":null,\"merchant_id\":null}', NULL, '2021-07-06 12:30:23');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(48, 'digital_payment', '{\"status\":null}', '2021-11-26 08:13:39', '2021-11-26 08:13:39');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(49, 'shop_banner', '2021-11-26-61a0a843ebc67.png', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(51, 'font', '{\"font\":\"\\\"Times New Roman\\\", Times, serif\",\"font_size\":\"14\"}', NULL, '2021-11-28 03:50:15');
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(52, 'default_language', '{\"default_language\":\"vn\"}', NULL, NULL);
INSERT INTO business_settings (id, type, value, created_at, updated_at) VALUES(53, 'default_statistic_type', 'current_year', NULL, '2021-12-20 13:43:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng categories
--

CREATE TABLE categories (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  slug varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  icon varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  parent_id int(11) NOT NULL,
  position int(11) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  home_status tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng categories
--

INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(1, 'Beauty, Health & Hair', 'beauty-health-hair', '2021-11-26-61a0632488538.png', 0, 0, '2021-11-26 03:31:32', '2021-11-26 03:31:40', 1);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(2, 'Home Improvement & Tools', 'home-improvement-tools', '2021-11-26-61a06341a4e59.png', 0, 0, '2021-11-26 03:32:01', '2021-11-26 03:32:01', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(3, 'Outdoor Fun & Sports', 'outdoor-fun-sports', '2021-11-26-61a06351805d3.png', 0, 0, '2021-11-26 03:32:17', '2021-11-26 03:32:17', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(4, 'Toys , Kids & Babies', 'toys-kids-babies', '2021-11-26-61a0635d49909.png', 0, 0, '2021-11-26 03:32:29', '2021-11-26 03:32:29', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(5, 'Bags & Shoes', 'bags-shoes', '2021-11-26-61a06368d81a6.png', 0, 0, '2021-11-26 03:32:40', '2021-11-26 03:32:40', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(6, 'Home, Pet & Appliances', 'home-pet-appliances', '2021-11-26-61a063761167c.png', 0, 0, '2021-11-26 03:32:54', '2021-11-26 03:32:54', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(7, 'Jewelry & Watches', 'jewelry-watches', '2021-11-26-61a0637f5978d.png', 0, 0, '2021-11-26 03:33:03', '2021-11-27 08:56:21', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(8, 'Computer, Office & Security', 'computer-office-security', '2021-11-26-61a06390b3865.png', 0, 0, '2021-11-26 03:33:20', '2021-11-26 03:33:20', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(9, 'Phones & Telecom', 'phones-telecom', '2021-11-26-61a06399e3c44.png', 0, 0, '2021-11-26 03:33:29', '2021-11-27 08:56:45', 1);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(10, 'Men\'s Fashion', 'mens-fashion', '2021-11-26-61a063aaac238.png', 0, 0, '2021-11-26 03:33:46', '2021-11-26 03:33:46', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(11, 'Women\'s Fashion', 'womens-fashion', '2021-11-26-61a063b2bb712.png', 0, 0, '2021-11-26 03:33:54', '2021-11-27 08:55:58', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(12, 'Mobile Phones', 'mobile-phones', NULL, 9, 1, '2021-11-26 03:36:21', '2021-11-26 03:36:21', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(13, 'Hot Brands', 'hot-brands', NULL, 9, 1, '2021-11-26 03:36:44', '2021-11-26 03:36:44', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(14, 'Outerwear & Jackets', 'outerwear-jackets', NULL, 10, 1, '2021-11-26 03:37:14', '2021-11-26 03:37:14', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(15, 'Hot Sale', 'hot-sale', NULL, 10, 1, '2021-11-26 03:37:28', '2021-11-26 03:37:28', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(16, 'Bottoms', 'bottoms', NULL, 11, 1, '2021-11-26 03:37:50', '2021-11-26 03:37:50', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(17, 'Women\'s Fashion', 'womens-fashion', NULL, 11, 1, '2021-11-26 03:38:05', '2021-11-26 03:38:05', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(18, 'iPhones', 'iphones', NULL, 13, 2, '2021-11-26 03:39:22', '2021-11-26 03:39:22', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(19, 'Huawei', 'huawei', NULL, 13, 2, '2021-11-26 03:39:40', '2021-11-26 03:39:40', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(20, 'OnePlus', 'oneplus', NULL, 13, 2, '2021-11-26 03:39:59', '2021-11-26 03:39:59', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(21, 'Realme', 'realme', NULL, 13, 2, '2021-11-26 03:40:08', '2021-11-26 03:40:08', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(22, 'Casual Shorts', 'casual-shorts', NULL, 15, 2, '2021-11-26 03:40:34', '2021-11-26 03:40:34', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(23, 'Shirts', 'shirts', NULL, 15, 2, '2021-11-26 03:40:54', '2021-11-26 03:40:54', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(24, 'T-Shirts', 't-shirts', NULL, 15, 2, '2021-11-26 03:41:04', '2021-11-26 03:41:04', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(25, 'Hoodies & Sweatshirts', 'hoodies-sweatshirts', NULL, 15, 2, '2021-11-26 03:41:14', '2021-11-26 03:41:14', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(26, 'Jeans', 'jeans', NULL, 16, 2, '2021-11-26 03:41:37', '2021-11-26 03:41:37', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(27, 'Skirts', 'skirts', NULL, 16, 2, '2021-11-26 03:41:45', '2021-11-26 03:41:45', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(28, 'Leggings', 'leggings', NULL, 16, 2, '2021-11-26 03:42:03', '2021-11-26 03:42:03', 0);
INSERT INTO categories (id, name, slug, icon, parent_id, position, created_at, updated_at, home_status) VALUES(29, 'Dresses', 'dresses', NULL, 17, 2, '2021-11-26 03:42:13', '2021-11-26 03:42:13', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng chattings
--

CREATE TABLE chattings (
  id bigint(20) UNSIGNED NOT NULL,
  user_id bigint(20) NOT NULL,
  seller_id bigint(20) NOT NULL,
  message text COLLATE utf8mb4_unicode_ci NOT NULL,
  sent_by_customer tinyint(1) NOT NULL DEFAULT 0,
  sent_by_seller tinyint(1) NOT NULL DEFAULT 0,
  seen_by_customer tinyint(1) NOT NULL DEFAULT 1,
  seen_by_seller tinyint(1) NOT NULL DEFAULT 1,
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  shop_id bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng colors
--

CREATE TABLE colors (
  id int(11) NOT NULL,
  name varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  code varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng colors
--

INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(1, 'IndianRed', '#CD5C5C', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(2, 'LightCoral', '#F08080', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(3, 'Salmon', '#FA8072', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(4, 'DarkSalmon', '#E9967A', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(5, 'LightSalmon', '#FFA07A', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(6, 'Crimson', '#DC143C', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(7, 'Red', '#FF0000', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(8, 'FireBrick', '#B22222', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(9, 'DarkRed', '#8B0000', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(10, 'Pink', '#FFC0CB', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(11, 'LightPink', '#FFB6C1', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(12, 'HotPink', '#FF69B4', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(13, 'DeepPink', '#FF1493', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(14, 'MediumVioletRed', '#C71585', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(15, 'PaleVioletRed', '#DB7093', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(16, 'LightSalmon', '#FFA07A', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(17, 'Coral', '#FF7F50', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(18, 'Tomato', '#FF6347', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(19, 'OrangeRed', '#FF4500', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(20, 'DarkOrange', '#FF8C00', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(21, 'Orange', '#FFA500', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(22, 'Gold', '#FFD700', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(23, 'Yellow', '#FFFF00', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(24, 'LightYellow', '#FFFFE0', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(25, 'LemonChiffon', '#FFFACD', '2018-11-05 02:12:26', '2018-11-05 02:12:26');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(26, 'LightGoldenrodYellow', '#FAFAD2', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(27, 'PapayaWhip', '#FFEFD5', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(28, 'Moccasin', '#FFE4B5', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(29, 'PeachPuff', '#FFDAB9', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(30, 'PaleGoldenrod', '#EEE8AA', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(31, 'Khaki', '#F0E68C', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(32, 'DarkKhaki', '#BDB76B', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(33, 'Lavender', '#E6E6FA', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(34, 'Thistle', '#D8BFD8', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(35, 'Plum', '#DDA0DD', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(36, 'Violet', '#EE82EE', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(37, 'Orchid', '#DA70D6', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(38, 'Fuchsia', '#FF00FF', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(39, 'Magenta', '#FF00FF', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(40, 'MediumOrchid', '#BA55D3', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(41, 'MediumPurple', '#9370DB', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(42, 'Amethyst', '#9966CC', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(43, 'BlueViolet', '#8A2BE2', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(44, 'DarkViolet', '#9400D3', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(45, 'DarkOrchid', '#9932CC', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(46, 'DarkMagenta', '#8B008B', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(47, 'Purple', '#800080', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(48, 'Indigo', '#4B0082', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(49, 'SlateBlue', '#6A5ACD', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(50, 'DarkSlateBlue', '#483D8B', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(51, 'MediumSlateBlue', '#7B68EE', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(52, 'GreenYellow', '#ADFF2F', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(53, 'Chartreuse', '#7FFF00', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(54, 'LawnGreen', '#7CFC00', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(55, 'Lime', '#00FF00', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(56, 'LimeGreen', '#32CD32', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(57, 'PaleGreen', '#98FB98', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(58, 'LightGreen', '#90EE90', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(59, 'MediumSpringGreen', '#00FA9A', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(60, 'SpringGreen', '#00FF7F', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(61, 'MediumSeaGreen', '#3CB371', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(62, 'SeaGreen', '#2E8B57', '2018-11-05 02:12:27', '2018-11-05 02:12:27');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(63, 'ForestGreen', '#228B22', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(64, 'Green', '#008000', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(65, 'DarkGreen', '#006400', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(66, 'YellowGreen', '#9ACD32', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(67, 'OliveDrab', '#6B8E23', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(68, 'Olive', '#808000', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(69, 'DarkOliveGreen', '#556B2F', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(70, 'MediumAquamarine', '#66CDAA', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(71, 'DarkSeaGreen', '#8FBC8F', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(72, 'LightSeaGreen', '#20B2AA', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(73, 'DarkCyan', '#008B8B', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(74, 'Teal', '#008080', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(75, 'Aqua', '#00FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(76, 'Cyan', '#00FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(77, 'LightCyan', '#E0FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(78, 'PaleTurquoise', '#AFEEEE', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(79, 'Aquamarine', '#7FFFD4', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(80, 'Turquoise', '#40E0D0', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(81, 'MediumTurquoise', '#48D1CC', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(82, 'DarkTurquoise', '#00CED1', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(83, 'CadetBlue', '#5F9EA0', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(84, 'SteelBlue', '#4682B4', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(85, 'LightSteelBlue', '#B0C4DE', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(86, 'PowderBlue', '#B0E0E6', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(87, 'LightBlue', '#ADD8E6', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(88, 'SkyBlue', '#87CEEB', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(89, 'LightSkyBlue', '#87CEFA', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(90, 'DeepSkyBlue', '#00BFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(91, 'DodgerBlue', '#1E90FF', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(92, 'CornflowerBlue', '#6495ED', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(93, 'MediumSlateBlue', '#7B68EE', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(94, 'RoyalBlue', '#4169E1', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(95, 'Blue', '#0000FF', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(96, 'MediumBlue', '#0000CD', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(97, 'DarkBlue', '#00008B', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(98, 'Navy', '#000080', '2018-11-05 02:12:28', '2018-11-05 02:12:28');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(99, 'MidnightBlue', '#191970', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(100, 'Cornsilk', '#FFF8DC', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(101, 'BlanchedAlmond', '#FFEBCD', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(102, 'Bisque', '#FFE4C4', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(103, 'NavajoWhite', '#FFDEAD', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(104, 'Wheat', '#F5DEB3', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(105, 'BurlyWood', '#DEB887', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(106, 'Tan', '#D2B48C', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(107, 'RosyBrown', '#BC8F8F', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(108, 'SandyBrown', '#F4A460', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(109, 'Goldenrod', '#DAA520', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(110, 'DarkGoldenrod', '#B8860B', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(111, 'Peru', '#CD853F', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(112, 'Chocolate', '#D2691E', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(113, 'SaddleBrown', '#8B4513', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(114, 'Sienna', '#A0522D', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(115, 'Brown', '#A52A2A', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(116, 'Maroon', '#800000', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(117, 'White', '#FFFFFF', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(118, 'Snow', '#FFFAFA', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(119, 'Honeydew', '#F0FFF0', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(120, 'MintCream', '#F5FFFA', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(121, 'Azure', '#F0FFFF', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(122, 'AliceBlue', '#F0F8FF', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(123, 'GhostWhite', '#F8F8FF', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(124, 'WhiteSmoke', '#F5F5F5', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(125, 'Seashell', '#FFF5EE', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(126, 'Beige', '#F5F5DC', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(127, 'OldLace', '#FDF5E6', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(128, 'FloralWhite', '#FFFAF0', '2018-11-05 02:12:29', '2018-11-05 02:12:29');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(129, 'Ivory', '#FFFFF0', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(130, 'AntiqueWhite', '#FAEBD7', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(131, 'Linen', '#FAF0E6', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(132, 'LavenderBlush', '#FFF0F5', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(133, 'MistyRose', '#FFE4E1', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(134, 'Gainsboro', '#DCDCDC', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(135, 'LightGrey', '#D3D3D3', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(136, 'Silver', '#C0C0C0', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(137, 'DarkGray', '#A9A9A9', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(138, 'Gray', '#808080', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(139, 'DimGray', '#696969', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(140, 'LightSlateGray', '#778899', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(141, 'SlateGray', '#708090', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(142, 'DarkSlateGray', '#2F4F4F', '2018-11-05 02:12:30', '2018-11-05 02:12:30');
INSERT INTO colors (id, name, code, created_at, updated_at) VALUES(143, 'Black', '#000000', '2018-11-05 02:12:30', '2018-11-05 02:12:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng contacts
--

CREATE TABLE contacts (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  email varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  mobile_number varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  subject varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  message text COLLATE utf8mb4_unicode_ci NOT NULL,
  seen tinyint(1) NOT NULL DEFAULT 0,
  feedback varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  reply longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng coupons
--

CREATE TABLE coupons (
  id bigint(20) UNSIGNED NOT NULL,
  coupon_type varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  title varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  code varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  start_date date DEFAULT NULL,
  expire_date date DEFAULT NULL,
  min_purchase decimal(8,2) NOT NULL DEFAULT 0.00,
  max_discount decimal(8,2) NOT NULL DEFAULT 0.00,
  discount decimal(8,2) NOT NULL DEFAULT 0.00,
  discount_type varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng coupons
--

INSERT INTO coupons (id, coupon_type, title, code, start_date, expire_date, min_purchase, max_discount, discount, discount_type, status, created_at, updated_at) VALUES(1, 'discount_on_purchase', 'test 111', 'tR1X3NBBAF', '2021-11-26', '2021-12-01', '10.00', '10.00', '10.00', 'amount', 1, '2021-11-26 07:19:32', '2021-11-26 07:19:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng currencies
--

CREATE TABLE currencies (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  symbol varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  code varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  exchange_rate varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  status tinyint(1) NOT NULL DEFAULT 0,
  position varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng currencies
--

INSERT INTO currencies (id, name, symbol, code, exchange_rate, status, position, created_at, updated_at) VALUES(1, 'USD', '$', 'USD', '4.484304', 1, 'left', NULL, '2021-12-20 13:31:49');
INSERT INTO currencies (id, name, symbol, code, exchange_rate, status, position, created_at, updated_at) VALUES(2, 'BDT', '৳', 'BDT', '0.0038181818181818', 1, '', NULL, '2021-12-20 13:16:55');
INSERT INTO currencies (id, name, symbol, code, exchange_rate, status, position, created_at, updated_at) VALUES(3, 'Indian Rupi', '₹', 'INR', '0.0027272727272727', 1, '', '2020-10-15 17:23:04', '2021-12-20 13:16:55');
INSERT INTO currencies (id, name, symbol, code, exchange_rate, status, position, created_at, updated_at) VALUES(4, 'Euro', '€', 'EUR', '0.00454545', 1, 'left', '2021-05-25 21:00:23', '2021-12-20 13:19:57');
INSERT INTO currencies (id, name, symbol, code, exchange_rate, status, position, created_at, updated_at) VALUES(5, 'YEN', '¥', 'JPY', '0.005', 1, 'left', '2021-06-10 22:08:31', '2021-12-20 13:19:22');
INSERT INTO currencies (id, name, symbol, code, exchange_rate, status, position, created_at, updated_at) VALUES(6, 'Ringgit', 'RM', 'MYR', '0.00018909090909091', 1, '', '2021-07-03 11:08:33', '2021-12-20 13:16:55');
INSERT INTO currencies (id, name, symbol, code, exchange_rate, status, position, created_at, updated_at) VALUES(7, 'Rand', 'R', 'ZAR', '0.00064818181818182', 1, '', '2021-07-03 11:12:38', '2021-12-20 13:16:55');
INSERT INTO currencies (id, name, symbol, code, exchange_rate, status, position, created_at, updated_at) VALUES(8, 'VND', 'đ', 'VND', '1', 1, 'right', '2021-11-26 08:23:49', '2021-12-20 13:20:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng customer_wallets
--

CREATE TABLE customer_wallets (
  id bigint(20) UNSIGNED NOT NULL,
  customer_id bigint(20) DEFAULT NULL,
  balance decimal(8,2) NOT NULL DEFAULT 0.00,
  royality_points decimal(8,2) NOT NULL DEFAULT 0.00,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng customer_wallet_histories
--

CREATE TABLE customer_wallet_histories (
  id bigint(20) UNSIGNED NOT NULL,
  customer_id bigint(20) DEFAULT NULL,
  transaction_amount decimal(8,2) NOT NULL DEFAULT 0.00,
  transaction_type varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  transaction_method varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  transaction_id varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng deal_of_the_days
--

CREATE TABLE deal_of_the_days (
  id bigint(20) UNSIGNED NOT NULL,
  title varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  product_id bigint(20) DEFAULT NULL,
  discount decimal(8,2) NOT NULL DEFAULT 0.00,
  discount_type varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'amount',
  status tinyint(1) NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng deal_of_the_days
--

INSERT INTO deal_of_the_days (id, title, product_id, discount, discount_type, status, created_at, updated_at) VALUES(1, 'Big Sale', 84, '0.00', 'flat', 1, '2021-11-26 07:25:44', '2021-11-26 07:28:08');
INSERT INTO deal_of_the_days (id, title, product_id, discount, discount_type, status, created_at, updated_at) VALUES(2, 'Big Sale 11', 86, '10.00', 'flat', 0, '2021-11-26 07:27:13', '2021-11-26 07:28:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng failed_jobs
--

CREATE TABLE failed_jobs (
  id bigint(20) UNSIGNED NOT NULL,
  connection text COLLATE utf8mb4_unicode_ci NOT NULL,
  queue text COLLATE utf8mb4_unicode_ci NOT NULL,
  payload longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  exception longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  failed_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng feature_deals
--

CREATE TABLE feature_deals (
  id bigint(20) UNSIGNED NOT NULL,
  url varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  photo varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  status tinyint(1) NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng flash_deals
--

CREATE TABLE flash_deals (
  id bigint(20) UNSIGNED NOT NULL,
  title varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  start_date date DEFAULT NULL,
  end_date date DEFAULT NULL,
  status tinyint(1) NOT NULL DEFAULT 0,
  featured tinyint(1) NOT NULL DEFAULT 0,
  background_color varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  text_color varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  banner varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  slug varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  product_id int(11) DEFAULT NULL,
  deal_type varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng flash_deals
--

INSERT INTO flash_deals (id, title, start_date, end_date, status, featured, background_color, text_color, banner, slug, created_at, updated_at, product_id, deal_type) VALUES(1, 'Flash Deal', '2021-11-25', '2025-11-26', 1, 0, NULL, NULL, '2021-11-26-61a0992dcc4d1.png', 'flash-deal', '2021-11-26 07:22:05', '2021-11-26 07:22:28', NULL, 'flash_deal');
INSERT INTO flash_deals (id, title, start_date, end_date, status, featured, background_color, text_color, banner, slug, created_at, updated_at, product_id, deal_type) VALUES(2, 'Mega Deal', '2021-11-25', '2021-11-30', 1, 0, NULL, NULL, 'def.png', 'mega-deal', '2021-11-26 07:28:54', '2021-11-26 07:29:13', NULL, 'feature_deal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng flash_deal_products
--

CREATE TABLE flash_deal_products (
  id bigint(20) UNSIGNED NOT NULL,
  flash_deal_id bigint(20) DEFAULT NULL,
  product_id bigint(20) DEFAULT NULL,
  discount decimal(8,2) NOT NULL DEFAULT 0.00,
  discount_type varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng flash_deal_products
--

INSERT INTO flash_deal_products (id, flash_deal_id, product_id, discount, discount_type, created_at, updated_at) VALUES(1, 1, 85, '0.00', NULL, '2021-11-26 07:23:49', '2021-11-26 07:23:49');
INSERT INTO flash_deal_products (id, flash_deal_id, product_id, discount, discount_type, created_at, updated_at) VALUES(2, 1, 82, '0.00', NULL, '2021-11-26 07:23:54', '2021-11-26 07:23:54');
INSERT INTO flash_deal_products (id, flash_deal_id, product_id, discount, discount_type, created_at, updated_at) VALUES(3, 1, 87, '0.00', NULL, '2021-11-26 07:23:57', '2021-11-26 07:23:57');
INSERT INTO flash_deal_products (id, flash_deal_id, product_id, discount, discount_type, created_at, updated_at) VALUES(4, 2, 83, '0.00', NULL, '2021-11-26 07:29:06', '2021-11-26 07:29:06');
INSERT INTO flash_deal_products (id, flash_deal_id, product_id, discount, discount_type, created_at, updated_at) VALUES(5, 2, 85, '0.00', NULL, '2021-11-26 07:29:40', '2021-11-26 07:29:40');
INSERT INTO flash_deal_products (id, flash_deal_id, product_id, discount, discount_type, created_at, updated_at) VALUES(6, 2, 86, '0.00', NULL, '2021-11-26 07:29:46', '2021-11-26 07:29:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng help_topics
--

CREATE TABLE help_topics (
  id bigint(20) UNSIGNED NOT NULL,
  question text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  answer text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ranking int(11) NOT NULL DEFAULT 1,
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng help_topics
--

INSERT INTO help_topics (id, question, answer, ranking, status, created_at, updated_at) VALUES(1, 'How do I remove an item from my shopping cart?', 'To remove an item from your shopping cart, please follow these steps:\r\n\r\nDesktop:\r\n\r\nStep 1 - Go to your “Cart”.\r\n\r\nStep 2 - Click on the “Bin” button to delete your item from your cart or you can add to your \"Wishlist\".', 1, 1, '2021-11-26 08:34:00', '2021-11-26 08:34:00');
INSERT INTO help_topics (id, question, answer, ranking, status, created_at, updated_at) VALUES(2, 'Why am I having trouble placing products in the cart?', 'If you are having trouble placing products in your cart, the reasons could be -\r\n\r\nThe selected color/size is not available to purchase\r\n\r\nThe item is not available in stock right now.', 1, 1, '2021-11-26 08:34:25', '2021-11-26 08:34:25');
INSERT INTO help_topics (id, question, answer, ranking, status, created_at, updated_at) VALUES(3, 'How do I know if a product comes with free installation?', 'Free installation is offered for selected products only. Be sure to check the product description of products to get more details about installation.', 1, 1, '2021-11-26 08:34:45', '2021-11-26 08:34:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng languages
--

CREATE TABLE languages (
  id int(11) NOT NULL,
  code varchar(5) NOT NULL,
  name varchar(20) NOT NULL,
  image varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng languages
--

INSERT INTO languages (id, code, name, image) VALUES(1, 'vn', 'Tiếng Việt', '2021-12-06-61add148aebe7.png');
INSERT INTO languages (id, code, name, image) VALUES(2, 'en', 'English', '2021-12-06-61add12c3c149.png');
INSERT INTO languages (id, code, name, image) VALUES(3, 'zh', 'Chinese', '2021-12-06-61add1548c26c.png');
INSERT INTO languages (id, code, name, image) VALUES(4, 'af', 'Afghanistan', '2021-12-07-61af199a5d05f.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng migrations
--

CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL,
  migration varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  batch int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng migrations
--

INSERT INTO migrations (id, migration, batch) VALUES(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES(2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES(4, '2020_09_08_105159_create_admins_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES(5, '2020_09_08_111837_create_admin_roles_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES(6, '2020_09_16_142451_create_categories_table', 2);
INSERT INTO migrations (id, migration, batch) VALUES(7, '2020_09_16_181753_create_categories_table', 3);
INSERT INTO migrations (id, migration, batch) VALUES(8, '2020_09_17_134238_create_brands_table', 4);
INSERT INTO migrations (id, migration, batch) VALUES(9, '2020_09_17_203054_create_attributes_table', 5);
INSERT INTO migrations (id, migration, batch) VALUES(10, '2020_09_19_112509_create_coupons_table', 6);
INSERT INTO migrations (id, migration, batch) VALUES(11, '2020_09_19_161802_create_curriencies_table', 7);
INSERT INTO migrations (id, migration, batch) VALUES(12, '2020_09_20_114509_create_sellers_table', 8);
INSERT INTO migrations (id, migration, batch) VALUES(13, '2020_09_23_113454_create_shops_table', 9);
INSERT INTO migrations (id, migration, batch) VALUES(14, '2020_09_23_115615_create_shops_table', 10);
INSERT INTO migrations (id, migration, batch) VALUES(15, '2020_09_23_153822_create_shops_table', 11);
INSERT INTO migrations (id, migration, batch) VALUES(16, '2020_09_21_122817_create_products_table', 12);
INSERT INTO migrations (id, migration, batch) VALUES(17, '2020_09_22_140800_create_colors_table', 12);
INSERT INTO migrations (id, migration, batch) VALUES(18, '2020_09_28_175020_create_products_table', 13);
INSERT INTO migrations (id, migration, batch) VALUES(19, '2020_09_28_180311_create_products_table', 14);
INSERT INTO migrations (id, migration, batch) VALUES(20, '2020_10_04_105041_create_search_functions_table', 15);
INSERT INTO migrations (id, migration, batch) VALUES(21, '2020_10_05_150730_create_customers_table', 15);
INSERT INTO migrations (id, migration, batch) VALUES(22, '2020_10_08_133548_create_wishlists_table', 16);
INSERT INTO migrations (id, migration, batch) VALUES(23, '2016_06_01_000001_create_oauth_auth_codes_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(24, '2016_06_01_000002_create_oauth_access_tokens_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(26, '2016_06_01_000004_create_oauth_clients_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(28, '2020_10_06_133710_create_product_stocks_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(29, '2020_10_06_134636_create_flash_deals_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(30, '2020_10_06_134719_create_flash_deal_products_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(31, '2020_10_08_115439_create_orders_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(32, '2020_10_08_115453_create_order_details_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(33, '2020_10_08_121135_create_shipping_addresses_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(34, '2020_10_10_171722_create_business_settings_table', 17);
INSERT INTO migrations (id, migration, batch) VALUES(35, '2020_09_19_161802_create_currencies_table', 18);
INSERT INTO migrations (id, migration, batch) VALUES(36, '2020_10_12_152350_create_reviews_table', 18);
INSERT INTO migrations (id, migration, batch) VALUES(37, '2020_10_12_161834_create_reviews_table', 19);
INSERT INTO migrations (id, migration, batch) VALUES(38, '2020_10_12_180510_create_support_tickets_table', 20);
INSERT INTO migrations (id, migration, batch) VALUES(39, '2020_10_14_140130_create_transactions_table', 21);
INSERT INTO migrations (id, migration, batch) VALUES(40, '2020_10_14_143553_create_customer_wallets_table', 21);
INSERT INTO migrations (id, migration, batch) VALUES(41, '2020_10_14_143607_create_customer_wallet_histories_table', 21);
INSERT INTO migrations (id, migration, batch) VALUES(42, '2020_10_22_142212_create_support_ticket_convs_table', 21);
INSERT INTO migrations (id, migration, batch) VALUES(43, '2020_10_24_234813_create_banners_table', 22);
INSERT INTO migrations (id, migration, batch) VALUES(44, '2020_10_27_111557_create_shipping_methods_table', 23);
INSERT INTO migrations (id, migration, batch) VALUES(45, '2020_10_27_114154_add_url_to_banners_table', 24);
INSERT INTO migrations (id, migration, batch) VALUES(46, '2020_10_28_170308_add_shipping_id_to_order_details', 25);
INSERT INTO migrations (id, migration, batch) VALUES(47, '2020_11_02_140528_add_discount_to_order_table', 26);
INSERT INTO migrations (id, migration, batch) VALUES(48, '2020_11_03_162723_add_column_to_order_details', 27);
INSERT INTO migrations (id, migration, batch) VALUES(49, '2020_11_08_202351_add_url_to_banners_table', 28);
INSERT INTO migrations (id, migration, batch) VALUES(50, '2020_11_10_112713_create_help_topic', 29);
INSERT INTO migrations (id, migration, batch) VALUES(51, '2020_11_10_141513_create_contacts_table', 29);
INSERT INTO migrations (id, migration, batch) VALUES(52, '2020_11_15_180036_add_address_column_user_table', 30);
INSERT INTO migrations (id, migration, batch) VALUES(53, '2020_11_18_170209_add_status_column_to_product_table', 31);
INSERT INTO migrations (id, migration, batch) VALUES(54, '2020_11_19_115453_add_featured_status_product', 32);
INSERT INTO migrations (id, migration, batch) VALUES(55, '2020_11_21_133302_create_deal_of_the_days_table', 33);
INSERT INTO migrations (id, migration, batch) VALUES(56, '2020_11_20_172332_add_product_id_to_products', 34);
INSERT INTO migrations (id, migration, batch) VALUES(57, '2020_11_27_234439_add__state_to_shipping_addresses', 34);
INSERT INTO migrations (id, migration, batch) VALUES(58, '2020_11_28_091929_create_chattings_table', 35);
INSERT INTO migrations (id, migration, batch) VALUES(59, '2020_12_02_011815_add_bank_info_to_sellers', 36);
INSERT INTO migrations (id, migration, batch) VALUES(60, '2020_12_08_193234_create_social_medias_table', 37);
INSERT INTO migrations (id, migration, batch) VALUES(61, '2020_12_13_122649_shop_id_to_chattings', 37);
INSERT INTO migrations (id, migration, batch) VALUES(62, '2020_12_14_145116_create_seller_wallet_histories_table', 38);
INSERT INTO migrations (id, migration, batch) VALUES(63, '2020_12_14_145127_create_seller_wallets_table', 38);
INSERT INTO migrations (id, migration, batch) VALUES(64, '2020_12_15_174804_create_admin_wallets_table', 39);
INSERT INTO migrations (id, migration, batch) VALUES(65, '2020_12_15_174821_create_admin_wallet_histories_table', 39);
INSERT INTO migrations (id, migration, batch) VALUES(66, '2020_12_15_214312_create_feature_deals_table', 40);
INSERT INTO migrations (id, migration, batch) VALUES(67, '2020_12_17_205712_create_withdraw_requests_table', 41);
INSERT INTO migrations (id, migration, batch) VALUES(68, '2021_02_22_161510_create_notifications_table', 42);
INSERT INTO migrations (id, migration, batch) VALUES(69, '2021_02_24_154706_add_deal_type_to_flash_deals', 43);
INSERT INTO migrations (id, migration, batch) VALUES(70, '2021_03_03_204349_add_cm_firebase_token_to_users', 44);
INSERT INTO migrations (id, migration, batch) VALUES(71, '2021_04_17_134848_add_column_to_order_details_stock', 45);
INSERT INTO migrations (id, migration, batch) VALUES(72, '2021_05_12_155401_add_auth_token_seller', 46);
INSERT INTO migrations (id, migration, batch) VALUES(73, '2021_06_03_104531_ex_rate_update', 47);
INSERT INTO migrations (id, migration, batch) VALUES(74, '2021_06_03_222413_amount_withdraw_req', 48);
INSERT INTO migrations (id, migration, batch) VALUES(75, '2021_06_04_154501_seller_wallet_withdraw_bal', 49);
INSERT INTO migrations (id, migration, batch) VALUES(76, '2021_06_04_195853_product_dis_tax', 50);
INSERT INTO migrations (id, migration, batch) VALUES(77, '2021_05_27_103505_create_product_translations_table', 51);
INSERT INTO migrations (id, migration, batch) VALUES(78, '2021_06_17_054551_create_soft_credentials_table', 51);
INSERT INTO migrations (id, migration, batch) VALUES(79, '2021_06_29_212549_add_active_col_user_table', 52);
INSERT INTO migrations (id, migration, batch) VALUES(80, '2021_06_30_212619_add_col_to_contact', 53);
INSERT INTO migrations (id, migration, batch) VALUES(81, '2021_07_01_160828_add_col_daily_needs_products', 54);
INSERT INTO migrations (id, migration, batch) VALUES(82, '2021_07_04_182331_add_col_seller_sales_commission', 55);
INSERT INTO migrations (id, migration, batch) VALUES(83, '2021_08_07_190655_add_seo_columns_to_products', 56);
INSERT INTO migrations (id, migration, batch) VALUES(84, '2021_08_07_205913_add_col_to_category_table', 56);
INSERT INTO migrations (id, migration, batch) VALUES(85, '2021_08_07_210808_add_col_to_shops_table', 56);
INSERT INTO migrations (id, migration, batch) VALUES(86, '2021_08_14_205216_change_product_price_col_type', 56);
INSERT INTO migrations (id, migration, batch) VALUES(87, '2021_08_16_201505_change_order_price_col', 56);
INSERT INTO migrations (id, migration, batch) VALUES(88, '2021_08_16_201552_change_order_details_price_col', 56);
INSERT INTO migrations (id, migration, batch) VALUES(89, '2021_08_17_213934_change_col_type_seller_earning_history', 57);
INSERT INTO migrations (id, migration, batch) VALUES(90, '2021_08_17_214109_change_col_type_admin_earning_history', 57);
INSERT INTO migrations (id, migration, batch) VALUES(91, '2021_08_17_214232_change_col_type_admin_wallet', 57);
INSERT INTO migrations (id, migration, batch) VALUES(92, '2021_08_17_214405_change_col_type_seller_wallet', 57);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng notifications
--

CREATE TABLE notifications (
  id bigint(20) UNSIGNED NOT NULL,
  title varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  description varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  image varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng oauth_access_tokens
--

CREATE TABLE oauth_access_tokens (
  id varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  user_id bigint(20) DEFAULT NULL,
  client_id int(10) UNSIGNED NOT NULL,
  name varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  scopes text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  revoked tinyint(1) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  expires_at datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng oauth_access_tokens
--

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES('6840b7d4ed685bf2e0dc593affa0bd3b968065f47cc226d39ab09f1422b5a1d9666601f3f60a79c1', 98, 1, 'LaravelAuthApp', '[]', 1, '2021-07-05 09:25:41', '2021-07-05 09:25:41', '2022-07-05 15:25:41');
INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES('c42cdd5ae652b8b2cbac4f2f4b496e889e1a803b08672954c8bbe06722b54160e71dce3e02331544', 98, 1, 'LaravelAuthApp', '[]', 1, '2021-07-05 09:24:36', '2021-07-05 09:24:36', '2022-07-05 15:24:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng oauth_auth_codes
--

CREATE TABLE oauth_auth_codes (
  id varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  user_id bigint(20) NOT NULL,
  client_id int(10) UNSIGNED NOT NULL,
  scopes text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  revoked tinyint(1) NOT NULL,
  expires_at datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng oauth_clients
--

CREATE TABLE oauth_clients (
  id int(10) UNSIGNED NOT NULL,
  user_id bigint(20) DEFAULT NULL,
  name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  secret varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  redirect text COLLATE utf8mb4_unicode_ci NOT NULL,
  personal_access_client tinyint(1) NOT NULL,
  password_client tinyint(1) NOT NULL,
  revoked tinyint(1) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng oauth_clients
--

INSERT INTO oauth_clients (id, user_id, name, secret, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES(1, NULL, '6amtech', 'GEUx5tqkviM6AAQcz4oi1dcm1KtRdJPgw41lj0eI', 'http://localhost', 1, 0, 0, '2020-10-21 18:27:22', '2020-10-21 18:27:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng oauth_personal_access_clients
--

CREATE TABLE oauth_personal_access_clients (
  id int(10) UNSIGNED NOT NULL,
  client_id int(10) UNSIGNED NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng oauth_personal_access_clients
--

INSERT INTO oauth_personal_access_clients (id, client_id, created_at, updated_at) VALUES(1, 1, '2020-10-21 18:27:23', '2020-10-21 18:27:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng oauth_refresh_tokens
--

CREATE TABLE oauth_refresh_tokens (
  id varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  access_token_id varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  revoked tinyint(1) NOT NULL,
  expires_at datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng orders
--

CREATE TABLE orders (
  id bigint(20) UNSIGNED NOT NULL,
  customer_id varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  customer_type varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  payment_status varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  order_status varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  payment_method varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  transaction_ref varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  order_amount double NOT NULL DEFAULT 0,
  shipping_address text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  discount_amount double NOT NULL DEFAULT 0,
  discount_type varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng orders
--

INSERT INTO orders (id, customer_id, customer_type, payment_status, order_status, payment_method, transaction_ref, order_amount, shipping_address, created_at, updated_at, discount_amount, discount_type) VALUES(100001, '1', 'customer', 'unpaid', 'pending', 'cash_on_delivery', NULL, 70.48, '1', '2021-11-27 06:57:17', '2021-11-27 06:57:25', 10, 'coupon_discount');
INSERT INTO orders (id, customer_id, customer_type, payment_status, order_status, payment_method, transaction_ref, order_amount, shipping_address, created_at, updated_at, discount_amount, discount_type) VALUES(100002, '2', 'customer', 'unpaid', 'delivered', 'cash_on_delivery', NULL, 186.56, '2', '2021-11-27 07:16:14', '2021-11-27 07:20:39', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng order_details
--

CREATE TABLE order_details (
  id bigint(20) UNSIGNED NOT NULL,
  order_id bigint(20) DEFAULT NULL,
  product_id bigint(20) DEFAULT NULL,
  seller_id bigint(20) DEFAULT NULL,
  product_details text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  qty int(11) NOT NULL DEFAULT 0,
  price double NOT NULL DEFAULT 0,
  tax double NOT NULL DEFAULT 0,
  discount double NOT NULL DEFAULT 0,
  delivery_status varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  payment_status varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  shipping_method_id bigint(20) DEFAULT NULL,
  variant varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  variation varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  discount_type varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  is_stock_decreased tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng order_details
--

INSERT INTO order_details (id, order_id, product_id, seller_id, product_details, qty, price, tax, discount, delivery_status, payment_status, created_at, updated_at, shipping_method_id, variant, variation, discount_type, is_stock_decreased) VALUES(1, 100001, 96, 0, '{\"id\":96,\"added_by\":\"admin\",\"user_id\":1,\"name\":\"Home decorators collection boswell quarter 14 in.\",\"slug\":\"home-decorators-collection-boswell-quarter-14-in-UKRIct\",\"category_ids\":\"[{\\\"id\\\":\\\"6\\\",\\\"position\\\":1}]\",\"brand_id\":5,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"images\":\"[\\\"2021-11-27-61a1e38cd24f9.png\\\",\\\"2021-11-27-61a1e38cd4477.png\\\",\\\"2021-11-27-61a1e38cd4c8e.png\\\"]\",\"thumbnail\":\"2021-11-27-61a1e38cd5bd9.png\",\"featured\":null,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[\\\"#00008B\\\"]\",\"variant_product\":0,\"attributes\":\"null\",\"choice_options\":\"[]\",\"variation\":\"[{\\\"type\\\":\\\"DarkBlue\\\",\\\"price\\\":74,\\\"sku\\\":\\\"Hdcbq1i-DarkBlue\\\",\\\"qty\\\":\\\"340\\\"}]\",\"published\":0,\"unit_price\":74,\"purchase_price\":70,\"tax\":2,\"tax_type\":\"percent\",\"discount\":0,\"discount_type\":\"flat\",\"current_stock\":340,\"details\":\"<p>A fun and fresh 3-Light pendant inspired by nautical accents. The open frame is popular in a variety of today&#39;s home designs and is finished in Brushed Nickel. Pendants can be used in lieu of chandeliers for creative design schemes, displayed individually or paired in groupings over kitchen islands, dining room tables and in foyers. Brushed nickel finish No shade 14 in. Dia x 20 in. H Uses (3) 100-Watt medium base bulbs (not included) 60 in. of chain included Painted weathered gray wood accents Suitable for dry locations only<\\/p>\\r\\n\\r\\n<h1>Technical Details<\\/h1>\\r\\n\\r\\n<table>\\r\\n\\t<tbody>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Brand<\\/th>\\r\\n\\t\\t\\t<td>HD<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Manufacturer<\\/th>\\r\\n\\t\\t\\t<td>HD<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Item Weight<\\/th>\\r\\n\\t\\t\\t<td>1 pounds<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Package Dimensions<\\/th>\\r\\n\\t\\t\\t<td>17 x 16.8 x 12.8 inches<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Is Discontinued By Manufacturer<\\/th>\\r\\n\\t\\t\\t<td>No<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Style<\\/th>\\r\\n\\t\\t\\t<td>Rustic<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Material<\\/th>\\r\\n\\t\\t\\t<td>Wood, Nickel<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Finish Types<\\/th>\\r\\n\\t\\t\\t<td>Brushed<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Number of Lights<\\/th>\\r\\n\\t\\t\\t<td>3<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Voltage<\\/th>\\r\\n\\t\\t\\t<td>10 Volts<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Shade Color<\\/th>\\r\\n\\t\\t\\t<td>Gray<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Batteries Included?<\\/th>\\r\\n\\t\\t\\t<td>No<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Batteries Required?<\\/th>\\r\\n\\t\\t\\t<td>No<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<th>Wattage<\\/th>\\r\\n\\t\\t\\t<td>100 watts<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t<\\/tbody>\\r\\n<\\/table>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2021-11-27 13:51:40\",\"updated_at\":\"2021-11-27 13:51:40\",\"status\":1,\"featured_status\":1,\"meta_title\":null,\"meta_description\":null,\"meta_image\":\"2021-11-27-61a1e38cd8c04.png\",\"translations\":[]}', 1, 74, 1.48, 0, 'pending', 'unpaid', '2021-11-27 06:57:17', '2021-11-27 06:57:17', 2, 'DarkBlue', '{\"color\":\"DarkBlue\"}', 'discount_on_product', 1);
INSERT INTO order_details (id, order_id, product_id, seller_id, product_details, qty, price, tax, discount, delivery_status, payment_status, created_at, updated_at, shipping_method_id, variant, variation, discount_type, is_stock_decreased) VALUES(2, 100002, 87, 0, '{\"id\":87,\"added_by\":\"admin\",\"user_id\":1,\"name\":\"BLU VIVO X6 | 2021 | All Day Battery | Unlocked | 6.1\\u201d HD+ Display | 64GB | Dual\",\"slug\":\"blu-vivo-x6-2021-all-day-battery-unlocked-61-hd-display-64gb-dual-LxPu5B\",\"category_ids\":\"[{\\\"id\\\":\\\"9\\\",\\\"position\\\":1},{\\\"id\\\":\\\"12\\\",\\\"position\\\":2}]\",\"brand_id\":8,\"unit\":\"pc\",\"min_qty\":1,\"refundable\":1,\"images\":\"[\\\"2021-11-26-61a095ceb7071.png\\\",\\\"2021-11-26-61a095ceb8c69.png\\\"]\",\"thumbnail\":\"2021-11-26-61a095ceb93f4.png\",\"featured\":null,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[]\",\"variant_product\":0,\"attributes\":\"null\",\"choice_options\":\"[]\",\"variation\":\"[]\",\"published\":0,\"unit_price\":89,\"purchase_price\":80,\"tax\":2,\"tax_type\":\"percent\",\"discount\":0,\"discount_type\":\"flat\",\"current_stock\":1000,\"details\":\"<h1>About this item<\\/h1>\\r\\n\\r\\n<ul>\\r\\n\\t<li>6.1&rdquo; HD+ 19:9 Infinity Curved Glass Display<\\/li>\\r\\n\\t<li>Dual 13MP+ Depth Sensor Main Camera with LED Flash + 13 MP Selfie Camera<\\/li>\\r\\n\\t<li>64GB Internal Memory 3GB RAM Micro SD up to 64GB; 1.6GHz Octa-Core Processor| ARM Corterx-A55 with IMG8322 GPU<\\/li>\\r\\n\\t<li>4,000mAH Battery with 10W Quick Charge, Android 9 Pie and Fingerprint Senor<\\/li>\\r\\n\\t<li>4G LTE (1\\/2\\/3\\/4\\/5\\/7\\/12\\/17\\/28) 3G: (850\\/900\\/1700\\/1900\\/2100): US compatibility with GSM Networks including, T-Mobile, Metro PCS, and others. (Not compatible with new AT&amp;T or Cricket activations or with CDMA Networks like Verizon, Sprint, and Boost Mobile)<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2021-11-26 14:07:42\",\"updated_at\":\"2021-11-26 14:07:42\",\"status\":1,\"featured_status\":1,\"meta_title\":null,\"meta_description\":null,\"meta_image\":\"2021-11-26-61a095cebc1b3.png\",\"translations\":[]}', 2, 89, 3.56, 0, 'delivered', 'unpaid', '2021-11-27 07:16:14', '2021-11-27 07:20:39', 2, '', '[]', 'discount_on_product', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng password_resets
--

CREATE TABLE password_resets (
  email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  token varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng products
--

CREATE TABLE products (
  id bigint(20) UNSIGNED NOT NULL,
  added_by varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  user_id bigint(20) DEFAULT NULL,
  name varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  slug varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  category_ids varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  brand_id bigint(20) DEFAULT NULL,
  unit varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  min_qty int(11) NOT NULL DEFAULT 1,
  refundable tinyint(1) NOT NULL DEFAULT 1,
  images varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  thumbnail varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  featured varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  flash_deal varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  video_provider varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  video_url varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  colors varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  variant_product tinyint(1) NOT NULL DEFAULT 0,
  attributes varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  choice_options text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  variation text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  published tinyint(1) NOT NULL DEFAULT 0,
  unit_price double NOT NULL DEFAULT 0,
  purchase_price double NOT NULL DEFAULT 0,
  tax varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  tax_type varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  discount varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  discount_type varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  current_stock int(11) DEFAULT NULL,
  details text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  free_shipping tinyint(1) NOT NULL DEFAULT 0,
  attachment varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  status tinyint(1) NOT NULL DEFAULT 1,
  featured_status tinyint(1) NOT NULL DEFAULT 1,
  meta_title varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  meta_description varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  meta_image varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng products
--

INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(80, 'admin', 1, 'Demo Product 22', 'demo-product-22-j89QgR', '[{\"id\":\"1\",\"position\":1}]', 17, 'pc', 23, 0, '[\"def.png\"]', 'def.png', NULL, NULL, 'youtube', 'https://www.youtube.com/embed/2D-rr4gv3fk', '[]', 0, 'null', '[]', '[]', 0, 55, 59, '5', 'percent', '10', 'percent', 100, '<p>hhhhh</p>', 0, NULL, NULL, '2021-07-04 16:46:06', 1, 1, NULL, NULL, NULL);
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(82, 'admin', 1, 'Apple iPhone XS max, 256GB, gold - fully unlocked', 'apple-iphone-xs-max-256gb-gold-fully-unlocked-1bNaLv', '[{\"id\":\"9\",\"position\":1},{\"id\":\"12\",\"position\":2}]', 9, 'pc', 1, 1, '[\"2021-11-26-61a0686153831.png\",\"2021-11-26-61a068615557f.png\",\"2021-11-26-61a0686155c2f.png\",\"2021-11-26-61a0686156161.png\"]', '2021-11-26-61a0686156b26.png', NULL, NULL, 'youtube', NULL, '[\"#FFD700\"]', 0, 'null', '[]', '[{\"type\":\"Gold\",\"price\":48000,\"sku\":\"AiXm2g-fu-Gold\",\"qty\":\"1\"}]', 0, 48000, 45000, '2', 'percent', '0', 'flat', 1, '<p>A like-new experience. Backed by a one-year satisfaction guarantee.</p>\r\n\r\n<p>Renewed Premium products are shipped and sold by Amazon and have been certified to work and look like new. They have an increased battery life (min 90% battery capacity) and come with an Amazon-branded box and generic accessories which are in brand new condition. Renewed Premium products are not Apple certified but come with a one-year full satisfaction guarantee.&nbsp;<a href=\"https://www.amazon.com/Apple-iPhone-Max-256GB-Gold/dp/B08BF4NMK7/ref=sr_1_3?dchild=1&amp;keywords=iphone&amp;qid=1621880764&amp;sr=8-3#renewedProgramDescriptionBtfSection\">See terms here.</a></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Apple</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Gold</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Operating System</td>\r\n			<td>IOS 12</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>Smart Phone</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Memory Storage Capacity</td>\r\n			<td>256 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wireless Carrier</td>\r\n			<td>Unlocked</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Compatible with GSM carriers like AT&amp;T, T-Mobile, Verizon US Cellular and Metro.</li>\r\n	<li>Tested for battery health and guaranteed to come with a battery that exceeds 90% of original capacity.</li>\r\n	<li>Inspected and guaranteed to have minimal cosmetic damage, which is not noticeable when the device is held at arm&rsquo;s length. Successfully passed a full diagnostic test which ensures like-new functionality and removal of any prior-user personal information.</li>\r\n	<li>Includes a brand new, generic charging cable that is certified Mfi (Made for iPhone) and a brand new, generic wall plug that is UL certified for performance and safety. Also includes a SIM tray removal tool but does not come with headphones or a SIM card.</li>\r\n	<li>Backed by the same one-year satisfaction guarantee as brand new Apple products.</li>\r\n</ul>', 0, NULL, '2021-11-26 03:53:53', '2021-11-26 03:53:53', 1, 1, NULL, NULL, '2021-11-26-61a068615a1e0.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(83, 'admin', 1, 'Women\'s long-sleeve lightweight french terry fleece quarter-zip top', 'womens-long-sleeve-lightweight-french-terry-fleece-quarter-zip-top-gctbYK', '[{\"id\":\"11\",\"position\":1},{\"id\":\"17\",\"position\":2},{\"id\":\"29\",\"position\":3}]', 7, 'pc', 1, 1, '[\"2021-11-26-61a069b1d8b16.png\",\"2021-11-26-61a069b1da3ee.png\",\"2021-11-26-61a069b1daaeb.png\"]', '2021-11-26-61a069b1db127.png', NULL, NULL, 'youtube', NULL, '[\"#FFA500\",\"#FFFF00\"]', 0, 'null', '[]', '[{\"type\":\"Orange\",\"price\":1199.9997504,\"sku\":\"Wllftfqt-Orange\",\"qty\":\"1\"},{\"type\":\"Yellow\",\"price\":1199.9997504,\"sku\":\"Wllftfqt-Yellow\",\"qty\":\"1\"}]', 0, 1199.9997504, 899.9998128, '2', 'percent', '0', 'flat', 2, '<p>60% Cotton, 40% Polyester</p>\r\n\r\n<ul>\r\n	<li>Imported</li>\r\n	<li>Zipper closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>This quarter-zip up top in incredibly soft and comfortable French terry fleece is a go-to for an easy, casual look</li>\r\n	<li>Features long-sleeves, patch front kangaroo pocket, high collar, and ribbing at the neck, cuffs and hem</li>\r\n	<li>Everyday made better: we listen to customer feedback and fine-tune every detail to ensure quality, fit, and comfort</li>\r\n</ul>\r\n\r\n<h2>Product details</h2>\r\n\r\n<ul>\r\n	<li>Package Dimensions :&nbsp;12.44 x 11.89 x 1.89 inches; 10.58 Ounces</li>\r\n	<li>Item model number :&nbsp;AE18111988</li>\r\n	<li>Department :&nbsp;Womens</li>\r\n	<li>Date First Available :&nbsp;February 6, 2020</li>\r\n	<li>Manufacturer :&nbsp;Amazon Essentials</li>\r\n	<li>ASIN :&nbsp;B07W6NPBVV</li>\r\n</ul>', 0, NULL, '2021-11-26 03:59:29', '2021-12-20 13:33:56', 1, 1, NULL, NULL, '2021-11-26-61a069b1ddb83.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(84, 'admin', 1, 'Munchkin snack catcher, 2 pack, blue/green', 'munchkin-snack-catcher-2-pack-bluegreen-uFoygK', '[{\"id\":\"6\",\"position\":1}]', 1, 'pc', 1, 1, '[\"2021-11-26-61a0926620e58.png\",\"2021-11-26-61a092662277d.png\",\"2021-11-26-61a0926622ea5.png\"]', '2021-11-26-61a092662375c.png', NULL, NULL, 'youtube', NULL, '[\"#0000FF\",\"#008000\"]', 0, 'null', '[]', '[{\"type\":\"Blue\",\"price\":5,\"sku\":\"Msc2pb-Blue\",\"qty\":\"999\"},{\"type\":\"Green\",\"price\":5,\"sku\":\"Msc2pb-Green\",\"qty\":\"1000\"}]', 0, 5, 3, '0', 'percent', '0', 'flat', 1999, '<h3>Snacks are for mouths, not floors!</h3>\r\n\r\n<p>Sometimes it seems all you have to do is follow a trail of crumbs to find your little one. Munchkin&#39;s best-selling Snack Catcher to the rescue! This portable snack bowl allows independent toddlers to self-feed with a bit more dexterity and a lot less mess. Kids love accessing snacks all by themselves through the soft, flexible flaps, and moms love that those same flaps help prevent food spills all over the house and car.</p>\r\n\r\n<ul>\r\n	<li>Spill proof toddler snack container with soft flaps for easy food access</li>\r\n	<li>Fits most standard cup holders in cars, car seats, strollers, etc.</li>\r\n	<li>Great for home, daycare or on the go use; Holds&nbsp;up to&nbsp;9 ounces of snacks</li>\r\n	<li>BPA free, top rack dishwasher safe, 12 Plus months</li>\r\n	<li>2016 Winner of the Cribsie&#39;s Coolest Snack Container Award</li>\r\n</ul>', 0, NULL, '2021-11-26 06:53:10', '2021-11-26 06:53:10', 1, 1, NULL, NULL, '2021-11-26-61a0926626d24.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(85, 'admin', 1, 'Advanced elements stash pak roll top dry bag', 'advanced-elements-stash-pak-roll-top-dry-bag-e7ZMBG', '[{\"id\":\"5\",\"position\":1}]', 4, 'kg', 1, 1, '[\"2021-11-26-61a093411e7da.png\",\"2021-11-26-61a09341205ac.png\",\"2021-11-26-61a0934120cde.png\"]', '2021-11-26-61a09341219c8.png', NULL, NULL, 'youtube', NULL, '[\"#FF4500\",\"#FFFF00\"]', 0, 'null', '[]', '[{\"type\":\"OrangeRed\",\"price\":50,\"sku\":\"Aesprtdb-OrangeRed\",\"qty\":\"200\"},{\"type\":\"Yellow\",\"price\":50,\"sku\":\"Aesprtdb-Yellow\",\"qty\":\"500\"}]', 0, 50, 45, '0', 'percent', '0', 'flat', 700, '<p>Detachable small items pouch</p>\r\n\r\n<ul>\r\n	<li>Removable shoulder straps</li>\r\n	<li>D-rings for securing anywhere</li>\r\n	<li>Roll-top bag packs into small items pouch for compact storage when Not in use</li>\r\n</ul>', 0, NULL, '2021-11-26 06:56:49', '2021-11-26 06:56:49', 1, 1, NULL, NULL, '2021-11-26-61a0934123cbb.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(86, 'admin', 1, 'Teifoc house tile roof brick construction set toy', 'teifoc-house-tile-roof-brick-construction-set-toy-uVLiFF', '[{\"id\":\"6\",\"position\":1}]', 2, 'pc', 1, 1, '[\"2021-11-26-61a093f0d1de4.png\",\"2021-11-26-61a093f0d386d.png\",\"2021-11-26-61a093f0d41e9.png\"]', '2021-11-26-61a093f0d4b28.png', NULL, NULL, 'youtube', NULL, '[\"#FFFF00\"]', 0, 'null', '[]', '[{\"type\":\"Yellow\",\"price\":65,\"sku\":\"Thtrbcst-Yellow\",\"qty\":\"100\"}]', 0, 65, 60, '3', 'percent', '10', 'flat', 100, '<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Safe soluble corn extract based mortar</li>\r\n	<li>Includes over 207 pieces to build with</li>\r\n	<li>Builds a minimum 2 different models</li>\r\n	<li>Clay bricks can be used countless times for imaginative play!</li>\r\n	<li>Give the gift of play this holiday season, celebrate a birthday, or prepare for back to school with educational building sets that inspire creativity</li>\r\n</ul>', 0, NULL, '2021-11-26 06:59:44', '2021-11-26 06:59:44', 1, 1, NULL, NULL, '2021-11-26-61a093f0d72af.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(87, 'admin', 1, 'BLU VIVO X6 | 2021 | All Day Battery | Unlocked | 6.1” HD+ Display | 64GB | Dual', 'blu-vivo-x6-2021-all-day-battery-unlocked-61-hd-display-64gb-dual-LxPu5B', '[{\"id\":\"9\",\"position\":1},{\"id\":\"12\",\"position\":2}]', 8, 'pc', 1, 1, '[\"2021-11-26-61a095ceb7071.png\",\"2021-11-26-61a095ceb8c69.png\"]', '2021-11-26-61a095ceb93f4.png', NULL, NULL, 'youtube', NULL, '[]', 0, 'null', '[]', '[]', 0, 89, 80, '2', 'percent', '0', 'flat', 998, '<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>6.1&rdquo; HD+ 19:9 Infinity Curved Glass Display</li>\r\n	<li>Dual 13MP+ Depth Sensor Main Camera with LED Flash + 13 MP Selfie Camera</li>\r\n	<li>64GB Internal Memory 3GB RAM Micro SD up to 64GB; 1.6GHz Octa-Core Processor| ARM Corterx-A55 with IMG8322 GPU</li>\r\n	<li>4,000mAH Battery with 10W Quick Charge, Android 9 Pie and Fingerprint Senor</li>\r\n	<li>4G LTE (1/2/3/4/5/7/12/17/28) 3G: (850/900/1700/1900/2100): US compatibility with GSM Networks including, T-Mobile, Metro PCS, and others. (Not compatible with new AT&amp;T or Cricket activations or with CDMA Networks like Verizon, Sprint, and Boost Mobile)</li>\r\n</ul>', 0, NULL, '2021-11-26 07:07:42', '2021-11-27 07:16:14', 1, 1, NULL, NULL, '2021-11-26-61a095cebc1b3.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(88, 'seller', 1, 'Stackable Kids Chairs, Premium Plastic, 2-Pack', 'stackable-kids-chairs-premium-plastic-2-pack-x7M3Rn', '[{\"id\":\"4\",\"position\":1}]', 13, 'pc', 1, 1, '[\"2021-11-26-61a0a44ac9067.png\",\"2021-11-26-61a0a44acacdf.png\"]', '2021-11-26-61a0a44acb365.png', NULL, NULL, 'youtube', NULL, '[\"#F0FFFF\"]', 0, 'null', '[]', '[{\"type\":\"Azure\",\"price\":60,\"sku\":\"SKCPP2-Azure\",\"qty\":\"100\"}]', 0, 60, 50, '2', 'percent', '0', 'flat', 100, '<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Set of 2 molded premium plastic chairs for kids; blue</li>\r\n	<li>Fun, modern design that fits in nicely in a child&rsquo;s bedroom or playroom</li>\r\n	<li>Made of durable UV-resistant premium plastic; wipe down with a damp cloth to clean</li>\r\n	<li>Contoured seat sized for children; smooth, rounded edges for safety</li>\r\n	<li>Stackable design is easy to store and saves space; 165 pound weight capacity</li>\r\n	<li>Lightweight construction allows for easy transport between rooms and activities</li>\r\n</ul>', 0, NULL, '2021-11-26 08:09:30', '2021-11-26 08:09:30', 1, 1, NULL, NULL, '2021-11-26-61a0a44ace541.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(89, 'admin', 1, 'Samsung Galaxy S20 FE 5G', 'samsung-galaxy-s20-fe-5g-GtbCbG', '[{\"id\":\"9\",\"position\":1},{\"id\":\"12\",\"position\":2}]', 5, 'pc', 1, 1, '[\"2021-11-27-61a1dd39c3a6f.png\",\"2021-11-27-61a1dd39c5eb3.png\",\"2021-11-27-61a1dd39c699a.png\"]', '2021-11-27-61a1dd39c7357.png', NULL, NULL, 'youtube', NULL, '[\"#000000\",\"#D2691E\",\"#FFD700\"]', 0, '[\"1\"]', '[{\"name\":\"choice_1\",\"title\":\"Size\",\"options\":[\"4GB-32GB\",\"4GB-64GB\",\"4GB-128GB\",\"8GB-\",\"128GB\",\"8GB-256GB\"]}]', '[{\"type\":\"Black-4GB-32GB\",\"price\":530,\"sku\":\"SGSF5-Black-4GB-32GB\",\"qty\":\"120\"},{\"type\":\"Black-4GB-64GB\",\"price\":530,\"sku\":\"SGSF5-Black-4GB-64GB\",\"qty\":\"140\"},{\"type\":\"Black-4GB-128GB\",\"price\":530,\"sku\":\"SGSF5-Black-4GB-128GB\",\"qty\":\"16\"},{\"type\":\"Black-8GB-\",\"price\":530,\"sku\":\"SGSF5-Black-8GB-\",\"qty\":\"24\"},{\"type\":\"Black-128GB\",\"price\":530,\"sku\":\"SGSF5-Black-128GB\",\"qty\":\"63\"},{\"type\":\"Black-8GB-256GB\",\"price\":530,\"sku\":\"SGSF5-Black-8GB-256GB\",\"qty\":\"46\"},{\"type\":\"Chocolate-4GB-32GB\",\"price\":530,\"sku\":\"SGSF5-Chocolate-4GB-32GB\",\"qty\":\"76\"},{\"type\":\"Chocolate-4GB-64GB\",\"price\":530,\"sku\":\"SGSF5-Chocolate-4GB-64GB\",\"qty\":\"46\"},{\"type\":\"Chocolate-4GB-128GB\",\"price\":530,\"sku\":\"SGSF5-Chocolate-4GB-128GB\",\"qty\":\"42\"},{\"type\":\"Chocolate-8GB-\",\"price\":530,\"sku\":\"SGSF5-Chocolate-8GB-\",\"qty\":\"67\"},{\"type\":\"Chocolate-128GB\",\"price\":530,\"sku\":\"SGSF5-Chocolate-128GB\",\"qty\":\"32\"},{\"type\":\"Chocolate-8GB-256GB\",\"price\":530,\"sku\":\"SGSF5-Chocolate-8GB-256GB\",\"qty\":\"76\"},{\"type\":\"Gold-4GB-32GB\",\"price\":530,\"sku\":\"SGSF5-Gold-4GB-32GB\",\"qty\":\"64\"},{\"type\":\"Gold-4GB-64GB\",\"price\":530,\"sku\":\"SGSF5-Gold-4GB-64GB\",\"qty\":\"48\"},{\"type\":\"Gold-4GB-128GB\",\"price\":530,\"sku\":\"SGSF5-Gold-4GB-128GB\",\"qty\":\"37\"},{\"type\":\"Gold-8GB-\",\"price\":530,\"sku\":\"SGSF5-Gold-8GB-\",\"qty\":\"64\"},{\"type\":\"Gold-128GB\",\"price\":530,\"sku\":\"SGSF5-Gold-128GB\",\"qty\":\"82\"},{\"type\":\"Gold-8GB-256GB\",\"price\":530,\"sku\":\"SGSF5-Gold-8GB-256GB\",\"qty\":\"65\"}]', 0, 530, 500, '0', 'percent', '0', 'flat', 1108, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>SAMSUNG</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color</td>\r\n			<td>Cloud Green</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Operating System</td>\r\n			<td>Android</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Form Factor</td>\r\n			<td>Smartphone</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Memory Storage Capacity</td>\r\n			<td>6 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wireless Carrier</td>\r\n			<td>Unlocked</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Pro-Grade Camera: The new Samsung Galaxy S20 FE mobile phone features high-powered pro lenses for beautiful portraits, stunning landscapes and crisp close-ups in any light with its 3X optical zoom</li>\r\n	<li>30X Space Zoom: Whether you want your cellphone to zoom in close from afar or magnify details of something nearby, 30X Space Zoom gives you the power to get closer</li>\r\n	<li>Night Mode: Capture crisp images and vibrant video with Night Mode and create high-quality content in low light no flash required with this smartphone</li>\r\n	<li>Single-Take AI: One tap of the screen captures multiple images and video all at once; Lenses, effects and filters capture the best of every moment, every time</li>\r\n	<li>Power of 5G: Get next-level power for everything you love to do with Samsung Galaxy 5G; More sharing, more gaming, more experiences and never miss a beat</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', 0, NULL, '2021-11-27 06:24:41', '2021-11-27 06:24:41', 1, 1, NULL, NULL, '2021-11-27-61a1dd39c943a.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(90, 'admin', 1, 'The school of life - emotional baggage tote bag - canvas tote bag (navy)', 'the-school-of-life-emotional-baggage-tote-bag-canvas-tote-bag-navy-dmlnwM', '[{\"id\":\"5\",\"position\":1}]', 8, 'pc', 1, 1, '[\"2021-11-27-61a1ddb83d6ea.png\",\"2021-11-27-61a1ddb83f4f5.png\",\"2021-11-27-61a1ddb840049.png\"]', '2021-11-27-61a1ddb840a3e.png', NULL, NULL, 'youtube', NULL, '[\"#000080\"]', 0, 'null', '[]', '[{\"type\":\"Navy\",\"price\":50,\"sku\":\"Tsol-ebtb-ctb(-Navy\",\"qty\":\"100\"}]', 0, 50, 30, '2', 'percent', '0', 'flat', 100, '<p>Heavy duty canvas tote bag</p>\r\n\r\n<ul>\r\n	<li>Available in either navy or khaki with white print</li>\r\n	<li>Stylish tote bag ideal for men or women</li>\r\n	<li>100% cotton</li>\r\n	<li>375 x 400mm</li>\r\n</ul>', 0, NULL, '2021-11-27 06:26:48', '2021-11-27 06:26:48', 1, 1, NULL, NULL, '2021-11-27-61a1ddb842bd6.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(91, 'admin', 1, 'Dove advanced care antiperspirant deodorant stick for women', 'dove-advanced-care-antiperspirant-deodorant-stick-for-women-tAQWBh', '[{\"id\":\"1\",\"position\":1}]', 3, 'pc', 1, 1, '[\"2021-11-27-61a1de5ed3fae.png\",\"2021-11-27-61a1de5ed589b.png\",\"2021-11-27-61a1de5ed62e4.png\"]', '2021-11-27-61a1de5ed7135.png', NULL, NULL, 'youtube', NULL, '[]', 0, '[\"1\"]', '[{\"name\":\"choice_1\",\"title\":\"Size\",\"options\":[\"500ml\",\"1000ml\",\"2000ml\"]}]', '[{\"type\":\"500ml\",\"price\":60,\"sku\":\"Dacadsfw-500ml\",\"qty\":\"130\"},{\"type\":\"1000ml\",\"price\":70,\"sku\":\"Dacadsfw-1000ml\",\"qty\":\"186\"},{\"type\":\"2000ml\",\"price\":80,\"sku\":\"Dacadsfw-2000ml\",\"qty\":\"245\"}]', 0, 60, 40, '2', 'percent', '0', 'flat', 561, '<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Effective protection and kind to skin: Dove Advanced Care beauty finish antiperspirant Deodorant Stick keeps your underarms dry and odor-free for up to 48 hours while being kind to your skin</li>\r\n	<li>Soft and comfortable underarms: our antiperspirant Deodorant for women, containing 1/4 moisturizers with natural oil, cares for your underarm skin</li>\r\n	<li>Alcohol-free formula: The 0% alcohol (ethanol) formula of our antiperspirant stick helps skin recover from underarm irritation that shaving can cause</li>\r\n	<li>Keeps you fresh: a fruity, floral scent with sparkling, zesty top notes of pears and pineapple wrapped up in a petally bouquet of freesia, waterlily, and rose</li>\r\n	<li>Frees you from underarm worries: This women&#39;s deodorant Stick protects and cares for your skin so that you can be free from underarm inhibitions and live beautifully unconsciously</li>\r\n</ul>', 0, NULL, '2021-11-27 06:29:34', '2021-11-27 06:29:34', 1, 1, NULL, NULL, '2021-11-27-61a1de5eda0b2.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(92, 'admin', 1, 'Timex marlin stainless steel hand-wound movement', 'timex-marlin-stainless-steel-hand-wound-movement-YZq7aB', '[{\"id\":\"7\",\"position\":1}]', 4, 'pc', 1, 1, '[\"2021-11-27-61a1e08171282.png\",\"2021-11-27-61a1e08172eb5.png\",\"2021-11-27-61a1e08174ef4.png\"]', '2021-11-27-61a1e08175a66.png', NULL, NULL, 'youtube', NULL, '[\"#000000\"]', 0, 'null', '[]', '[{\"type\":\"Black\",\"price\":50,\"sku\":\"Tmsshm-Black\",\"qty\":\"120\"}]', 0, 50, 48, '2', 'percent', '0', 'flat', 120, '<p><strong>Watch Information</strong></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand, Seller, or Collection Name</th>\r\n			<td>Timex</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Part Number</th>\r\n			<td>TW2R47900ZV</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Shape</th>\r\n			<td>Round</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display Type</th>\r\n			<td>Analog</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Clasp</th>\r\n			<td>Tang Buckle</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Case material</th>\r\n			<td>Stainless Steel</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Case diameter</th>\r\n			<td>32 millimeters</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Case Thickness</th>\r\n			<td>10 millimeters</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Band Material</th>\r\n			<td>Stainless Steel</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Band width</th>\r\n			<td>17.7 millimeters</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Band Color</th>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<th><a href=\"https://www.amazon.com/gp/product/ajax-handlers/tech-spec-popover-contents.html/ref=dp_soft_tech_spec?keyLookUp=/gp/product/ajax-handlers/tech-spec-popover-contents.html/ref=dp_soft_tech_spec?keyLookUp=watch_help_attr-name_watch_movement_type\" target=\"_blank\">Movement﻿</a></th>\r\n			<td>Three Hand</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Water resistant depth</th>\r\n			<td>30 Meters</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Warranty</th>\r\n			<td>If this product is sold by Amazon, please review the manufacturer&rsquo;s website for warranty information. If this product is sold by another party, please contact the seller directly for warranty information for this product. You may also be able to find warranty information on the manufacturer&rsquo;s website.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 0, NULL, '2021-11-27 06:38:41', '2021-11-27 06:38:41', 1, 1, NULL, NULL, '2021-11-27-61a1e081781a5.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(93, 'admin', 1, 'Dove body wash with pump with skin natural nourishers', 'dove-body-wash-with-pump-with-skin-natural-nourishers-cSaAVU', '[{\"id\":\"1\",\"position\":1}]', 3, 'kg', 1, 1, '[\"2021-11-27-61a1e12e7125c.png\",\"2021-11-27-61a1e12e72d24.png\",\"2021-11-27-61a1e12e73504.png\"]', '2021-11-27-61a1e12e73d56.png', NULL, NULL, 'youtube', NULL, '[]', 0, 'null', '[]', '[]', 0, 50, 48, '2', 'percent', '0', 'flat', 130, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Ingredients</td>\r\n			<td>Water(Aqua), Cocamidopropyl Betaine, Sodium Chloride, Sodium Lauroyl Glycinate, Sodium Lauroyl Isethionate, Acrylates Copolymer, Lauric Acid, Glycerin, Fragrance (Parfum), Styrene/Acrylates Copolymer, Stearic Acid, DMDM Hydantoin, BHT, Sodium Isethionate, PEG-150 Pentaerythrityl Tetrastearate, PPG-2 Hydroxyethyl Cocamide, Tetrasodium EDTA, Etidronic Acid, Methylisothiazolinone, Iodopropynyl Butylcarbamate, Propylene Glycol, Citric Acid, Red 33 (CI 17200)Water(Aqua), Cocamidopropyl Betaine, Sodium Chloride, Sodium Lauroyl Glycinate, Sodium Lauroyl Isethionate, Acrylates Copolymer, Lauric Acid, Glycerin, Fragrance (Parfum), Styrene/Acrylates Copolymer, Stearic Acid, D&hellip;&nbsp;<a href=\"javascript:void(0)\">See more</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Scent</td>\r\n			<td>Deep Moisture</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brand</td>\r\n			<td>Dove</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Skin Type</td>\r\n			<td>Sensitive</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Item Form</td>\r\n			<td>Wash</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dove Deep Moisture Body Wash is Just As Effective for Cleaning Hands!</p>\r\n\r\n<ul>\r\n	<li>MILD AND PH-BALANCED: Dove body wash includes Moisture Renew Blend&mdash;a combination of skin-natural nourishers and plant-based moisturizers that absorb deeply into the top layers of skin</li>\r\n	<li>DERMATOLOGIST RECOMMENDED BODY WASH: Nourishes skin with a rich, creamy formula, leaving your skin softer than a shower gel can.</li>\r\n	<li>THOUGHTFULLY MADE: This body wash is PETA-certified cruelty free and made in 100% recycled plastic bottles, so you can feel good about switching from everyday shower soap to Dove body wash.</li>\r\n	<li>PLANT-BASED MOISTURIZER: Naturally-derived cleansers and skin-natural nutrients, creamy body wash from Dove is microbiome gentle, so you&rsquo;ll get beautifully nourished while maintaining healthy skin</li>\r\n	<li>CARE AS YOU CLEAN: The cleansing efficacy and care you need, all in one product.</li>\r\n</ul>', 0, NULL, '2021-11-27 06:41:34', '2021-11-27 06:41:34', 1, 1, NULL, NULL, '2021-11-27-61a1e12e77793.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(94, 'admin', 1, 'Coated Cast Iron Kettlebell Weight', 'coated-cast-iron-kettlebell-weight-Ssn9lZ', '[{\"id\":\"1\",\"position\":1}]', 6, 'pc', 1, 1, '[\"2021-11-27-61a1e29f5ae84.png\"]', '2021-11-27-61a1e29f5c74a.png', NULL, NULL, 'youtube', NULL, '[]', 0, 'null', '[]', '[]', 0, 50, 48, '2', 'percent', '0', 'flat', 200, '<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Vinyl-coated iron kettlebell for fitness training</li>\r\n	<li>Available in a variety of weights from 10 to 60 pounds</li>\r\n	<li>Comes in a variety of eye-catching colors specific to weight</li>\r\n	<li>Great for agility training, cardio, endurance, squats, lunges, and more</li>\r\n	<li>Vinyl coating protects floors, reduces noise, and prevents corrosion</li>\r\n	<li>Textured handle for secure grip</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Package Dimensions &rlm; : &lrm;&nbsp;14.25 x 11.77 x 10.98 inches; 21.21 Pounds</li>\r\n	<li>Item model number &rlm; : &lrm;&nbsp;IR92007-10LB</li>\r\n	<li>Date First Available &rlm; : &lrm;&nbsp;August 16, 2018</li>\r\n	<li>Manufacturer &rlm; : &lrm;&nbsp;Amazon Basics</li>\r\n	<li>ASIN &rlm; : &lrm;&nbsp;B07GJJWBTX</li>\r\n</ul>', 0, NULL, '2021-11-27 06:47:43', '2021-11-27 06:47:43', 1, 1, NULL, NULL, '2021-11-27-61a1e29f5f5d4.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(95, 'admin', 1, 'OXO good grips 11-pound stainless steel food scale with pull-out display', 'oxo-good-grips-11-pound-stainless-steel-food-scale-with-pull-out-display-IaGdQm', '[{\"id\":\"6\",\"position\":1}]', 2, 'kg', 1, 1, '[\"2021-11-27-61a1e32771d5c.png\",\"2021-11-27-61a1e32773cb9.png\",\"2021-11-27-61a1e327743e9.png\"]', '2021-11-27-61a1e32774bf3.png', NULL, NULL, 'youtube', NULL, '[]', 0, 'null', '[]', '[]', 0, 46, 45, '2', 'percent', '0', 'flat', 142, '<h1>About this item</h1>\r\n\r\n<ul>\r\n	<li>Stainless steel is smudge and fingerprint-resistant</li>\r\n	<li>Zero function for taring the scale before weighing additional ingredients</li>\r\n	<li>Digital screen with large, easy-to-read numbers</li>\r\n	<li>Removable platform for convenient cleaning</li>\r\n	<li>Pull-Out display prevents shadowing from large plates or bowls</li>\r\n	<li>Unit conversion button to measure in ounces, pounds, gram or kilogram</li>\r\n	<li>The OXO Better Guarantee: If you experience an issue with your OXO product, get in touch with us for a repair or replacement. We&rsquo;re grateful for the opportunity to learn from your experience, and we&rsquo;ll make it better.</li>\r\n</ul>', 0, NULL, '2021-11-27 06:49:59', '2021-11-27 06:49:59', 1, 1, NULL, NULL, '2021-11-27-61a1e32778099.png');
INSERT INTO products (id, added_by, user_id, name, slug, category_ids, brand_id, unit, min_qty, refundable, images, thumbnail, featured, flash_deal, video_provider, video_url, colors, variant_product, attributes, choice_options, variation, published, unit_price, purchase_price, tax, tax_type, discount, discount_type, current_stock, details, free_shipping, attachment, created_at, updated_at, status, featured_status, meta_title, meta_description, meta_image) VALUES(96, 'admin', 1, 'Home decorators collection boswell quarter 14 in.', 'home-decorators-collection-boswell-quarter-14-in-UKRIct', '[{\"id\":\"6\",\"position\":1}]', 5, 'kg', 1, 1, '[\"2021-11-27-61a1e38cd24f9.png\",\"2021-11-27-61a1e38cd4477.png\",\"2021-11-27-61a1e38cd4c8e.png\"]', '2021-11-27-61a1e38cd5bd9.png', NULL, NULL, 'youtube', NULL, '[\"#00008B\"]', 0, 'null', '[]', '[{\"type\":\"DarkBlue\",\"price\":74,\"sku\":\"Hdcbq1i-DarkBlue\",\"qty\":339}]', 0, 74, 70, '2', 'percent', '0', 'flat', 339, '<p>A fun and fresh 3-Light pendant inspired by nautical accents. The open frame is popular in a variety of today&#39;s home designs and is finished in Brushed Nickel. Pendants can be used in lieu of chandeliers for creative design schemes, displayed individually or paired in groupings over kitchen islands, dining room tables and in foyers. Brushed nickel finish No shade 14 in. Dia x 20 in. H Uses (3) 100-Watt medium base bulbs (not included) 60 in. of chain included Painted weathered gray wood accents Suitable for dry locations only</p>\r\n\r\n<h1>Technical Details</h1>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand</th>\r\n			<td>HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Manufacturer</th>\r\n			<td>HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>1 pounds</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Package Dimensions</th>\r\n			<td>17 x 16.8 x 12.8 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Is Discontinued By Manufacturer</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Style</th>\r\n			<td>Rustic</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Material</th>\r\n			<td>Wood, Nickel</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Finish Types</th>\r\n			<td>Brushed</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number of Lights</th>\r\n			<td>3</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Voltage</th>\r\n			<td>10 Volts</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Shade Color</th>\r\n			<td>Gray</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries Included?</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries Required?</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Wattage</th>\r\n			<td>100 watts</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 0, NULL, '2021-11-27 06:51:40', '2021-11-27 06:57:17', 1, 1, NULL, NULL, '2021-11-27-61a1e38cd8c04.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng product_stocks
--

CREATE TABLE product_stocks (
  id bigint(20) UNSIGNED NOT NULL,
  product_id bigint(20) DEFAULT NULL,
  variant varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  sku varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  price decimal(8,2) NOT NULL DEFAULT 0.00,
  qty int(11) NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng reviews
--

CREATE TABLE reviews (
  id bigint(20) UNSIGNED NOT NULL,
  product_id bigint(20) NOT NULL,
  customer_id bigint(20) NOT NULL,
  comment mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  attachment varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  rating int(11) NOT NULL DEFAULT 0,
  status int(11) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng reviews
--

INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(1, 23, 97, 'good', '[\"review\\/GZznygozmDapxWtpb1jmFucm51aoRTzAVu4iQyDK.jpg\"]', 5, 1, '2021-06-04 11:55:16', '2021-06-04 11:55:16');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(2, 34, 97, 'good', '[]', 1, 1, '2021-06-04 16:47:53', '2021-06-04 16:47:53');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(3, 34, 97, 'okay', '[]', 5, 1, '2021-06-04 21:24:51', '2021-06-04 21:24:51');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(4, 41, 97, 'oka', '[]', 1, 1, '2021-06-04 21:34:09', '2021-06-04 21:34:09');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(5, 40, 97, 'great', '[\"review\\/pqXIjC40O8rYU7WFBwQaMUD32ObIObvKCRssLdF6.jpg\"]', 1, 1, '2021-06-04 21:36:56', '2021-06-04 21:36:56');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(6, 1, 101, 'Nice', '[\"review\\/DQh9xsD7fiyjheN9qOI6gXmFwEXrRebHzuliR4lY.jpg\"]', 1, 1, '2021-06-04 21:42:05', '2021-06-04 21:42:05');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(7, 40, 97, 'very 5', '[]', 5, 1, '2021-06-04 21:42:41', '2021-06-04 21:42:41');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(8, 40, 97, 'okaaaa', '[]', 4, 1, '2021-06-04 22:27:09', '2021-06-04 22:27:09');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(9, 41, 97, 'abcd123', '[]', 4, 1, '2021-06-04 22:28:31', '2021-06-04 22:28:31');
INSERT INTO reviews (id, product_id, customer_id, comment, attachment, rating, status, created_at, updated_at) VALUES(10, 87, 2, 'Good', '[]', 2, 1, '2021-11-27 07:23:14', '2021-11-27 07:23:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng search_functions
--

CREATE TABLE search_functions (
  id bigint(20) UNSIGNED NOT NULL,
  `key` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  url varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  visible_for varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng search_functions
--

INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(1, 'Dashboard', 'admin/dashboard', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(2, 'Order All', 'admin/orders/list/all', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(3, 'Order Pending', 'admin/orders/list/pending', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(4, 'Order Processed', 'admin/orders/list/processed', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(5, 'Order Delivered', 'admin/orders/list/delivered', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(6, 'Order Returned', 'admin/orders/list/returned', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(7, 'Order Failed', 'admin/orders/list/failed', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(8, 'Brand Add', 'admin/brand/add-new', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(9, 'Brand List', 'admin/brand/list', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(10, 'Banner', 'admin/banner/list', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(11, 'Category', 'admin/category/view', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(12, 'Sub Category', 'admin/category/sub-category/view', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(13, 'Sub sub category', 'admin/category/sub-sub-category/view', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(14, 'Attribute', 'admin/attribute/view', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(15, 'Product', 'admin/product/list', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(16, 'Coupon', 'admin/coupon/add-new', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(17, 'Custom Role', 'admin/custom-role/create', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(18, 'Employee', 'admin/employee/add-new', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(19, 'Seller', 'admin/sellers/seller-list', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(20, 'Contacts', 'admin/contact/list', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(21, 'Flash Deal', 'admin/deal/flash', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(22, 'Deal of the day', 'admin/deal/day', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(23, 'Language', 'admin/business-settings/language', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(24, 'Mail', 'admin/business-settings/mail', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(25, 'Shipping method', 'admin/business-settings/shipping-method/add', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(26, 'Currency', 'admin/currency/view', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(27, 'Payment method', 'admin/business-settings/payment-method', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(28, 'SMS Gateway', 'admin/business-settings/sms-gateway', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(29, 'Support Ticket', 'admin/support-ticket/view', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(30, 'FAQ', 'admin/helpTopic/list', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(31, 'About Us', 'admin/business-settings/about-us', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(32, 'Terms and Conditions', 'admin/business-settings/terms-condition', 'admin', NULL, NULL);
INSERT INTO search_functions (id, `key`, url, visible_for, created_at, updated_at) VALUES(33, 'Web Config', 'admin/business-settings/web-config', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng sellers
--

CREATE TABLE sellers (
  id bigint(20) UNSIGNED NOT NULL,
  f_name varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  l_name varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  phone varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  image varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  email varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  password varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  status varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  bank_name varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  branch varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  account_no varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  holder_name varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  auth_token text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  sales_commission_percentage double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng sellers
--

INSERT INTO sellers (id, f_name, l_name, phone, image, email, password, status, remember_token, created_at, updated_at, bank_name, branch, account_no, holder_name, auth_token, sales_commission_percentage) VALUES(1, 'Seller test 1', 'Le', '0911465859', '2021-11-26-61a09d6403837.png', 'sellertest1@gmail.com', '$2y$10$vr9682vSq4vuIGMJ0UjS4uVZjspMNpdAcwnfycpWCekJ3vkgAz41O', 'approved', NULL, '2021-11-26 07:40:04', '2021-11-26 07:41:43', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng seller_wallets
--

CREATE TABLE seller_wallets (
  id bigint(20) UNSIGNED NOT NULL,
  seller_id bigint(20) DEFAULT NULL,
  balance double NOT NULL DEFAULT 0,
  withdrawn double NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng seller_wallets
--

INSERT INTO seller_wallets (id, seller_id, balance, withdrawn, created_at, updated_at) VALUES(1, 1, 0, 0, '2021-11-26 07:42:03', '2021-11-26 07:42:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng seller_wallet_histories
--

CREATE TABLE seller_wallet_histories (
  id bigint(20) UNSIGNED NOT NULL,
  seller_id bigint(20) DEFAULT NULL,
  amount double NOT NULL DEFAULT 0,
  order_id bigint(20) DEFAULT NULL,
  product_id bigint(20) DEFAULT NULL,
  payment varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng shipping_addresses
--

CREATE TABLE shipping_addresses (
  id bigint(20) UNSIGNED NOT NULL,
  customer_id varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  contact_person_name varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  address_type varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  address varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  city varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  zip varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  phone varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  state varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  country varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng shipping_addresses
--

INSERT INTO shipping_addresses (id, customer_id, contact_person_name, address_type, address, city, zip, phone, created_at, updated_at, state, country) VALUES(1, '1', 'Hà Anh Tuấn', 'home', '117 Phường V, TP Vị Thanh', 'ABC', '95000', '0911465859', '2021-11-27 06:57:17', '2021-11-27 06:57:17', NULL, 'Việt Nam');
INSERT INTO shipping_addresses (id, customer_id, contact_person_name, address_type, address, city, zip, phone, created_at, updated_at, state, country) VALUES(2, '0', 'Lê Hoàng Việt', 'permanent', '117 Phường V, TP Vị Thanh', 'ABC', '95000', '0911445595', '2021-11-27 07:16:14', '2021-11-27 07:16:14', NULL, 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng shipping_methods
--

CREATE TABLE shipping_methods (
  id bigint(20) UNSIGNED NOT NULL,
  creator_id bigint(20) DEFAULT NULL,
  creator_type varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  title varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cost decimal(8,2) NOT NULL DEFAULT 0.00,
  duration varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng shipping_methods
--

INSERT INTO shipping_methods (id, creator_id, creator_type, title, cost, duration, status, created_at, updated_at) VALUES(1, 1, 'admin', 'Courier', '0.00', '4-6 days', 0, '2020-10-27 14:44:01', '2020-12-21 14:01:29');
INSERT INTO shipping_methods (id, creator_id, creator_type, title, cost, duration, status, created_at, updated_at) VALUES(2, 1, 'admin', 'Company Vehicle', '5.00', '2 Week', 1, '2021-05-25 20:57:04', '2021-05-25 20:57:04');
INSERT INTO shipping_methods (id, creator_id, creator_type, title, cost, duration, status, created_at, updated_at) VALUES(4, 1, 'admin', 'Slow shipping', '10.00', '40 days', 1, '2020-12-14 12:43:46', '2021-02-27 19:17:48');
INSERT INTO shipping_methods (id, creator_id, creator_type, title, cost, duration, status, created_at, updated_at) VALUES(5, 1, 'admin', 'by air', '100.00', '2 days', 1, '2021-05-25 20:57:40', '2021-05-25 20:57:40');
INSERT INTO shipping_methods (id, creator_id, creator_type, title, cost, duration, status, created_at, updated_at) VALUES(6, 10, 'seller', 'by air', '100.00', '4 days', 1, '2021-05-29 16:12:40', '2021-05-29 16:12:40');
INSERT INTO shipping_methods (id, creator_id, creator_type, title, cost, duration, status, created_at, updated_at) VALUES(9, 1, 'seller', 'Standard ship', '20.00', '1', 2, '2021-11-26 07:44:07', '2021-11-26 07:44:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng shops
--

CREATE TABLE shops (
  id bigint(20) UNSIGNED NOT NULL,
  seller_id bigint(20) NOT NULL,
  name varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  address varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  contact varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  image varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  banner varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng shops
--

INSERT INTO shops (id, seller_id, name, address, contact, image, created_at, updated_at, banner) VALUES(1, 1, 'Shop An Nhiên', 'Vị Thanh Hậu Giang', '0911465859', '2021-11-26-61a09d642091e.png', '2021-11-26 07:40:04', '2021-11-26 07:40:04', '2021-11-26-61a09d642121b.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng social_medias
--

CREATE TABLE social_medias (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  link varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  icon varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  active_status int(11) NOT NULL,
  status tinyint(1) NOT NULL DEFAULT 1,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng social_medias
--

INSERT INTO social_medias (id, name, link, icon, active_status, status, created_at, updated_at) VALUES(1, 'twitter', 'https://www.w3schools.com/howto/howto_css_table_responsive.asp', 'fa fa-twitter', 1, 1, '2020-12-31 21:18:03', '2020-12-31 21:18:25');
INSERT INTO social_medias (id, name, link, icon, active_status, status, created_at, updated_at) VALUES(2, 'linkedin', 'https://dev.6amtech.com/', 'fa fa-linkedin', 1, 1, '2021-02-27 16:23:01', '2021-02-27 16:23:05');
INSERT INTO social_medias (id, name, link, icon, active_status, status, created_at, updated_at) VALUES(3, 'google-plus', 'https://dev.6amtech.com/', 'fa fa-google-plus-square', 1, 1, '2021-02-27 16:23:30', '2021-02-27 16:23:33');
INSERT INTO social_medias (id, name, link, icon, active_status, status, created_at, updated_at) VALUES(4, 'pinterest', 'https://dev.6amtech.com/', 'fa fa-pinterest', 1, 1, '2021-02-27 16:24:14', '2021-02-27 16:24:26');
INSERT INTO social_medias (id, name, link, icon, active_status, status, created_at, updated_at) VALUES(5, 'instagram', 'https://dev.6amtech.com/', 'fa fa-instagram', 1, 1, '2021-02-27 16:24:36', '2021-02-27 16:24:41');
INSERT INTO social_medias (id, name, link, icon, active_status, status, created_at, updated_at) VALUES(6, 'facebook', 'https://facebook.com', 'fa fa-facebook', 1, 1, '2021-02-27 19:19:42', '2021-11-26 08:37:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng soft_credentials
--

CREATE TABLE soft_credentials (
  id bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  value longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng support_tickets
--

CREATE TABLE support_tickets (
  id bigint(20) UNSIGNED NOT NULL,
  customer_id bigint(20) DEFAULT NULL,
  subject varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  type varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  priority varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'low',
  description varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  reply varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  status varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng support_ticket_convs
--

CREATE TABLE support_ticket_convs (
  id bigint(20) UNSIGNED NOT NULL,
  support_ticket_id bigint(20) DEFAULT NULL,
  admin_id bigint(20) DEFAULT NULL,
  customer_message varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  admin_message varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  position int(11) NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng transactions
--

CREATE TABLE transactions (
  id varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  order_id bigint(20) DEFAULT NULL,
  payment_for varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  payer_id bigint(20) DEFAULT NULL,
  payment_receiver_id bigint(20) DEFAULT NULL,
  paid_by varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  paid_to varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  payment_method varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  payment_status varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'success',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng translations
--

CREATE TABLE translations (
  id bigint(20) NOT NULL,
  translationable_type varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  translationable_id bigint(20) UNSIGNED NOT NULL,
  locale varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  value text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng translations
--

INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 96, 'af', 'name', 'Home decorators collection boswell quarter 14 in.');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 96, 'af', 'description', '<p>A fun and fresh 3-Light pendant inspired by nautical accents. The open frame is popular in a variety of today&#39;s home designs and is finished in Brushed Nickel. Pendants can be used in lieu of chandeliers for creative design schemes, displayed individually or paired in groupings over kitchen islands, dining room tables and in foyers. Brushed nickel finish No shade 14 in. Dia x 20 in. H Uses (3) 100-Watt medium base bulbs (not included) 60 in. of chain included Painted weathered gray wood accents Suitable for dry locations only</p>\r\n\r\n<h1>Technical Details</h1>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand</th>\r\n			<td>HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Manufacturer</th>\r\n			<td>HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>1 pounds</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Package Dimensions</th>\r\n			<td>17 x 16.8 x 12.8 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Is Discontinued By Manufacturer</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Style</th>\r\n			<td>Rustic</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Material</th>\r\n			<td>Wood, Nickel</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Finish Types</th>\r\n			<td>Brushed</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number of Lights</th>\r\n			<td>3</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Voltage</th>\r\n			<td>10 Volts</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Shade Color</th>\r\n			<td>Gray</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries Included?</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries Required?</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Wattage</th>\r\n			<td>100 watts</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 96, 'vi', 'name', 'Đèn trần trang trí nhà');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 96, 'vi', 'description', '<p>A fun and fresh 3-Light pendant inspired by nautical accents. The open frame is popular in a variety of today&#39;s home designs and is finished in Brushed Nickel. Pendants can be used in lieu of chandeliers for creative design schemes, displayed individually or paired in groupings over kitchen islands, dining room tables and in foyers. Brushed nickel finish No shade 14 in. Dia x 20 in. H Uses (3) 100-Watt medium base bulbs (not included) 60 in. of chain included Painted weathered gray wood accents Suitable for dry locations only</p>\r\n\r\n<h1>Technical Details</h1>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand</th>\r\n			<td>HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Manufacturer</th>\r\n			<td>HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item Weight</th>\r\n			<td>1 pounds</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Package Dimensions</th>\r\n			<td>17 x 16.8 x 12.8 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Is Discontinued By Manufacturer</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Style</th>\r\n			<td>Rustic</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Material</th>\r\n			<td>Wood, Nickel</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Finish Types</th>\r\n			<td>Brushed</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Number of Lights</th>\r\n			<td>3</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Voltage</th>\r\n			<td>10 Volts</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Shade Color</th>\r\n			<td>Gray</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries Included?</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Batteries Required?</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Wattage</th>\r\n			<td>100 watts</td>\r\n		</tr>\r\n	</tbody>\r\n</table>');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Category', 11, 'vi', 'name', 'Thời trang nữ');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Category', 10, 'vi', 'name', 'Thời trang nam');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Category', 9, 'vi', 'name', 'Điện thoại');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Category', 8, 'vi', 'name', 'Máy tính');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 83, 'vn', 'name', 'Áo dài tay dài nhẹ bằng lông cừu Pháp có khóa kéo');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 83, 'vn', 'description', '<p>60% cotton, 40% polyester</p>\r\n\r\n<ul>\r\n	<li>Đ&atilde; nhập</li>\r\n	<li>Đ&oacute;ng kh&oacute;a k&eacute;o</li>\r\n	<li>M&aacute;y giặt</li>\r\n	<li>Chiếc &aacute;o d&agrave;i c&oacute; kh&oacute;a k&eacute;o 1/4 n&agrave;y bằng l&ocirc;ng cừu Ph&aacute;p cực kỳ mềm mại v&agrave; thoải m&aacute;i l&agrave; lựa chọn ph&ugrave; hợp để c&oacute; một vẻ ngo&agrave;i dễ d&agrave;ng, giản dị</li>\r\n	<li>C&oacute; tay &aacute;o d&agrave;i, t&uacute;i kangaroo ph&iacute;a trước c&oacute; v&aacute;, cổ &aacute;o cao v&agrave; đường viền ở cổ, cổ tay &aacute;o v&agrave; viền &aacute;o</li>\r\n	<li>Mỗi ng&agrave;y một tốt hơn: ch&uacute;ng t&ocirc;i lắng nghe phản hồi của kh&aacute;ch h&agrave;ng v&agrave; tinh chỉnh từng chi tiết để đảm bảo chất lượng, sự vừa vặn v&agrave; thoải m&aacute;i</li>\r\n</ul>\r\n\r\n<h2>Chi tiết sản phẩm</h2>\r\n\r\n<ul>\r\n	<li>K&iacute;ch thước g&oacute;i h&agrave;ng: &amp; nbsp; 12,44 x 11,89 x 1,89 inch; 10,58 Ounce</li>\r\n	<li>Số kiểu mặt h&agrave;ng: &amp; nbsp; AE18111988</li>\r\n	<li>Bộ phận: &amp; nbsp; Phụ nữ</li>\r\n	<li>Ng&agrave;y c&oacute; sẵn lần đầu ti&ecirc;n: &amp; nbsp; ng&agrave;y 6 th&aacute;ng 2 năm 2020</li>\r\n	<li>Nh&agrave; sản xuất: &amp; nbsp; Amazon Essentials</li>\r\n	<li>ASIN: &amp; nbsp; B07W6NPBVV</li>\r\n</ul>');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 83, 'zh', 'name', 'Women\'s long-sleeve lightweight french terry fleece quarter-zip top');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 83, 'zh', 'description', '<p>60% Cotton, 40% Polyester</p>\r\n\r\n<ul>\r\n	<li>Imported</li>\r\n	<li>Zipper closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>This quarter-zip up top in incredibly soft and comfortable French terry fleece is a go-to for an easy, casual look</li>\r\n	<li>Features long-sleeves, patch front kangaroo pocket, high collar, and ribbing at the neck, cuffs and hem</li>\r\n	<li>Everyday made better: we listen to customer feedback and fine-tune every detail to ensure quality, fit, and comfort</li>\r\n</ul>\r\n\r\n<h2>Product details</h2>\r\n\r\n<ul>\r\n	<li>Package Dimensions :&nbsp;12.44 x 11.89 x 1.89 inches; 10.58 Ounces</li>\r\n	<li>Item model number :&nbsp;AE18111988</li>\r\n	<li>Department :&nbsp;Womens</li>\r\n	<li>Date First Available :&nbsp;February 6, 2020</li>\r\n	<li>Manufacturer :&nbsp;Amazon Essentials</li>\r\n	<li>ASIN :&nbsp;B07W6NPBVV</li>\r\n</ul>');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 83, 'af', 'name', 'Women\'s long-sleeve lightweight french terry fleece quarter-zip top');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Product', 83, 'af', 'description', '<p>60% Cotton, 40% Polyester</p>\r\n\r\n<ul>\r\n	<li>Imported</li>\r\n	<li>Zipper closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>This quarter-zip up top in incredibly soft and comfortable French terry fleece is a go-to for an easy, casual look</li>\r\n	<li>Features long-sleeves, patch front kangaroo pocket, high collar, and ribbing at the neck, cuffs and hem</li>\r\n	<li>Everyday made better: we listen to customer feedback and fine-tune every detail to ensure quality, fit, and comfort</li>\r\n</ul>\r\n\r\n<h2>Product details</h2>\r\n\r\n<ul>\r\n	<li>Package Dimensions :&nbsp;12.44 x 11.89 x 1.89 inches; 10.58 Ounces</li>\r\n	<li>Item model number :&nbsp;AE18111988</li>\r\n	<li>Department :&nbsp;Womens</li>\r\n	<li>Date First Available :&nbsp;February 6, 2020</li>\r\n	<li>Manufacturer :&nbsp;Amazon Essentials</li>\r\n	<li>ASIN :&nbsp;B07W6NPBVV</li>\r\n</ul>');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Category', 1, 'vn', 'name', 'Làm đẹp, sức khỏe');
INSERT INTO translations (id, translationable_type, translationable_id, locale, `key`, value) VALUES(0, 'App\\Model\\Category', 1, 'zh', 'name', '美容、健康与头发');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng users
--

CREATE TABLE users (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  f_name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  l_name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  phone varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  image varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  email varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  street_address varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  country varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  city varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  zip varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  house_no varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  apartment_no varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cm_firebase_token varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  is_active tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng users
--

INSERT INTO users (id, name, f_name, l_name, phone, image, email, email_verified_at, password, remember_token, created_at, updated_at, street_address, country, city, zip, house_no, apartment_no, cm_firebase_token, is_active) VALUES(1, NULL, 'Tuấn', 'Hà', '091446525', 'def.png', 'hatuan@gmail.com', NULL, '$2y$10$Fxe.LOHOz4siTv1pRxLz.uhQ5xfHljoarom01ySktLp3mqqGzdTQy', 'IlgxqoyJPh4YlistnnN0acU6BiGez7fhc64LdnuE0NmYtHj8rczCl3fS0PQY', NULL, '2021-11-27 07:08:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO users (id, name, f_name, l_name, phone, image, email, email_verified_at, password, remember_token, created_at, updated_at, street_address, country, city, zip, house_no, apartment_no, cm_firebase_token, is_active) VALUES(2, NULL, 'Việt', 'Lê', '0911445595', 'def.png', 'lhviet1502@gmail.com', NULL, '$2y$10$AgW.JvCOIQ.SSdoPE3hkz.KLAPec96Zg.dXzRVfVf54vhRvaOtPJO', 'sObRlUMkA0EOwiSLrOyx5ZaUNU6dna0kUr8S9cdWtBHfPdsArBtnLW3WgFIG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng wishlists
--

CREATE TABLE wishlists (
  id bigint(20) UNSIGNED NOT NULL,
  customer_id bigint(20) NOT NULL,
  product_id bigint(20) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng wishlists
--

INSERT INTO wishlists (id, customer_id, product_id, created_at, updated_at) VALUES(1, 1, 88, '2021-11-26 08:45:20', '2021-11-26 08:45:20');
INSERT INTO wishlists (id, customer_id, product_id, created_at, updated_at) VALUES(2, 1, 87, '2021-11-26 08:45:37', '2021-11-26 08:45:37');
INSERT INTO wishlists (id, customer_id, product_id, created_at, updated_at) VALUES(3, 2, 91, '2021-11-27 07:53:18', '2021-11-27 07:53:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng withdraw_requests
--

CREATE TABLE withdraw_requests (
  id bigint(20) UNSIGNED NOT NULL,
  seller_id bigint(20) DEFAULT NULL,
  admin_id bigint(20) DEFAULT NULL,
  amount varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  transaction_note varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  approved tinyint(1) NOT NULL DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng admins
--
ALTER TABLE admins
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY admins_email_unique (email);

--
-- Chỉ mục cho bảng admin_roles
--
ALTER TABLE admin_roles
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng admin_wallets
--
ALTER TABLE admin_wallets
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng admin_wallet_histories
--
ALTER TABLE admin_wallet_histories
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng attributes
--
ALTER TABLE attributes
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng banners
--
ALTER TABLE banners
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng brands
--
ALTER TABLE brands
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng business_settings
--
ALTER TABLE business_settings
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng categories
--
ALTER TABLE categories
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng chattings
--
ALTER TABLE chattings
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng colors
--
ALTER TABLE colors
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng contacts
--
ALTER TABLE contacts
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng coupons
--
ALTER TABLE coupons
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng currencies
--
ALTER TABLE currencies
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng customer_wallets
--
ALTER TABLE customer_wallets
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng customer_wallet_histories
--
ALTER TABLE customer_wallet_histories
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng deal_of_the_days
--
ALTER TABLE deal_of_the_days
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng failed_jobs
--
ALTER TABLE failed_jobs
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng feature_deals
--
ALTER TABLE feature_deals
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng flash_deals
--
ALTER TABLE flash_deals
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng flash_deal_products
--
ALTER TABLE flash_deal_products
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng help_topics
--
ALTER TABLE help_topics
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng languages
--
ALTER TABLE languages
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng migrations
--
ALTER TABLE migrations
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng notifications
--
ALTER TABLE notifications
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng oauth_access_tokens
--
ALTER TABLE oauth_access_tokens
  ADD PRIMARY KEY (id),
  ADD KEY oauth_access_tokens_user_id_index (user_id);

--
-- Chỉ mục cho bảng oauth_auth_codes
--
ALTER TABLE oauth_auth_codes
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng oauth_clients
--
ALTER TABLE oauth_clients
  ADD PRIMARY KEY (id),
  ADD KEY oauth_clients_user_id_index (user_id);

--
-- Chỉ mục cho bảng oauth_personal_access_clients
--
ALTER TABLE oauth_personal_access_clients
  ADD PRIMARY KEY (id),
  ADD KEY oauth_personal_access_clients_client_id_index (client_id);

--
-- Chỉ mục cho bảng oauth_refresh_tokens
--
ALTER TABLE oauth_refresh_tokens
  ADD PRIMARY KEY (id),
  ADD KEY oauth_refresh_tokens_access_token_id_index (access_token_id);

--
-- Chỉ mục cho bảng orders
--
ALTER TABLE orders
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng order_details
--
ALTER TABLE order_details
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng password_resets
--
ALTER TABLE password_resets
  ADD KEY password_resets_email_index (email);

--
-- Chỉ mục cho bảng products
--
ALTER TABLE products
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng product_stocks
--
ALTER TABLE product_stocks
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng reviews
--
ALTER TABLE reviews
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng search_functions
--
ALTER TABLE search_functions
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng sellers
--
ALTER TABLE sellers
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY sellers_email_unique (email);

--
-- Chỉ mục cho bảng seller_wallets
--
ALTER TABLE seller_wallets
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng seller_wallet_histories
--
ALTER TABLE seller_wallet_histories
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng shipping_addresses
--
ALTER TABLE shipping_addresses
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng shipping_methods
--
ALTER TABLE shipping_methods
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng shops
--
ALTER TABLE shops
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng social_medias
--
ALTER TABLE social_medias
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng soft_credentials
--
ALTER TABLE soft_credentials
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng support_tickets
--
ALTER TABLE support_tickets
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng support_ticket_convs
--
ALTER TABLE support_ticket_convs
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng transactions
--
ALTER TABLE transactions
  ADD UNIQUE KEY transactions_id_unique (id);

--
-- Chỉ mục cho bảng translations
--
ALTER TABLE translations
  ADD KEY translations_translationable_id_index (translationable_id),
  ADD KEY translations_locale_index (locale);

--
-- Chỉ mục cho bảng users
--
ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY users_email_unique (email);

--
-- Chỉ mục cho bảng wishlists
--
ALTER TABLE wishlists
  ADD PRIMARY KEY (id);

--
-- Chỉ mục cho bảng withdraw_requests
--
ALTER TABLE withdraw_requests
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng admins
--
ALTER TABLE admins
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng admin_roles
--
ALTER TABLE admin_roles
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng admin_wallets
--
ALTER TABLE admin_wallets
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng admin_wallet_histories
--
ALTER TABLE admin_wallet_histories
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng attributes
--
ALTER TABLE attributes
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng banners
--
ALTER TABLE banners
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng brands
--
ALTER TABLE brands
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng business_settings
--
ALTER TABLE business_settings
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng categories
--
ALTER TABLE categories
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng chattings
--
ALTER TABLE chattings
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng colors
--
ALTER TABLE colors
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT cho bảng contacts
--
ALTER TABLE contacts
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng coupons
--
ALTER TABLE coupons
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng currencies
--
ALTER TABLE currencies
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng customer_wallets
--
ALTER TABLE customer_wallets
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng customer_wallet_histories
--
ALTER TABLE customer_wallet_histories
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng deal_of_the_days
--
ALTER TABLE deal_of_the_days
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng failed_jobs
--
ALTER TABLE failed_jobs
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng feature_deals
--
ALTER TABLE feature_deals
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng flash_deals
--
ALTER TABLE flash_deals
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng flash_deal_products
--
ALTER TABLE flash_deal_products
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng help_topics
--
ALTER TABLE help_topics
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng languages
--
ALTER TABLE languages
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng migrations
--
ALTER TABLE migrations
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng notifications
--
ALTER TABLE notifications
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng oauth_clients
--
ALTER TABLE oauth_clients
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng oauth_personal_access_clients
--
ALTER TABLE oauth_personal_access_clients
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng orders
--
ALTER TABLE orders
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100003;

--
-- AUTO_INCREMENT cho bảng order_details
--
ALTER TABLE order_details
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng products
--
ALTER TABLE products
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng product_stocks
--
ALTER TABLE product_stocks
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng reviews
--
ALTER TABLE reviews
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng search_functions
--
ALTER TABLE search_functions
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng sellers
--
ALTER TABLE sellers
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng seller_wallets
--
ALTER TABLE seller_wallets
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng seller_wallet_histories
--
ALTER TABLE seller_wallet_histories
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng shipping_addresses
--
ALTER TABLE shipping_addresses
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng shipping_methods
--
ALTER TABLE shipping_methods
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng shops
--
ALTER TABLE shops
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng social_medias
--
ALTER TABLE social_medias
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng soft_credentials
--
ALTER TABLE soft_credentials
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng support_tickets
--
ALTER TABLE support_tickets
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng support_ticket_convs
--
ALTER TABLE support_ticket_convs
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng users
--
ALTER TABLE users
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng wishlists
--
ALTER TABLE wishlists
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng withdraw_requests
--
ALTER TABLE withdraw_requests
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
