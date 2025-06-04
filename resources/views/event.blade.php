@extends ('layouts.navbar')

@section ('nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

      body {
          font-family: 'Poppins', sans-serif;
      }

      </style>
</head>
<body>
  <div class="container">
        <br>
        <div style="text-align: center; margin-bottom: 30px;">
          <span style="
            background: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            font-size: 22px;
        ">Destinasi</span> </br>
        <span style="
            background: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            font-size: 35px;
        ">Kategori Event</span>
  </div>


<div class="row row-cols-1 row-cols-md-3 g-4">  <!-- INI JANGAN SAMPE KEAPUS KARENA DIA YANG BUAT LAYOUTNYA JD 3 KOTAK-->
  <!-- CARD 1 -->
  <div class="col">
    <a href="/event/detail" style="text-decoration: none; color: inherit;">
      <div class="card h-100">
        <img src="{{asset('img/contoh.png') }}" class="card-img-top" alt="Pura Ulun Danu Bratan, Bali">
        <div class="card-body">
          <div style="padding-top: 2px; display: flex; margin-bottom: 20px;">
            <div style="display: flex; align-items: flex-start; gap: 15px;">
              <i class="fa-solid fa-map-location-dot" style="font-size: 28px; color: #515151; margin-top: 4px;"></i>
              <div>
                <div style="font-weight: 600; font-size: 16px; color: #515151;">Rasrava Fest</div>
                <div style="font-weight: 300; font-size: 14px; color: #777777;">Event  |  Konser</div>
              </div>
            </div>
          </div>
          <p style="font-size: 14px; font-weight: 600; color: #4389cf; margin-bottom: 4px;">
            Informasi Tiket
            </p>
            <table style="width: 100%; font-size: 13px; color: #515151; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <td style="padding: 9px 0; font-weight: 500;">Tanggal Acara</td>
                <td style="padding: 6px 0;">15 Juni 2025</td>
            </tr>
            <tr>
                <td style="padding: 6px 0; font-weight: 500;">Lokasi Acara</td>
                <td style="padding: 6px 0;">
                Sudimoro malang jawa timur kota malang lorem ipsum lorem ipsum
                </td>
            </tr>
            </table>
          <p style="font-size: 14px; margin: 0 0 10px 0;">
            <span style="display: inline-flex; align-items: center; gap: 6px; background-color: #d0e7ff; color: #5cadff; font-weight: 600; padding: 6px 12px; border-radius: 6px;">
              <i class="fas fa-money-bill-wave"></i> Rp. 230.000
            </span>
          </p>
        </div>
      </div>
    </a>

  </div>

  <!-- CARD 2 -->
    <div class="col">
    <a href="/event/detail" style="text-decoration: none; color: inherit;">
      <div class="card h-100">
        <img src="{{asset('img/contoh.png') }}" class="card-img-top" alt="Pura Ulun Danu Bratan, Bali">
        <div class="card-body">
          <div style="padding-top: 2px; display: flex; margin-bottom: 20px;">
            <div style="display: flex; align-items: flex-start; gap: 15px;">
              <i class="fa-solid fa-map-location-dot" style="font-size: 28px; color: #515151; margin-top: 4px;"></i>
              <div>
                <div style="font-weight: 600; font-size: 16px; color: #515151;">Rasrava Fest</div>  <!-- DIISI DENGAN JUDUL-->
                <div style="font-weight: 300; font-size: 14px; color: #777777;">Event  |  Konser</div>  <!-- NAMA KATEGORI | SUB KATEGORI-->
              </div>
            </div>
          </div>
          <p style="font-size: 14px; font-weight: 600; color: #4389cf; margin-bottom: 4px;">
            Informasi Tiket
            </p>
            <table style="width: 100%; font-size: 13px; color: #515151; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <td style="padding: 9px 0; font-weight: 500;">Tanggal Acara</td>  <!-- DIISI DENGAN TANGGAL EVENT-->
                <td style="padding: 6px 0;">15 Juni 2025</td>
            </tr>
            <tr>
                <td style="padding: 6px 0; font-weight: 500;">Lokasi Acara</td>
                <td style="padding: 6px 0;">
                Sudimoro malang jawa timur kota malang lorem ipsum lorem ipsum  <!-- DIISI DENGAN LOKASI-->
                </td>
            </tr>
            </table>

          <p style="font-size: 14px; margin: 0 0 10px 0;">
            <span style="display: inline-flex; align-items: center; gap: 6px; background-color: #d0e7ff; color: #5cadff; font-weight: 600; padding: 6px 12px; border-radius: 6px;">
              <i class="fas fa-money-bill-wave"></i> Rp. 230.000  <!-- DIISI DENGAN HARGA-->
            </span>
          </p>
        </div>
      </div>
    </a>
  </div>

  <!-- CARD 3 -->
  <div class="col">
    <a href="/event/detail" style="text-decoration: none; color: inherit;">
      <div class="card h-100">
        <img src="{{asset('img/contoh.png') }}" class="card-img-top" alt="Pura Ulun Danu Bratan, Bali">
        <div class="card-body">
          <div style="padding-top: 2px; display: flex; margin-bottom: 20px;">
            <div style="display: flex; align-items: flex-start; gap: 15px;">
              <i class="fa-solid fa-map-location-dot" style="font-size: 28px; color: #515151; margin-top: 4px;"></i>
              <div>
                <div style="font-weight: 600; font-size: 16px; color: #515151;">Rasrava Fest</div>
                <div style="font-weight: 300; font-size: 14px; color: #777777;">Event  |  Konser</div>
              </div>
            </div>
          </div>
          <p style="font-size: 14px; font-weight: 600; color: #4389cf; margin-bottom: 4px;">
            Informasi Tiket
          </p>
          <table style="width: 100%; font-size: 13px; color: #515151; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
              <td style="padding: 9px 0; font-weight: 500;">Tanggal Acara</td>
              <td style="padding: 6px 0;">15 Juni 2025</td>
            </tr>
            <tr>
              <td style="padding: 6px 0; font-weight: 500;">Lokasi Acara</td>
              <td style="padding: 6px 0;">
                Sudimoro malang jawa timur kota malang lorem ipsum lorem ipsum
              </td>
            </tr>
          </table>

          <p style="font-size: 14px; margin: 0 0 10px 0;">
            <span style="display: inline-flex; align-items: center; gap: 6px; background-color: #d0e7ff; color: #5cadff; font-weight: 600; padding: 6px 12px; border-radius: 6px;">
              <i class="fas fa-money-bill-wave"></i> Rp. 230.000
            </span>
          </p>
        </div>
      </div>
    </a>
  </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>


@endsection
