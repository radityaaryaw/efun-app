<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | E-FUN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body, h1, p, label, .btn {
            font-family: 'Poppins', sans-serif;
        }

        .background-radial-gradient {
            height: 100vh;
            background-color: hsl(210, 100%, 40%); /* Biru dasar */
            background-image:
                radial-gradient(circle at top left,
                    hsl(210, 100%, 60%) 0%,
                    hsl(330, 100%, 70%) 40%,
                    transparent 80%),
                radial-gradient(circle at bottom right,
                    hsl(330, 100%, 80%) 0%,
                    hsl(210, 100%, 50%) 50%,
                    transparent 90%),
                linear-gradient(135deg,
                    hsl(210, 82%, 41%) 0%,
                    hsl(330, 100%, 60%) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bg-glass {
            background-color: #fff;
            backdrop-filter: saturate(200%) blur(25px);
        }

        .btn-riwayat {
        background-color: #515151;
        color: #fff;
        text-align: center;
        padding: 10px 20px 10px 20px;
        border: none;
        border-radius: 10px;
        font-weight: 500;
        cursor: none;
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
            <!-- Tambahkan logo di sini -->
            <div style="margin-bottom: 20px;">
                <img src="{{ asset('img/logo.png') }}" alt="Logo E-Fun" style="max-height: 80px;">
            </div>
            <h1 class="my-5 display-5 fw-bold ls-tight" style="color: white; font-size: 45px;">
                Beli Tiket Event <br />
                <span style="color: hsl(204, 100%, 89%)">Gak Pernah Semudah Ini!</span>
            </h1>
            <p class="mb-4 opacity-70" style="color: white">
                Gabung sekarang dan jadi yang pertama dapetin tiket event favorit kamu secara online, tanpa perlu repot, cepat dan aman hanya di E-Fun event organizer!
            </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          @if (session('success'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 14px; border-radius: 15px;">
                {{ session ('success') }}
            </div>
          @endif

          <div class="card bg-glass" style="border-radius: 25px;">
            <div class="card-body px-4 py-5 px-md-5">
                <form id="registration-form" action="{{route('regisakun')}}" method="post" onsubmit="return validateForm()">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-outline" for="name" style="font-weight: 600; font-size: 15px;">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Ketikkan nama lengkap anda" style="padding: 15px; border-radius:  13px; border: 1px solid #ccc; font-size: 13px;" />
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-outline" for="username" style="font-weight: 600; font-size: 15px;">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Ketikkan username" style="padding: 15px;  border-radius:  13px; border: 1px solid #ccc; font-size: 13px;" />
                    </div>
                </div>

                {{-- DBNYA BELUM ADA YANG JENIS KELAMIN --}}
                {{-- <div class="form-outline mb-4">
                    <label class="form-label" for="email" style="font-weight: 600; font-size: 15px;">Email</label>
                    <input type="email" name="email" id="email" class="form-control" style="padding: 15px; color: #727272; border-radius:  20px; border: 1px solid #ccc; font-size: 13px;" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" style="font-weight: 600; font-size: 15px;">Jenis Kelamin</label><br>
                    <div style="display: flex; gap: 20px; padding: 10px 0;">
                        <div>
                            <input type="radio" name="gender" id="laki" value="Laki-laki" />
                            <label for="laki" style="font-size: 15px; color: #727272;">Laki-laki</label>
                        </div>
                        <div>
                            <input type="radio" name="gender" id="perempuan" value="Perempuan" />
                            <label for="perempuan" style="font-size: 15px; color: #727272;">Perempuan</label>
                        </div>
                    </div>
                </div> --}}

                {{-- INI NANTI TIDAK DIPAKE --}}
                <div class="form-outline mb-4">
                    <label class="form-label" for="address" style="font-weight: 600; font-size: 15px;">Address</label>
                    <input type="text" name="address" id="address" class="form-control" style="padding: 15px;  border-radius:  13px; border: 1px solid #ccc; font-size: 13px;" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4" style="padding-bottom: 30px;">
                    <label class="form-label" for="password" style="font-weight: 600; font-size: 15px;">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" style="padding: 15px; border-radius:  13px; border: 1px solid #ccc; font-size: 13px;" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn-riwayat" style="font-size: 14px;">
                    <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Sign In
                </button>


                <!-- Register buttons -->
                <div class="text-center" style="padding-top: 40px; font-size: 14px;">
                    <p>Sudah punya akun ?  <a href="{{url('/')}}" style="color: #389de5; font-weight: bold; text-decoration: underline;">Login</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
  <script>
    function validateForm() {
        var fullname = document.getElementById("fullname").value;
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var address = document.getElementById("address").value;
        var password = document.getElementById("password").value;

        if (fullname == "" || username == "" || email == "" || address == "" || password == "") {
            alert("Harap isi semua data terlebih dahulu!");
            return false;
        }
        return true;
    }
</script>


</body>
</html>
