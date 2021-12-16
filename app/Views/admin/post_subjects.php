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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js"
      integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    <link rel="stylesheet" href="../css/admin/post-subjects.css" />
    <!-- Self-CSS -->
    <title>SIFALB - ADMIN | Subjek Publikasi</title>

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
                class="
                  list-group-item list-group-item-action
                  py-2
                  ripple
                  active
                "
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
            &nbsp;&nbsp;TAMBAH SUBJEK PUBLIKASI SIFALIB
          </h1>
        </div>
        <div class="line d-flex justify-content-center">
          <p
            class="d-flex justify-content-center mt-2"
            style="
              background-color: #488ce0;
              height: 7px;
              border-radius: 5px;
              width: 800px;
              color: #488ce0;
            "
          ></p>
        </div>
        <div class="add-subjects mt-5 mb-1 d-flex justify-content-center">
          <button
            class="btn btn-primary d-flex align-items-center"
            data-target="#exampleModal"
            data-toggle="modal"
            type="button"
          >
            <span class="material-icons-round">add</span>&nbsp;Tambah Subjek
          </button>
          <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    Tambah Subjek Baru
                  </h5>
                </div>
                <div class="modal-body">
                  <form action="/post-subject" method="post">
                    <div class="form-group mb-3">
                      <label for="recipient-name" class="col-form-label"
                        >Nama Subjek:</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="recipient-name"
                        name="subject_name"
                      />
                      <small style="color: #e25151"
                        >&nbsp;* Pastikan Nama Yang Anda Masukkan Sudah
                        Benar!</small
                      >
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                      >
                        Kembali
                      </button>
                      <button type="submit" class="btn btn-primary">
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content p-4 mt-5">
        <?php if(session()->getFlashdata('success')):?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;?>
            <?php if(session()->getFlashdata('error')):?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif;?>
            <div style="color: red;">
                    <?= $validation->listErrors() ?>
                </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td scope="col">No</td>
                <td scope="col">Subjek</td>
                <td scope="col">Kelola</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach($all_subjects as $sub): ?>
              <tr>
                <th>1</th>
                <td><?= $sub['subject_name'] ?></td>
                <td>
                  <a href="/delete-subject/<?= $sub['id'] ?>">
                    <button
                      class="btn btn-danger"
                      type="button"
                      onclick="return confirm('Yakin Hapus Subjek?')"
                    >
                      <span
                        class="material-icons-round"
                        style="color: white; font-size: 20px"
                      >
                        delete
                      </span>
                    </button>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
    <!-- Right Content -->
  </body>
</html>
