<!DOCTYPE html>

<?php

  include 'koneksi.php';
  include 'source.php';
  $judul = "";
  $penulis = "";
  $kategori ="";
  $artikel = "";
  $tanggal = "";

  if(isset($_GET['edit'])){
    $id_berita = $_GET['edit'];

    $query = "SELECT * FROM berita WHERE id_berita = '$id_berita'";
    $sql = mysqli_query($conn, $query);
    
    $result = mysqli_fetch_assoc($sql);

    $judul = $result["judul"];
    $penulis = $result["penulis"];
    $kategori = $result["kategori"];
    $artikel = $result["artikel"];
    $tanggal = $result["tanggal"];

    // var_dump($result);
    // die();
  }

?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita</title>
  </head>
  <body>

    <div class="container mt-5">
    <?php 
            if(isset($_GET['edit'])){
              ?>
            <h1 class="pb-4 mb-4 fst-italic border-bottom">Edit Data</h1>
            <?php
            } else{
            ?>
            <h1 class="pb-4 mb-4 fst-italic border-bottom">Tambah Data</h1>
            <?php
            }
            ?>
      <form method="POST" action="proses.php" enctype="multipart/form-data">
      <div class="mb-3 row">
        <input type="text" class="d-none" value="<?php echo $id_berita; ?>" name="id_berita">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
          <input
          <?php if(!isset($_GET['edit'])){echo "required";} ?>
            type="text"
            class="form-control"
            id="judul"
            name="judul"
            placeholder="Masukan Judul Berita ..."
            value="<?php echo $judul; ?>"
          />
        </div>
      </div>
      <div class="mb-3 row">
        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
        <div class="col-sm-10">
          <input
            required
            type="text"
            class="form-control"
            id="penulis"
            name="penulis"
            placeholder="Masukan Nama Penulis ..."
            value="<?php echo $penulis; ?>"
          />
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
          <select
            required
            type="text"
            class="form-select"
            id="kategori"
            name="kategori"
            placeholder="Masukan Nama kategori ..."
            value="<?php echo $kategori; ?>"
            >
            <option value="Mobil">Mobil</option>
            <option value="Motor">Motor</option>
            <option value="Balap">Balap</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="artikel" class="col-sm-2 col-form-label"> Artikel</label>
        <div class="col-sm-10">
          
          <textarea
            
            required
            class="form-control"
            id="artikel"
            name="artikel"
            rows="3"
            placeholder="Masukan Artikel ..."
            
          ><?php echo $artikel; ?></textarea>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="tanggal" name="tanggal"  value="<?php echo htmlspecialchars("$tanggal"); ?>" />
        </div>
      </div>
      <div class="mb-3 row">
    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10 mb-4">
        <input class="form-control" type="file" id="foto" accept="image/*" name="foto" placeholder="Masukan Foto ..." onchange="previewImage(event)">
    </div>
    <div class="col-sm-10 offset-sm-2">
        <img id="preview-image" src="#" alt="Preview Gambar" style="max-width: 300px; display: none;">
    </div>
</div>

        <div class="mt-5 ms-5 mb-5 row">
          <div class="col-sm-10">
            <?php 
            if(isset($_GET['edit'])){
              ?>
            <button type="submit" name="aksi" value="edit" class="btn btn-warning">
              <i class="fa-solid fa-pencil"></i>
              Edit
            </button>
            <?php
            } else{
            ?>
            <button type="submit" name="aksi" value="add" class="btn btn-primary">
              <i class="fa-solid fa-floppy-disk" style="color: #ffffff"></i>
              Tambah Data
            </button>
            <?php
            }
            ?>
            <a href="admin.php" type="button" class="btn btn-danger">
              <i class="fa-solid fa-backward" style="color: #ffffff"></i>
              Kembali
            </a>
          </div>
        </div>
      </div>
      </form>
    </div>

    <footer class="blog-footer">
        <p> Website ini dibuat oleh <a href="https://www.instagram.com/z_qn11?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">@Zeina</a>.</p>
        <p><a href="#">Kembali ke atas</a></p>
    </footer>

    <script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview-image');
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
  </body>
</html>
