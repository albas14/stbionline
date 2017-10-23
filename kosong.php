<?php

$konek = mysqli_connect("localhost","id3231518_root","123456","id3231518_stbi");
  
$query = "DELETE FROM `dokumen`  WHERE 1";
$query2 = "DELETE FROM `upload`  WHERE 1";
$query3 = "DELETE FROM `tbindex`  WHERE 1";
$query4 = "DELETE FROM `tbvektor`  WHERE 1";
$query5 = "DELETE FROM `tbcache`  WHERE 1";

mysqli_query ($konek, $query);

mysqli_query ($konek, $query2);
mysqli_query ($konek, $query3);
mysqli_query ($konek, $query4);
mysqli_query ($konek, $query5);


//echo "Data telah dihapus.";

$files = glob('./files/*');
foreach($files as $file){ 
  if(is_file($file))
    unlink($file); 

//echo '<br>';
//echo "File telah dihapus.";
}
?>
<br>
<a> "DATA DAN FILE TELAH DIHAPUS" Kembali ke tabel ? </a> <a href="hasil_tokenisasi.php"> YA </a>