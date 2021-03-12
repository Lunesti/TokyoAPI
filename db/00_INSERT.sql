BEGIN;


INSERT INTO `location` (`id`, `location_name`, `latitude`, `longitude`, `title`, `content`, `cover_img`, `creation_date`) VALUES
(99, 'Shibuya', '35.6645956', '139.6987107', 'Quartier de Shibuya', 'Contenu', 'http://localhost/Tokyo/TokyoAPI/Public/img/Shibuya/shibuya.jpg', '2021-02-10 14:58:55'),
(100, 'Nakano', '35.7181230', '139.6644680', 'Quartier de Nakano', '<p>ContenuT</p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/Nakano/nakano.jpg', '2021-02-11 09:04:38'),
(101, 'Yoyogi Koen', '35.6839519', '139.7020805', 'Parc de Yoyogi', '<p style=\"text-align: center;\">Le<strong> parc Yoyogi</strong> est l\'un des plus grands parcs de Tokyo. C\'est un espace &agrave; la fois de d&eacute;tente mais aussi d&eacute;di&eacute;s aux artistes: en effet pas mal de monde y viennent pour pratiquer leur sports (yoga, sport de combat, etc) de la danse ou encore du th&eacute;atre. Mais yoyogi ne s\'arr&ecirc;te pas l&agrave;, en effet durant les saisons les plus admirables du japon apparaissent les hanami (fleur de sakuras) qui envahissent le parc et qui rassemble beaucoup de monde chaque ann&eacute;e dont beaucoup de touristes.&nbsp;</p>\r\n<p style=\"text-align: center;\">Yoyogi est accessible depuis la station Harajuku Station, cette station est uniquement desservie par la ligne Yamnote. Vous pouvez y acc&eacute;der &eacute;galement en descendant &agrave; l\'arr&ecirc;t Meiji-jingumae Station desservie par la ligne Chiyoda Line.</p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/Yoyogi/yoyogi-min.jpg', '2021-02-11 09:38:00'),
(102, 'Shinjuku', '35.6937632', '139.7036319', 'Quartier de Shinjuku', 'Contenu', 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku/shinjuku.jpg', '2021-02-11 14:29:15'),
(103, 'Golden gai', '35.6939025', '139.7046489', 'Golden gai', 'Contenu de golden gai', 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku_golden_gai/goldengai.jpg', '2021-02-11 14:43:50'),
(119, 'Sanctuaire Meiji-jingū', '35.6748417', '139.6996266', 'Sanctuaire Meiji-jingū', '<p style=\"text-align: center;\">Le Meiji-jingū (明治神宮) ou sanctuaire Meiji, est un sanctuaire shinto&iuml;ste situ&eacute; en plein c&oelig;ur de Tokyo, dans l\'arrondissement de Shibuya, en bordure du quartier Harajuku. Accessible depuis la station meiji-jingu-mae, situ&eacute; en face de la rue Omotesando, vous pourrez y contempler son grand jardin (entr&eacute;e payante mais peu cher), sa grande for&ecirc;t et quelques c&eacute;r&eacute;monies organis&eacute;s par les locaux. A c&ocirc;t&eacute; de l\'entr&eacute;e principale du sanctuaire vous pouvez vous diriger vers le parc Yoyogi.</p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/meiji-jingu/jardin-meiji-jingu.jpg', '2021-02-12 09:22:09'),
(122, 'Parc de shinjuku', '35.6919780', '139.7260834', 'Parc de Shinjuku', 'Contenu de shinjuku koen', 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku_Koen/parc.jpg', '2021-02-12 13:24:48'),
(123, 'Ueno', '35.7117950', '139.7760755', 'Parc de Ueno', '<p>ContenuT</p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/Ueno/ueno.jpg', '2021-02-12 13:33:54'),
(124, 'Odaiba', '35.6267220', '139.7721007', 'Quartier de Odaiba', '<p>Contenu de odaiba</p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/Odaiba/odaiba-vue.jpg', '2021-02-12 14:00:58'),
(125, 'Asakusa', '35.7108423', '139.7978163', 'Quartier de Asakusa', '<p>ContenuI</p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/Asakusa/asakusa.jpg', '2021-02-12 14:12:31'),
(126, 'Akihabara', '35.6983609', '139.7731217', 'Quartier de Akihabara', '<p style=\"text-align: center;\"><span style=\"box-sizing: border-box; font-family: Verdana, Geneva, sans-serif; font-size: 15px; background-color: #ffffff;\"><strong style=\"box-sizing: border-box;\">Akihabara&nbsp;(秋葉原)</strong>&nbsp;est le quartier Otaku de Tokyo. Si vous adorez la culture Manga, Anime et les jeux vid&eacute;o, ce quartier sera un paradis pour vous avec ses nombreux Game Centers, boutiques de figurin</span><span style=\"color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px; background-color: #ffffff;\">es et gaming. C&rsquo;est un endroit tr&egrave;s anim&eacute; et d&eacute;cal&eacute;, vous pourrez y faire des exp&eacute;riences assez originales !</span></p>\r\n<p style=\"text-align: center;\"><span style=\"color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px; background-color: #ffffff;\">Difficile de passer &agrave; c&ocirc;t&eacute; du grand centre commercial Yodobashi, une boutique &eacute;lectronique qui serait la deuxi&egrave;me boutique du genre la plus grande du japon. Vous y trouverez principalement que du high tech , prevoyez une bonne heure minimum car le voyage en vaut le d&eacute;tour.</span></p>\r\n<p style=\"text-align: center;\"><span style=\"color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px; background-color: #ffffff;\">&agrave; Akihabara, vous croiserez tr&egrave;s certainement des \"Maid caf&eacute;s\" , o&ugrave; des jeunes filles habill&eacute;s en servante bordant le trottoir de Akihabara viendront vous proposer de venir dans leur caf&eacute;s. Je n\'y suis jamais entr&eacute; pour ma part, j\'aimerais tenter la petite exp&eacute;rience lors de mon prochain voyage .</span></p>\r\n<p style=\"text-align: center;\"><span style=\"color: #222222; font-family: Verdana, Geneva, sans-serif; font-size: 15px; background-color: #ffffff;\">Pour aller &agrave; Akihabara en transport , plusieurs m&eacute;tros desservent Akihabara, je vous citerai ici par exemple la ligne Yamanote ou encore Hibiya line...</span></p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/Akihabara/akihabara.jpg', '2021-02-12 18:49:08'),
(127, 'Haneda', '35.5479444', '139.7466458', 'Quartier de Haneda', 'Contenu Nouveau', 'http://localhost/Tokyo/TokyoAPI/Public/img/Haneda/haneda.jpg', '2021-02-12 18:59:45'),
(128, 'Ginza', '35.6709101', '139.7660214', 'Quartier de Ginza', 'Contenu', 'http://localhost/Tokyo/TokyoAPI/Public/img/Ginza/ginza.jpg', '2021-02-12 19:03:12'),
(129, 'Ikebukuro', '35.7310839', '139.7089164', 'Quartier de Ikebukuro', 'Contenu', 'http://localhost/Tokyo/TokyoAPI/Public/img/Ikebukuro/ikebukuro-street.jpg', '2021-02-12 19:07:33'),
(130, 'Omotesando', '35.6651701', '139.7124352', 'Quartier de omotesando', '<p style=\"text-align: center;\"><strong>Omotesando</strong> est une avenue surnomm&eacute; les \"Champs Elys&eacute;es\" de Tokyo o&ugrave; on y trouve des caf&eacute;s et restaurants, mais aussi et surtout de grandes marques de renomm&eacute;es mondial comme Chanel, Louis Vuitton, Dior, Gucci...&nbsp;</p>\r\n<p style=\"text-align: center;\">Tout en haut de la rue omotesando se trouve le santcuaire Meiji-jingu dont j\'y ai consacr&eacute; un article sur mon blog. Omotesando est accessible en prenant la ligne Chiyoda Line et en vous arr&ecirc;tant &agrave; la station Omotesando, ou bien &agrave; la station Meiji-jingumae Station.</p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/Omotesando/omotesando.jpg', '2021-02-12 19:11:26'),
(131, 'Harajuku', '35.6704869', '139.7027163', 'Quartier de Harajuku', '<p style=\"text-align: center;\">Harajuku est un lieu tr&egrave;s fr&eacute;quent&eacute; par les jeunes, et la rue takeshita est tr&egrave;s souvent rempli de monde. On y trouve principalement des jeunes tokyoites avec des styles vestimentaires d&eacute;cal&eacute;s, costum&eacute;s selon diff&eacute;rentes modes un peu fantasques. On y trouve &eacute;galement des caf&eacute;s et des restaurants &agrave; l\'ambiance tr&egrave;s \"kawaii\" que vous ne trouverez s&ucirc;rement nulle part ailleurs. Tout y est color&eacute; (l\'environnement , et m&ecirc;me votre assiette ! ) cela en vaut la peine d\'essayer .</p>\r\n<p style=\"text-align: center;\">Derri&egrave;re cette ambiance \"jeune\" d\'autres lieux sont int&eacute;ressant &agrave; visiter notamment le centre commercial Tokyu Plaza, o&ugrave; son int&ecirc;ret particulier r&eacute;side au dernier &eacute;tage du batiment o$ l\'on peut y trouver un Starbucks en terrasse qui offre une superbe vue du quartier.</p>\r\n<p>L\'acc&egrave;s en transport est Harajuku Station, desservie par la ligne Yamanote uniquement. Vous pouvez &eacute;galementy acc&eacute;der depuis la station Meiji-Jingumae Station, desservie par la ligne Chiyoda Line.</p>\r\n<p>&nbsp;</p>', 'http://localhost/Tokyo/TokyoAPI/Public/img/harajuku/harajuku.jpg', '2021-03-08 08:30:57');






INSERT INTO `location_urls` (`location_id`, `location_url`) VALUES
(99, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shibuya/hachiko.jpg'),
(99, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shibuya/shibuya.jpg'),
(100, 'http://localhost/Tokyo/TokyoAPI/Public/img/Nakano/nakano.jpg'),
(101, 'http://localhost/Tokyo/TokyoAPI/Public/img/Yoyogi/yoyogi-min.jpg'),
(101, 'http://localhost/Tokyo/TokyoAPI/Public/img/Yoyogi/yoyogi-tri.jpg'),
(101, 'http://localhost/Tokyo/TokyoAPI/Public/img/Yoyogi/yoyogi_fontaine_min.jpg'),
(102, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku/shinjuku-building-min.jpg'),
(102, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku/shinjuku-street.jpg'),
(102, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku/shinjuku.jpg'),
(103, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku_golden_gai/golden-gai.jpg'),
(103, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku_golden_gai/golden-gai2.jpg'),
(119, 'http://localhost/Tokyo/TokyoAPI/Public/img/meiji-jingu/jardin2.jpg'),
(119, 'http://localhost/Tokyo/TokyoAPI/Public/img/meiji-jingu/meiji-jingu.jpg'),
(122, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku_Koen/parc.jpg'),
(122, 'http://localhost/Tokyo/TokyoAPI/Public/img/Shinjuku_Koen/parc_herbe.jpg'),
(123, 'http://localhost/Tokyo/TokyoAPI/Public/img/Ueno/ueno-park.jpg'),
(123, 'http://localhost/Tokyo/TokyoAPI/Public/img/Ueno/ueno-park2.jpg'),
(123, 'http://localhost/Tokyo/TokyoAPI/Public/img/Ueno/Ueno.jpg'),
(124, 'http://localhost/Tokyo/TokyoAPI/Public/img/Odaiba/odaiba-robot.jpg'),
(124, 'http://localhost/Tokyo/TokyoAPI/Public/img/Odaiba/odaiba-vue.jpg'),
(124, 'http://localhost/Tokyo/TokyoAPI/Public/img/Odaiba/odaiba.jpg'),
(124, 'http://localhost/Tokyo/TokyoAPI/Public/img/Odaiba/rainbow-bridge.jpg'),
(125, 'http://localhost/Tokyo/TokyoAPI/Public/img/Asakusa/asakusa-city.jpg'),
(125, 'http://localhost/Tokyo/TokyoAPI/Public/img/Asakusa/asakusa.jpg'),
(125, 'http://localhost/Tokyo/TokyoAPI/Public/img/Asakusa/rue-marchande.jpg'),
(126, 'http://localhost/Tokyo/TokyoAPI/Public/img/Akihabara/akihabara.jpg'),
(127, 'http://localhost/Tokyo/TokyoAPI/Public/img/Haneda/haneda-airport.jpg'),
(127, 'http://localhost/Tokyo/TokyoAPI/Public/img/Haneda/haneda-indoor.jpg'),
(127, 'http://localhost/Tokyo/TokyoAPI/Public/img/Haneda/haneda.jpg'),
(128, 'http://localhost/Tokyo/TokyoAPI/Public/img/Ginza/ginza.jpg'),
(129, 'http://localhost/Tokyo/TokyoAPI/Public/img/Ikebukuro/ikebukuro-street.jpg'),
(129, 'http://localhost/Tokyo/TokyoAPI/Public/img/Ikebukuro/ikebukuro.jpg'),
(130, 'http://localhost/Tokyo/TokyoAPI/Public/img/Omotesando/omotesando.jpg'),
(131, 'http://localhost/Tokyo/TokyoAPI/Public/img/harajuku/harajuku.jpg');




INSERT INTO `member` (`id`, `pseudo`, `user_role`, `pass`, `email`, `inscription_date`) VALUES
(6, 'Arben', 'admin', '$2y$10$FGwazhxE1.R1SJMgUwaMB.ctelKL0BC8grY.LrYRh7.KrbjWuOlZq', 'arben.peposi@outlook.fr', '2021-01-13'),
(11, 'user', 'user', '$2y$10$twD3MHzmcR5rphmcaVP7OeyN7vz.rVpLXLKmJZrgktuLL.TbL.CWm', 'user02@hotmail.fr', '2021-03-05');





INSERT INTO `comment` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(8, 125, 'arben', 'Hello', '2021-02-13 13:48:50'),
(9, 102, 'arben', ' Test', '2021-02-13 13:49:41'),
(11, 125, 'arben', ' Salut', '2021-02-14 09:53:03'),
(12, 125, 'arben', ' Génial ce site !', '2021-02-14 09:53:11'),
(13, 125, 'arben', ' Trop  fooorrtt', '2021-02-14 09:53:19'),
(14, 125, 'arben', ' Ohayô gozaimasu !', '2021-02-14 09:53:30'),
(15, 125, 'arben', ' Qu\'est ce que t\'en dit hein ?', '2021-02-14 09:53:44'),
(16, 123, 'arben', ' Hey !', '2021-02-22 09:01:18'),
(17, 123, 'arben', ' aaa', '2021-02-22 09:26:44'),
(18, 123, 'arben', ' bbb', '2021-02-22 09:26:48'),
(19, 123, 'arben', ' ccc', '2021-02-22 09:26:52'),
(20, 123, 'arben', ' ddd', '2021-02-22 09:26:55'),
(21, 123, 'arben', ' eee', '2021-02-22 09:27:00'),
(22, 123, 'arben', ' fff', '2021-02-22 09:27:05'),
(23, 123, 'arben', ' ggg', '2021-02-22 09:27:09'),
(24, 123, 'arben', ' hhh', '2021-02-22 09:27:14'),
(25, 123, 'arben', ' iii', '2021-02-22 09:27:19'),
(26, 123, 'arben', ' jjj', '2021-02-22 09:27:33'),
(27, 123, 'arben', ' kkk', '2021-02-22 09:27:37'),
(28, 123, 'arben', ' lll', '2021-02-22 09:27:42'),
(29, 123, 'arben', ' mmm', '2021-02-22 09:27:46'),
(30, 123, 'arben', ' nnn', '2021-02-22 09:27:51'),
(31, 123, 'arben', ' ooo', '2021-02-22 09:27:55'),
(32, 123, 'arben', ' ppp', '2021-02-22 09:27:59'),
(33, 123, 'arben', ' qqq', '2021-02-22 09:28:04'),
(34, 123, 'arben', ' rrr', '2021-02-22 09:28:07'),
(35, 123, 'arben', ' sss', '2021-02-22 09:28:10'),
(36, 123, 'arben', ' Hey !', '2021-02-22 10:23:16'),
(37, 123, 'arben', ' Test', '2021-02-26 09:44:33'),
(39, 130, 'arben', ' Bonjour', '2021-02-26 10:12:58'),
(40, 122, 'arben', ' Test', '2021-02-26 10:13:09'),
(41, 128, 'arben', ' Test', '2021-03-05 08:57:14'),
(42, 119, 'user', ' Hello', '2021-03-05 09:53:16'),
(43, 100, 'arben', ' Hey !', '2021-03-07 09:26:51'),
(44, 126, 'arben', ' Akihabara', '2021-03-08 12:59:56'),
(45, 123, 'arben', ' Coucou', '2021-03-10 10:48:01'),
(46, 100, 'arben', ' Yo !', '2021-03-10 10:48:58'),
(47, 131, 'arben', ' Hey !', '2021-03-11 11:08:41'),
(48, 130, 'arben', ' Hey', '2021-03-11 20:04:32');


COMMIT;