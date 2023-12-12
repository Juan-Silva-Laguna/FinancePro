@extends('layouts.app')

@section('content')
<style>
        body {
            font-family: Arial, sans-serif;
        }

        .comment-input-container {
            width: 70%;
        }
        
        .post img {
            max-width: 100%; /* Limita el ancho máximo al 100% del contenedor */
            max-height: 100%; /* Limita la altura máxima al 100% del contenedor */
        }

        .comment-input {
            flex: 1; 
            width: 100%;
            resize: none;
            overflow: hidden;
        }

        .comment-input-wrapper {
            display: flex; /* Utiliza flexbox para alinear elementos en una fila */
            align-items: center; /* Alinea verticalmente en el centro */
        }

        .comment-button {
            align-self: flex-end;
            margin-left: 10px; /* Agrega un espacio entre el textarea y el botón */
        }

        #post-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        #post-form textarea {
            width: 100%;
            height: 100px;
            resize: none;
        }

        

        #file-input {
            display: none;
        }

        #file-label {
            /* background-color: #007bff;
            color: #fff; */
            padding: 10px 20px;
            cursor: pointer;
            border: none;
        }

        #file-label i {
            margin-right: 5px;
        }

        #posts {
            max-width: 600px;
            margin: 20px auto;
        }

        .post {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .post-actions {
            display: flex;
            margin-top: 10px;
            /* justify-content: space-between; */
            align-items: center;
        }

        .post-actions button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
            margin-right: 10px;
        }

        .post-actions a {
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
            margin-right: 10px;
        }

        .author-info {
            margin-bottom: 10px;
            position: relative;
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

         /* Estilo para identar los comentarios */
         .comment {
            margin-top: 20px;
            margin-left: 20px;
        }

        /* Estilo para la información del perfil de los comentarios */
        .comment-profile {
            font-weight: bold;
            /* margin-bottom: 5px; */
        }

        .delete-cometario{
            padding: 0px;
        }
        /* Estilo para el menú desplegable */
        .dropdown {
            position: absolute;
            display: inline-block;
            /* margin-left: 60%; */
            right: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dropdown .fa-ellipsis-v {
            font-size: 18px;
            color: #555;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 0;
            right: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .dropdown-content a:hover {
            background-color: #f2f2f2;
        }

        .dropdown-content i {
            margin-right: 10px;
        }

    </style>
</head>
<body>

				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Testimonios</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Testimonios</a>
							</li>
							
						</ul>
					</div>
                    
                        <div id="post-form" class="container mt-3">
                            <div class="author-info" >
                                <img src="http://127.0.0.1:8000/assets/img/profile.jpg" class="author-avatar" alt="Nombre de Usuario">
                                <p>{{ auth()->user()->nombres }}</p>
                                <div class="dropdown">
                                    <button id="toggle-form-button" type="button" class="btn btn-icon btn-round btn-default">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="form-container" style="display: none">
                                <form method="POST" action="{{ route('testimonios.store') }}" enctype="multipart/form-data">
                                @csrf
                                    <textarea id="post-text" name="descripcion" placeholder="Escribe tu publicación..."></textarea>
                                    <div id="file-input-container">
                                        <label id="file-label" for="file-input">
                                            <i class="fas fa-images"></i> 
                                        </label>
                                        <input type="file" name="imagen" id="file-input" accept="image/*">
                                    </div>
                                    <button type="submit" id="post-button" class="btn btn-primary btn-round">Publicar</button>
                                </form>
                            </div> 
                        </div>
                     
                        <div id="posts">
                            <!-- Aquí se mostrarán las publicaciones -->
                            @foreach ($testimonios as $testimonio)
                            <div class="post" id="post-{{$testimonio->id}}">
                                <div class="author-info">
                                    <img src="{{ $testimonio->foto==null? asset('assets/img/sinfoto.jpeg'): asset('images/' . $testimonio->foto)}}" class="author-avatar" alt="Nombre de Usuario">
                                    <p>{{ $testimonio->nombres }}</p>
                                    <div class="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <div class="dropdown-content">
                                            <a href="{{ route('testimonios.show', $testimonio->id) }}"><i class="fas fa-eye"></i> Ver</a>
                                            <a href="{{ route('testimonios.show', $testimonio->id) }}" id="copyLink"><i class="fas fa-copy"></i> Copiar</a>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('testimonios.show', $testimonio->id) }}" target="_blank"> <i class="fas fa-share"></i> Facebook</a>
                                            <a href="https://api.whatsapp.com/send?text={{ route('testimonios.show', $testimonio->id) }}" target="_blank"> <i class="fas fa-share"></i> Whatsapp</a>
                                            @if ($testimonio->id_usuario == auth()->user()->id)
                                                <a class="edit-button btn btn-warning btn-border" href="#" data-id="{{ $testimonio->id }}"><i class="fas fa-edit"></i> Editar</a>
                                                <button class="delete-testimonio btn btn-danger btn-border" data-id="{{ $testimonio->id }}">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Formulario de edición (inicialmente oculto) -->
                                <div class="edit-form" data-id="{{ $testimonio->id }}" style="display: none;">
                                        <form class="update-form" data-id="{{ $testimonio->id }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="comment-input-container" style="width: 100%">
                                                <textarea name="descripcion" oninput="autoResize(this)"  class="comment-input" style="height: 52px; width: 100%">{{ $testimonio->descripcion }}</textarea>
                                            </div>
                                            <button type="submit" id="post-button" class="btn btn-primary btn-round">Finalizar</button>
                                            <!-- <button class="btn btn-default btn-round">Cancelar</button> -->
                                        </form>
                                    </div>
                                <p class="edit-p" data-id="{{ $testimonio->id }}" >{{ $testimonio->descripcion }}</p>
                                @if ($testimonio->imagen)
                                    <img src="{{ asset('images/' . $testimonio->imagen) }}" alt="{{ $testimonio->descripcion }}">
                                @endif
                                <div class="post-actions" style="display: flex;">
                                    <div >
                                        @if (in_array($testimonio->id, $likesData)) 
                                            <b><a id="like-button-{{ $testimonio->id }}" data-action="likeMenos" data-id="{{ $testimonio->id }}" class="like-button" style="color: #6861ce;"><i class="fas fa-heart"></i> Me Encanta ({{ $testimonio->likes }})</a></b>
                                        @else
                                            <b><a id="like-button-{{ $testimonio->id }}" data-action="likeMas" data-id="{{ $testimonio->id }}" class="like-button"  style="color: #000;"><i class="fas fa-heart"></i> Me Encanta ({{ $testimonio->likes }})</a></b>
                                        @endif
                                    </div>
                                    <div style="flex: 1;">
                                        <form class="comentario-form" data-id="{{ $testimonio->id }}" style="width: 100%;">
                                            @csrf
                                            <div class="comment-input-container" style="width: 100%;">
                                                <div class="comment-input-wrapper">
                                                    <textarea class="comment-input" name="comentario" id="comentario-{{ $testimonio->id }}" oninput="autoResize(this)"  placeholder="Añadir comentario" style="height: 32px;"></textarea>
                                                    <button type="submit" class="comment-button"><i class="fas fa-comment"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="comment">
                                    <div id="comment-extra-{{$testimonio->id}}">

                                    </div>
                                @foreach ($testimonio->comentariosUlt as $comentario)
                                    <div style="display: flex;" id="comment-profile-{{ $comentario->id }}">
                                        <div style="flex: 0.8;">
                                            <img src="{{ $comentario->usuario->foto==null? asset('assets/img/sinfoto.jpeg'): asset('images/' . $comentario->usuario->foto)}}" style="width: 35px; height: 35px;" class="author-avatar" alt="Nombre de Usuario">
                                        </div>
                                        <div style="flex: 6;">
                                            <div class="comment-profile">
                                                @if ( $comentario->usuario->id == auth()->user()->id)
                                                    {{ $comentario->usuario->nombres }}
                                                    <button data-id="{{ $comentario->id }}" class="delete-cometario btn btn-danger btn-link">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @else
                                                    {{ $comentario->usuario->nombres }}
                                                @endif

                                            
                                            </div>
                                            <p>{{ $comentario->descripcion }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                @if ($testimonio->comentarios > 3) 
                                    <div class="text-center">
                                        <hr>
                                        <b><a href="{{ route('testimonios.show', $testimonio->id) }}" style="color: #6861ce;">Ver Mas </a></b>
                                    </div>
                                @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="spinner" style="display: none;" class="text-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif?20151024034921" alt="Cargando..." width="90">
                        </div>
				</div>
	<script>
         let cont = 2;
         let loading = false;
         const $spinner = $('#spinner');

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                cargarMasPublicaciones();
            }
        });

        function cargarMasPublicaciones() {
            if (loading) return;
            loading = true;
             $spinner.show(); 
            $.get('/testimonios/cargar-mas-publicaciones', { page: cont }, function(data) {
                if (data.trim() !== "") {
                    $('#posts').append(data);
                    cont++;
                    loading = false;
                }else{
                    loading=true;
                }
                $spinner.hide(); 
            });
        }


        function autoResize(textarea) {
            textarea.style.height = 'auto'; // Restablece la altura a automático
            textarea.style.height = (textarea.scrollHeight) + 'px'; // Ajusta la altura según el contenido
        }


        // jQuery
        $(document).ready(function () {
            //likes
            $('.like-button').on('click', function (e) {
                e.preventDefault(); // Evita que el enlace se siga

                var id = $(this).data('id');
                var action = $(this).data('action');
                var $likeButton = $('#like-button-' + id);

                $.ajax({
                    type: 'GET',
                    url: `/testimonios/like/${id}`,
                    dataType: 'json',
                    success: function (data) {
                        $likeButton.html(`<i class="fas fa-heart"></i> Me Encanta (${data.likes})`);
                        console.log(action);
                        if (action === 'likeMas') {
                            $likeButton.css('color', '#6861ce');
                            $likeButton.data('action', 'likeMenos');
                        } else {
                            $likeButton.css('color', '#000');
                            $likeButton.data('action', 'likeMas');
                        }
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });

            //comentar
            $('.comentario-form').on('submit', function (e) {
                e.preventDefault(); // Evita el envío tradicional del formulario

                // Obtiene los datos del formulario
                var formData = new FormData(this);
                var id = $(this).data('id');
                var $commentExtra = $('#comment-extra-' + id);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('comentarios.add','') }}" + "/" + id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#comentario-'+id).val('');
                        let coment = `
                        <div style="display: flex;"  id="comment-profile-${data.comentario.id}">
                            <div style="flex: 0.8;">
                                <img src="{{ auth()->user()->foto==null? asset('assets/img/sinfoto.jpeg'): asset('images/' . auth()->user()->foto)}}" style="width: 35px; height: 35px;" class="author-avatar" alt="Nombre de Usuario">
                            </div>
                            <div style="flex: 6;">
                                <div class="comment-profile">
                                    {{ auth()->user()->nombres }}
                                    <button data-id="${data.comentario.id}" class="delete-cometario btn btn-danger btn-link">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <p>${data.comentario.descripcion}</p>
                            </div>
                        </div>
                        `;
                        $commentExtra.prepend(coment);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });

            //DELETE TESTIMONIO
            $('.delete-testimonio').on('click', function () {						
                var id = $(this).data('id');										
                swal({
                    text: '¿Quieres eliminar este testimonio?',
                    icon: 'warning',
                    buttons:{
                        cancel: {
                            visible: true,
                            text : 'Cancelar',
                            color: '#d33',
                        },        			
                        confirm: {
                            text : 'Sí, eliminar',
                            color: '#3085d6',
                        }
                    }
                }).then((willDelete) => {
                    if (willDelete) {
                        $('#post-' + id).remove();
                        $.ajax({
                            type: 'DELETE',
                            url: "{{ route('testimonios.destroy','') }}" + "/" + id,
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function (data) {
                                $('#post-' + id).remove();
                            },
                            error: function (error) {
                                console.error(error);
                            }
                        });
                    } 
                });
            });

            //DELETE COMENTARIO
            $('body').on('click', '.delete-cometario', function () {					
                var id = $(this).data('id');										
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('comentarios.destroy','') }}" + "/" + id,
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        $('#comment-profile-' + id).remove();
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
                   
            });

            //UPDATE TESTIMONIO
            $('.update-form').on('submit', function (e) {
                e.preventDefault(); // Evita el envío tradicional del formulario
                var id = $(this).data('id');	
                // Obtiene los datos del formulario
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('testimonios.update','') }}" + "/" + id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        let editP = document.querySelector(`.edit-p[data-id="${id}"]`);
                        editP.innerHTML = data.descripcion;
                        editP.style.display = 'block';

                        const editForm = document.querySelector(`.edit-form[data-id="${id}"]`);
                        editForm.style.display = 'none';
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });

        });

        



        document.addEventListener('DOMContentLoaded', function() {
            const copyLinkButton = document.getElementById('copyLink');
            
            copyLinkButton.addEventListener('click', function(event) {
                event.preventDefault(); // Evitar que el enlace se abra

                // Seleccionar el enlace
                const linkToCopy = this.href;

                // Crear un elemento de entrada de texto temporal
                const tempInput = document.createElement('input');
                tempInput.value = linkToCopy;

                // Agregar el elemento al documento
                document.body.appendChild(tempInput);

                // Seleccionar y copiar el contenido del elemento de entrada de texto
                tempInput.select();
                document.execCommand('copy');

                // Eliminar el elemento de entrada de texto temporal
                document.body.removeChild(tempInput);

                // Puedes mostrar un mensaje de confirmación al usuario
                alert('Enlace copiado al portapapeles: ' + linkToCopy);
            });
        });




        // Escuchar el clic en el enlace o botón "Editar"
        document.querySelectorAll('.edit-button').forEach((editButton) => {
            editButton.addEventListener('click', (e) => {
                e.preventDefault();
                const postId = e.target.getAttribute('data-id');
                
                // Ocultar todos los formularios de edición
                document.querySelectorAll('.edit-form').forEach((editForm) => {
                    editForm.style.display = 'none';
                });
                
                // Mostrar el formulario de edición correspondiente al testimonio seleccionado
                const editForm = document.querySelector(`.edit-form[data-id="${postId}"]`);
                editForm.style.display = 'block';

                let editP = document.querySelector(`.edit-p[data-id="${postId}"]`);
                editP.style.display = 'none';
            });
        });




        const postButton = document.getElementById("post-button");
        const postText = document.getElementById("post-text");
        const fileInput = document.getElementById("file-input");
        const postsContainer = document.getElementById("posts");

        // Contador de Me Encanta
        let likesCount = 0;


        const toggleFormButton = document.getElementById("toggle-form-button");
        const formContainer = document.getElementById("form-container");

        toggleFormButton.addEventListener("click", () => {
            if (formContainer.style.display === "none") {
                formContainer.style.display = "block";
                toggleFormButton.innerHTML = '<i class="fas fa-chevron-up"></i>';
            } else {
                formContainer.style.display = "none";
                toggleFormButton.innerHTML = '<i class="fas fa-chevron-down"></i>';
            }
        });

    </script>
@endsection
