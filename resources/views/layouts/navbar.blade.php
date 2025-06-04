<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="" type="x-icon">
    <title>E-FUN! Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        body {
            font-family: 'Poppins', sans-serif;

        }

        .btn-riwayat {
            background-image: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            cursor: pointer;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            margin-right: 10px;
            display: inline-block;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navigation-bar2 p-2" role="navigation" style="background-color: #ffffff;">
        <div class="container">
            <img class="image" src="{{ asset('img/logo2.png') }}" width="135px" style="position: center;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 0.9rem; color: #515151;" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 0.9rem; color: #515151;" aria-current="page"
                            href="/events">Event</a>
                    </li>


                    <!-- Tombol Login -->
                    @guest
                        <li class="nav-item d-flex align-items-center ms-3">
                            <a href="/login" class="btn-riwayat"
                                style="font-weight: 500; font-size: 0.9rem; text-decoration: none;">Login</a>
                        </li>
                    @endguest
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="font-weight:bold; font-size: 0.9rem;" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, {{ auth()->user()->name }}!
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="/logout" method="get">
                                        @csrf
                                        <button type="submit" class="dropdown-item"
                                            style="font-size: 0.85rem;">Logout</button>
                                    </form>
                                </li>

                                <li>
                                    <a class="dropdown-item" style="font-size: 0.85rem;"
                                        href="/dashboard/user">Dashboard</a>
                                </li>

                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield ('nav')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
