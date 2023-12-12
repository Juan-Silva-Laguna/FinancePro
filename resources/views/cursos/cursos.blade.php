@extends('layouts.app')

@section('content')
    <style>
        *{
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
            text-shadow: rgba(0,0,0,.01) 0 0 1px;
        }
        body
        {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 400;
            background: #FFFFFF;
            color: #a5a5a5;
        }
        div
        {
            display: block;
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        ul
        {
            list-style: none;
            margin-bottom: 0px;
        }
        p
        {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            line-height: 1.71;
            font-weight: 400;
            color: rgba(0,0,0,0.5);
            -webkit-font-smoothing: antialiased;
            -webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
            text-shadow: rgba(0,0,0,.01) 0 0 1px;
        }
        p a
        {
            display: inline;
            position: relative;
            color: inherit;
            border-bottom: solid 1px #ffa07f;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }
        p:last-of-type
        {
            margin-bottom: 0;
        }
        a, a:hover, a:visited, a:active, a:link
        {
            text-decoration: none;
            -webkit-font-smoothing: antialiased;
            -webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
            text-shadow: rgba(0,0,0,.01) 0 0 1px;
        }
        p a:active
        {
            position: relative;
            color: #FF6347;
        }
        p a:hover
        {
            color: #FFFFFF;
            background: #ffa07f;
        }
        p a:hover::after
        {
            opacity: 0.2;
        }
        ::selection
        {
            
        }
        p::selection
        {
            
        }
        h1{font-size: 40px;}
        h2{font-size: 30px;}
        h3{font-size: 24px;}
        h4{font-size: 18px;}
        h5{font-size: 14px;}
        h1, h2, h3, h4, h5, h6
        {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: #000000;
            -webkit-font-smoothing: antialiased;
            -webkit-text-shadow: rgba(0,0,0,.01) 0 0 1px;
            text-shadow: rgba(0,0,0,.01) 0 0 1px;
        }
        h1::selection, 
        h2::selection, 
        h3::selection, 
        h4::selection, 
        h5::selection, 
        h6::selection
        {
            
        }
        .form-control
        {
            color: #db5246;
        }
        section
        {
            display: block;
            position: relative;
            box-sizing: border-box;
        }
        .super_container
        {
            width: 100%;
            overflow: hidden;
        }

        .instructors
        {
            width: 100%;
            padding-top: 88px;
            padding-bottom: 30px;
            background: #f8f8f8;
        }
        .instructors_background
        {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 567px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        .instructors_row
        {
            margin-top: 79px;
        }
        .instructor
        {
            padding-top: 40px;
            padding-bottom: 34px;
            padding-left: 30px;
            padding-right: 30px;
        }
        /* Primer contenedor sin barra de progreso */
.instructor_image_container {
    width: 165px;
    height: 165px;
    border: solid 14px #FFFFFF;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    margin-left: auto;
    margin-right: auto;
}


.instructor_image {
    cursor: pointer;
    position: absolute;
    top: -14px;
    left: -14px;
    width: 165px;
    height: 165px;
}

.instructor_image img {
    max-width: 100%;
}

        .instructor_name
        {
            margin-top: 6px;
        }
        .instructor_name a
        {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            color: rgba(0,0,0,0.9);
            font-weight: 700;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }
        .instructor_name a:hover
        {
            color: #2e21df;
        }
        .instructor_title
        {
            font-size: 14px;
            font-weight: 500;
            color: rgba(0,0,0,0.3);
            margin-top: 5px;
        }
        .instructor_text
        {
            margin-top: 16px;
        }
        .instructor_social
        {
            margin-top: 22px;
        }
        .instructor_social ul li
        {
            display: inline-block;
        }
        .instructor_social ul li:not(:last-child)
        {
            margin-right: 5px;
        }
        .instructor_social ul li a i
        {
            font-size: 14px;
            color: #4f47e2;
            padding: 6px;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }
        .instructor_social ul li a i:hover
        {
            color: rgba(0,0,0,1);
        }

        .centered-courses {
            text-align: center; /* Centra el contenido horizontalmente */
        }

        .centered-courses .instructor_col {
            margin-left: auto;
            margin-right: auto;
        }

        /* Estilo para las líneas a cada lado del título */
        .header-lines {
            border-top: 1px solid #000;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        /* Estilo para el icono de alternar */
        .toggle-icon {
            cursor: pointer;
        }

        /* Estilo para ocultar el contenido */
        #toggled-content {
            display: flex;
            max-height: 100%; /* Altura máxima inicial */
            overflow: hidden;
            transition: max-height 0.5s ease;
        }

        .hide-content {
            max-height: 0; /* Oculta el contenido ajustando la altura */
            overflow: hidden;
            transition: max-height 0.5s ease;
        }
        

        .overlay-blocked {
            cursor: pointer;
            position: absolute;
            top: 10px;
            left: 10px;
            width: 90%;
            height: 90%;
            background: url('{{ asset("assets/img/blocked.png") }}') no-repeat; 
            background-size: cover;
            opacity: 0.7; 
            z-index: 1;
        }

        .overlay-ok {
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset("assets/img/ok.png") }}'); /* Reemplaza 'ruta_de_la_imagen_transparente.png' con la ruta de tu imagen transparente */
            opacity: 0.9; /* Ajusta la opacidad según tus preferencias */
            z-index: 1; /* Asegura que la capa de superposición esté sobre la imagen */
        }



        .circular-progress {
            position: relative;
            height: 165px;
            width: 165px;
            border-radius: 50%;
            background: conic-gradient(#20b53b 3.6deg, #e3e3e3 0deg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circular-progress img {
           /*  width: 80%; 
            height: auto;  */
            height: 124px;
            width: 124px;
            border-radius: 50%;
            position: absolute;
        }

        .circular-progress::before {
            content: "";
            position: absolute;
            height: 124px;
            width: 124px;
            border-radius: 50%;
            background-color: #fff;
        }

        .progress-value {
            position: relative;
            font-size: 40px;
            font-weight: 600;
            color: #555454c7;
        }

        .col-lg-4 {
            width: 33.3333%;
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .instructor {
            margin: 20px;
        }


    </style>
	<div class="super_container">
		<div class="instructors">
			<div class="instructors_background" id="instructors_background1" style="background-image:url(https://preview.colorlib.com/theme/lingua/images/instructors_background.png.webp)"></div>
			<div class="container">
				<div class="row">
					<div class="col-4">
						<hr>
					</div>
                    <div class="col-4 text-center">
						<h2 class="section_title text-center">Nivel Basico</h2>
                        <div class="toggle-content" id="1">
                            <span class="toggle-icon" id="toggle-icon"> <i class="fas fa-angle-up" style="font-size: 30px;"></i></span>
                        </div>
					</div>
                    <div class="col-4">
						<hr>
					</div>
				</div>
				<div class="row centered-courses" id="toggled-content1">
                    @foreach ($basico as $value)
                        <div class="col-lg-4 col-12 instructor_col">
                            <a href="{{route('curso.ver', $value->id_curso)}}">
                                <div class="instructor text-center d-flex flex-column align-items-center">

                                    <div class="circular-progress">
                                        @if($value->porcentaje_progreso>=100)
                                            <div class="overlay-ok"></div>
                                        @endif
                                        <img src="{{ asset($value->imagen_curso) }}" alt="Your Image">
                                        <span class="progress-value" data-value="{{$value->porcentaje_progreso}}">{{$value->porcentaje_progreso}}%</span>
                                    </div>
                                    
                                    <div class="instructor_name"><a href="instructors.html">{{$value->nombre_curso}}</a></div>
                                    <!-- <div class="instructor_title">Teacher</div> -->
                                    
                                </div>
                            </a>
                        </div>
                    @endforeach
				</div>
			</div>
		</div>
        <div class="instructors">
			<div class="instructors_background" id="instructors_background2" style="background-image:url(https://preview.colorlib.com/theme/lingua/images/instructors_background.png.webp)"></div>
			<div class="container">
				<div class="row">
					<div class="col-4">
						<hr>
					</div>
                    <div class="col-4 text-center">
						<h2 class="section_title text-center">Nivel Intermedio</h2>
                        <div class="toggle-content" id="2">
                            <span class="toggle-icon" id="toggle-icon"> <i class="fas fa-angle-up" style="font-size: 30px;"></i></span>
                        </div>
					</div>
                    <div class="col-4">
						<hr>
					</div>
				</div>
				<div class="row centered-courses" id="toggled-content2">
                    @foreach ($intermedio as $value)
                        <div class="col-lg-4 col-12 instructor_col">
                            <a href="{{ auth()->user()->nivel_id < 2 ? '#' :  route('curso.ver', $value->id_curso)  }}">
                                <div class="instructor text-center d-flex flex-column align-items-center">

                                    <div class="circular-progress">
                                        @if(auth()->user()->nivel_id < 2)
                                            <div class="overlay-blocked"></div>
                                        @endif
                                        @if($value->porcentaje_progreso>=100)
                                            <div class="overlay-ok"></div>
                                        @endif
                                        <img src="{{ asset($value->imagen_curso) }}" alt="Your Image">
                                        <span class="progress-value" data-value="{{$value->porcentaje_progreso==null ? 0 : $value->porcentaje_progreso}}">{{$value->porcentaje_progreso}}%</span>
                                    </div>
                                    
                                    <div class="instructor_name"><a href="instructors.html">{{$value->nombre_curso}}</a></div>
                                    <!-- <div class="instructor_title">Teacher</div> -->
                                    
                                </div>
                            </a>
                        </div>
                    @endforeach
				</div>
			</div>
		</div>
        <div class="instructors">
			<div class="instructors_background" id="instructors_background3" style="background-image:url(https://preview.colorlib.com/theme/lingua/images/instructors_background.png.webp)"></div>
			<div class="container">
				<div class="row">
					<div class="col-4">
						<hr>
					</div>
                    <div class="col-4 text-center">
						<h2 class="section_title text-center">Nivel Avanzado</h2>
                        <div class="toggle-content" id="3">
                            <span class="toggle-icon" id="toggle-icon"> <i class="fas fa-angle-up" style="font-size: 30px;"></i></span>
                        </div>
					</div>
                    <div class="col-4">
						<hr>
					</div>
				</div>
				<div class="row centered-courses" id="toggled-content3">
                    @foreach ($avanzado as $value)
                        <div class="col-lg-4 col-12 instructor_col">
                            <a href="{{ auth()->user()->nivel_id < 3 ? '#' :  route('curso.ver', $value->id_curso)  }}">
                                <div class="instructor text-center d-flex flex-column align-items-center">

                                    <div class="circular-progress">
                                        @if(auth()->user()->nivel_id < 3)
                                            <div class="overlay-blocked"></div>
                                        @endif
                                        @if($value->porcentaje_progreso>=100)
                                            <div class="overlay-ok"></div>
                                        @endif
                                        <img src="{{ asset($value->imagen_curso) }}" alt="Your Image">
                                        <span class="progress-value" data-value="{{$value->porcentaje_progreso==null ? 0 : $value->porcentaje_progreso}}">{{$value->porcentaje_progreso}}%</span>
                                    </div>
                                    
                                    <div class="instructor_name"><a href="instructors.html">{{$value->nombre_curso}}</a></div>
                                    <!-- <div class="instructor_title">Teacher</div> -->
                                    
                                </div>
                            </a>
                        </div>
                    @endforeach
                    
				</div>
			</div>
		</div>
        <div class="instructors">
			<div class="instructors_background" id="instructors_background4" style="background-image:url(https://preview.colorlib.com/theme/lingua/images/instructors_background.png.webp)"></div>
			<div class="container">
				<div class="row">
					<div class="col-4">
						<hr>
					</div>
                    <div class="col-4 text-center">
						<h2 class="section_title text-center">Nivel Profesional</h2>
                        <div class="toggle-content" id="4">
                            <span class="toggle-icon" id="toggle-icon"> <i class="fas fa-angle-up" style="font-size: 30px;"></i></span>
                        </div>
					</div>
                    <div class="col-4">
						<hr>
					</div>
				</div>
				<div class="row centered-courses" id="toggled-content4">
                    @foreach ($profesional as $value)
                        <div class="col-lg-4 col-12 instructor_col">
                            <a href="{{ auth()->user()->nivel_id < 4 ? '#' :  route('curso.ver', $value->id_curso)  }}">
                                <div class="instructor text-center d-flex flex-column align-items-center">

                                    <div class="circular-progress">
                                        @if(auth()->user()->nivel_id < 4)
                                            <div class="overlay-blocked"></div>
                                        @endif
                                        @if($value->porcentaje_progreso>=100)
                                            <div class="overlay-ok"></div>
                                        @endif
                                        <img src="{{ asset($value->imagen_curso) }}" alt="Your Image">
                                        <span class="progress-value" data-value="{{$value->porcentaje_progreso==null ? 0 : $value->porcentaje_progreso}}">{{$value->porcentaje_progreso}}%</span>
                                    </div>
                                    
                                    <div class="instructor_name"><a href="instructors.html">{{$value->nombre_curso}}</a></div>
                                    <!-- <div class="instructor_title">Teacher</div> -->
                                    
                                </div>
                            </a>
                        </div>
                    @endforeach
                    
				</div>
			</div>
		</div>

	</div>
    <!-- <script>
        const toggleIcon = document.getElementById('toggle-icon');
        const toggledContent = document.getElementById('toggled-content');

        toggleIcon.addEventListener('click', () => {
            if (toggledContent.style.display === 'none') {
                toggledContent.style.display = 'flex';
                toggleIcon.innerHTML = '<i class="fas fa-angle-up" style="font-size: 30px;"></i>'; // Cambia el icono a "mostrar"
            } else {
                toggledContent.style.display = 'none';
                toggleIcon.innerHTML = '<i class="fas fa-angle-down" style="font-size: 30px;"></i>'; // Cambia el icono a "ocultar"
            }
        });

    </script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // Escucha el evento de clic en todos los elementos con la clase toggle-icon
    $(document).ready(function () {
        $('.toggle-icon').on('click', function () {
            // Encuentra el elemento de contenido asociado a través del ID
            const toggledContentID = $(this).closest('.toggle-content').attr('id');
            const toggledContent = $('#toggled-content' + toggledContentID);
            const instructorsBackground = $('#instructors_background' + toggledContentID);

            if (toggledContent.css('display') === 'none') {
                toggledContent.css('display', 'flex');
                instructorsBackground.css('display', 'flex');
                $(this).html('<i class="fas fa-angle-up" style="font-size: 30px;"></i>');
            } else {
                toggledContent.css('display', 'none');
                instructorsBackground.css('display', 'none');
                $(this).html('<i class="fas fa-angle-down" style="font-size: 30px;"></i>');
            }
        });

    });

        let circularProgress = document.getElementsByClassName("circular-progress");
        
        // Loop through each circular-progress element
        for (let i = 0; i < circularProgress.length; i++) {
            let progressValue = circularProgress[i].getElementsByClassName("progress-value")[0];
            let progressStarValue = 0;
            let progressEndValue = parseInt(progressValue.getAttribute('data-value'));
            let speed = 10;
            if(progressEndValue != 0){
                let progress = setInterval(() => {
                    progressStarValue++;

                    progressValue.textContent = progressStarValue==100 ? '' : `${progressStarValue}%`;
                    circularProgress[i].style.background = `conic-gradient(#20b53b ${progressStarValue * 3.6}deg, #ededed 0deg)`;
                    if (progressStarValue == progressEndValue) {
                        clearInterval(progress);
                    }
                }, speed);
            }else{
                circularProgress[i].style.background = `#ededed`;
            }
        }
    </script>
@endsection
