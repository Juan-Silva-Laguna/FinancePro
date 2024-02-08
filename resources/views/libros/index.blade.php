@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:700|Raleway:500.700">
<style>
    p {
        line-height: 1.5em;
    }
    h1 + p, p + p {
        margin-top: 10px;
    }
    .container-libros {
        padding: 40px 80px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .card-wrap-libros {
        margin: 16px;
        transform: perspective(800px);
        transform-style: preserve-3d;
        cursor: pointer;
    }
    .card-wrap-libros:hover .card-info-libros {
        transform: translateY(0);
    }
    .card-wrap-libros:hover .card-info-libros p {
        opacity: 1;
    }
    .card-wrap-libros:hover .card-info-libros, .card-wrap-libros:hover .card-info-libros p {
        transition: 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .card-wrap-libros:hover .card-info-libros:after {
        transition: 5s cubic-bezier(0.23, 1, 0.32, 1);
        opacity: 1;
        transform: translateY(0);
    }
    .card-wrap-libros:hover .card-bg-libros {
        transition: 0.6s cubic-bezier(0.23, 1, 0.32, 1), opacity 5s cubic-bezier(0.23, 1, 0.32, 1);
        opacity: 0.8;
    }
    .card-wrap-libros:hover .card-libros {
        transition: 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 2s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow: rgba(255, 255, 255, 0.2) 0 0 40px 5px, rgba(255, 255, 255, 1) 0 0 0 1px, rgba(0, 0, 0, 0.66) 0 30px 60px 0, inset #333 0 0 0 5px, inset white 0 0 0 6px;
    }
    .card-libros {
        position: relative;
        flex: 0 0 240px;
        width: 240px;
        height: 320px;
        background-color: #333;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.66) 0 30px 60px 0, inset #333 0 0 0 5px, inset rgba(255, 255, 255, 0.5) 0 0 0 6px;
        transition: 1s cubic-bezier(0.445, 0.05, 0.55, 0.95);
    }
    .card-bg-libros {
        opacity: 0.5;
        /* position: absolute; */
        top: -20px;
        left: -20px;
        width: 100%;
        height: 100%;
        padding: 20px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        transition: 1s cubic-bezier(0.445, 0.05, 0.55, 0.95), opacity 5s 1s cubic-bezier(0.445, 0.05, 0.55, 0.95);
        pointer-events: none;
    }
    .card-info-libros {
        padding: 20px;
        position: absolute;
        bottom: 0;
        color: #fff;
        transform: translateY(40%);
        transition: 0.6s 1.6s cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    .card-info-libros p {
        opacity: 0;
        text-shadow: rgba(0, 0, 0, 1) 0 2px 3px;
        transition: 0.6s 1.6s cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    .card-info-libros * {
        position: relative;
        z-index: 1;
    }
    .card-info-libros:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.6) 100%);
        background-blend-mode: overlay;
        opacity: 0;
        transform: translateY(100%);
        transition: 5s 1s cubic-bezier(0.445, 0.05, 0.55, 0.95);
    }
    .card-info-libros h1 {
        font-family: "Playfair Display";
        font-size: 28px;
        color: #fff;
        font-weight: 700;
        text-shadow: rgba(0, 0, 0, 0.5) 0 10px 10px;
    }

    .heart{
        color: #ccc;
        margin-top: 15px;
        margin-left: 200px;
        font-size: 30px;
        position: absolute;
        width: 40px;
        height: 40px;
        border-radius: 30px;
        padding: 0px;
        text-align: center;
        cursor: pointer;
        z-index: 1;
    }

    .heart-active, .heart:hover{
        color: red;
        background-color: #f9f9f9;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease-in-out;
    }


    #toast {
      padding: 10px;
      padding-left: 5px;
      position: fixed;
      width: 230px;
      height: 50px;
      top: 80px;
      left: 80%;
      transform:translate(-50%);
      background-color: #EFF2FF;
      color: #76777E;
      padding: 1px;
      border-radius: 8px;
      text-align:center;
      z-index: 1;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      visibility: hidden;
      /* opacity: 0; */
      -ms-display: flex;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }
    #toast.show{
      visibility:visible;
      animation:fadeInOut 3s;
    }
    .wish{
      color: #C50707;
      margin: 20px;
    }
    .input-container {
        position: relative;
        width: 100%;
        display: inline-block;
    }

    .search-btn {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        display: block;
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
</style>
<div class="container mt-5">
  <!-- <form id="filterForm"> -->
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTitulo">Título</label>
        <br>
        <div class="input-container">
            <input type="text" class="form-control" id="inputTitulo" placeholder="Ingrese el título">
            <div class="search-btn" onclick="search()"><i class="fa fa-search"></i></div>
        </div>
      </div>
      <div class="form-group col-md-6">
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
<div id="toast"></div>
<div id="principal" class="container-libros">
    @foreach ($libros as $value)
        <div class="marco">
            <span slot="like" id="like-button-{{$value->id}}" class="heart {{$value->like==null?'':'heart-active'}}"><i onclick="like('{{$value->id}}')" class="fas fa-heart"></i></span>
            <libro data-image="{{$value->imagen}}">
                <h1 slot="titulo">{{$value->nombre}}</h1>
                <p slot="descripcion">{{$value->autor}}, ({{$value->agno}})</p>
                <a href="{{ route('libros.ver', $value->id) }}" slot="boton" class="btn btn-primary btn-round">Leer</a>
            </libro>
        </div>
    @endforeach
</div>
<div id="spinner" style="display: none;" class="text-center">
    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921" alt="Cargando..." width="90">
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js"></script>



   <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script>
         let cont = 2;
         let loading = false;
         const $spinner = $('#spinner');

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                cargarMasPublicaciones();
            }
        });




    inicializar();
    const years = [];
    const busquedas = [];

    function like(id) {
        var likeButton = $('#like-button-' + id);
        $.ajax({
            type: 'GET',
            url: `/libros/like/${id}`,
            dataType: 'json',
            success: function (data) {
                let msj = "";
                var claseActual = likeButton.attr('class');
                likeButton.removeClass(claseActual);
                if (claseActual == 'heart heart-active') {
                    likeButton.addClass('heart');
                    msj = "Desagregado de favoritos";

                }
                else{
                    likeButton.addClass('heart heart-active');
                    msj = "Agregado a favoritos";

                }
                var list = document.getElementById("toast");
                list.classList.add("show");
                list.innerHTML = '<i class="far fa-heart wish"></i>'+msj;
                setTimeout(function(){
                    list.classList.remove("show");
                },3000);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    document.getElementById('inputTitulo').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            search();
        }
    });

    function search() {
        var input = document.getElementById('inputTitulo');

        if (input!="") {
            busquedas.push(input.value);
        }else{
            return;
        }

        actualizarListaFiltros();
        input.value="";
    }

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



    function actualizarListaFiltros() {
        traerDatos(busquedas,years);

        const filterListDiv = document.getElementById('filterList');
        filterListDiv.innerHTML = '';

        let filtros = '';

        years.forEach((anio, index) => {
            filtros += `
                <span class="filter">${anio}</span>
                <button class="closefilter" onclick="eliminarFiltroAgno('${anio}')"><i class="fa fa-times"></i></button>
            `;
        });

        busquedas.forEach((busqueda, index) => {
            filtros += `
                <span class="filter">${busqueda}</span>
                <button class="closefilter" onclick="eliminarFiltroBusqueda('${busqueda}')"><i class="fa fa-times"></i></button>
            `;
        });

        filterListDiv.innerHTML = filtros;
    }

    function eliminarFiltroBusqueda(index) {
        var busquedaIndex = busquedas.indexOf(index);
        busquedas.splice(busquedaIndex, 1);
        actualizarListaFiltros();
    }

    function eliminarFiltroAgno(index) {
        var yearIndex = years.indexOf(index);
        years.splice(yearIndex, 1);
        actualizarListaFiltros();
    }

    function traerDatos(busquedas, agnos) {
        let formData = {
            agnos: agnos,
            busquedas: busquedas,
            page: 0
        };

        // Obtener el token CSRF desde la etiqueta meta
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        formData._token = csrfToken;

        $.ajax({
            type: 'POST',
            url: "{{ route('libros.buscar') }}",
            data: formData,
            success: function (data) {
                const principal = document.getElementById('principal');
                let lib = '';
                data.libros.data.forEach(libro => {
                    lib += `
                    <div class="marco">
                        <span slot="like" id="heart" class="heart ${libro.like==null?'':'heart-active'}"><i onclick="wishList()" class="fas fa-heart"></i></span>
                        <libro data-image="${libro.imagen}">
                            <h1 slot="titulo">${libro.nombre}</h1>
                            <p slot="descripcion">${libro.autor}, (${libro.agno})</p>
                            <a href="/libros/ver/${libro.id}" slot="boton" class="btn btn-primary btn-round">Leer</a>
                        </libro>
                    </div>
                    `;
                });
                principal.innerHTML = lib;
                setTimeout(() => {
                    inicializar();
                }, 10);
            },
            error: function (error) {
                console.error(error);
            }
        });

    }

    function cargarMasPublicaciones() {
        if (loading) return;
        loading = true;
            $spinner.show();

        let formData = {
            agnos: years,
            busquedas: busquedas,
            page: cont
        };

        // Obtener el token CSRF desde la etiqueta meta
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        formData._token = csrfToken;

        $.ajax({
            type: 'POST',
            url: "{{ route('libros.buscar') }}",
            data: formData,
            success: function (data) {
                if (Object.keys(data.libros.data).length > 0) {
                    const principal = document.getElementById('principal');
                    let lib = '';
                    data.libros.data.forEach(libro => {
                        lib += `
                        <div class="marco">
                            <span slot="like" id="heart" class="heart ${libro.like==null?'':'heart-active'}"><i onclick="wishList()" class="fas fa-heart"></i></span>
                            <libro data-image="${libro.imagen}">
                                <h1 slot="titulo">${libro.nombre}</h1>
                                <p slot="descripcion">${libro.autor}, (${libro.agno})</p>
                                <a href="/libros/ver/${libro.id}" slot="boton" class="btn btn-primary btn-round">Leer</a>
                            </libro>
                        </div>
                        `;
                    });
                    principal.innerHTML += lib;
                    setTimeout(() => {
                        inicializar();
                    }, 10);
                    cont++;
                    loading = false;
                }else{
                    loading=true;
                }
                $spinner.hide();

            },
            error: function (error) {
                console.error(error);
            }
        });
    }


function inicializar() {

    Vue.config.devtools = true;
    Vue.component('libro', {
    template: `
        <div class="card-wrap-libros"
        @mousemove="handleMouseMove"
        @mouseenter="handleMouseEnter"
        @mouseleave="handleMouseLeave"
        ref="libro">
        <div class="card-libros"
            :style="cardStyle">
            <div class="card-bg-libros" :style="[cardBgTransform, cardBgImage]"></div>
            <div class="card-info-libros">
            <slot name="titulo"></slot>
            <slot name="descripcion"></slot>
            <slot name="boton"></slot>
            </div>
        </div>
        </div>`,
    mounted() {
        this.width = this.$refs.libro.offsetWidth+200;
        this.height = this.$refs.libro.offsetHeight;
    },
    props: ['dataImage'],
    data: () => ({
        width: 0,
        height: 0,
        mouseX: 0,
        mouseY: 0,
        mouseLeaveDelay: null
    }),
    computed: {
        mousePX() {
        return this.mouseX / this.width;
        },
        mousePY() {
        return this.mouseY / this.height;
        },
        cardStyle() {
        const rX = this.mousePX * 30;
        const rY = this.mousePY * -30;
        return {
            transform: `rotateY(${rX}deg) rotateX(${rY}deg)`
        };
        },
        cardBgTransform() {
        const tX = this.mousePX * -40;
        const tY = this.mousePY * -40;
        return {
            transform: `translateX(${tX}px) translateY(${tY}px)`
        };
        },
        cardBgImage() {
        return {
            backgroundImage: `url(${this.dataImage})`
        };
        }
    },
    methods: {
        handleMouseMove(e) {
        this.mouseX = e.pageX - this.$refs.libro.offsetLeft - this.width / 2;
        this.mouseY = e.pageY - this.$refs.libro.offsetTop - this.height / 2;
        },
        handleMouseEnter() {
        clearTimeout(this.mouseLeaveDelay);
        },
        handleMouseLeave() {
        this.mouseLeaveDelay = setTimeout(() => {
            this.mouseX = 0;
            this.mouseY = 0;
        }, 10);
        }
    }
    });
    const app = new Vue({
    el: '#principal'
    });

}

</script>


@endsection
