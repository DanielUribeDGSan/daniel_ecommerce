<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <style>
        html,
        body {
            overflow: hidden;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        * {
            font-family: 'Montserrat', sans-serif;
        }

        a,
        a:hover {
            text-decoration: none;
        }

        .page_404 {
            padding: 40px 0;
            background: #fff;
            font-family: 'Arvo', serif;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {

            height: 350px;
            background-position: center;
        }


        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_404 {
            color: #fff !important;
            padding: 10px 20px;
            background: #e97730;
            margin: 20px 0;
            display: inline-block;
        }

        .contant_box_404 {
            margin-top: 0px;
        }

    </style>
</head>

<body>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-12 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <lottie-player src="{{ asset('json/404.json') }}" background="transparent" speed="1"
                                style="width: 100%; height: 100%;" loop autoplay></lottie-player>

                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                Página no encontrada
                            </h3>

                            <p>No existe ninguna página con esta ruta</p>

                            <a href="{{ route('inicio') }}" class="link_404">Regresar al inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
