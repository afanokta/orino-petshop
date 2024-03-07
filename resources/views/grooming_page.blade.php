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

    .navbar {
        box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.25);
    }

        .navbar-nav .nav-item .nav-link.btn:hover,
        .navbar-nav .nav-item .nav-link.btn:active,
        .navbar-nav .nav-item .nav-link.btn:focus {
            background-color: #FFCC00 !important;
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
            transform: scale(1.1);
        }

        .sosmed-detail .col-auto:hover img {
            opacity: 1;
            transform: scale(1.1);
        }

        .sosmed-detail .col:hover p {
            text-decoration: underline;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 4px;
            color: #343a40;
        }
    
        .judul {
        animation: 2.5s upDown infinite;
        }

        .judul.pesan {
        animation: 2.5s upDown infinite;
        font-size: 20px;
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

        .grooming-image {
        position: relative;
        overflow: hidden;
        width:260px;
        height: auto;
        margin: 0;
        transition: transform 0.3s ease-in-out;
    }

    .grooming-image:hover {
        transform: scale(1.1);
    }

    .grooming-image img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease-in-out;
    }

    .grooming-image:hover img {
        transform: scale(1.2);
    }

    #jenis-grooming h4 {
        text-align: justify;
        margin: 0 auto;
        max-width: 850px;
        }

    .garisbawah {
        height: 5px;
        width: 140px;
        background-color: #1291a1;
         margin: 0 auto;
    }

        @keyframes headShake {
            0% {
                transform: translateX(0);
            }
            6.5% {
                transform: translateX(-6px) rotateY(-9deg);
            }
            18.5% {
                transform: translateX(5px) rotateY(7deg);
            }
            31.5% {
                transform: translateX(-3px) rotateY(-5deg);
            }
            43.5% {
                transform: translateX(2px) rotateY(3deg);
            }
            50% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(0);
            }
    }

    .headShake {
    animation: headShake infinite;
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
            transform: translateX(180%);
        }

        .carousel-control-next {
            right: 0;
            transform: translateX(-180%);
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: #202020;
            color: #333;
            border-radius: 15px;
            padding: 10px; 
        }

    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function scrollToForm() {
        var element = document.getElementById('pesangrooming');
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    </script>
    </head>

    <body style="background: linear-gradient(to bottom, #fdf9e5, rgba(255, 242, 176, 0));">
        <nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
            <div class="container">
                <a class="navbar-brand fs-4 fw-bold" href="{{route('landing_page')}}" style="color: #f9ca0f;">
                    <img src="{{asset('media/orino-logo.svg')}}" alt="orino-logo" style="width: 45px; height: auto;">
                    Orino Petshop and Vet Clinic
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="mx-auto navbar-nav">
                        <li class="nav-item ps-3">
                            <a class="nav-link btn btn-warning text-black" aria-current="page" href="{{route('landing_page')}}#tentang-kami">BERANDA</a>
                        </li>
                        <li class="nav-item dropdown ps-3">
                            <a class="nav-link btn btn-warning fw-bold text-black dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                GROOMING
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="nav-link btn btn-warning text-black dropdown-item" href="{{route('pethotel_page')}}">PET HOTEL</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link btn btn-warning text-black" href="{{route('index_order')}}">ORDER</a>
                        </li>
                    </ul>
        
                    <ul class="navbar-nav">
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
                                    <a class="nav-link" href="{{route('create_product')}}">Buat Jadwal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('order_data')}}">Order Grooming</a>
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
            </div>
        </nav>
        

        <section class="container">
            <div class="row">
                <!-- Kolom Kiri (Gambar) -->
                <div class="col-md-6 position-relative">
                    <img src="{{ asset('media/bg2.svg') }}" alt="bg2" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="grooming-image">
                                <img src="{{ asset('media/grooming-cat.svg') }}" alt="Grooming Image 1" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="grooming-image">
                                <img src="{{ asset('media/grooming-cat-2.svg') }}" alt="Grooming Image 2" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="grooming-image">
                                <img src="{{ asset('media/grooming-cat-3.svg') }}" alt="Grooming Image 3" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="grooming-image">
                                <img src="{{ asset('media/grooming-cat-4.svg') }}" alt="Grooming Image 4" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Kolom Kanan (Teks Penjelasan) -->
                <div class="col-md-6">
                    <h1 class="judul fw-bold mb-3" style="margin-left: 0;">
                        Apa itu Layanan Grooming?</h1>
                    <h4 class="animate__animated animate__headShake" style="margin-left: 0;
                    max-width:680px; text-align:justify;">
                        <strong> Grooming </strong> merupakan praktik membersihkan, menata, dan merawat hewan peliharaan. 
                        Perawatan ini adalah bagian penting dari memelihara hewan peliharaan karena bertujuan agar 
                        hewan peliharaan tersebut tetap bersih dan sehat.
                    </h4>
                    <br>
                    <h4 class="animate__animated animate__bounce" style="margin-left: 0;
                    max-width:680px; text-align:justify;">
                        <strong> Grooming </strong> juga dapat menjadi kesempatan yang baik bagi kamu dan hewan 
                        peliharaan untuk menjalin ikatan batin dan mengajarinya beberapa kebiasaan perawatan yang penting.
                    </h4>
                    <br><br><br><br>
                    <button class="mx-auto btn btn-warning text-black fw-bold d-block judul pesan" 
                    onclick="scrollToForm()">Pesan Sekarang</button>

                </div>
            </div>
        </section>
        

        <section id="jenis-grooming" class="jenis-grooming-container">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3">
                    Jenis Grooming
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4><strong class="fw-bold text-warning">Orino Petshop And Vet
                    Clinic </strong> menyediakan berbagai jenis layanan grooming untuk memastikan kesehatan dan 
                    kebersihan hewan peliharaan Anda. Pilihlah dari empat varian grooming berikut sesuai kebutuhan:</h4>

                    <div id="demo" class="carousel slide mt-4" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                          <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                        </div>
                      
                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                          <div class="carousel-item active" style="background-color: transparent !important">
                            <h4 class="fw-bold text-center mb-2">Rp 35.000</h4>
                            <img src="{{ asset('media/g-biasa.svg') }}" alt="grooming pertama"  class="d-inline w-25">
                          </div>
                          <div class="carousel-item" style="background-color: transparent !important">
                            <h4 class="fw-bold text-center mb-2">Rp 50.000</h4>
                            <img src="{{ asset('media/g-kutu.svg') }}" alt="grooming kedua"  class="d-inline w-25">
                          </div>
                          <div class="carousel-item" style="background-color: transparent !important">
                            <h4 class="fw-bold text-center mb-2">Rp 50.000</h4>
                            <img src="{{ asset('media/g-jamur.svg') }}" alt="grooming ketiga"  class="d-inline w-25">
                          </div>
                          <div class="carousel-item" style="background-color: transparent !important">
                            <h4 class="fw-bold text-center mb-2">Rp 65.000</h4>
                            <img src="{{ asset('media/g-komplit.svg') }}" alt="grooming keempat"  class="d-inline w-25">
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
        
        <section id="jenis-grooming" class="jenis-grooming-container">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3" id="pesangrooming">
                    Pesan Grooming
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4 class="text-center mb-4 justify-content-center fw-bold ">Untuk dapat memesan layanan grooming dapat mengisi form di bawah ini.</h4>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #FFEFB0">{{ __('Form Grooming') }}</div>
        
                            <div class="card-body">
                                <form id="groomingForm" action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Pemilik</label>
                                        <input type="text" name="name" placeholder="Nama" class="form-control" required><br>
                                    </div>
        
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" placeholder="Alamat" class="form-control" required><br>
                                    </div>
        
                                    <div class="form-group">
                                        <label>No.HP</label>
                                        <input type="text" name="hp" placeholder="0821..." class="form-control" required><br>
                                    </div>
        
                                    <div class="form-group">
                                        <label>Nama Hewan</label>
                                        <input type="text" name="nama hewan" placeholder="Nama Hewan Peliharaan" class="form-control" required><br>
                                    </div>  
        
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="kelamin" class="form-control" required>
                                            <option value="jantan">Jantan</option>
                                            <option value="betina">Betina</option>
                                        </select><br>
                                    </div>  

                                    <div class="form-group">
                                        <label>Sinyalement</label>
                                        <input type="text" name="kelamin" placeholder="Jenis Kelamin Hewan" class="form-control" required><br>
                                    </div>  

                                    <div class="form-group">
                                        <label>Perlengkapan yang Dibawa</label>
                                        <input type="text" name="perlengkapan" placeholder="Perlengkapan" class="form-control" required><br>
                                    </div>  

                                    <div class="form-group">
                                        <label>Jenis Grooming</label>
                                        <select name="grooming" class="form-control" required>
                                            <option value="biasa">Grooming Biasa</option>
                                            <option value="kutu">Grooming Kutu</option>
                                            <option value="jamur">Grooming Jamur</option>
                                            <option value="komplit">Grooming Komplit</option>
                                        </select><br>
                                    </div>  

                                    <div class="form-group">
                                        <label>Catatan Groomer</label>
                                        <input type="text" name="catatan" placeholder="Catatan Untuk Groomer" class="form-control" required><br>
                                    </div>  

                                    <div class="container text-center">
                                        <h2 class="fw-bold mt-3">PERSETUJUAN LAYANAN GROOMING</h2>
                                        <p class="mt-3 mx-auto" style="max-width: 525px;">Dengan ini saya menyatakan bahwa hewan peliharaan saya yang tersebut di atas
                                            <strong> tidak sedang sakit, baru sembuh sakit atau tidak sedang hamil/menyusui.</strong></p>

                                            <p class="mx-auto" style="max-width: 525px;"><strong>Saya menyetujui dan memberi kuasa penuh kepada 
                                                Orino Petshop untuk melakukan prosedur grooming hewan yang dianggap perlu dan sesuai dengan paket 
                                                grooming yang saya pilih untuk hewan tersebut di atas.</strong></p>
            
                                            <div class="form-group form-check d-flex align-items-center gap-2 justify-content-center">
                                                <input type="checkbox" class="form-check-input" id="setujuCheck" required style="margin-right: 5px;">
                                                <label class="form-check-label mt-1" for="setujuCheck">Setuju</label>
                                            </div>
                                            <script>
                                                document.getElementById('groomingForm').addEventListener('input', function () {
                                                var allFieldsFilled = true;
                                                var formFields = this.querySelectorAll('input[required], select[required]');
                                                formFields.forEach(function (field) {
                                                    if (!field.value.trim() || (field.type === 'checkbox' && !field.checked)) {
                                                        allFieldsFilled = false;
                                                    }
                                                });

                                                var setujuCheck = document.getElementById('setujuCheck');
                                                var submitBtn = document.getElementById('submitBtn');
                                                
                                                if (allFieldsFilled && setujuCheck.checked) {
                                                    submitBtn.removeAttribute('disabled');
                                                } else {
                                                    submitBtn.setAttribute('disabled', 'true');
                                                }
                                            });
                                            </script>
                                        <button type="submit" class="btn btn-primary mt-3" id="submitBtn" disabled>Submit Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
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
                <footer class="text-center mt-3">&copy; Copyright 2024 Orino Petshop</footer>
            </footer>
    </body>
</html>