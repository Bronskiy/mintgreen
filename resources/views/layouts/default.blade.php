<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.head')
</head>
<body>
  @include('includes.header')
  <main role="main">
    @yield('content')
  </main>
  <footer class="footer">
    @include('includes.footer')
  </footer>
  @include('includes.requestModal')
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/main.js"></script>
  @if(Request::is('product'))
  <script src="/assets/vendor/swiper/js/swiper.min.js"></script>
  <script>
  var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    centeredSlides: true,
    slidesPerView: 'auto',
    touchRatio: 0.2,
    slideToClickedSlide: true,
  });
  galleryTop.controller.control = galleryThumbs;
  galleryThumbs.controller.control = galleryTop;
  </script>
  @endif
  <script type="text/javascript">
  $( ".test2" ).click(function() {
    });
  </script>
  {!! NoCaptcha::renderJs() !!}
</body>
</html>
