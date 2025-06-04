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
  <div style="text-align: left; margin-bottom: 30px;">
    <span style="
      background: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: bold;
      font-size: 17px;
    ">
      Kategori | Event
    </span>
    <br>
    <span style="
      background: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: bold;
      font-size: 32px;
    ">
      Informasi Detail Tiket
    </span>
  </div>
  <hr style="margin-top: -15px;">

  <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 30px;">
  <!-- Sisi kiri: Gambar -->
  <div style="flex: 1 1 300px;">
    <img src="{{ asset('img/contoh.png') }}" alt="Gambar Event" style="width: 100%; height: auto; display: block;">
  </div>

  <!-- Sisi kanan: Informasi Event -->
  <div style="flex: 2 1 300px;">
    <!-- Nama Event -->
    <h2 style="margin-top: 0; font-size: 25px; color: #dc5496; font-weight: 600; margin-bottom: 20px;">
    <i class="fas fa-star" style="margin-right: 15px; color: #dc5496;"></i>Rasrava Fest  <!-- DIISI DENGAN JUDUL EVENT-->
    </h2>

    <!-- Deskripsi -->
    <p style="font-size: 16px; font-weight: 600; color: #4389cf; margin-bottom: 8px;">Deskripsi Acara</p>
    <p style="font-size: 14px; margin: 12px 0; color: #515151;">  <!-- DIISI DENGAN DESC-->
      Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing and typesetting industry...
    </p>

    <!-- Tabel Tanggal & Lokasi -->
    <p style="font-size: 16px; font-weight: 600; color: #4389cf; margin-bottom: 8px;">Informasi Tiket</p>
    <table style="width: 100%; font-size: 14px; color: #515151; border-collapse: collapse; margin-bottom: 20px; border: 1px solid #ccc;">
      <tr style="border-bottom: 1px solid #ccc;">
        <td style="padding: 10px; font-weight: 500; border-right: 1px solid #ccc;">Harga Tiket</td>
        <td style="background-color: #d0e7ff; color: #5cadff; font-weight: 600; padding: 6px 12px; border-radius: 6px;" id="hargaTiket">
          Rp. 230.000  <!-- DIISI DENGAN HARGA-->
        </td>
      </tr>
      <tr style="border-bottom: 1px solid #ccc;">
        <td style="padding: 10px; font-weight: 500; border-right: 1px solid #ccc;">Tanggal Acara</td>
        <td style="padding: 10px;">15 Juni 2025</td>  <!-- DIISI DENGAN TANGGGAL EVENT-->
      </tr>
      <tr>
        <td style="padding: 10px; font-weight: 500; border-top: 1px solid #ccc; border-right: 1px solid #ccc;">Lokasi Acara</td>
        <td style="padding: 10px; border-top: 1px solid #ccc;">Sudimoro, Malang, Jawa Timur</td>  <!-- DIISI DENGAN LOKASI-->
      </tr>
    </table>

    <!-- Total dan Jumlah -->
    <p style="font-size: 16px; font-weight: 600; color: #4389cf; margin-bottom: 8px;">Total Pembelian</p>
    <div style="margin-bottom: 40px; font-size: 16px; color: #515151;" id="totalDisplay">
      Rp. 230.000 x 1 = <strong>Rp. 230.000</strong>  <!-- DIISI DENGAN HARGA-->
    </div>

    <div style="margin-top: 20px; display: flex; align-items: center; gap: 10px;">
      <button style="
        background-color: #4389cf;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
      ">
        Buat Pesanan
      </button>
      <input type="number" id="jumlahTiket" value="1" min="1" style="
        width: 60px;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
      ">
    </div>
  </div>
</div>

<script>
  const jumlahInput = document.getElementById('jumlahTiket');
  const totalDisplay = document.getElementById('totalDisplay');
  const hargaPerTiket = 230000;

  function formatRupiah(angka) {
    return 'Rp. ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
  }

  jumlahInput.addEventListener('input', function () {
    let jumlah = parseInt(this.value);
    if (isNaN(jumlah) || jumlah < 1) jumlah = 1;
    const total = hargaPerTiket * jumlah;
    totalDisplay.innerHTML = `${formatRupiah(hargaPerTiket)} x ${jumlah} = <strong>${formatRupiah(total)}</strong>`;
  });
</script>

</div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>


@endsection
