
<!DOCTYPE html>
<html>
<title>Hasil Query TF</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="stemming.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>Stemming</p>
  </a>
  <a href="upload.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>PDF Upload</p>
  </a>
  <a href="hasil_tokenisasi.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>Hasil Tokenisasi</p>
  </a>
  <a href="hitungbobotvektor.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>Hitung Bobot & Vektor</p>
  </a>
  <a href="query.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>Query</p>
  </a>
  <a href="download.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>Cari Documents</p>
  </a>
  <a href="makalah.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>Makalah</p>
  </a>
  
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="index.php" class="w3-bar-item w3-button" style="width:25% !important">Home</a>
    <a href="stemming.php" class="w3-bar-item w3-button" style="width:25% !important">Stemming</a>
    <a href="upload.php" class="w3-bar-item w3-button" style="width:25% !important">PDF Upload</a>
    <a href="hasil_tokenisasi.php" class="w3-bar-item w3-button" style="width:25% !important">Hasil Tokenisasi</a>
    <a href="hitungbobotvektor.php" class="w3-bar-item w3-button" style="width:25% !important">Hitung Bobot dan Vektor</a>
    <a href="query.php" class="w3-bar-item w3-button" style="width:25% !important">Query</a>
    <a href="download.php" class="w3-bar-item w3-button" style="width:25% !important">Cari Dokuments</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Tugas</span> STBI </h1>
    <p>Sistem Temu Kembali Informasi</p>
    <!--<img src="/w3images/man_smoke.jpg" alt="boy" class="w3-image" width="992" height="1108">-->
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Hasil Query TF</h2>
    <hr style="width:235px" class="w3-opacity">
    
  

<?php
////
function hitungsim($query) {
	//ambil jumlah total dokumen yang telah diindex (tbindex atau tbvektor), n
$host='localhost';
$user='root';
$pass='';
$database='dbstbi';

//echo "hitung sim";

$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database);

	$resn = mysql_query("SELECT Count(*) as n FROM tbvektor");
	$rown = mysql_fetch_array($resn);	
	$n = $rown['n'];
	//echo "hasil tbvektor";
	
	print_r($resn);
	
	//terapkan preprocessing terhadap $query
	$aquery = explode(" ", $query);
	
	//hitung panjang vektor query
	$panjangQuery = 0;
	$aBobotQuery = array();
	
	for ($i=0; $i<count($aquery); $i++) {
		//hitung bobot untuk term ke-i pada query, log(n/N);
		//hitung jumlah dokumen yang mengandung term tersebut
		$resNTerm = mysql_query("SELECT Count(*) as N from tbindex WHERE Term like '%$aquery[$i]%'");
//		echo "query >SELECT Count(*) as N from tbindex WHERE Term like '%$aquery[$i]%'";
		$rowNTerm = mysql_fetch_array($resNTerm);	
		$NTerm = $rowNTerm['N'] ;
		
		$idf = log($n/$NTerm);
		
		//simpan di array		
		$aBobotQuery[] = $idf;
		
		$panjangQuery = $panjangQuery + $idf * $idf;		
	}
	
	$panjangQuery = sqrt($panjangQuery);
	
	$jumlahmirip = 0;
	
	//ambil setiap term dari DocId, bandingkan dengan Query
	$resDocId = mysql_query("SELECT * FROM tbvektor ORDER BY DocId");
	while ($rowDocId = mysql_fetch_array($resDocId)) {
	
		$dotproduct = 0;
			
		$docId = $rowDocId['DocId'];
		$panjangDocId = $rowDocId['Panjang'];
		
		$resTerm = mysql_query("SELECT * FROM tbindex WHERE DocId = '$docId'");
	//	echo "query ->SELECT * FROM tbindex WHERE DocId = '$docId'".'<br>';
		
		
		while ($rowTerm = mysql_fetch_array($resTerm)) {
			for ($i=0; $i<count($aquery); $i++) {
				//jika term sama
				//echo "1-->".$rowTerm['Term'];
			//	echo "2-->".	$aquery[$i].'<br>';
				
				if ($rowTerm['Term'] == $aquery[$i]) {
					$dotproduct = $dotproduct + $rowTerm['Bobot'] * $aBobotQuery[$i];		
		//			echo "hasil =".$dotproduct.'<br>';
			//		echo "1-->".$rowTerm['Term'];
			//	echo "2-->".	$aquery[$i].'<br>';
					
				} //end if
					else
					{
					}
			} //end for $i		
		} //end while ($rowTerm)
		
		if ($dotproduct != 0) {
			$sim = $dotproduct / ($panjangQuery * $panjangDocId);	
			//echo "insert >>INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', '$docId', $sim)";
			//simpan kemiripan > 0  ke dalam tbcache
			$resInsertCache = mysql_query("INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', '$docId', $sim)");
			$jumlahmirip++;
		} 
			
	if ($jumlahmirip == 0) {
		$resInsertCache = mysql_query("INSERT INTO tbcache (Query, DocId, Value) VALUES ('$query', 0, 0)");
	}	
	} //end while $rowDocId
	
		
} //end hitungSim()





////
$host='localhost';
$user='root';
$pass='';
$database='dbstbi';
$keyword=$_POST['keyword'];;
$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database);
$resCache = mysql_query("SELECT *  FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC");
	$num_rows = mysql_num_rows($resCache);
	if ($num_rows >0) {

		//tampilkan semua berita yang telah terurut
		while ($rowCache = mysql_fetch_array($resCache)) {
			$docId = $rowCache['DocId'];
			$sim = $rowCache['Value'];
					
				//ambil berita dari tabel tbberita, tampilkan
				//echo ">>>SELECT nama_file,deskripsi FROM upload WHERE nama_file = '$docId'";
				$resBerita = mysql_query("SELECT nama_file,deskripsi FROM upload WHERE nama_file = '$docId'");
				$rowBerita = mysql_fetch_array($resBerita);
					
				$judul = $rowBerita['nama_file'];
				$berita = $rowBerita['deskripsi'];
					
				print($docId . ". (" . $sim . ") <font color=blue><b><a href=" . $judul . "> </b></font><br />");
				print($berita . "<hr /></a>"); 		
			
		}//end while (rowCache = mysql_fetch_array($resCache))
	}
		else
		{
		hitungsim($keyword);
		//pasti telah ada dalam tbcache		
		$resCache = mysql_query("SELECT *  FROM tbcache WHERE Query = '$keyword' ORDER BY Value DESC");
		$num_rows = mysql_num_rows($resCache);
		
		while ($rowCache = mysql_fetch_array($resCache)) {
			$docId = $rowCache['DocId'];
			$sim = $rowCache['Value'];
					
				//ambil berita dari tabel tbberita, tampilkan
				$resBerita = mysql_query("SELECT nama_file,deskripsi FROM upload WHERE nama_file = '$docId'");
				$rowBerita = mysql_fetch_array($resBerita);
					
				$judul = $rowBerita['nama_file'];
				$berita = $rowBerita['deskripsi'];
					
				print($docId . ". (" . $sim . ") <font color=blue><b><a href=" . $judul . "> </b></font><br />");
				print($berita . "<hr /></a>");
		
		} //end while
		}

?>
<br>
<form action="query.php">
<input type=submit Value="Back">
</form>


  


<!-- END PAGE CONTENT -->
</div>

</body>
</html>
