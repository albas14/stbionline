<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistem Temu Kembali Informasi</title>
</head>

<body>

<h3><a href="index.php" title="WELCOME"><img src="gambar/home.png" width="50" height="50" alt=""/></a></h3>
<br><br>
<center>
<p>        <img src="gambar/artikel.jpg" width="970" height="129" alt=""/>    </p>
<p>Sistem  temu kembali informasi berasal dari kata Information <em>Retrieval System</em> (IRS). Temu kembali informasi adalah sebuah media  layanan bagi pengguna untuk memperoleh informasi atau sumber informasi yang  dibutuhkan oleh pengguna. Sistem temu kembali informasi merupakan sistem  informasi yang berfungsi untuk menemukan informasi yang relevan dengan  kebutuhan pemakai. Sistem temu kembali informasi berfungsi sebagai perantara  kebutuhan informasi pengguna dengan sumber informasi yang tersedia. Pengertian  yang sama mengenai sistem temu kembali informasi menurut Sulistyo-Basuki sistem  temu kembali informasi adalah kegiatan yang bertujuan untuk menyediakan dan  memasok informasi bagi pemakai sebagai jawaban atas permintaan atau berdasarkan  kebutuhan pemakai. Dapat dinyatakan bahwa sistem temu kembali informasi  memiliki fungsi dalam menyediakan kebutuhan informasi sesuai dengan kebutuhan  dan permintaan penggunanya.</p>
<p>	            Definisi lain yang mengemukakan  bahwa: &ldquo;Sistem temu kembali informasi adalah suatu proses yang dilakukan untuk  menemukan dokumen yang dapat memberikan kepuasan bagi pengguna dalam memenuhi  kebutuhan informasinya&rsquo;. Tujuan utama sistem temu kembali informasi adalah  untuk menemukan dokumen yang sesuai dengan kebutuhan informasi pengguna secara  efektif dan efisien, sehingga dapat memberikan kepuasan baginya, dan sasaran  akhir dari sistem temu kembali informasi adalah kepuasan pemakai.</p>
<p>            Maka dapat disimpulkan bahwa sistem temu  kembali informasi merupakan sebuah sistem yang berguna dalam memanggil dan  menempatkan dokumen dari/dalam basis data sesuai dengan permintaan pengguna.  Sistem temu kembali informasi memiliki tujuan akhir, yaitu memberikan kepuasan  informasi bagi pengguna sistem. Jadi, temu kembali informasi merujuk pada  keseluruhan kegiatan yang meliputi pembuatan wakil informasi (representation),  penyimpanan (storage), pengaturan (organization) sampai kepada pengambilan  (access).</p>
<p>            Konsep dasar dalam Information  Retrieval System terdiri dari Indexing, Searching dan perengkingan relevansi  keyword query. Dimana proses indexing dilakukan untuk membentuk database index  terhadap koleksi dokumen yang dimasukkan, atau dengan kata lain, indexing  merupakan proses persiapan yang dilakukan terhadap dokumen sehingga dokumen  siap untuk retrive. Proses indexing sendiri meliputi 2 proses, yaitu  dokukmen&nbsp; indexing dan term indexing. Dari term indexing akan dihasilkan  koleksi kata yang akan digunakan untuk meningkatkan performansi pencarian pada  tahap selanjutnya.       <br>
Tahap-tahap dalam proses indexing  ialah:</p>
<p>1. Word Token / Parsing<br>
  2. Stopword Removal / filtering<br>
  3. Stemming<br>
4. TF/IDF ( Term Frequency – Inversed  Document Frequency )</p>
<p>=============================================================================</p>
<p>WORD&nbsp; TOKEN / PARSING<br>
  Tahap tokenizing disebut juga  sebagai parsing Yaitu pengambilan kata-kata (term) dari kumpulan dokumen  menjadi kumpulan term dengan cara menghapus karakter tanda baca yang terdapat  pada dokumen dan mengubah kumpulan term menjadi lowercas.</p>
