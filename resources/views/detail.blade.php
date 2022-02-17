@extends('layoutAll')
@section('content')
<section class="container">
    <h1>DETAIL</h1>
    <a href="{{ url('/') }}" class="btn btn-primary" title="Home">
        Home
    </a>
    <!-- START CAROUSEL -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{url('storage/img/img.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{url('storage/img/img2.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{url('storage/img/img3.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- END CAROUSEL -->
</section>
<!-- START CONTENT -->
<section>
    <h1>TITLE</h1>
    <h3>Category</h3>
    <div class="container d-flex justify-content-center mt-5">

        <div class="container-wrapper">
            <div class="container d-flex align-items-center justify-content-center">
                <div class="row justify-content-center">

                    <!-- star rating -->
                    <div class="rating-wrapper">

                        <!-- star 5 -->
                        <input type="radio" id="5-star-rating" name="star-rating" value="5">
                        <label for="5-star-rating" class="star-rating">
                            <i class="fas fa-star d-inline-block"></i>
                        </label>

                        <!-- star 4 -->
                        <input type="radio" id="4-star-rating" name="star-rating" value="4">
                        <label for="4-star-rating" class="star-rating star">
                            <i class="fas fa-star d-inline-block"></i>
                        </label>

                        <!-- star 3 -->
                        <input type="radio" id="3-star-rating" name="star-rating" value="3">
                        <label for="3-star-rating" class="star-rating star">
                            <i class="fas fa-star d-inline-block"></i>
                        </label>

                        <!-- star 2 -->
                        <input type="radio" id="2-star-rating" name="star-rating" value="2">
                        <label for="2-star-rating" class="star-rating star">
                            <i class="fas fa-star d-inline-block"></i>
                        </label>

                        <!-- star 1 -->
                        <input type="radio" id="1-star-rating" name="star-rating" value="1">
                        <label for="1-star-rating" class="star-rating star">
                            <i class="fas fa-star d-inline-block"></i>
                        </label>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam et orci id ipsum dignissim suscipit sit amet
        porttitor justo. Maecenas iaculis sit amet dolor sit amet viverra. Phasellus interdum tempor nisi, non rutrum
        neque efficitur ac. Etiam quis massa finibus, imperdiet mi a, commodo elit. Nullam at ipsum sem. Etiam
        sollicitudin quam vel rhoncus lobortis. Donec leo turpis, aliquam nec facilisis nec, placerat eget mi. Proin
        lorem risus, tristique non sapien nec, lacinia tempus mauris. In malesuada nibh at ligula vehicula venenatis. In
        hac habitasse platea dictumst. Quisque dictum risus nibh, ut semper nisi finibus ac. Praesent faucibus mauris
        nisi, sed interdum arcu aliquam id.</p>
</section>
<!-- END CONTENT -->
<!-- START COMMMENT SECTION -->
<section class="gradient-custom">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-12">
        <div class="card card-comment">
          <div class="card-body card-body-comment p-4">
            <h4 class="text-center mb-4 pb-2">Nested comments section</h4>

            <div class="row">
              <div class="col">
                <div class="d-flex flex-start">
                  <img
                    class="rounded-circle shadow-1-strong me-3"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                    alt="avatar"
                    width="65"
                    height="65"
                  />
                  <div class="flex-grow-1 flex-shrink-1">
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-1">
                          Maria Smantha <span class="text-muted">- 2 hours ago</span>
                        </p>
                        <a href="#!"
                          ><i class="fas fa-reply fa-xs"></i
                          ><span class="text-muted"> reply</span></a
                        >
                      </div>
                      <p class="small mb-0">
                        It is a long established fact that a reader will be distracted by
                        the readable content of a page.
                      </p>
                    </div>

                    <div class="d-flex flex-start mt-4">
                      <a class="me-3" href="#">
                        <img
                          class="rounded-circle shadow-1-strong"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(11).webp"
                          alt="avatar"
                          width="65"
                          height="65"
                        />
                      </a>
                      <div class="flex-grow-1 flex-shrink-1">
                        <div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                              Simona Disa <span class="text-muted">- 3 hours ago</span>
                            </p>
                          </div>
                          <p class="small mb-0">
                            letters, as opposed to using 'Content here, content here',
                            making it look like readable English.
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex flex-start mt-4">
                      <a class="me-3" href="#">
                        <img
                          class="rounded-circle shadow-1-strong"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                          alt="avatar"
                          width="65"
                          height="65"
                        />
                      </a>
                      <div class="flex-grow-1 flex-shrink-1">
                        <div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                              John Smith <span class="text-muted">- 4 hours ago</span>
                            </p>
                          </div>
                          <p class="small mb-0">
                            the majority have suffered alteration in some form, by
                            injected humour, or randomised words.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex flex-start mt-4">
                  <img
                    class="rounded-circle shadow-1-strong me-3"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(12).webp"
                    alt="avatar"
                    width="65"
                    height="65"
                  />
                  <div class="flex-grow-1 flex-shrink-1">
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-1">
                          Natalie Smith <span class="text-muted">- 2 hours ago</span>
                        </p>
                        <a href="#!"
                          ><i class="fas fa-reply fa-xs"></i
                          ><span class="text-muted"> reply</span></a
                        >
                      </div>
                      <p class="small mb-0">
                        The standard chunk of Lorem Ipsum used since the 1500s is
                        reproduced below for those interested. Sections 1.10.32 and
                        1.10.33.
                      </p>
                    </div>

                    <div class="d-flex flex-start mt-4">
                      <a class="me-3" href="#">
                        <img
                          class="rounded-circle shadow-1-strong"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp"
                          alt="avatar"
                          width="65"
                          height="65"
                        />
                      </a>
                      <div class="flex-grow-1 flex-shrink-1">
                        <div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                              Lisa Cudrow <span class="text-muted">- 4 hours ago</span>
                            </p>
                          </div>
                          <p class="small mb-0">
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                            scelerisque ante sollicitudin commodo. Cras purus odio,
                            vestibulum in vulputate at, tempus viverra turpis.
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex flex-start mt-4">
                      <a class="me-3" href="#">
                        <img
                          class="rounded-circle shadow-1-strong"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(29).webp"
                          alt="avatar"
                          width="65"
                          height="65"
                        />
                      </a>
                      <div class="flex-grow-1 flex-shrink-1">
                        <div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                              Maggie McLoan <span class="text-muted">- 5 hours ago</span>
                            </p>
                          </div>
                          <p class="small mb-0">
                            a Latin professor at Hampden-Sydney College in Virginia,
                            looked up one of the more obscure Latin words, consectetur
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex flex-start mt-4">
                      <a class="me-3" href="#">
                        <img
                          class="rounded-circle shadow-1-strong"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                          alt="avatar"
                          width="65"
                          height="65"
                        />
                      </a>
                      <div class="flex-grow-1 flex-shrink-1">
                        <div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                              John Smith <span class="text-muted">- 6 hours ago</span>
                            </p>
                          </div>
                          <p class="small mb-0">
                            Autem, totam debitis suscipit saepe sapiente magnam officiis
                            quaerat necessitatibus odio assumenda, perferendis quae iusto
                            labore laboriosam minima numquam impedit quam dolorem!
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END COMMENT SECTION -->
@endsection