DROP TABLE IF EXISTS auto_post;

CREATE TABLE `auto_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_use` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `active_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO auto_post VALUES("2","100006861829132","1539604973","1537012973","0","1");



DROP TABLE IF EXISTS bang_gia;

CREATE TABLE `bang_gia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dich_vu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_ngay` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO bang_gia VALUES("1","auto_post","1000");



DROP TABLE IF EXISTS ci_sessions;

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO ci_sessions VALUES("fd4d36ceo0r6epjngjfshmf566t02e2l","::1","1536822903","id_fb|s:15:\"100026128906929\";__ci_last_regenerate|i:1536822852;"),
("p85mvcpjnj4bnvi6kg8urpuatbh6h01c","::1","1536823418","__ci_last_regenerate|i:1536823282;id_fb|s:15:\"100026128906929\";"),
("1vt24m02uj8255v8669c9urj0ithpbsq","::1","1536823960","__ci_last_regenerate|i:1536823691;id_fb|s:15:\"100026128906929\";"),
("0kh7g52ot6napuf6hsug4v2kmm7vn9ve","::1","1536824267","__ci_last_regenerate|i:1536823994;id_fb|s:15:\"100026128906929\";"),
("obdi46ikbpm9v0vumlcru23bod9tk6r2","::1","1536824347","__ci_last_regenerate|i:1536824347;id_fb|s:15:\"100026128906929\";"),
("r0vi6q9bjbufeji9cv1vvfv5fg2k3o6h","::1","1536825126","__ci_last_regenerate|i:1536824836;id_fb|s:15:\"100026128906929\";"),
("5llld4kkb74crhp8o0j8o6h99aba2kvt","::1","1536825426","__ci_last_regenerate|i:1536825143;id_fb|s:15:\"100026128906929\";"),
("6k92kc4nh78tgtvgk6r45abbmtelrhd2","::1","1536825636","__ci_last_regenerate|i:1536825457;id_fb|s:15:\"100026128906929\";"),
("skiq2g4d1dkp7nl995ulsmkrfjoe811f","::1","1536825894","__ci_last_regenerate|i:1536825760;id_fb|s:15:\"100026128906929\";"),
("47hdpll5stknai6pm831nm0onoalq62f","::1","1536826377","__ci_last_regenerate|i:1536826084;id_fb|s:15:\"100026128906929\";"),
("hu78tf4cujc70v84sop5v6urk32q9ucu","::1","1536826530","__ci_last_regenerate|i:1536826392;id_fb|s:15:\"100026128906929\";"),
("qqossgg6u5q7dlsnrhpjultu68jts398","::1","1536826761","__ci_last_regenerate|i:1536826761;id_fb|s:15:\"100026128906929\";"),
("mo5g30cbvcgn8g4kmctbjasq9vaslrgr","::1","1536827404","__ci_last_regenerate|i:1536827115;id_fb|s:15:\"100026128906929\";"),
("qmq2rmsiijvfr7er46c45capd0gkf7tc","::1","1536827678","__ci_last_regenerate|i:1536827581;id_fb|s:15:\"100006861829132\";"),
("9t5bv3u660vdp6qh1307v29obndll1i6","::1","1537009448","__ci_last_regenerate|i:1537009179;id_fb|s:15:\"100006861829132\";"),
("ctvq1bbehmumek5eob5q5q5s970jk1ak","::1","1537010112","__ci_last_regenerate|i:1537009946;id_fb|s:15:\"100006861829132\";"),
("1340vp02fi8r37f2sa06l6544qreir5j","::1","1537010438","__ci_last_regenerate|i:1537010438;id_fb|s:15:\"100006861829132\";"),
("l2ajhibsebjkn237dqr5b9cgk1ogt8n4","::1","1537010946","__ci_last_regenerate|i:1537010946;id_fb|s:15:\"100006861829132\";"),
("evg238or3bf7qc6h5hp4fdd8lo55erjr","::1","1537011963","__ci_last_regenerate|i:1537011667;id_fb|s:15:\"100006861829132\";"),
("c6p99msgc1had8l2rj725o4ocsku52il","::1","1537012294","__ci_last_regenerate|i:1537012006;id_fb|s:15:\"100006861829132\";"),
("ckfelr30rfhh11bfm4oiukce7q5fknrv","::1","1537012465","__ci_last_regenerate|i:1537012319;id_fb|s:15:\"100006861829132\";"),
("iguokmbmum0nbkq9kndvebff9ia02uo4","::1","1537012989","__ci_last_regenerate|i:1537012859;id_fb|s:15:\"100006861829132\";"),
("ti413qg63nm1qaraoq17ai6stdohmgor","::1","1537276197","__ci_last_regenerate|i:1537276158;id_fb|s:15:\"100006861829132\";"),
("mtelt7af3g6vnuopergpt7oc63nda934","::1","1537276830","__ci_last_regenerate|i:1537276530;id_fb|s:15:\"100006861829132\";"),
("mduvgdjbgcbl0kr05e2emlark462a2v3","::1","1537277135","__ci_last_regenerate|i:1537276858;id_fb|s:15:\"100006861829132\";"),
("4vlhvkujbg8geprmqt3115mk0dpvkcl9","::1","1537277347","__ci_last_regenerate|i:1537277163;id_fb|s:15:\"100006861829132\";"),
("9fcei34oeogf1m9tv4dht7ll48bhmgo7","::1","1537277686","__ci_last_regenerate|i:1537277538;id_fb|s:15:\"100006861829132\";"),
("7ojv49drltlbo1fcb7qtb0eb7n03mcu3","::1","1537278178","__ci_last_regenerate|i:1537277916;id_fb|s:15:\"100006861829132\";"),
("nbf1ugnnlcbff5skv1upmkpi3p8kq8t8","::1","1537278694","__ci_last_regenerate|i:1537278395;id_fb|s:15:\"100006861829132\";"),
("dubgqg88jeeviae3jeulmn1rreuss1kp","::1","1537278993","__ci_last_regenerate|i:1537278724;id_fb|s:15:\"100006861829132\";"),
("k0k055bd18k1bg7hmlr3h6t6d3303lfu","::1","1537279320","__ci_last_regenerate|i:1537279043;id_fb|s:15:\"100006861829132\";"),
("02dnm9eir26vnb5170qqu3vp9vvh8h6h","::1","1537279500","__ci_last_regenerate|i:1537279346;id_fb|s:15:\"100006861829132\";"),
("0eko92q9l1mr13muga3ivk0gi50opjep","::1","1537280049","__ci_last_regenerate|i:1537279752;id_fb|s:15:\"100006861829132\";"),
("jds2ojbsto9p7sg9ro3iocs1tb2bkvdv","::1","1537280356","__ci_last_regenerate|i:1537280060;id_fb|s:15:\"100006861829132\";"),
("729fof1n7b5lka2ka0qtg4pjv3bcohef","::1","1537280473","__ci_last_regenerate|i:1537280366;id_fb|s:15:\"100006861829132\";");



DROP TABLE IF EXISTS members;

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_dtsg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `chatfuel_id` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `time_last_login` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO members VALUES("1","100006861829132","Trí Nguyễn","EAAAAUaZA8jlABANkKbBqeWnCjEGGOFylwwODBKSk0Mr7ZCrrwcBgK8RobaMfIsvqXQeZAF2wIpRZBvVIINZBw91tia83DEsZCNXHKZCrKZAXYJLZCdQQZB6hZC6eUIHm4C9cyQGshL5JJribzPERrc2unlnnB9vrkqJNoGrc3lHGZCL5fgZDZD","","","170000","0","1536753194","1537276189","1"),
("2","100026128906929","Bùi Khánh Vi","EAAAAUaZA8jlABAD730TkgcWequfxVpLiZCns5yXb2yeCHYVcuwPUKIZCq2atA5OQvF5UEJfA4c5CClmalSEKz0695c6ROohl2nTZBscqeRYBOm8E7LlkwwKvhXxN6kkWN6SFd9T5sTrkzXkzRpBWcGSkoRhDae8nKPEITb1QG3irW2X80dCgrDYcnwD4NbkZD","","","0","0","1536822442","1536823418","1");



