DROP TABLE actions;

CREATE TABLE `actions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `modul` varchar(20) NOT NULL DEFAULT '',
  `posisi` int(1) NOT NULL DEFAULT '0',
  `ordering` int(3) NOT NULL DEFAULT '0',
  `modul_id` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `modul_id` (`modul_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO actions VALUES("2","berita","1","0","12");
INSERT INTO actions VALUES("3","berita","1","1","9");



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

INSERT INTO admin VALUES("1","Posting","#","0","1","0","<span class=\"glyphicon glyphicon-edit\"></span>");
INSERT INTO admin VALUES("2","Pengaturan","#","0","3","0","<span class=\"glyphicon glyphicon-cog\"></span>");
INSERT INTO admin VALUES("3","Tools","#","0","4","0","<span class=\"glyphicon glyphicon-wrench\"></span>");
INSERT INTO admin VALUES("4","Tampilan","#","0","2","0","<span class=\"glyphicon glyphicon-align-justify\"></span>");
INSERT INTO admin VALUES("5","Plugins","#","0","5","0","<span class=\"glyphicon glyphicon-random\"></span>");
INSERT INTO admin VALUES("6","Berita","berita","1","1","1","");
INSERT INTO admin VALUES("7","Halaman","halaman","0","1","1","");
INSERT INTO admin VALUES("8","Menu","menu","0","1","4","");
INSERT INTO admin VALUES("9","Media Library","files","0","1","1","");
INSERT INTO admin VALUES("10","General","pengaturan","0","5","2","");
INSERT INTO admin VALUES("11","Statistik","statistik","1","1","3","");
INSERT INTO admin VALUES("12","Action Widgets","actions","0","1","4","");
INSERT INTO admin VALUES("13","Users","users","0","1","3","");
INSERT INTO admin VALUES("14","Themes","themes","0","1","4","");
INSERT INTO admin VALUES("15","Widgets","widgets","0","1","4","");
INSERT INTO admin VALUES("16","Foto","foto","1","1","5","");
INSERT INTO admin VALUES("17","Kalender","kalender","1","1","5","");
INSERT INTO admin VALUES("18","Download","download","1","1","5","");
INSERT INTO admin VALUES("19","Links","links","1","1","5","");
INSERT INTO admin VALUES("20","Database","database","0","2","3","");



DROP TABLE berita;

CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user` varchar(20) NOT NULL DEFAULT '',
  `judul` varchar(100) NOT NULL DEFAULT '',
  `kid` int(11) NOT NULL DEFAULT '0',
  `konten` text NOT NULL,
  `publikasi` int(1) NOT NULL DEFAULT '0',
  `fitur` int(2) NOT NULL DEFAULT '0',
  `tags` varchar(100) NOT NULL DEFAULT '',
  `gambar` text NOT NULL,
  `slug` varchar(100) NOT NULL DEFAULT '',
  `caption` varchar(100) NOT NULL DEFAULT '',
  `hits` int(11) NOT NULL DEFAULT '0',
  `sumber` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO berita VALUES("1","2014-05-08 05:00:36","admin","Osob Kiwalan (Bahasa Kebalikan), Bahasa Budaya Arek Malang","4","<p><strong>Mengenal Bahasa Walikan, Bahasa Budaya Arek Malang</strong><br />Bahasa Walikan merupakan bahasa komunikasi khas orang Malang. Bahasa Walikan ini sudah menjadi bagian dari Arek-arek Malang sehari-hari, siapapun yang asli Malang atau sudah lama tinggal di Malang pasti sudah familiar dengan bahasa Walikan.<br /><br />Memang belum ada kesimpulan pasti kapan bahasa Walikan ini bermula dan bagaimana asalnya. Hanya diperkirakan, bahasa walikan ini pertama-tama muncul ketika Malang mulai melakukan perlawanan terhadap penjajah (Belanda). Perang gerilya rakyat Malang terhadap penjajah terjadi dalam berbagai periode sejak Belanda masuk Malang tahun 1767 hingga setelah Proklamasi Kemerdekaan ketika Belanda masih belum rela Indonesia merdeka, penjajah kembali melakukan percobaan penjajahan yang dalam sejarah di kenal dengan agresi I dan agresi II. Kita ketahui bahwa Malang adalah medan perang yang dahsyat kala itu karena di Malang merupakan salah satu pangkalan utama kekuatan Belanda di Nusantara.<br />&nbsp;<br />Besar kemungkinan bahasa Walikan muncul ketika terjadi perang gerilya sebelum era kemerdekaan, dimana antar pejuang mencari cara agar komunikasi dan koordinasi lisan yang sulit dipahami oleh musuh atau mata-mata penjajah. Ratusan tahun lamanya Belanda di Malang pasti sudah paham bahasa umum apalagi Belanda memiliki mata-mata yang juga warga pribumi. Maka dilakukanlah strategi komunikasi untuk mengirim pesan rahasia antar pejuang, atau untuk saling mengenal dan identifikasi dengan menggunakan bahasa yang sulit dideteksi maknanya yaitu bahasa Walikan.<br />&nbsp;<br />Bila memang kesimpulan ini benar adanya, maka bahasa Walikan adalah bahasa sandi para pejuang dalam pengertian yang sederhana untuk saling berkomunikasi, berkoordinasi atau mengidentifikasi mana rekan perjuangan dan mana yang bukan. Bahasa walikan juga adalah bahasa yang digunakan sehari-hari yang dimaksudkan untuk menyamarkan inti komunikasi. Paling tidak, dengan menggunakan bahasa walikan maka lawan memerlukan waktu untuk mengerti maksudnya dan atau kawan akan lebih mudah mengenal rekannya. Bagi orang yang tidak terbiasa maka sulit memahami makna dari bahasa walikan, sehingga bahasa walikan memang tepat sebagai bahasa sandi sederhana ketika situasi perang dimana kehidupan penuh dengan kecurigaan, teror dan bahaya.<br />&nbsp;<br />Kita ulas dulu bagaimana gambaran contoh bahasa walikan. Bahasa walikan adalah jenis komunikasi khas orang Malang yang dibunyikan atau ditulis terbalik dari bahasa sehari-hari orang Malang yaitu bahasa Jawa Timuran. Contoh dari bahasa walikan dan artinya adalah:</p>\n<ul>\n<li>Sam bahasa walikannya Mas</li>\n<li>Kera Ngalam = Arek Malang</li>\n<li>Kadit Itreng = Tidak Ngerti</li>\n<li>Oyi = Iyo atau Iya</li>\n<li>Ongis Nade = Singo Edan (Singa Gila)</li>\n<li>Ojob atau Ujub = Bojo (Istri / Kekasih)</li>\n<li>Kunam = Manuk (Burung)</li>\n<li>Kodew = Wedok (Cewek)</li>\n<li>Nawak = Kawan</li>\n<li>Dll</li>\n</ul>\n<p>Bahasa Walikan juga bisa fleksibel dan menyesuaikan dengan dialek Malangan sehingga tidak sertamerta semua kata dibalik seperti biasanya, contohnya:</p>\n<ul>\n<li>Uklam-uklam = Mlaku-mlaku (Jalan-jalan)</li>\n<li>Genaro Ngalam = Orang Malang</li>\n<li>Silup = Polisi</li>\n<li>Salam Utas Awij = Salam Satu Jiwa (Semboyan Aremania/Aremanita)</li>\n<li>Oyi Ker = Iyo Rek</li>\n<li>Kiwalan = Walikan</li>\n<li>Dst</li>\n</ul>\n<p>Jadi, bahasa walikan diperkirakan lahir ketika rakyat Malang memerlukan cara kreatif untuk berkomunikasi yang aman di jaman perang melawan penjajah.<br />Dan hingga kini bahasa walikan tetap dilestarikan sebagai bahasa khas Malangan, yang biasa digunakan oleh siapa saja dan dimana saja. Bahasa walikan sudah menjadi bahasa keakraban antar sesama arek Malang dan juga sering digunakan oleh orang luar Malang yang tinggal di Malang. Bila ada orang yang bertutur sapa dengan bahasa walikan maka bisa dipastikan mereka cukup akrab satu sama lain. Jadi bahasa walikan adalah bahasa budaya arek Malang yang menunjukkan solidaritas dan keguyuban.<br />&nbsp;<br />Menariknya, bahasa walikan (atau juga disebut Boso Kiwalan) sebagai bahasa budaya orang Malang cukup populer di kalangan muda yang biasanya kurang berminat pada produk kebudayaan. Ini menunjukkan bahwa bahasa walikan merupakan produk budaya lama yang menarik dan trendi di jaman modern dan bahasa ini akan langgeng selamanya, karena memang sudah menyatu sebagai salah satu bahasa publik.<br />&nbsp;<br />Sarannya, bagaimana agar bahasa walikan ini dibuatkan kamus sehingga walikan semakin kaya dengan kosakata serta semakin melekat dengan komunikasi keseharian masyarakat Malang.<br />Mengingat bahasa walikan bisa menambah keakraban maka harapannya bagaimana bahasa walikan ini perlu digunakan diberbagai pentas atau acara-acara publik bahkan perlu ada segmen khusus di media massa / TV dengan menggunakan bahasa walikan...</p>","1","0","ngalam,osob kiwalan,ngalaman,aremania,ngalamania","","osob-kiwalan-bahasa-kebalikan-bahasa-budaya-arek-malang","teamworks.co.id","66","");
INSERT INTO berita VALUES("2","2014-05-10 18:58:06","admin","#HardDisk Alam","6","<p>Semua aktifitas manusia akan sangat terekam dengan sangat jelas di tulang ekor. Juga yang berhubungan dengan orang orang lain, karena rekaman itu akan mencatat dengan sangat detail dan spesifik</p>\n<p>Oleh: <strong>dr. Zaidul Akbar </strong></p>\n<p><strong>BEBERAPA</strong> hari ini saya menulis tentang judul di atas di <em>twitter</em> saya. Awal tulisan tersebut berawal dari pemikiran saya bagaimana Allah Subhanahu Wata&rsquo;ala begitu detail dan sangat teliti menuliskan perbuatan hamba-hambaNya dalam kitab mereka yang disebut Sijjin dan Illiyin.</p>\n<p>كَلَّا إِنَّ كِتَابَ الفُجَّارِ لَفِي سِجِّينٍ<br /> وَمَا أَدْرَاكَ مَا سِجِّينٌ</p>\n<p><em>&ldquo;Sekali-kali jangan curang, karena sesungguhnya kitab orang yang durhaka tersimpan dalam Sijjin. Tahukah kamu apakah Sijjin itu?&rdquo;</em> (QS: Al Muthaffif [83]:7-8)</p>\n<p>Sijjin adalah nama kitab yang mencatat segala perbuatan orang-orang yang durhaka. Sedangkan Illiyyin merupakan kitab yang mencatat segala perbuatan orang-orang berbakti, yang disaksikan malaikat-malaikat yang didekatkan kepada Allah.</p>\n<p>Bagaimana Allah merekam semua itu dengan cara yang sangat teliti, ternyata hal ini dengan sangat mudah dijelaskan dan Alam semesta mencatatat itu semua dengan sangat teliti dengan cara Allah mengutus malaikat Rakib dan Atid yang sangat teliti.</p>\n<p>Karena semua manusia terkoneksi dengan sangat sempurna melalui gelombang gelombang dan energi yang sama, maka setiap interaksi antara manusia yang satu dengan yang lain maka semua akan terekam dalam &ldquo;pita&rdquo; rekaman berisi molekul-molekul karbon, hidrogen yang ternyata semuanya itu disimpan dengan sangat rapih dan sangat terjaga&nbsp; di dalam tubuh manusia itu sendiri yaitu di tulang ekornya yang tahan banting, tahan panas, dan menyimpan dengan rapi interaksi antara molekul molekul hidrogen yang terus berotasi atau spin dalam tubuhnya sepanjang energi listrik dari tubuhnya melalui jantung nya masih ada.</p>\n<p>Hal ini menyebabkan spin itu akan terekam dengan sangat jelas dalam Pita Rekaman tubuh nya yang tesimpan di tulang ekor, bagaimana begitu detail? Karena molekul terkecil yang diketahui ilmuwan adalah Quark yang besarnya 10 pangkat minus 18. Artinya dengan kecilnya seperti itu, maka otomatis, ia akan sangat detail berotasi pada pita pita rekaman kehidupannya.</p>\n<p>Dan semuanya dapat diputar kembali dengan sangat detail pula dan spesifik, tanggal tahun, semua aktifitas manusia akan sangat terekam dengan sangat jelas di tulang ekor tadi yang semuanya juga berhubungan dengan orang orang lain, karena rekaman itu akan mencatat dengan sangat detail dan spesifik,kapan, di mana, detiknya, dan siapa saja yang terlibat.</p>\n<p>Dan rekaman tersebut takkan bisa terhapus, dan akan tercatat terus, urusan ampunan dan RahmatNya itu hanya urusanNya saja, bukan urusan kita.</p>\n<p>Sekarang pertanyaannya adalah bagaimana rekaman kehidupan kita?&nbsp; Mungkin kita sudah lupa, tapi alat perekam itu masih menyimpan data data itu semua tanpa meleset sedikitpun. [Hidayatullah]</p>","1","0","harddisk,alam","20140510-200757.jpg","harddisk-alam","Allahu Akbar.. Allah Maha Besar..","69","http://www.kajianislam.net/2014/04/harddisk-alam/");
INSERT INTO berita VALUES("3","2014-04-10 20:03:07","admin","Sel juga Bertasbih","6","<p>Menariknya sel sel tubuh manusia ternyata mampu melaksanakan itu semua tanpa sedikitpun ada campur tangan dari manusia itu sendiri, artinya mereka melakukan itu karena ada kekuatan yang Maha Agung nan Maha dahsyat</p>\n<p>oleh: dr Zaidul Akbar</p>\n<p><strong>SEMUA</strong> yang ada di Langit dan di bumi bertasbih memujiNya, sebagaimana dalam Quran Surat An-nuur: 41. Ayat ini sangat sering kita baca dan dapatkan di dalam Al-Quran, namun bagaimana sebenarnya Sel sel yang ada di dalam tubuh manusia bertasbih? Memuji sang Pemiliknya?</p>\n<p>Ternyata, orkestra Sel dalam tubuh manusia sangatlah indah, mereka bergerak, bekerja, membuat formasi dan melakukan segala aktifitas&nbsp; di dalam tubuh manusia tempat mereka berada bahkan tanpa sama sekali ada kontrol dari manusia itu sendiri, artinya, sel-sel tersebut bergerak,memperbaiki sel yang rusak, membuat berbagai kegiatan super rumit tanpa ada perintah sama sekali.<br /> Jika kita bicara mesin, maka bisa dipastikan sebuah mesin yang menyala tentunya ada yang menghidupkan, mengoperasikan mesin tersebut bisa bekerja dan melaksanakan fungsinya.</p>\n<p>Menariknya sel sel tubuh manusia ternyata mampu melaksanakan itu semua tanpa sedikitpun ada campur tangan dari manusia itu sendiri, artinya mereka melakukan itu karena ada kekuatan yang Maha Agung nan Maha dahsyat yang memperkerjakan mereka pagi siang malam sesuai dengan BluPrint kehidupan mereka yaitu bertasbih, memuji Robbnya , berotasi dengan putaran berlawanan arah jarum jam sesuai dengan apa yang diperintahkan kepada mereka, itulah tasbih sel-sel tersebut kepada Rob mereka, Rob kita!</p>\n<p>Mengagumkan&nbsp; sekali, saat sel-sel tersebut bekerja terus menerus&nbsp; untuk mengabdi kepada Robb-Nya.</p>\n<p>Kapan mereka berhenti? Mereka akan berhenti jika RobbNya telah menyatakan mereka harus berhenti atau dengan kata lain kematian melingkupi mereka dan itulah yang juga harus dilakukan oleh manusia, karena manusia pun diciptakan untuk mengabdi kepadaNya? Ada istirahatnya? Ada. Namun istirahat&nbsp; yang sebenarnya adalah saat kaki manusia tersebut menginjak di&nbsp; SurgaNya Allah.</p>\n<p>Sampai&nbsp; jumpa di surga&hellip;.Bekerjalah beraktifitaslah untukNya hinga nanti kita dapat berjumpa dan melihat WajahNya. [Hidayatullah]</p>","1","0","sel bertasbih","20140510-220855.jpg","sel-juga-bertasbih","Subhanallah.. Maha Suci Allah..","137","http://www.kajianislam.net/2014/04/sel-juga-bertasbih/");
INSERT INTO berita VALUES("4","2014-05-10 20:08:51","admin","Nasib Makanan dalam Perut","6","<p><strong>SEPERTI </strong>kita ketahui, makanan yang masuk dalam tubuh kita tentunya mengalami proses, mulai dari mulut hingga sampai ke pembuangan akhir.</p>\n<p>Dengan tubuh yang sangat sempurna yang diberikan Allah, maka sebenarnya proses ini tiada masalah, dan berlangsung dengan normal normal saja, namun saat bermasalah yang terjadi makanan makanan yang masuk tersebut begitu sulit dicerna dan akhirnya menumpuk dalam tubuhnya, tepatnya perutnya.</p>\n<p>Pertanyaannnya, bagaimana itu bisa terjadi? Sederhana sebenarnya, jadi saat tubuh kekurangan mineral, vitamin, nutrisi mikro lainnya termasuk enzim maka yang terjadi makananan tersebut mengalami pembusukan dan menumpuk dalam tubuh dan akhirnya menjadi penyakit.</p>\n<p>Bagaimana mineral, vitamin dan berbagai nutsi lainnya tersebut menghilang? Ya karena proses yang terjadi dan akhirnya makanan tersebut tidak mampu dikeluarkan karena tubuh sudah keletihan akibat juga tidak ada bantuan dari nutrisi mikro tersebut tadi.</p>\n<p>Di sinilah kita sebenarya memerlukan bantuan prebiotik atau probiotik. Prebiotik adalah &ldquo;makanan&rdquo; dari probiotik, sedang probiotik adalah &ldquo;kuman baik&rdquo; yang memang ada dalam tubuh namun bisa berubah menjadi kuman jahat karena makanan yang diberikan padanya malah justru membuat kuman tadi berubah sifat.</p>\n<p>Pertanyaannya bagaimana mensuplai perut agar prebiotik tadi dapat membantu pencernaan dalam perut kita?Mudah sekali, kita dapat memulainya dengan mengkonsumsi buah-buahan yang kita campur dengan madu, lumuri dengan madu, dan kunyahlah dengan baik atau bisa juga kita merendam buah yang tinggi gula alaminya seperti kurma, anggur.</p>\n<p>Direndam semalamam lalu esok paginya diminum airnya, buahnya boleh juga dimakan, Insya Allah kita mulai mensuplai prebiotik tadi dalam perut kita, hal ini dikenal juga dengan <em>infused water.*</em></p>\n<p>Selamat mencoba ya.* [Hidayatullah]</p>\n<p>Oleh: <strong>dr zaidul Akbar</strong></p>","1","0","nasib,makanan,perut","20140510-201121.jpg","nasib-makanan-dalam-perut","Islam Mengajarkan Pola Makan Sehat","65","http://www.kajianislam.net/2014/04/nasib-makanan-dalam-perut/");
INSERT INTO berita VALUES("5","2014-05-10 21:16:52","admin","Syeikh Usamah Rifa’i ditetapkan sebagai Ketua Umum Majelis Islam Suriah","6","<p>Muktamar Majelis Islam Suriah di Istanbul, Turki&nbsp; yang dilaksanakan sejak hari Jumat-Sabtu (11 &ndash; 12 April 2014) lalu, akhirnya menetapkan Syeikh Usamah Abdul Karim Rifa&rsquo;i sebagai Ketua Umum Majelis Islam Suriah.</p>\n<p>Pendeklarasian Majelis Islam Suriah hasil musyawarah majelis ulama ini juga menyimpulkan beberapa hal.</p>\n<p>Di antaranya, para ulama di Suriah menyimpulkan bahwa majelis ini ke depannya menjadi pedoman bagi rakyat Suriah untuk membentuk negara berasaskan Islam.</p>\n<p>&ldquo;Seluruh peserta dalam majelis telah bersepakat bahwa majelis ini menjadi tempat rujukan ilmiah syar&rsquo;iyyah berpedoman atas Kitab dan Sunnah untuk rakyat Suriah,&rdquo; kata Syeikh Usamah Ar Rifai kepada para wartawan baik lokal maupun internasional hari Senin (14/04/2014) di Istanbul,Turki.</p>\n<p>Selain itu majelis ini juga akan berupaya untuk menyatukan mujahidin demi mencapai kemenangan.</p>\n<p>&ldquo;Majelis ini Insya Alloh akan berupaya tetap menjalin hubungan dengan seluruh elemen revolusi Suriah baik di dalam maupun yang di luar Suriah,&rdquo; kata Syeikh Usamah Ar Rifai, dalam jumpa persnya.* [Hidayatullah]</p>","1","0","syeikh,usamah,ketua,umum,majelis,islam,suriah","20140510-211754.jpg","syeikh-usamah-rifa%e2%80%99i-ditetapkan-sebagai-ketua-umum-majelis-islam-suriah","Ya Allah, satukan hati kaum muslimin","106","http://www.kajianislam.net/2014/04/syeikh-usamah-rifai-ditetapkan-sebagai-ketua-umum-majelis-islam-suriah/");
INSERT INTO berita VALUES("6","2014-05-12 02:05:08","admin","Meditasi hanya Taklukkan Gen Stres, Tahajjud Plus Pahala","6","<p dir=\"LTR\">Studi terbaru menunjukkan meditasi dapat menekan gen yang menyebabkan inflamasi. Studi menyentuh epigenetika, sebuah cabang biologi molekuler yang menggoyahkan keyakinan bahwa genotipe menentukan nasib.</p>\n<p dir=\"LTR\">Sebuah studi oleh periset di Spanyol, Perancis dan Amerika Serikat menyediakan bukti ilmiah bagi pemikiran bahwa manusia dapat mengubah aktivitas gen dan meningkatkan kesehatan melalui pikiran dan perilaku. Ini juga terkait dengan bidang epigenetika yang tergolong baru, yang mencermati bagaimana faktor lingkungan dapat mengubah aktivitas gen secara permanen pada tingkat molekuler. Demikian dikutip DW. DE.</p>\n<p dir=\"LTR\">Bruce Lipton, seorang ahli biologi perkembangan dan penulis yang menyatakan dirinya membantu merintis bidang epigenetika, menjelaskan bahwa sebuah kromosom separuhnya terdiri dari DNA, dan separuh lagi protein.</p>\n<p dir=\"LTR\">&ldquo;Ilmuwan hanya fokus kepada DNA, dan melupakan protein &ndash; epigenetika mengatakan protein ini turut berperan,&rdquo; kata Lipton kepada DW. DE.</p>\n<p dir=\"LTR\">Ritwick Sawarkar, pimpinan tim Institut Max Planck untuk Immunobiologi dan Epigenetika di Freiburg, Jerman, menjelaskan bagaimana perubahan pada level kromatin sifatnya permanen dan turun-temurun &ndash; diwariskan dari ibu ke anak, atau bahkan dari sel ke sel.</p>\n<p dir=\"LTR\"><strong>Menekan inflamasi</strong></p>\n<p dir=\"LTR\">Dalam studi, yang akan dirilis pada edisi Februari jurnal &lsquo;Psychoneuroendocrinology,&rsquo; para subjek penelitian menunjukkan berkurangnya level gen berpotensi inflamasi setelah 8 jam bermeditasi. Ini berkorelasi dengan kesembuhan fisik yang lebih cepat dari situasi penuh stres.</p>\n<p dir=\"LTR\">&ldquo;Yang berikutnya harus terjadi adalah tindak lanjut secara lebih mekanis,&rdquo; tambahnya, menjelaskan bahwa studi hanya mencermati langkah ketiga dalam proses seseorang merasakan sesuatu, kemudian mengirimkan sinyal yang berujung pada perubahan.</p>\n<p dir=\"LTR\">Ia juga mengatakan studi &ldquo;meningkatkan kemampuan konsep meditasi sebagai penangkal stres,&rdquo; yang penting untuk kesehatan, karena &ldquo;stres menghentikan pertumbuhan dan perawatan tubuh, dan sistem kekebalan tubuh.&rdquo;</p>\n<p dir=\"LTR\"><strong>Obat psikosomatis</strong></p>\n<p dir=\"LTR\">Gy&ouml;rgy Irmey, direktur Asosiasi Ketahanan Biologis terhadap Kanker di Heidelberg, kepada DW mengatakan bahwa &ldquo;penyakit kanker kerap diikuti proses inflamasi&rdquo; karena itu ia menyarankan &nbsp;kepada pasien untuk meditasi, baik untuk pencegahan maupun pengobatan kanker.</p>\n<p dir=\"LTR\">Namun studi meditasi dinilai &ldquo;bertentangan dengan banyak bidang medis lain yang mengatakan peta genetik memutuskan apa yang terjadi pada pasien,&rdquo; tambah Irmey.</p>\n<p dir=\"LTR\">Sementara Bruce Lipton yakin, manusia dapat menyembuhkan diri sendiri dengan keyakinan dan perilaku. Ia merujuk pada sebuah studi pada tahun 2008 yang menunjukkan bahwa perubahan gizi dan gaya hidup menekan ekspresi gen pro-kanker.</p>\n<p dir=\"LTR\"><strong>Sehat Plus Berkah</strong></p>\n<p dir=\"LTR\">Jika peniti menemukan meditasi bisa menaklukkan gen stres, berbeda lagi dengan shalat tahajjud.</p>\n<p dir=\"LTR\">Tiga peneliti tahajjud Dr. Abdul Hamid diyab, &nbsp;Dr. Ah Qurquz dan Dr M Sholeh menunjukkan rahasia kedasyatan shalat tahajjud (qiyamul lail) melebihi meditasi.</p>\n<p dir=\"LTR\">Masing-masing peneliti menemukan shalat malam &nbsp;dapat meningkatkan daya tahan tubuh kita sehingga tidak mudah terkana penyakit.</p>\n<p dir=\"LTR\">Shalat Tahajud memiliki kandungan aspek meditasi dan relaksasi yang cukup besar, dan memiliki pengaruh terhadap kejiwaan yang dapat digunakan sebagai strategi penanggulangan adaptif pereda stres.</p>\n<p dir=\"LTR\">Melalui penelitian disertasi dalam bidang Ilmu Kedokteran pada program pascasarjana Universitas Surabaya, dengan judul &ldquo;Pengaruh Shalat Tahajud Terhadap Peningkatan Perubahan Respon Ketahanan Tubuh Imunologik: Suatu Pendekatan Psikoneuroimunologi&rdquo;, Dr.M.Soleh menemukan shalat malam. &nbsp;dapat meningkatkan respons emosional positif yang efektif dalam menegakkan anastesis pra bedah.</p>\n<p dir=\"LTR\">Shalat tahajud yang dikerjakan dengan penuh kesungguhan, khusyu, tepat, ikhlas dan terus menerus diyakini dapat menumbuhkan persepsi dan motivasi positif yang dapat menghindarkan reaksi stres.</p>\n<p dir=\"LTR\">Sementara Rasulullah bersabda:<br /> <em>&ldquo;Hendaklah kalian bangun malam. Sebab hal itu merupakan kebiasaan orang-orang shaleh sebelum kalian. Wahana pendekatan diri kepada Allah SWT, penghapus dosa dan pengusir penyakit dari dalam tubuh&rdquo;.</em> (HR at-Tirmidzi).</p>\n<p dir=\"LTR\">Nah, enak mana yang biasa-biasa saja, dengan ada bonus berkah dan pahala? [hidayatullah]</p>","1","0","meditasi,gen stres,tahajjud,pahala","20140514-063119.jpg","meditasi-hanya-taklukkan-gen-stres-tahajjud-plus-pahala","Kenikmatan Tahajjud Adalah Kenikmatan Surgawi","16","http://www.kajianislam.net/2014/02/meditasi-hanya-taklukkan-gen-stres-tahajjud-plus-pahala/");
INSERT INTO berita VALUES("7","2014-05-11 20:51:08","admin","Menyikapi Kecurangan Dalam Kehidupan","6","<p><span class=\"userContent\" data-ft=\"{\">Prof Dr Muhammad Asy-Syarif hafidhahullah mengatakan, bahwa para ulama sering gagal dalam kehidupan bermasyarakat karena kurang dalam pengalaman serta tidak cerdik dan tidak pandai membuat makar atau tipu daya.</span></p>\n<p>Intinya adalah karena para ulama itu polos, apa adanya dan ikhlas, tidak pandai berbohong, menipu dan tidak menghalalkan segala cara..</p>\n<p>Membaca tulisan beliau, saya jadi teringat status FB<span class=\"text_exposed_show\"> saya beberapa tahun yang lalu..</span></p>\n<p>Menyikapi Kecurangan Dalam Kehidupan..</p>\n<p>Dalam kehidupan ini selalu saja ada orang-orang yang curang dan bahkan kadang mereka tampil sebagai pemenang dengan kecurangannya itu..</p>\n<p>Pada hakekatnya, orang curang itu tidak pernah menang dan selalu kalah. Karena kecurangan itu sendiri adalah bukti kelicikan dan pengecut.</p>\n<p>Walau secara kasat mata sepertinya dia menang, tapi kemenangannya itu hanyalah semu dan palsu.</p>\n<p>Pemenang yang sebenarnya adalah orang selalu berada di jalan Allah secara total. Selalu belajar, beramal, berbuat baik, memberi manfaat, jujur dan ikhlas. Matinya husnul khotimah, sukses dalam fitnah kubur, alam kuburnya menjadi taman surga, menerima catatan amalnya dengan tangan kanan, selamat dari neraka, masuk surga, mendapat ridha Allah dan memandang WajahNya yg Maha Mulia.. Merekalah para pemenang sejati..!</p>\n<p>Semoga kita semua adalah para pemenang, sukses dunia akhirat, aamiin..</p>","1","0","kecurangan,kehidupan","20140512-221934.jpg","menyikapi-kecurangan-dalam-kehidupan","ilustrasi – Foto: Kembara Pramesywara","48","http://www.kajianislam.net/2014/04/menyikapi-kecurangan-dalam-kehidupan/");
INSERT INTO berita VALUES("8","2014-05-12 21:45:11","admin","Belajar Dewasa Menyikapi Perbedaan..","6","<p><span class=\"userContent\" data-ft=\"{\">Rasulullah &ndash;Shallallaahu &lsquo;Alaihi Wa &lsquo;Ala Alihi Wa Sallam telah memberitahukan kepada kita bahwa sepeninggal Beliau akan terjadi perbedaan dan bahkan perpecahan yang sangat banyak&hellip;<br /> Apalagi zaman sekarang, lebih banyak lagi fitnah yang timbul&hellip;Bahkan sesama teman&hellip;Sesama sahabat&hellip;Sesama penuntut ilmu syar&rsquo;i&hellip;Sesama da&rsquo;i&hellip;Sesama ulama&rsquo;&hellip;Sesama Ahlus Sunnah Wal Jama&rsquo;ah&hellip;<span class=\"text_exposed_show\"> Apalagi di kalangan masyarakat awam..</span></span></p>\n<p>Latar belakang perbedaan dan perpecahan serta fitnah itu macam-macam&hellip;Bisa jadi karena pemahaman tentang Islam yang sepotong-sepotong dan tidak seutuhnya&hellip;Karena kejahilan&hellip;Karena kurang ilmu&hellip;Karena hawa nafsu&hellip;Karena faktor duniawi&hellip;Karena beda pendapatan (beda pendapatan, lain dengan beda pendapat)&hellip;Karena hasad, iri dan dengki&hellip;Karena niat jelek&hellip;Karena hati telah rusak&hellip;Karena fanatik kepada seseorang&hellip;Karena merasa benar sendiri&hellip;Karena dada yang sempit&hellip;Karena jiwa yang kerdil&hellip;Karena faktor kejiwaan&hellip;Karena pengalaman masa lalu&hellip;Karena masa kecil kurang bahagia&hellip;Karena rumah tangga tidak harmonis&hellip;Karena pengaruh lingkungan&hellip;Karena pengaruh literatur yang dibaca&hellip;Karena kekanak-kanakan dan tidak dewasa&hellip;Karena emosional&hellip;Karena kurang komunikasi&hellip;Karena enggan berdiskusi&hellip;Karena akhlak dan moral yang buruk&hellip;Karena beda daya paham&hellip;Karena tekanan&hellip;Karena faktor politis&hellip;Karena kepentingan&hellip;Karena kurang pergaulan&hellip;Karena kurang pengalaman&hellip;Karena kurang informasi&hellip;Karena telat mikir&hellip;Karena pandangan pendek&hellip;Karena tidak tahu dan tidak mau tahu realita&hellip;Karena saingan&hellip;Karena tidak mengenal ALLAH dengan sebenarnya&hellip;Karena tidak tahu sejarah&hellip; Karena untuk menutupi kekurangan diri sendiri&hellip;Karena lupa kejelekan diri sendiri sehingga sibuk dengan orang lain&hellip;Karena kurang kerjaan&hellip;Karena kesulitan hidup&hellip;Karena hidup dari konflik dan tidak bisa hidup tanpa ada konflik&hellip;Karena diuntungkan oleh konflik&hellip;Karena bisnis konflik&hellip;Karena pesanan&hellip;Karena pengaruh kekuasaan dan penguasa&hellip;Karena pengaruh ulama suu&rsquo; (ulama jahat)&hellip;Karena merasa memiliki kunci surga&hellip;Karena&hellip;Karena&hellip;Karena&hellip;.Da<wbr />n lain-lain&hellip;.Masih banyak faktor-faktor lainnya&hellip;.</p>\n<p>Saudara-saudaraku yang saya cintai karena Allah, oleh karena itu, apabila terjadi perbedaan pendapat, ketimbang harus emosional, alangkah baiknya jika pikiran masing-masing pihak dikomunikasikan dengan baik, lalu didiskusikan layaknya orang dewasa yang memiliki basis moral akhlakul karimah dan intelektual Islami dengan mengedepankan keluhuran..</p>\n<p>Semoga kalian semua masuk surga..</p>","1","0","belajar,dewasa,menyikapi,perbedaan","20140512-221504.jpg","belajar-dewasa-menyikapi-perbedaan","Beda Orang Berilmu dan Tidak Berilmu dalam Menyikapi Perbedaan Pendapat","30","http://www.kajianislam.net/2014/04/belajar-dewasa-menyikapi-perbedaan/");
INSERT INTO berita VALUES("9","2014-05-12 21:54:01","admin","Kisah Penuh Hikmah Tentang Kesempurnaan","6","<p><span class=\"usercontent\">[Baca dengan tenang sambil direnungkan]</span></p>\n<p><span class=\"usercontent\">Suatu hari, seorang murid bertanya kepada gurunya: &ldquo;Wahai tuan guru, bagaimana cara agar kita mendapatkan sesuatu yang paling sempurna dalam kehidupan ini..?&rdquo; </span></p>\n<p><span class=\"usercontent\">Sang Guru menjawab: &ldquo;Berjalanlah di taman bunga, lalu petiklah bunga yang paling indah menurutmu dan jangan pernah kembali ke belakang..!&rdquo;</span></p>\n<p><span class=\"usercontent\">Setelah berjalan </span><span class=\"textexposedshow\">dan sampai di ujung taman, sang murid kembali dengan tangan hampa.. </span></p>\n<p><span class=\"textexposedshow\">Lalu Sang Guru bertanya : &ldquo;Mengapa kamu tidak mendapatkan bunga satu pun&hellip;???&rdquo; </span></p>\n<p><span class=\"textexposedshow\">Sang murid menjawab: &ldquo;Sebenarnya tadi aku sudah menemukannya, tapi aku tidak memetiknya, karena aku pikir mungkin di depan pasti ada yang lebih indah. Namun ketika aku sudah sampai di ujung, aku baru sadar bahwa yang aku lihat tadi adalah yang terindah, dan aku pun tak bisa kembali lagi kebelakang..!&rdquo; </span></p>\n<p><span class=\"textexposedshow\">Sambil tersenyum, Sang Guru berkata : &ldquo;Ya, begitulah kehidupan wahai muridku..! Betapa sering manusia mengejar yang sempurna dengan meninggalkan yang terbaik untuknya dan pada akhirnya ia tidak mendapatkan semuanya.. Kesempurnaan yang hakiki hanya milik Allah. Kita harus belajar ikhlas menerima apa yang Allah berikan kepada kita. Dan kita harus yakin bahwa pilihan Allah untuk kita adalah yang terbaik bagi kita.. Belajarlah mensyukuri dan mengembangkan anugerah yang Allah berikan&hellip;&rdquo; </span></p>\n<p><span class=\"textexposedshow\">Alhamdulillaah Wasysyukru Lillaah, Terima Kasih yaa Allah..!</span></p>","1","0","kisah penuh hikmah,kesempurnaan","20140512-221404.jpg","kisah-penuh-hikmah-tentang-kesempurnaan","Kesempurnaan Hanya Milik Allah","24","http://www.kajianislam.net/2014/02/kisah-penuh-hikmah-tentang-kesempurnaan/");
INSERT INTO berita VALUES("10","2014-05-12 21:56:16","admin","3 Alasan Mengkonsumsi Bacaan Digital","1","<p>Tulisan ini ingin merespon secara lengkap diskusi saya dengan @strategi_bisnis di Twitter tentang pro kontra konsumsi bacaan digital versus kertas. Mana yang lebih ramah lingkungan?</p>\n<p>Menurut @strategi_bisnis alias Mas Yodhia, perdebatan apakah bacaan digital lebih ramah lingkungan belum sampai pada konklusinya.</p>\n<p>Ia memaparkan bahwa kerugian lingkungan dari gadget dan turunannya tidak kalah dibandingkan dengan konsumsi koran yang meluluhlantakkan hutan-hutan kita itu.</p>\n<p>Ia juga memberikan rasio jika konsumsi buku digital minimal 40 per tahun, bisalah dikatakan itu sudah cukup hijau alias ramah lingkungan.</p>\n<p>Konsumsi digital saya rata-rata 2-3 buku per bulan, 5-10 majalah per bulan, dan 2 koran perhari. Itu sudah &ldquo;green&rdquo; rasionya menurut Mas Yodhia.</p>\n<p>Sebenarnya, saya menempuh jalan ini bukan karena alasan suka atau tidak suka. Jujur, membaca buku kertas tetap lebih nyaman daripada digital.</p>\n<p>Ini beberapa alasan saya:</p>\n<p>1. Gaya hidup minimalis. Sebagaimana sering saya tulis di blog ini, saya sedang belajar mempraktekkan gaya hidup sederhana atau minimalis di rumah. Artinya, meminimalisir tumpukan-tumpukan (clutter) tak berguna di rumah. Salah satu clutter yang paling membuat saya tertekan adalah tumpukan koran, majalah yang terus menggunung. Tumpukan buku juga sudah tak memiliki rak yang layak lagi. Bahkan raknya sudah menjajah wilayah kamar tidur dan dapur. Apakah saya harus menambah rak buku lagi? Saya tidak mau.</p>\n<p>2. Praktis. Jelas bacaan digital sangat mudah didapat, cukup bayar dan download. Membacanya bisa di mana saja dengan media apa saja. Jika hard disknya tidak cukup, saya tinggal hapus dan download lagi jika diperlukan. Dan, buku itu tidak akan pernah rusak atau hilang <img src=\"http://s0.wp.com/wp-includes/images/smilies/icon_smile.gif?m=1129645325g\" alt=\":)\" /></p>\n<p>3. Ramah lingkungan. Tetap saya berkeyakinan bahwa konsumsi bacaan digital itu lebih ramah lingkungan, pada skala konsumsi tertentu. Plus, biaya ikutannya juga termasuk, misalnya biaya distribusi. Bayangkan, majalah Inc yang dicetak di luar negeri itu harus naik pesawat ribuan kilometer plus distribusi di daratnya.</p>\n<p>Kesimpulan, alasan utama saya mengkonsumsi bacaan digital itu adalah yang nomor 1 di atas. Selebihnya adalah alasan yang dicari-cari dan biar lebih gaya. Hehehe&hellip;</p>","1","0","alasan,mengkonsumsi,bacaan,digital","20140512-215804.jpg","3-alasan-mengkonsumsi-bacaan-digital","","45","http://tangandiatas.com/2013/07/21/3-alasan-mengkonsumsi-bacaan-digital/");
INSERT INTO berita VALUES("11","2014-05-12 22:00:17","admin","Apa itu Social Entrepreneur?","1","<p>Sebelum mengenal apa itu Social Entrepreneur, perlu dipahami dahulu apa itu <em>Social Entrepreneurship</em> yang merupakan turunan dari entrepreneurship/kewirausahaan. Komunitas TDA, tahun 2010 pernah memperoleh<em> Best Achievement Social Entrepreneur Community </em>dari majalah SWA.</p>\n<p><em>Social Entrepreneurship</em> jika diambil dari dua kata yaitu <em>social</em> dan <em>entrepreneurship</em>. Social lebih diartikan kepada kemasyarakatan dan pemberdayaan. Dan Entrepreneurship adalah kewirausahaan.</p>\n<p>Beberapa sumber yang saya baca, Social Entrepreneurship itu menggabungkan inovasi, sumber daya dan kesempatan untuk mengatasi tantangan/problem sosial dan lingkungan dengan kewirausahaan. Fokus pada transformasi sistem, pemberdayaan masyarakat dan penyebab kemiskinan, marginalisasi/ketidakmerataan, kerusakan lingkungan dan kemanusiaan.</p>\n<p>Social entrepreneurship harus dapat menciptakan keuntungan, sehingga bukanlah organisasi nirlaba, karena dari keuntungan tersebut organisasi tersebut dapat mengembangkan dan membesarkan pemberdayaan kepada masyarakat lebih besar dan luas lagi.</p>\n<p>Tujuan utama Social Entrepreneurship adalah menciptakan sistem perubahan yang berkelanjutan (<em>sustainable systems change</em>), kunci pentingnya adalah inovasi, berorientasi pada kebutuhan masyarakat dan adanya perubahan system social masyarakat.</p>\n<p>Lalu apa Social Entrepreneur?</p>\n<p><em>&ldquo; A social entrepreneur is someone who recognizes a social problem and uses entrepreneurial principles to organize, create, and manage a venture to make social change&hellip;.rather than bringing a concept to market to address a consumer problem, social entrepreneurs attempt to bring a concept to market to address a public problem. &ldquo;</em> (Alex Nicholls, Oxford University&rsquo;s Skoll Centre).</p>\n<p>Saat acara Dpreneur yang diselenggarakan Detikcom, Sandiaga S. Uno, menyebut bahwa Social Entrepreneur adalah orang yang dapat memberikan solusi permasalahan social di masyarakat dengan prinsip-prinsip kewirausahaan.</p>\n<p>Dalam bahasa Indonesia, disebut juga Wirausaha Sosial. Wirausaha sosial adalah orang-orang yang melakukan perubahan. Bersama dengan lembaga-lembaga, jaringan, dan komunitas masyarakat, mereka menciptakan solusi yang efisien, berkelanjutan, transparan, dan memiliki dampak yang terukur.</p>\n<p>Ciri-ciri pewirausaha sosial adalah mereka mau berkorban, segera bertindak jika ada permasalahan sosial di lingkungannya, memiliki sikap praktis, innovative, tekadnya kuat, berani ambil resiko, melakukan perubahan social, berbagi keberhasilan dan yang terpenting mereka mau mengevaluasi diri sendiri.</p>\n<p>Banyak contoh di Indonesia para pewirausaha sosial ini, coba googling: Masril Koto, yang mendirikan bank khusus petani di Sumatera Barat. Dengan pemberdayaan yang dilakukan oleh Masril Koto, banyak petani yang tadinya malas bertani karena banyaknya kendala seperti modal, pemasaran, saat ini mereka dapat menjadi petani yang dapat menghasilkan. Masril Koto saat ini mempunyai asset 250Milyar rupiah dengan karyawan 1500 orang.</p>\n<p>Coba googling juga tentang : Silverius Oscar Unggul (Onte) di Kendari Sulawesi Tenggara dan Mursidah Rambe (BMT Beringharjo) di DI Yogyakarta. Kisah perjalanan dan perjuangan mereka sangat inspiratif.</p>\n<p>Indonesia membutuhkan banyak pahlawan di bidang social entrepreneurship ini agar masalah kemiskinan, pendidikan, kesehatan dan lapangan kerja mendapatkan solusi dengan kewirausahaan. Lalu Indonesia akan lebih sejahtera, makmur, adil merata.</p>","1","0","social,entrepreneur","20140512-221252.jpg","apa-itu-social-entrepreneur","Apa itu Social Entrepreneur?","40","http://tangandiatas.com/2013/11/05/apa-itu-social-entrepreneur/");
INSERT INTO berita VALUES("12","2014-05-12 22:03:41","admin","Pribadi yang Harus Disiapkan Sebagai Social Entrepreneur","1","<p>Seorang <em>Social Entrepreneur</em> akan menjadi agen perubahan di masyarakat, ia harus bisa memberikan solusi atas permasalahan sosial di masyarakat. Pribadi diri yang harus disiapkan sebagai seorang social entrepreneur adalah :</p>\n<p>- Ia harus mampu menjadi pemimpin di masyarakat yang dapat memberikan kontribusi dan pengaruh positif dalam masyarakat. Tidak mesti menjadi pemimpin yang yang formal, paling tidak ia bisa menjadi guru yang menginspirasi masyarakat, menjadi teladan yang baik bagi masyarakat.</p>\n<p>- Ia harus bisa mementingkan kepentingan masyarakat. Keuntungan yang diraih dari kegiatan social entrepreneur-nya harus mampu didistribusikan secara merata untuk kepentingan masyarakat. Keuntungan tidak untuk sang Social Entrepreneur tersebut, namun porsi terbesar harus ada di masyarakat. Masyarakat di ajak sebagai pemegang saham juga dan membangun bersama &ndash; sama masyarakat sebuah komunitas yang berkelanjutan.</p>\n<p>- Ia harus mampu membaca dan mengerti kultur yang ada di masyarakat. Mampu menjaga adat budaya yang berlaku di masyarakat tersebut.</p>\n<p>- Ia mampu membangun kerjasama dengan lembaga lain di masyarakat, terutama dengan tokoh masyarakat lokal yang ada, seperti aparat desa, tokoh agama, tokoh perempuan, tokoh pendidik dan lainnya.</p>\n<p>- Ia harus mempunyai jiwa yang semangat, kerja keras, kesabaran, dan kegigihan dalam mencari pengalaman dan pengetahuan baru yang dapat menginspirasi langkahnya.</p>\n<p>- Ia mempunyai keprihatinan atas permasalahan social yang ada. Keprihatinan jugalah yang lantas akan menggerakan ia dengan ide dan inovasi untuk memberikan solusi sosial.</p>\n<p>- Semua aktivitas sebagai social entrepreneur harus ia lakukan dengan cara menyenangkan.</p>\n<p>- Ia harus mempunyai keimanan yang tinggi bahwa bukan hanya mengandalkan kemampuan diri sendirinya, tetapi aka nada kekuatan Tuhan yang akan bersama ia dalam mengabdi untuk masyarakat.</p>\n<p>Andakah pribadi yang sesuai dengan poin-poin diatas? Bersiaplah untuk berbagi dan berkontribusi kepada masyarakat.</p>","1","0","social,entrepreneur","20140512-221232.jpg","pribadi-yang-harus-disiapkan-sebagai-social-entrepreneur","Pribadi yang Harus Disiapkan Sebagai Social Entrepreneur","41","http://tangandiatas.com/2013/12/19/pribadi-yang-harus-disiapkan-sebagai-social-entrepreneur/");
INSERT INTO berita VALUES("13","2014-05-12 22:04:50","admin","Belajar dari Tukang Bajaj","1","<p>Minggu lalu usai dari Makassar, setibanya di Bandara Soekarno &ndash; Hatta karena masih sore dan tidak terburu-buru, saya menumpang bus Damri jurusan Kemayoran. Setelah turun dari bus Damri tersebut di terminal Kemayoran saya menumpang sebuah bajaj biru karena rumah saya tidak jauh masih di kawasan Kemayoran.</p>\n<p>Selama perjalanan yang tidak terlalu lama, kurang lebih 15 menit saya berkesempatan mengobrol dengan tukang bajajnya karena ketertarikan saya dengan bajajnya yang bersih dan terlihat terawat. Saya dapati bahwa bajaj itu adalah miliknya sendiri yang ia cicil selama 3 tahun dari sebuah bank atas program konversi bajaj merah ke bajaj biru yang lebih ramah lingkungan karena menggunakan bahan bakar gas dan tidak bising suaranya. Saat ini masih memiliki sisa 2 tahun angsuran yang berjalan.</p>\n<p>Tukang bajaj ini sudah memulai profesi ini sudah lebih dari 15 tahun, dan kini ia sudah berusia 51 tahun. Ia berasal dari luar kota Jakarta, yang awalnya bertani, namun karena keterampilan bertaninya yang kurang maka ia mengadu nasibnya di Jakarta.</p>\n<p>Ada beberapa catatan yang dapat saya bagi dari obrolan singkat saya tersebut, dan menjadi pelajaran untuk kita semua, yaitu sebagai berikut :</p>\n<p>1. Tukang bajaj ini mempunyai tanggung jawab yang besar terhadap keluarganya, ia harus menyekolahkan anak-anaknya dan menafkahi keluarganya. Untuk itu ia dengan bermodalkan sebuah bajaj yang ia miliki dapat mampu menyisihkan sebesar Rp. 150.000,- per hari untuk tabungan cicilan ke bank yang besarnya sebulan hampir Rp. 2.500.000,-. Dan ia pun harus memberikan nafkah harian kepada keluarganya sebesar Rp. 120.000,- per hari untuk kebutuhan makan dan keperluan sekolah anak-anaknya. Dari menarik bajaj selama 9 jam sehari ia mampu sedikitnya dapat income minimal sebesar Rp. 300.000,- hingga Rp. 450.000,-. Uang operasional untuk bajajnya sebesar Rp. 20.000,- untuk mengisi bahan bakar gas.</p>\n<p>2. Ia dikarunia 3 orang anak, yang tertua sudah lulus SMK jurusan teknik dan sudah bekerja di sebuah kapal pelayaran luar negeri, dan ia bersyukur anaknya dapat secara rutin mengirim uang gajinya kepada ia sebagai orangtuanya sebesar Rp 25-30juta setiap 3-4 bulan sekali. Ia tidak serta merta menggunakan uang tersebut namun ia tabungkan untuk masa depan dan kebutuhan anaknya tersebut kelak. Sedangkan dua anaknya yang lain masih bersekolah dan ia mempunyai keinginan untuk menyekolahkan anak-anaknya ke jenjang yang lebih tinggi.</p>\n<p>3. Dari uang sisa setoran harian, ternyata ia dapat membeli bajaj-bajaj lain, ia mempunyai 3 bajaj merah yang ia berikan kepada kerabatnya yang ingin menjadi tukang bajaj. Niatnya membantu orang lain untuk mempunyai penghasilan. Kepada kerabatnya, ia menyewakan bajajnya dengan system bulanan atau pun harian yang tidak terlalu memberatkan. Dari uang sewa ini maka ia memiliki tambahan income lainnya.</p>\n<p>4. Ia saat ini pun sudah mempunyai rumah sendiri yang layak huni. Menurutnya dulu ia tinggal di daerah Kapuk di sebuah rumah kecil yang kurang layak dan kerap banjir. Sudah beberapa tahun, kini ia menempati rumah berukuran 7 x 15 meter di kawasan Pondok Kopi dan dipinggir jalan raya, yang ia beli sebesar Rp. 65juta dengan tunai dan menurutnya nilai rumahnya sekarang tersebut sudah hampir mencapai Rp. 400juta. Dan di rumah tersebut ia membuatkan warung untuk menambah pemasukan keluarganya dan memberikan kegiatan kepada istrinya.</p>\n<p>5. Saya merasakan juga yang pelayanan yang baik dari beliau. Dari awal saya menaiki bajajnya, saat menanyakan harganya, ia malah balik bertanya, &ldquo;Bapak biasanya berapa?&rdquo; Saya sebut nominal yang pantas, maka ia pun langsung mengiyakannya. Selama di jalan ia pun menawarkan jalur yang akan dilalui karena ia mengetahui jalur yang tidak macet. Karena bajajnya yang tidak bising, ia mampu berkomunikasi dengan penumpangnya selama di perjalanan. Dan saat sampai di rumah pun ia memberikan nomor telponnya, yang dapat dihubungi jika saya memerlukan tumpangannya karena ia beroperasi sekitar lingkungan rumah saya.</p>\n<p>Pelayanan yang baik yang ia berikan. Dari catatan-catatan tersebut, saya dapat memetik pelajaran yang berharga untuk kehidupan dan menjalankan usaha/bisnis. Dengan disiplin kerja dan kemauan yang tinggi untuk memenuhi kebutuhan hidupnya, ia mampu mengejar target hariannya dan malah dapat memiliki kelebihan uang yang dapat ia tabung.</p>\n<p>Dari tabungan tersebut ia mampu membeli asset lainnya yang dapat memberikan income tambahan. Dan dengan kerja keras dan disiplinnya, ia mampu memberikan yang terbaik untuk keluarganya: sandang, pangan dan pendidikan untuk anak-anaknya.</p>\n<p>Ia pun berusaha untuk bisa memberi manfaat untuk orang lain dengan memiliki bajaj lainnya yang dapat ia sewakan kepada orang lain. Dan untuk menjaga kepuasan pelanggannya, ia melayani penumpangnya dengan ramah dan baik.</p>\n<p>Di kehidupan ini jika kita mempunyai kemauan, bertanggung-jawab, mau berkerja keras dan disiplin, apa pun yang kita inginkan, impikan akan dapat tercapai. Di akhir tahun ini, gali kembali impian kita dan susunlah rencana bisnis dan action plan yang kita ingin capai di tahun 2014 nanti. Semoga bermanfaat.</p>","1","0","belajar,tukang bajaj","20140512-220738.jpg","belajar-dari-tukang-bajaj","","62","http://tangandiatas.com/2013/12/24/belajar-dari-tukang-bajaj/");
INSERT INTO berita VALUES("14","2014-05-14 06:34:04","admin","Obat dan Solusi dari Kesempitan","6","<p dir=\"LTR\">Obat dan Solusi dari Kesempitan adalah Dua Hal, yaitu;</p>\n<p>1. Bertasbih dengan memuji Allah (memperbanyak berdzikir kepada Allah).<br /> 2. Bersujud (shalat).</p>\n<p>Allah Ta&rsquo;ala berfirman:</p>\n<p>وَلَقَدْ نَعْلَمُ أَنَّكَ يَضِيقُ صَدْرُكَ بِمَا يَقُولُونَ</p>\n<p>Dan Kami sungguh-sungguh mengetahui, bahwa dadamu menjadi sempit disebabkan apa yang mereka ucapkan,</p>\n<p>فَسَبِّحْ بِحَمْدِ رَبِّكَ وَكُن مِّنَ السَّاجِدِينَ</p>\n<p>maka bertasbihlah dengan memuji Tuhanmu dan jadilah kamu di antara orang-orang yang bersujud (shalat),</p>\n<p>[QS 15 Al Hijr, Ayat 97-98]</p>","1","0","obat,solusi,kesempitan","20140514-063518.jpg","obat-dan-solusi-dari-kesempitan","Bahagia Ada Dalam Mengikuti Sunnah","33","http://www.kajianislam.net/2013/02/obat-dan-solusi-dari-kesempitan/");
INSERT INTO berita VALUES("15","2014-05-14 06:39:40","admin","Surat Cinta Untuk Saudara-Saudaraku Yang Dimudahkan Allah Pergi Ke Medan Jihad","6","<p><span class=\"userContent\" data-ft=\"{\">Surat Cinta Untuk Saudara-Saudaraku Yang Dimudahkan Allah Pergi Ke Medan Jihad..</span></p>\n<p>Wahai Saudaraku Mujahid.. Semoga surat cintaku ini sampai kepadamu dan bermanfaat untuk dunia dan akhiratmu..</p>\n<p>Wahai Saudaraku Mujahid.. Perjuangan belum selesai, saat ini masih berada di awal perjuangan dan masih membutuhkan bekal yang cukup.. Ingat selalu, untuk menggapai Jannah itu penuh gangguan, godaan dan rinta<span class=\"text_exposed_show\">ngan.. Setan pasti terus berusaha menyesatkanmu dan tidak akan membiarkanmu begitu saja..</span></p>\n<p>Wahai Saudaraku Mujahid.. Kamu pergi ke medan jihad ini adalah dalam rangka memenuhi seruan Allah.. Karena itu, bersiaplah untuk mengemban semua kesulitan di medan juang.. Ingat selalu, Allah telah memilihmu untuk berjihad di medan tempur padahal banyak yang tidak mendapat kesempatan mulia ini, maka persembahkan semua yang terbaik untuk akhiratmu..</p>\n<p>Wahai Saudaraku Mujahid.. Bawalah risalah agung dan tujuan mulia ini dengan penuh kesabaran dan kesantunan, kedepankan akhlakul karimah dalam berdakwah di medan jihad, semoga banyak yang mendapat hidayah dari Allah melalui tanganmu..</p>\n<p>Wahai Saudaraku Mujahid.. Kamu hidup di perantauan, adakalanya seorang sendiri dalam perjalanan.. Mohonlah selalu kepada Allah, Robbmu, agar selalu menjadikanmu teguh, tegar dan istiqomah, serta berupayalah secara maksimal untuk merealisasikan hal itu.. Ingat, sebaik-baik bekal adalah taqwa..</p>\n<p>Wahai Saudaraku Mujahid.. Kamu keluar berjihad dan berhijrah ini adalah untuk meninggikan kalimat Allah, menegakkan agama dan menerapkan syari&rsquo;at.. Maka rapatkan barisanmu bersama saudara-saudaramu yang mempunyai tujuan sama.. Ingat, perjalanan masih panjang dan Tangan Allah bersama &lsquo;Al-Jama&rsquo;ah&rsquo;..</p>\n<p>Wahai Saudaraku Mujahid.. Ketahuilah bahwa sesungguhnya Allah Maha Kaya dari siapapun dan tidak membutuhkan siapapun.. Justeru kita-lah yang membutuhkan bekal dan kebersamaan dalam memenangkan Islam dan meninggikan panji-panji agama..</p>\n<p>Wahai Saudaraku Mujahid.. Jangan pernah putus hubunganmu dengan Allah, perbanyaklah beribadah, shalat, shoum, membaca Al-Qur&rsquo;an, berdzikir, berdoa dan aktifitas ibadah lainnya agar supaya selalu mendapat bimbingan Allah kapanpun dan dimanapun kamu berada.. Jika ada kesempatan mencari ilmu, jangan sia-siakan..</p>\n<p>Wahai Saudaraku Mujahid.. Pada akhirnya, ingatlah selalu firman Allah ini;<br /> &ldquo;Dan Kami sungguh-sungguh mengetahui, bahwa dadamu menjadi sempit disebabkan apa yang mereka ucapkan,<br /> maka bertasbihlah dengan memuji Robbmu dan jadilah kamu di antara orang-orang yang bersujud (shalat),<br /> dan beribadahlah kepada Robbmu sampai datang kepadamu yang diyakini (ajal kematian).&rdquo;<br /> [QS 15 Al Hijr, Ayat 97-99]</p>\n<p>Selamat Berjuang Sudaraku.. Allah Bersamamu.. Semoga Allah Berikan Kemenangan dan Kemuliaan.. Jika kamu gugur sebagai Syahid, sampaikan salamku kepada para Syuhada&rsquo; dan juga kepada Rasulullah Muhammad Shallallahu &lsquo;Alaihi Wa &lsquo;Ala Alihi Wa Sallam..</p>\n<p>Akhukum Fillaah,<br /> Abdullah Sholeh Hadrami</p>","1","0","surat cinta,saudara,medan jihad","20140514-064131.jpg","surat-cinta-untuk-saudara-saudaraku-yang-dimudahkan-allah-pergi-ke-medan-jihad","Puncak Agama Islam Adalah Berjihad di Jalan Allah","33","http://www.kajianislam.net/2013/11/surat-cinta-untuk-saudara-saudaraku-yang-dimudahkan-allah-pergi-ke-medan-jihad/");
INSERT INTO berita VALUES("16","2014-05-14 06:43:24","admin","Jodoh Itu Misterius","6","<p class=\"MsoNormal\" dir=\"LTR\" style=\"text-align: left; direction: ltr; unicode-bidi: embed;\"><span class=\"usercontent\">Benarkah orang baik itu pasti mendapatkan jodoh orang baik, dan orang jahat mendapat jodoh orang jahat pula..???</span></p>\n<p><span class=\"usercontent\">Realitanya tidak begitu..?!</span></p>\n<p class=\"MsoNormal\" dir=\"LTR\" style=\"text-align: left; direction: ltr; unicode-bidi: embed;\"><span class=\"usercontent\">Berapa banyak orang baik yang mendapat orang jahat dan sebaliknya..! </span></p>\n<p><span class=\"usercontent\">Bahkan Nabi Nuh dan Nabi Luth, kedua Nabi tersebut isterinya kafir..!</span></p>\n<p><span class=\"usercontent\">Fir&rsquo;aun, manusia paling kafir mempunyai isteri shalihah, yaitu Asiah binti Muzahim..!</span></p>\n<p class=\"MsoNormal\" dir=\"LTR\" style=\"text-align: left; direction: ltr; unicode-bidi: embed;\">Ada beberapa penafsiran tentang ayat 26 dari surat An-Nur.</p>\n<p>Al-Imam Muhammad bin Jarir Abu Ja&rsquo;far Ath-Thabari [wafat 310 Hijriyah] rahimahullah dalam tafsirnya &lsquo;Jami&rsquo;ul Bayan Fi Ta&rsquo;wilil Qur&rsquo;an&rsquo; menjelaskan bahwa yang paling tepat diantara pendapat-pendapat dalam menafsirkan ayat tersebut adalah:<br /> Ucapan yang buruk itu untuk laki-laki dan perempuan yang buruk.<br /> Manusia yang buruk itu tepat untuk ucapan yang buruk.<br /> Ucapan yang baik untuk laki-laki dan perempuan yang baik.<br /> Manusia yang baik itu tepat dan berhak serta layak untuk ucapan yang baik.</p>\n<p>Beliau menjelaskan alasan memilih tafsir ini karena ayat 26 ini berhubungan dengan ayat-ayat sebelumnya yang berisi pencelaan dari Allah untuk orang-orang yang menuduh ibunda Aisyah radliyallahu &lsquo;anha dengan tuduhan keji padahal ibunda Aisyah radliyallahu &lsquo;anha terlepas dari tuduhan keji tersebut.</p>\n<p>Al-Imam Muhyi As-Sunnah Abu Muhammad Al-Husain bin Mas&rsquo;ud Al-Baghawi [wafat 516 Hijriyah] rahimahullah dalam tafsirnya &lsquo;Ma&rsquo;alimut Tanzil&rsquo; menjelaskan bahwa kebanyakan ahli tafsir menafsirkan seperti itu.</p>\n<p class=\"MsoNormal\" dir=\"LTR\" style=\"text-align: left; direction: ltr; unicode-bidi: embed;\">Demikian pula An-Nur ayat 3 itu bukan tentang perjodohan, tapi hukum menikah dengan pezina yang belum bertaubat.</p>","1","0","jodoh,misterius","20140514-070029.jpg","jodoh-itu-misterius","Jodoh Itu Misterius","43","http://www.kajianislam.net/2013/12/jodoh-itu-misterius/");
INSERT INTO berita VALUES("17","2014-05-14 06:48:05","admin","”Perlukah Pendidikan Berkarakter?”","6","<p>Program pendidikan karakter, memerlukan keteladanan. Jika cuma slogan, Indonesia dikenal jagonya!</p>\n<p>Oleh: Dr. Adian Husaini*</p>\n<p>PEMERINTAH, melalui Kementerian Pendidikan Nasional sudah mencanangkan penerapan pendidikan karakter untuk semua tingkat pendidikan, dari SD-Perguruan Tinggi. Menurut Mendiknas, Prof. Muhammad Nuh, pembentukan karakter perlu dilakukan sejak usia dini. Jika karakter sudah terbentuk sejak usia dini, kata Mendiknas, maka tidak akan mudah untuk mengubah karakter seseorang. Ia juga berharap, pendidikan karakter dapat membangun kepribadian bangsa. Mendiknas mengungkapkan hal ini saat berbicara pada pertemuan Pimpinan Pascasarjana LPTK Lembaga Pendidikan Tenaga Kependidikan (LPTK) se-Indonesia di Auditorium Universitas Negeri Medan (Unimed), Sabtu (15/4/2010).</p>\n<p>Munculnya gagasan program pendidikan karakter dalam dunia pendidikan di Indonesia, bisa dimaklumi, sebab selama ini dirasakan, proses pendidikan ternyata belum berhasil membangun manusia Indonesia yang berkarakter. Bahkan, banyak yang menyebut, pendidikan telah gagal membangun karakter. Banyak lulusan sekolah dan sarjana yang piawai dalam menjawab soal ujian, berotak cerdas, tetapi mentalnya lemah, penakut, dan perilakunya tidak terpuji.</p>\n<p>Bahkan, bisa dikatakan, dunia Pendidikan di Indonesia kini sedang memasuki masa-masa yang sangat pelik. Kucuran anggaran pendidikan yang sangat besar disertai berbagai program terobosan sepertinya belum mampu memecahkan persoalan mendasar dalam dunia pendidikan, yakni bagaimana mencetak alumni pendidikan yang unggul, yang beriman, bertaqwa, profesional, dan berkarakter.</p>\n<p>Dr. Ratna Megawangi, dalam bukunya, Semua Berakar Pada Karakter (Jakarta: Lembaga Penerbit FE-UI, 2007), mencontohkan, bagaimana kesuksesan Cina dalam menerapkan pendidikan karakter sejak awal tahun 1980-an. Menurutnya, pendidikan karakter adalah untuk mengukir akhlak melalui proses knowing the good, loving the good, and acting the good. Yakni, suatu proses pendidikan yang melibatkan aspek kognitif, emosi, dan fisik, sehingga akhlak mulia bisa terukir menjadi habit of the mind, heart, and hands.</p>\n<p>Dalam bukunya, Pendidikan Karakter: Strategi Mendidik Anak di Zaman Global, (2010), Doni Koesoema Albertus menulis, bahwa pendidikan karakter bertujuan membentuk setiap pribadi menjadi insan yang berkeutamaan. Dalam pendidikan karakter, yang terutama dinilai adalah perilaku, bukan pemahamannya. Doni membedakan pendidikan karakter dengan pendidikan moral atau pendidikan agama. Pendidikan agama dan kesadaran akan nilai-nilai religius menjadi motivator utama keberhasilan pendidikan karakter.</p>\n<p>Tetapi, Doni yang meraih sarjana teologi di Universitas Gregoriana Roma Italia, agama tidak dapat dipakai sebagai pedoman pengatur dalam kehidupan bersama dalam sebuah masyarakat yang plural. &ldquo;Di zaman modern yang sangat multikultural ini, nilai-nilai agama tetap penting dipertahankan, namun tidak dapat dipakai sebagai dasar kokoh bagi kehidupan bersama dalam masyarakat. Jika nilai agama ini tetap dipaksakan dalam konteks masyarakat yang plural, yang terjadi adalah penindasan oleh kultur yang kuat pada mereka yang lemah,&rdquo; tulisnya.</p>\n<p>Oleh karena itu, simpul Doni K. Albertus, meskipun pendidikan agama penting dalam membantu mengembangkan karakter individu, ia bukanlah fondasi yang efektif bagi suatu tata sosial yang stabil dalam masyarakat majemuk. Dalam konteks ini, nilai-nilai moral akan bersifat lebih operasional dibandingkan dengan nilai-nilai agama. Namun demikian, nilai-nilai moral, meskipun bisa menjadi dasar pembentuk perilaku, tidak lepas dari proses hermeneutis yang bersifat dinamis dan dialogis.</p>\n<p>Sebagai Muslim, kita tentu tidak sependapat dengan pandangan Doni K. Albertus semacam itu. Sebab, bagi Muslim, nilai-nilai Islam diyakini sebagai pembentuk karakter dan sekaligus bisa menjadi dasar nilai bagi masyarakat majemuk. Masyarakat Madinah yang dipimpin Nabi Muhamamd saw, berdasarkan kepada nilai-nilai Islam, baik bagi pribadi Muslim maupun bagi masyarakat plural. Tentu kita memahami pengalaman sejarah keagamaan yang berbeda antara Katolik dengan Islam.</p>\n<p>Namun, dalam soal pendidikan karakter bagi anak didik, berbagai agama bisa bertemu. Islam dan Kristen dan berbagai agama lain bisa bertemu dalam penghormatan terhadap nilai-nilai keutamaan. Nilai kejujuran, kerja keras, sikap ksatria, tanggung jawab, semangat pengorbanan, dan komitmen pembelaan terhadap kaum lemah dan tertindas, bisa diakui sebagai nilai-nilai universal yang mulia. Bisa jadi, masing-masing pemeluk agama mendasarkan pendidikan karakter pada nilai agamanya masing-masing.</p>\n<p>Terlepas dari perdebatan konsep-konsep pendidikan karakter, bangsa Indonesia memang memerlukan model pendidikan semacam ini. Sejumlah negara sudah mencobanya. Indonesia bukan tidak pernah mencoba menerapkan pendidikan semacam ini. Tetapi, pengalaman menunjukkan, berbagai program pendidikan dan pengajaran &ndash; seperti pelajaran Budi Pekerti, Pendidikan Pancasila dan Kewargaan Negara (PPKN), Pendidikan Moral Pancasila (PMP), Pedoman Penghayatan dan Pengamalan Pancasila (P4), &ndash; belum mencapai hasil optimal, karena pemaksaan konsep yang sekularistik dan kurang seriusnya aspek pengalaman. Dan lebih penting, tidak ada contoh dalam program itu! Padahal, program pendidikan karakter, sangat memerlukan contoh dan keteladanan. Kalau hanya slogan dan &rsquo;omongan&rsquo;, orang Indonesia dikenal jagonya!</p>\n<p>Harap maklum, konon, orang Indonesia dikenal piawai dalam menyiasati kebijakan dan peraturan. Ide UAN, mungkin bagus! Tapi, di lapangan, banyak yang bisa menyiasati bagaimana siswanya lulus semua. Sebab, itu tuntutan pejabat dan orangtua. Guru tidak berdaya. Kebijakan sertifikasi guru, bagus! Tapi, karena mental materialis dan malas sudah bercokol, kebijakan itu memunculkan tradisi berburu sertifikat, bukan berburu ilmu! Bukan tidak mungkin, gagasan Pendidikan Karakter ini nantinya juga menyuburkan bangku-bangku seminar demi meraih sertifikat pendidikan karakter, untuk meraih posisi dan jabatan tertentu.</p>\n<p>*****</p>\n<p>Mohammad Natsir, salah satu Pahlawan Nasional, tampaknya percaya betul dengan ungkapan Dr. G.J. Nieuwenhuis: &rdquo;Suatu bangsa tidak akan maju, sebelum ada di antara bangsa itu segolongan guru yang suka berkorban untuk keperluan bangsanya.&rdquo;</p>\n<p>Menurut rumus ini, dua kata kunci kemajuan bangsa adalah &ldquo;guru&rdquo; dan &ldquo;pengorbanan&rdquo;. Maka, awal kebangkitan bangsa harus dimulai dengan mencetak &ldquo;guru-guru yang suka berkorban&rdquo;. Guru yang dimaksud Natsir bukan sekedar &ldquo;guru pengajar dalam kelas formal&rdquo;. Guru adalah para pemimpin, orangtua, dan juga pendidik. Guru adalah teladan. &ldquo;Guru&rdquo; adalah &ldquo;digugu&rdquo; (didengar) dan &ldquo;ditiru&rdquo; (dicontoh). Guru bukan sekedar terampil mengajar bagaimana menjawab soal Ujian Nasional, tetapi diri dan hidupnya harus menjadi contoh bagi murid-muridnya.</p>\n<p>Mohammad Natsir adalah contoh guru sejati, meski tidak pernah mengenyam pendidikan di fakultas keguruan dan pendidikan. Hidupnya dipenuhi dengan idealisme tinggi memajukan dunia pendidikan dan bangsanya. Setamat AMS (Algemene Middelbare School) di Bandung, dia memilih terjun langsung ke dalam perjuangan dan pendidikan. Ia dirikan Pendis (Pendidikan Islam) di Bandung. Di sini, Natsir memimpin, mengajar, mencari guru dan dana. Terkadang, ia keliling ke sejumlah kota mencari dana untuk keberlangsungan pendidikannya. Kadangkala, perhiasan istrinya pun digadaikan untuk menutup uang kontrak tempat sekolahnya.</p>\n<p>Disamping itu, Natsir juga melakukan terobosan dengan memberikan pelajaran agama kepada murid-murid HIS, MULO, dan Kweekschool (Sekolah Guru). Ia mulai mengajar agama dalam bahasa Belanda. Kumpulan naskah pengajarannya kemudian dibukukan atas permintaan Sukarno saat dibuang ke Endeh, dan diberi judul Komt tot Gebeid (Marilah Shalat).</p>\n<p>Kisah Natsir dan sederet guru bangsa lain sangat penting untuk diajarkan di sekolah-sekolah dengan tepat dan benar. Natsir adalah contoh guru yang berkarakter dan bekerja keras untuk kemajuan bangsanya. Ia adalah orang yang sangat haus ilmu. Cita-citanya bukan untuk meraih ilmu kemudian untuk mengeruk keuntungan materi dengan ilmunya. Tapi, dia sangat haus ilmu, lalu mengamalkannya demi kemajuan masyarakatnya.</p>\n<p>*****</p>\n<p>Pada 17 Agustus 1951, hanya 6 tahun setelah kemerdekaan RI, M. Natsir melalui sebuah artikelnya yang berjudul &ldquo;Jangan Berhenti Tangan Mendayung, Nanti Arus Membawa Hanyut&rdquo;, Natsir mengingatkan bahaya besar yang dihadapi bangsa Indonesia, yaitu mulai memudarnya semangat pengorbanan. Melalui artikelnya ini, Natsir menggambarkan betapa jauhnya kondisi manusia Indonesia pasca kemerdekaan dengan pra-kemerdekaan. Sebelum kemerdekaan, kata Natsir, bangsa Indonesia sangat mencintai pengorbanan. Hanya enam tahun sesudah kemerdekaan, segalanya mulai berubah. Natsir menulis:</p>\n<p>&ldquo;Dahulu, mereka girang gembira, sekalipun hartanya habis, rumahnya terbakar, dan anaknya tewas di medan pertempuran, kini mereka muram dan kecewa sekalipun telah hidup dalam satu negara yang merdeka, yang mereka inginkan dan cita-citakan sejak berpuluh dan beratus tahun yang lampau&hellip; Semua orang menghitung pengorbanannya, dan minta dihargai&hellip;Sekarang timbul penyakit bakhil. Bakhil keringat, bakhil waktu dan merajalela sifat serakah&hellip; Tak ada semangat dan keinginan untuk memperbaikinya. Orang sudah mencari untuk dirinya sendiri, bukan mencari cita-cita yang diluar dirinya&hellip;&rdquo;</p>\n<p>Peringatan Natsir hampir 60 tahun lalu itu perlu dicermati oleh para elite bangsa, khususnya para pejabat dan para pendidik. Jika ingin bangsa Indonesia menjadi bangsa besar yang disegani di dunia, wujudkanlah guru-guru yang mencintai pengorbanan dan bisa menjadi teladan bagi bangsanya. Beberapa tahun menjelang wafatnya, Natsir juga menitipkan pesan kepada sejumlah cendekiawan yang mewawancarainya, &rdquo;Salah satu penyakit bangsa Indonesia, termasuk umat Islamnya, adalah berlebih-lebihan dalam mencintai dunia.&rdquo; Lebih jauh, kata Natsir:</p>\n<p>&rdquo;Di negara kita, penyakit cinta dunia yang berlebihan itu merupakan gejala yang &rdquo;baru&rdquo;, tidak kita jumpai pada masa revolusi, dan bahkan pada masa Orde Lama (kecuali pada sebagian kecil elite masyarakat). Tetapi, gejala yang &rdquo;baru&rdquo; ini, akhir-akhir ini terasa amat pesat perkembangannya, sehingga sudah menjadi wabah dalam masyarakat. Jika gejala ini dibiarkan berkembang terus, maka bukan saja umat Islam akan dapat mengalami kejadian yang menimpa Islam di Spanyol, tetapi bagi bangsa kita pada umumnya akan menghadapi persoalan sosial yang cukup serius.&rdquo;</p>\n<p>*****</p>\n<p>Seorang dosen fakultas kedokteran pernah menyampaikan keprihatinan kepada saya. Berdasarkan survei, separoh lebih mahasiswa kedokteran di kampusnya mengaku, masuk fakultas kedokteran untuk mengejar materi. Menjadi dokter adalah baik. Menjadi ekonom, ahli teknik, dan berbagai profesi lain, memang baik. Tetapi, jika tujuannya adalah untuk mengeruk kekayaan, maka dia akan melihat biaya kuliah yang dia keluarkan sebagai investasi yang harus kembali jika dia lulus kuliah. Ia kuliah bukan karena mencintai ilmu dan pekerjaannya, tetapi karena berburu uang!</p>\n<p>Kini, sebagaimana dikatakan Natsir, yang dibutuhkan bangsa ini adalah &ldquo;guru-guru sejati&rdquo; yang cinta berkorban untuk bangsanya. Bagaimana murid akan berkarakter; jika setiap hari dia melihat pejabat mengumbar kata-kata, tanpa amal nyata. Bagaimana anak didik akan mencintai gurunya, sedangkan mata kepala mereka menonton guru dan sekolahnya materialis, mengeruk keuntungan sebesar-besarnya melalui lembaga pendidikan.</p>\n<p>Pendidikan karakter adalah perkara besar. Ini masalah bangsa yang sangat serius. Bukan urusan Kementerian Pendidikan semata. Presiden, menteri, anggota DPR, dan para pejabat lainnya harus memberi teladan. Jangan minta rakyat hidup sederhana, hemat BBM, tapi rakyat dan anak didik dengan jelas melihat, para pejabat sama sekali tidak hidup sederhana dan mobil-mobil mereka &ndash; yang dibiayai oleh rakyat &ndash; adalah mobil impor dan sama sekali tidak hemat.</p>\n<p>Pada skala mikro, pendidikan karakter ini harus dimulai dari sekolah, pesantren, rumah tangga, juga Kantor Kementerian Pendidikan dan Kementerian Agama. Dari atas sampai ke bawah, dan sebaliknya. Sebab, guru, murid, dan juga rakyat sudah terlalu sering melihat berbagai paradoks. Banyak pejabat dan tokoh agama bicara tentang taqwa; berkhutbah bahwa yang paling mulia diantara kamu adalah yang taqwa. Tapi, faktanya, saat menikahkan anaknya, yang diberi hak istimewa dan dipandang mulia adalah pejabat dan yang berharta. Rakyat kecil dan orang biasa dibiarkan berdiri berjam-jam mengantri untuk bersalaman.</p>\n<p>Kalau para tokoh agama, dosen, guru, pejabat, lebih mencintai dunia dan jabatan, ketimbang ilmu, serta tidak sejalan antara kata dan perbuatan, maka percayalah, Pendidikan Karakter yang diprogramkan Kementerian Pendidikan hanya akan berujung slogan! [Depok, Juni 2010/hidayatullah.com]</p>\n<p>Catatan Akhir Pekan [CAP] Adian Husaini adalah hasil kerjasama Radio Dakta 107 FM dan Hidayatullah</p>","1","0","pendidikan,berkarakter","20140514-070054.jpg","perlukah-pendidikan-berkarakter","Sumber Ilmu Adalah Al-Qur’an dan As-Sunnah","53","http://www.kajianislam.net/2013/12/perlukah-pendidikan-berkarakter/");
INSERT INTO berita VALUES("18","2014-05-14 06:51:05","admin","Kisah Wafatnya Muadzdzin","6","<p class=\"MsoNormal\" dir=\"LTR\" style=\"text-align: left; direction: ltr; unicode-bidi: embed;\"><span class=\"usercontent\">[Kiriman dari teman]</span></p>\n<p><span class=\"usercontent\">Dokter Jasim al-Haditsy seorang penasehat jantung anak di &ldquo;Amir Sulthan Center Untuk Penyakit Jantung&rdquo; Rumah Sakit Angkatan Bersenjata Riyadh, Arab Saudi mengisahkan cerita teman dokternya :</span></p>\n<p><span class=\"textexposedshow\">&ldquo;Suatu malam, saat sedang bertugas di rumah sakit, ada seorang pasien yg meninggal dunia. Maka akupun segera memastikan akan kematian pasien tersebut, dengan meletakkan Stetoskop di atas dadanya. Ternyata dari jantungnya terdengar suara azan :</span><br /> <span class=\"textexposedshow\">Allahu akbar, Allahu akbar!</span><br /> <span class=\"textexposedshow\">Asyhadu allaa ilaaha illallaah!..</span><br /> <span class=\"textexposedshow\">Aku menyangka, &lsquo;oh rupanya sudah saatnya masuk waktu Subuh&rsquo;. Akupun bertanya kepada perawat ; &lsquo;Jam berapa sekarang?&rsquo;. Dijawab perawat ; &lsquo;masih jam satu (malam) dok&hellip;&rsquo;. Aku baru sadar bahwa saat ini belum tiba saatnya Adzan Subuh. Akupun kembali meletakkan stetoskop di atas dadanya. Dan kembali saya mendengar suara adzan lagi dengan lengkap&hellip;.</span><br /> <span class=\"textexposedshow\">Setelah selesai pemeriksaan, dimandikan, dan jenazah di kuburkan. Esoknya aku mendatangi keluarganya. Aku ingin tahu dan bertanya amalan apa yang di lakukan orang ini, sehingga dari dalam dadanya terdengar suara adzan. Mereka menjawab : &lsquo;Ia bekerja sebagai seorang Muadzin pada sebuah masjid, biasanya ia datang ke masjid seperempat jam sebelum tiba waktunya adzan atau kadang lebih awal lagi. Ia mengkhatamkan Al Qur&rsquo;an dalam waktu tiga hari, serta dia senantiasa menjaga lisannya dari kesalahan&hellip;.&rsquo;.&rdquo; </span><br /> <span class=\"textexposedshow\">(&ldquo;Kesaksian Seorang Dokter&rdquo; oleh : dr. Khalid bin Abdul Aziz Al-Jubair, SpJP)</span></p>","1","0","kisah,muadzdzin","20140514-065919.jpg","kisah-wafatnya-muadzdzin","Muadzdzin Adalah Tugas Mulia","52","http://www.kajianislam.net/2014/02/kisah-wafatnya-muadzdzin/");
INSERT INTO berita VALUES("19","2014-05-14 06:54:55","admin","8 Obat Hati","6","<p>Hati manusia terkadang tidak stabil atau sakit seperti halnya badan. Meskipun berbeda antara sifat maupun obatnya. Apa obat yang bisa dipakai untuk mengobati hati yang sakit? Berikut ini kami sebutkan 8 obatnya. Semoga bermanfaat.</p>\n<p><strong>Pertama:</strong> al-Qur&rsquo;an al-Karim.<br /> Allah berfirman, artinya, <em>&ldquo;Hai manusia, sesungguhnya telah datang kepadamu pelajaran dari Tuhanmu dan penyembuh bagi penyakit-penyakit (yang berada) dalam dada dan petunjuk serta rahmat bagi orang-orang yang beriman.&rdquo;</em> (QS.Yunus: 57). Dia juga berfirman, artinya, <em>&ldquo;Dan Kami turunkan dari al-Quran suatu yang menjadi penawar dan rahmat bagi orang-orang yang beriman dan al-Quran itu tidaklah menambah kepada orang-orang yang zalim selain kerugian.&rdquo;</em> (QS. al-Isra: 82)<br /> Ibnu Qoyyim berkata, &ldquo;Inti penyakit hati itu adalah syubhat dan nafsu syahwat. Sedangkan al-Qur&rsquo;an adalah penawar bagi kedua penyakit itu, karena di dalamnya terdapat penjelasan-penjelasan dan argumentasi-argumentasi yang akurat, yang membedakan antara yang haq dengan yang batil, sehingga penyakit syubhat hilang. Penyembuhan al-Qur&rsquo;an terhadap penyakit nafsu syahwat, karena di dalam al-Qur&rsquo;an terdapat hikmah, nasihat yang baik, mengajak zuhud di dunia dan lebih mengutamakan kehidupan akhirat.&rdquo;<br /> Orang yang ingin memperbaiki hatinya hendaknya mengetahui bahwa berobat dengan al-Qur&rsquo;an itu tidak cukup hanya dengan membaca al-Qur&rsquo;an saja, tetapi harus memahami, mengambil pelajaran dan mematuhi hukum-hukum yang terkandung di dalamnya.<br /> Ya Allah, jadikanlah al-Qur&rsquo;an itu sebagai pelipur lara, penawar hati dan penghilang kegundahan dan kegelisahan kami. Amin.</p>\n<p><strong>Kedua:</strong> Cinta kepada Allah.<br /> Cinta kepada Allah merupakan terapi yang mujarab bagi hati. Cinta seorang hamba kepada Allah akan menjadikan hatinya tunduk kepada-Nya, merasa tenteram tatkala mengingat-Nya, mengorbankan perasaannya demi sang kekasihnya, yaitu Allah. Hatinya senantiasa mengharap kepada yang dicintainya untuk memecahkan problem yang ia hadapi. Ia pun tak putus asa dari kasih sayang-Nya. Ia yakin bahwa yang dicintainya adalah Dzat yang tepat untuk mengadukan berbagai masalah. Ia yakin akan diberikan solusi yang terbaik untuknya. Kecintaan kepada-Nya menyebabkan dapat menikmati manisnya iman yang bersemayam di dalam hati.</p>\n<p><strong>Ketiga:</strong> Berdzikir atau mengingat Allah.<br /> Ketidaktenteraman hati merupakan hal yang membahayakan. Allah memberikan salah satu obat yang bisa menjadi sarana terapi keadaan hati yang demikian. <em>&ldquo;Ingatlah, hanya dengan mengingat Allahlah hati menjadi tenteram&rdquo;</em> demikianlah arti firman Allah dalam QS. ar-Ra&rsquo;d : 28. Obat ini menjadikan hati seseorang hidup, terhindar dari kekerasan dan kegelapan. Ibnu Qayyim berkata, &ldquo;Segala sesuatu itu mempunyai penerang, dan sesungguhnya penerang hati itu adalah <em>dzikrullah</em> (mengingat Allah).<br /> Suatu ketika, seorang berkata kepada Hasan al-Basri, &ldquo;Wahai Abu Sa&rsquo;id, aku mengadu kepadamu, hati saya membatu.&rdquo; Maka beliau menjawab, &ldquo;Lunakkanlah dengan dzikir, karena tidak ada yang dapat melunakkan kerasnya hati yang sebanding dengan <em>dzikrullah.</em>&rdquo; maka dari itu Allah di dalam banyak ayat-ayat-Nya menyuruh orang-orang yang beriman agar banyak dan sering berdzikir kepada-Nya. Seperti pada firman-Nya, artinya, <em>&ldquo;Hai orang-orang yang beriman, berdzikirlah (dengan menyebut nama) Allah, dzikir yang sebanyak-banyaknya.&rdquo;</em> (QS. al-Ahzab: 41). Nabi kita Muhammad selalu berdzikir kepada Allah pada setiap saat, sebagaimana dituturkan oleh istri beliau &lsquo;Aisyah.</p>\n<p><strong>Keempat:</strong> Taubat nasuha dan banyak beristighfar (minta ampun).<br /> Perhatikanlah sabda Rasulullah, <em>&ldquo;Sesungguhnya hatiku kadang keruh, maka aku beristighfar dalam satu hari sebanyak seratus kali&rdquo;</em> (HR. Ahmad)<br /> Dalam hadis ini Nabi menjelaskan bahwa beliau menghilangkan kabut atau kekeruhan hati beliau dengan istighfar, padahal dosa-dosa beliau yang telah lalu maupun yang akan datang telah diampuni oleh Allah. Bagaimanakah dengan kita yang banyak dosa dan banyak melakukan kemaksiatan? Tidakkah kita lebih membutuhkan istighfar untuk hati kita yang sakit?! Demi Allah, betapa kita semua, sangat membutuhkan istighfar.</p>\n<p><strong>Kelima:</strong> Banyak berdoa dan permintaan kepada Allah untuk memperbaiki dan membersihkan hati serta memberinya petunjuk.<br /> Berdoa merupakan pintu utama yang agung untuk memperbaiki hati. Allah berfirman, artinya, <em>&ldquo;Maka mengapa mereka tidak memohon (kepada Allah) dengan tunduk me- rendahkan diri ketika datang siksaan Kami kepada mereka, bahkan hati mereka telah menjadi keras, dan setan pun menampakkan kepada mereka kebagusan apa yang selalu mereka kerjakan.&rdquo;</em> (QS. al-An&rsquo;am: 43).<br /> Teladan kita yang mulia Muhammad sendiri selalu memohon kepada Allah untuk kesucian hatinya, kokoh berjalan di atas kebenaran dan petunjuk. Sebagaimana diriwayatkan oleh Imam at-Tirmidzi dari Ummu Salamah. Ia meriwayatkan bahwa doa Nabi yang sering beliau panjatkan ialah, <em>&ldquo;wahai Tuhan Pembolak-balik hati, teguhkanlah hatiku pada agama-Mu&rdquo;</em> (HR. at-Tirmidzi)</p>\n<p><strong>Keenam:</strong> Sering mengingat kehidupan akhirat.<br /> Sesungguhnya kelalaian mengingat akhirat itu adalah penghambat segala kebaikan, kebajikan dan merupakan pemicu setiap malapetaka dan kejahatan. Seseorang yang banyak mengingat akhirat, akan menyadarkan dirinya bahwa kehidupan sebenarnya, yang dia hidup selama-lamanya adalah kehidupan akhirat. Dengan demikian, hatinya lurus dalam mengendalikan jasad. Tindak tanduknya mencerminkan amal nyata yang ia tanam di dunia ini dengan harapan ia akan dapat menuai hasilnya yang baik di akhirat kelak.</p>\n<p><strong>Ketujuh:</strong> Membaca dan mempelajari sejarah kehidupan orang-orang yang shalih.<br /> Ini pun bisa menjadi salah satu obat bagi hati. Banyak pelajaran tentang teguhnya hati dari hempasan badai kehidupan yang menerjang. Siapa saja yang memperhatikan dan mempelajari kehidupan atau sejarah suatu kaum berdasarkan pengetahuan dan penghayatan, maka niscaya hatinya dihidupkan kembali oleh Allah dan disucikan batinnya. Itulah sejarah dan perjalanan hidup Nabi Muhammad. Sejarah kehidupan beliau merupakan terapi untuk mempertebal iman dan memperbaiki hati.</p>\n<p><strong>Kedelapan:</strong> Bersahabat dengan orang-orang shalih, bertakwa dan berbuat kebaikan.<br /> Seseorang yang bergaul dengan orang yang bertakwa niscaya tidak celaka. Karena mereka tidak akan mengajak selain kepada kebaikan. Selamatlah hati dari terkontaminasi penyakit-penyakit hati. Sebaliknya, jika Anda bersahabat dengan orang-orang yang tidak shalih, tidak bertakwa dan tidak berbuat kebaikan, niscaya Anda akan celaka. Mereka akan mengajak Anda untuk melakukan berbagai kejelekan yang akan menyebabkan hati Anda menjadi kotor. Allah secara tegas berfirman, artinya, <em>&ldquo;&hellip; dan janganlah kamu mengikuti orang-orang yang hatinya telah Kami lalaikan dari mengingat Kami, serta menuruti hawa nafsunya dan adalah keadaannya itu melewati batas&rdquo;</em>(QS. al-Kahfi : 28)<br /> Maka berupayalah untuk bersahabat dengan orang-orang yang shalih.</p>\n<p>Demikian 8 obat untuk menyembuhkan penyakit hati. Berusahalah Anda untuk memahami dengan baik dan mengamalkan dengan tekun, karena sesungguhnya kebahagiaan yang hakiki itu, tidak akan dapat dicapai kecuali dengan keselamatan dan kesucian hati. Dan tidak ada yang sempurna, yang lebih bahagia, yang lebih baik, dan tidak ada pula yang lebih nikmat daripada kehidupan orang-orang yang berhati bersih juga mulia. <em>Wallahu &lsquo;alam bish shawab</em><strong> (Redaksi)</strong></p>\n<p><strong>[Sumber:</strong> Disarikan dari <em>&ldquo;Shalahul Qulub&rdquo;,</em> Syaikh Dr. Khalid bin Abdullah al-Mushlih &ndash;semoga Allah menjaganya- dengan sedikit gubahan./alsofwah]</p>","1","0","obat hati","20140514-065822.jpg","8-obat-hati","Hati Bening Hidup Damai","53","http://www.kajianislam.net/2014/01/8-obat-hati/");
INSERT INTO berita VALUES("20","2014-05-17 20:17:30","admin","Batasi Pembangunan Ruko","9","<p>KODEW sinam pemilik nama&nbsp; Citra Alvin Parasti, oleh rekan-rekannya, biasa disapa Citra. Lulusan S.1 Ikom Universitas Muhammadiyah Malang ini sekarang, bekerja di sebuah bank di Pandaan.<br /> &ldquo;Kepengennya pindah memang&nbsp;&nbsp; bisa kembali ke Malang, agar dekat dengan keluarga,&rdquo; ujarnya kepada Malang Post. Ia kemudian buru-buru menambahkan bahwa kondisi Malang saat ini&nbsp; sudah jauh berbeda dengan lima tahun lalu. Kemacetan ada dimana-mana dan mulai memiliki persoalan sosial lainnya. Yakni masalah klasik yang biasanya menimpa kota besar, banjir.</p>\n<p>&ldquo;Saya kira perlu adanya pembatasan pembangunan rumah toko (ruko),&rdquo; katanya dengan nada tegas.Sebab ruko yang kini bermunculan, menyebabkan kawasan resapan menjadi berkurang. Apalagi ruko yang muncul, sepertinya tidak diiikuti dengan pertimbangan mengenai amdal. Buktinya ada yang berdiri diatas sungai serta kawasan sempadan yang terlarang untuk bangunan.&ldquo;Perlu dibatasi dan ditata ulang, kalau tidak tegas ya bermunculan seperti ini,&rdquo; keluhnya.</p>\n<p>Selain membatasi pendirian ruko, Citra mengusulkan agar memperbanyak taman kota. Keindahan Kota Malang pada masanya harus tetap dilestarikan. Dia mengingatkan bahwa Malang dulunya disebut sebagai Malang Kota Bunga.<br /> &ldquo;Taman kota ini menjadi ikon penting sekaligus kawasan konservasi air dan resapan,&rdquo; beber dia.</p>\n<p>Tak hanya peran pemerintah, situasi ini juga membutuhkan peran masyarakat.&nbsp; Dalam hal ini, warga kota juga harus bersikap kritis. Utamanya jika ada upaya pembangunan yang tidak mengindahkan aspek lingkungan.&ldquo;Saya rindu Malang yang ijo royo-royo seperti dulu, Malang Kota Bunga,&rdquo; tandas Citra.(ary/nug)</p>","1","0","pembangunan,ruko","20140517-201947.jpg","batasi-pembangunan-ruko","Citra Alvin Parasti","62","http://www.malang-post.com/perempuan/kodew");
INSERT INTO berita VALUES("21","2014-05-17 20:33:47","admin","Bidik Nguyen Van Bien","8","<p>MALANG - Arema Cronus bakal mengisi sisa kuota satu pemain asing Asia untuk putaran kedua Indonesia Super League (ISL) 2014. Dari sumber Malang Post, pemain yang disebut-sebut akan merapat ke Singo Edan ialah Nguyen Van Bien.<br />Pemain ini memang nama baru bagi publik sepakbola Indonesia. Akan tetapi, Nguyen Van Bien bukan tidak pernah merasakan rumput Indonesia. Pemilik nomor punggung 5 di Hanoi T&amp;T itu juga turut diboyong ke Malang ketika klub asal Vietnam itu melakoni laga kontra Arema Cronus dalam babak penyisihan AFC Cup 2014.<br /><br />Kabarnya, manajemen Arema telah melakukan pendekatan intensif dengan pemain kelahiran Nam Dinh, Vietnam 27 April 1985 tersebut. Ketika dikonfirmasi, Media Oficer Arema, Sudarmaji membenarkan bahwa pihaknya tengah menjajaki komunikasi serius dengan salah satu pemain Asia. Namun ia enggan menyebutkan nama dan asal pemain yang telah didekati.<br /><br />Ditanya apakah pemain tersebut bernama Nguyen Van Bien, Sudarmaji tak mengelak, namun juga tidak membenarkan. \"Lihat saja nanti,\" kata pria asal Banyuwangi itu kepada Malang Post ketika ditemui di Kantor Arema Jl. Kertanegara No.7 Malang, kemarin (16/5).<br />Lebih lanjut, Sudarmaji menjelaskan bahwa pihaknya tidak akan membocorkan nama pemain yang diincar sebelum ada kontrak resmi. Menurutnya, terlalu riskan untuk melakukan spekulasi penyebutan nama-nama pemain, mengingat tim lain juga tengah mengincar pemain tambahan untuk putaran kedua nanti. \"Kalau kita sebut nama dan tim lain tahu kan bahaya. Nanti dia juga diincar oleh tim lain jadinya,\" imbuhnya memberikan alasan.<br /><br />Meski begitu, ia memastikan bahwa akan ada tambahan pemain asing Asia di putaran kedua. \"Saya pastikan akan ada tambahan. Tapi waktunya cukup lama untuk mendaftarkan pemain baru. Jadi kita masih punya banyak waktu untuk mencari,\" papar mantan wartawan tersebut.<br />Selain itu, Sudarmaji juga mengungkapkan bahwa dalam waktu dekat pemain yang digadang-gadang bakal memperkuat tim asuhan Suharno-Joko \'Gethuk\' Susilo akan bergabung dengan tim. \"Sebelum akhir Mei pemain itu akan datang. Tapi kita lihat dulu kemampuannya. Nanti biar tim pelatih yang menilai,\" tutupnya.(rul/lim)</p>","1","0","arema,aremania","","bidik-nguyen-van-bien","","24","http://www.malang-post.com/arema-persema/86681-bidik-nguyen-van-bien");
INSERT INTO berita VALUES("22","2014-05-18 05:29:56","admin","Seorang Mukmin, Sedikit Bicara dan Banyak Beramal","6","<p>Imam Musa bin Jakfar as berkata: &ldquo;&hellip;Wahai Hisyam! Rasulullah Saw bersabda, ketika kalian melihat seorang mukmin diam, maka dekati dia.Karena dia akan mengemukakan hikmah dan orang mukmin yang sedikit berbicara maka dia banyak beramal sedangkan orang munafik banyak berbicara sedikit beramal.&rdquo;</p>\n<p>Ayatullah Mojtaba Tehrani menjelaskan hadis tersebut dan mengatakan, &ldquo;Ketika kita melihat seorang mukmin yang cenderung diam, maka kita dianjurkan untuk mendekati dia karena orang mukmin seperti ini hanya mengatakan kebenaran yang juga berarti hikmah.&rdquo;</p>\n<p>&ldquo;Selanjutnya Rasulullah menyifati orang mukmin dengan lebih sedikit berbicara dan banyak beramal. Yand dimaksud adalah bahwa orang mukmin itu sedikit mengemukakan hal-hal baik akan tetapi lebih banyak melakukan kebajikan. Pada intinya orang mukmin itu sedikit berbicara tapi tidak dari sisi amal, karena paling banyak beramal.&rdquo;</p>\n<p>&ldquo;Sebaliknya, adalah orang munafik, mereka bukan saja banyak berbicara melainkan juga sedikit beramal. Dengan demikian orang mukmin tidak memisahkan antara ucapan dan amalnya, keduanya dimasukkan dalam amalnya. Karena pada hakikatnya ini semua adalah amal manusia yang akan tercatat dan dihisab kelak. Oleh karena Rasulullah menilai orang mukmin itu pendiam, tidak banyak berbicara, karena ucapan dan apa yang dilakukannya termasuk dalam amalnya.&rdquo;(IRIB Indonesia)</p>","1","0","mukmin,sedikit bicara,banyak beramal","20140520-063450.jpg","seorang-mukmin-sedikit-bicara-dan-banyak-beramal","","103","");
INSERT INTO berita VALUES("23","2014-05-21 07:29:45","admin","Mencari Solusi","6","<p><span class=\"userContent\">Menyalakan lilin kecil adalah lebih baik daripada sepanjang umur mencaci dan mengutuk kegelapan..!</span></p>\n<p>Mencari solusi dari masalah itu adalah yang terbaik daripada hanya marah dan emosional yang tidak akan membawa hasil apapun, bahkan merugikan..</p>","1","0","mencari,solusi","20140521-073151.jpg","mencari-solusi","Mencari Solusi Adalah Terbaik","29","");
INSERT INTO berita VALUES("24","2014-05-21 07:34:04","admin","Bahagia Itu Jika Kita Dekat Kepada Pemilik Bahagia","6","<p>Peter Lawrence Smedley seorang Milyuner pemilik hotel-hotel mewah di Inggris yang sudah merasakan berbagai kenikmatan dunia, pada masa tuanya bosan hidup karena penyakit yang di deritanya dan mengakhiri hidupnya dengan bunuh diri disaksikan oleh isteri dan anaknya dan direkam video..<br /><br />Sungguh sayang seribu sayang, ia telah menikmati semua yang ada di dunia tapi tidak pernah kenal dengan Robbnya Allah Ta&rsquo;ala dan Nabinya Muhammad Shallallahu &lsquo;Alaihi Wa &lsquo;Ala Alihi Wa Sallam..<br /><br />Tidak pernah pergi ke tempat terindah Mekkah dan Madinah..<br /><br />Apakah bunuh diri menyelesaikan masalah..?<br /><br />Ia menyangka kematian adalah akhir dari segalanya.. Padahal kematian adalah awal dari kehidupan yang sebenarnya..!<br /><br />Amirul Mukminin Ali bin Abi Thalib radliyallahu &lsquo;anhu mengatakan:<br />&ldquo;Manusia itu tidur, maka apabila telah mati barulah ia terbangun&rdquo;.<br /><br />Silahkan Anda baca Al-Qur&rsquo;an surat ke 50 Qoof mulai ayat 19 dan renungkan..<br /><br />Biografi dan video Peter Lawrence Smedley bisa Anda cari di Google..</p>","1","0","bahagia,pemilik bahagia","20140521-165620.jpg","bahagia-itu-jika-kita-dekat-kepada-pemilik-bahagia","","33","http://www.kajianislam.net/2014/05/bahagia-itu-jika-kita-dekat-kepada-pemilik-bahagia/");
INSERT INTO berita VALUES("25","2014-05-22 21:12:11","admin","Berdiri di Pundak Raksasa-Raksasa","10","<p>Siapa yang minggu lalu hadir di acara perhelatan akbar Pesta Wirausaha TDA 2014? Untuk yang hadir tentu Anda semua sudah belajar banyak, seperti halnya yang saya alami. Atau mungkin Anda telah menemukan Magic Moment yang membuat Anda berkomitmen untuk benar-benar menjadi pengusaha sukses atau pengusaha yang lebih sukses ? Atau malah jadi pengusaha saksesss&hellip;ala mas Rene? He he.</p>\n<p>Salut untuk panitia dan segenap pejuang TDA yang telah berusaha maksimal untuk menyukseskan acara tersebut.</p>\n<p>Small is the new big, adalah judul materi yang saya bawakan dipanggung dalam perhelatan akbar Pesta Wirausaha kemarin.</p>\n<p>Bicara di atas panggung yang begitu besar, yakni dengan panjang 20 meter dengan jumlah peserta seminar begitu banyaknya, adalah pengalaman pertama dan sangat berkesan untuk saya pribadi, dan mohon maaf, kalau saya masih cukup grogi waktu itu.</p>\n<p>Karena waktu yang terbatas, maka kala itu saya belum gamblang menyampaikan salah satu inti bahasan, yakni bahwa pengusaha lebih kecil, punya banyak kelebihan dibanding dengan pesaing yang jauh lebih besar. Selain itu ada satu strategi yang ingin saya sampaikan, bagaimana supaya pengusaha kecil, bisa lebih cepat menjadi besar.</p>\n<p>Ini adalah strategi yang saya peroleh dari nasehat pemikir jadul yang sangat legendaris, yakni Sir Isac Newton &ldquo;If you can learn to stand on the shoulders of giants, you can get bigger, faster.&rdquo; ( Kalau Anda bisa belajar untuk berdiri di pundak raksasa-raksasa, maka Anda bisa menjadi lebih besar dan lebih cepat ). Nasehat lain yang lebih sederhana saya baca dari buku karya Tung Desem Waringin, yang menyatakan bahwa untuk membuat sebuah bisnis memiliki kemungkinan sukses tinggi, maka bekerja samalah dengan yang terbaik di bidangnya.</p>\n<p>Seperti biasa, mendengar nasihat bagus seperti ini, maka saya bertanya pada diri sendiri, bagaimana ya untuk melakukanya di bisnis saya ? Akhirnya meski perusahaan konsultan dan perdagangan kami baru saja berdiri, saya beranikan diri menghubungi raksasa alias pengusaha terbaik di industri plastik yang saya geluti, sebuah perusahaan yang sudah go public di Malaysia, adalah raksasa pertama yang menyambut ajakan kerjasama saya. Tak tanggung-tanggung CEO dan pemegang saham tertinggi terbang ke Jakarta dan menemui saya untuk membahas kerjasama lebih lanjut di hotel Sheraton Bandara.</p>\n<p>Setelah mendapat angin segar dari raksasa pertama, kami pun memberanikan diri menawarkan jasa konsultan dan pemasok kepada sebuah produsen part elektronik merek global dari negara maju yang memiliki basis produksi di Indonesia. Produk mereka bukan hanya menjadi top brand di Indonesia, tetapi sebagian besar produknya di ekspor ke banyak negara. Perusahaan ini juga terbaik di bidangnya dan saya kategorikan raksasa kedua yang saya ikuti.</p>\n<p>Kemudian, saya mendirikan perusahaan manufaktur biji plastik bekerjasama dengan pengusaha senior yang memiliki sumber daya yang memadai untuk memenuhi berbagai kebutuhan dalam membangun sebuah perusahaan manufaktur. Ini adalah bagian pundak raksasa yang saya gunakan juga.</p>\n<p>Perusahaan manufaktur baru tersebut, segera saya fokuskan untuk membidik konsumen sebuah produsen peralatan rumah tangga, yang bukan hanya top brand dan memiliki market share terbesar di Indonesia, dia juga adalah pemenang besar dalam tender-tender proyek yang diselenggarakan pemerintah. Ketika kami dipercaya menjadi pemasok mereka, maka kamipun bergerak cepat dan menjadi lebih besar dengan lebih mudah. Ini adalah raksasa yang terus kami ikuti.</p>\n<p>Pemasok-pemasok yang mampu memberi pelayanan dan kerjasama terbaik, juga merupakan raksasa yang penting untuk membantu pertumbuhan bisnis kami. Dan masih banyak lagi raksasa-raksasa yang terbaik di bidangnya yang mampu mendorong dan mendukung perkembangan bisnis kami.</p>\n<p>Teman saya yang merupakan produsen produk retail seperti kopi jahe, ekstrak beras merah dan lain-lain, ketika saya tanya kiat sukses menjual dan mendistribusikan produknya ke seluruh Indonesia. Dengan santai dia menjawab, &ldquo;Ngapain pusing-pusing, saya kan orang bodo, jadi mending produk saya titipkan ke jalur distribusi Sariwangi&rdquo;. Wow ini adalah pundak raksasa yang sangat tepat untuk membantu bisnis kawan saya itu menjadi besar dengan lebih mudah.</p>\n<p>Jika usaha kita tidak segera berkembang dan menjadi lebih besar sesuai harapan kita, ada baiknya kita renungkan dan kita jalani nasehat Sir Issac Newton ini &ldquo;If you can learn to stand on the shoulders of giants, you can get bigger, faster.&rdquo; ( Kalau Anda bisa belajar untuk berdiri di pundak raksasa-raksasa, maka Anda bisa menjadi lebih besar dan lebih cepat ). Atau mungkin kita belum mengikuti nasehat Tung Desem Waringin untuk bekerjasama dengan yang terbaik di bidangnya.</p>\n<p>&nbsp;</p>\n<p>Mustofa Romdloni<br /> MR Corporation<br /> @tofazenith</p>","1","0","pesta wirausaha,tangan di atas,tda,wirausaha","20140522-211326.jpg","berdiri-di-pundak-raksasa-raksasa","","42","http://tangandiatas.com/2014/05/21/berdiri-di-pundak-raksasa-raksasa/");



DROP TABLE berita_kat;

CREATE TABLE `berita_kat` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(2) NOT NULL DEFAULT '0',
  `kategori` varchar(50) NOT NULL DEFAULT '',
  `ket` varchar(250) NOT NULL DEFAULT '',
  `slug` varchar(50) NOT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO berita_kat VALUES("1","0","Bisnis dan Ekonomi","Berisi artikel seputar Bisnis dan Ekonomi","bisnis-dan-ekonomi");
INSERT INTO berita_kat VALUES("2","0","Komputer","Berisi artikel seputar ilmu komputer","komputer");
INSERT INTO berita_kat VALUES("3","2","Web Desain","Berisi artikel seputar Web Desain","web-desain");
INSERT INTO berita_kat VALUES("7","2","Pemrograman","Berisi artikel seputar Pemrograman","pemrograman");
INSERT INTO berita_kat VALUES("4","0","Ngalaman","Berita seputar malang raya dan sekitarnya","ngalaman");
INSERT INTO berita_kat VALUES("5","2","Desain Grafis","Desain Grafis","desain-grafis");
INSERT INTO berita_kat VALUES("6","0","Religi dan Renungan","Religi dan Renungan","religi-dan-renungan");
INSERT INTO berita_kat VALUES("8","0","Olahraga","Olahraga","olahraga");
INSERT INTO berita_kat VALUES("9","4","Kodew","Kodew","kodew");
INSERT INTO berita_kat VALUES("10","0","Tangan Di Atas (TDA)","Berisi berita atau Artikel dari Tangan Di Atas Community","tangan-di-atas-tda");



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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO berita_komentar VALUES("1","3","0","125.164.14.143","2014-05-13 05:38:19","Ismail Marzuki","cow_ngalam@yahoo.co.id","www.kerangalam.web.id","Subhanallah");
INSERT INTO berita_komentar VALUES("2","20","0","110.139.65.26","2014-05-17 21:08:37","bayu setiawan","boriel_you@yahoo.com","","iyo emank, setuju mbak brooo ;)");
INSERT INTO berita_komentar VALUES("3","3","1","125.164.10.149","2014-05-21 22:35:13","Ismail Marzuki","webmaster@teamworks.co.id","www.teamworks.co.id","Thanks mas bro atas komentarnya :)");



DROP TABLE berita_setting;

CREATE TABLE `berita_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb_width` varchar(10) NOT NULL DEFAULT '',
  `normal_width` varchar(10) NOT NULL DEFAULT '',
  `kualitas` int(3) NOT NULL DEFAULT '100',
  `pberita` int(2) NOT NULL DEFAULT '0',
  `pkomentar` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO berita_setting VALUES("1","150","700","85","0","1");



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
INSERT INTO download VALUES("3","1","2014-05-07 19:32:49","Guy Demel","Guy Demel &quot;Batalkan&quot; Keunggulan Liverpool","Tulips.jpg","0","879394");



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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO foto VALUES("1","1","2014-05-21 04:15:01","admin","Chrysanthemum","Chrysanthemum","1","1-20140521-041500.jpg","chrysanthemum","0");
INSERT INTO foto VALUES("2","1","2014-05-21 04:19:45","admin","Desert","Desert","1","2-20140521-054624.jpg","desert","0");
INSERT INTO foto VALUES("3","1","2014-05-21 04:21:56","admin","Hydrangeas","Hydrangeas","1","3-20140521-054655.jpg","hydrangeas","0");
INSERT INTO foto VALUES("4","1","2014-05-21 04:21:56","admin","Jellyfish","Jellyfish","1","4-20140521-054743.jpg","jellyfish","0");
INSERT INTO foto VALUES("5","1","2014-05-21 04:21:57","admin","Koala","Koala","1","5-20140521-042156.jpg","koala","0");
INSERT INTO foto VALUES("6","1","2014-05-21 04:21:57","admin","Lighthouse","Lighthouse","1","6-20140521-042157.jpg","lighthouse","0");
INSERT INTO foto VALUES("7","1","2014-05-21 04:21:57","admin","Penguins","Penguins","1","7-20140521-042157.jpg","penguins","0");



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
  `thumb_width` int(5) NOT NULL DEFAULT '150',
  `normal_width` int(5) NOT NULL DEFAULT '800',
  `kualitas` int(3) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO foto_setting VALUES("1","150","800","80");



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
  `judul` varchar(250) NOT NULL DEFAULT '',
  `ket` text NOT NULL,
  `waktu_mulai` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `waktu_akhir` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO kalender VALUES("1","Senam Pagi","Senam Pagi","2014-05-21 00:00:00","2014-05-22 00:00:00","#d1d1d1");



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
  `publikasi` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO links VALUES("1","2","2014-05-12 04:27:15","Teamworks Indonesia","Teamworks Indonesia","http://www.teamworks.co.id","10","teamworks-indonesia","1");
INSERT INTO links VALUES("2","1","2014-05-12 04:29:03","Sumber Hosting Indonesia","Sumber Hosting Indonesia","http://www.sumberhosting.co.id","13","sumber-hosting-indonesia","1");
INSERT INTO links VALUES("3","1","2014-05-12 04:29:48","Grosir Sandal Surabaya","Grosir Sandal Surabaya","http://www.grosirsandalsurabaya.com","11","grosir-sandal-surabaya","1");



DROP TABLE links_kat;

CREATE TABLE `links_kat` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL DEFAULT '',
  `keterangan` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO links_kat VALUES("1","Partnership","Berisi link-link website partnership kami","partnership");
INSERT INTO links_kat VALUES("2","Klien","Berisi link-link website klien kami","klien");



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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO menu_users VALUES("1","Berita","?opsi=berita&modul=yes","1");



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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO modul VALUES("1","Berita Terpopuler","id-content/modul/berita/terpopuler.php","","1","1","3","module");
INSERT INTO modul VALUES("2","Statistik Situs","id-content/modul/statistik/stat.php","","1","0","9","module");
INSERT INTO modul VALUES("3","Kalender","id-content/modul/kalender/kalender_blok.php","","1","0","8","module");
INSERT INTO modul VALUES("4","Pesan Singkat","id-content/modul/shoutbox/shoutboxview.php","","1","1","6","module");
INSERT INTO modul VALUES("5","Random Links","id-content/modul/links/links_random.php","","1","0","5","module");
INSERT INTO modul VALUES("6","Kategori Berita","id-content/modul/berita/kategori.php","","1","1","2","module");
INSERT INTO modul VALUES("7","Login","id-content/modul/login/login.php","","1","1","1","module");
INSERT INTO modul VALUES("8","ip logs","id-content/modul/phpids/ids.php","","0","0","1","module");
INSERT INTO modul VALUES("9","Komentar Terbaru","id-content/modul/berita/komentar.php","","1","1","4","module");
INSERT INTO modul VALUES("10","Top Download","id-content/modul/download/topdl.php","","0","0","2","module");
INSERT INTO modul VALUES("11","Tags","id-content/modul/berita/tags.php","","1","1","7","module");
INSERT INTO modul VALUES("12","Arsip","id-content/modul/berita/arsip.php","","1","0","3","module");



DROP TABLE posted_ip;

CREATE TABLE `posted_ip` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL DEFAULT '',
  `ip` varchar(100) NOT NULL DEFAULT '',
  `time` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO posted_ip VALUES("1","contact","125.164.14.143","1399936609");
INSERT INTO posted_ip VALUES("2","contact","125.164.14.143","1399936953");
INSERT INTO posted_ip VALUES("3","contact","125.164.14.143","1399937072");
INSERT INTO posted_ip VALUES("4","contact","125.164.14.143","1399937150");
INSERT INTO posted_ip VALUES("5","contact","125.164.14.143","1399937218");
INSERT INTO posted_ip VALUES("6","contact","125.164.14.143","1399937414");
INSERT INTO posted_ip VALUES("7","contact","125.164.14.143","1399937437");
INSERT INTO posted_ip VALUES("8","contact","125.164.14.143","1399937532");
INSERT INTO posted_ip VALUES("9","contact","36.74.214.175","1400544695");



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

INSERT INTO setting VALUES("1","cow_ngalam@yahoo.co.id","Kera Ngalam","Kera Ngalam | Belajar dan Bekerja dengan Cinta","http://www.kerangalam.web.id","Belajar dan Bekerja dengan Cinta","Seberkas sinar yang menerangi dalam kegelapan, setetes air yang menyegarkan kehidupan, membawa diriku mengarungi samudra yang luas, mendaki gunung yang terjal, bangkit dan berdiri demi masa depan.\n\nDisudut kota yang penuh dengan deru dan debu, ku usap seluruh keringat yang membasahi, akupun menatap indahnya langit di siang hari, dan melihat kebelakang berbagai macam keindahan ku aku dapat. Aku hidup dan belajar dari alam, alam yang membuat karakterku untuk terus menerus belajar dan belajar karena aku tau, hidup memerlukan pemeran yang tangguh.\n\nLewat diary ini aku ingin menyapa teman-teman yang ingin disapa, aku disini mengajak teman-teman untuk berbagi, karena aku adalah insan yang kekurangan. Ku ulurkan tanganku untukmu teman, namun aku terhempas dalam kejauhan. Mari kita saling berdekatan, merapatkan barisan dengan satu Visi dan Misi. Kemajuan Yang Akan Dicapai.\n\nAku lahir disebuah sudut Propinsi JATIM, aku dididik dan dibesarkan di sana, hingga aku belajar dan terus belajar untuk menghadapi hidup ini, namun satu yang membuatku tegar dan terus berdiri bahkan kadangkala aku berlari. aku yakin hanya dengan nama-Nya aku bisa berdiri dan terus berlari namun seiring dengan doa dan dukungan dari semua pihak.","Kera, Ngalam, Malang, Ngalaman, Aremania, Kera Ngalam, Malayang Raya, Ngalamania, Batu, Apel","default","Teamworks Indonesia","<p><strong>Kera Ngalam</strong></p>\n<p>Jl. A. Satsui Tubun I / 35<br />Malang - Jawa Timur</p>","1");



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

INSERT INTO usercounter VALUES("1","204.187.14.73-204.187.14.75-180.76.5.72-180.246.106.204-69.171.230.116-217.69.133.236-","1288","6741");



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
) ENGINE=MyISAM AUTO_INCREMENT=1608 DEFAULT CHARSET=latin1;

INSERT INTO useronline VALUES("1605","125.164.4.73","73.subnet125-164-4.speedy.telkom.net.id","125.164.4.73","","1401430331");
INSERT INTO useronline VALUES("1606","204.187.14.75","metrixca3.nmsrv.com","204.187.14.75","","1401430335");
INSERT INTO useronline VALUES("1607","204.187.14.73","metrixca1.nmsrv.com","204.187.14.73","","1401430386");



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
) ENGINE=MyISAM AUTO_INCREMENT=864 DEFAULT CHARSET=latin1;

INSERT INTO useronlineday VALUES("835","86.51.26.17","86.51.26.17","86.51.26.17","","1401357122");
INSERT INTO useronlineday VALUES("843","36.74.215.52","36.74.215.52","36.74.215.52","","1401346554");
INSERT INTO useronlineday VALUES("862","204.187.14.75","metrixca3.nmsrv.com","204.187.14.75","","1401430335");
INSERT INTO useronlineday VALUES("846","101.226.168.227","101.226.168.227","101.226.168.227","","1401350202");
INSERT INTO useronlineday VALUES("847","180.76.5.168","baiduspider-180-76-5-168.crawl.baidu.com","180.76.5.168","","1401350852");
INSERT INTO useronlineday VALUES("848","183.207.228.14","183.207.228.14","183.207.228.14","","1401357133");
INSERT INTO useronlineday VALUES("861","180.76.5.72","baiduspider-180-76-5-72.crawl.baidu.com","180.76.5.72","","1401418207");
INSERT INTO useronlineday VALUES("854","180.76.5.196","baiduspider-180-76-5-196.crawl.baidu.com","180.76.5.196","","1401388898");
INSERT INTO useronlineday VALUES("863","204.187.14.73","metrixca1.nmsrv.com","204.187.14.73","","1401430386");
INSERT INTO useronlineday VALUES("849","112.215.66.77","112.215.66.77","112.215.66.77","","1401369091");
INSERT INTO useronlineday VALUES("850","180.76.6.54","180.76.6.54","180.76.6.54","","1401376880");
INSERT INTO useronlineday VALUES("851","180.76.5.63","baiduspider-180-76-5-63.crawl.baidu.com","180.76.5.63","","1401377780");
INSERT INTO useronlineday VALUES("852","180.76.6.157","180.76.6.157","180.76.6.157","","1401382262");
INSERT INTO useronlineday VALUES("853","157.56.93.93","msnbot-157-56-93-93.search.msn.com","157.56.93.93","","1401385858");
INSERT INTO useronlineday VALUES("855","5.158.235.199","5.158.235.199","5.158.235.199","","1401403798");
INSERT INTO useronlineday VALUES("856","180.76.6.20","180.76.6.20","180.76.6.20","","1401413140");
INSERT INTO useronlineday VALUES("857","125.164.4.73","73.subnet125-164-4.speedy.telkom.net.id","125.164.4.73","","1401430331");
INSERT INTO useronlineday VALUES("858","217.69.133.236","fetcher4-3.p.mail.ru","217.69.133.236","","1401415140");
INSERT INTO useronlineday VALUES("859","69.171.230.116","69.171.230.116","69.171.230.116","","1401415566");
INSERT INTO useronlineday VALUES("860","180.246.106.204","180.246.106.204","180.246.106.204","","1401416236");



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
) ENGINE=MyISAM AUTO_INCREMENT=632 DEFAULT CHARSET=latin1;

INSERT INTO useronlinemonth VALUES("1","125.164.38.136","136.subnet125-164-38.speedy.telkom.net.id","125.164.38.136","","1399500343");
INSERT INTO useronlinemonth VALUES("2","198.100.149.169","ks4002865.ip-198-100-149.net","198.100.149.169","","1399484688");
INSERT INTO useronlinemonth VALUES("3","178.255.215.74","crawl10.exabot.com","178.255.215.74","","1400456272");
INSERT INTO useronlinemonth VALUES("4","66.249.77.147","crawl-66-249-77-147.googlebot.com","66.249.77.147","","1400584230");
INSERT INTO useronlinemonth VALUES("5","183.207.228.11","183.207.228.11","183.207.228.11","","1400385458");
INSERT INTO useronlinemonth VALUES("6","183.60.46.72","183.60.46.72","183.60.46.72","","1399493300");
INSERT INTO useronlinemonth VALUES("7","142.4.97.180","142.4.97.180","142.4.97.180","","1399500841");
INSERT INTO useronlinemonth VALUES("8","62.210.215.118","62-210-215-118.poneytelecom.eu","62.210.215.118","","1400400023");
INSERT INTO useronlinemonth VALUES("9","76.164.234.18","76.164.234.18","76.164.234.18","","1399835463");
INSERT INTO useronlinemonth VALUES("10","180.76.6.55","180.76.6.55","180.76.6.55","","1400416862");
INSERT INTO useronlinemonth VALUES("11","72.233.72.155","155.72.233.72.static.reverse.ltdomains.com","72.233.72.155","","1401277107");
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
INSERT INTO useronlinemonth VALUES("27","208.115.111.70","208-115-111-70-reverse.wowrack.com","208.115.111.70","","1401252646");
INSERT INTO useronlinemonth VALUES("28","79.114.86.100","79-114-86-100.rdsnet.ro","79.114.86.100","","1399571273");
INSERT INTO useronlinemonth VALUES("29","5.167.8.113","5x167x8x113.dynamic.irkutsk.ertelecom.ru","5.167.8.113","","1399578555");
INSERT INTO useronlinemonth VALUES("30","180.76.5.171","baiduspider-180-76-5-171.crawl.baidu.com","180.76.5.171","","1399583468");
INSERT INTO useronlinemonth VALUES("31","194.153.113.13","194.153.113.13","194.153.113.13","","1399587634");
INSERT INTO useronlinemonth VALUES("32","180.76.5.25","baiduspider-180-76-5-25.crawl.baidu.com","180.76.5.25","","1399607390");
INSERT INTO useronlinemonth VALUES("33","180.246.106.204","180.246.106.204","180.246.106.204","","1401416235");
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
INSERT INTO useronlinemonth VALUES("56","69.171.230.112","69.171.230.112","69.171.230.112","","1400542573");
INSERT INTO useronlinemonth VALUES("57","65.52.242.216","65.52.242.216","65.52.242.216","","1400768073");
INSERT INTO useronlinemonth VALUES("58","202.67.45.44","202.67.45.44","202.67.45.44","","1399738176");
INSERT INTO useronlinemonth VALUES("59","180.248.31.153","180.248.31.153","180.248.31.153","","1399738467");
INSERT INTO useronlinemonth VALUES("60","36.68.241.4","36.68.241.4","36.68.241.4","","1399738543");
INSERT INTO useronlinemonth VALUES("61","180.254.8.251","180.254.8.251","180.254.8.251","","1399739438");
INSERT INTO useronlinemonth VALUES("62","23.253.68.131","23.253.68.131","23.253.68.131","","1400336224");
INSERT INTO useronlinemonth VALUES("63","36.82.2.4","36.82.2.4","36.82.2.4","","1399740296");
INSERT INTO useronlinemonth VALUES("64","180.246.80.45","180.246.80.45","180.246.80.45","","1399740507");
INSERT INTO useronlinemonth VALUES("65","69.171.247.115","69.171.247.115","69.171.247.115","","1400633204");
INSERT INTO useronlinemonth VALUES("66","66.220.152.114","out-ar114.tfbnw.net","66.220.152.114","","1400109806");
INSERT INTO useronlinemonth VALUES("67","95.79.201.252","dynamicip-95-79-201-252.pppoe.nn.ertelecom.ru","95.79.201.252","","1399742573");
INSERT INTO useronlinemonth VALUES("68","49.213.16.244","49.213.16.244","49.213.16.244","","1399742730");
INSERT INTO useronlinemonth VALUES("69","23.22.177.89","ec2-23-22-177-89.compute-1.amazonaws.com","23.22.177.89","","1400633269");
INSERT INTO useronlinemonth VALUES("70","54.198.116.226","ec2-54-198-116-226.compute-1.amazonaws.com","54.198.116.226","","1400333167");
INSERT INTO useronlinemonth VALUES("71","202.67.41.51","202.67.41.51","202.67.41.51","1.1 cache4:9003 (squid/2.7.STABLE9), 1.0 internal","1400173039");
INSERT INTO useronlinemonth VALUES("72","69.171.230.117","69.171.230.117","69.171.230.117","","1400662478");
INSERT INTO useronlinemonth VALUES("73","69.171.233.117","69.171.233.117","69.171.233.117","","1399752386");
INSERT INTO useronlinemonth VALUES("74","69.171.233.115","69.171.233.115","69.171.233.115","","1400542591");
INSERT INTO useronlinemonth VALUES("75","69.171.230.119","69.171.230.119","69.171.230.119","","1400333976");
INSERT INTO useronlinemonth VALUES("76","69.171.230.114","69.171.230.114","69.171.230.114","","1400774399");
INSERT INTO useronlinemonth VALUES("77","69.171.233.118","69.171.233.118","69.171.233.118","","1399752405");
INSERT INTO useronlinemonth VALUES("78","23.253.76.48","23.253.76.48","23.253.76.48","","1400028072");
INSERT INTO useronlinemonth VALUES("79","23.253.96.242","23.253.96.242","23.253.96.242","","1400028074");
INSERT INTO useronlinemonth VALUES("80","23.253.76.53","23.253.76.53","23.253.76.53","","1399825193");
INSERT INTO useronlinemonth VALUES("81","23.253.103.46","23.253.103.46","23.253.103.46","","1400025306");
INSERT INTO useronlinemonth VALUES("82","54.198.176.3","ec2-54-198-176-3.compute-1.amazonaws.com","54.198.176.3","","1400654628");
INSERT INTO useronlinemonth VALUES("83","54.198.176.3","ec2-54-198-176-3.compute-1.amazonaws.com","54.198.176.3","","1400654628");
INSERT INTO useronlinemonth VALUES("84","54.198.176.3","ec2-54-198-176-3.compute-1.amazonaws.com","54.198.176.3","","1400654628");
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
INSERT INTO useronlinemonth VALUES("103","69.171.230.115","69.171.230.115","69.171.230.115","","1400633074");
INSERT INTO useronlinemonth VALUES("104","8.37.224.161","8.37.224.161","202.67.40.50","","1399764063");
INSERT INTO useronlinemonth VALUES("105","69.171.230.116","69.171.230.116","69.171.230.116","","1401415566");
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
INSERT INTO useronlinemonth VALUES("137","37.187.79.141","ns3367731.ovh.net","37.187.79.141","","1400569541");
INSERT INTO useronlinemonth VALUES("138","76.164.224.162","ip162.manoneharbor.com","76.164.224.162","","1400109545");
INSERT INTO useronlinemonth VALUES("139","36.84.40.147","36.84.40.147","36.84.40.147","","1399895257");
INSERT INTO useronlinemonth VALUES("140","95.108.241.252","spider-95-108-241-252.yandex.com","95.108.241.252","","1399895749");
INSERT INTO useronlinemonth VALUES("141","125.164.14.143","143.subnet125-164-14.speedy.telkom.net.id","125.164.14.143","","1399937717");
INSERT INTO useronlinemonth VALUES("142","69.171.230.118","69.171.230.118","69.171.230.118","","1400072922");
INSERT INTO useronlinemonth VALUES("143","69.171.230.113","69.171.230.113","69.171.230.113","","1400680763");
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
INSERT INTO useronlinemonth VALUES("154","173.252.100.112","173.252.100.112","173.252.100.112","","1400635737");
INSERT INTO useronlinemonth VALUES("155","173.252.100.115","173.252.100.115","173.252.100.115","","1400769337");
INSERT INTO useronlinemonth VALUES("156","173.252.73.117","173.252.73.117","173.252.73.117","","1400372468");
INSERT INTO useronlinemonth VALUES("157","66.220.152.112","out-ar112.tfbnw.net","66.220.152.112","","1400159424");
INSERT INTO useronlinemonth VALUES("158","66.220.152.113","out-ar113.tfbnw.net","66.220.152.113","","1400138315");
INSERT INTO useronlinemonth VALUES("159","66.220.152.115","out-ar115.tfbnw.net","66.220.152.115","","1400110024");
INSERT INTO useronlinemonth VALUES("160","173.252.120.119","173.252.120.119","173.252.120.119","","1400138314");
INSERT INTO useronlinemonth VALUES("161","36.81.72.209","36.81.72.209","36.81.72.209","","1399910063");
INSERT INTO useronlinemonth VALUES("162","66.220.158.117","zt117.tfbnw.net","66.220.158.117","","1400632890");
INSERT INTO useronlinemonth VALUES("163","173.252.74.112","173.252.74.112","173.252.74.112","","1400039156");
INSERT INTO useronlinemonth VALUES("164","173.252.120.112","173.252.120.112","173.252.120.112","","1400543268");
INSERT INTO useronlinemonth VALUES("165","66.220.152.116","out-ar116.tfbnw.net","66.220.152.116","","1400109819");
INSERT INTO useronlinemonth VALUES("166","107.21.174.128","ec2-107-21-174-128.compute-1.amazonaws.com","107.21.174.128","","1400544167");
INSERT INTO useronlinemonth VALUES("167","107.21.174.128","ec2-107-21-174-128.compute-1.amazonaws.com","107.21.174.128","","1400544167");
INSERT INTO useronlinemonth VALUES("168","50.17.40.254","ec2-50-17-40-254.compute-1.amazonaws.com","50.17.40.254","","1399918624");
INSERT INTO useronlinemonth VALUES("169","54.197.201.242","ec2-54-197-201-242.compute-1.amazonaws.com","54.197.201.242","","1399911212");
INSERT INTO useronlinemonth VALUES("170","54.198.169.167","ec2-54-198-169-167.compute-1.amazonaws.com","54.198.169.167","","1399918624");
INSERT INTO useronlinemonth VALUES("171","54.80.159.151","ec2-54-80-159-151.compute-1.amazonaws.com","54.80.159.151","","1400656752");
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
INSERT INTO useronlinemonth VALUES("187","69.171.237.11","69.171.237.11","69.171.237.11","","1400633173");
INSERT INTO useronlinemonth VALUES("188","206.53.152.32","206-53-152-32.rdns.blackberry.net","206.53.152.32","","1399918606");
INSERT INTO useronlinemonth VALUES("189","69.171.237.15","69.171.237.15","69.171.237.15","","1399948787");
INSERT INTO useronlinemonth VALUES("190","173.252.100.113","173.252.100.113","173.252.100.113","","1400457926");
INSERT INTO useronlinemonth VALUES("191","82.145.219.55","z108-11.opera-mini.net","68.171.252.97","","1399923574");
INSERT INTO useronlinemonth VALUES("192","173.252.73.112","173.252.73.112","173.252.73.112","","1400635737");
INSERT INTO useronlinemonth VALUES("193","66.249.73.184","crawl-66-249-73-184.googlebot.com","66.249.73.184","","1400243970");
INSERT INTO useronlinemonth VALUES("194","202.67.43.20","202.67.43.20","202.67.43.20","","1399925523");
INSERT INTO useronlinemonth VALUES("195","69.171.237.9","69.171.237.9","69.171.237.9","","1400636790");
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
INSERT INTO useronlinemonth VALUES("207","173.252.101.115","173.252.101.115","173.252.101.115","","1400633185");
INSERT INTO useronlinemonth VALUES("208","173.252.73.118","173.252.73.118","173.252.73.118","","1400042098");
INSERT INTO useronlinemonth VALUES("209","173.252.74.115","173.252.74.115","173.252.74.115","","1400638199");
INSERT INTO useronlinemonth VALUES("210","173.252.74.119","173.252.74.119","173.252.74.119","","1400124532");
INSERT INTO useronlinemonth VALUES("211","173.252.74.114","173.252.74.114","173.252.74.114","","1399938839");
INSERT INTO useronlinemonth VALUES("212","157.56.93.85","msnbot-157-56-93-85.search.msn.com","157.56.93.85","","1399942686");
INSERT INTO useronlinemonth VALUES("213","95.26.250.102","95-26-250-102.broadband.corbina.ru","95.26.250.102","","1399944952");
INSERT INTO useronlinemonth VALUES("214","157.55.35.96","msnbot-157-55-35-96.search.msn.com","157.55.35.96","","1400879325");
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
INSERT INTO useronlinemonth VALUES("230","180.76.6.40","180.76.6.40","180.76.6.40","","1400758680");
INSERT INTO useronlinemonth VALUES("231","65.55.24.217","msnbot-65-55-24-217.search.msn.com","65.55.24.217","","1399965059");
INSERT INTO useronlinemonth VALUES("232","69.171.234.113","69.171.234.113","69.171.234.113","","1399970077");
INSERT INTO useronlinemonth VALUES("233","195.154.8.92","195-154-8-92.rev.poneytelecom.eu","195.154.8.92","","1399971331");
INSERT INTO useronlinemonth VALUES("234","37.58.100.76","37.58.100.76-static.reverse.softlayer.com","37.58.100.76","","1399974822");
INSERT INTO useronlinemonth VALUES("235","31.41.216.131","31.41.216.131","31.41.216.131","","1399980352");
INSERT INTO useronlinemonth VALUES("236","114.120.27.157","114.120.27.157","114.120.27.157","","1399980865");
INSERT INTO useronlinemonth VALUES("237","70.39.187.66","70.39.187.66","114.120.27.157","","1399980891");
INSERT INTO useronlinemonth VALUES("238","76.164.234.138","76.164.234.138","76.164.234.138","","1399982835");
INSERT INTO useronlinemonth VALUES("239","204.236.235.245","ec2-204-236-235-245.compute-1.amazonaws.com","204.236.235.245","","1400644265");
INSERT INTO useronlinemonth VALUES("240","199.115.117.242","hosted-by.leaseweb.com","199.115.117.242","","1399984349");
INSERT INTO useronlinemonth VALUES("241","173.252.110.118","173.252.110.118","173.252.110.118","","1400096845");
INSERT INTO useronlinemonth VALUES("242","134.249.39.22","134-249-39-22-broadband.kyivstar.net","134.249.39.22","","1399990987");
INSERT INTO useronlinemonth VALUES("243","180.76.5.196","baiduspider-180-76-5-196.crawl.baidu.com","180.76.5.196","","1401388898");
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
INSERT INTO useronlinemonth VALUES("272","173.252.120.117","173.252.120.117","173.252.120.117","","1400635738");
INSERT INTO useronlinemonth VALUES("273","82.145.216.173","z68-03.opera-mini.net","120.168.1.109","","1400031007");
INSERT INTO useronlinemonth VALUES("274","173.252.110.114","173.252.110.114","173.252.110.114","","1400031443");
INSERT INTO useronlinemonth VALUES("275","173.252.110.113","173.252.110.113","173.252.110.113","","1400034040");
INSERT INTO useronlinemonth VALUES("276","66.220.152.118","out-ar118.tfbnw.net","66.220.152.118","","1400109806");
INSERT INTO useronlinemonth VALUES("277","173.252.112.112","173.252.112.112","173.252.112.112","","1400031913");
INSERT INTO useronlinemonth VALUES("278","173.252.120.113","173.252.120.113","173.252.120.113","","1400032574");
INSERT INTO useronlinemonth VALUES("279","69.171.234.112","69.171.234.112","69.171.234.112","","1400034043");
INSERT INTO useronlinemonth VALUES("280","173.252.100.119","173.252.100.119","173.252.100.119","","1400036578");
INSERT INTO useronlinemonth VALUES("281","69.171.247.116","69.171.247.116","69.171.247.116","","1400097051");
INSERT INTO useronlinemonth VALUES("282","69.171.247.118","69.171.247.118","69.171.247.118","","1400599352");
INSERT INTO useronlinemonth VALUES("283","91.201.177.6","91.201.177.6","91.201.177.6","","1400047950");
INSERT INTO useronlinemonth VALUES("284","114.79.59.83","114.79.59.83","114.79.59.83","","1400054481");
INSERT INTO useronlinemonth VALUES("285","37.58.100.232","37.58.100.232-static.reverse.softlayer.com","37.58.100.232","","1400054726");
INSERT INTO useronlinemonth VALUES("286","208.115.113.86","208.115.113.86","208.115.113.86","","1400966195");
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
INSERT INTO useronlinemonth VALUES("298","157.55.33.121","msnbot-157-55-33-121.search.msn.com","157.55.33.121","","1400864124");
INSERT INTO useronlinemonth VALUES("299","37.58.100.170","37.58.100.170-static.reverse.softlayer.com","37.58.100.170","","1400148138");
INSERT INTO useronlinemonth VALUES("300","36.74.204.64","36.74.204.64","36.74.204.64","","1400151157");
INSERT INTO useronlinemonth VALUES("301","157.56.93.94","msnbot-157-56-93-94.search.msn.com","157.56.93.94","","1400894190");
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
INSERT INTO useronlinemonth VALUES("319","157.55.33.248","msnbot-157-55-33-248.search.msn.com","157.55.33.248","","1400636042");
INSERT INTO useronlinemonth VALUES("320","157.56.92.162","msnbot-157-56-92-162.search.msn.com","157.56.92.162","","1400186742");
INSERT INTO useronlinemonth VALUES("321","157.56.93.37","msnbot-157-56-93-37.search.msn.com","157.56.93.37","","1400187655");
INSERT INTO useronlinemonth VALUES("322","65.55.52.112","msnbot-65-55-52-112.search.msn.com","65.55.52.112","","1400638820");
INSERT INTO useronlinemonth VALUES("323","157.55.33.42","msnbot-157-55-33-42.search.msn.com","157.55.33.42","","1400196496");
INSERT INTO useronlinemonth VALUES("324","157.55.33.106","msnbot-157-55-33-106.search.msn.com","157.55.33.106","","1400190763");
INSERT INTO useronlinemonth VALUES("325","157.55.33.86","msnbot-157-55-33-86.search.msn.com","157.55.33.86","","1400210849");
INSERT INTO useronlinemonth VALUES("326","157.55.32.143","msnbot-157-55-32-143.search.msn.com","157.55.32.143","","1400190881");
INSERT INTO useronlinemonth VALUES("327","157.55.33.249","msnbot-157-55-33-249.search.msn.com","157.55.33.249","","1400207471");
INSERT INTO useronlinemonth VALUES("328","157.55.35.83","msnbot-157-55-35-83.search.msn.com","157.55.35.83","","1401179339");
INSERT INTO useronlinemonth VALUES("329","157.55.32.190","msnbot-157-55-32-190.search.msn.com","157.55.32.190","","1400918626");
INSERT INTO useronlinemonth VALUES("330","157.56.93.95","msnbot-157-56-93-95.search.msn.com","157.56.93.95","","1400447254");
INSERT INTO useronlinemonth VALUES("331","157.55.33.79","msnbot-157-55-33-79.search.msn.com","157.55.33.79","","1400194337");
INSERT INTO useronlinemonth VALUES("332","157.55.33.92","msnbot-157-55-33-92.search.msn.com","157.55.33.92","","1400193798");
INSERT INTO useronlinemonth VALUES("333","157.55.33.124","msnbot-157-55-33-124.search.msn.com","157.55.33.124","","1401161720");
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
INSERT INTO useronlinemonth VALUES("357","157.55.33.93","msnbot-157-55-33-93.search.msn.com","157.55.33.93","","1400974591");
INSERT INTO useronlinemonth VALUES("358","66.249.73.198","crawl-66-249-73-198.googlebot.com","66.249.73.198","","1400244216");
INSERT INTO useronlinemonth VALUES("359","157.55.33.178","msnbot-157-55-33-178.search.msn.com","157.55.33.178","","1400871261");
INSERT INTO useronlinemonth VALUES("360","157.55.32.28","msnbot-157-55-32-28.search.msn.com","157.55.32.28","","1400638885");
INSERT INTO useronlinemonth VALUES("361","157.56.92.164","msnbot-157-56-92-164.search.msn.com","157.56.92.164","","1400255637");
INSERT INTO useronlinemonth VALUES("362","157.55.35.47","msnbot-157-55-35-47.search.msn.com","157.55.35.47","","1400258066");
INSERT INTO useronlinemonth VALUES("363","157.55.35.80","msnbot-157-55-35-80.search.msn.com","157.55.35.80","","1400263873");
INSERT INTO useronlinemonth VALUES("364","157.56.92.177","msnbot-157-56-92-177.search.msn.com","157.56.92.177","","1400484505");
INSERT INTO useronlinemonth VALUES("365","157.55.35.36","msnbot-157-55-35-36.search.msn.com","157.55.35.36","","1400394129");
INSERT INTO useronlinemonth VALUES("366","157.55.33.80","msnbot-157-55-33-80.search.msn.com","157.55.33.80","","1400907768");
INSERT INTO useronlinemonth VALUES("367","65.55.52.89","msnbot-65-55-52-89.search.msn.com","65.55.52.89","","1400874769");
INSERT INTO useronlinemonth VALUES("368","122.96.59.102","122.96.59.102","122.96.59.102","","1400259266");
INSERT INTO useronlinemonth VALUES("369","157.55.32.109","msnbot-157-55-32-109.search.msn.com","157.55.32.109","","1400873784");
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
INSERT INTO useronlinemonth VALUES("382","157.55.33.25","msnbot-157-55-33-25.search.msn.com","157.55.33.25","","1400575661");
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
INSERT INTO useronlinemonth VALUES("398","54.82.177.129","ec2-54-82-177-129.compute-1.amazonaws.com","54.82.177.129","","1400656749");
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
INSERT INTO useronlinemonth VALUES("419","157.55.35.109","msnbot-157-55-35-109.search.msn.com","157.55.35.109","","1400660194");
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
INSERT INTO useronlinemonth VALUES("443","157.56.93.42","msnbot-157-56-93-42.search.msn.com","157.56.93.42","","1400885476");
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
INSERT INTO useronlinemonth VALUES("456","157.55.32.227","msnbot-157-55-32-227.search.msn.com","157.55.32.227","","1400665230");
INSERT INTO useronlinemonth VALUES("457","65.55.52.114","msnbot-65-55-52-114.search.msn.com","65.55.52.114","","1400470529");
INSERT INTO useronlinemonth VALUES("458","180.76.6.152","180.76.6.152","180.76.6.152","","1400476792");
INSERT INTO useronlinemonth VALUES("459","67.228.177.110","67.228.177.110-static.reverse.softlayer.com","67.228.177.110","","1400481747");
INSERT INTO useronlinemonth VALUES("460","157.55.33.44","msnbot-157-55-33-44.search.msn.com","157.55.33.44","","1400483266");
INSERT INTO useronlinemonth VALUES("461","54.204.40.155","ec2-54-204-40-155.compute-1.amazonaws.com","54.204.40.155","","1400483620");
INSERT INTO useronlinemonth VALUES("462","38.99.62.89","38.99.62.89","38.99.62.89","","1400483760");
INSERT INTO useronlinemonth VALUES("463","109.73.120.131","109.73.120.131","109.73.120.131","","1400484092");
INSERT INTO useronlinemonth VALUES("464","157.55.35.42","msnbot-157-55-35-42.search.msn.com","157.55.35.42","","1400882334");
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
INSERT INTO useronlinemonth VALUES("480","157.55.33.22","msnbot-157-55-33-22.search.msn.com","157.55.33.22","","1400669644");
INSERT INTO useronlinemonth VALUES("481","157.55.35.104","msnbot-157-55-35-104.search.msn.com","157.55.35.104","","1400504538");
INSERT INTO useronlinemonth VALUES("482","157.55.34.100","msnbot-157-55-34-100.search.msn.com","157.55.34.100","","1400504418");
INSERT INTO useronlinemonth VALUES("483","188.40.45.81","mediadb.ru","188.40.45.81","","1400506484");
INSERT INTO useronlinemonth VALUES("484","208.90.57.196","nat-vlan550.las1.sco.cisco.com","208.90.57.196","","1400532245");
INSERT INTO useronlinemonth VALUES("485","36.74.214.175","36.74.214.175","36.74.214.175","","1400545737");
INSERT INTO useronlinemonth VALUES("486","79.133.204.134","79.133.204.134","79.133.204.134","","1400619490");
INSERT INTO useronlinemonth VALUES("487","5.164.251.202","5x164x251x202.dynamic.nn.ertelecom.ru","5.164.251.202","","1400533312");
INSERT INTO useronlinemonth VALUES("488","178.137.19.49","178-137-19-49-lvv.broadband.kyivstar.net","178.137.19.49","","1400541828");
INSERT INTO useronlinemonth VALUES("489","180.254.101.118","180.254.101.118","180.254.101.118","","1400543267");
INSERT INTO useronlinemonth VALUES("490","180.76.6.57","180.76.6.57","180.76.6.57","","1400543388");
INSERT INTO useronlinemonth VALUES("491","54.246.252.56","ec2-54-246-252-56.eu-west-1.compute.amazonaws.com","180.214.232.67","1.1 Novarra (Vision/8.1)","1400544552");
INSERT INTO useronlinemonth VALUES("492","36.81.37.156","36.81.37.156","36.81.37.156","","1400548967");
INSERT INTO useronlinemonth VALUES("493","46.105.59.74","m.squider.org","46.105.59.74","","1400551946");
INSERT INTO useronlinemonth VALUES("494","125.164.39.228","228.subnet125-164-39.speedy.telkom.net.id","125.164.39.228","","1400594211");
INSERT INTO useronlinemonth VALUES("495","202.67.41.15","202.67.41.15","202.67.41.15","","1400572199");
INSERT INTO useronlinemonth VALUES("496","157.55.33.91","msnbot-157-55-33-91.search.msn.com","157.55.33.91","","1400573104");
INSERT INTO useronlinemonth VALUES("497","157.55.35.43","msnbot-157-55-35-43.search.msn.com","157.55.35.43","","1400575620");
INSERT INTO useronlinemonth VALUES("498","37.130.229.149","2582e595.rdns.100tb.com","37.130.229.149","","1400588398");
INSERT INTO useronlinemonth VALUES("499","89.234.68.85","ip-89-234-68-85.broadband.digiweb.ie","89.234.68.85","","1400598592");
INSERT INTO useronlinemonth VALUES("500","207.189.121.41","207.189.121.41","207.189.121.41","","1400600805");
INSERT INTO useronlinemonth VALUES("501","180.76.6.213","180.76.6.213","180.76.6.213","","1400603768");
INSERT INTO useronlinemonth VALUES("502","37.58.100.237","37.58.100.237-static.reverse.softlayer.com","37.58.100.237","","1400606227");
INSERT INTO useronlinemonth VALUES("503","36.74.188.234","36.74.188.234","36.74.188.234","","1400633502");
INSERT INTO useronlinemonth VALUES("504","157.55.34.166","msnbot-157-55-34-166.search.msn.com","157.55.34.166","","1400625737");
INSERT INTO useronlinemonth VALUES("505","112.215.66.81","112.215.66.81","112.215.66.81","","1400629639");
INSERT INTO useronlinemonth VALUES("506","202.46.51.143","ptr.cnsat.com.cn","202.46.51.143","","1400631465");
INSERT INTO useronlinemonth VALUES("507","185.20.4.143","sft042.sysms.net","185.20.4.143","","1400632793");
INSERT INTO useronlinemonth VALUES("508","46.236.24.54","ded3126.sysms.net","46.236.24.54","","1400633112");
INSERT INTO useronlinemonth VALUES("509","157.56.92.174","msnbot-157-56-92-174.search.msn.com","157.56.92.174","","1400635800");
INSERT INTO useronlinemonth VALUES("510","118.96.152.48","48.static.118-96-152.astinet.telkom.net.id","192.168.2.12","1.1 118.96.152.48 (Mikrotik HttpProxy)","1400742206");
INSERT INTO useronlinemonth VALUES("511","157.55.35.40","msnbot-157-55-35-40.search.msn.com","157.55.35.40","","1400647786");
INSERT INTO useronlinemonth VALUES("512","157.56.93.74","msnbot-157-56-93-74.search.msn.com","157.56.93.74","","1400872235");
INSERT INTO useronlinemonth VALUES("513","54.196.176.140","ec2-54-196-176-140.compute-1.amazonaws.com","54.196.176.140","","1400654628");
INSERT INTO useronlinemonth VALUES("514","54.234.150.79","ec2-54-234-150-79.compute-1.amazonaws.com","54.234.150.79","","1400656748");
INSERT INTO useronlinemonth VALUES("515","54.237.100.133","ec2-54-237-100-133.compute-1.amazonaws.com","54.237.100.133","","1400768835");
INSERT INTO useronlinemonth VALUES("516","54.205.48.208","ec2-54-205-48-208.compute-1.amazonaws.com","54.205.48.208","","1400656752");
INSERT INTO useronlinemonth VALUES("517","157.55.35.106","msnbot-157-55-35-106.search.msn.com","157.55.35.106","","1400847824");
INSERT INTO useronlinemonth VALUES("518","157.55.35.89","msnbot-157-55-35-89.search.msn.com","157.55.35.89","","1400670347");
INSERT INTO useronlinemonth VALUES("519","157.55.34.103","msnbot-157-55-34-103.search.msn.com","157.55.34.103","","1400659912");
INSERT INTO useronlinemonth VALUES("520","125.164.10.149","149.subnet125-164-10.speedy.telkom.net.id","125.164.10.149","","1400697094");
INSERT INTO useronlinemonth VALUES("521","157.56.229.245","msnbot-157-56-229-245.search.msn.com","157.56.229.245","","1400665107");
INSERT INTO useronlinemonth VALUES("522","157.55.33.251","msnbot-157-55-33-251.search.msn.com","157.55.33.251","","1400663863");
INSERT INTO useronlinemonth VALUES("523","139.0.70.46","fm-dyn-139-0-70-46.fast.net.id","139.0.70.46","","1400680819");
INSERT INTO useronlinemonth VALUES("524","157.55.35.115","msnbot-157-55-35-115.search.msn.com","157.55.35.115","","1400850252");
INSERT INTO useronlinemonth VALUES("525","65.55.24.221","msnbot-65-55-24-221.search.msn.com","65.55.24.221","","1400669315");
INSERT INTO useronlinemonth VALUES("526","157.55.33.45","msnbot-157-55-33-45.search.msn.com","157.55.33.45","","1400666030");
INSERT INTO useronlinemonth VALUES("527","157.55.35.33","msnbot-157-55-35-33.search.msn.com","157.55.35.33","","1400666937");
INSERT INTO useronlinemonth VALUES("528","82.145.209.161","z48-02.opera-mini.net","68.171.252.76","","1400769336");
INSERT INTO useronlinemonth VALUES("529","157.55.33.100","msnbot-157-55-33-100.search.msn.com","157.55.33.100","","1400672233");
INSERT INTO useronlinemonth VALUES("530","157.55.32.62","msnbot-157-55-32-62.search.msn.com","157.55.32.62","","1400685745");
INSERT INTO useronlinemonth VALUES("531","157.55.35.113","msnbot-157-55-35-113.search.msn.com","157.55.35.113","","1400873754");
INSERT INTO useronlinemonth VALUES("532","65.55.24.243","msnbot-65-55-24-243.search.msn.com","65.55.24.243","","1400691807");
INSERT INTO useronlinemonth VALUES("533","157.55.33.41","msnbot-157-55-33-41.search.msn.com","157.55.33.41","","1400688160");
INSERT INTO useronlinemonth VALUES("534","180.76.6.58","180.76.6.58","180.76.6.58","","1400688861");
INSERT INTO useronlinemonth VALUES("535","180.76.5.144","baiduspider-180-76-5-144.crawl.baidu.com","180.76.5.144","","1400702877");
INSERT INTO useronlinemonth VALUES("536","54.82.57.72","ec2-54-82-57-72.compute-1.amazonaws.com","54.82.57.72","","1400708444");
INSERT INTO useronlinemonth VALUES("537","54.80.162.5","ec2-54-80-162-5.compute-1.amazonaws.com","54.80.162.5","","1400744244");
INSERT INTO useronlinemonth VALUES("538","36.74.194.245","36.74.194.245","36.74.194.245","","1400813804");
INSERT INTO useronlinemonth VALUES("539","180.76.6.230","180.76.6.230","180.76.6.230","","1400767263");
INSERT INTO useronlinemonth VALUES("540","202.67.44.71","202.67.44.71","202.67.44.71","","1400768457");
INSERT INTO useronlinemonth VALUES("541","54.80.200.163","ec2-54-80-200-163.compute-1.amazonaws.com","54.80.200.163","","1400768832");
INSERT INTO useronlinemonth VALUES("542","114.79.29.212","114.79.29.212","114.79.29.212","","1400771230");
INSERT INTO useronlinemonth VALUES("543","180.76.5.63","baiduspider-180-76-5-63.crawl.baidu.com","180.76.5.63","","1401377780");
INSERT INTO useronlinemonth VALUES("544","5.9.120.209","w3techs.com","5.9.120.209","","1400774418");
INSERT INTO useronlinemonth VALUES("545","202.67.40.197","202.67.40.197","202.67.40.197","","1400774452");
INSERT INTO useronlinemonth VALUES("546","180.76.5.78","baiduspider-180-76-5-78.crawl.baidu.com","180.76.5.78","","1401083515");
INSERT INTO useronlinemonth VALUES("547","157.56.92.146","msnbot-157-56-92-146.search.msn.com","157.56.92.146","","1400815415");
INSERT INTO useronlinemonth VALUES("548","157.55.36.46","msnbot-157-55-36-46.search.msn.com","157.55.36.46","","1400821091");
INSERT INTO useronlinemonth VALUES("549","157.55.32.97","msnbot-157-55-32-97.search.msn.com","157.55.32.97","","1400821091");
INSERT INTO useronlinemonth VALUES("550","180.76.5.20","baiduspider-180-76-5-20.crawl.baidu.com","180.76.5.20","","1400821853");
INSERT INTO useronlinemonth VALUES("551","65.55.52.96","msnbot-65-55-52-96.search.msn.com","65.55.52.96","","1400838540");
INSERT INTO useronlinemonth VALUES("552","157.55.33.83","msnbot-157-55-33-83.search.msn.com","157.55.33.83","","1400840634");
INSERT INTO useronlinemonth VALUES("553","157.56.93.38","msnbot-157-56-93-38.search.msn.com","157.56.93.38","","1401181345");
INSERT INTO useronlinemonth VALUES("554","89.74.176.178","89-74-176-178.dynamic.chello.pl","89.74.176.178","","1400844928");
INSERT INTO useronlinemonth VALUES("555","36.74.188.94","36.74.188.94","36.74.188.94","","1400858832");
INSERT INTO useronlinemonth VALUES("556","157.55.33.19","msnbot-157-55-33-19.search.msn.com","157.55.33.19","","1400863033");
INSERT INTO useronlinemonth VALUES("557","157.55.33.114","msnbot-157-55-33-114.search.msn.com","157.55.33.114","","1400867329");
INSERT INTO useronlinemonth VALUES("558","180.76.6.146","180.76.6.146","180.76.6.146","","1400864754");
INSERT INTO useronlinemonth VALUES("559","157.55.32.89","msnbot-157-55-32-89.search.msn.com","157.55.32.89","","1401166120");
INSERT INTO useronlinemonth VALUES("560","157.55.32.209","msnbot-157-55-32-209.search.msn.com","157.55.32.209","","1400869444");
INSERT INTO useronlinemonth VALUES("561","157.56.93.186","msnbot-157-56-93-186.search.msn.com","157.56.93.186","","1400871221");
INSERT INTO useronlinemonth VALUES("562","157.55.32.226","msnbot-157-55-32-226.search.msn.com","157.55.32.226","","1400872629");
INSERT INTO useronlinemonth VALUES("563","157.56.229.211","msnbot-157-56-229-211.search.msn.com","157.56.229.211","","1400876070");
INSERT INTO useronlinemonth VALUES("564","157.55.35.51","msnbot-157-55-35-51.search.msn.com","157.55.35.51","","1400878655");
INSERT INTO useronlinemonth VALUES("565","65.55.55.230","msnbot-65-55-55-230.search.msn.com","65.55.55.230","","1400878900");
INSERT INTO useronlinemonth VALUES("566","157.55.32.104","msnbot-157-55-32-104.search.msn.com","157.55.32.104","","1400893704");
INSERT INTO useronlinemonth VALUES("567","157.55.32.146","msnbot-157-55-32-146.search.msn.com","157.55.32.146","","1400884009");
INSERT INTO useronlinemonth VALUES("568","157.55.33.88","msnbot-157-55-33-88.search.msn.com","157.55.33.88","","1400883293");
INSERT INTO useronlinemonth VALUES("569","180.76.6.142","180.76.6.142","180.76.6.142","","1400887167");
INSERT INTO useronlinemonth VALUES("570","157.55.34.25","msnbot-157-55-34-25.search.msn.com","157.55.34.25","","1400892380");
INSERT INTO useronlinemonth VALUES("571","65.55.52.118","msnbot-65-55-52-118.search.msn.com","65.55.52.118","","1400888992");
INSERT INTO useronlinemonth VALUES("572","199.116.169.254","a199-116-169-254.deploy.static.akamaitechnologies.com","199.116.169.254","","1400889061");
INSERT INTO useronlinemonth VALUES("573","202.46.53.74","ptr.cnsat.com.cn","202.46.53.74","","1400889353");
INSERT INTO useronlinemonth VALUES("574","180.76.5.18","baiduspider-180-76-5-18.crawl.baidu.com","180.76.5.18","","1400889551");
INSERT INTO useronlinemonth VALUES("575","36.74.206.126","36.74.206.126","36.74.206.126","","1400943628");
INSERT INTO useronlinemonth VALUES("576","157.55.33.96","msnbot-157-55-33-96.search.msn.com","157.55.33.96","","1400898619");
INSERT INTO useronlinemonth VALUES("577","204.187.14.74","metrixca2.nmsrv.com","204.187.14.74","","1400930483");
INSERT INTO useronlinemonth VALUES("578","204.187.14.73","metrixca1.nmsrv.com","204.187.14.73","","1401430386");
INSERT INTO useronlinemonth VALUES("579","204.187.14.75","metrixca3.nmsrv.com","204.187.14.75","","1401430335");
INSERT INTO useronlinemonth VALUES("580","180.76.6.135","180.76.6.135","180.76.6.135","","1400966241");
INSERT INTO useronlinemonth VALUES("581","217.69.133.234","fetcher4-1.p.mail.ru","217.69.133.234","","1400974474");
INSERT INTO useronlinemonth VALUES("582","193.105.210.226","193.105.210.226","193.105.210.226","","1400982207");
INSERT INTO useronlinemonth VALUES("583","157.56.229.247","msnbot-157-56-229-247.search.msn.com","157.56.229.247","","1401011032");
INSERT INTO useronlinemonth VALUES("584","217.73.208.100","crawler-90.crawler.istella.it","217.73.208.100","","1401013109");
INSERT INTO useronlinemonth VALUES("585","200.160.6.137","crawler3.ceptro.br","200.160.6.137","","1401034444");
INSERT INTO useronlinemonth VALUES("586","180.76.5.168","baiduspider-180-76-5-168.crawl.baidu.com","180.76.5.168","","1401350852");
INSERT INTO useronlinemonth VALUES("587","180.76.6.233","180.76.6.233","180.76.6.233","","1401058821");
INSERT INTO useronlinemonth VALUES("588","125.164.15.233","233.subnet125-164-15.speedy.telkom.net.id","125.164.15.233","","1401077720");
INSERT INTO useronlinemonth VALUES("589","36.74.200.25","36.74.200.25","36.74.200.25","","1401072573");
INSERT INTO useronlinemonth VALUES("590","144.76.87.226","static.226.87.76.144.clients.your-server.de","144.76.87.226","","1401073576");
INSERT INTO useronlinemonth VALUES("591","180.247.137.90","180.247.137.90","180.247.137.90","","1401078357");
INSERT INTO useronlinemonth VALUES("592","141.0.9.171","s27-13.opera-mini.net","114.122.74.147","","1401079654");
INSERT INTO useronlinemonth VALUES("593","78.46.203.72","p.burtronix.com","78.46.203.72","","1401105871");
INSERT INTO useronlinemonth VALUES("594","64.246.178.34","64.246.178.34","64.246.178.34","","1401109600");
INSERT INTO useronlinemonth VALUES("595","125.164.38.62","62.subnet125-164-38.speedy.telkom.net.id","125.164.38.62","","1401114724");
INSERT INTO useronlinemonth VALUES("596","157.55.35.31","msnbot-157-55-35-31.search.msn.com","157.55.35.31","","1401149720");
INSERT INTO useronlinemonth VALUES("597","157.55.34.32","msnbot-157-55-34-32.search.msn.com","157.55.34.32","","1401167506");
INSERT INTO useronlinemonth VALUES("598","157.55.35.49","msnbot-157-55-35-49.search.msn.com","157.55.35.49","","1401181719");
INSERT INTO useronlinemonth VALUES("599","180.76.5.150","baiduspider-180-76-5-150.crawl.baidu.com","180.76.5.150","","1401185704");
INSERT INTO useronlinemonth VALUES("600","180.76.5.148","baiduspider-180-76-5-148.crawl.baidu.com","180.76.5.148","","1401185704");
INSERT INTO useronlinemonth VALUES("601","217.69.133.239","fetcher4-6.p.mail.ru","217.69.133.239","","1401191500");
INSERT INTO useronlinemonth VALUES("602","180.76.5.177","baiduspider-180-76-5-177.crawl.baidu.com","180.76.5.177","","1401206362");
INSERT INTO useronlinemonth VALUES("603","36.74.187.169","36.74.187.169","36.74.187.169","","1401209295");
INSERT INTO useronlinemonth VALUES("604","180.76.5.66","baiduspider-180-76-5-66.crawl.baidu.com","180.76.5.66","","1401315217");
INSERT INTO useronlinemonth VALUES("605","68.171.236.8","68.171.236.8","68.171.236.8","BISB_3.5.1.96","1401242838");
INSERT INTO useronlinemonth VALUES("606","68.171.236.97","bda-68-171-236-97.bise.eu.blackberry.com","68.171.236.97","","1401242843");
INSERT INTO useronlinemonth VALUES("607","125.164.56.211","211.subnet125-164-56.speedy.telkom.net.id","125.164.56.211","","1401273934");
INSERT INTO useronlinemonth VALUES("608","23.22.183.210","ec2-23-22-183-210.compute-1.amazonaws.com","23.22.183.210","","1401246464");
INSERT INTO useronlinemonth VALUES("609","54.227.86.53","ec2-54-227-86-53.compute-1.amazonaws.com","54.227.86.53","","1401249291");
INSERT INTO useronlinemonth VALUES("610","157.56.93.41","msnbot-157-56-93-41.search.msn.com","157.56.93.41","","1401251000");
INSERT INTO useronlinemonth VALUES("611","86.51.26.17","86.51.26.17","86.51.26.17","","1401357122");
INSERT INTO useronlinemonth VALUES("612","180.76.6.151","180.76.6.151","180.76.6.151","","1401295188");
INSERT INTO useronlinemonth VALUES("613","50.16.163.139","ec2-50-16-163-139.compute-1.amazonaws.com","50.16.163.139","","1401313250");
INSERT INTO useronlinemonth VALUES("614","209.190.1.131","83.1.be.static.xlhost.com","209.190.1.131","","1401322658");
INSERT INTO useronlinemonth VALUES("615","54.83.103.185","ec2-54-83-103-185.compute-1.amazonaws.com","54.83.103.185","","1401326771");
INSERT INTO useronlinemonth VALUES("616","180.246.65.179","180.246.65.179","180.246.65.179","","1401331295");
INSERT INTO useronlinemonth VALUES("617","89.28.21.131","89.28.21.131","89.28.21.131","","1401335702");
INSERT INTO useronlinemonth VALUES("618","36.74.215.52","36.74.215.52","36.74.215.52","","1401346552");
INSERT INTO useronlinemonth VALUES("619","95.79.66.14","dynamicip-95-79-66-14.pppoe.nn.ertelecom.ru","95.79.66.14","","1401338512");
INSERT INTO useronlinemonth VALUES("620","192.99.44.101","ns236647.ip-192-99-44.net","192.99.44.101","","1401340296");
INSERT INTO useronlinemonth VALUES("621","101.226.168.227","101.226.168.227","101.226.168.227","","1401350201");
INSERT INTO useronlinemonth VALUES("622","183.207.228.14","183.207.228.14","183.207.228.14","","1401357132");
INSERT INTO useronlinemonth VALUES("623","112.215.66.77","112.215.66.77","112.215.66.77","","1401369076");
INSERT INTO useronlinemonth VALUES("624","180.76.6.54","180.76.6.54","180.76.6.54","","1401376880");
INSERT INTO useronlinemonth VALUES("625","180.76.6.157","180.76.6.157","180.76.6.157","","1401382262");
INSERT INTO useronlinemonth VALUES("626","157.56.93.93","msnbot-157-56-93-93.search.msn.com","157.56.93.93","","1401385858");
INSERT INTO useronlinemonth VALUES("627","5.158.235.199","5.158.235.199","5.158.235.199","","1401403798");
INSERT INTO useronlinemonth VALUES("628","180.76.6.20","180.76.6.20","180.76.6.20","","1401413140");
INSERT INTO useronlinemonth VALUES("629","125.164.4.73","73.subnet125-164-4.speedy.telkom.net.id","125.164.4.73","","1401430331");
INSERT INTO useronlinemonth VALUES("630","217.69.133.236","fetcher4-3.p.mail.ru","217.69.133.236","","1401415140");
INSERT INTO useronlinemonth VALUES("631","180.76.5.72","baiduspider-180-76-5-72.crawl.baidu.com","180.76.5.72","","1401418207");



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
  `tipe` enum('aktif','pasif') NOT NULL DEFAULT 'aktif',
  `buddylist` varchar(250) NOT NULL DEFAULT '{"Admin":["administrator","admin","editor","webmaster"]}',
  `is_online` int(5) NOT NULL DEFAULT '0',
  `last_ping` text NOT NULL,
  `start` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `exp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1","admin","dc7b625b7b8ad55a1d9f3f9c53b71d6f","webmaster@teamworks.co.id","Administrator","Ismail Marzuki","6282166000063","Surabaya","Indonesia","f3a73baa803825cedeaaa13bc979462e.jpg","www.teamworks.co.id","cow_ngalam","aktif","{\"Admin\":[\"admin\",\"administrator\",\"webmaster\"]}","1","2014-05-30 17:29:11","2010-08-27 00:00:00","2034-08-27 00:00:00");
