<?php 

require '../../../config/conn.php';

if($_POST) {
  try {
    $sql = "INSERT INTO tb_blog(id_kategori, tanggal, judul, isi, status) VALUES ('".$_POST['id_kategori']."', '".$_POST['tanggal']."', '".$_POST['judul']."', '".$_POST['isi']."', '".$_POST['status']."')";
    
    if(!$conn->query($sql)) {
      echo $conn->error;
      die();
    }
  }catch(Exception $e) {
    echo $e;
    die();
  }

  echo "
    <script>
      alert('Data berhasil di simpan')
      window.location.href='index.php?page=crud/index';
    </script>
  ";
}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/styles.css">
  <title>Document</title>
</head>
<body>
  
  <div class="row">
    <div class="col-lg-6">
      <form action="" method="post">
        <div class="form-group">
          <label>Kategori</label>
          <input type="text" name="id_kategori" class="form-control">
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="text" name="tanggal" class="form-control">
        </div>
        <div class="form-group">
          <label>Judul</label>
          <input type="text" name="judul" class="form-control">
        </div>
        <div class="form-group">
          <label>Isi</label>
          <input type="text" name="isi" class="form-control">
        </div>
        <div class="form-group">
          <label>Status</label>
          <input type="text" name="status" class="form-control">
        </div>
        <input type="submit" value="Create" name="create" class="btn btn-primary btn-sm">
      </form>
    </div>
  </div>

</body>
</html>