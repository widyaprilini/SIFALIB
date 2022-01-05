<!doctype html>
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
    <link rel="stylesheet" href="../css/admin/login.css" />
    <!-- Self-CSS -->
    <title>Login Admin SIFALIB</title>
  </head>
  <body>
    <main class="d-flex flex-row">
      <div
        class="
          col-lg-6
          left
          d-flex
          justify-content-center
          align-items-center
          container
        "
      >
        <div class="content w-75">
          <div class="logo d-flex justify-content-center">
            <img src="../img/logo-digilib.png" alt="" />
          </div>
          <div class="login-form mt-5 container">
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif;?>
            <form action="/SigninController/loginAuth" method="post">
              <div class="form-group">
                <label for="username" style="background-color: white"
                  >&nbsp;&nbsp;Username&nbsp;&nbsp;</label
                >
                <input
                  type="text"
                  name="username"
                  class="form-control border-3 border-dark"
                  value="<?= set_value('username') ?>"
                  id="username"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="form-group mt-3">
                <label for="password" style="background-color: white"
                  >&nbsp;&nbsp;Password&nbsp;&nbsp;</label
                >
                <input
                  type="password"
                  name="password"
                  class="form-control border-3 border-dark"
                  id="password"
                />
              </div>
              <button type="submit" class="btn btn-primary w-100 mt-4">
                Masuk
              </button>
              <a href="/">
                <button type="button" class="btn btn-secondary w-100 mt-3">
                    Kembali
                </button>
              </a>
            </form>
          </div>
        </div>
      </div>

      <div
        class="col-lg-6 right d-flex justify-content-center align-items-center"
      >
        <img
          src="../img/bg-login-admin.png"
          style="height: 100vh; width: auto"
          alt=""
        />
      </div>
    </main>
  </body>
</html>