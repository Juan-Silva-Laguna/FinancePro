@extends('layouts.app')

@section('content')
<style>
    html {
       font-size: 62.5%;
    }
     body {
       font-size: 1.6rem;
       font-family: 'Montserrat', sans-serif;
    }


* {
	 margin: 0;
	 pdding: 0;
	 box-sizing: border-box;
	 font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}

 .container2 .body-item-1:hover {
	 color: red;
	 opacity: 1;
}
 .container2 .body-item {
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 align-items: center;
	 opacity: 0;
	 visibility: hidden;
}
 .container2 .body-item:hover {
	 width: 40vw;
	 height: 22vw;
	 opacity: 1;
	 transition: 0.4s;
	 transition-delay: 0.4s;
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

 .icon-set i:hover {
	 font-size: 1.1vw;
	 border-color: #fff;
	 background: rgba(0, 0, 0, 0.7);
	 transition: 0.4s;
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
    width: 10vw;
    height: 15vw;
    border-radius: 1px;
    margin: 0 2px 0 2px;
    cursor: pointer;
    transition: 0.5s;
    color: white;
}

.image-container:hover .body-item {
  visibility: visible;
}

.image-container:hover .body-item-1 {
  width: 40vw;
}



    .filter-item {
      margin: 5px;
      display: flex;
      justify-content: space-between;
    }

    #filterList{
        display: flex;
        overflow: hidden;
    }

    .filter {
      border-top-left-radius: 50px;
      border-bottom-left-radius: 50px;
      color: white;
      padding: 10px;
      background-color: black;
      margin-left: 10px;
    }

    .closefilter {
      border-top-right-radius: 50px;
      border-bottom-right-radius: 50px;
      background-color: black;
      border: 0px;
      color: white;
      padding: 10px;
      cursor: pointer;
    }

    .input-container {
        position: relative;
        width: 100%;
        display: inline-block;
    }

    .clear-btn {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        display: block;
    }
  </style>

<div class="container mt-5">
  <!-- <form id="filterForm"> -->
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputTitulo">Título</label>
        <br>
        <div class="input-container">
            <input type="text" class="form-control" id="inputTitulo" value="{{$titulo}}" placeholder="Ingrese el título">
            <div class="clear-btn" onclick="clearInput()"><i class="fa fa-times"></i></div>
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="selectGenero">Género</label>
        <select id="selectGenero" class="form-control" onchange="agregarFiltroGenero(event)">
            <option value="">-- Seleccionar --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}" data-value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputAnio">Año</label>
        <!-- <input type="number" class="form-control" id="inputAnio" placeholder="Ingrese el año"> -->
        <select id="selectGenero" class="form-control" onchange="agregarFiltroAgno(event)">
            <option value="">-- Selecionar --</option>
            @for ($i = date('Y'); $i > 1995; $i--)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
      </div>
    </div>
  <!-- </form> -->

  <div id="filterList" class="mt-4">
  </div>
</div>

<div class="container">
    <div class="row mt-5 mb-5" id="contenedor">
        @foreach ($peliculas as $pelicula)
            <div class="col-lg-2 col-md-3 col-6  mt-4">
                <section class="multiple-slide slide image-group">

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

                </section>
            </div>
        @endforeach
    </div>
