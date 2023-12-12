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