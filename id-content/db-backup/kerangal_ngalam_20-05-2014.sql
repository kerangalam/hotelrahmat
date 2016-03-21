DROP TABLE actions;

CREATE TABLE `actions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `modul` varchar(20) NOT NULL DEFAULT '',
  `posisi` int(1) NOT NULL DEFAULT '0',
  `order` int(3) NOT NULL DEFAULT '0',
  `modul_id` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `modul_id` (`modul_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE admin;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(60) NOT NULL DEFAULT '',
  `mod` int(1) NOT NULL DEFAULT '0',
  `ordering` int(2) NOT NULL,
  `parent` int(2) NOT NULL DEFAULT '0',
  `icon` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("5","Plugins","#","0","5","0","<span class=\"glyphicon glyphicon-random\"></span>");
INSERT INTO admin VALUES("8","Menu","menu","0","1","4","");
INSERT INTO admin VALUES("7","Halaman","halaman","0","1","1","");
INSERT INTO admin VALUES("6","Berita","berita","1","1","1","");
INSERT INTO admin VALUES("16","Widgets","widgets","0","1","4","");
INSERT INTO admin VALUES("9","Media Library","files","0","1","1","");
INSERT INTO admin VALUES("20","Download","download","1","1","5","");
INSERT INTO admin VALUES("21","Links","links","1","1","5","");
INSERT INTO admin VALUES("18","Kalender","kalender","1","1","5","");
INSERT INTO admin VALUES("17","Foto","foto","1","1","5","");
INSERT INTO admin VALUES("14","Users","users","0","1","3","");
INSERT INTO admin VALUES("3","Tools","#","0","4","0","<span class=\"glyphicon glyphicon-wrench\"></span>");
INSERT INTO admin VALUES("4","Tampilan","#","0","2","0","<span class=\"glyphicon glyphicon-align-justify\"></span>");
INSERT INTO admin VALUES("2","Pengaturan","#","0","3","0","<span class=\"glyphicon glyphicon-cog\"></span>");
INSERT INTO admin VALUES("15","Themes","themes","0","1","4","");
INSERT INTO admin VALUES("11","Editor Manager","admin_editor.php","0","1","2","");
INSERT INTO admin VALUES("12","Statistik","statistik","1","1","3","");
INSERT INTO admin VALUES("13","Action Widgets","actions","0","1","4","");
INSERT INTO admin VALUES("1","Posting","#","0","1","0","<span class=\"glyphicon glyphicon-edit\"></span>");
INSERT INTO admin VALUES("10","General","pengaturan","0","5","2","");
INSERT INTO admin VALUES("22","Database","database","0","2","3","");



DROP TABLE berita;

CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user` varchar(20) NOT NULL DEFAULT '',
  `judul` varchar(100) NOT NULL DEFAULT '',
  `kid` int(11) NOT NULL DEFAULT '0',
  `konten` text NOT NULL,
  `publikasi` int(1) NOT NULL DEFAULT '0',
  `tags` varchar(100) NOT NULL DEFAULT '',
  `gambar` text NOT NULL,
  `slug` varchar(100) NOT NULL DEFAULT '',
  `caption` varchar(100) NOT NULL DEFAULT '',
  `hits` int(11) NOT NULL DEFAULT '0',
  `sumber` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO berita VALUES("1","2014-05-08 05:00:36","admin","Osob Kiwalan (Bahasa Kebalikan), Bahasa Budaya Arek Malang","4","<p><strong>Mengenal Bahasa Walikan, Bahasa Budaya Arek Malang</strong><br />Bahasa Walikan merupakan bahasa komunikasi khas orang Malang. Bahasa Walikan ini sudah menjadi bagian dari Arek-arek Malang sehari-hari, siapapun yang asli Malang atau sudah lama tinggal di Malang pasti sudah familiar dengan bahasa Walikan.<br /><br />Memang belum ada kesimpulan pasti kapan bahasa Walikan ini bermula dan bagaimana asalnya. Hanya diperkirakan, bahasa walikan ini pertama-tama muncul ketika Malang mulai melakukan perlawanan terhadap penjajah (Belanda). Perang gerilya rakyat Malang terhadap penjajah terjadi dalam berbagai periode sejak Belanda masuk Malang tahun 1767 hingga setelah Proklamasi Kemerdekaan ketika Belanda masih belum rela Indonesia merdeka, penjajah kembali melakukan percobaan penjajahan yang dalam sejarah di kenal dengan agresi I dan agresi II. Kita ketahui bahwa Malang adalah medan perang yang dahsyat kala itu karena di Malang merupakan salah satu pangkalan utama kekuatan Belanda di Nusantara.<br />&nbsp;<br />Besar kemungkinan bahasa Walikan muncul ketika terjadi perang gerilya sebelum era kemerdekaan, dimana antar pejuang mencari cara agar komunikasi dan koordinasi lisan yang sulit dipahami oleh musuh atau mata-mata penjajah. Ratusan tahun lamanya Belanda di Malang pasti sudah paham bahasa umum apalagi Belanda memiliki mata-mata yang juga warga pribumi. Maka dilakukanlah strategi komunikasi untuk mengirim pesan rahasia antar pejuang, atau untuk saling mengenal dan identifikasi dengan menggunakan bahasa yang sulit dideteksi maknanya yaitu bahasa Walikan.<br />&nbsp;<br />Bila memang kesimpulan ini benar adanya, maka bahasa Walikan adalah bahasa sandi para pejuang dalam pengertian yang sederhana untuk saling berkomunikasi, berkoordinasi atau mengidentifikasi mana rekan perjuangan dan mana yang bukan. Bahasa walikan juga adalah bahasa yang digunakan sehari-hari yang dimaksudkan untuk menyamarkan inti komunikasi. Paling tidak, dengan menggunakan bahasa walikan maka lawan memerlukan waktu untuk mengerti maksudnya dan atau kawan akan lebih mudah mengenal rekannya. Bagi orang yang tidak terbiasa maka sulit memahami makna dari bahasa walikan, sehingga bahasa walikan memang tepat sebagai bahasa sandi sederhana ketika situasi perang dimana kehidupan penuh dengan kecurigaan, teror dan bahaya.<br />&nbsp;<br />Kita ulas dulu bagaimana gambaran contoh bahasa walikan. Bahasa walikan adalah jenis komunikasi khas orang Malang yang dibunyikan atau ditulis terbalik dari bahasa sehari-hari orang Malang yaitu bahasa Jawa Timuran. Contoh dari bahasa walikan dan artinya adalah:</p>
INSERT INTO berita VALUES("2","2014-05-10 18:58:06","admin","#HardDisk Alam","6","<p>Semua aktifitas manusia akan sangat terekam dengan sangat jelas di tulang ekor. Juga yang berhubungan dengan orang orang lain, karena rekaman itu akan mencatat dengan sangat detail dan spesifik</p>
INSERT INTO berita VALUES("3","2014-04-10 20:03:07","admin","Sel juga Bertasbih","6","<p>Menariknya sel sel tubuh manusia ternyata mampu melaksanakan itu semua tanpa sedikitpun ada campur tangan dari manusia itu sendiri, artinya mereka melakukan itu karena ada kekuatan yang Maha Agung nan Maha dahsyat</p>
INSERT INTO berita VALUES("4","2014-05-10 20:08:51","admin","Nasib Makanan dalam Perut","6","<p><strong>SEPERTI </strong>kita ketahui, makanan yang masuk dalam tubuh kita tentunya mengalami proses, mulai dari mulut hingga sampai ke pembuangan akhir.</p>
INSERT INTO berita VALUES("5","2014-05-10 21:16:52","admin","Syeikh Usamah Rifa’i ditetapkan sebagai Ketua Umum Majelis Islam Suriah","6","<p>Muktamar Majelis Islam Suriah di Istanbul, Turki&nbsp; yang dilaksanakan sejak hari Jumat-Sabtu (11 &ndash; 12 April 2014) lalu, akhirnya menetapkan Syeikh Usamah Abdul Karim Rifa&rsquo;i sebagai Ketua Umum Majelis Islam Suriah.</p>
INSERT INTO berita VALUES("6","2014-05-12 02:05:08","admin","Meditasi hanya Taklukkan Gen Stres, Tahajjud Plus Pahala","6","<p dir=\"LTR\">Studi terbaru menunjukkan meditasi dapat menekan gen yang menyebabkan inflamasi. Studi menyentuh epigenetika, sebuah cabang biologi molekuler yang menggoyahkan keyakinan bahwa genotipe menentukan nasib.</p>
INSERT INTO berita VALUES("7","2014-05-11 20:51:08","admin","Menyikapi Kecurangan Dalam Kehidupan","6","<p><span class=\"userContent\" data-ft=\"{\">Prof Dr Muhammad Asy-Syarif hafidhahullah mengatakan, bahwa para ulama sering gagal dalam kehidupan bermasyarakat karena kurang dalam pengalaman serta tidak cerdik dan tidak pandai membuat makar atau tipu daya.</span></p>
INSERT INTO berita VALUES("8","2014-05-12 21:45:11","admin","Belajar Dewasa Menyikapi Perbedaan..","6","<p><span class=\"userContent\" data-ft=\"{\">Rasulullah &ndash;Shallallaahu &lsquo;Alaihi Wa &lsquo;Ala Alihi Wa Sallam telah memberitahukan kepada kita bahwa sepeninggal Beliau akan terjadi perbedaan dan bahkan perpecahan yang sangat banyak&hellip;<br /> Apalagi zaman sekarang, lebih banyak lagi fitnah yang timbul&hellip;Bahkan sesama teman&hellip;Sesama sahabat&hellip;Sesama penuntut ilmu syar&rsquo;i&hellip;Sesama da&rsquo;i&hellip;Sesama ulama&rsquo;&hellip;Sesama Ahlus Sunnah Wal Jama&rsquo;ah&hellip;<span class=\"text_exposed_show\"> Apalagi di kalangan masyarakat awam..</span></span></p>
INSERT INTO berita VALUES("9","2014-05-12 21:54:01","admin","Kisah Penuh Hikmah Tentang Kesempurnaan","6","<p><span class=\"usercontent\">[Baca dengan tenang sambil direnungkan]</span></p>
INSERT INTO berita VALUES("10","2014-05-12 21:56:16","admin","3 Alasan Mengkonsumsi Bacaan Digital","1","<p>Tulisan ini ingin merespon secara lengkap diskusi saya dengan @strategi_bisnis di Twitter tentang pro kontra konsumsi bacaan digital versus kertas. Mana yang lebih ramah lingkungan?</p>
INSERT INTO berita VALUES("11","2014-05-12 22:00:17","admin","Apa itu Social Entrepreneur?","1","<p>Sebelum mengenal apa itu Social Entrepreneur, perlu dipahami dahulu apa itu <em>Social Entrepreneurship</em> yang merupakan turunan dari entrepreneurship/kewirausahaan. Komunitas TDA, tahun 2010 pernah memperoleh<em> Best Achievement Social Entrepreneur Community </em>dari majalah SWA.</p>
INSERT INTO berita VALUES("12","2014-05-12 22:03:41","admin","Pribadi yang Harus Disiapkan Sebagai Social Entrepreneur","1","<p>Seorang <em>Social Entrepreneur</em> akan menjadi agen perubahan di masyarakat, ia harus bisa memberikan solusi atas permasalahan sosial di masyarakat. Pribadi diri yang harus disiapkan sebagai seorang social entrepreneur adalah :</p>
INSERT INTO berita VALUES("13","2014-05-12 22:04:50","admin","Belajar dari Tukang Bajaj","1","<p>Minggu lalu usai dari Makassar, setibanya di Bandara Soekarno &ndash; Hatta karena masih sore dan tidak terburu-buru, saya menumpang bus Damri jurusan Kemayoran. Setelah turun dari bus Damri tersebut di terminal Kemayoran saya menumpang sebuah bajaj biru karena rumah saya tidak jauh masih di kawasan Kemayoran.</p>
INSERT INTO berita VALUES("14","2014-05-14 06:34:04","admin","Obat dan Solusi dari Kesempitan","6","<p dir=\"LTR\">Obat dan Solusi dari Kesempitan adalah Dua Hal, yaitu;</p>
INSERT INTO berita VALUES("15","2014-05-14 06:39:40","admin","Surat Cinta Untuk Saudara-Saudaraku Yang Dimudahkan Allah Pergi Ke Medan Jihad","6","<p><span class=\"userContent\" data-ft=\"{\">Surat Cinta Untuk Saudara-Saudaraku Yang Dimudahkan Allah Pergi Ke Medan Jihad..</span></p>
INSERT INTO berita VALUES("20","2014-05-17 20:17:30","admin","Batasi Pembangunan Ruko","9","<p>KODEW sinam pemilik nama&nbsp; Citra Alvin Parasti, oleh rekan-rekannya, biasa disapa Citra. Lulusan S.1 Ikom Universitas Muhammadiyah Malang ini sekarang, bekerja di sebuah bank di Pandaan.<br /> &ldquo;Kepengennya pindah memang&nbsp;&nbsp; bisa kembali ke Malang, agar dekat dengan keluarga,&rdquo; ujarnya kepada Malang Post. Ia kemudian buru-buru menambahkan bahwa kondisi Malang saat ini&nbsp; sudah jauh berbeda dengan lima tahun lalu. Kemacetan ada dimana-mana dan mulai memiliki persoalan sosial lainnya. Yakni masalah klasik yang biasanya menimpa kota besar, banjir.</p>
INSERT INTO berita VALUES("16","2014-05-14 06:43:24","admin","Jodoh Itu Misterius","6","<p class=\"MsoNormal\" dir=\"LTR\" style=\"text-align: left; direction: ltr; unicode-bidi: embed;\"><span class=\"usercontent\">Benarkah orang baik itu pasti mendapatkan jodoh orang baik, dan orang jahat mendapat jodoh orang jahat pula..???</span></p>
INSERT INTO berita VALUES("17","2014-05-14 06:48:05","admin","”Perlukah Pendidikan Berkarakter?”","6","<p>Program pendidikan karakter, memerlukan keteladanan. Jika cuma slogan, Indonesia dikenal jagonya!</p>
INSERT INTO berita VALUES("18","2014-05-14 06:51:05","admin","Kisah Wafatnya Muadzdzin","6","<p class=\"MsoNormal\" dir=\"LTR\" style=\"text-align: left; direction: ltr; unicode-bidi: embed;\"><span class=\"usercontent\">[Kiriman dari teman]</span></p>
INSERT INTO berita VALUES("19","2014-05-14 06:54:55","admin","8 Obat Hati","6","<p>Hati manusia terkadang tidak stabil atau sakit seperti halnya badan. Meskipun berbeda antara sifat maupun obatnya. Apa obat yang bisa dipakai untuk mengobati hati yang sakit? Berikut ini kami sebutkan 8 obatnya. Semoga bermanfaat.</p>
INSERT INTO berita VALUES("21","2014-05-17 20:33:47","admin","Bidik Nguyen Van Bien","8","<p>MALANG - Arema Cronus bakal mengisi sisa kuota satu pemain asing Asia untuk putaran kedua Indonesia Super League (ISL) 2014. Dari sumber Malang Post, pemain yang disebut-sebut akan merapat ke Singo Edan ialah Nguyen Van Bien.<br />Pemain ini memang nama baru bagi publik sepakbola Indonesia. Akan tetapi, Nguyen Van Bien bukan tidak pernah merasakan rumput Indonesia. Pemilik nomor punggung 5 di Hanoi T&amp;T itu juga turut diboyong ke Malang ketika klub asal Vietnam itu melakoni laga kontra Arema Cronus dalam babak penyisihan AFC Cup 2014.<br /><br />Kabarnya, manajemen Arema telah melakukan pendekatan intensif dengan pemain kelahiran Nam Dinh, Vietnam 27 April 1985 tersebut. Ketika dikonfirmasi, Media Oficer Arema, Sudarmaji membenarkan bahwa pihaknya tengah menjajaki komunikasi serius dengan salah satu pemain Asia. Namun ia enggan menyebutkan nama dan asal pemain yang telah didekati.<br /><br />Ditanya apakah pemain tersebut bernama Nguyen Van Bien, Sudarmaji tak mengelak, namun juga tidak membenarkan. \"Lihat saja nanti,\" kata pria asal Banyuwangi itu kepada Malang Post ketika ditemui di Kantor Arema Jl. Kertanegara No.7 Malang, kemarin (16/5).<br />Lebih lanjut, Sudarmaji menjelaskan bahwa pihaknya tidak akan membocorkan nama pemain yang diincar sebelum ada kontrak resmi. Menurutnya, terlalu riskan untuk melakukan spekulasi penyebutan nama-nama pemain, mengingat tim lain juga tengah mengincar pemain tambahan untuk putaran kedua nanti. \"Kalau kita sebut nama dan tim lain tahu kan bahaya. Nanti dia juga diincar oleh tim lain jadinya,\" imbuhnya memberikan alasan.<br /><br />Meski begitu, ia memastikan bahwa akan ada tambahan pemain asing Asia di putaran kedua. \"Saya pastikan akan ada tambahan. Tapi waktunya cukup lama untuk mendaftarkan pemain baru. Jadi kita masih punya banyak waktu untuk mencari,\" papar mantan wartawan tersebut.<br />Selain itu, Sudarmaji juga mengungkapkan bahwa dalam waktu dekat pemain yang digadang-gadang bakal memperkuat tim asuhan Suharno-Joko \'Gethuk\' Susilo akan bergabung dengan tim. \"Sebelum akhir Mei pemain itu akan datang. Tapi kita lihat dulu kemampuannya. Nanti biar tim pelatih yang menilai,\" tutupnya.(rul/lim)</p>","1","nguyen van bien","","bidik-nguyen-van-bien","","18","http://www.malang-post.com/arema-persema/86681-bidik-nguyen-van-bien");



DROP TABLE berita_kat;

CREATE TABLE `berita_kat` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(2) NOT NULL DEFAULT '0',
  `kategori` varchar(50) NOT NULL DEFAULT '',
  `ket` varchar(250) NOT NULL DEFAULT '',
  `slug` varchar(50) NOT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO berita_kat VALUES("1","0","Bisnis dan Ekonomi","Berisi artikel seputar Bisnis dan Ekonomi","bisnis-dan-ekonomi");
INSERT INTO berita_kat VALUES("2","0","Komputer","Berisi artikel seputar ilmu komputer","komputer");
INSERT INTO berita_kat VALUES("3","2","Web Desain","Berisi artikel seputar Web Desain","web-desain");
INSERT INTO berita_kat VALUES("7","2","Pemrograman","Berisi artikel seputar Pemrograman","pemrograman");
INSERT INTO berita_kat VALUES("4","0","Ngalaman","Berita seputar malang raya dan sekitarnya","ngalaman");
INSERT INTO berita_kat VALUES("5","2","Desain Grafis","Desain Grafis","desain-grafis");
INSERT INTO berita_kat VALUES("6","0","Religi dan Renungan","Religi dan Renungan","religi-dan-renungan");
INSERT INTO berita_kat VALUES("8","0","Olahraga","Olahraga","olahraga");
INSERT INTO berita_kat VALUES("9","4","Kodew","Kodew","kodew");



DROP TABLE berita_komentar;

CREATE TABLE `berita_komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `berita` int(11) NOT NULL,
  `balas` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL DEFAULT '',
  `tgl` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nama` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `website` varchar(50) NOT NULL DEFAULT '',
  `komentar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO berita_komentar VALUES("1","3","0","125.164.14.143","2014-05-13 05:38:19","Ismail Marzuki","cow_ngalam@yahoo.co.id","www.kerangalam.web.id","Subhanallah");
