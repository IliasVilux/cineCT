@extends('layoutAll')
@section('content')
<section class="container">
    <h1>MENU</h1>
    <a href="{{ url('/detail') }}" class="btn btn-primary" title="Detail">
        Detail
    </a>
</section>
<section class="container">
   
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container">

	<!--Carousel 1-->
	<div id="multi-item-example" class="carousel slide carousel-equal-heights my-4" data-bs-ride="carousel">
		<div class="controls-top">
			<a class="btn btn-primary" href="#multi-item-example" data-bs-slide="prev"><i class="fa fa-chevron-left"></i></a>
			<a class="btn btn-primary" href="#multi-item-example" data-bs-slide="next"><i class="fa fa-chevron-right"></i></a>
		</div>

		<div class="carousel-inner" role="listbox">

			<!--Slide 1.1-->
			<div class="carousel-item active">
				<div class="row">
					<div class="col-md-4 d-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.1" alt="">
						</div>
					</div>

					<div class="col-md-4 d-none d-md-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.2" alt="">
						</div>
					</div>

					<div class="col-md-4 d-none d-md-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/69c/9fc/?text=Image%201.3" alt="">
						</div>
					</div>
				</div>
			</div>

			<!--Slide 1.2-->
			<div class="carousel-item">
				<div class="row">
					<div class="col-md-4 d-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.1" alt="">
						</div>
					</div>

					<div class="col-md-4 d-none d-md-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.2" alt="">
						</div>
					</div>

					<div class="col-md-4 d-none d-md-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/c69/f9c/?text=Image%202.3" alt="">
						</div>
					</div>
				</div>
			</div>

			<!--Slide 1.3-->
			<div class="carousel-item">
				<div class="row">
					<div class="col-md-4 d-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.1" alt="">
						</div>
					</div>

					<div class="col-md-4 d-none d-md-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.2" alt="">
						</div>
					</div>

					<div class="col-md-4 d-none d-md-flex">
						<div class="card">
							<img class="card-img-top" src="https://via.placeholder.com/800x600/9c6/cf9/?text=Image%203.3" alt="">
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

</body>
</html>
</section>
@endsection