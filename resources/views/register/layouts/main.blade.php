<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sekul | Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Swiper slider-->
    <link rel="stylesheet" href={{ asset("/blog/vendor/swiper/swiper-bundle.min.css") }}>
    <!-- Owl Carousel -->
    <link rel="stylesheet" href={{ asset("/blog/vendor/owl.carousel2/assets/owl.carousel.min.css") }}>
    <link rel="stylesheet" href={{ asset("/blog/vendor/owl.carousel2/assets/owl.theme.default.min.css") }}>
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href={{ asset("/blog/css/style.default.css") }} id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href={{ asset("/blog/css/custom.css") }}>
    <!-- Favicon-->
    <link rel="shortcut icon" href={{ asset("/blog/img/favicon.png") }}>
    <style>
      
        #page-container {
          position: relative;
          min-height: 100vh;
        }

        #content-wrap {
          padding-bottom: 5rem;    /* Footer height */
        }
        #footer {
          position: fixed;
          bottom: 0;
          width: 100%;
          height: 5rem;            /* Footer height */
        }
    </style>
  </head>
  <body>
    <!-- Header-->
    @include('login.partials.header')
    <!-- Container-->
    <div class="py-4 align-items-center" style="height: 521px" id="page-container">
      @yield('container')
    </div>
    <!-- Footer-->
    @include('login.partials.footer')
    <!-- JavaScript files-->
    <script src={{ asset("/blog/vendor/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("/blog/vendor/swiper/swiper-bundle.min.js") }}></script>
    <script src={{ asset("/blog/js/front.js") }}></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>