INSERT INTO berita_komentar VALUES("2","20","0","110.139.65.26","2014-05-17 21:08:37","bayu setiawan","boriel_you@yahoo.com","","iyo emank, setuju mbak brooo ;)");



DROP TABLE berita_setting;

CREATE TABLE `berita_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb_width` varchar(10) NOT NULL DEFAULT '',
  `thumb_height` varchar(10) NOT NULL DEFAULT '',
  `normal_width` varchar(10) NOT NULL DEFAULT '',
  `normal_height` varchar(10) NOT NULL DEFAULT '',
  `kualitas` int(3) NOT NULL DEFAULT '100',
  `pberita` int(2) NOT NULL DEFAULT '0',
  `pkomentar` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO berita_setting VALUES("1","150","auto","700","auto","80","1","1");



DROP TABLE download;

CREATE TABLE `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(12) NOT NULL DEFAULT '0',
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `judul` varchar(255) NOT NULL DEFAULT '',
  `keterangan` text NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT '',
  `hit` int(11) NOT NULL DEFAULT '0',
  `size` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO download VALUES("4","3","2014-05-07 19:35:03","Suryadharma Tak Tahu Pertemuan Hamzah Haz-Megawati","Suryadharma Tak Tahu Pertemuan Hamzah Haz-Megawati","Koala.jpg","0","775702");
INSERT INTO download VALUES("3","1","2014-05-07 19:32:49","Guy Demel \"Batalkan\" Keunggulan Liverpool","Guy Demel \"Batalkan\" Keunggulan Liverpool","Chrysanthemum.jpg","0","879394");



DROP TABLE download_kat;

CREATE TABLE `download_kat` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL DEFAULT '',
  `keterangan` varchar(250) NOT NULL DEFAULT '',
  `slug` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO download_kat VALUES("1","Kategori Download","Kategori Download","kategori-download");
INSERT INTO download_kat VALUES("2","Kategori Download Dua","Kategori Download Dua","kategori-download-dua");
INSERT INTO download_kat VALUES("3","Kategori Download Tiga","Kategori Download Tiga","kategori-download-tiga");
INSERT INTO download_kat VALUES("4","Toko Online","Toko Online","toko-online");



DROP TABLE foto;

CREATE TABLE `foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user` varchar(20) NOT NULL DEFAULT '',
  `nama` varchar(100) NOT NULL DEFAULT '',
  `keterangan` text NOT NULL,
  `publikasi` int(1) NOT NULL DEFAULT '0',
  `gambar` text NOT NULL,
  `slug` varchar(100) NOT NULL DEFAULT '',
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE foto_kat;

CREATE TABLE `foto_kat` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL DEFAULT '',
  `keterangan` varchar(250) NOT NULL DEFAULT '',
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO foto_kat VALUES("1","Ngalam Raya dan Sekitarnya","Berisi foto seputar Ngalam Raya dan Sekitarnya","ngalam-raya-dan-sekitarnya");
INSERT INTO foto_kat VALUES("2","Oh snap! Change a few things up and try submitting","Oh snap! Change a few things up and try submitting again","oh-snap-change-a-few-things-up-and-try-submitting");



DROP TABLE foto_setting;

CREATE TABLE `foto_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb_width` varchar(10) NOT NULL DEFAULT '',
  `thumb_height` varchar(10) NOT NULL DEFAULT '',
  `normal_width` varchar(10) NOT NULL DEFAULT '',
  `normal_height` varchar(10) NOT NULL DEFAULT '',
  `kualitas` int(3) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO foto_setting VALUES("1","150","auto","800","auto","80");



DROP TABLE halaman;

CREATE TABLE `halaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL DEFAULT '',
  `konten` text NOT NULL,
  `slug` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO halaman VALUES("1","Profil","Profil","profil");



DROP TABLE intrusions;

CREATE TABLE `intrusions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `page` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `impact` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO intrusions VALUES("1","id","1\"","/tcms/admin.php?pilih=%22admin_slider&aksi=delheader&id=1%22","local/unknown","6","2012-07-12 23:46:06");



DROP TABLE kalender;

CREATE TABLE `kalender` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL DEFAULT '',
  `ket` text NOT NULL,
  `waktu_mulai` date NOT NULL DEFAULT '0000-00-00',
  `waktu_akhir` date NOT NULL DEFAULT '0000-00-00',
  `background` varchar(10) NOT NULL DEFAULT '#d1d1d1',
  `color` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO kalender VALUES("1","Senam Pagi","Senam Pagi","2014-05-21","2014-05-22","#d1d1d1","");



DROP TABLE links;

CREATE TABLE `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(12) NOT NULL DEFAULT '0',
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `judul` varchar(255) NOT NULL DEFAULT '',
  `keterangan` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `hit` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO links VALUES("1","1","2014-05-12 04:27:15","Teamworks Indonesia","Teamworks Indonesia","http://www.teamworks.co.id","9","teamworks-indonesia");
INSERT INTO links VALUES("2","1","2014-05-12 04:29:03","Sumber Hosting Indonesia","Sumber Hosting Indonesia","http://www.sumberhosting.co.id","12","sumber-hosting-indonesia");
INSERT INTO links VALUES("3","1","2014-05-12 04:29:48","Grosir Sandal Surabaya","Grosir Sandal Surabaya","http://www.grosirsandalsurabaya.com","11","grosir-sandal-surabaya");



DROP TABLE links_kat;

CREATE TABLE `links_kat` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL DEFAULT '',
  `keterangan` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO links_kat VALUES("1","Partnership","Partnership","partnership");



DROP TABLE menu;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(127) NOT NULL DEFAULT '',
  `publikasi` int(1) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO menu VALUES("1","0","Home","{url}","1","1");
INSERT INTO menu VALUES("2","0","Profil","{url}/halaman-1-profil.html","1","3");
INSERT INTO menu VALUES("3","2","Tentang Kami","{url}/#","1","1");
INSERT INTO menu VALUES("4","2","Visi dan Misi","{url}/#","1","2");
INSERT INTO menu VALUES("5","0","Layanan","{url}/#","1","4");
INSERT INTO menu VALUES("6","5","Desain Grafis","{url}/#","1","1");
INSERT INTO menu VALUES("7","5","Web Design","{url}/#","1","2");
INSERT INTO menu VALUES("8","5","Hosting dan Domain","{url}/#","1","4");
INSERT INTO menu VALUES("9","0","Berita dan Artikel","{url}/berita.html","1","5");
INSERT INTO menu VALUES("10","0","Pendidikan","{url}/pendidikan.html","1","10");
INSERT INTO menu VALUES("11","0","Kuliner","{url}/kuliner.html","1","11");
INSERT INTO menu VALUES("12","0","Kontak","{url}/kontak.html","1","12");



DROP TABLE menu_users;

CREATE TABLE `menu_users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `ordering` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO menu_users VALUES("1","Logout","index.php?aksi=logout","4");
INSERT INTO menu_users VALUES("2","Ubah Password","admin.php?pilih=user&mod=yes&aksi=change","3");
INSERT INTO menu_users VALUES("3","Kirim Berita","admin.php?pilih=news&mod=yes","2");
INSERT INTO menu_users VALUES("4","Profile","?pilih=profile&mod=yes","1");



DROP TABLE modul;

CREATE TABLE `modul` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `modul` varchar(30) NOT NULL DEFAULT '',
  `isi` text NOT NULL,
  `setup` varchar(50) NOT NULL DEFAULT '',
  `posisi` tinyint(2) NOT NULL DEFAULT '0',
  `published` int(1) NOT NULL DEFAULT '0',
  `ordering` int(5) NOT NULL DEFAULT '0',
  `type` enum('block','module') NOT NULL DEFAULT 'module',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO modul VALUES("1","Berita Terpopuler","id-content/modul/berita/terpopuler.php","","1","1","3","module");
INSERT INTO modul VALUES("2","Statistik Situs","id-content/modul/statistik/stat.php","","1","1","9","module");
INSERT INTO modul VALUES("3","Kalender","id-content/modul/kalender/kalender_blok.php","","1","0","8","module");
INSERT INTO modul VALUES("4","Pesan Singkat","id-content/modul/shoutbox/shoutboxview.php","","1","1","6","module");
INSERT INTO modul VALUES("5","Random Links","id-content/modul/links/links_random.php","","1","1","5","module");
INSERT INTO modul VALUES("6","Kategori Berita","id-content/modul/berita/kategori.php","","1","1","2","module");
INSERT INTO modul VALUES("7","Login","id-content/modul/login/login.php","","1","1","1","module");
INSERT INTO modul VALUES("8","ip logs","id-content/modul/phpids/ids.php","","0","0","1","module");
INSERT INTO modul VALUES("9","Komentar Terbaru","id-content/modul/berita/komentar.php","","1","1","4","module");
INSERT INTO modul VALUES("10","Top Download","id-content/modul/download/topdl.php","","0","0","2","module");
INSERT INTO modul VALUES("11","Tags","id-content/modul/berita/tags.php","","1","1","7","module");



DROP TABLE posted_ip;

CREATE TABLE `posted_ip` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL DEFAULT '',
  `ip` varchar(100) NOT NULL DEFAULT '',
  `time` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO posted_ip VALUES("1","contact","125.164.14.143","1399936609");
INSERT INTO posted_ip VALUES("2","contact","125.164.14.143","1399936953");
INSERT INTO posted_ip VALUES("3","contact","125.164.14.143","1399937072");
INSERT INTO posted_ip VALUES("4","contact","125.164.14.143","1399937150");
INSERT INTO posted_ip VALUES("5","contact","125.164.14.143","1399937218");
INSERT INTO posted_ip VALUES("6","contact","125.164.14.143","1399937414");
INSERT INTO posted_ip VALUES("7","contact","125.164.14.143","1399937437");
INSERT INTO posted_ip VALUES("8","contact","125.164.14.143","1399937532");



DROP TABLE sensor;

CREATE TABLE `sensor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `word` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO sensor VALUES("1","Kontol");
INSERT INTO sensor VALUES("2","Anjing");
INSERT INTO sensor VALUES("3","Anjeng");
INSERT INTO sensor VALUES("4","anjrit");
INSERT INTO sensor VALUES("5","memek");
INSERT INTO sensor VALUES("6","tempek");
INSERT INTO sensor VALUES("7","Bangsat");
INSERT INTO sensor VALUES("8","fuck");
INSERT INTO sensor VALUES("9","eSDeCe");



