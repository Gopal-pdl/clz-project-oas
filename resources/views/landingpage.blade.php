<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>OAS-NMSS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="d-flex flex-column h-100">

    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">NMSS</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="{{route('home.page')}}">Home</a></li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                            @auth
                            <a class="nav-link" href="{{route('dashboard')}}">dashboard</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>


                        @else
                        @else

                        <a class="nav-link" href="{{route('login')}}">Login</a></li>
                        @endauth
                        @endif
                        <li class="nav-item"><a class="nav-link" href="#detail">Student info</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5 pb-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-xxl-5">
                        <!-- Header text content-->
                        <div class="text-center text-xxl-start">
                            <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                <div class="text-uppercase">NMSS &middot; Attendence &middot; System</div>
                            </div>
                            <div class="fs-3 fw-light text-muted"></div>
                            <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Narayani Model Secondary School</span></h1>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                @auth
                                @else
                                <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="{{route('login')}}">Login</a>

                                @endauth
                                <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="#detail">Student info</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <!-- Header profile picture-->
                        <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                            <!-- <div class="profile bg-gradient-primary-to-secondary"> -->
                            <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                            <!-- Watch a tutorial on how to do this on YouTube (link)-->
                            <img class="profile-img" src="assets/att.jpg" alt="..." />

                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About Section-->
        <section class="bg-light py-5">
            <div class="container px-5">

                <div class="row gx-5 justify-content-center">

                    <div class="col-4">


                    </div>

                </div>

                <div class="row gx-5 justify-content-center">


                    <div class="col-xxl-6" id="detail">
                        <div class="text-center my-5">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">View Attendence Record</span></h2>

                            <form action="{{route('sid_search')}}" method="get">

                                <div class="input-group mb-3">
                                    <input type="text" name="sid" class="form-control" placeholder="Enter Student SID">
                                    <button class="btn btn-success" type="submit">Go</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                @if(request()->get('sid'))
                    @php

                        $id = request()->get('sid');

                        $stutdents = \App\Models\Student::where('rand_id', $id)->first();



                     @endphp


                    <span id="student"></span>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                  <h2><span class="text-sm text-muted">{{$stutdents->rand_id}}</span> <span>{{$stutdents->name}}</span></h2>
                                </div>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; ETech Nepal 2023</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('script')
    <script>
        $(document).ready(function() {


            @if(session('success'))

            iziToast.success({
                title: 'Success',
                message: '{{session('
                success ')}}',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                progressBarColor: 'rgb(255, 0, 0)',
            });


            @endif

            @if(session('errors'))
            console.log('error')
            iziToast.error({
                title: 'Error',
                message: '{{session('
                errors ')}}',
                position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                progressBarColor: 'rgb(255, 0, 0)',
            });


            @endif

        });
    </script>
</body>

</html>
