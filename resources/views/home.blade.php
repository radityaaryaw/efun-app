@extends ('layouts.navbar')

@section('nav')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>E-FUN! Website</title>

        <style>
            body {}

            .text {
                text-align: right;
                padding-top: 10px;
            }
        </style>
    </head>

    <body>
        <section id="hero" class="d-flex align-items-center" style="min-height: 85vh; padding-top: 10px;">
            <div class="container">
                <div class="row align-items-center">
                    <!-- KIRI -->
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up">
                        <h1 style="font-size: 36px; color: #3278a0; font-weight: bold;">
                            <span
                                style="
                                        background: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7);
                                        -webkit-background-clip: text;
                                        -webkit-text-fill-color: transparent;
                                        font-weight: bold;
                                    ">Halo, Fun
                                People!
                            </span> Not Just a Feeling—It’s Euphoria.
                        </h1>
                        <p style="font-size: 16px; margin-top: 20px; color: #515151;">
                            Jelajahi berbagai acara menarik dan atraksi favorit di satu tempat. Daftarkan dirimu sekarang
                            dan jangan lewatkan pengalaman seru lainnya!
                        </p>
                        @guest
                            <a href="/register" class="btn-riwayat"
                                style="font-size: 16px; font-weight: 600; text-decoration: none; width: fit-content; background-color: #5cadff; margin: 12px;">
                                Daftar Sekarang
                            </a>
                        @endguest


                    </div>

                    <!-- KANAN -->
                    <div class="col-lg-6 d-flex justify-content-center" data-aos="fade-up">
                        <img src="{{ asset('img/landing.png') }}" class="img-fluid" alt="Event Travel"
                            style="max-width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </section>

    </body>

    </html>
@endsection