DROP TABLE setting;

CREATE TABLE `setting` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `email_master` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nama_email` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `judul_situs` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `url_situs` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `slogan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `keywords` text COLLATE latin1_general_ci NOT NULL,
  `theme` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'tcms',
  `author` text COLLATE latin1_general_ci NOT NULL,
  `alamatkantor` text COLLATE latin1_general_ci NOT NULL,
  `publishwebsite` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO setting VALUES("1","cow_ngalam@yahoo.co.id","Kera Ngalam","Kera Ngalam | Belajar dan Bekerja dengan Cinta","http://www.kerangalam.web.id","Belajar dan Bekerja dengan Cinta","Teamworks Creative Description","Teamworks Creative, Surabaya, Indonesia","default","Teamworks Indonesia","<p><strong>-</strong></p>","1");



DROP TABLE stat_browse;

CREATE TABLE `stat_browse` (
  `pjudul` varchar(255) NOT NULL DEFAULT '',
  `ppilihan` text NOT NULL,
  `pjawaban` text NOT NULL,
  `id` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO stat_browse VALUES("Browser yang sering digunakan dalam mengakses halaman ini","Netscape#Opera#MSIE 4.0#MSIE 5.0#MSIE 6.0#Lynx#WebTV#Konqueror#bot#Other","1#1#1#1#1#1#1#1#1#1","1");
INSERT INTO stat_browse VALUES("Operating system","Windows#Mac#Linux#FreeBSD#SunOS#IRIX#BeOS#OS/2#AIX#Other","1#1#1#1#1#1#1#1#1#1","2");
INSERT INTO stat_browse VALUES("Pengunjung berdasarkan hari","Minggu#Senin#Selasa#Rabu#Kamis#Jumat#Sabtu","1#1#1#1#1#1#1","3");
INSERT INTO stat_browse VALUES("Pengunjung berdasarkan bulan","Januari#Februari#Maret#April#Mei#Juni#Juli#Agustus#September#Oktober#November#Desember","1#1#1#1#1#1#1#1#1#1#1#1","4");
INSERT INTO stat_browse VALUES("Pengunjung berdasarkan jam","0:00 - 0:59#1:00 - 1:59#2:00 - 2:59#3:00 - 3:59#4:00 - 4:59#5:00 - 5:59#6:00 - 6:59#7:00 - 7:59#8:00 - 8:59#9:00 - 9:59#10:00 - 10:59#11:00 - 11:59#12:00 - 12:59#13:00 - 13:59#14:00 - 14:59#15:00 - 15:59#16:00 - 16:59#17:00 - 17:59#18:00 - 18:59#19:00 - 19:59#20:00 - 20:59#21:00 - 21:59#22:00 - 22:59#23:00 - 23:59","1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1#1","5");



DROP TABLE submenu;

CREATE TABLE `submenu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(127) NOT NULL DEFAULT '',
  `parent` int(2) NOT NULL DEFAULT '0',
  `published` int(1) NOT NULL DEFAULT '0',
  `ordering` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE usercounter;

CREATE TABLE `usercounter` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usercounter VALUES("1","5.164.251.202-66.249.77.147-79.133.204.134-204.236.235.245-36.74.214.175-208.90.57.196-","1020","5327");



DROP TABLE useronline;

CREATE TABLE `useronline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipproxy` varchar(100) DEFAULT NULL,
  `host` varchar(100) DEFAULT NULL,
  `ipanda` varchar(100) DEFAULT NULL,
  `proxyserver` varchar(100) DEFAULT NULL,
  `timevisit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ipanda` (`ipanda`),
  KEY `timevisit` (`timevisit`),
  KEY `ipproxy` (`ipproxy`)
) ENGINE=MyISAM AUTO_INCREMENT=1237 DEFAULT CHARSET=latin1;

INSERT INTO useronline VALUES("1235","66.249.77.147","crawl-66-249-77-147.googlebot.com","66.249.77.147","","1400537382");
INSERT INTO useronline VALUES("1236","36.74.214.175","36.74.214.175","36.74.214.175","","1400537545");



DROP TABLE useronlineday;

CREATE TABLE `useronlineday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipproxy` varchar(100) DEFAULT NULL,
  `host` varchar(100) DEFAULT NULL,
  `ipanda` varchar(100) DEFAULT NULL,
  `proxyserver` varchar(100) DEFAULT NULL,
  `timevisit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ipanda` (`ipanda`),
  KEY `timevisit` (`timevisit`),
  KEY `ipproxy` (`ipproxy`)
) ENGINE=MyISAM AUTO_INCREMENT=639 DEFAULT CHARSET=latin1;

INSERT INTO useronlineday VALUES("612","109.73.120.131","109.73.120.131","109.73.120.131","","1400484098");
INSERT INTO useronlineday VALUES("608","67.228.177.110","67.228.177.110-static.reverse.softlayer.com","67.228.177.110","","1400481747");
INSERT INTO useronlineday VALUES("611","38.99.62.89","38.99.62.89","38.99.62.89","","1400483760");
INSERT INTO useronlineday VALUES("633","157.55.34.100","msnbot-157-55-34-100.search.msn.com","157.55.34.100","","1400504418");
INSERT INTO useronlineday VALUES("632","157.55.35.104","msnbot-157-55-35-104.search.msn.com","157.55.35.104","","1400504538");
INSERT INTO useronlineday VALUES("634","188.40.45.81","mediadb.ru","188.40.45.81","","1400506484");
INSERT INTO useronlineday VALUES("571","65.55.52.87","msnbot-65-55-52-87.search.msn.com","65.55.52.87","","1400453183");
INSERT INTO useronlineday VALUES("572","66.249.77.147","crawl-66-249-77-147.googlebot.com","66.249.77.147","","1400537382");
INSERT INTO useronlineday VALUES("597","173.252.100.115","173.252.100.115","173.252.100.115","","1400457919");
INSERT INTO useronlineday VALUES("604","157.55.33.180","msnbot-157-55-33-180.search.msn.com","157.55.33.180","","1400467949");
INSERT INTO useronlineday VALUES("596","173.252.100.117","173.252.100.117","173.252.100.117","","1400457925");
INSERT INTO useronlineday VALUES("638","5.164.251.202","5x164x251x202.dynamic.nn.ertelecom.ru","5.164.251.202","","1400533312");
INSERT INTO useronlineday VALUES("616","157.55.34.181","msnbot-157-55-34-181.search.msn.com","157.55.34.181","","1400488942");
INSERT INTO useronlineday VALUES("621","157.55.34.105","msnbot-157-55-34-105.search.msn.com","157.55.34.105","","1400489767");
INSERT INTO useronlineday VALUES("630","157.55.33.22","msnbot-157-55-33-22.search.msn.com","157.55.33.22","","1400499509");
INSERT INTO useronlineday VALUES("610","54.204.40.155","ec2-54-204-40-155.compute-1.amazonaws.com","54.204.40.155","","1400483620");
INSERT INTO useronlineday VALUES("600","107.21.76.184","ec2-107-21-76-184.compute-1.amazonaws.com","107.21.76.184","","1400462833");
INSERT INTO useronlineday VALUES("601","107.22.51.67","ec2-107-22-51-67.compute-1.amazonaws.com","107.22.51.67","","1400462834");
INSERT INTO useronlineday VALUES("626","207.244.73.5","207.244.73.5","207.244.73.5","","1400496218");
INSERT INTO useronlineday VALUES("627","176.9.25.25","static.25.25.9.176.clients.your-server.de","176.9.25.25","","1400498534");
INSERT INTO useronlineday VALUES("573","204.236.235.245","ec2-204-236-235-245.compute-1.amazonaws.com","204.236.235.245","","1400530185");
INSERT INTO useronlineday VALUES("594","178.255.215.74","crawl10.exabot.com","178.255.215.74","","1400456272");
INSERT INTO useronlineday VALUES("479","91.239.129.37","91.239.129.37","91.239.129.37","","1400470478");
INSERT INTO useronlineday VALUES("628","125.164.36.201","201.subnet125-164-36.speedy.telkom.net.id","125.164.36.201","","1400504563");
INSERT INTO useronlineday VALUES("629","157.55.32.111","msnbot-157-55-32-111.search.msn.com","157.55.32.111","","1400499910");
INSERT INTO useronlineday VALUES("622","176.9.78.7","static.7.78.9.176.clients.your-server.de","176.9.78.7","","1400489948");
INSERT INTO useronlineday VALUES("625","157.55.35.87","msnbot-157-55-35-87.search.msn.com","157.55.35.87","","1400492530");
INSERT INTO useronlineday VALUES("617","157.55.32.103","msnbot-157-55-32-103.search.msn.com","157.55.32.103","","1400486625");
INSERT INTO useronlineday VALUES("618","88.198.227.103","static.88-198-227-103.clients.your-server.de","88.198.227.103","","1400487688");
INSERT INTO useronlineday VALUES("619","67.214.165.6",".","67.214.165.6","","1400487731");
INSERT INTO useronlineday VALUES("620","157.55.35.77","msnbot-157-55-35-77.search.msn.com","157.55.35.77","","1400487925");
INSERT INTO useronlineday VALUES("607","180.76.6.152","180.76.6.152","180.76.6.152","","1400476792");
INSERT INTO useronlineday VALUES("595","173.252.100.114","173.252.100.114","173.252.100.114","","1400457889");
INSERT INTO useronlineday VALUES("635","208.90.57.196","nat-vlan550.las1.sco.cisco.com","208.90.57.196","","1400532245");
INSERT INTO useronlineday VALUES("615","157.55.33.31","msnbot-157-55-33-31.search.msn.com","157.55.33.31","","1400485125");
INSERT INTO useronlineday VALUES("575","157.55.32.112","msnbot-157-55-32-112.search.msn.com","157.55.32.112","","1400483253");
INSERT INTO useronlineday VALUES("606","65.55.52.114","msnbot-65-55-52-114.search.msn.com","65.55.52.114","","1400470529");
INSERT INTO useronlineday VALUES("613","157.56.92.177","msnbot-157-56-92-177.search.msn.com","157.56.92.177","","1400484505");
INSERT INTO useronlineday VALUES("603","157.55.33.101","msnbot-157-55-33-101.search.msn.com","157.55.33.101","","1400467668");
INSERT INTO useronlineday VALUES("602","157.56.229.187","msnbot-157-56-229-187.search.msn.com","157.56.229.187","","1400467511");
INSERT INTO useronlineday VALUES("614","157.55.35.42","msnbot-157-55-35-42.search.msn.com","157.55.35.42","","1400485107");
INSERT INTO useronlineday VALUES("598","173.252.100.113","173.252.100.113","173.252.100.113","","1400457926");
INSERT INTO useronlineday VALUES("605","157.55.32.227","msnbot-157-55-32-227.search.msn.com","157.55.32.227","","1400470490");
INSERT INTO useronlineday VALUES("631","157.55.33.50","msnbot-157-55-33-50.search.msn.com","157.55.33.50","","1400499732");
INSERT INTO useronlineday VALUES("552","157.56.229.185","msnbot-157-56-229-185.search.msn.com","157.56.229.185","","1400453703");
INSERT INTO useronlineday VALUES("636","36.74.214.175","36.74.214.175","36.74.214.175","","1400537545");
INSERT INTO useronlineday VALUES("637","79.133.204.134","79.133.204.134","79.133.204.134","","1400536652");
INSERT INTO useronlineday VALUES("599","157.55.32.223","msnbot-157-55-32-223.search.msn.com","157.55.32.223","","1400461515");
INSERT INTO useronlineday VALUES("609","157.55.33.44","msnbot-157-55-33-44.search.msn.com","157.55.33.44","","1400483267");
INSERT INTO useronlineday VALUES("624","157.55.34.99","msnbot-157-55-34-99.search.msn.com","157.55.34.99","","1400492509");
INSERT INTO useronlineday VALUES("623","54.82.240.90","ec2-54-82-240-90.compute-1.amazonaws.com","54.82.240.90","","1400492022");



DROP TABLE useronlinemonth;

CREATE TABLE `useronlinemonth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipproxy` varchar(100) DEFAULT NULL,
  `host` varchar(100) DEFAULT NULL,
  `ipanda` varchar(100) DEFAULT NULL,
  `proxyserver` varchar(100) DEFAULT NULL,
  `timevisit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ipanda` (`ipanda`),
  KEY `timevisit` (`timevisit`),
  KEY `ipproxy` (`ipproxy`)
) ENGINE=MyISAM AUTO_INCREMENT=488 DEFAULT CHARSET=latin1;

INSERT INTO useronlinemonth VALUES("1","125.164.38.136","136.subnet125-164-38.speedy.telkom.net.id","125.164.38.136","","1399500343");
INSERT INTO useronlinemonth VALUES("2","198.100.149.169","ks4002865.ip-198-100-149.net","198.100.149.169","","1399484688");
INSERT INTO useronlinemonth VALUES("3","178.255.215.74","crawl10.exabot.com","178.255.215.74","","1400456272");
INSERT INTO useronlinemonth VALUES("4","66.249.77.147","crawl-66-249-77-147.googlebot.com","66.249.77.147","","1400537382");
INSERT INTO useronlinemonth VALUES("5","183.207.228.11","183.207.228.11","183.207.228.11","","1400385458");
INSERT INTO useronlinemonth VALUES("6","183.60.46.72","183.60.46.72","183.60.46.72","","1399493300");
INSERT INTO useronlinemonth VALUES("7","142.4.97.180","142.4.97.180","142.4.97.180","","1399500841");
INSERT INTO useronlinemonth VALUES("8","62.210.215.118","62-210-215-118.poneytelecom.eu","62.210.215.118","","1400400023");
INSERT INTO useronlinemonth VALUES("9","76.164.234.18","76.164.234.18","76.164.234.18","","1399835463");
INSERT INTO useronlinemonth VALUES("10","180.76.6.55","180.76.6.55","180.76.6.55","","1400416862");
INSERT INTO useronlinemonth VALUES("11","72.233.72.155","155.72.233.72.static.reverse.ltdomains.com","72.233.72.155","","1400422292");
INSERT INTO useronlinemonth VALUES("12","180.249.242.235","180.249.242.235","180.249.242.235","","1399529241");
INSERT INTO useronlinemonth VALUES("13","14.145.50.194","14.145.50.194","14.145.50.194","","1399534006");
INSERT INTO useronlinemonth VALUES("14","80.72.37.178","host-178.etop.dev.pl","80.72.37.178","","1399547316");
INSERT INTO useronlinemonth VALUES("15","171.25.193.131","tor-exit2-readme.dfri.se","171.25.193.131","","1399540565");
INSERT INTO useronlinemonth VALUES("16","74.117.181.205","74.117.181.205","74.117.181.205","","1399545267");
INSERT INTO useronlinemonth VALUES("17","208.43.251.181","208.43.251.181-static.reverse.softlayer.com","208.43.251.181","","1400293655");
INSERT INTO useronlinemonth VALUES("18","37.239.46.42","37.239.46.42","37.239.46.42","","1399546121");
INSERT INTO useronlinemonth VALUES("19","199.80.54.23","199.80.54.23","199.80.54.23","","1399546226");
INSERT INTO useronlinemonth VALUES("20","208.88.225.19","208.88.225.19","208.88.225.19","","1399546273");
INSERT INTO useronlinemonth VALUES("21","208.88.224.203","c-r022-u0049-203.webazilla.com","208.88.224.203","","1400012966");
INSERT INTO useronlinemonth VALUES("22","199.101.134.194","199.101.134.194","199.101.134.194","","1399546321");
INSERT INTO useronlinemonth VALUES("23","199.101.134.196","199.101.134.196","199.101.134.196","","1399546383");
INSERT INTO useronlinemonth VALUES("24","180.76.5.143","baiduspider-180-76-5-143.crawl.baidu.com","180.76.5.143","","1399547248");
INSERT INTO useronlinemonth VALUES("25","217.69.133.237","fetcher4-4.p.mail.ru","217.69.133.237","","1399558655");
INSERT INTO useronlinemonth VALUES("26","50.7.109.252","50.7.109.252","50.7.109.252","","1399564884");
INSERT INTO useronlinemonth VALUES("27","208.115.111.70","208-115-111-70-reverse.wowrack.com","208.115.111.70","","1400231241");
INSERT INTO useronlinemonth VALUES("28","79.114.86.100","79-114-86-100.rdsnet.ro","79.114.86.100","","1399571273");
INSERT INTO useronlinemonth VALUES("29","5.167.8.113","5x167x8x113.dynamic.irkutsk.ertelecom.ru","5.167.8.113","","1399578555");
INSERT INTO useronlinemonth VALUES("30","180.76.5.171","baiduspider-180-76-5-171.crawl.baidu.com","180.76.5.171","","1399583468");
INSERT INTO useronlinemonth VALUES("31","194.153.113.13","194.153.113.13","194.153.113.13","","1399587634");
INSERT INTO useronlinemonth VALUES("32","180.76.5.25","baiduspider-180-76-5-25.crawl.baidu.com","180.76.5.25","","1399607390");
INSERT INTO useronlinemonth VALUES("33","180.246.106.204","180.246.106.204","180.246.106.204","","1399802586");
INSERT INTO useronlinemonth VALUES("34","125.164.46.16","16.subnet125-164-46.speedy.telkom.net.id","125.164.46.16","","1399653462");
INSERT INTO useronlinemonth VALUES("35","121.204.199.189","189.199.204.121.broad.xm.fj.dynamic.163data.com.cn","121.204.199.189","","1399628044");
INSERT INTO useronlinemonth VALUES("36","208.43.252.200","208.43.252.200-static.reverse.softlayer.com","208.43.252.200","","1400293664");
INSERT INTO useronlinemonth VALUES("37","46.246.19.178","c-46-246-19-178.anonymous.at.anonine.com","46.246.19.178","","1399633078");
INSERT INTO useronlinemonth VALUES("38","66.249.77.155","crawl-66-249-77-155.googlebot.com","66.249.77.155","","1399844974");
INSERT INTO useronlinemonth VALUES("39","91.207.5.225","225.5.207.91.unknown.SteepHost.Net","91.207.5.225","","1399644886");
INSERT INTO useronlinemonth VALUES("40","91.207.7.194","194.7.207.91.unknown.SteepHost.Net","91.207.7.194","","1400175101");
INSERT INTO useronlinemonth VALUES("41","95.28.242.50","95-28-242-50.broadband.corbina.ru","95.28.242.50","","1399670433");
INSERT INTO useronlinemonth VALUES("42","157.55.35.78","msnbot-157-55-35-78.search.msn.com","157.55.35.78","","1399679961");
INSERT INTO useronlinemonth VALUES("43","5.164.204.57","5x164x204x57.dynamic.nn.ertelecom.ru","5.164.204.57","","1399680199");
INSERT INTO useronlinemonth VALUES("44","31.41.219.173","31.41.219.173","31.41.219.173","","1399681473");
INSERT INTO useronlinemonth VALUES("45","72.46.141.50","s01.persianvps.org","72.46.141.50","","1399759461");
INSERT INTO useronlinemonth VALUES("46","195.82.154.25","vrn-nat-01.skv-telecom.ru","195.82.154.25","","1400357589");
INSERT INTO useronlinemonth VALUES("47","180.76.6.43","180.76.6.43","180.76.6.43","","1399693117");
INSERT INTO useronlinemonth VALUES("48","46.246.33.96","anon-33-96.vpn.ipredator.se","46.246.33.96","","1399697709");
INSERT INTO useronlinemonth VALUES("49","66.249.74.124","crawl-66-249-74-124.googlebot.com","66.249.74.124","","1400335050");
INSERT INTO useronlinemonth VALUES("50","125.164.59.185","185.subnet125-164-59.speedy.telkom.net.id","125.164.59.185","","1399753059");
INSERT INTO useronlinemonth VALUES("51","74.82.250.44","74.82.250.44.ifibertv.com","74.82.250.44","","1399710351");
INSERT INTO useronlinemonth VALUES("52","5.158.237.9","5.158.237.9","5.158.237.9","","1399721790");
INSERT INTO useronlinemonth VALUES("53","62.210.99.17","62-210-99-17.rev.poneytelecom.eu","62.210.99.17","","1399729535");
INSERT INTO useronlinemonth VALUES("54","88.80.57.116","57-116.izhnt.ru","88.80.57.116","","1399732459");
INSERT INTO useronlinemonth VALUES("55","50.115.161.210","50.115.161.210","50.115.161.210","","1399736993");
INSERT INTO useronlinemonth VALUES("56","69.171.230.112","69.171.230.112","69.171.230.112","","1400030875");
INSERT INTO useronlinemonth VALUES("57","65.52.242.216","65.52.242.216","65.52.242.216","","1400333992");
INSERT INTO useronlinemonth VALUES("58","202.67.45.44","202.67.45.44","202.67.45.44","","1399738176");
INSERT INTO useronlinemonth VALUES("59","180.248.31.153","180.248.31.153","180.248.31.153","","1399738467");
INSERT INTO useronlinemonth VALUES("60","36.68.241.4","36.68.241.4","36.68.241.4","","1399738543");
INSERT INTO useronlinemonth VALUES("61","180.254.8.251","180.254.8.251","180.254.8.251","","1399739438");
INSERT INTO useronlinemonth VALUES("62","23.253.68.131","23.253.68.131","23.253.68.131","","1400336224");
INSERT INTO useronlinemonth VALUES("63","36.82.2.4","36.82.2.4","36.82.2.4","","1399740296");
INSERT INTO useronlinemonth VALUES("64","180.246.80.45","180.246.80.45","180.246.80.45","","1399740507");
INSERT INTO useronlinemonth VALUES("65","69.171.247.115","69.171.247.115","69.171.247.115","","1399756348");
INSERT INTO useronlinemonth VALUES("66","66.220.152.114","out-ar114.tfbnw.net","66.220.152.114","","1400109806");
INSERT INTO useronlinemonth VALUES("67","95.79.201.252","dynamicip-95-79-201-252.pppoe.nn.ertelecom.ru","95.79.201.252","","1399742573");
INSERT INTO useronlinemonth VALUES("68","49.213.16.244","49.213.16.244","49.213.16.244","","1399742730");
INSERT INTO useronlinemonth VALUES("69","23.22.177.89","ec2-23-22-177-89.compute-1.amazonaws.com","23.22.177.89","","1399742916");
INSERT INTO useronlinemonth VALUES("70","54.198.116.226","ec2-54-198-116-226.compute-1.amazonaws.com","54.198.116.226","","1400333167");
INSERT INTO useronlinemonth VALUES("71","202.67.41.51","202.67.41.51","202.67.41.51","1.1 cache4:9003 (squid/2.7.STABLE9), 1.0 internal","1400173039");
INSERT INTO useronlinemonth VALUES("72","69.171.230.117","69.171.230.117","69.171.230.117","","1400332844");
INSERT INTO useronlinemonth VALUES("73","69.171.233.117","69.171.233.117","69.171.233.117","","1399752386");
INSERT INTO useronlinemonth VALUES("74","69.171.233.115","69.171.233.115","69.171.233.115","","1399752387");
INSERT INTO useronlinemonth VALUES("75","69.171.230.119","69.171.230.119","69.171.230.119","","1400333976");
INSERT INTO useronlinemonth VALUES("76","69.171.230.114","69.171.230.114","69.171.230.114","","1400338048");
INSERT INTO useronlinemonth VALUES("77","69.171.233.118","69.171.233.118","69.171.233.118","","1399752405");
INSERT INTO useronlinemonth VALUES("78","23.253.76.48","23.253.76.48","23.253.76.48","","1400028072");
INSERT INTO useronlinemonth VALUES("79","23.253.96.242","23.253.96.242","23.253.96.242","","1400028074");
INSERT INTO useronlinemonth VALUES("80","23.253.76.53","23.253.76.53","23.253.76.53","","1399825193");
INSERT INTO useronlinemonth VALUES("81","23.253.103.46","23.253.103.46","23.253.103.46","","1400025306");
INSERT INTO useronlinemonth VALUES("82","54.198.176.3","ec2-54-198-176-3.compute-1.amazonaws.com","54.198.176.3","","1400339310");
INSERT INTO useronlinemonth VALUES("83","54.198.176.3","ec2-54-198-176-3.compute-1.amazonaws.com","54.198.176.3","","1400339310");
INSERT INTO useronlinemonth VALUES("84","54.198.176.3","ec2-54-198-176-3.compute-1.amazonaws.com","54.198.176.3","","1400339310");
INSERT INTO useronlinemonth VALUES("85","54.80.216.119","ec2-54-80-216-119.compute-1.amazonaws.com","54.80.216.119","","1399756347");
INSERT INTO useronlinemonth VALUES("86","54.196.186.24","ec2-54-196-186-24.compute-1.amazonaws.com","54.196.186.24","","1399756348");
INSERT INTO useronlinemonth VALUES("87","69.171.247.114","69.171.247.114","69.171.247.114","","1400336661");
INSERT INTO useronlinemonth VALUES("88","54.237.43.245","ec2-54-237-43-245.compute-1.amazonaws.com","54.237.43.245","","1400030726");
INSERT INTO useronlinemonth VALUES("89","54.198.147.105","ec2-54-198-147-105.compute-1.amazonaws.com","54.198.147.105","","1399756350");
INSERT INTO useronlinemonth VALUES("90","54.81.217.98","ec2-54-81-217-98.compute-1.amazonaws.com","54.81.217.98","","1399911212");
INSERT INTO useronlinemonth VALUES("91","54.198.72.149","ec2-54-198-72-149.compute-1.amazonaws.com","54.198.72.149","","1399756350");
INSERT INTO useronlinemonth VALUES("92","107.22.54.223","ec2-107-22-54-223.compute-1.amazonaws.com","107.22.54.223","","1399756350");
INSERT INTO useronlinemonth VALUES("93","66.220.158.118","zt118.tfbnw.net","66.220.158.118","","1400029893");
INSERT INTO useronlinemonth VALUES("94","202.67.40.50","202.67.40.50","202.67.40.50","1.1 cache3:9008 (squid/2.7.STABLE9), 1.0 internal","1399757610");
INSERT INTO useronlinemonth VALUES("95","173.252.110.116","173.252.110.116","173.252.110.116","","1400170319");
INSERT INTO useronlinemonth VALUES("96","58.23.25.192","58.23.25.192","58.23.25.192","","1399759030");
INSERT INTO useronlinemonth VALUES("97","68.171.252.229","68-171-252-229.rdns.blackberry.net","68.171.252.229","BISB_3.5.1.96","1399762616");
INSERT INTO useronlinemonth VALUES("98","68.171.252.60","68-171-252-60.rdns.blackberry.net","68.171.252.60","","1399762620");
INSERT INTO useronlinemonth VALUES("99","68.171.252.13","68-171-252-13.rdns.blackberry.net","68.171.252.13","BISB_3.5.1.96","1399762731");
INSERT INTO useronlinemonth VALUES("100","68.171.252.199","68-171-252-199.rdns.blackberry.net","68.171.252.199","","1399762734");
INSERT INTO useronlinemonth VALUES("101","68.171.252.76","68-171-252-76.rdns.blackberry.net","68.171.252.76","BISB_3.5.1.96","1399762842");
INSERT INTO useronlinemonth VALUES("102","68.171.252.202","68-171-252-202.rdns.blackberry.net","68.171.252.202","","1399762845");
INSERT INTO useronlinemonth VALUES("103","69.171.230.115","69.171.230.115","69.171.230.115","","1400054822");
INSERT INTO useronlinemonth VALUES("104","8.37.224.161","8.37.224.161","202.67.40.50","","1399764063");
INSERT INTO useronlinemonth VALUES("105","69.171.230.116","69.171.230.116","69.171.230.116","","1400026916");
INSERT INTO useronlinemonth VALUES("106","8.37.224.90","8.37.224.90","202.67.40.50","","1399764907");
INSERT INTO useronlinemonth VALUES("107","202.67.41.2","202.67.41.2","202.67.41.2","","1399767318");
INSERT INTO useronlinemonth VALUES("108","206.53.152.54","206-53-152-54.rdns.blackberry.net","206.53.152.54","","1399770609");
INSERT INTO useronlinemonth VALUES("109","66.249.74.150","crawl-66-249-74-150.googlebot.com","66.249.74.150","","1399774768");
INSERT INTO useronlinemonth VALUES("110","114.79.0.243","114.79.0.243","114.79.0.243","","1399778594");
INSERT INTO useronlinemonth VALUES("111","112.215.36.142","112.215.36.142","112.215.36.142","","1399780857");
INSERT INTO useronlinemonth VALUES("112","112.215.36.145","112.215.36.145","112.215.36.145","","1399780900");
INSERT INTO useronlinemonth VALUES("113","112.215.36.144","112.215.36.144","112.215.36.144","","1399780946");
INSERT INTO useronlinemonth VALUES("114","112.215.36.143","112.215.36.143","112.215.36.143","","1399781038");
INSERT INTO useronlinemonth VALUES("115","180.76.5.65","baiduspider-180-76-5-65.crawl.baidu.com","180.76.5.65","","1400053307");
INSERT INTO useronlinemonth VALUES("116","36.74.61.255","36.74.61.255","36.74.61.255","","1399790947");
INSERT INTO useronlinemonth VALUES("117","180.76.5.69","baiduspider-180-76-5-69.crawl.baidu.com","180.76.5.69","","1399795624");
INSERT INTO useronlinemonth VALUES("118","192.95.2.161","server45.theleetech.com","192.95.2.161","","1399805806");
INSERT INTO useronlinemonth VALUES("119","94.242.222.203","ip-static-94-242-222-203.as5577.net","94.242.222.203","","1399806655");
INSERT INTO useronlinemonth VALUES("120","36.74.179.194","36.74.179.194","36.74.179.194","","1399852935");
INSERT INTO useronlinemonth VALUES("121","176.213.14.200","dynamicip-176-213-14-200.pppoe.nn.ertelecom.ru","176.213.14.200","","1399811221");
INSERT INTO useronlinemonth VALUES("122","5.158.234.168","5.158.234.168","5.158.234.168","","1399817366");
INSERT INTO useronlinemonth VALUES("123","82.145.211.26","z36-11.opera-mini.net","68.171.252.109","","1399817677");
INSERT INTO useronlinemonth VALUES("124","173.252.101.116","173.252.101.116","173.252.101.116","","1400011088");
INSERT INTO useronlinemonth VALUES("125","183.207.228.12","183.207.228.12","183.207.228.12","","1399820437");
INSERT INTO useronlinemonth VALUES("126","107.21.193.210","ec2-107-21-193-210.compute-1.amazonaws.com","107.21.193.210","","1399820545");
INSERT INTO useronlinemonth VALUES("127","36.68.239.107","36.68.239.107","36.68.239.107","","1399826347");
INSERT INTO useronlinemonth VALUES("128","162.247.73.74","wiebe.tor-exit.calyxinstitute.org","162.247.73.74","","1399833190");
INSERT INTO useronlinemonth VALUES("129","107.21.187.210","ec2-107-21-187-210.compute-1.amazonaws.com","107.21.187.210","","1399835370");
INSERT INTO useronlinemonth VALUES("130","107.22.83.91","ec2-107-22-83-91.compute-1.amazonaws.com","107.22.83.91","","1399835370");
INSERT INTO useronlinemonth VALUES("131","54.224.242.248","ec2-54-224-242-248.compute-1.amazonaws.com","54.224.242.248","","1399839762");
INSERT INTO useronlinemonth VALUES("132","182.118.21.207","hn.kd.ny.adsl","182.118.21.207","","1399840482");
INSERT INTO useronlinemonth VALUES("133","5.9.90.132","static.132.90.9.5.clients.your-server.de","5.9.90.132","","1399848968");
INSERT INTO useronlinemonth VALUES("134","188.244.36.3","broadband-188-244-36-3.2com.net","188.244.36.3","","1399870028");
INSERT INTO useronlinemonth VALUES("135","183.230.127.60","183.230.127.60","183.230.127.60","","1399881949");
INSERT INTO useronlinemonth VALUES("136","180.254.63.142","180.254.63.142","180.254.63.142","","1399883259");
INSERT INTO useronlinemonth VALUES("137","37.187.79.141","ns3367731.ovh.net","37.187.79.141","","1399883874");
INSERT INTO useronlinemonth VALUES("138","76.164.224.162","ip162.manoneharbor.com","76.164.224.162","","1400109545");
INSERT INTO useronlinemonth VALUES("139","36.84.40.147","36.84.40.147","36.84.40.147","","1399895257");
INSERT INTO useronlinemonth VALUES("140","95.108.241.252","spider-95-108-241-252.yandex.com","95.108.241.252","","1399895749");
INSERT INTO useronlinemonth VALUES("141","125.164.14.143","143.subnet125-164-14.speedy.telkom.net.id","125.164.14.143","","1399937717");
INSERT INTO useronlinemonth VALUES("142","69.171.230.118","69.171.230.118","69.171.230.118","","1400072922");
INSERT INTO useronlinemonth VALUES("143","69.171.230.113","69.171.230.113","69.171.230.113","","1400030862");
INSERT INTO useronlinemonth VALUES("144","180.254.16.111","180.254.16.111","180.254.16.111","","1399907691");
INSERT INTO useronlinemonth VALUES("145","173.252.74.117","173.252.74.117","173.252.74.117","","1400159411");
INSERT INTO useronlinemonth VALUES("146","23.253.103.176","23.253.103.176","23.253.103.176","","1400333491");
INSERT INTO useronlinemonth VALUES("147","173.252.74.116","173.252.74.116","173.252.74.116","","1400216563");
INSERT INTO useronlinemonth VALUES("148","66.220.158.114","zt114.tfbnw.net","66.220.158.114","","1400036579");
INSERT INTO useronlinemonth VALUES("149","66.220.158.112","zt112.tfbnw.net","66.220.158.112","","1400035347");
INSERT INTO useronlinemonth VALUES("150","114.124.31.39","114.124.31.39","114.124.31.39","","1399908142");
INSERT INTO useronlinemonth VALUES("151","66.220.152.119","out-ar119.tfbnw.net","66.220.152.119","","1400110029");
INSERT INTO useronlinemonth VALUES("152","173.252.73.116","173.252.73.116","173.252.73.116","","1400404715");
INSERT INTO useronlinemonth VALUES("153","141.0.9.70","s21-08.opera-mini.net","112.215.63.175","","1399908229");
INSERT INTO useronlinemonth VALUES("154","173.252.100.112","173.252.100.112","173.252.100.112","","1400039096");
INSERT INTO useronlinemonth VALUES("155","173.252.100.115","173.252.100.115","173.252.100.115","","1400457919");
INSERT INTO useronlinemonth VALUES("156","173.252.73.117","173.252.73.117","173.252.73.117","","1400372468");
INSERT INTO useronlinemonth VALUES("157","66.220.152.112","out-ar112.tfbnw.net","66.220.152.112","","1400159424");
INSERT INTO useronlinemonth VALUES("158","66.220.152.113","out-ar113.tfbnw.net","66.220.152.113","","1400138315");
INSERT INTO useronlinemonth VALUES("159","66.220.152.115","out-ar115.tfbnw.net","66.220.152.115","","1400110024");
INSERT INTO useronlinemonth VALUES("160","173.252.120.119","173.252.120.119","173.252.120.119","","1400138314");
INSERT INTO useronlinemonth VALUES("161","36.81.72.209","36.81.72.209","36.81.72.209","","1399910063");
INSERT INTO useronlinemonth VALUES("162","66.220.158.117","zt117.tfbnw.net","66.220.158.117","","1400124492");
INSERT INTO useronlinemonth VALUES("163","173.252.74.112","173.252.74.112","173.252.74.112","","1400039156");
INSERT INTO useronlinemonth VALUES("164","173.252.120.112","173.252.120.112","173.252.120.112","","1400049353");
INSERT INTO useronlinemonth VALUES("165","66.220.152.116","out-ar116.tfbnw.net","66.220.152.116","","1400109819");
INSERT INTO useronlinemonth VALUES("166","107.21.174.128","ec2-107-21-174-128.compute-1.amazonaws.com","107.21.174.128","","1399911208");
INSERT INTO useronlinemonth VALUES("167","107.21.174.128","ec2-107-21-174-128.compute-1.amazonaws.com","107.21.174.128","","1399911208");
INSERT INTO useronlinemonth VALUES("168","50.17.40.254","ec2-50-17-40-254.compute-1.amazonaws.com","50.17.40.254","","1399918624");
INSERT INTO useronlinemonth VALUES("169","54.197.201.242","ec2-54-197-201-242.compute-1.amazonaws.com","54.197.201.242","","1399911212");
INSERT INTO useronlinemonth VALUES("170","54.198.169.167","ec2-54-198-169-167.compute-1.amazonaws.com","54.198.169.167","","1399918624");
INSERT INTO useronlinemonth VALUES("171","54.80.159.151","ec2-54-80-159-151.compute-1.amazonaws.com","54.80.159.151","","1399911212");
INSERT INTO useronlinemonth VALUES("172","69.171.234.118","69.171.234.118","69.171.234.118","","1400062797");
INSERT INTO useronlinemonth VALUES("173","69.171.234.117","69.171.234.117","69.171.234.117","","1400062797");
INSERT INTO useronlinemonth VALUES("174","69.171.234.115","69.171.234.115","69.171.234.115","","1399970053");
INSERT INTO useronlinemonth VALUES("175","173.252.120.114","173.252.120.114","173.252.120.114","","1400283750");
INSERT INTO useronlinemonth VALUES("176","82.145.210.81","z16-02.opera-mini.net","114.79.16.71","","1399911883");
INSERT INTO useronlinemonth VALUES("177","66.220.158.119","zt119.tfbnw.net","66.220.158.119","","1400072372");
INSERT INTO useronlinemonth VALUES("178","66.220.158.115","zt115.tfbnw.net","66.220.158.115","","1400046892");
INSERT INTO useronlinemonth VALUES("179","173.252.73.119","173.252.73.119","173.252.73.119","","1400048205");
INSERT INTO useronlinemonth VALUES("180","69.171.247.112","69.171.247.112","69.171.247.112","","1399914246");
INSERT INTO useronlinemonth VALUES("181","69.171.247.117","69.171.247.117","69.171.247.117","","1400427192");
INSERT INTO useronlinemonth VALUES("182","223.255.229.9","subs13-223-255-229-9.three.co.id","223.255.229.9","","1399918131");
INSERT INTO useronlinemonth VALUES("183","69.171.237.14","69.171.237.14","69.171.237.14","","1400028462");
INSERT INTO useronlinemonth VALUES("184","141.0.9.19","s18-05.opera-mini.net","114.4.21.157","","1399916711");
INSERT INTO useronlinemonth VALUES("185","173.252.101.117","173.252.101.117","173.252.101.117","","1400062844");
INSERT INTO useronlinemonth VALUES("186","173.252.100.116","173.252.100.116","173.252.100.116","","1400045291");
INSERT INTO useronlinemonth VALUES("187","69.171.237.11","69.171.237.11","69.171.237.11","","1400372467");
INSERT INTO useronlinemonth VALUES("188","206.53.152.32","206-53-152-32.rdns.blackberry.net","206.53.152.32","","1399918606");
INSERT INTO useronlinemonth VALUES("189","69.171.237.15","69.171.237.15","69.171.237.15","","1399948787");
INSERT INTO useronlinemonth VALUES("190","173.252.100.113","173.252.100.113","173.252.100.113","","1400457926");
INSERT INTO useronlinemonth VALUES("191","82.145.219.55","z108-11.opera-mini.net","68.171.252.97","","1399923574");
INSERT INTO useronlinemonth VALUES("192","173.252.73.112","173.252.73.112","173.252.73.112","","1399924080");
INSERT INTO useronlinemonth VALUES("193","66.249.73.184","crawl-66-249-73-184.googlebot.com","66.249.73.184","","1400243970");
INSERT INTO useronlinemonth VALUES("194","202.67.43.20","202.67.43.20","202.67.43.20","","1399925523");
INSERT INTO useronlinemonth VALUES("195","69.171.237.9","69.171.237.9","69.171.237.9","","1400372343");
INSERT INTO useronlinemonth VALUES("196","69.171.237.10","69.171.237.10","69.171.237.10","","1400036084");
INSERT INTO useronlinemonth VALUES("197","173.252.112.117","173.252.112.117","173.252.112.117","","1399932713");
INSERT INTO useronlinemonth VALUES("198","69.171.234.119","69.171.234.119","69.171.234.119","","1400062780");
INSERT INTO useronlinemonth VALUES("199","66.220.158.116","zt116.tfbnw.net","66.220.158.116","","1400035341");
INSERT INTO useronlinemonth VALUES("200","206.53.152.214","206-53-152-214.rdns.blackberry.net","206.53.152.214","","1399933687");
INSERT INTO useronlinemonth VALUES("201","173.252.73.113","173.252.73.113","173.252.73.113","","1400334504");
INSERT INTO useronlinemonth VALUES("202","173.252.73.115","173.252.73.115","173.252.73.115","","1400072370");
INSERT INTO useronlinemonth VALUES("203","69.171.234.116","69.171.234.116","69.171.234.116","","1400036381");
INSERT INTO useronlinemonth VALUES("204","157.56.93.72","msnbot-157-56-93-72.search.msn.com","157.56.93.72","","1400416804");
INSERT INTO useronlinemonth VALUES("205","65.55.52.88","msnbot-65-55-52-88.search.msn.com","65.55.52.88","","1399937022");
INSERT INTO useronlinemonth VALUES("206","173.252.120.115","173.252.120.115","173.252.120.115","","1400032574");
INSERT INTO useronlinemonth VALUES("207","173.252.101.115","173.252.101.115","173.252.101.115","","1400030365");
INSERT INTO useronlinemonth VALUES("208","173.252.73.118","173.252.73.118","173.252.73.118","","1400042098");
INSERT INTO useronlinemonth VALUES("209","173.252.74.115","173.252.74.115","173.252.74.115","","1400343589");
INSERT INTO useronlinemonth VALUES("210","173.252.74.119","173.252.74.119","173.252.74.119","","1400124532");
INSERT INTO useronlinemonth VALUES("211","173.252.74.114","173.252.74.114","173.252.74.114","","1399938839");
INSERT INTO useronlinemonth VALUES("212","157.56.93.85","msnbot-157-56-93-85.search.msn.com","157.56.93.85","","1399942686");
INSERT INTO useronlinemonth VALUES("213","95.26.250.102","95-26-250-102.broadband.corbina.ru","95.26.250.102","","1399944952");
INSERT INTO useronlinemonth VALUES("214","157.55.35.96","msnbot-157-55-35-96.search.msn.com","157.55.35.96","","1400264151");
INSERT INTO useronlinemonth VALUES("215","176.101.18.224","224.red-176-101-18.telecablesantapola.es","176.101.18.224","","1399948192");
INSERT INTO useronlinemonth VALUES("216","173.252.101.118","173.252.101.118","173.252.101.118","","1399948774");
INSERT INTO useronlinemonth VALUES("217","173.252.110.119","173.252.110.119","173.252.110.119","","1400039162");
INSERT INTO useronlinemonth VALUES("218","173.252.112.114","173.252.112.114","173.252.112.114","","1399952240");
INSERT INTO useronlinemonth VALUES("219","69.171.234.114","69.171.234.114","69.171.234.114","","1400122636");
INSERT INTO useronlinemonth VALUES("220","65.55.52.116","msnbot-65-55-52-116.search.msn.com","65.55.52.116","","1399952429");
INSERT INTO useronlinemonth VALUES("221","157.55.35.50","msnbot-157-55-35-50.search.msn.com","157.55.35.50","","1399952872");
INSERT INTO useronlinemonth VALUES("222","173.252.100.117","173.252.100.117","173.252.100.117","","1400457925");
INSERT INTO useronlinemonth VALUES("223","157.56.229.88","msnbot-157-56-229-88.search.msn.com","157.56.229.88","","1400418731");
INSERT INTO useronlinemonth VALUES("224","157.55.33.21","msnbot-157-55-33-21.search.msn.com","157.55.33.21","","1400385428");
INSERT INTO useronlinemonth VALUES("225","173.252.100.114","173.252.100.114","173.252.100.114","","1400457889");
INSERT INTO useronlinemonth VALUES("226","125.164.15.21","21.subnet125-164-15.speedy.telkom.net.id","125.164.15.21","","1399989064");
INSERT INTO useronlinemonth VALUES("227","157.55.33.181","msnbot-157-55-33-181.search.msn.com","157.55.33.181","","1400448015");
INSERT INTO useronlinemonth VALUES("228","36.72.248.232","36.72.248.232","36.72.248.232","","1399962575");
INSERT INTO useronlinemonth VALUES("229","173.252.73.114","173.252.73.114","173.252.73.114","","1400034056");
INSERT INTO useronlinemonth VALUES("230","180.76.6.40","180.76.6.40","180.76.6.40","","1399964104");
INSERT INTO useronlinemonth VALUES("231","65.55.24.217","msnbot-65-55-24-217.search.msn.com","65.55.24.217","","1399965059");
INSERT INTO useronlinemonth VALUES("232","69.171.234.113","69.171.234.113","69.171.234.113","","1399970077");
INSERT INTO useronlinemonth VALUES("233","195.154.8.92","195-154-8-92.rev.poneytelecom.eu","195.154.8.92","","1399971331");
INSERT INTO useronlinemonth VALUES("234","37.58.100.76","37.58.100.76-static.reverse.softlayer.com","37.58.100.76","","1399974822");
INSERT INTO useronlinemonth VALUES("235","31.41.216.131","31.41.216.131","31.41.216.131","","1399980352");
INSERT INTO useronlinemonth VALUES("236","114.120.27.157","114.120.27.157","114.120.27.157","","1399980865");
INSERT INTO useronlinemonth VALUES("237","70.39.187.66","70.39.187.66","114.120.27.157","","1399980891");
INSERT INTO useronlinemonth VALUES("238","76.164.234.138","76.164.234.138","76.164.234.138","","1399982835");
INSERT INTO useronlinemonth VALUES("239","204.236.235.245","ec2-204-236-235-245.compute-1.amazonaws.com","204.236.235.245","","1400530180");
INSERT INTO useronlinemonth VALUES("240","199.115.117.242","hosted-by.leaseweb.com","199.115.117.242","","1399984349");
INSERT INTO useronlinemonth VALUES("241","173.252.110.118","173.252.110.118","173.252.110.118","","1400096845");
INSERT INTO useronlinemonth VALUES("242","134.249.39.22","134-249-39-22-broadband.kyivstar.net","134.249.39.22","","1399990987");
INSERT INTO useronlinemonth VALUES("243","180.76.5.196","baiduspider-180-76-5-196.crawl.baidu.com","180.76.5.196","","1399996021");
INSERT INTO useronlinemonth VALUES("244","110.86.165.54","54.165.86.110.broad.pt.fj.dynamic.163data.com.cn","110.86.165.54","","1400000037");
INSERT INTO useronlinemonth VALUES("245","66.220.158.113","zt113.tfbnw.net","66.220.158.113","","1400005826");
INSERT INTO useronlinemonth VALUES("246","72.46.156.18","76-164-156.unassigned.userdns.com","72.46.156.18","","1400313203");
INSERT INTO useronlinemonth VALUES("247","180.76.6.49","180.76.6.49","180.76.6.49","","1400018935");
INSERT INTO useronlinemonth VALUES("248","46.164.166.138","46-164-166-138-dynamic.retail.datagroup.ua","46.164.166.138","","1400275551");
INSERT INTO useronlinemonth VALUES("249","54.76.1.71","ec2-54-76-1-71.eu-west-1.compute.amazonaws.com","54.76.1.71","","1400020867");
INSERT INTO useronlinemonth VALUES("250","36.74.216.40","36.74.216.40","36.74.216.40","","1400035758");
INSERT INTO useronlinemonth VALUES("251","176.194.134.30","ip-176-194-134-30.bb.netbynet.ru","176.194.134.30","","1400023614");
INSERT INTO useronlinemonth VALUES("252","69.171.233.116","69.171.233.116","69.171.233.116","","1400024551");
INSERT INTO useronlinemonth VALUES("253","69.171.233.112","69.171.233.112","69.171.233.112","","1400024552");
INSERT INTO useronlinemonth VALUES("254","69.171.233.113","69.171.233.113","69.171.233.113","","1400024553");
INSERT INTO useronlinemonth VALUES("255","23.253.92.16","23.253.92.16","23.253.92.16","","1400025306");
INSERT INTO useronlinemonth VALUES("256","173.252.101.119","173.252.101.119","173.252.101.119","","1400025535");
INSERT INTO useronlinemonth VALUES("257","173.252.120.118","173.252.120.118","173.252.120.118","","1400124510");
INSERT INTO useronlinemonth VALUES("258","54.80.142.133","ec2-54-80-142-133.compute-1.amazonaws.com","54.80.142.133","","1400026187");
INSERT INTO useronlinemonth VALUES("259","68.171.236.98","bda-68-171-236-98.bise.eu.blackberry.com","68.171.236.98","BISB_3.5.1.96","1400026249");
INSERT INTO useronlinemonth VALUES("260","68.171.236.33","68.171.236.33","68.171.236.33","","1400026253");
INSERT INTO useronlinemonth VALUES("261","68.171.236.236","bda-68-171-236-236.bise.eu.blackberry.com","68.171.236.236","BISB_3.5.1.96","1400026591");
INSERT INTO useronlinemonth VALUES("262","69.171.247.119","69.171.247.119","69.171.247.119","","1400124493");
INSERT INTO useronlinemonth VALUES("263","66.220.152.117","out-ar117.tfbnw.net","66.220.152.117","","1400031851");
INSERT INTO useronlinemonth VALUES("264","206.53.152.207","206-53-152-207.rdns.blackberry.net","206.53.152.207","","1400028241");
INSERT INTO useronlinemonth VALUES("265","206.53.152.10","206-53-152-10.rdns.blackberry.net","206.53.152.10","","1400028400");
INSERT INTO useronlinemonth VALUES("266","69.171.237.8","69.171.237.8","69.171.237.8","","1400372637");
INSERT INTO useronlinemonth VALUES("267","173.252.101.112","173.252.101.112","173.252.101.112","","1400029976");
INSERT INTO useronlinemonth VALUES("268","173.252.110.112","173.252.110.112","173.252.110.112","","1400030387");
INSERT INTO useronlinemonth VALUES("269","54.196.182.16","ec2-54-196-182-16.compute-1.amazonaws.com","54.196.182.16","","1400030725");
INSERT INTO useronlinemonth VALUES("270","54.196.182.16","ec2-54-196-182-16.compute-1.amazonaws.com","54.196.182.16","","1400030725");
INSERT INTO useronlinemonth VALUES("271","114.79.62.36","114.79.62.36","114.79.62.36","","1400030841");
INSERT INTO useronlinemonth VALUES("272","173.252.120.117","173.252.120.117","173.252.120.117","","1400288493");
INSERT INTO useronlinemonth VALUES("273","82.145.216.173","z68-03.opera-mini.net","120.168.1.109","","1400031007");
INSERT INTO useronlinemonth VALUES("274","173.252.110.114","173.252.110.114","173.252.110.114","","1400031443");
INSERT INTO useronlinemonth VALUES("275","173.252.110.113","173.252.110.113","173.252.110.113","","1400034040");
INSERT INTO useronlinemonth VALUES("276","66.220.152.118","out-ar118.tfbnw.net","66.220.152.118","","1400109806");
INSERT INTO useronlinemonth VALUES("277","173.252.112.112","173.252.112.112","173.252.112.112","","1400031913");
INSERT INTO useronlinemonth VALUES("278","173.252.120.113","173.252.120.113","173.252.120.113","","1400032574");
INSERT INTO useronlinemonth VALUES("279","69.171.234.112","69.171.234.112","69.171.234.112","","1400034043");
INSERT INTO useronlinemonth VALUES("280","173.252.100.119","173.252.100.119","173.252.100.119","","1400036578");
INSERT INTO useronlinemonth VALUES("281","69.171.247.116","69.171.247.116","69.171.247.116","","1400097051");
INSERT INTO useronlinemonth VALUES("282","69.171.247.118","69.171.247.118","69.171.247.118","","1400427189");
INSERT INTO useronlinemonth VALUES("283","91.201.177.6","91.201.177.6","91.201.177.6","","1400047950");
INSERT INTO useronlinemonth VALUES("284","114.79.59.83","114.79.59.83","114.79.59.83","","1400054481");
INSERT INTO useronlinemonth VALUES("285","37.58.100.232","37.58.100.232-static.reverse.softlayer.com","37.58.100.232","","1400054726");
INSERT INTO useronlinemonth VALUES("286","208.115.113.86","208.115.113.86","208.115.113.86","","1400267572");
INSERT INTO useronlinemonth VALUES("287","37.187.73.212","ns3362720.ip-37-187-73.eu","37.187.73.212","","1400184270");
INSERT INTO useronlinemonth VALUES("288","64.246.165.210","www.whois.sc","64.246.165.210","","1400072711");
INSERT INTO useronlinemonth VALUES("289","95.25.24.240","95-25-24-240.broadband.corbina.ru","95.25.24.240","","1400081444");
INSERT INTO useronlinemonth VALUES("290","125.164.60.158","158.subnet125-164-60.speedy.telkom.net.id","125.164.60.158","","1400081682");
INSERT INTO useronlinemonth VALUES("291","114.246.88.15","114.246.88.15","114.246.88.15","","1400083856");
INSERT INTO useronlinemonth VALUES("292","173.252.100.118","173.252.100.118","173.252.100.118","","1400093979");
INSERT INTO useronlinemonth VALUES("293","208.94.233.142","c-n170-u0982-142.webazilla.com","208.94.233.142","","1400125801");
INSERT INTO useronlinemonth VALUES("294","180.76.6.66","180.76.6.66","180.76.6.66","","1400125910");
INSERT INTO useronlinemonth VALUES("295","173.252.101.113","173.252.101.113","173.252.101.113","","1400138314");
INSERT INTO useronlinemonth VALUES("296","173.252.112.115","173.252.112.115","173.252.112.115","","1400138324");
INSERT INTO useronlinemonth VALUES("297","54.83.230.14","ec2-54-83-230-14.compute-1.amazonaws.com","54.83.230.14","","1400141749");
INSERT INTO useronlinemonth VALUES("298","157.55.33.121","msnbot-157-55-33-121.search.msn.com","157.55.33.121","","1400421693");
INSERT INTO useronlinemonth VALUES("299","37.58.100.170","37.58.100.170-static.reverse.softlayer.com","37.58.100.170","","1400148138");
INSERT INTO useronlinemonth VALUES("300","36.74.204.64","36.74.204.64","36.74.204.64","","1400151157");
INSERT INTO useronlinemonth VALUES("301","157.56.93.94","msnbot-157-56-93-94.search.msn.com","157.56.93.94","","1400370880");
INSERT INTO useronlinemonth VALUES("302","65.55.24.245","msnbot-65-55-24-245.search.msn.com","65.55.24.245","","1400153962");
INSERT INTO useronlinemonth VALUES("303","157.55.32.223","msnbot-157-55-32-223.search.msn.com","157.55.32.223","","1400461515");
INSERT INTO useronlinemonth VALUES("304","178.78.113.112","178.78.113.112","178.78.113.112","","1400156748");
INSERT INTO useronlinemonth VALUES("305","173.252.110.115","173.252.110.115","173.252.110.115","","1400159395");
INSERT INTO useronlinemonth VALUES("306","69.171.237.13","69.171.237.13","69.171.237.13","","1400159411");
INSERT INTO useronlinemonth VALUES("307","173.252.74.118","173.252.74.118","173.252.74.118","","1400170332");
INSERT INTO useronlinemonth VALUES("308","66.249.73.150","crawl-66-249-73-150.googlebot.com","66.249.73.150","","1400173306");
INSERT INTO useronlinemonth VALUES("309","178.175.139.142","178-175-139-142.ip.as43289.net","178.175.139.142","","1400176989");
INSERT INTO useronlinemonth VALUES("310","157.55.32.219","msnbot-157-55-32-219.search.msn.com","157.55.32.219","","1400185901");
INSERT INTO useronlinemonth VALUES("311","157.55.35.105","msnbot-157-55-35-105.search.msn.com","157.55.35.105","","1400184656");
INSERT INTO useronlinemonth VALUES("312","157.55.35.114","msnbot-157-55-35-114.search.msn.com","157.55.35.114","","1400185617");
INSERT INTO useronlinemonth VALUES("313","157.55.32.59","msnbot-157-55-32-59.search.msn.com","157.55.32.59","","1400186002");
INSERT INTO useronlinemonth VALUES("314","157.55.33.50","msnbot-157-55-33-50.search.msn.com","157.55.33.50","","1400499732");
INSERT INTO useronlinemonth VALUES("315","157.56.92.172","msnbot-157-56-92-172.search.msn.com","157.56.92.172","","1400226152");
INSERT INTO useronlinemonth VALUES("316","157.56.92.175","msnbot-157-56-92-175.search.msn.com","157.56.92.175","","1400185863");
INSERT INTO useronlinemonth VALUES("317","157.56.92.163","msnbot-157-56-92-163.search.msn.com","157.56.92.163","","1400188071");
INSERT INTO useronlinemonth VALUES("318","157.55.32.189","msnbot-157-55-32-189.search.msn.com","157.55.32.189","","1400270414");
INSERT INTO useronlinemonth VALUES("319","157.55.33.248","msnbot-157-55-33-248.search.msn.com","157.55.33.248","","1400189616");
INSERT INTO useronlinemonth VALUES("320","157.56.92.162","msnbot-157-56-92-162.search.msn.com","157.56.92.162","","1400186742");
INSERT INTO useronlinemonth VALUES("321","157.56.93.37","msnbot-157-56-93-37.search.msn.com","157.56.93.37","","1400187655");
INSERT INTO useronlinemonth VALUES("322","65.55.52.112","msnbot-65-55-52-112.search.msn.com","65.55.52.112","","1400209205");
INSERT INTO useronlinemonth VALUES("323","157.55.33.42","msnbot-157-55-33-42.search.msn.com","157.55.33.42","","1400196496");
INSERT INTO useronlinemonth VALUES("324","157.55.33.106","msnbot-157-55-33-106.search.msn.com","157.55.33.106","","1400190763");
INSERT INTO useronlinemonth VALUES("325","157.55.33.86","msnbot-157-55-33-86.search.msn.com","157.55.33.86","","1400210849");
INSERT INTO useronlinemonth VALUES("326","157.55.32.143","msnbot-157-55-32-143.search.msn.com","157.55.32.143","","1400190881");
INSERT INTO useronlinemonth VALUES("327","157.55.33.249","msnbot-157-55-33-249.search.msn.com","157.55.33.249","","1400207471");
INSERT INTO useronlinemonth VALUES("328","157.55.35.83","msnbot-157-55-35-83.search.msn.com","157.55.35.83","","1400193406");
INSERT INTO useronlinemonth VALUES("329","157.55.32.190","msnbot-157-55-32-190.search.msn.com","157.55.32.190","","1400194896");
INSERT INTO useronlinemonth VALUES("330","157.56.93.95","msnbot-157-56-93-95.search.msn.com","157.56.93.95","","1400447254");
INSERT INTO useronlinemonth VALUES("331","157.55.33.79","msnbot-157-55-33-79.search.msn.com","157.55.33.79","","1400194337");
INSERT INTO useronlinemonth VALUES("332","157.55.33.92","msnbot-157-55-33-92.search.msn.com","157.55.33.92","","1400193798");
INSERT INTO useronlinemonth VALUES("333","157.55.33.124","msnbot-157-55-33-124.search.msn.com","157.55.33.124","","1400193862");
INSERT INTO useronlinemonth VALUES("334","157.55.36.37","msnbot-157-55-36-37.search.msn.com","157.55.36.37","","1400194084");
INSERT INTO useronlinemonth VALUES("335","180.76.5.27","baiduspider-180-76-5-27.crawl.baidu.com","180.76.5.27","","1400194931");
INSERT INTO useronlinemonth VALUES("336","180.76.6.140","180.76.6.140","180.76.6.140","","1400199351");
INSERT INTO useronlinemonth VALUES("337","157.56.229.244","msnbot-157-56-229-244.search.msn.com","157.56.229.244","","1400210562");
INSERT INTO useronlinemonth VALUES("338","157.55.33.15","msnbot-157-55-33-15.search.msn.com","157.55.33.15","","1400211507");
INSERT INTO useronlinemonth VALUES("339","157.55.36.45","msnbot-157-55-36-45.search.msn.com","157.55.36.45","","1400209840");
INSERT INTO useronlinemonth VALUES("340","157.55.34.98","msnbot-157-55-34-98.search.msn.com","157.55.34.98","","1400211857");
INSERT INTO useronlinemonth VALUES("341","157.56.92.152","msnbot-157-56-92-152.search.msn.com","157.56.92.152","","1400211364");
INSERT INTO useronlinemonth VALUES("342","157.56.229.246","msnbot-157-56-229-246.search.msn.com","157.56.229.246","","1400211193");
INSERT INTO useronlinemonth VALUES("343","157.55.36.52","msnbot-157-55-36-52.search.msn.com","157.55.36.52","","1400212088");
INSERT INTO useronlinemonth VALUES("344","65.55.24.233","msnbot-65-55-24-233.search.msn.com","65.55.24.233","","1400212105");
INSERT INTO useronlinemonth VALUES("345","180.76.5.167","baiduspider-180-76-5-167.crawl.baidu.com","180.76.5.167","","1400213628");
INSERT INTO useronlinemonth VALUES("346","38.100.21.62","38.100.21.62","38.100.21.62","","1400217043");
INSERT INTO useronlinemonth VALUES("347","36.74.206.4","36.74.206.4","36.74.206.4","","1400234063");
INSERT INTO useronlinemonth VALUES("348","64.233.172.104","google-proxy-64-233-172-104.google.com","64.233.172.104","","1400218883");
INSERT INTO useronlinemonth VALUES("349","72.14.199.104","rate-limited-proxy-72-14-199-104.google.com","72.14.199.104","","1400218997");
INSERT INTO useronlinemonth VALUES("350","157.55.32.236","msnbot-157-55-32-236.search.msn.com","157.55.32.236","","1400227362");
INSERT INTO useronlinemonth VALUES("351","157.56.92.147","msnbot-157-56-92-147.search.msn.com","157.56.92.147","","1400226620");
INSERT INTO useronlinemonth VALUES("352","157.55.35.117","msnbot-157-55-35-117.search.msn.com","157.55.35.117","","1400229003");
INSERT INTO useronlinemonth VALUES("353","157.55.35.48","msnbot-157-55-35-48.search.msn.com","157.55.35.48","","1400447194");
INSERT INTO useronlinemonth VALUES("354","157.55.33.115","msnbot-157-55-33-115.search.msn.com","157.55.33.115","","1400239522");
INSERT INTO useronlinemonth VALUES("355","157.55.32.87","msnbot-157-55-32-87.search.msn.com","157.55.32.87","","1400238798");
INSERT INTO useronlinemonth VALUES("356","157.55.35.102","msnbot-157-55-35-102.search.msn.com","157.55.35.102","","1400239019");
INSERT INTO useronlinemonth VALUES("357","157.55.33.93","msnbot-157-55-33-93.search.msn.com","157.55.33.93","","1400447577");
INSERT INTO useronlinemonth VALUES("358","66.249.73.198","crawl-66-249-73-198.googlebot.com","66.249.73.198","","1400244216");
INSERT INTO useronlinemonth VALUES("359","157.55.33.178","msnbot-157-55-33-178.search.msn.com","157.55.33.178","","1400277277");
INSERT INTO useronlinemonth VALUES("360","157.55.32.28","msnbot-157-55-32-28.search.msn.com","157.55.32.28","","1400254074");
INSERT INTO useronlinemonth VALUES("361","157.56.92.164","msnbot-157-56-92-164.search.msn.com","157.56.92.164","","1400255637");
INSERT INTO useronlinemonth VALUES("362","157.55.35.47","msnbot-157-55-35-47.search.msn.com","157.55.35.47","","1400258066");
INSERT INTO useronlinemonth VALUES("363","157.55.35.80","msnbot-157-55-35-80.search.msn.com","157.55.35.80","","1400263873");
INSERT INTO useronlinemonth VALUES("364","157.56.92.177","msnbot-157-56-92-177.search.msn.com","157.56.92.177","","1400484505");
INSERT INTO useronlinemonth VALUES("365","157.55.35.36","msnbot-157-55-35-36.search.msn.com","157.55.35.36","","1400394129");
INSERT INTO useronlinemonth VALUES("366","157.55.33.80","msnbot-157-55-33-80.search.msn.com","157.55.33.80","","1400256037");
INSERT INTO useronlinemonth VALUES("367","65.55.52.89","msnbot-65-55-52-89.search.msn.com","65.55.52.89","","1400257230");
INSERT INTO useronlinemonth VALUES("368","122.96.59.102","122.96.59.102","122.96.59.102","","1400259266");
INSERT INTO useronlinemonth VALUES("369","157.55.32.109","msnbot-157-55-32-109.search.msn.com","157.55.32.109","","1400275163");
INSERT INTO useronlinemonth VALUES("370","157.56.229.187","msnbot-157-56-229-187.search.msn.com","157.56.229.187","","1400467511");
INSERT INTO useronlinemonth VALUES("371","157.55.33.179","msnbot-157-55-33-179.search.msn.com","157.55.33.179","","1400271734");
INSERT INTO useronlinemonth VALUES("372","157.55.33.23","msnbot-157-55-33-23.search.msn.com","157.55.33.23","","1400271857");
INSERT INTO useronlinemonth VALUES("373","157.55.33.214","msnbot-157-55-33-214.search.msn.com","157.55.33.214","","1400278032");
INSERT INTO useronlinemonth VALUES("374","180.76.5.170","baiduspider-180-76-5-170.crawl.baidu.com","180.76.5.170","","1400277827");
INSERT INTO useronlinemonth VALUES("375","157.55.35.100","msnbot-157-55-35-100.search.msn.com","157.55.35.100","","1400360429");
INSERT INTO useronlinemonth VALUES("376","157.55.33.125","msnbot-157-55-33-125.search.msn.com","157.55.33.125","","1400281141");
INSERT INTO useronlinemonth VALUES("377","65.55.24.246","msnbot-65-55-24-246.search.msn.com","65.55.24.246","","1400280626");
INSERT INTO useronlinemonth VALUES("378","157.55.34.177","msnbot-157-55-34-177.search.msn.com","157.55.34.177","","1400283397");
INSERT INTO useronlinemonth VALUES("379","101.71.37.128","101.71.37.128","101.71.37.128","","1400283570");
INSERT INTO useronlinemonth VALUES("380","91.239.129.37","91.239.129.37","91.239.129.37","","1400470478");
INSERT INTO useronlinemonth VALUES("381","178.32.144.63","178.32.144.63","178.32.144.63","","1400284186");
INSERT INTO useronlinemonth VALUES("382","157.55.33.25","msnbot-157-55-33-25.search.msn.com","157.55.33.25","","1400285678");
INSERT INTO useronlinemonth VALUES("383","157.56.229.190","msnbot-157-56-229-190.search.msn.com","157.56.229.190","","1400288277");
INSERT INTO useronlinemonth VALUES("384","199.59.148.210","r-199-59-148-210.twttr.com","199.59.148.210","","1400288495");
INSERT INTO useronlinemonth VALUES("385","37.239.46.10","37.239.46.10","37.239.46.10","","1400290213");
INSERT INTO useronlinemonth VALUES("386","157.55.36.39","msnbot-157-55-36-39.search.msn.com","157.55.36.39","","1400296649");
INSERT INTO useronlinemonth VALUES("387","157.55.35.94","msnbot-157-55-35-94.search.msn.com","157.55.35.94","","1400291423");
INSERT INTO useronlinemonth VALUES("388","157.55.33.84","msnbot-157-55-33-84.search.msn.com","157.55.33.84","","1400293882");
INSERT INTO useronlinemonth VALUES("389","180.76.6.65","180.76.6.65","180.76.6.65","","1400315953");
INSERT INTO useronlinemonth VALUES("390","69.171.247.113","69.171.247.113","69.171.247.113","","1400322776");
INSERT INTO useronlinemonth VALUES("391","125.164.6.177","177.subnet125-164-6.speedy.telkom.net.id","125.164.6.177","","1400334205");
INSERT INTO useronlinemonth VALUES("392","66.249.79.134","crawl-66-249-79-134.googlebot.com","66.249.79.134","","1400415941");
INSERT INTO useronlinemonth VALUES("393","66.249.79.70","crawl-66-249-79-70.googlebot.com","66.249.79.70","","1400375315");
INSERT INTO useronlinemonth VALUES("394","54.76.36.206","ec2-54-76-36-206.eu-west-1.compute.amazonaws.com","54.76.36.206","","1400333294");
INSERT INTO useronlinemonth VALUES("395","110.139.65.26","26.subnet110-139-65.speedy.telkom.net.id","110.139.65.26","","1400335720");
INSERT INTO useronlinemonth VALUES("396","180.247.145.58","180.247.145.58","180.247.145.58","","1400335553");
INSERT INTO useronlinemonth VALUES("397","66.249.79.102","crawl-66-249-79-102.googlebot.com","66.249.79.102","","1400407726");
INSERT INTO useronlinemonth VALUES("398","54.82.177.129","ec2-54-82-177-129.compute-1.amazonaws.com","54.82.177.129","","1400339309");
INSERT INTO useronlinemonth VALUES("399","207.241.226.217","wwwb-app17.us.archive.org","207.241.226.217","","1400341522");
INSERT INTO useronlinemonth VALUES("400","180.76.5.21","baiduspider-180-76-5-21.crawl.baidu.com","180.76.5.21","","1400344860");
INSERT INTO useronlinemonth VALUES("401","66.249.79.38","crawl-66-249-79-38.googlebot.com","66.249.79.38","","1400356141");
INSERT INTO useronlinemonth VALUES("402","66.249.79.6","crawl-66-249-79-6.googlebot.com","66.249.79.6","","1400356141");
INSERT INTO useronlinemonth VALUES("403","157.55.35.37","msnbot-157-55-35-37.search.msn.com","157.55.35.37","","1400357316");
INSERT INTO useronlinemonth VALUES("404","157.55.35.41","msnbot-157-55-35-41.search.msn.com","157.55.35.41","","1400360349");
INSERT INTO useronlinemonth VALUES("405","157.55.32.222","msnbot-157-55-32-222.search.msn.com","157.55.32.222","","1400360409");
INSERT INTO useronlinemonth VALUES("406","157.55.32.225","msnbot-157-55-32-225.search.msn.com","157.55.32.225","","1400362590");
INSERT INTO useronlinemonth VALUES("407","38.111.147.83","cr3.iparadigms.com","38.111.147.83","","1400361549");
INSERT INTO useronlinemonth VALUES("408","218.104.148.195","218.104.148.195","218.104.148.195","","1400361814");
INSERT INTO useronlinemonth VALUES("409","157.56.93.39","msnbot-157-56-93-39.search.msn.com","157.56.93.39","","1400362189");
INSERT INTO useronlinemonth VALUES("410","65.55.52.94","msnbot-65-55-52-94.search.msn.com","65.55.52.94","","1400366169");
INSERT INTO useronlinemonth VALUES("411","208.53.152.21","MTA21.PMXA-NET.net","208.53.152.21","","1400365297");
INSERT INTO useronlinemonth VALUES("412","180.76.5.19","baiduspider-180-76-5-19.crawl.baidu.com","180.76.5.19","","1400369197");
INSERT INTO useronlinemonth VALUES("413","157.55.33.28","msnbot-157-55-33-28.search.msn.com","157.55.33.28","","1400390269");
INSERT INTO useronlinemonth VALUES("414","157.55.35.101","msnbot-157-55-35-101.search.msn.com","157.55.35.101","","1400370540");
INSERT INTO useronlinemonth VALUES("415","157.55.35.98","msnbot-157-55-35-98.search.msn.com","157.55.35.98","","1400370902");
INSERT INTO useronlinemonth VALUES("416","120.40.157.108","120.40.157.108","120.40.157.108","","1400372381");
INSERT INTO useronlinemonth VALUES("417","157.55.32.49","msnbot-157-55-32-49.search.msn.com","157.55.32.49","","1400377540");
INSERT INTO useronlinemonth VALUES("418","157.56.93.153","msnbot-157-56-93-153.search.msn.com","157.56.93.153","","1400378580");
INSERT INTO useronlinemonth VALUES("419","157.55.35.109","msnbot-157-55-35-109.search.msn.com","157.55.35.109","","1400378601");
INSERT INTO useronlinemonth VALUES("420","140.0.70.117","fm-dyn-140-0-70-117.fast.net.id","140.0.70.117","","1400383448");
INSERT INTO useronlinemonth VALUES("421","157.55.33.47","msnbot-157-55-33-47.search.msn.com","157.55.33.47","","1400383548");
INSERT INTO useronlinemonth VALUES("422","65.55.52.113","msnbot-65-55-52-113.search.msn.com","65.55.52.113","","1400383609");
INSERT INTO useronlinemonth VALUES("423","180.76.6.134","180.76.6.134","180.76.6.134","","1400384840");
INSERT INTO useronlinemonth VALUES("424","157.55.32.96","msnbot-157-55-32-96.search.msn.com","157.55.32.96","","1400385348");
INSERT INTO useronlinemonth VALUES("425","157.56.229.185","msnbot-157-56-229-185.search.msn.com","157.56.229.185","","1400453703");
INSERT INTO useronlinemonth VALUES("426","157.55.34.168","msnbot-157-55-34-168.search.msn.com","157.55.34.168","","1400390228");
INSERT INTO useronlinemonth VALUES("427","157.55.32.88","msnbot-157-55-32-88.search.msn.com","157.55.32.88","","1400433152");
INSERT INTO useronlinemonth VALUES("428","95.79.122.205","dynamicip-95-79-122-205.pppoe.nn.ertelecom.ru","95.79.122.205","","1400391183");
INSERT INTO useronlinemonth VALUES("429","157.56.93.103","msnbot-157-56-93-103.search.msn.com","157.56.93.103","","1400391209");
INSERT INTO useronlinemonth VALUES("430","65.55.52.86","msnbot-65-55-52-86.search.msn.com","65.55.52.86","","1400391248");
INSERT INTO useronlinemonth VALUES("431","157.55.34.93","msnbot-157-55-34-93.search.msn.com","157.55.34.93","","1400397044");
INSERT INTO useronlinemonth VALUES("432","157.55.32.100","msnbot-157-55-32-100.search.msn.com","157.55.32.100","","1400396065");
INSERT INTO useronlinemonth VALUES("433","216.244.80.18","216.244.80.18","216.244.80.18","","1400396457");
INSERT INTO useronlinemonth VALUES("434","37.58.100.92","37.58.100.92-static.reverse.softlayer.com","37.58.100.92","","1400402719");
INSERT INTO useronlinemonth VALUES("435","39.250.19.135","39.250.19.135","39.250.19.135","","1400404714");
INSERT INTO useronlinemonth VALUES("436","36.74.220.99","36.74.220.99","36.74.220.99","","1400428487");
INSERT INTO useronlinemonth VALUES("437","109.194.231.145","109x194x231x145.dynamic.nn.ertelecom.ru","109.194.231.145","","1400408961");
INSERT INTO useronlinemonth VALUES("438","65.55.52.87","msnbot-65-55-52-87.search.msn.com","65.55.52.87","","1400453183");
INSERT INTO useronlinemonth VALUES("439","157.55.32.112","msnbot-157-55-32-112.search.msn.com","157.55.32.112","","1400483253");
INSERT INTO useronlinemonth VALUES("440","75.98.173.204","gros.com.br","75.98.173.204","","1400426107");
INSERT INTO useronlinemonth VALUES("441","107.167.99.121","s21-02-04.opera-mini.net","125.164.100.81","","1400428167");
INSERT INTO useronlinemonth VALUES("442","180.76.6.147","180.76.6.147","180.76.6.147","","1400428253");
INSERT INTO useronlinemonth VALUES("443","157.56.93.42","msnbot-157-56-93-42.search.msn.com","157.56.93.42","","1400430665");
INSERT INTO useronlinemonth VALUES("444","157.56.92.141","msnbot-157-56-92-141.search.msn.com","157.56.92.141","","1400433136");
INSERT INTO useronlinemonth VALUES("445","157.55.34.180","msnbot-157-55-34-180.search.msn.com","157.55.34.180","","1400437391");
INSERT INTO useronlinemonth VALUES("446","36.74.183.217","36.74.183.217","36.74.183.217","","1400441737");
INSERT INTO useronlinemonth VALUES("447","157.55.33.182","msnbot-157-55-33-182.search.msn.com","157.55.33.182","","1400445050");
INSERT INTO useronlinemonth VALUES("448","67.159.8.164","pleasantsystem.tripinsurancequotes.info","67.159.8.164","","1400446897");
INSERT INTO useronlinemonth VALUES("449","157.55.32.82","msnbot-157-55-32-82.search.msn.com","157.55.32.82","","1400447375");
INSERT INTO useronlinemonth VALUES("450","157.56.229.87","msnbot-157-56-229-87.search.msn.com","157.56.229.87","","1400448054");
INSERT INTO useronlinemonth VALUES("451","37.221.161.234","lh22121.voxility.net","37.221.161.234","","1400448115");
INSERT INTO useronlinemonth VALUES("452","107.21.76.184","ec2-107-21-76-184.compute-1.amazonaws.com","107.21.76.184","","1400462833");
INSERT INTO useronlinemonth VALUES("453","107.22.51.67","ec2-107-22-51-67.compute-1.amazonaws.com","107.22.51.67","","1400462834");
INSERT INTO useronlinemonth VALUES("454","157.55.33.101","msnbot-157-55-33-101.search.msn.com","157.55.33.101","","1400467668");
INSERT INTO useronlinemonth VALUES("455","157.55.33.180","msnbot-157-55-33-180.search.msn.com","157.55.33.180","","1400467949");
INSERT INTO useronlinemonth VALUES("456","157.55.32.227","msnbot-157-55-32-227.search.msn.com","157.55.32.227","","1400470490");
INSERT INTO useronlinemonth VALUES("457","65.55.52.114","msnbot-65-55-52-114.search.msn.com","65.55.52.114","","1400470529");
INSERT INTO useronlinemonth VALUES("458","180.76.6.152","180.76.6.152","180.76.6.152","","1400476792");
INSERT INTO useronlinemonth VALUES("459","67.228.177.110","67.228.177.110-static.reverse.softlayer.com","67.228.177.110","","1400481747");
INSERT INTO useronlinemonth VALUES("460","157.55.33.44","msnbot-157-55-33-44.search.msn.com","157.55.33.44","","1400483266");
INSERT INTO useronlinemonth VALUES("461","54.204.40.155","ec2-54-204-40-155.compute-1.amazonaws.com","54.204.40.155","","1400483620");
INSERT INTO useronlinemonth VALUES("462","38.99.62.89","38.99.62.89","38.99.62.89","","1400483760");
INSERT INTO useronlinemonth VALUES("463","109.73.120.131","109.73.120.131","109.73.120.131","","1400484092");
INSERT INTO useronlinemonth VALUES("464","157.55.35.42","msnbot-157-55-35-42.search.msn.com","157.55.35.42","","1400485107");
INSERT INTO useronlinemonth VALUES("465","157.55.33.31","msnbot-157-55-33-31.search.msn.com","157.55.33.31","","1400485125");
INSERT INTO useronlinemonth VALUES("466","157.55.34.181","msnbot-157-55-34-181.search.msn.com","157.55.34.181","","1400488930");
INSERT INTO useronlinemonth VALUES("467","157.55.32.103","msnbot-157-55-32-103.search.msn.com","157.55.32.103","","1400486625");
INSERT INTO useronlinemonth VALUES("468","88.198.227.103","static.88-198-227-103.clients.your-server.de","88.198.227.103","","1400487688");
INSERT INTO useronlinemonth VALUES("469","67.214.165.6",".","67.214.165.6","","1400487731");
INSERT INTO useronlinemonth VALUES("470","157.55.35.77","msnbot-157-55-35-77.search.msn.com","157.55.35.77","","1400487925");
INSERT INTO useronlinemonth VALUES("471","157.55.34.105","msnbot-157-55-34-105.search.msn.com","157.55.34.105","","1400489744");
INSERT INTO useronlinemonth VALUES("472","176.9.78.7","static.7.78.9.176.clients.your-server.de","176.9.78.7","","1400489941");
INSERT INTO useronlinemonth VALUES("473","54.82.240.90","ec2-54-82-240-90.compute-1.amazonaws.com","54.82.240.90","","1400492022");
INSERT INTO useronlinemonth VALUES("474","157.55.34.99","msnbot-157-55-34-99.search.msn.com","157.55.34.99","","1400492508");
INSERT INTO useronlinemonth VALUES("475","157.55.35.87","msnbot-157-55-35-87.search.msn.com","157.55.35.87","","1400492530");
INSERT INTO useronlinemonth VALUES("476","207.244.73.5","207.244.73.5","207.244.73.5","","1400496218");
INSERT INTO useronlinemonth VALUES("477","176.9.25.25","static.25.25.9.176.clients.your-server.de","176.9.25.25","","1400498533");
INSERT INTO useronlinemonth VALUES("478","125.164.36.201","201.subnet125-164-36.speedy.telkom.net.id","125.164.36.201","","1400504563");
INSERT INTO useronlinemonth VALUES("479","157.55.32.111","msnbot-157-55-32-111.search.msn.com","157.55.32.111","","1400499910");
INSERT INTO useronlinemonth VALUES("480","157.55.33.22","msnbot-157-55-33-22.search.msn.com","157.55.33.22","","1400499509");
INSERT INTO useronlinemonth VALUES("481","157.55.35.104","msnbot-157-55-35-104.search.msn.com","157.55.35.104","","1400504538");
INSERT INTO useronlinemonth VALUES("482","157.55.34.100","msnbot-157-55-34-100.search.msn.com","157.55.34.100","","1400504418");
INSERT INTO useronlinemonth VALUES("483","188.40.45.81","mediadb.ru","188.40.45.81","","1400506484");
INSERT INTO useronlinemonth VALUES("484","208.90.57.196","nat-vlan550.las1.sco.cisco.com","208.90.57.196","","1400532245");
INSERT INTO useronlinemonth VALUES("485","36.74.214.175","36.74.214.175","36.74.214.175","","1400537545");
INSERT INTO useronlinemonth VALUES("486","79.133.204.134","79.133.204.134","79.133.204.134","","1400536646");
INSERT INTO useronlinemonth VALUES("487","5.164.251.202","5x164x251x202.dynamic.nn.ertelecom.ru","5.164.251.202","","1400533312");



DROP TABLE users;

CREATE TABLE `users` (
  `UserId` int(15) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL DEFAULT '',
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `level` enum('Administrator','User') NOT NULL DEFAULT 'User',
  `nama` varchar(50) NOT NULL,
  `handphone` varchar(15) NOT NULL DEFAULT '',
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL DEFAULT '',
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `web` varchar(50) NOT NULL DEFAULT '',
  `ym` varchar(25) NOT NULL DEFAULT '',
  `tipe` varchar(5) NOT NULL DEFAULT '',
  `buddylist` varchar(250) NOT NULL DEFAULT '{"Admin":["administrator","admin","editor","webmaster"]}',
  `is_online` int(5) NOT NULL DEFAULT '0',
  `last_ping` text NOT NULL,
  `start` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `exp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1","admin","dc7b625b7b8ad55a1d9f3f9c53b71d6f","webmaster@teamworks.co.id","Administrator","Ismail Marzuki","6282166000063","Surabaya","Indonesia","f3a73baa803825cedeaaa13bc979462e.jpg","www.teamworks.co.id","cow_ngalam","aktif","{\"Admin\":[\"admin\",\"administrator\",\"webmaster\"]}","1","2014-05-20 02:29:21","2010-08-27 00:00:00","2034-08-27 00:00:00");
INSERT INTO users VALUES("2","kerangalam","f6e34ee7a24fab1bc115f55b3b005fbc","cow_ngalam@yahoo.co.id","User","","","","","","","","aktif","{\"Admin\":[\"administrator\",\"admin\",\"editor\",\"webmaster\"]}","0","","0000-00-00 00:00:00","0000-00-00 00:00:00");



DROP TABLE widget;

CREATE TABLE `widget` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `widget` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `code` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO widget VALUES("1","None","");
INSERT INTO widget VALUES("2","Widget Small","<!-- AddThis Button BEGIN -->
INSERT INTO widget VALUES("3","Widget Big","<!-- AddThis Button BEGIN -->



DROP TABLE widget_uc;

CREATE TABLE `widget_uc` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `widget` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `code` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO widget_uc VALUES("1","none","");
INSERT INTO widget_uc VALUES("2","uc small","<table><tr><td align=\"center\">
INSERT INTO widget_uc VALUES("3","uc big","<table><tr><td align=\"center\">


