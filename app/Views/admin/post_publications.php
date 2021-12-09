<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Codeigniter Login with Email/Password Example</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">
                
                <h2>Tambah Publikasi</h2>

                <form action="<?php echo base_url(); ?>/post-publications" method="post" enctype="multipart/form-data">
                <?php csrf_field() ?>    
                <div class="form-group mb-3">
                    <label for="title">Judul Publikasi :</label>
                        <input type="text" name="title" id="title" placeholder="Judul publikasi" class="form-control <?= ($validation->hasError('title'))? 'is-invalid' : ''; ?>" value="<?= old('title'); ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                    <label for="author">Penulis Publikasi :</label>
                        <input type="text" name="author" id="author" placeholder="Penulis publikasi" class="form-control <?= ($validation->hasError('author'))? 'is-invalid' : ''; ?>" value="<?= old('author'); ?>" required >
                        <div class="invalid-feedback">
                            <?= $validation->getError('author'); ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                    <label for="year">Tahun Publikasi :</label>
                        <input type="text" name="year" id="year" placeholder="Tahun terbit publikasi" class="form-control <?= ($validation->hasError('year'))? 'is-invalid' : ''; ?>" value="<?= old('year'); ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('year'); ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                    <label for="abstract">Abstrak Publikasi (Opsional) :</label>
                        <input type="text" name="abstract" placeholder="Abstrak opsional" class="form-control" value="<?= old('abstract'); ?>" >
                    </div>
                    
                    <div class="form-group mb-3">
                    <label for="subject">Subjek Publikasi :</label>
                    <?php foreach($subjects as $sub) :?>
                    <div class="checkbox">
                        <label><input type="checkbox" value="<?= $sub['id']?>" name="subject_id[]"><?= $sub['subject_name']?></label>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="sel1">Tipe Publikasi :</label>
                        <select class="form-control" id="sel1" name="type" required>
                            <option value="Laporan KP/Magang">Laporan KP/Magang</option>
                            <option value="Skripsi/TA">Skripsi/TA</option>
                            <option value="Tesis/Disertasi">Tesis/Disertasi</option>
                            <option value="Jurnal/Buku">Jurnal/Buku</option>
                            <option value="Lapora Pasca Pelatihan">Laporan Pasca Pelatihan</option>
                        </select>
                        
                    </div>
                    <div class="form-group mb-3">
                        <input type="file" accept="application/pdf" name="file" placeholder="File publikasi" class="form-control <?= ($validation->hasError('file'))? 'is-invalid' : ''; ?>" required >
                        <div class="invalid-feedback">
                            <?= $validation->getError('file'); ?>
                        </div>
                    </div>
                    
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Tambah</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>
  </body>
</html>