<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/1f7457abdb.js"></script>
    <!-- JS -->
    <script src="../storage/js/header.js"></script>
    <title>Cinect</title>
    <link rel="stylesheet" href="../storage/css/general.css">
    <link rel="stylesheet" href="../storage/css/header.css">
    <link rel="stylesheet" href="../storage/css/footer.css">
</head>

<body>
    <!-- START HEADER -->
    <header class="navbar-dark fixed-top" id="navbar_top">
        <!-- START NAVBAR -->
        <nav class="navbar navbar-expand-xs">
            <div class="container-fluid">
                <div class="col-9">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand col-8 text-center" href="{{url('/')}}">Logo</a>
                </div>
                <div class="col-3 d-flex flex-direction-row flex-nowrap justify-content-end align-items-center">
                    <i class="fas fa-search text-light fs-4 p-0"></i>
                    <div class="dropdown">
                        <button class="btn text-light dropdown-toggle d-flex flex-direction-row flex-nowrap justify-content-end align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle fs-4 pe-1"></i> <p class="d-none d-sm-flex m-0">Usuario</p>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i>Perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-list"></i>Mis listas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i>Cerrar sessión</a></li>
                        </ul>
                    </div>
                </div>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                    aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div class="offcanvas-header">
                        <h1 class="offcanvas-title text-uppercase" id="offcanvasWithBothOptionsLabel">Menu</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <ul class="list-unstyled text-dark">
                            <li>
                                <a href="{{url('/')}}" class="footer-links text-light text-uppercase fs-3"><i class="fas fa-home pe-2"></i>Home</a>
                            </li>
                            <li>
                                <a href="{{url('/contentFilms')}}" class="footer-links text-light text-uppercase fs-3"><i class="fas fa-film pe-2 fa-2x"></i>Películas</a>
                            </li>
                            <li>
                                <a href="{{url('/contentSeries')}}" class="footer-links text-light text-uppercase fs-3"><i class="fas fa-tv pe-2"></i>Series</a>
                            </li>
                            <li>
                                <a href="{{url('/contentAnimes')}}" class="footer-links text-light text-uppercase fs-3"><i class="fas fa-dragon pe-2"></i>Anime</a>
                            </li>
                            <li>
                                <a href="{{url('/top')}}" class="footer-links text-light text-uppercase fs-3"><i class="fas fa-sort-amount-up-alt pe-2"></i>Top</a>
                            </li>
                            <li>
                                <a href="{{url('/search')}}" class="footer-links text-light text-uppercase fs-3"><i class="fas fa-search pe-2"></i>Buscador</a>
                            </li>
                            <li>
                                <a href="{{url('/list')}}" class="footer-links text-light text-uppercase fs-3"><i class="fas fa-th-list pe-2"></i>Mis Listas</a>
                            </li>
                            <li>
                                <a href="{{url('/aboutUs')}}" class="footer-links text-light text-uppercase fs-3"><i class="fas fa-user pe-2"></i>Sobre Nosotros</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
    </header>
    
    <!-- END HEADER -->
    <!-- START MAIN -->
    <main>
        @yield('content')
    </main>
    <!-- END MAIN -->

    <!-- START FOOTER -->
    <footer class="footer text-center text-white">
        <div class="container-fluid p-4">
            
            <!-- SECTION: LINKS -->
            <section class="d-flex justify-content-center mb-2">
                <div class="d-inline-block col-12">
                    <h5 class="text-uppercase fs-4">Links</h5>
                        <a href="{{url('/')}}" class="footer-links text-white fs-5">Home</a>
                        <a href="{{url('/content')}}" class="footer-links text-white fs-5">Películas</a>
                        <a href="{{url('/content')}}" class="footer-links text-white fs-5">Series</a>
                        <a href="{{url('/content')}}" class="footer-links text-white fs-5">Anime</a>
                        <a href="{{url('/top')}}" class="footer-links text-white fs-5">Top</a>
                        <a href="{{url('/search')}}" class="footer-links text-white fs-5">Buscador</a>
                        <a href="{{url('/list')}}" class="footer-links text-white fs-5">Mis Listas</a>
                        <a href="{{url('/aboutUs')}}" class="footer-links text-white fs-5">Sobre Nosotros</a>
                </div>
            </section>
            <!-- SECTION: LINKS -->
            <!-- SECTION: SOCIAL MEDIA -->
            <section class="">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1 fs-5" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>
    
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1 fs-5" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>
    
                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1 fs-5" href="#!" role="button"><i
                        class="fab fa-google"></i></a>
    
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1 fs-5" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>
    
                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1 fs-5" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>
    
                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1 fs-5" href="#!" role="button"><i
                        class="fab fa-github"></i></a>
            </section>
            <!-- SECTION: SOCIAL MEDIA -->
        </div>
        
        <!-- COPYRIGHT -->
        <div class="copyright text-center p-3">
            © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- COPYRIGHT -->
    </footer>
    <!-- END FOOTER -->
</body>

</html>