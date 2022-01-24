<?php

require '../../config/conn.php';

$query = 'SELECT * FROM tb_blog';
$urlCrud = "index.php?page=crud/";

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
    <div class="col-lg-12">
      <a href="./create.php" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
      <table class="table table-hover table-bordered" style="margin-top: 10px;">
        <tr class="success">
          <th width="50px">No</th>
          <th>Id Kategori</th>
          <th>Tanggal</th>
          <th>Judul</th>
          <th>Isi</th>
          <th>Status</th>
          <th style="text-align: center;">Actions</th>
        </tr>
        <?php 
          if($data = mysqli_query($conn, $query)) {
            $a = 1;
            while($obj = mysqli_fetch_object($data)) {
        ?>
          <tr>
            <td><?= $a; ?></td>
            <td><?= $obj->id_kategori; ?></td>
            <td><?= $obj->tanggal; ?></td>
            <td><?= $obj->judul; ?></td>
            <td><?= $obj->isi; ?></td>
            <td><?= $obj->status; ?></td>
            <td style="text-align: center;">
              <a href="<?= "hapus.php?id=".$obj->id; ?>" onclick="return confirm('Apakah yakin data akan di hapus?')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
              <a href="<?= "edit.php?id=".$obj->id; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
          </tr>
        <?php
          $a++;
            }
          }
        ?>
      </table>
    </div>
  </div>

</body>
</html>