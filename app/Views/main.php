<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link rel="stylesheet" href="/css/user/utility.css">
    <link rel="stylesheet" href="/css/user/main.css">
    <title>SIFA-DIGILIB</title>
</head>
<body class="col justify-between align-center">
    <nav class="row justify-center">
        <div id="nav-elements" class="row justify-between">
            <img src="/img/logo.png" alt="" id="logo">
            <div class="group row align-center">
                <div class="group row align-center">
                    <span class="material-icons-outlined" id="language">
                        language
                    </span>
                    <p id="language-options">
                        <span id="ID"> ID </span>
                        |
                        <span id="EN"> EN </span>
                    </p>
                </div>
                <div id="login"> LOGIN </div>
            </div>
        </div>
    </nav>

    <form action="/sifalibsearch" class="col" id="main-form" method="post">        
        <header class="col">
            <h1 id="title">SIFA - DIGITAL <br> LIBRARY</h1>
            <p id="title-description">
                <b>SIFALIB</b> merupakan laman yang menyediakan dokumen penelitian secara digital baik yang dilakukan oleh RSUD Siti Fatimah maupun penelitian yang dilakukan oleh pihak eksternal di RSUD Siti Fatimah
            </p>
            <div id="search-bar" class="row">
                <span class="material-icons-outlined" style="color: #488CE0;">
                    search
                </span>
                <input type="text" name="title" placeholder="Cari Judul Disini..">
                <span class="material-icons-outlined" style="color: #488CE0;">
                    filter_alt
                </span>
                <button type="submit">TEMUKAN</button>
            </div>
        </header>
        
        <main class="col" id="main-content">
            <div class="row" id="profile">
                <div id="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/WQ2V1rG4X_c?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div id="content" class="col">
                    <h1>LOREM IPSUM
                        DOLOR SIT</h1>
                    <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                </div>
                <div id="vector"></div>
            </div>
            <div id="filter" class="col">
                <div class="row align-center" id="filter-header">
                    <span class="material-icons-round">filter_alt</span>
                    <h1>Filter Pencarian</h1>
                </div>
                <section id="cards" class="row justify-center">
                    <div class="card col">
                        <h2>Jenis Karya Tulis Ilmiah</h2>
                        <div class="row">
                            <input type="checkbox" name="type[]" value="Laporan KP/Magang" id="magang">
                            <label for="magang" class="box"></label>
                            <label for="">Kerja Praktik / Magang</label>
                        </div>
                        <div class="row">
                            <input type="checkbox" name="type[]" value="Skripsi/TA" id="skripsi">
                            <label for="skripsi" class="box"></label>
                            <label for="">Tugas Akhir / Skripsi</label>
                        </div>
                        <div class="row">
                            <input type="checkbox" name="type[]" value="Tesis/Disertasi" id="tesis">
                            <label for="tesis" class="box"></label>
                            <label for="">Tesis / Disertasi</label>
                        </div>
                        <div class="row">
                            <input type="checkbox" name="type[]" value="Jurnal/Buku" id="buku">
                            <label for="buku" class="box"></label>
                            <label for="">Jurnal / Buku</label>
                        </div>
                        <div class="row">
                            <input type="checkbox" name="type[]" id="laporan" value="Laporan Pasca Pelatihan">
                            <label for="laporan" class="box"></label>
                            <label for="">Laporan Pasca Pelatihan</label>
                        </div>
                    </div>
                    <div class="card col" id="published-year">
                        <h2>Tahun Terbit</h2>
                        <div class="row">
                            <input type="radio" name="year[0]" value="2021" id="2021">
                            <label for="2021" class="box"></label>
                            <label for="">2021</label>
                        </div>
                        <div class="row">
                            <input type="radio" name="year[0]" value="2020" id="2020">
                            <label for="2020" class="box"></label>
                            <label for="">2020</label>
                        </div>
                        <div class="row">
                            <input type="radio" name="year[0]" value="2019" id="2019">
                            <label for="2019" class="box"></label>
                            <label for="">2019</label>
                        </div>
                        <div class="row">
                            <input type="radio" name="year[0]" value="2018" id="2018">
                            <label for="2018" class="box"></label>
                            <label for="">2018</label>
                        </div>
                        <div class="row">
                            <input type="radio" name="year[0]" value="" id="-">
                            <label for="-" class="box"></label>
                            <label for="">Reset</label>
                        </div>
                        <div id="custom" class="col">
                            <h3>Kustomisasi Tahun Terbit</h3>
                            <div class="row">
                                <input type="number" name="year[]">
                                <hr width="10px" style="border: 0.5px solid;">
                                <input type="number" name="year[]">
                            </div>
                        </div>
                    </div>
                    <div class="card col">
                        <h2>Subjek Karya Tulis Ilmiah</h2>
                        <?php foreach($subject as $sub) : ?>
                            <div class="row">
                                <input type="checkbox" name="subject[]" id=" <?= $sub['subject_name']; ?> " value=" <?= $sub['id']; ?> ">
                                <label for=" <?= $sub['subject_name']; ?> " class="box"></label>
                                <label for=""> <?= $sub['subject_name']; ?> </label>
                            </div>    
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
            <div id="result-search" class="col">
                <div class="row align-center" id="result-header">
                    <span class="material-icons-round">list</span>
                    <h1>Hasil Pencarian</h1>
                </div>
                <div class="row align-center" id="result-sort">
                    <p>Urutkan Berdasarkan : </p>
                    <div class="wrapper">
                        <select name="" id="abjad">
                            <option value="">Alphabet : </option>
                            <option value="">A - Z</option>
                            <option value="">Z - A</option>
                        </select>
                        <label class="arrow-wrapper row align-center" for="abjad">
                            <span class="material-icons-round arrow">
                                expand_more
                            </span>
                        </label>
                    </div>
                    <div class="wrapper">
                        <select name="" id="tahun-terbit">
                            <option value="">Waktu : </option>
                            <option value="">Terbaru</option>
                            <option value="">Terlama</option>
                        </select>
                        <label class="arrow-wrapper row align-center" for="tahun-terbit">
                            <span class="material-icons-round arrow">
                                expand_more
                            </span>
                        </label>
                    </div>
                    <div class="wrapper">
                        <select name="" id="popularitas">
                            <option value="">Popularitas : </option>
                            <option value="">Paling Populer</option>
                        </select>
                        <label class="arrow-wrapper row align-center" for="popularitas">
                            <span class="material-icons-round arrow">
                                expand_more
                            </span>
                        </label>
                    </div>
                </div>
                <section id="results" class="col">
                    <div class="result row justify-between">
                        <div class="result-content col">
                            <h3>Algoritma LALR Parser dalam Mendeteksi Struktur Kalimat Tunggal Bahasa Indonesia dengan Menggunakan POS Tagging</h3>
                            <h4 class="author">Muhammad Sholeh, M Raihan Almenata</h4>
                            <h5 class="tags row">
                                <p class="year">2018</p>
                                <p> , </p>
                                <p class="result-type">Tugas Akhir</p>
                            </h5>
                        </div>
                        <div class="result-decor"></div>                        
                    </div>
                </section>
            </div>
        </main>
    </form>
        
    <footer class="row center">
        <div id="whatsapp">
            <span class="material-icons-outlined">
                whatsapp
            </span>
        </div>
        <div class="group row">
            <div id="about">
                <h1>Apa itu SIFALIB?</h1>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.
                </p>
            </div>
            <div id="navigation">
                <h1>Navigasi</h1>
                <ul>
                    <a href="">
                        <li>Pencarian</li>
                    </a>
                    <a href="">
                        <li>Tentang Kami</li>
                    </a>
                    <a href="">
                        <li>FAQ</li>
                    </a>
                </ul>
            </div>
            <div id="contacts">
                <h1>Narahubung</h1>
                <ul>
                    <a href="">
                        <li class="row">
                            <span class="material-icons-round">
                                call
                                </span> 0811 7117 929
                        </li>
                    </a>
                    <a href="">
                        <li class="row">
                            <span class="material-icons-round">
                                mail
                                </span> diklatrsudsitifatimah@gmail.com
                        </li>
                    </a>
                    <a href="">
                        <li class="row">
                            <span class="material-icons-round">
                                location_on
                                </span> Jl. Kolonel H. Burlian, Suka Bangun, Sukarami, Kota Palembang, Sumatera Selatan 30151
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </footer>
    <script src="/js/main.js"></script>
    <script>

        
        
        const form = document.getElementById('main-form');
        const formData = new FormData(form);
        const formInput = {};

        document.getElementById('cards').addEventListener('click', () => {
            const form = document.getElementById('main-form');
            const formData = new FormData(form);

            for (let entry of formData.entries()) {
                if(entry[1]==""){
                    formData.delete(entry[0]);
                }
            }
        // })
        

        user = { 
            "name": "Geeks for Geeks", 
            "age": "23" 
        }
          
        let options = {
            method: 'POST',
            // headers: {
            //     'Content-Type': 
            //         'application/json;charset=utf-8'
            // },
            body: formData
        }
  
        // Fake api for making post requests
        fetch(
            "http://localhost:8080/sifalibsearch", 
            options).then(res =>
            res.json()).then( sth => {
                console.log(sth)
            })

        })
    </script>
</body>
</html>