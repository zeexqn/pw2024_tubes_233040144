<?php
include 'koneksi.php';
include 'fungsi.php';

if(isset($_POST['aksi'])){
    if($_POST['aksi']== "add"){
        
        $berhasil = tambah_data($_POST,$_FILES);

        if($berhasil){
            header("location: index.php"); 
        }else{
            echo $berhasi;;
        }

    } else if($_POST['aksi']== "edit"){
        
    $berhasil = edit_data($_POST,$_FILES);
        if($berhasil){
        header("location: index.php");
        }else{
            echo $berhasil;
        }
    }

    
}
?>