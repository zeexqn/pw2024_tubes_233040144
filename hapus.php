<?php

include 'koneksi.php';

if (isset($_GET['hapus'])) {
    $id_berita = $_GET['hapus'];
$id	= $_GET['hapus'];

    $queryShow = "SELECT * FROM berita WHERE id_berita='$id'";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/". $result['foto']);
    

	$hapus	= "DELETE FROM berita WHERE id_berita='$id'";

		if (mysqli_query ($conn, $hapus)) {
			echo "<script language=\"javascript\">
				 alert (\"Data berhasil dihapus\")
				 document.location=\"index.php\";
				 </script>";

		}else{
			echo "<script language=\"javascript\">
		         alert (\"Gagal hapus data\")
		         document.location=\"index.php\";
		        </script>";
	  }

    header("Location: admin.php");
    exit();
}
?>

		   
?>
