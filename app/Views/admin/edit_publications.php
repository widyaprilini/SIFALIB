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
                
                <h2>Edit Publikasi</h2>
                <form action="/edit-publications" method="post" enctype="multipart/form-data">
                <?php csrf_field() ?>    
                <div class="form-group mb-3">
                    <label for="title">Judul Publikasi :</label>
                        <input type="text" name="title" id="title" placeholder="Judul publikasi" class="form-control <?= ($validation->hasError('title'))? 'is-invalid' : ''; ?>" value="<?= $publications['title'] ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                    <label for="author">Penulis Publikasi :</label>
                        <input type="text" name="author" id="author" placeholder="Penulis publikasi" class="form-control <?= ($validation->hasError('author'))? 'is-invalid' : ''; ?>" value="<?= $publications['author'] ?>" required >
                        <div class="invalid-feedback">
                            <?= $validation->getError('author'); ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                    <label for="year">Tahun Publikasi :</label>
                        <input type="text" name="year" id="year" placeholder="Tahun terbit publikasi" class="form-control <?= ($validation->hasError('year'))? 'is-invalid' : ''; ?>" value="<?= $publications['year'] ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('year'); ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                    <label for="abstract">Abstrak Publikasi (Opsional) :</label>
                        <input type="text" name="abstract" placeholder="Abstrak opsional" class="form-control" value="<?= $publications['abstract'] ?>" >
                    </div>
                    
                    <div class="form-group mb-3">
                    <label for="subject">Subjek Publikasi :</label>
                    <?php foreach($subjects as $sub) :?>
                    <div class="checkbox">
                    <label>
                        <input type="checkbox" value="<?= $sub['id']?>" name="subject_id[]" 
                            <?php foreach($sub_checked as $checked): 
                                if($sub['id'] === $checked['subject_id']){echo 'checked';}
                            endforeach;?>>
                    <?= $sub['subject_name']?>
                    </label>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="sel1">Tipe Publikasi :</label>
                        <select class="form-control" id="sel1" name="type" required>
                            <option value="Laporan KP/Magang" <?php ($publications['type'] === 'Laporan KP/Magang') ? 'Selected' : ''?>>Laporan KP/Magang</option>
                            <option value="Skripsi/TA" <?php ($publications['type'] === 'Skripsi/TA') ? 'Selected' : ''?>>Skripsi/TA</option>
                            <option value="Tesis/Disertasi" <?php ($publications['type'] === 'Tesis/Disertasi') ? 'Selected' : ''?>>Tesis/Disertasi</option>
                            <option value="Jurnal/Buku" <?php ($publications['type'] === 'Jurnal/Buku') ? 'Selected' : ''?>>Jurnal/Buku</option>
                            <option value="Lapora Pasca Pelatihan" <?php ($publications['type'] === 'Laporan Pasca Pelatihan') ? 'Selected' : ''?>>Laporan Pasca Pelatihan</option>
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