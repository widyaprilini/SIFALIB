<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../img/logo.png">
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <!-- Javascript Bootstrap -->

    <!-- Google Icons and Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
    />
    <!-- Google Icons and Fonts -->

    <!-- Self-CSS -->
    <link rel="stylesheet" href="../css/admin/post-publications.css" />
    <!-- Self-CSS -->
    <title>SIFALB - ADMIN | Tambah Publikasi</title>
    
  </head>
  <body>
    <main>
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
        <div class="position-absolute" style="width: 300px">
          <div class="list-group list-group-flush">
            <div class="container mb-5">
              <div
                class="
                  button-admin
                  p-3
                  d-flex
                  align-items-center
                  justify-content-center
                "
              >
                <span class="material-icons-round"> manage_accounts </span>
                <h4>SIFALIB - ADMIN</h4>
              </div>
            </div>
            <div class="menu">
              <a
                href="/dashboard"
                class="list-group-item list-group-item-action py-2 ripple"
              >
                <span class="material-icons-round"> dashboard </span
                ><span>&nbsp;&nbsp;&nbsp;Beranda</span>
              </a>
              <a
                href="/post-publications"
                class="
                  list-group-item list-group-item-action
                  py-2
                  ripple
                  active
                "
              >
                <span class="material-icons-round"> note_add </span>
                <span>&nbsp;&nbsp;&nbsp;Tambah Publikasi</span>
              </a>
              <a
                href="/post-subject"
                class="list-group-item list-group-item-action py-2 ripple"
              >
                <span class="material-icons-round"> playlist_add </span>
                <span>&nbsp;&nbsp;&nbsp;Tambah Subjek</span>
              </a>
              <a
                href="/logout"
                class="list-group-item list-group-item-action py-2 ripple"
                style="background-color: rgb(243, 243, 243)"
              >
                <span class="material-icons-round" style="color: #e25151">
                  logout
                </span>
                <span style="color: #e25151; font-weight: 600"
                  >&nbsp;&nbsp;&nbsp;Logout</span
                >
              </a>
            </div>
          </div>
        </div>
      </nav>
      <!-- Sidebar -->

      <!-- Right Content -->
      <div class="right d-flex flex-column p-4">
        <div class="title d-flex flex-row justify-content-center align-items-center">
            <span class="material-icons-round" style="font-size: 50px; color: #488ce0;">menu_book</span>  
            <h1 class="text-center m-0 mt-1">&nbsp;&nbsp;TAMBAH PUBLIKASI SIFALIB</h1>   
        </div>
        <div class="content border mt-3">
          <form
            action="/post-publications"
            method="post"
            enctype="multipart/form-data"
          >
            <?php csrf_field() ?>
            <div class="form-group mb-3 mt-3">
              <label for="title">Judul Publikasi :</label>
              <input
                type="text"
                name="title"
                id="title"
                placeholder="Judul publikasi"
                class="
                  form-control
                  <?=
                  ($validation->hasError('title'))?
                  'is-invalid'
                  :
                  '';
                  ?>
                "
                value="<?= old('title'); ?>"
                required
              />
              <div class="invalid-feedback">
                <?= $validation->getError('title'); ?>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="author">Penulis Publikasi :</label>
              <input
                type="text"
                name="author"
                id="author"
                placeholder="Penulis publikasi"
                class="
                  form-control
                  <?=
                  ($validation->hasError('author'))?
                  'is-invalid'
                  :
                  '';
                  ?>
                "
                value="<?= old('author'); ?>"
                required
              />
              <div class="invalid-feedback">
                <?= $validation->getError('author'); ?>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="year">Tahun Publikasi :</label>
              <input
                type="text"
                name="year"
                id="year"
                placeholder="Tahun terbit publikasi"
                class="
                  form-control
                  <?=
                  ($validation->hasError('year'))?
                  'is-invalid'
                  :
                  '';
                  ?>
                "
                value="<?= old('year'); ?>"
                required
              />
              <div class="invalid-feedback">
                <?= $validation->getError('year'); ?>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="abstract">Abstrak Publikasi (Opsional) :</label>
              <textarea class="form-control" name="abstract" id="abstract" cols="30" rows="5"  placeholder="Abstrak opsional"><?= old('abstract'); ?></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="subject">Subjek Publikasi :</label>
              <?php foreach($subjects as $sub) :?>
              <div class="checkbox">
                <label class="d-flex flex-row align-items-center col-sm-2"
                  ><input
                    type="checkbox"
                    value="<?= $sub['id']?>"
                    name="subject_id[]"
                  />
                  <h5><?= $sub['subject_name']?></h5>
                </label>
              </div>
              <?php endforeach;?>
              <?php if(session()->getFlashdata('error_subject')):?>
                <div class="invalid feedback" style="color: red;">
                    <?= session()->getFlashdata('error_subject') ?>
                </div>
            <?php endif;?>
            </div>
            <div class="form-group mb-3 ">
              <label for="sel1">Tipe Publikasi :</label>
              
              <select  id="sel1" name="type" required 
                style="width: 100%; height: 40px; border-radius: 5px; border-color: rgb(206, 212, 218)">
                <option value="Laporan KP/Magang">Laporan KP/Magang</option>
                <option value="Skripsi/TA">Skripsi/TA</option>
                <option value="Tesis/Disertasi">Tesis/Disertasi</option>
                <option value="Jurnal/Buku">Jurnal/Buku</option>
                <option value="Lapora Pasca Pelatihan">
                  Laporan Pasca Pelatihan
                </option>
              </select>
              <?php if(session()->getFlashdata('refill')):?>
                <div class="invalid feedback" style="color: red;">
                    <?= session()->getFlashdata('refill') ?>
                </div>
            <?php endif;?>
            </div>
            <div class="form-group mb-3">
              <label for="sel1">Berkas Publikasi :</label>
             
              <input
                type="file"
                accept="application/pdf"
                name="file"
                placeholder="File publikasi"
                class="
                  form-control
                  <?=
                  ($validation->hasError('file'))?
                  'is-invalid'
                  :
                  '';
                  ?>
                "
                required
              />
              <div class="invalid-feedback">
                <?= $validation->getError('file'); ?>
                <?php if(session()->getFlashdata('refill')):?>
                <div class="invalid feedback" style="color: red;">
                    <?= session()->getFlashdata('refill') ?>
                </div>
            <?php endif;?>
              </div>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-success mb-4">Tambah</button>
            </div>
          </form>
        </div>
       
      </div>
    </main>
    <!-- Right Content -->
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tr[data-href]");

        rows.forEach((row) => {
          row.addEventListener("click", () => {
            window.location.href = row.dataset.href;
          });
        });
      });
    </script>
  </body>
</html>
