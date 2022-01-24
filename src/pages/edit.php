<?php

require '../../config/conn.php';

$url = $_GET['id'];

if($_POST) {
  $sql = "UPDATE tb_blog SET id_kategori='".$_POST['id_kategori']."', tanggal='".$_POST['tanggal']."', judul='".$_POST['judul']."', isi='".$_POST['isi']."', status='".$_POST['status']."' WHERE id='".$_POST['id']."' ";

  if($conn->query($sql) === true) {
    echo "
      <script>
        alert('Data berhasil di update');
        window.location.href='index.php?page=crud/index';
      </script>
    ";
  }else {
    echo "Gagal: ">$conn->error;
  }

  $conn->close();

}else {
  $query = $conn->query("SELECT * FROM tb_blog WHERE id=$url");
  if($query->num_rows > 0) {
    $data = mysqli_fetch_object($query);
  }else {
    echo "data tidak tersedia";
    die();
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
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $data->id?>">
      <div class="form-group">
          <label>Kategori</label>
          <input type="text" name="id_kategori" class="form-control" value="<?= $data->id_kategori ?>">
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="text" name="tanggal" class="form-control" value="<?= $data->tanggal ?>">
        </div>
        <div class="form-group">
          <label>Judul</label>
          <input type="text" name="judul" class="form-control" value="<?= $data->judul ?>">
        </div>
        <div class="form-group">
          <label>Isi</label>
          <input type="text" name="isi" class="form-control" value="<?= $data->isi ?>">
        </div>
        <div class="form-group">
          <label>Status</label>
          <input type="text" name="status" class="form-control" value="<?= $data->status ?>">
        </div>
        <input type="submit" class="btn btn-primary btn-sm" name="Update" value="Update">
    </form>
  </div>

</body>
</html>

<?php
}
mysqli_close($conn);
?>