INSERT INTO users VALUES("2","kerangalam","b11d5ece6353d17f85c5ad30e0a02360","cow_ngalam@yahoo.co.id","User","Ismail Marzuki","082166000063","Jl. A. Satsui Tubun I/35","Malang","","www.kerangalam.web.id","cow_ngalam","aktif","{\"Admin\":[\"administrator\",\"admin\",\"editor\",\"webmaster\"]}","0","2014-05-21 23:59:17","0000-00-00 00:00:00","0000-00-00 00:00:00");



DROP TABLE widget;

CREATE TABLE `widget` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `widget` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `code` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO widget VALUES("1","None","");
INSERT INTO widget VALUES("2","Widget Small","<!-- AddThis Button BEGIN -->\n<div class=\"addthis_toolbox addthis_default_style \">\n<a class=\"addthis_button_facebook_like\" fb:like:layout=\"button_count\"></a>\n<a class=\"addthis_button_tweet\"></a>\n<a class=\"addthis_button_google_plusone\" g:plusone:size=\"medium\"></a>\n<a class=\"addthis_counter addthis_pill_style\"></a>\n</div>\n<script type=\"text/javascript\" src=\"http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-5040a95705e66519\"></script>\n<!-- AddThis Button END -->");
INSERT INTO widget VALUES("3","Widget Big","<!-- AddThis Button BEGIN -->\n<div class=\"addthis_toolbox addthis_default_style addthis_32x32_style\">\n<a class=\"addthis_button_preferred_1\"></a>\n<a class=\"addthis_button_preferred_2\"></a>\n<a class=\"addthis_button_preferred_3\"></a>\n<a class=\"addthis_button_preferred_4\"></a>\n<a class=\"addthis_button_compact\"></a>\n<a class=\"addthis_counter addthis_bubble_style\"></a>\n</div>\n<script type=\"text/javascript\" src=\"http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ff9a0c35284f445\"></script>\n<!-- AddThis Button END -->");



DROP TABLE widget_uc;

CREATE TABLE `widget_uc` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `widget` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `code` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO widget_uc VALUES("1","none","");
INSERT INTO widget_uc VALUES("2","uc small","<table><tr><td align=\"center\">\n<img src=\"images/ucsmall.jpg\" alt=\"Bookmark and Share\" style=\"border: 0pt none;\">\n</td></tr></table>");
INSERT INTO widget_uc VALUES("3","uc big","<table><tr><td align=\"center\">\n<img src=\"images/ucbig.jpg\" alt=\"Bookmark and Share\" style=\"border: 0pt none;\">\n</td></tr></table>");



