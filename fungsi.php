<?php 
    include 'koneksi.php';

    
    function tambah_data($data, $files){

        $judul = $data["judul"];
        $penulis = $data["penulis"];
        $artikel = $data["artikel"];
        $kategori = $data["kategori"];
        $tanggal = $data["tanggal"];
        $foto = $files['foto']['name'];

        $dir = "img/";
        $tmpFile = $_FILES["foto"]["tmp_name"];

        move_uploaded_file($tmpFile, $dir.$foto);

        $query = "INSERT INTO berita VALUES (null, '$judul', '$penulis', '$kategori', '$artikel', '$tanggal', '$foto')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        if ($sql) {
            header("Location: admin.php"); // Mengarahkan ke halaman admin.php setelah operasi berhasil
            exit();
        } else {
            echo "Gagal menambahkan data."; // Pesan kesalahan jika operasi gagal
        }
    }

    function edit_data($data, $files){
        $id_berita = $data["id_berita"];
        $judul = $data["judul"];
        $penulis = $data["penulis"];
        $kategori = $data["kategori"];
        $artikel = $data["artikel"];
        $tanggal = $data["tanggal"];

    $queryShow = "SELECT * FROM berita WHERE id_berita='$id_berita'";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if($_FILES["foto"]['name']==""){
        $foto = $result["foto"];
    }else{
        $foto = $files["foto"]['name'];
        unlink("img/".$result['foto']);
        move_uploaded_file($files["foto"]['tmp_name'], 'img/'.$files["foto"]['name']);
    }

        $query = "UPDATE berita SET judul='$judul', penulis='$penulis',kategori='$kategori', artikel='$artikel', tanggal='$tanggal', foto='$foto' WHERE id_berita='$id_berita';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        if ($sql) {
            header("Location: admin.php"); // Mengarahkan ke halaman admin.php setelah operasi berhasil
            exit();
        } else {
            echo "Gagal menambahkan data."; // Pesan kesalahan jika operasi gagal
        }
    }

?>