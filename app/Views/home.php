<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIFALIB</title>
</head>
<body>
    <h1><a href="/signin">Masuk</a></h1>
    <form action="/sifalibsearch" method="post">
        <input type="text" id="vehicle1" name="title">
        <br>
        <div class="type">Tipe<br>
        <input type="checkbox" id="vehicle1" name="type[]" value="Laporan KP/Magang">
        <label for="vehicle1">Laporan KP/Magang</label><br>
        <input type="checkbox" id="vehicle2" name="type[]" value="Skripsi/TA">
        <label for="vehicle2">Skripsi/TA</label><br>
        <input type="checkbox" id="vehicle3" name="type[]" value="Tesis/Disertasi">
        <label for="vehicle3">Tesis/Disertasi</label><br>
        <input type="checkbox" id="vehicle3" name="type[]" value="Jurnal/Buku">
        <label for="vehicle3">Jurnal/Buku</label><br>
        <input type="checkbox" id="vehicle3" name="type[]" value="Laporan Pasca Pelatihan">
        <label for="vehicle3">Laporan Pasca Pelatihan</label><br>
        </div>
        <div class="year">Tahun<br>
        <input type="hidden" value="" name="year[0]">
        <input type="radio" id="vehicle1" name="year[0]" value="2021">
        <label for="vehicle1">Sejak 2021</label><br>
        <input type="radio" id="vehicle2" name="year[0]" value="2020">
        <label for="vehicle2">Sejak 2020</label><br>
        <input type="radio" id="vehicle3" name="year[0]" value="2019">
        <label for="vehicle3">Sejak 2019</label><br>
        <input type="radio" id="vehicle3" name="year[0]" value="2018">
        <label for="vehicle3">Sejak 2018</label><br>
        <input type="hidden" value="<?= date('Y')?>" name="year[1]">
        <!-- <input type="text" name="year[0]"> - <input type="text" name="year[1]"> -->
        </div>
        <div class="subject">Subjek<br>
        <?php foreach($subject as $sub) :?>
            <input type="checkbox" name="subject[]" value="<?= $sub['id']; ?>">
            <label for="vehicle1"><?= $sub['subject_name']; ?></label><br>
            <?php endforeach;?>
        </div>
        <button type="submit">SUBMIT</button>
        </form>
    </body>
</html>