@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

  <style>

  /* Agrega otros estilos específicos para pantallas más grandes aquí */

    html {
       font-size: 62.5%;
    }
     body {
       font-size: 1.6rem;
       font-family: 'Montserrat', sans-serif;
    }


    .multiple-slide .slide{
        margin: 10px;
    }


    .multiple-slide .slick-prev,
    .multiple-slide .slick-next {
        font-size: 24px;
        color: #72747C;
        padding: 10px;
        border-radius: 5px;
        position: absolute;
        top: 140px;
        transform: translateY(-50%);
        z-index: 1;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-color: transparent;
        background-color: transparent;
        font-weight: bold;
        font-size: 60px;
    }

    .multiple-slide
    .slick-next{
        right: 0px;
    }

    .multiple-slide:hover .slick-prev,
    .multiple-slide:hover .slick-next {
        opacity: 1;
    }

    .gradient-overlay-derecha {
      position: absolute;
      top: 0;
      right: 0;
      width: 8%;
      height: 100%;
      z-index: 1;
      background: linear-gradient(to left, #fafbfd 15%, transparent 100%);
    }

    .gradient-overlay-izquierda {
      position: absolute;
      top: 0;
      left: 0;
      width: 8%;
      height: 100%;
      z-index: 1;
      background: linear-gradient(to right, #fafbfd 15%, transparent 100%);
    }


    .multiple-slide {
        position: relative; /* Add this line to set position to relative */
        /* Other existing styles */
    }
    .cont-films{
        margin: 3%;
        position: relative;
    }

    .imagen-m {
        width: 90%;
    }
    /* h2 {
        display: block;
        font-size: 1.5em;
        margin-block-start: 0.83em;
        margin-block-end: 0.83em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }
 */



    * {
        margin: 0;
        pdding: 0;
        box-sizing: border-box;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }


    .container2 .body-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        visibility: hidden;
    }
    @media screen and (min-width: 768px) {
        .container2 .body-item-1:hover {
            color: red;
            opacity: 1;
        }
        .container2 .body-item:hover {
            width: 40vw;
            height: 22vw;
            opacity: 1;
            transition: 0.4s;
            transition-delay: 0.4s;
        }
        .item:hover {
            width: 40vw;
            height: 22vw;
            transition: 0.5s;
            opacity: 1;
            transition-delay: 0.3s;
        }
        .item:hover .body-item {
            visibility: visible;
        }
        .item:hover .body-item-1 {
            width: 40vw;
        }
        .icon-set i:hover {
            font-size: 1.1vw;
            border-color: #fff;
            background: rgba(0, 0, 0, 0.7);
            transition: 0.4s;
        }
        .image-container:hover .body-item {
            visibility: visible;
        }

        .image-container:hover .body-item-1 {
            width: 40vw;
        }
    }
    .container2 .body-item-1 {
        flex-grow: 1;
        text-align: center;
        opacity: 0.4;
    }
    .container2 .body-item-2 {
        align-self: flex-start;
        font-size: 2vw;
        margin-bottom: 0.5vw;
        margin-left: 0.5vw;
    }
    .container2 .body-item-3 {
        align-self: flex-start;
        margin-left: 0.5vw;
    }
    .container2 .body-item-4 {
        padding-right: 3vw;
        margin-left: 0.5vw;

    }
    .container2 .body-item-5 {
        width: 40vw;
        text-align: center;
    }
    .container2 .body-item-6 {
        align-self: flex-end;
        position: absolute;
    }
    .container2 .play {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container2 .play i {
        margin-top: 3vw;
        justify-content: center;
        width: 6vw;
        height: 6vw;
        border-radius: 25vw;
        background: rgba(0, 0, 0, 0.5);
        border: 0.1em solid white;
        padding: 1.4vw;
        font-size: 2.5vw;
    }
    .container2 * {
        background-color: transparent;
    }
    .details-icon {
        font-size: 2.5vw;
    }
    .item {
        width: 25vw;
        height: 15vw;
        background-size: 100% 100%;
        margin: 0 2px 0 2px;
        border-radius: 1px;
        cursor: pointer;
        transition: 0.5s;
        color: white;
    }
    .icon-set {
        display: flex;
        flex-direction: column;
        margin: 5vw 0 0 0;
    }
    .icon-set i {
        margin: 0 1vw 0.5vw 1vw;
        font-size: 0.9vw;
        border-radius: 50%;
        padding: 0.7vw;
        background: rgba(0, 0, 0, 0.5);
        border: 0.1em solid rgba(255, 255, 255, 0.5);
    }



    .description {
        font-weight: 300;
        font-size: 1.4vw;
    }
    .properties {
        font-size: 1.35vw;
    }
    .properties * {
        margin: 1px;
    }
    .properties .age-limit {
        border: 0.1em solid rgba(255, 255, 255, 0.4);
        font-weight: 200;
        font-size: 1.2vw;
        padding: 0 3px 0 3px;
    }

    .image-container {
        position: relative;
        overflow: hidden;
        width: 90%;
        height: 15vw;
        border-radius: 1px;
        margin: 0 2px 0 2px;
        cursor: pointer;
        transition: 0.5s;
        color: white;
    }



    @media only screen and (max-width: 768px) {
        .image-container {
            height: 180px;
        }
        .slide__content--headings p{
            display: none;
        }
    }

  </style>
<iframe style="border: none;" src="{{$pelicula->video}}" allowfullscreen="" width="100%"  height="810" frameborder="0"></iframe>
<div class="container">
    <div class="row mt-5">
        <div class="col-4">
            <img src="{{$pelicula->imagen_v}}" width="60%" alt="">
        </div>
        <div class="col-6">
            <h1>{{$pelicula->nombre}}</h1>
            <h2><b>{{$pelicula->duracion}}</h2>
            <h2>{{$pelicula->agno}}</h2>
            <br>
            <h3>SINOPSIS</h3>
            <p>{{$pelicula->descripcion}}</p>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-icon btn-round btn-default">
                <i class="{{$pelicula->usuario_en_like == 1 ? 'fas fa-heart' : 'far fa-heart'}}" onclick="like('{{ $pelicula->id }}')" id="like-button-{{ $pelicula->id }}"></i>
            </button>
            <button type="button" class="btn btn-icon btn-round btn-default">
                <i class="{{$pelicula->pelicula_en_lista == 1 ? 'fas fa-check' : 'fas fa-plus'}}" onclick="playlist('{{ $pelicula->id }}')" id="playlist-button-{{ $pelicula->id }}"></i>
            </button>
            <button type="button" class="btn btn-icon btn-round btn-default">
                <i class="fa fa-share"></i>
            </button>
        </div>
    </div>
</div>
<div class="cont-films">
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Te podria Interesar</h1>
    <div class="gradient-overlay-derecha"></div>
    <div class="gradient-overlay-izquierda"></div>
    <section class="multiple-slide slide image-group">
        @foreach ($peliculas as $pelicula)
            <div class="container2">
                <div onclick="redirectToPage('{{ route('peliculas.ver', $pelicula->codigo ) }}')"
                class="image-container" onmouseenter="hoverEffect(this, event)"
                onmouseleave="resetEffect(this)"
                style="background-image: url({{$pelicula->imagen_v}}); background-size: 100% auto;"
                data-image-primary="{{$pelicula->imagen_v}}"
                data-image-secondary="{{$pelicula->imagen_h}}">
                    <div class="body-item">
                        <div class="body-item-1">
                        <a href="{{ route('peliculas.ver', $pelicula->codigo ) }}" style="text-decoration: none;">
                            <div class="play">
                                <i class="fas fa-play"></i>
                            </div>
                        </a>
                        </div>
                        <div class="title body-item-2">{{$pelicula->nombre}}</div>
                        <div class="properties body-item-3">
                            <span class="match">{{$pelicula->popularidad}}% Match</span>
                            <span class="year">{{$pelicula->agno}}</span>
                            <span class="age-limit">18+</span>
                            <span class="time">{{$pelicula->duracion}}</span>
                        </div>
                        <p class="description body-item-4">{{ substr($pelicula->descripcion, 0, 100)  }} ..</p>
                        <div class="body-item-5">
                            <i class="details-icon icon-chevron-down"></i>
                        </div>
                        <div class="icon-set body-item-6">
                            <i class="{{$pelicula->usuario_en_like == 1 ? 'fas fa-heart' : 'far fa-heart'}}" onclick="like('{{ $pelicula->id }}')" id="like-button-{{ $pelicula->id }}"></i>
                            <i class="{{$pelicula->pelicula_en_lista == 1 ? 'fas fa-check' : 'fas fa-plus'}}" onclick="playlist('{{ $pelicula->id }}')" id="playlist-button-{{ $pelicula->id }}"></i>
                            <i class="fas fa-share-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container2">
            <form action="{{ route('peliculas.buscar') }}" method="POST">
                    @csrf <!-- Agregar token CSRF -->


                    <div class="image-container text-center" style="color: #fff; background-image: url(https://images.unsplash.com/photo-1636155360565-3b8cf5c082a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDEwfHx8ZW58MHx8fHx8&w=1000&q=80); background-size: 100% auto;">

                    <input type="hidden" name="categorias[]" value="{{ $categoria->id }}" checked>
                    <input type="hidden" name="categoria_name" value="{{ $categoria->nombre }}" >

                    <br><br>
                    <button type="submit" style="border: none; color: #fff;cursor: pointer;">
                        <i class="fa fa-film" style="font-size: 30px;"></i>
                        <h2>Ver Más</h2>
                    </button>
                </div>

            </form>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<script src="https://alexandrebuffet.fr/codepen/slider/slick-animation.min.js"></script>

<script>

    function like(id) {
        var likeButton = $('#like-button-' + id);
        $.ajax({
            type: 'GET',
            url: `/peliculas/like/${id}`,
            dataType: 'json',
            success: function (data) {
                var claseActual = likeButton.attr('class');
                likeButton.removeClass(claseActual);
                if (claseActual == 'far fa-heart') {
                    likeButton.addClass('fas fa-heart');
                }
                else{
                    likeButton.addClass('far fa-heart');
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function playlist(id) {
        var likeButton = $('#playlist-button-' + id);
        $.ajax({
            type: 'GET',
            url: `/peliculas/playlist/${id}`,
            dataType: 'json',
            success: function (data) {
                var claseActual = likeButton.attr('class');
                likeButton.removeClass(claseActual);
                if (claseActual == 'fas fa-plus') {
                    likeButton.addClass('fas fa-check');
                }
                else{
                    likeButton.addClass('fas fa-plus');
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    function redirectToPage(url) {
        // Verificar si la pantalla es de un dispositivo móvil
        if (/Mobi|Android/i.test(navigator.userAgent)) {
            window.location.href = url;
        } else {
            // No hacer nada en pantallas que no son de celular
            console.log("No se redirecciona en dispositivos no móviles");
            // Puedes agregar más acciones o simplemente dejar vacío según tus necesidades
        }
    }

    let timeoutId;
    function hoverEffect(element, event) {
        timeoutId = setTimeout(function () {
            showInfo(element, event);
        }, 1000);
    }


    function showInfo(element, event) {
        var screenX = event.screenX;
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        if (screenWidth >= 768) {
            if (screenX < 920) {
                var dataImage = element.getAttribute("data-image-secondary");
                element.style.zIndex = "1";
                element.style.background = "linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url(" + dataImage + ")";
                element.style.backgroundSize = "100% 100%";

                element.style.width = "40vw";
                element.style.height = "22vw";
                element.style.transition = "1s";
            }else{
                var dataImage = element.getAttribute("data-image-secondary");
                element.style.zIndex = "1";
                element.style.background = "linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.9)), url(" + dataImage + ")";
                element.style.backgroundSize = "100% 100%";
                element.style.width = "40vw";
                element.style.height = "22vw";
                element.style.transition = "1s";
                element.style.transform = "translateX(-100%)";
                element.style.marginLeft = "190px";
            }

        }
    }

    function resetEffect(element) {
        clearTimeout(timeoutId);
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        if (screenWidth >= 768) {
            var dataImage = element.getAttribute("data-image-primary");
            element.style.zIndex = "0";
            element.style.transition = "0.3s";
            element.style.background = "url("+dataImage+")";
            element.style.backgroundSize = "100% auto";
            element.style.zIndex = "0";
            element.style.width = "10vw";
            element.style.height = "15vw";
            element.style.transform = "translateX(0)";
            element.style.marginLeft = "0px";
        }
    }

    $('.multiple-slide').slick({
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev">	&lang;</button>',
        nextArrow: '<button type="button" class="slick-next"> &rang;</button>',
        infinite: false,
        speed: 300,
        slidesToShow: 7,
        slidesToScroll: 6,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 5}
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4}
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3}
            }
        ]

    });
    $('.slick-prev').hide();
    $('.gradient-overlay-izquierda').hide();

    $('.multiple-slide').on('afterChange', function(event, slick, currentSlide){
        var contFilms = $(this).closest('.cont-films');

        var ladoDerecho = contFilms.find('.gradient-overlay-derecha');
        var ladoIzquierdo = contFilms.find('.gradient-overlay-izquierda');

        var slickPrev = contFilms.find('.slick-prev');
        var slickNext = contFilms.find('.slick-next');

        slickPrev.toggle(currentSlide > 0);
        ladoIzquierdo.toggle(currentSlide > 0);

        slickNext.toggle(currentSlide < slick.slideCount - slick.options.slidesToShow);
        ladoDerecho.toggle(currentSlide < slick.slideCount - slick.options.slidesToShow);
    });

</script>
@endsection
