@extends('headerFooter')
@section('content')

<head>
    <link rel="stylesheet" href="../storage/css/home.css">
</head>
<section class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item full active">
                <img class="full-img" src="{{url('storage/img/SquidGame.jpg')}}" alt="">
            </div>
            <div class="carousel-item full">
                <img class="full-img" src="{{url('storage/img/uncharted.jpg')}}" alt="">
            </div>
            <div class="carousel-item full">
                <img class="full-img" src="{{url('storage/img/Kimetsu.jpg')}}" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="section-content container-fluid">


    <!-- PELÍCULAS -->
    <h5>PELÍCULAS</h5>
    <div class="container-fluid d-flex flex-row align-items-center">
        <a class="btn-floating" href="#films" data-bs-slide="prev"><i class="fa fa-chevron-left fa-2x"
                aria-hidden="true"></i></a>

        <div id="films" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">

            <div class="carousel-inner" role="listbox">
                <?php            
                $numFilms = count($film);
                $numCarousel = round($numFilms/5);
                
                $k=0;
                echo '<div class="carousel-item active">
                <div class="row">';
                for($j=0; $j < 5; $j++) {
                        echo '<div class="col d-flex justify-content-center">
                            <a href="/detail/detailFilms/'.$film[$k]->id.'">
                                <p class="text-light fs-2 p-5">'.$film[$k++]->name.'</p>
                            </a>
                        </div>';
                        }
                        
                        echo '</div>
                        </div>';
                        for($i=2; $i < $numCarousel; $i++) {
                            echo '<div class="carousel-item">
                    <div class="row">';
                    for($j=0; $j < 5; $j++) {
                        echo '<div class="col d-flex justify-content-center">
                        <a href="/detail/detailFilms/'.$film[$k]->id.'">
                                <p class="text-light fs-2 p-5">'.$film[$k]->name.'</p>
                            </a>
                        </div>';
                        $k++;
                    }
                        
                   echo '</div>
                </div>';
            }
            ?>
            </div>
        </div>
        <a class="btn-floating" href="#films" data-bs-slide="next"><i class="fa fa-chevron-right fa-2x"
                aria-hidden="true"></i></a>
    </div>

    <!-- SERIES --><form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
    <h5>SERIES</h5>
    <div class="container-fluid d-flex flex-row align-items-center">
        <a class="btn-floating" href="#series" data-bs-slide="prev"><i class="fa fa-chevron-left fa-2x"
                aria-hidden="true"></i></a>

        <div id="series" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">

            <div class="carousel-inner" role="listbox">
                <?php            
                        $numSeries = count($serie); //338
                        $numCarousel = round($numSeries/5); // 68
                        
                        $k=0;
                        echo '<div class="carousel-item active">
                        <div class="row">';
                        for($j=0; $j < 5; $j++) {
                                echo '<div class="col d-flex justify-content-center">
                                    <a href="/detail/detailSeries/'.$serie[$k]->id.'">
                                        <p class="text-light fs-2 p-5">'.$serie[$k++]->name.'</p>
                                        <!-- <img class="img-carousel" src="{{url("storage/img/Dexter.jpg")}}" alt=""> -->
                                    </a>
                                </div>';
                                }
        
                           echo '</div>
                        </div>';
                        for($i=2; $i < $numCarousel; $i++) {
                            echo '<div class="carousel-item">
                            <div class="row">';
                            for($j=0; $j < 5; $j++) {
                                echo '<div class="col d-flex justify-content-center">
                                    <a href="/detail/detailSeries/'.$serie[$k]->id.'">
                                        <p class="text-light fs-2 p-5">'.$serie[$k]->name.'</p>
                                        <!-- <img class="img-carousel" src="{{url("storage/img/Dexter.jpg")}}" alt=""> -->
                                    </a>
                                </div>';
                                $k++;
                            }
                                
                           echo '</div>
                        </div>';
                        }
                        ?>
            </div>
        </div>
        <a class="btn-floating" href="#series" data-bs-slide="next"><i class="fa fa-chevron-right fa-2x"
                aria-hidden="true"></i></a>
    </div>

    <!-- ANIME -->
    <h5>ANIME</h5>
    <div class="container-fluid d-flex flex-row align-items-center">
        <a class="btn-floating" href="#animes" data-bs-slide="prev"><i class="fa fa-chevron-left fa-2x"
                aria-hidden="true"></i></a>

        <div id="animes" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel"
            data-bs-interval="false">

            <div class="carousel-inner" role="listbox">
                <?php            
               $numAnimes = count($anime);
               $numCarousel = round($numAnimes/5);
                
                $k=0;
                echo '<div class="carousel-item active">
                <div class="row">';
                for($j=0; $j < 5; $j++) {
                        echo '<div class="col d-flex justify-content-center">
                            <a href="/detail/detailAnimes/'.$anime[$k]->id.'">
                                <p class="text-light fs-2 p-5">'.$anime[$k++]->name.'</p>
                            </a>
                        </div>';
                        }

                   echo '</div>
                </div>';
                for($i=2; $i < $numCarousel; $i++) {
                    echo '<div class="carousel-item">
                    <div class="row">';
                    for($j=0; $j < 5; $j++) {
                        echo '<div class="col d-flex justify-content-center">
                            <a href="/detail/detailAnimes/'.$anime[$k]->id.'">
                                <p class="text-light fs-2 p-5">'.$anime[$k]->name.'</p>
                            </a>
                        </div>';
                        $k++;
                    }
                        
                   echo '</div>
                </div>';
                }
                ?>
            </div>
        </div>
        <a class="btn-floating" href="#animes" data-bs-slide="next"><i class="fa fa-chevron-right fa-2x"
                aria-hidden="true"></i></a>
    </div>
</section>
@endsection