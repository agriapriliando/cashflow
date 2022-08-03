<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>Hello, world!</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        font-family: 'Lato', sans-serif;
    }

    .form-control:focus {
        border-color: #CCC;
        outline: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .bg {
        background: url("asset/bg-image.jpg") no-repeat right center;
        /* background-size: cover; */
    }

    .bg-white-30 {
        background-color: rgba(252, 252, 252, 0.8);
    }

</style>

<body class="bg">
    <div class="container mt-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-white-30 shadow-lg rounded-lg">
            <a class="navbar-brand" href="#">
                <img src="/asset/logo_ditaria.png" width="120" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Report</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 d-none">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
    
    {{ $slot }}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#position").select2({
                allowClear: true,
                placeholder: 'Jenis'
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>