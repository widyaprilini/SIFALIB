<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
    <link rel="stylesheet" href="../css/admin/detail-publications.css" />
    <!-- Self-CSS -->
    <title>Tambah Publikasi</title>
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
                class="list-group-item list-group-item-action py-2 ripple"
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
        <div
          class="
            title
            d-flex
            flex-row
            justify-content-center
            align-items-center
          "
        >
          <span
            class="material-icons-round"
            style="font-size: 50px; color: #488ce0"
            >drive_file_rename_outline</span
          >
          <h1 class="text-center m-0 mt-1">
            &nbsp;&nbsp;DETAIL PUBLIKASI SIFALIB
          </h1>
        </div>
        <div class="content border mt-3">
          <form class="mt-5 mb-4">
            <div class="form-group row mb-4">
              <button
                type="button"
                class="btn btn-secondary col-sm-1 d-flex align-items-center"
                style="height: 30px"
              >
                <span class="material-icons-round" style="font-size: 18px">
                  arrow_back</span
                >&nbsp;&nbsp;Kembali
              </button>
              <div class="col-sm-10 mb-3"></div>
            </div>
            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10 mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  value="Algoritma LALR Parser dalam Mendeteksi Struktur Kalimat Tunggal Bahasa Indonesia dengan Menggunakan POS Tagging"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="author" class="col-sm-2 col-form-label"
                >Penulis</label
              >
              <div class="col-sm-10 mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="author"
                  value="Muhammad Sholeh, M. Raihan Almenata"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="year-publicated" class="col-sm-2 col-form-label"
                >Tahun Terbit</label
              >
              <div class="col-sm-10 mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="year-publicated"
                  value="2018"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="abstract" class="col-sm-2 col-form-label"
                >Abstrak (Opsional)</label
              >
              <div class="col-sm-10 mb-3">
                <textarea
                  name="abstract"
                  id="abstract"
                  cols="20"
                  rows="5"
                  class="form-control"
                ></textarea>
              </div>
            </div>
            <div class="form-group row mb-3">
              <label for="subject" class="col-sm-2 col-form-label"
                >Subjek Publikasi</label
              >
              <div class="checkbox col-sm-10 d-flex align-items-center">
                <label class="d-flex flex-row align-items-center col-sm-1"
                  ><input
                    type="checkbox"
                    value=""
                    name="subject_id[]"
                  />
                  <h5>Psikologi</h5>
                </label>
                
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="title" class="col-sm-2 col-form-label"
                >Jenis Publikasi</label
              >
              <div class="col-sm-10 mb-3">
                <select
                  id="sel1"
                  name="type"
                  required
                  style="
                    width: 100%;
                    height: 35px;
                    border-radius: 5px;
                    border-color: rgb(206, 212, 218);
                  "
                >
                  <option value="Laporan KP/Magang">Laporan KP/Magang</option>
                  <option value="Skripsi/TA">Skripsi/TA</option>
                  <option value="Tesis/Disertasi">Tesis/Disertasi</option>
                  <option value="Jurnal/Buku">Jurnal/Buku</option>
                  <option value="Lapora Pasca Pelatihan">
                    Laporan Pasca Pelatihan
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="abstract" class="col-sm-2 col-form-label"
                >Berkas Publikasi</label
              >
              <div class="col-sm-9 mb-3" style="padding-right: 0px">
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
                  style="
                    border-radius: 0px;
                    border-top-left-radius: 5px;
                    border-bottom-left-radius: 5px;
                  "
                  required
                />
                <div class="invalid-feedback">
                  <?= $validation->getError('file'); ?>
                </div>
              </div>
              <button
                class="
                  btn btn-danger
                  col-sm-1
                  mb-3
                  d-flex
                  justify-content-center
                  align-items-center
                "
                style="
                  border-radius: 0px;
                  border-top-right-radius: 10px;
                  border-bottom-right-radius: 10px;
                  width: 95px;
                  height: 38px;
                "
                id="removeInput"
                name="removeInput"
              >
                <span
                  class="material-icons-round"
                  style="color: white; font-size: 25px"
                >
                  delete
                </span>
              </button>
            </div>
            <div class="form-group col d-flex justify-content-center">
              <button type="button" class="btn btn-danger" style="width: 100px">
                Hapus
              </button>
              <div class="space mx-2"></div>
              <button
                type="button"
                class="btn btn-primary"
                style="width: 100px"
              >
                Simpan
              </button>
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
