@extends('layouts.app')

@section('content')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: "Arial";
    }

    .page {
      min-height: 90vh;
      overflow: hidden;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
    }

    .circle-carousel {
      position: relative;
      padding-top: 100%;
    }

    .circle-carousel .slides {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .circle-carousel .slide {
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      opacity: 0;
    }

    .circle-carousel .slide.active {
      z-index: 1;
      opacity: 1;
    }

    .circle-carousel .pagination {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
      width: 90%;
      height: 90%;
      border-radius: 50%;
      border: 3px #fff solid;
      transition-property: transform;
      transition-timing-function: ease-out;
      pointer-events: none;
      user-select: none;
    }

    .circle-carousel .pagination .dot {
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top: 0;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      pointer-events: auto;
      transition: 0.9s;
      background: #248da2;
    }

    .circle-carousel .pagination .dot:hover {
      transform: translate(-50%, -50%) scale(1.05);
      cursor: pointer;
      background: #826ee6;
      color: #fff;
    }

    .circle-carousel .pagination .item {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 50%;
    }

    .circle-carousel .pagination .item.active .dot {
      background: #654be4;
      color: #fff;
    }


    .imagen-circular {
      width: 93%;
      height: 93%;
      border-radius: 50%;
      border: 0px;
      background-size: cover;
    }

    .texto{
        font-size: 70px;
        color: #fff;
    }

    .contenedor{
        text-align: center;
        position: relative;
      top: 50%;
      transform: translateY(-50%);
    }


    @media (max-width: 600px) {
      .texto{
        font-size: 50px;
        color: #fff;
      }
    }
  </style>
<main class="page mt-3">
    <div class="container">
      <div class="circle-carousel" data-speed="2000" data-autoplay="2500">
        <div class="slides">
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/SUDOKU.jpg') }}">
                <div class="contenedor">
                    <b class="texto">SUDOKU</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'sudoku') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/AHORCADO.jpg') }}">
                <div class="contenedor">
                    <b class="texto">AHORCADO</b>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'ahorcado') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/AJEDREZ.jpg') }}">
                <div class="contenedor">
                    <b class="texto">AJEDREZ</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'ajedrez') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/BLOQUES.jpg') }}">
                <div class="contenedor">
                    <b class="texto">BLOQUES</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'bloques') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/BOLA COLOR.jpg') }}">
                <div class="contenedor">
                    <b class="texto">BOLA COLOR</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'bola_color') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/DESCUBRE CAMINO.jpg') }}">
                <div class="contenedor">
                    <b class="texto">DESCUBRE CAMINO</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'descubre_camino') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/SIMILAR EMOJI.jpg') }}">
                <div class="contenedor">
                    <b class="texto">SIMILAR <br> EMOJI</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'emojis') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/MEMORIZA SONIDO.jpg') }}">
                <div class="contenedor">
                    <b class="texto">MEMORIZA SONIDO</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <button class="btn"> <i class="fa fa-play"></i>  JUGAR</button>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/MEMORIZA IMAGEN.jpg') }}">
                <div class="contenedor">
                    <b class="texto">MEMORIZA IMAGEN</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <button class="btn"> <i class="fa fa-play"></i>  JUGAR</button>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/NANOGRAMAS.jpg') }}">
                <div class="contenedor">
                    <b class="texto">NANOGRAMA</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <button class="btn"> <i class="fa fa-play"></i>  JUGAR</button>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/MIDE NINJA.jpg') }}">
                <div class="contenedor">
                    <b class="texto">MIDE NINJA</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <button class="btn"> <i class="fa fa-play"></i>  JUGAR</button>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/ROMPECABEZAS 1.jpg') }}">
                <div class="contenedor">
                    <b class="texto">PUZZLE 1</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'puzzle1') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/ROMPECABEZAS 2.jpg') }}">
                <div class="contenedor">
                    <b class="texto">PUZZLE 2</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <a href="{{ route('juegos.panel', 'puzzle2') }}" class="btn btn-light"> <i class="fa fa-play"></i>  JUGAR</a>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/CRUCIGRAMA.jpg') }}">
                <div class="contenedor">
                    <b class="texto">CRUCIGRAMA</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <button class="btn"> <i class="fa fa-play"></i>  JUGAR</button>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/CUBO RUBIK.jpg') }}">
                <div class="contenedor">
                    <b class="texto">CUBO RUBIK</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <button class="btn"> <i class="fa fa-play"></i>  JUGAR</button>
                </div>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="{{ asset('assets/img/juegos/LABERINTO.jpg') }}">
                <div class="contenedor">
                    <b class="texto">LABERINTO</b>
                    <br>
                    <button class="btn btn-secondary"> <i class="fa fa-question-circle"></i>   ¿Como Jugar?</button>
                    <br><br>
                    <button class="btn"> <i class="fa fa-play"></i>  JUGAR</button>
                </div>
            </div>
          </div>

        </div>
        <div class="pagination">
          <div class="item">
            <div class="dot"><span><i class="fa fa-calculator"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-deaf"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-ship"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-cubes"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-circle"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-street-view"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-smile-o"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-bandcamp"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-window-restore"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-bars"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-arrows"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-puzzle-piece"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-table"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-building-o"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-cube"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-braille"></i></span></div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- partial -->
  <script>

    document.addEventListener("DOMContentLoaded", function () {
      var elementos = document.querySelectorAll(".imagen-circular");
      elementos.forEach(function (elemento) {
        var imagenURL = elemento.getAttribute("data-image");
        elemento.style.backgroundImage = "url('" + imagenURL + "')";
      });
    });

    /**
 * @module       Carousel with orbital pagination
 * @author       ATOM
 * @license      MIT
 * @version      v1.0.1
 */

    console.clear();

    // Core
    function initCarousel(options) {
      function CustomCarousel(options) {
        this.init(options);
        this.addListeners();
        return this;
      }

      CustomCarousel.prototype.init = function (options) {
        this.node = options.node;
        this.node.slider = this;
        this.slides = this.node.querySelector('.slides').children;
        this.slidesN = this.slides.length;
        this.pagination = this.node.querySelector('.pagination');
        this.pagTransf = 'translate( -50%, -50% )';
        this.dots = this.pagination.children;
        this.dotsN = this.dots.length;
        this.step = -360 / this.dotsN;
        this.angle = 0;
        this.next = this.node.querySelector('.next');
        this.prev = this.node.querySelector('.prev');
        this.activeN = options.activeN || 0;
        this.prevN = this.activeN;
        this.speed = 300; //options.speed ||
        this.autoplay = false; //options.autoplay ||
        this.autoplayId = null;

        this.setSlide(this.activeN);
        this.arrangeDots();
        this.pagination.style.transitionDuration = this.speed + 'ms';
        if (this.autoplay) this.startAutoplay();
      }

      CustomCarousel.prototype.addListeners = function () {
        var slider = this;

        if (this.next) {
          this.next.addEventListener('click', function () {
            slider.setSlide(slider.activeN + 1);
          });
        }

        if (this.prev) {
          this.prev.addEventListener('click', function () {
            slider.setSlide(slider.activeN - 1);
          });
        }

        for (var i = 0; i < this.dots.length; i++) {
          this.dots[i].addEventListener('click', function (i) {
            return function () { slider.setSlide(i); }
          }(i));
        }

        if (this.autoplay) {
          this.node.addEventListener('mouseenter', function () {
            slider.stopAutoplay();
          });

          this.node.addEventListener('mouseleave', function () {
            slider.startAutoplay();
          });
        }
      };

      CustomCarousel.prototype.setSlide = function (slideN) {
        this.slides[this.activeN].classList.remove('active');
        if (this.dots[this.activeN]) this.dots[this.activeN].classList.remove('active');

        this.prevN = this.activeN;
        this.activeN = slideN;
        if (this.activeN < 0) this.activeN = this.slidesN - 1;
        else if (this.activeN >= this.slidesN) this.activeN = 0;

        this.slides[this.activeN].classList.toggle('active');
        if (this.dots[this.activeN]) this.dots[this.activeN].classList.toggle('active');

        this.rotate();
      };

      CustomCarousel.prototype.rotate = function () {
        if (this.activeN < this.dotsN) {
          this.angle += function (dots, next, prev, step) {
            var inc, half = dots / 2;
            if (prev > dots) prev = dots - 1;
            if (Math.abs(inc = next - prev) <= half) return step * inc;
            if (Math.abs(inc = next - prev + dots) <= half) return step * inc;
            if (Math.abs(inc = next - prev - dots) <= half) return step * inc;
          }(this.dotsN, this.activeN, this.prevN, this.step)

          this.pagination.style.transform = this.pagTransf + 'rotate(' + this.angle + 'deg)';
        }
      };

      CustomCarousel.prototype.startAutoplay = function () {
        var slider = this;

        this.autoplayId = setInterval(function () {
          slider.setSlide(slider.activeN + 1);
        }, this.autoplay);
      };

      CustomCarousel.prototype.stopAutoplay = function () {
        clearInterval(this.autoplayId);
      };

      CustomCarousel.prototype.arrangeDots = function () {
        for (var i = 0; i < this.dotsN; i++) {
          this.dots[i].style.transform = 'rotate(' + 360 / this.dotsN * i + 'deg)';
        }
      };

      return new CustomCarousel(options);
    }


    // Init
    var plugins = {
      customCarousel: document.querySelectorAll('.circle-carousel')
    }

    document.addEventListener('DOMContentLoaded', function () {
      if (plugins.customCarousel.length) {
        for (var i = 0; i < plugins.customCarousel.length; i++) {
          var carousel = initCarousel({
            node: plugins.customCarousel[i],
            speed: plugins.customCarousel[i].getAttribute('data-speed'),
            autoplay: plugins.customCarousel[i].getAttribute('data-autoplay')
          });
        }
      }
    });
  </script>
@endsection