<p>STOPWORD REMOVAL / FILTERING<br>
Tahap Stopword Removal atau  Filtering adalah Proses penghapusan atau pembuangan kata-kata yang sering  ditampilkan dalam dokumen seperti: and, or, not, tetapi, yang, sedangkan dan  sebagainya.</p>
<p>STEMMING<br>
Proses stemming adalah proses  pembuangan prefix dan sufix suatu kata bentukan menjadi kata dasar. Proses  stemming dilakukan untuk mendapatkan&nbsp; hasil peringkat halaman informasi  yang relevan. Proses stemming dilakukan dengan cara menghilangkan semua imbuhan  (<em>affixes</em>)  baik yang terdiri dari awalan <em>(prefixes</em>), sisipan <em>(infixes)</em>, akhiran <em>(suffixes) </em>dan <em>confixes </em>(kombinasi dari awalan dan akhiran) pada kata  turunan. <em>Stemming </em>digunakan untuk mengganti bentuk dari suatu kata menjadi kata dasar  dari kata tersebut yang sesuai dengan struktur morfologi bahasa Indonesia yang  benar (Tala, 2003). Arsitektur proses <em>stemming </em>untuk bahasa Indonesia dapat dilihat pada  Gambar dibawah.</p>
<p>TF/IDF ( Term Frequency – Inversed  Document Frequency )<br>
Metode TF/IDF adalah merupakan  suatu metode pembobotan dalam bentuk sebuah metode yang merupakan integrasi  antar term frequency dan inverse document frequency</p>
<p><center><img src="gambar/1.png" width="474" height="355" alt=""/></center><br>
  <br>
</p>
<p>Ada tiga jenis metode stemming, antara lain :</p>
<p>1. <strong>Successor Variety (SV)</strong> : lebih mengutamakan penyusunan huruf dalam  kata dibandingkan dengan pertimbangan atas fonem. Contoh untuk kata-kata :  corpus, able, axle, accident, ape, about menghasilkan SV untuk kata apple :  Karena huruf pertama dari kata &ldquo;apple&rdquo; adalah &ldquo;a&rdquo;, maka kumpulan kata yang ada  substring &ldquo;a&rdquo; diikuti &ldquo;b&rdquo;, &ldquo;x&rdquo;, &ldquo;c&rdquo;, &ldquo;p&rdquo; disebut SV dari &ldquo;a&rdquo; sehingga &ldquo;a&rdquo;  memiliki 4 SV. 2. Karena dua huruf pertama dari kata &ldquo;apple&rdquo; adalah &ldquo;ap&rdquo;, maka  kumpulan kata yang ada substring &ldquo;ap&rdquo; hanya diikuti &ldquo;e&rdquo; disebut SV dari &ldquo;ap&rdquo;  sehingga &ldquo;ap&rdquo; memiliki 1 SV.</p>
<p>2. <strong>N-Gram Conflation</strong> : ide dasarnya adalah pengelompokan kata-kata  secara bersama berdasarkan karakter-karakter (substring) yang teridentifikasi  sepanjang N karakter.</p>
<p>3. <strong>Affix Removal</strong> : membuang suffix dan prefix dari term  menjadi suatu stem. Yang paling sering digunakan adalah algoritma Porter  Stemmer karena modelnya sederhana dan effisien. Jika suatu kata diakhiri dengan  &ldquo;ies&rdquo; tetapi bukan &ldquo;eies&rdquo; atau &ldquo;aies&rdquo;, maka &ldquo;ies&rdquo; direplace dengan &ldquo;y&rdquo; 2. Jika  suatu kata diakhiri dengan &ldquo;es&rdquo; tetapi bukan &ldquo;aes&rdquo; atau &ldquo;ees&rdquo; atau &ldquo;oes&rdquo;, maka  &ldquo;es&rdquo; direplace dengan &ldquo;e&rdquo; 3. Jika suatu kata diakhiri dengan &ldquo;s&rdquo; tetapi bukan  &ldquo;us&rdquo; atau &ldquo;ss&rdquo;, maka &ldquo;s&rdquo; direplace dengan &ldquo;NULL&rdquo;.</p>
<p><center>
  <p><img src="gambar/2.png" width="626" height="334" alt=""/></p>
  <p>=============================================================================</p>
</center>
</p>
<p>Referensi  :<br>
  <a href="http://informationretrievalsystem.blogspot.co.id/2012/08/definisi-information-retrieval.html">http://informationretrievalsystem.blogspot.co.id/2012/08/definisi-information-retrieval.html</a><br>
  <a href="http://informationretrievalsystem.blogspot.co.id/2012/08/tujuan-indexing.html">http://informationretrievalsystem.blogspot.co.id/2012/08/tujuan-indexing.html</a><br>
<a href="http://informationretrievalsystem.blogspot.co.id/2013/02/cara-kerja-informasi-retrieval.html">http://informationretrievalsystem.blogspot.co.id/2013/02/cara-kerja-informasi-retrieval.html</a></p>
</center>
</body>
</html>