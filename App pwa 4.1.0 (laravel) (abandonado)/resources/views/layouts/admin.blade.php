<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radio la Madriguera</title>
</head>
<body class="color-bg-body">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <div class="navbar celu-navbar flex-container color-bg-navbarCelu">
        <div class="text-center">
            <i class="fas fa-home fa-lg color-madriguera"></i>
            <br>
            <p class="color-madriguera mb-0">Inico</p>
        </div>
        <div class="text-center">
            <i class="fas fa-search fa-lg color-madriguera"></i>
            <br>
            <p class="color-madriguera mb-0">Explorar</p>
        </div>
        <div class="text-center">
            <i class="fas fa-archive fa-lg color-madriguera"></i>
            <br>
            <p class="color-madriguera mb-0">Biblioteca</p>
        </div>
    </div>

    @yield('contenido')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('../css/celu.css')}}">
    <link rel="stylesheet" href="{{asset('../css/flex.css')}}">
    <link rel="stylesheet" href="{{asset('../css/color.css')}}">
    <script src="{{asset('../js/celular.js')}}"></script>
    
</body>
</html>