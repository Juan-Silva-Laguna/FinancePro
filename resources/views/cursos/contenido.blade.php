@extends('layouts.app')

@section('content')

    <style>
        body {
            margin: 0;
            overflow: hidden;
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #e5e5e5;
            color: #252525;
        }

        .slider {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .slide {
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100vh;
            opacity: 0;
            transform: translateY(100%);
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }

        .slide.active {
            opacity: 1;
            transform: translateY(0);
        }

        .slide-content {
            padding: 20px;
        }

        .arrow {
            position: absolute;
            top: 50%;
            font-size: 24px;
            cursor: pointer;
        }

        #arrow-up {
            left: 40px;
        }

        #arrow-down {
            right: 40px;
        }

        .hidden {
            display: none;
        }

        iframe{
            height: 400px;
        }

        .row-fondo {
            background: #f9fbfd;  
            height: 100%;
        }

        @media screen and (max-width: 768px) {
            iframe{
                height: 200px;
            }

            .row-fondo {
                height: 100%;
            }
        }

        @media screen and (min-width: 769px) {
            .slider {
                margin-top: 10%;
            }
        }

        


        .checkbox-animate {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            /* height: 100vh; */
            margin-bottom: 20px;
            font-family: arial;
            font-size: 25px;
        }
        .checkbox-animate label {
            position: relative;
            cursor: pointer;
        }
        .checkbox-animate label input {
            opacity: 0;
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
        }

        .input-check {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 4px;
            border: 2px solid #ccc;
            position: relative;
            top: 6px;
            margin-right: 7px;
            transition: 0.4s;
        }

        .input-check::before {
            content: '';
            display: inline-block;
            width: 15px;
            height: 6px;
            border-bottom: 4px solid #fff;
            border-left: 4px solid #fff;
            transform: scale(0) rotate(-45deg);
            position: absolute;
            top: 6px;
            left: 4px;
            transition: 0.4s;
        }

        .checkbox-animate label input:checked ~ .input-check {
            background-color: #06b1c5;
            border-color: #06b1c5;
            animation-name: input-animate;
            animation-duration: 0.7s;
        }

        .checkbox-animate label input:checked ~ .input-check::before {
            transform: scale(1) rotate(-45deg);
            animation-name: input-check;
            animation-duration: 0.2s;
            animation-delay: 0.3s;
        }

        @keyframes input-animate {
            0% {
                transform: scale(1);
            }
            40%{
                transform: scale(1.3,0.7);
            }
            55% {
                transform: scale(1);
            }
            70% {
                transform: scale(1.2,0.8);
            }
            80% {
                transform: scale(1);
            }
            90% {
                transform: scale(1.1,0.9);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes input-check {
            0% {
                transform: scale(0) rotate(-45deg);
            }
            100% {
                transform: scale(1) rotate(-45deg);
            }
        }



        .image-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .overlay i {
            font-size: 2em;
        }

        .image-container:hover img {
            transform: scale(1.1);
        }

        .image-container:hover .overlay {
            opacity: 1;
        }


        .button.white-single {
            --background: none;
            --rectangle: #f5f9ff;
            --arrow: #275efe;
            --success: #275efe;
            --shadow: rgba(10, 22, 50, .1);
        }

        .button {
            --background: #275efe;
            --rectangle: #184fee;
            --success: #4672f1;
            --text: #fff;
            --arrow: #fff;
            --checkmark: #fff;
            --shadow: rgba(10, 22, 50, .24);
            display: flex;
            overflow: hidden;
            text-decoration: none;
            -webkit-mask-image: -webkit-radial-gradient(white, black);
            background: var(--background);
            border-radius: 8px;
            box-shadow: 0 2px 8px -1px var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .button:active {
            transform: scale(0.95);
            box-shadow: 0 1px 4px -1px var(--shadow);
        }
        .button ul {
            margin: 0;
            padding: 16px 40px;
            list-style: none;
            text-align: center;
            position: relative;
            backface-visibility: hidden;
            font-size: 16px;
            font-weight: 500;
            line-height: 28px;
            color: var(--text);
        }
        .button ul li:not(:first-child) {
            top: 16px;
            left: 0;
            right: 0;
            position: absolute;
        }
        .button ul li:nth-child(2) {
            top: 76px;
        }
        .button ul li:nth-child(3) {
            top: 136px;
        }
        .button > div {
            position: relative;
            width: 60px;
            height: 60px;
            background: var(--rectangle);
        }
        .button > div:before, .button > div:after {
            content: '';
            display: block;
            position: absolute;
        }
        .button > div:before {
            border-radius: 1px;
            width: 2px;
            top: 50%;
            left: 50%;
            height: 17px;
            margin: -9px 0 0 -1px;
            background: var(--arrow);
        }
        .button > div:after {
            width: 60px;
            height: 60px;
            transform-origin: 50% 0;
            border-radius: 0 0 80% 80%;
            background: var(--success);
            top: 0;
            left: 0;
            transform: scaleY(0);
        }
        .button > div svg {
            display: block;
            position: absolute;
            width: 20px;
            height: 20px;
            left: 50%;
            top: 50%;
            margin: -9px 0 0 -10px;
            fill: none;
            z-index: 1;
            stroke-width: 2px;
            stroke: var(--arrow);
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        .button.loading ul {
            animation: text calc(var(--duration) * 1ms) linear forwards calc(var(--duration) * .065ms);
        }
        .button.loading > div:before {
            animation: line calc(var(--duration) * 1ms) linear forwards calc(var(--duration) * .065ms);
        }
        .button.loading > div:after {
            animation: background calc(var(--duration) * 1ms) linear forwards calc(var(--duration) * .065ms);
        }
        .button.loading > div svg {
            animation: svg calc(var(--duration) * 1ms) linear forwards calc(var(--duration) * .065ms);
        }
        @keyframes text {
            10%, 85% {
                transform: translateY(-100%);
            }
            95%, 100% {
                transform: translateY(-200%);
            }
        }
        @keyframes line {
            5%, 10% {
                transform: translateY(-30px);
            }
            40% {
                transform: translateY(-20px);
            }
            65% {
                transform: translateY(0);
            }
            75%, 100% {
                transform: translateY(30px);
            }
        }
        @keyframes svg {
            0%, 20% {
                stroke-dasharray: 0;
                stroke-dashoffset: 0;
            }
            21%, 89% {
                stroke-dasharray: 26px;
                stroke-dashoffset: 26px;
                stroke-width: 3px;
                margin: -10px 0 0 -10px;
                stroke: var(--checkmark);
            }
            100% {
                stroke-dasharray: 26px;
                stroke-dashoffset: 0;
                margin: -10px 0 0 -10px;
                stroke: var(--checkmark);
            }
            12% {
                opacity: 1;
            }
            20%, 89% {
                opacity: 0;
            }
            90%, 100% {
                opacity: 1;
            }
        }
        @keyframes background {
            10% {
                transform: scaleY(0);
            }
            40% {
                transform: scaleY(0.15);
            }
            65% {
                transform: scaleY(0.5);
                border-radius: 0 0 50% 50%;
            }
            75% {
                border-radius: 0 0 50% 50%;
            }
            90%, 100% {
                border-radius: 0;
            }
            75%, 100% {
                transform: scaleY(1);
            }
        }

        .container_descarga {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%; /* Set the height to 100% of the viewport height */
        }

        .container_descarga > div {
            flex-basis: 100%;
            width: 0;
            text-align: center; /* Center the content horizontally */
        }

        .container_descarga .button {
            margin: 16px;
        }
        @media (max-width: 400px) {
            .container_descarga .button {
                margin: 12px;
            }
        }
        .dribbble {
            position: fixed;
            display: block;
            right: 20px;
            bottom: 20px;
        }
        .dribbble img {
            display: block;
            height: 28px;
        }

        .progress2 {
            width: 100%;
            height: 30px;
        }
        .progress-wrap2 {
            background:  #8c84f5;
            margin: 20px 0;
            overflow: hidden;
            position: relative;
        }
        .progress-wrap2 .progress-bar2 {
            background: #ccc ;
            left: 0;
            position: absolute;
            top: 0;
        }
        .btn-regresar {
            position: absolute;
            /* top: 10px; */
            right: 10px;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>
<div class="container">    
    
    <div class="slider">
        <div style="position: relative;">
            <a href="{{ url('/cursos') }}"  type="button" class="btn btn-icon btn-round btn-default btn-regresar">
				<i class="fa fa-times"></i>
            </a>
            <h1 style=" margin-bottom: 0px; "> {{ $curso->nombre_curso }} </h1>
            <div class="progress-wrap2 progress" data-progress-percent="{{ $curso->porcentaje_progreso }}">
                <div class="progress-bar2 progress2"></div>
            </div>
        </div>
        

        
        @foreach ($data as $key => $value)
        <div class="slide {{$key == 0 ? 'active' : ''}}" id="section{{$key+1}}">
            <div class="slide-content">
                <!-- Contenido de la segunda sección -->
                <div class="container">
                    <div class="row row-fondo">
                            <div style="padding: 0px; " class="col-lg-7 col-md-8 col-sm-8 col-xs-8 text-center">
                            @switch($value->tipo)
                                @case('vid')
                                    <iframe width="100%" scrolling="no" frameborder="0" style="border: none;" src="{{$value->contenido}}"></iframe>
                                    @break
                                @case('img')
                                    <div class="image-container">
                                        <img src="{{ strpos($value->contenido, 'https://') !== false || strpos($value->contenido, 'http://') !== false  ? $value->contenido : asset($value->contenido) }}" alt="Description">
                                        <div class="overlay">
                                            
                                            <a href="{{ strpos($value->contenido, 'https://') !== false || strpos($value->contenido, 'http://') !== false  ? $value->contenido : asset($value->contenido) }}" class="btn btn-icon btn-round btn-default">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @break
                                @case('fil')
                                    <div class="container_descarga">
                                        <a target="_blank" href="{{ strpos($value->contenido, 'https://') !== false || strpos($value->contenido, 'http://') !== false  ? $value->contenido : asset($value->contenido) }}" class="button">
                                            <ul>
                                                <li>Descargar</li>
                                                <li>Descargando...</li>
                                                <li>Listo</li>
                                            </ul>
                                            <div>
                                                <svg viewBox="0 0 24 24"></svg>
                                            </div>
                                        </a>
                                    </div>
                                    @break
                                @default
                                    <p>Un Error en Curso.</p>
                            @endswitch
                                
                            </div>
                            <div class="col-lg-5 col-md-12  col-sm-12 col-xs-12 mt-4">
                                <!-- <div class="card"> -->
                                    <div class="card-header">
                                        <h4 class="card-title">{{ $value->titulo }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>{{ $value->descripcion }}</p>
                                    </div>
                                    <div class="checkbox-animate"> 
                                        <label>
                                            <input type="checkbox" name="check" id="check{{ $value->id }}" class="checkbox-marcar" data-id-anterior="{{ $key > 0 ? $data[$key-1]->id : '' }}" data-id-proximo="{{ $key < count($data)-1 ? $data[$key+1]->id : '' }}" data-id="{{ $value->id }}" {{$value->visto != null ? 'checked disabled' : ''}} data-bloqueado="{{$key==0 || $data[$key-1]->visto != null ? '' : 'disabled'}}">
                                            <span class="input-check" id="input-check{{ $value->id  }}"></span>
                                            <span id="checktext{{$value->id}}">{{$value->visto != null ? 'Finalizado' : 'Marcar'}}</span>
                                        </label>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @endforeach

        <button type="button" class="arrow btn btn-icon btn-round btn-info" id="arrow-up">
            <i class="fas fa-angle-double-up"></i>
        </button>
        <button type="button" class="arrow btn btn-icon btn-round btn-info" id="arrow-down">
            <i class="fas fa-angle-double-down"></i>
        </button>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    let getPercent = ($('.progress-wrap2').data('progress-percent') / 100);
    moveProgressBar(getPercent);
    let contenidos = {{$curso->total_videos}};
    let progreso = {{$curso->progreso}};

     $(document).ready(function () {
        $('.checkbox-marcar').on('click', function (e) {
                var idProximo = $(this).data('id-proximo');
                var idAnterior = $(this).data('id-anterior');
                var bloqueado = $(this).data('bloqueado');
                var id = $(this).data('id');
                if (bloqueado!='disabled') {
                    $.ajax({
                        type: 'GET',
                        url: `/cursos/check_video/${id}`,
                        dataType: 'json',
                        success: function (data) {
                            if (data.checked) {
                                // $('#check' + idProximo).prop('disabled', false);
                                // $('#check' + idAnterior).prop('disabled', true);
                                
                                $('#check' + idProximo).attr('data-bloqueado', '');
                                $('#check' + idAnterior).attr('data-bloqueado', 'disabled');
                                // $('#check' + id).attr('data-bloqueado', 'disabled');
                                $('#check' + id).prop('disabled', true);
                                $('#checktext' + id).text('Finalizado');
                                progreso++;
                                getPercent = (progreso/contenidos);
                                moveProgressBar(getPercent);
                            }else{
                                // $('#check' + idProximo).prop('disabled', true);
                                // $('#check' + idAnterior).prop('disabled', false);

                                $('#check' + idProximo).attr('data-bloqueado', 'disabled');
                                $('#check' + idAnterior).attr('data-bloqueado', '');
                            }
                        },
                        error: function (error) {
                            console.error(error);
                        }
                    });
                }else{
                    $('#check' + id).prop('checked', false);

                    $.notify({
                        icon: 'fa fa-bell',
                        title: 'Ups!',
                        message: 'No es posible saltarse el contenido',
                    },{
                        type: 'danger',
                        placement: {
                            from: "bottom",
                            align: "right"
                        },
                        time: 1000,
                    });
                }
            });
        });


    document.querySelectorAll('.button').forEach(button => {

        let duration = 3000,
            svg = button.querySelector('svg'),
            svgPath = new Proxy({
                y: null,
                smoothing: null
            }, {
                set(target, key, value) {
                    target[key] = value;
                    if(target.y !== null && target.smoothing !== null) {
                        svg.innerHTML = getPath(target.y, target.smoothing, null);
                    }
                    return true;
                },
                get(target, key) {
                    return target[key];
                }
            });

        button.style.setProperty('--duration', duration);

        svgPath.y = 20;
        svgPath.smoothing = 0;

        button.addEventListener('click', e => {
            const link = button.href;
            
            setTimeout(() => {
                window.location.href = link;
            }, 1500);

            e.preventDefault();

            if(!button.classList.contains('loading')) {

                button.classList.add('loading');

                // gsap.to(svgPath, {
                //     smoothing: .3,
                //     duration: duration * .065 / 1000
                // });

                // gsap.to(svgPath, {
                //     y: 12,
                //     duration: duration * .265 / 1000,
                //     delay: duration * .065 / 1000,
                //     ease: Elastic.easeOut.config(1.12, .4)
                // });

                button.href = "#";

                setTimeout(() => {
                    svg.innerHTML = getPath(0, 0, [
                        [3, 14],
                        [8, 19],
                        [21, 6]
                    ]);
                }, duration / 2);

            }

        });

    });

    function getPoint(point, i, a, smoothing) {
        let cp = (current, previous, next, reverse) => {
                let p = previous || current,
                    n = next || current,
                    o = {
                        length: Math.sqrt(Math.pow(n[0] - p[0], 2) + Math.pow(n[1] - p[1], 2)),
                        angle: Math.atan2(n[1] - p[1], n[0] - p[0])
                    },
                    angle = o.angle + (reverse ? Math.PI : 0),
                    length = o.length * smoothing;
                return [current[0] + Math.cos(angle) * length, current[1] + Math.sin(angle) * length];
            },
            cps = cp(a[i - 1], a[i - 2], point, false),
            cpe = cp(point, a[i - 1], a[i + 1], true);
        return `C ${cps[0]},${cps[1]} ${cpe[0]},${cpe[1]} ${point[0]},${point[1]}`;
    }

    function getPath(update, smoothing, pointsNew) {
        let points = pointsNew ? pointsNew : [
                [4, 12],
                [12, update],
                [20, 12]
            ],
            d = points.reduce((acc, point, i, a) => i === 0 ? `M ${point[0]},${point[1]}` : `${acc} ${getPoint(point, i, a, smoothing)}`, '');
        return `<path d="${d}" />`;
    }




    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        function showSlide(index, direction) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.add('active');
                    slide.style.display = 'flex';
                    const translateYValue = direction * 100;
                    slide.style.transform = `translateY(${translateYValue}%)`;
                    setTimeout(() => {
                        slide.style.transform = 'translateY(0)';
                    }, 0);
                } else {
                    slide.classList.remove('active');
                    slide.style.display = 'none';
                    const translateYDirection = direction === 1 ? -1 : 1;
                    slide.style.transform = `translateY(${translateYDirection * 100}%)`;
                }
            });

            // Ocultar la flecha hacia arriba si es la primera sección
            document.getElementById('arrow-up').classList.toggle('hidden', index === 0);
            // Ocultar la flecha hacia abajo si es la última sección
            document.getElementById('arrow-down').classList.toggle('hidden', index === slides.length - 1);
        }

        function navigate(direction) {
            const nextSlide = currentSlide + direction;

            if (nextSlide >= 0 && nextSlide < slides.length) {
                showSlide(nextSlide, direction);
                currentSlide = nextSlide;
            }
        }

        document.getElementById('arrow-up').addEventListener('click', () => navigate(-1));
        document.getElementById('arrow-down').addEventListener('click', () => navigate(1));

        showSlide(currentSlide, 1); // Mostrar la primera slide al cargar la página
    });
    
    
    // on browser resize...
    $(window).resize(function() {
        moveProgressBar(getPercent);
    });


    // SIGNATURE PROGRESS
    function moveProgressBar(getPercent) {
      console.log("moveProgressBar");
      console.log(getPercent);
        var getProgressWrapWidth = $('.progress-wrap2').width();
        var progressTotal = getPercent * getProgressWrapWidth;
        var animationLength = 2500;
        
        // on page load, animate percentage bar to data percentage length
        // .stop() used to prevent animation queueing
        $('.progress-bar2').stop().animate({
            left: progressTotal
        }, animationLength);
    }

</script>

@endsection