</div>


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
    const years = [];
    const genres = [];

        genres.push({ "genero":'{{$genero}}', "id_genero":'{{$id_genero}}' });

        document.getElementById('filterList').innerHTML =  `
                <span class="filter">{{$genero}}</span>
                <button class="closefilter" onclick="eliminarFiltroGenero('{{$id_genero}}')"><i class="fa fa-times"></i></button>
            `;

    function clearInput() {
        var input = document.getElementById('inputTitulo');
        input.value = '';
        actualizarListaFiltros();
    }

    var inputElement = document.getElementById('inputTitulo');
    var typingTimer;
    var doneTypingInterval = 1000;  // Intervalo de tiempo en milisegundos (1 segundo)

    inputElement.addEventListener('input', function () {
        var input = document.getElementById('inputTitulo');
        var clearBtn = document.querySelector('.clear-btn');

        if (input.value.trim() !== '') {
            clearBtn.style.display = 'block';
        } else {
            clearBtn.style.display = 'none';
        }

        clearTimeout(typingTimer);
        typingTimer = setTimeout(function () {
            const titulo = document.getElementById('inputTitulo').value;
            traerDatos(genres,years,titulo);
        }, doneTypingInterval);
    });

    function agregarFiltroAgno(event) {
        var selectedOption = event.target;
        var anio = selectedOption.value;

        var yearIndex = years.indexOf(anio);

        selectedOption.value = "";
        if (yearIndex !== -1) {
            return;
        }

        if (anio) {
            years.push(anio);
        }
        actualizarListaFiltros();
    }

    function agregarFiltroGenero(event) {
        var selectedOption = event.target;
        var id_genero = selectedOption.value;
        var genero = selectedOption.options[selectedOption.selectedIndex].getAttribute('data-value');

        var genreIndex = genres.findIndex(genre => genre.id_genero === id_genero);
        selectedOption.value = "";

        if (genreIndex !== -1) {
            return;
        }

        if (genero) {
            genres.push({"genero":genero, "id_genero":id_genero});
        }

        actualizarListaFiltros();
    }

    function eliminarFiltroGenero(idGenero) {
        var genreIndex = genres.findIndex(genre => genre.id_genero === idGenero);
        genres.splice(genreIndex, 1);
        actualizarListaFiltros();
    }

    function eliminarFiltroAgno(index) {
        var yearIndex = years.indexOf(index);
        years.splice(yearIndex, 1);
        actualizarListaFiltros();
    }

    function actualizarListaFiltros() {
        var input = document.getElementById('inputTitulo');
        var clearBtn = document.querySelector('.clear-btn');

        if (input.value.trim() !== '') {
            clearBtn.style.display = 'block';
        } else {
            clearBtn.style.display = 'none';
        }

        const titulo = document.getElementById('inputTitulo').value;
        traerDatos(genres,years,titulo);


        const filterListDiv = document.getElementById('filterList');
        filterListDiv.innerHTML = '';

        let filtros = '';

        years.forEach((anio, index) => {
            filtros += `
                <span class="filter">${anio}</span>
                <button class="closefilter" onclick="eliminarFiltroAgno('${anio}')"><i class="fa fa-times"></i></button>
            `;
        });

        genres.forEach((genero, index) => {
            filtros += `
                <span class="filter">${genero.genero}</span>
                <button class="closefilter" onclick="eliminarFiltroGenero('${genero.id_genero}')"><i class="fa fa-times"></i></button>
            `;
        });

        filterListDiv.innerHTML = filtros;
    }

    function traerDatos(categorias, agnos, texto) {
        let formData = {
            agnos: agnos,
            categorias: categorias.map(genero => genero.id_genero),
            texto: texto
        };

        // Obtener el token CSRF desde la etiqueta meta
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        formData._token = csrfToken;

        $.ajax({
            type: 'POST',
            url: "{{ route('peliculas.filtrar') }}",
            data: formData,
            success: function (data) {
                const contenedor = document.getElementById('contenedor');
                let pelis = '';
                data.peliculas.forEach(pelicula => {
                    pelis += `
                    <div class="col-lg-2 col-md-3 col-6  mt-4">
                        <section class="multiple-slide slide image-group">
                            <div class="container2">
                            <div onclick="redirectToPage('{{ route('peliculas.ver', '') }} ${pelicula.codigo}')"
                                class="image-container" onmouseenter="hoverEffect(this, event)"
                                onmouseleave="resetEffect(this)"
                                style="background-image: url(${pelicula.imagen_v}); background-size: 100% auto;"
                                data-image-primary="${pelicula.imagen_v}"
                                data-image-secondary="${pelicula.imagen_h}">
                                    <div class="body-item">
                                        <div class="body-item-1">
                                        <a href="{{ route('peliculas.ver', '') }} ${pelicula.codigo}" style="text-decoration: none;">
                                            <div class="play">
                                                <i class="fas fa-play"></i>
                                            </div>
                                        </a>
                                        </div>
                                        <div class="title body-item-2">${pelicula.nombre}</div>
                                        <div class="properties body-item-3">
                                            <span class="match">${pelicula.popularidad}% Match</span>
                                            <span class="year">${pelicula.agno}</span>
                                            <span class="age-limit">18+</span>
                                            <span class="time">${pelicula.duracion}</span>
                                        </div>
                                        <p class="description body-item-4">${pelicula.descripcion.substring(0,100)} ..</p>
                                        <div class="body-item-5">
                                            <i class="details-icon icon-chevron-down"></i>
                                        </div>
                                        <div class="icon-set body-item-6">
                                            <i class="far fa-heart"></i>
                                            <i class="fas fa-plus"></i>
                                            <i class="fas fa-share-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                    `;
                });
                contenedor.innerHTML = pelis;



            },
            error: function (error) {
                console.error(error);
            }
        });
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
    </script>
</body>
</html>

@endsection
