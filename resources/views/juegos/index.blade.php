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
      border: 2px #000 solid;
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
      background: #1f2845;
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

    .circle-carousel .next,
    .circle-carousel .prev {
      position: absolute;
      bottom: 6%;
      z-index: 1;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 0.3em;
      transition: 0.3s;
      user-select: none;
    }

    .circle-carousel .next:before,
    .circle-carousel .prev:before {
      content: "";
      position: absolute;
      top: 50%;
      z-index: -1;
      transform: translate(-50%, -50%);
      border-style: solid;
      border-color: transparent black;
      transition: 0.3s;
    }

    .circle-carousel .next:hover,
    .circle-carousel .prev:hover {
      cursor: pointer;
      color: black;
    }

    .circle-carousel .next:hover:before,
    .circle-carousel .prev:hover:before {
      border-color: transparent white;
      transform: translate(-50%, -50%) scale(1.05);
    }

    .circle-carousel .next {
      right: 5%;
    }

    .circle-carousel .next:before {
      left: 65%;
      border-width: 30px 0 30px 70px;
    }

    .circle-carousel .prev {
      left: 5%;
    }

    .circle-carousel .prev:before {
      left: 35%;
      border-width: 30px 70px 30px 0;
    }



    .imagen-circular {
      width: 93%;
      height: 93%;
      border-radius: 50%;
      border: 0px;
      /* background-image: url(''); */
      background-size: cover;
    }
  </style>

<main class="page">
    <div class="container">
      <div class="circle-carousel" data-speed="2000" data-autoplay="2500">
        <div class="slides">
          <div class="slide">
            <div class="imagen-circular"
              data-image="https://www.candb.com/site/candb/images/artwork/Joker_Persona-5_Atlus_1920.jpg">
              <br><br>
              <center>
                <h1>Hola Mundo</h1>
              </center>
            </div>
          </div>
          <div class="slide">
            <div class="imagen-circular"
              data-image="https://i.pinimg.com/474x/f8/db/65/f8db6500941913a22d45717f36a834b2.jpg">
              <br><br>
              <center>
                <h1>Hola Mundo 222</h1>
              </center>
            </div>
          </div>
          <div class="slide">
            <h2>Slide 3</h2>
          </div>
          <div class="slide">
            <h2>Slide 4</h2>
          </div>
          <div class="slide">
            <h2>Slide 5</h2>
          </div>
          <div class="slide">
            <h2>Slide 6</h2>
          </div>
          <div class="slide">
            <h2>Slide 7</h2>
          </div>
          <div class="slide">
            <h2>Slide 8</h2>
          </div>
          <div class="slide">
            <h2>Slide 9</h2>
          </div>

        </div>
        <div class="pagination">
          <div class="item">
            <div class="dot"><span><i class="fa fa-bolt"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-rocket"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-bell"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-cogs"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-desktop"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-paw"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-share-alt"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-user"></i></span></div>
          </div>
          <div class="item">
            <div class="dot"><span><i class="fa fa-home"></i></span></div>
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
