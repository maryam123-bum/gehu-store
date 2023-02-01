<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-10">
                <h1>Data Karyawan</h1>
            </div>
            <div class="col-2">
                <button class="btn btn-success">
                    Tambah Karyawan
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                      <tr class="bg-dark text-white text-center">
                        <th scope="col">No</th>
                        <th scope="col">ID KARYAWAN</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">JENIS KELAMIN</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">OPSI</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                    <?php foreach ($data as $key) { ?>
                        <tr>
                            <th scope="row" class="text-center"><?php echo $no++ ?></th>
                            <td><?php echo $key['nim']; ?></td>
                            <td><?php echo $key['nama']; ?></td>
                            <td><?php echo $key['jekel']; ?></td>
                            <td><?php echo $key['alamat']; ?></td>
                            <td class="text-center">
                                <button class="btn btn-primary">UBAH</button>
                                <button class="btn btn-danger">HAPUS</button>
                            </td>
                          </tr>
                    <?php
                    } ?>
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>