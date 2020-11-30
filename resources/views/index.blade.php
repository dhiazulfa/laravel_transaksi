<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">

  <a class="navbar-brand" href="#">PartnerIklan.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item active">
        <a class="nav-link" href="#">Homepage <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">News</a>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produk
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Google</a>
          <a class="dropdown-item" href="#">Facebook Ads</a>
          <a class="dropdown-item" href="#">SEO</a>
          <a class="dropdown-item" href="#">Training</a>
        </div>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="#">Pemesanan</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">Kontak</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>

    </ul>
  </div>

</div>
</nav>

<!-- Akhir Navbar -->

<!-- Jumbotron -->

<div class="jumbotron jumbotron-fluid">

</div>

<!-- Akhir Jumbotron-->

<hr />

<!-- image -->
<div class="container">
<div class="row text-center text-lg-left">

    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
          </a>
    </div>

</div>
</div>

<!-- Akhir Image -->

<!-- card -->
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">

                <div class="card-horizontal">
                    <div class="img-square-wrapper">
                        <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Google AdWords</h4>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Debitis dolorem eum et accusamus. Enim reiciendis ratione velit error esse est consequatur!
                        Labore quia, libero mollitia quidem ad cum corrupti quaerat. </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">

                <div class="card-horizontal">

                    <div class="card-body">
                        <h4 class="card-title">Google AdWords</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Debitis dolorem eum et accusamus. Enim reiciendis ratione velit error esse est consequatur!
                        Labore quia, libero mollitia quidem ad cum corrupti quaerat. </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>

                    <div class="img-square-wrapper">
                        <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap">
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">

                <div class="card-horizontal">
                    <div class="img-square-wrapper">
                        <img class="" src="http://via.placeholder.com/300x180" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Google AdWords</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Debitis dolorem eum et accusamus. Enim reiciendis ratione velit error esse est consequatur!
                        Labore quia, libero mollitia quidem ad cum corrupti quaerat. </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<br><br>

<!-- Akhir Card -->

<!-- Footer -->
<footer class="container">
        <p style="text-align: center;">&copy; 2020 Dhiazulfa Maulana Bachtiar </p>
</footer>


<!-- JavaScript -->

 <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
