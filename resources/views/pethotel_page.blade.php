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

        .ph-image {
            position: relative;
            overflow: hidden;
            width:260px;
            height: auto;
            margin: 0;
            transition: transform 0.3s ease-in-out;
        }

    .ph-image:hover {
        transform: scale(1.1);
    }

    .ph-image img {
        width: 250px;
        height: auto;
        transition: transform 0.3s ease-in-out;
    }

    .ph-image:hover img {
        transform: scale(1.2);
    }

    #fasilitas-ph h4 {
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
            var element = document.getElementById('pesanpethotel');
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
                                PET HOTEL
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="nav-link btn btn-warning text-black dropdown-item" href="{{route('grooming_page')}}">GROOMING</a></li>
                            </ul>
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
                                    <a class="nav-link" href="{{route('order_data')}}">Order</a>
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
                <div class="col-md-6 position-relative">
                    <h1 class="judul fw-bold mb-3" style="margin-left: 0;">
                        Apa itu Layanan Pet Hotel?</h1>
                    <h4 class="animate__animated animate__headShake" style="margin-left: 0; max-width:570px; text-align:justify;">
                        <strong> Pet Hotel </strong> adalah penginapan sementara untuk hewan peliharaan dengan fokus pada 
                        kenyamanan dan perawatan optimal. Kami juga memberikan perawatan khusus demi kesejahteraan dan kebahagiaan 
                        hewan peliharaan Anda.
                    </h4>
                    <br>
                    <h4 class="animate__animated animate__bounce" style="margin-left: 0; max-width:570px; text-align:justify;">
                        <strong> Pet Hotel </strong> memberikan pengalaman menginap yang aman dan menyenangkan bagi 
                        hewan peliharaan. 
                    </h4>
                    <br><br><br><br>
                    <button class="mx-auto btn btn-warning text-black fw-bold d-block judul pesan" onclick="scrollToForm()">Pesan Sekarang</button>
                </div>
        
                <div class="col-md-6 position-relative">
                    <img src="{{ asset('media/bg2.svg') }}" alt="bg2" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ph-image">
                                <img src="{{ asset('media/ph-1.svg') }}" alt="Ph Image 1" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ph-image">
                                <img src="{{ asset('media/ph-2.svg') }}" alt="Ph Image 2" class="img-fluid">
                            </div>
                        </div>
                    </div>
                
                    <div class="row mt-4">
                        <div class="col-md-6 position-relative" style="left: 50%; transform: translateX(-50%);">
                            <div class="ph-image">
                                <img src="{{ asset('media/ph-3.svg') }}" alt="Ph Image 3" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </section>
        
        

        <section id="fasilitas-ph" class="fasilitas-ph-container">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3">
                    Fasilitas Pet Hotel
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4><strong class="fw-bold text-warning">Orino Petshop And Vet
                    Clinic </strong> menawarkan penginapan khusus untuk hewan peliharaan Anda dengan 
                    perhatian dan kenyamanan maksimal. Pilihlah layanan penginapan kami yang sesuai dengan 
                    kebutuhan hewan peliharaan Anda:</h4>
    
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
                            <img src="{{ asset('media/syarat-1.svg') }}" alt="syarat-1"  class="d-inline w-25">
                          </div>
                          <div class="carousel-item" style="background-color: transparent !important">
                            <img src="{{ asset('media/syarat-2.svg') }}" alt="syarat-2"  class="d-inline w-25">
                          </div>
                          <div class="carousel-item" style="background-color: transparent !important">
                            <img src="{{ asset('media/syarat-3.svg') }}" alt="syarat-3"  class="d-inline w-25">
                          </div>
                          <div class="carousel-item" style="background-color: transparent !important">
                            <img src="{{ asset('media/syarat-4.svg') }}" alt="syarat-4"  class="d-inline w-25">
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
        
        <section id="pesan-ph" class="pesan-ph-container">
            <div style="text-align: center;">
                <h1 class="fw-bold mb-3" id="pesanpethotel">
                    Pesan Pet Hotel
                </h1>
                <div id="garis-bawah" class="garisbawah mb-4"></div>
                <br>
                <h4 class="text-center mb-4 justify-content-center fw-bold ">Untuk dapat memesan layanan pet hotel dapat mengisi form di bawah ini.</h4>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #FFEFB0">{{ __('Form Pet Hotel') }}</div>
        
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
                                        <label>Nama Kucing</label>
                                        <input type="text" name="nama hewan" placeholder="Nama Kucing Peliharaan" class="form-control" required><br>
                                    </div>  
        
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="kelamin" class="form-control" required>
                                            <option value="jantan">Jantan</option>
                                            <option value="betina">Betina</option>
                                        </select><br>
                                    </div>  

                                    <div class="form-group">
                                        <label>Usia</label>
                                        <input type="text" name="usia" placeholder="Usia Kucing" class="form-control" required><br>
                                    </div>  

                                    <div class="form-group">
                                        <label>Merk Pakan</label>
                                        <input type="text" name="perlengkapan" placeholder="Merk Makanan" class="form-control" required><br>
                                    </div>  

                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <input type="text" name="catatan" placeholder="Catatan" class="form-control" required><br>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Sertifikat Vaksin</label>
                                        <input type="file" name="image" class="form-control" required><br>
                                    </div>

                                    <div class="form-group">
                                        <label>File Medical Check Up H-1</label>
                                        <input type="file" name="image" class="form-control" required><br>
                                    </div>

                                    <div class="container text-center">
                                        <h2 class="fw-bold mt-3">PERSETUJUAN LAYANAN PET HOTEL</h2>
                                        <ul class="mx-auto" style="max-width: 680px;">
                                            <li class="mt-3 mx-auto">Dengan ini saya menyatakan bahwa saya 
                                                menyetujui kucing saya dititipkan, ditangani, dan dirawat oleh ORINO PET SHOP dalam keadaan sehat, 
                                                tidak berkutu dan sudah/belum divaksin, tidak sedang hamil, dan tidak agresif kepada manusia atau 
                                                hewan lain.</li>

                                                <li class="mt-3 mx-auto">Saya menyetujui hewan peliharaan saya dititipkan, 
                                                    ditangani, dan dirawat oleh ORINO PET SHOP tanpa membebankan tanggung jawab dan ganti rugi apapun 
                                                    kepada ORINO PET SHOP jika terjadi kerugian, sakit, dan kematian terhadap hewan peliharaan saya yang 
                                                    disebabkan oleh bencana alam, gempa bumi, kebakaran yang bersifat tidak bisa dicegah atau force majour.</li>

                                                    <li class="mt-3 mx-auto">Jika hewan peliharaan saya selama dalam masa penitipan mengalami gejala sakit 
                                                        dan atau tidak mampu beradaptasi, maka saya selaku pemilik bersedia dihubungi selama 1x24 jam, 
                                                        dan jika lebih dari jangka waktu tersebut saya tidak bisa dihubungi dan jika dirasa perlu tindakan 
                                                        medis maka dokter hewan di ORINO PETSHOP boleh melakukan tindakan medis sesuai SOP yang berlaku tanpa 
                                                        sepersetujuan saya terlebih dahulu, serta saya bersedia menanggung semua biaya yang timbul dari semua 
                                                        tindakan medis yang dilakukan.</li>    

                                                        <li class="mt-3 mx-auto">Saya bersedia untuk membayar DP sebesar 50% dari perkiraan total biaya 
                                                            titip sehat di ORINO PET SHOP.</li> 
                                        </ul>
            
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