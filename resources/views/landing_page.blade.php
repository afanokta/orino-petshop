<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Orino Petshop') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Referensi Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Styles -->
    <style>
    
    section {
        padding-top: 64px;
        position: relative;
    }

    section::before {
        z-index: -1;
        content: '';
        font-size: 64px;
        color: grey;
        opacity: 0.25;
        position: absolute;
        font-weight: 600;
        top: 20px;
        left: -10px;
    }

    .navbar .nav-link:hover {
        font-weight: bold;
    }

    .btn.button {
        border: 3px solid black;
        border-radius: 24px;
    }

    .btn.button:hover, .btn.button.active {
        border: 3px solid black;
        background-color: #000000;
        color: whitesmoke;
    }

    .fade-in {
        opacity: 0;
        animation: fadeInAnimation 3s ease-in-out forwards;
    }

    @keyframes fadeInAnimation {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes bounceAnimation {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }

    .animated-bounce {
        animation: bounceAnimation 4s ease-in-out infinite;
    }

    
    .navbar {
        box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.25);
    }

        .navbar-nav .nav-item .nav-link.btn:hover,
        .navbar-nav .nav-item .nav-link.btn:active,
        .navbar-nav .nav-item .nav-link.btn:focus {
            background-color: #FFCC00 !important;
        }

        .tentang-kami-container a.arrow {
        animation: 2.5s upDown infinite;
        }

        @keyframes upDown {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        .persegi1 {
            position: absolute;
            z-index: -1;
            right: 0;
            width: 280px;
            height: auto;
        }

        .persegi2 {
            position: absolute;
            z-index: -1;
            left: 0;
            width: 280px;
            height: auto;
        }

        .garisbawah {
            height: 5px;
            width: 140px;
            background-color: #1291a1;
            margin: 0 auto;
        }

        .foto-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin-top: 20px;
        }

        .foto {
            width: 160px;
            height: 160px;
            object-fit: cover;
            margin-top: 20px;
        }

        .foto-item {
            text-align: center;
        }

        .teks-foto {
            margin-top: 10px;
        }

        .teks-container {
            text-align: left;
            max-width: 300px;
        }

        #tentang-kami h4 {
        text-align: justify;
        margin: 0 auto;
        max-width: 850px;
        }

        .layanan-kami-text {
        text-align: justify;
        margin: 0 auto;
        max-width: 850px;
        }

        #layanan-kami h5 {
        text-align: justify;
        margin: 0 auto;
        max-width: 600px;
        }

        .bounce {
        animation: bounceAnimation 5s infinite;
        }

        @keyframes bounceAnimation {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        .animate__animated.animate__bounce {
            --animate-duration: 2s;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.7);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .pulse {
            animation: pulse 0.5s;
        }

        .carousel-control-prev, .carousel-control-next {
            background-color: #202020;
            width: auto;
            font-size: 24px;
            border-radius: 0;
            top: 50%;
            transform: translateY(-50%);
            position: absolute;
        }

        .carousel-control-prev {
            left: 0;
            transform: translateX(100%);
        }

        .carousel-control-next {
            right: 0;
            transform: translateX(-100%);
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: #202020;
            color: #333;
            border-radius: 15px;
            padding: 10px; 
        }

        .service-item-grooming-detail {
            display: none;
            padding: 10px;
            max-height: 405px;
            background-color: #ffffff;
            border: 4px solid #ddd;
            border-radius: 10px;
            margin-top: 40px;
            box-shadow: 0 2px 4px rgba(245, 230, 186, 0.1);
        }

        .service-item-grooming-detail li {
            list-style-type: none;
            margin-bottom: 10px;
        }

        .service-item-grooming-detail li::before {
            content: '\2022';
            color: #0f65c6;
            font-size: 1.5em;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        .service-item-grooming-detail img {
            width: 100%;
            max-width: 180px;
            height: auto;
            transition: transform 0.4s ease-in-out;
        }

        .service-item-grooming-detail img:hover {
            transform: scale(1.3);
        }

        .service-item-ph-detail {
            display: none;
            padding: 10px;
            max-height: 660px;
            background-color: #ffffffde;
            border: 4px solid #ddd;
            border-radius: 10px;
            margin-top: 40px;
            box-shadow: 0 2px 4px rgba(245, 230, 186, 0.1);
        }

        .service-item-ph-detail li {
            list-style-type: none;
            margin-bottom: 10px;
        }

        .service-item-ph-detail li::before {
            content: '\2022';
            color: #FFCC00;
            font-size: 1.5em;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        .service-item-ph-detail img {
            width: 100%;
            max-width: 180px;
            height: auto;
            transition: transform 0.4s ease-in-out;
            position: relative;
        }

        .service-item-ph-detail img:hover {
            transform: scale(1.3);
        }

        .contact-container {
            padding: 24px;
        }

        .contact-form {
            border: 1px solid black;
            padding: 32px 32px;
            border-radius: 24px;
            background-color: #e9f1fb;
        }

        .form-label {
            font-weight: 500;
        }

        .contact {
            padding-bottom: 128;
        }

        .row .col p {
            text-align: justify;
        }

        .row .sosmed {
            width: 40px;
            height: 40px;
        }

        .sosmed-detail {
            margin-left: 10px;
            align-items: center;
        }

        .sosmed-detail .col:hover img {
            opacity: 1;
            transform: scale(1.2);
        }

        .sosmed-detail .col-auto:hover img {
            opacity: 1;
            transform: scale(1.2);
        }

        .sosmed-detail .col:hover p {
            text-decoration: underline;
        }

        .wa-sticky {
            position: fixed;
            bottom: 20px;
            right: 10px;
            z-index: 100;
            transition: transform 0.4s ease; 
            }

        .wa-sticky:hover {
            transform: scale(1.5); 
            }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 4px;
            color: #343a40;
        }

    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function toggleDetailGrooming(ev) {
            const target = $(ev.target);
            const item = target.closest(".foto-item");
            const detailGrooming = item.find(".service-item-grooming-detail");

            if (target.hasClass("active")) {
                target.html("Expand").removeClass("active");
                detailGrooming.slideUp();
            } else {
                target.html("Close").addClass("active");
                detailGrooming.slideDown();
            }
        }

        $(document).ready(function () {
            $(".service-item-grooming-detail").hide();
        });

        function toggleDetailPh(ev) {
            const target = $(ev.target);
            const item = target.closest(".foto-item");
            const detailPh = item.find(".service-item-ph-detail");

            if (target.hasClass("active")) {
                target.html("Expand").removeClass("active");
                detailPh.slideUp();
            } else {
                target.html("Close").addClass("active");
                detailPh.slideDown();
            }
        }

        $(document).ready(function () {
            $(".service-item-ph-detail").hide();
        });

        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
                if (n < 1) { slideIndex = slides.length }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
        }
        function onFormSubmit(ev) {
            ev.preventDefault()
            const email = $("#inp-email")
            const phone = $("#inp-phone")
            const subject = $("#inp-subject")
            const message = $("#inp-message")

            if(!$(email).val()) {
                alert("email is required")
            }else if(!$(phone).val()){
                alert("Phone is required")
            }else if(!$(subject).val()){
                alert("subject is required")
            }else if(!$(message).val()){
                alert("message is required")
            }else {
                $(email).val("")
                $(phone).val("")
                $(subject).val("")
                $(message).val("")
                alert("Form has submitted")
            }
        }
    </script>

</head>
<body style="background: linear-gradient(to bottom, #fdf9e5, rgba(255, 242, 176, 0));">
    <nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
        <div class="container">
            <a class="navbar-brand fs-4 fw-bold" href="#header" style="color: #f9ca0f;">
                <img src="{{asset('media/orino-logo.svg')}}" alt="orino-logo"
                style="width: 45px; height: auto;">
                Orino Petshop and Vet Clinic
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ps-3">
                        <a class="nav-link btn btn-warning text-black" aria-current="page" href="#tentang-kami">TENTANG KAMI</a>
                    </li>
                    <li class="nav-item dropdown ps-3">
                        <a class="nav-link btn btn-warning text-black dropdown-toggle" href="#layanan-kami" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                            LAYANAN KAMI
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="nav-link btn btn-warning text-black dropdown-item" href="{{route('grooming_page')}}">GROOMING</a></li>
                            <li><a class="nav-link btn btn-warning text-black dropdown-item" href="{{route('pethotel_page')}}">PET HOTEL</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ps-3">
                        <a class="nav-link btn btn-warning text-black" href="{{route('index_order')}}">ORDER</a>
                    </li>
                    <li class="nav-item ps-3">
                        <a class="nav-link btn btn-warning text-black" href="#feedback">FEEDBACK</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning text-black" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning text-black" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    {{-- @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('create_product')}}">Create Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('order_data')}}">List Order</a>
                        </li>
                    @endif --}}
                    <li class="nav-item ps-2">
                        <a class="nav-link btn btn-warning text-black" href="{{route('show_profile')}}">Profile</a>
                    </li>
                    <li class="nav-item ps-2">
                        <a class="nav-link btn btn-warning text-black" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <img src="{{ asset('media/bg1.svg') }}" alt="bg1" style="margin-bottom: 0;
                        padding: 0;
                        width: 400px;
                        height: 500px;
                        z-index: -2;
                        position: absolute;
                        right: 0;
                        top:0;">

        <img src="{{asset('media/rec-2.svg')}}" alt="rectangle2" class="persegi2">
                    
    <section  class="tentang-kami-container">
        <div class="container">
            <div class="row d-flex align-items-center flex-md-row flex-column-reverse">
                <div class="col-12 col-md-3 mt-2 mt-md-0">
                    <div class="circle-container">
                        <img src="{{ asset('media/cat-1.svg') }}" alt="Kucing Pertama"
                        style="width: 300px; height: 300px;" class=" animated-bounce">
                    </div>

                </div>
                <div class="col-12 col-md-8">
                    <h1 class="fw-bold mb-3 animated-bounce" id="header" style="margin-left: 0;">
                        Penuhi Kebutuhan Hewan Peliharaan Anda!</h1>
                    <h3 class="animate__animated animate__bounce" style="margin-left: 0;
                    max-width:680px; text-align:justify;">Selamat datang di <strong class="fw-bold text-warning"> Orino
                        Petshop And Vet Clinic. </strong>
                        Temukan kehangatan dan perawatan yang tak terlupakan untuk teman berbulu anda.
                        Kami hadir untuk memastikan kebahagiaan dan kenyamanan maksimal
                        bagi hewan peliharaan anda.</h3>
                </div>
            </div>
            <br><br>
            <a href="#tentang-kami"class="text-decoration-none arrow w-100 d-flex align-items-center
            flex-column mt-5">
                <div class="text-dark">Find More</div>
                <img src="{{asset('media/arrow.svg')}}" alt="arrow icon">
            </a>
        </div>
    </section>

    <section id="tentang-kami" class="tentang-kami-container">
        <img src="{{asset('media/rec-1.svg')}}" alt="rectangle1" class="persegi1">
        <div style="text-align: center;">
            <h1 class="fw-bold mb-3">
                Orino Petshop
            </h1>
            <div id="garis-bawah" class="garisbawah mb-4"></div>
            <br>
            <h4><strong class="fw-bold text-warning">Orino Petshop And Vet
                Clinic </strong> hadir untuk memenuhi kebutuhan hewan peliharaan Anda. Tersedia layanan grooming,
                pet hotel dan pakan untuk hewan peliharaan. Dengan layanan grooming berkualitas tinggi
                juga bervariasi dan penginapan yang nyaman
                bagi anabul. Orino Petshop, tempat di mana kebahagiaan hewan
                peliharaan dimulai. Layanan kami akan memberikan kenyamanan
                dan keamanan untuk mereka.</h4>

                <div id="demo" class="carousel slide mt-4" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators mb-4">
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>
                  
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                      <div class="carousel-item active" style="background-color: transparent !important">
                        <img src="{{ asset('media/kami-1.svg') }}" alt="syarat-1"  class="d-inline w-50">
                        <div class="fw-bold text-secondary mt-2">Tersedia Makanan Kucing dan Anjing</div>
                      </div>
                      <div class="carousel-item pulse" style="background-color: transparent !important">
                        <img src="{{ asset('media/kami-2.svg') }}" alt="syarat-2"  class="d-inline w-50">
                        <div class="fw-bold text-secondary mt-2">Tersedia Layanan Grooming Kucing</div>
                      </div>
                      <div class="carousel-item pulse" style="background-color: transparent !important">
                        <img src="{{ asset('media/kami-3.svg') }}" alt="syarat-3"  class="d-inline w-50">
                        <div class="fw-bold text-secondary mt-2">Tersedia Layanan Pet Hotel Kucing</div>
                      </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                  </div>
            </div>
        </section>

    <section id="layanan-kami" class="layanan-kami-container">
        <img src="{{asset('media/rec-2.svg')}}" alt="rectangle2" class="persegi2">
        <div style="text-align: center;">
            <h1 class="fw-bold mb-3">
                Layanan Kami
            </h1>
            <div id="garis-bawah" class="garisbawah mb-4"></div>
            <br>
            <h4 class="layanan-kami-text">
                Jadikan pengalaman perawatan hewan peliharaan Anda istimewa
                dengan layanan <strong>Grooming</strong> kami yang penuh kasih sayang, memberikan sentuhan
                kecantikan dan kesehatan yang tak terlupakan. Berikan mereka kenyamanan tempat
                dengan fasilitas <strong>Pet Hotel</strong> kami, tempat di mana kenyamanan dan
                kebahagiaan hewan peliharaan menjadi prioritas utama.
            </h4>
        </div>
        <img src="{{ asset('media/bg3.svg') }}" alt="bg1" style="margin-bottom: 0;
                padding: 0;
                width: 400px;
                height: 500px;
                z-index: -2;
                position: absolute;
                left: 0;
                animation: fadeInAnimation 2s ease-in-out forwards">

        <div class="foto-container">
            <div class="foto-item bounce">
                <img src="{{ asset('media/g1.svg') }}" alt="grooming1"
                class="hidden fadeInOnScroll" style="width: 160px; height: 160px; margin-top: 180px;">
                <img src="{{ asset('media/cat-2.svg') }}" alt="Kucing Pertama"
                class="hidden fadeInOnScroll" style="width: 180px; height: 180px; margin-top: 20px;">
                <img src="{{ asset('media/g2.svg') }}" alt="grooming2"
                class="hidden fadeInOnScroll" style="width: 160px; height: 160px; margin-top: 180px;">
                <h4 class="teks-foto fw-bold">Grooming</h4>
                <h5 style="max-width: 300px; text-align: center;">Tersedia berbagai
                    jenis layanan <strong>grooming</strong> dengan tingkatan yang berbeda</h5>
                <button class="service-item btn button" style="margin-top:30px;"
                onclick="toggleDetailGrooming(event)">Expand</button>
                <div class="service-item-grooming-detail">
                    <h3 class="fw-bold" style="color: #0f65c6">Jenis Grooming</h3>
                    <h5 class="jenis-grooming fw-bold text-center">
                    <ul>
                        <li>Grooming Biasa</li>
                        <li>Grooming Kutu</li>
                        <li>Grooming Jamur</li>
                        <li>Grooming Komplit</li>
                        <a href="{{route('grooming_page')}}">
                        <img src="{{ asset('media/grooming-icon.svg') }}"
                        alt="Grooming Icon"></a>
                    </ul>
                    </h5>
                </div>
            </div>

            <div class="foto-item bounce">
                <img src="{{ asset('media/ph1.svg') }}" alt="pethotel1"
                class="hidden fadeInOnScroll" style="width: 160px; height: 160px; margin-top:160px;">
                <img src="{{ asset('media/pet hotel.svg') }}" alt="Pet Hotel"
                class="hidden fadeInOnScroll" style="width: 180px; height: 180px; margin-top:20px;">
                <img src="{{ asset('media/ph2.svg') }}" alt="pethotel2"
                class="hidden fadeInOnScroll" style="width: 160px; height: 160px; margin-top:180px;">
                <h4 class="teks-foto fw-bold">Pet Hotel</h4>
                <h5 style="max-width: 300px; text-align: center;">Tersedia layanan <strong>pet hotel</strong>
                    untuk tempat menginap sementara hewan peliharaan</h5>
                <button class="service-item btn button" style="margin-top:30px;"
                onclick="toggleDetailPh(event)">Expand</button>
                <div class="service-item-ph-detail">
                    <h3 class="fw-bold text-warning">Fasilitas Pet Hotel</h3>
                    <h5 class="fasilitas-pethotel fw-bold text-center" style="max-width: 400px;">
                    <ul>
                        <li>Kandang Alumunium 2 Lantai</li>
                        <li>Medical Check Up</li>
                        <li>Litter Box & Pasir</li>
                        <li>Air Minum</li>
                        <li>Free Grooming Minimal 10 Hari</li>
                        <li>Pengawasan Setiap Hari</li>
                        <li>Kotoran Bekas Air Mata Selalu Dibersihkan</li>
                        <li>Laporan Kondisi Hewan Via Whatsapp</li>
                        <li>Bisa Request Jadwal Makan Kucing (Misalnya: Pagi Dry Food,
                            Siang Wet Food, dll)
                        </li>
                        <a href="{{route('pethotel_page')}}">
                            <img src="{{ asset('media/ph-icon.svg') }}"
                            alt="PH Icon"></a>
                    </ul>
                    </h5>
                </div>
            </div>
        </div>
    </section>

    <section id="feedback" class="contact-container mt-4">
        <img src="{{asset('media/rec-1.svg')}}" alt="rectangle1" class="persegi1">
        <div style="text-align: center;">
            <h1 class="fw-bold mb-3">
                Feedback
            </h1>
            <div id="garis-bawah" class="garisbawah mb-4"></div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-6">
            <form class="contact-form ms-4" onsubmit="onFormSubmit(event)">
              <div class="mb-3">
                <label for="inp-email" class="form-label fw-bold">Email address</label>
                <input type="email" class="form-control" id="inp-email" placeholder="example@gmail.com">
              </div>
              <div class="mb-3">
                <label for="inp-phone" class="form-label fw-bold">Phone Number</label>
                <input type="text" class="form-control" id="inp-phone" placeholder="Nomor HP">
              </div>
              <div class="mb-3">
                <label for="inp-password" class="form-label fw-bold">Subject</label>
                <input type="text" class="form-control" id="inp-password" placeholder="Subject">
              </div>
              <div class="mb-3">
                <label for="inp-message" class="form-label fw-bold">Message</label>
                <input type="text" class="form-control" id="inp-message" placeholder="Pesan">
              </div>
              <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn button">Submit</button>
              </div>
            </form>
          </div>
          <div class="col-12 col-lg-5">
            <p class="contact-detail mt-5 p-md-5 text-center fw-bold">Berikan Kami feedback atau masukkan
                untuk membantu kami dalam meningkatkan kualitas layanan. Feedback yang Anda berikan sangat
                berpengaruh bagi kami untuk kedepannya.</p>
          </div>
        </div>
      </section>

      <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 style="color: #000000">Tentang Kami</h5>
                    <p style="text-align: justify; max-width:570px;">Orino Petshop And Vet Clinic hadir untuk
                        memenuhi kebutuhan hewan peliharaan Anda.
                        Kami berkomitmen untuk memberikan kenyamanan dan keamanan bagi teman-teman berbulu Anda.</p>
                </div>
                <div class="col-md-6">
                    <h5 style="color: #000000" class="ms-4">Hubungi Kami</h5>
                    <div class="row d-flex align-items-center gap-3 sosmed-detail">

                        <div class="col d-flex align-items-center" id="maps-icon">
                            <a href="https://maps.app.goo.gl/KYrnMsjcFjZgmwhQA" target="_blank">
                                <img class="sosmed ms-4" src="{{asset('media/maps-logo.svg')}}"
                                alt="maps-logo" style="width: 40px; height:auto;">
                            </a>
                            <p class="mb-0 ms-2 fw-bold">Gmaps</p>
                        </div>

                        <div class="col d-flex align-items-center" id="maps-icon">
                            <a href="https://maps.app.goo.gl/KYrnMsjcFjZgmwhQA" target="_blank">
                                <img class="sosmed ms-4" src="{{asset('media/grabmart.svg')}}"
                                alt="maps-logo" style="width: 40px; height:auto;">
                            </a>
                            <p class="mb-0 ms-2 fw-bold">Grab Mart</p>
                        </div>

                        <div class="col d-flex align-items-center" id="maps-icon">
                            <a href="https://maps.app.goo.gl/KYrnMsjcFjZgmwhQA" target="_blank">
                                <img class="sosmed ms-4" src="{{asset('media/tokped.svg')}}"
                                alt="maps-logo" style="width: 40px; height:auto;">
                            </a>
                            <p class="mb-0 ms-2 fw-bold">Tokopedia</p>
                        </div>
                        
                        <div class="col d-flex align-items-center" id="orino-logo">
                            <a href="https://www.instagram.com/orinopetshop/" target="_blank">
                                <img class="sosmed ms-4" src="{{asset('media/ig-logo.svg')}}"
                                alt="ig-logo" style="width: 40px; height:auto;">
                            </a>
                            <p class="mb-0 ms-2 fw-bold">@orinopetshop</p>
                        </div>

                        <div class="col-auto d-flex align-items-center" id="whatsapp-icon">
                            <a href="https://wa.me/6281230697181?text=Halo,%20Kak" target="_blank">
                                <img class="sosmed me-2" src="{{asset('media/whatsapp-logo.svg')}}"
                                alt="whatsapp-logo" style="width: 40px; height:auto;">
                            </a>
                            <div class="d-flex flex-column">
                                <a class="mb-0 fw-bold" href="https://wa.me/6281230697181?text=Halo,%20Kak">
                                    +62-812-3069-7181</a>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
            <a href="https://wa.me/6281230697181?text=Halo,%20Kak" target="_blank">
                <img class="wa-sticky me-3" src="{{asset('media/wa_sticky.svg')}}"
                alt="whatsapp-logo" style="width: 80px; height:auto; position:fixed; right:10px; bottom:20px; z-index:100;">
            </a>
            <footer class="text-center mt-3">&copy; Copyright 2024 Orino Petshop</footer>
        </footer>
</body>
</html>
