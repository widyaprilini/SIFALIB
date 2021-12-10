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
    <link rel="stylesheet" href="../css/admin/dashboard.css" />
    <!-- Self-CSS -->
    <title>Login Admin</title>
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
                class="
                  list-group-item list-group-item-action
                  py-2
                  ripple
                  active
                "
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
      <div class="right d-flex flex-column justify-content-center">
        <div class="banner">
          <img src="/img/banner.png" alt="" />
        </div>
        <div class="line">
          <hr size="20" style="color: #488ce0;">
        </div>
        <div class="search-form">
          <form class="form-inline d-flex flex-row w-100">
            <select
              style="
                margin-right: 10px;
                width: 200px;
                border-radius: 5px;
                border-color: rgba(206, 212, 218, 1);
                color: #488ce0;
              "
              name=""
              id=""
            >
              <option value="#" selected disabled>
                &nbsp;Filter Pencarian
              </option>
              <option value="hehe">&nbsp;Judul</option>
              <option value="hehe">&nbsp;Penulis</option>
              <option value="hehe">&nbsp;Tahun Terbit</option>
              <option value="hehe">&nbsp;Subjek</option>
              <option value="hehe">&nbsp;Jenis</option>
            </select>
            <input
              class="form-control mr-sm-2 w-25 overflow-hidden ml-2"
              type="search"
              placeholder="Kata Kunci Pencarian..."
              aria-label="Search"
              style="
                border-radius: 0;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
                color: #488ce0;
                border-color: #488ce0;
              "
            />
            <button
              class="btn btn-primary"
              style="
                border-radius: 0;
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                width: 80px;
              "
              type="submit"
            >
              Cari
            </button>
          </form>
        </div>
        <div class="content p-4">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td scope="col">No</td>
                <td scope="col">Judul</td>
                <td scope="col">Penulis</td>
                <td scope="col">Tahun Terbit</td>
                <td scope="col">Jenis</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach($all as $all):?>
              <!-- <tr data-href="/edit-publications/<?= $all['id']?>"> -->
              <tr data-href="/detail-publication">
                <th scope="row">1</th>
                <td><?php echo $all['title']?></td>
                <td><?php echo $all['year']?></td>
                <td><?php echo $all['author']?></td>
                <td><?php echo $all['type']?></td>
              </tr>
              <?php endforeach?>
              
            </tbody>
          </table>
          `
        </div>

        <svg
          width="120"
          height="127"
          viewBox="0 0 120 127"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M193 46.0962L193 183L28.2677 183L-1.52588e-05 8.4363e-06L193 46.0962Z"
            fill="#488CE0"
          />
        </svg>
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
