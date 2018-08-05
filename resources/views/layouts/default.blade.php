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
  <script type="text/javascript">
  $("#state").append('<option>Province/State</option>');
  $("#city").append('<option>City</option>');
  $.ajax({
    type:"GET",
    url:"{{url('api/get-product-list')}}",
    success:function(res){
      if(res){
        $("#products").append('<option>Choose your model</option>');
        $.each(res,function(key,value){
          $("#products").append('<option value="'+value+'">'+value+'</option>');
        });

      }else{
        $("#products").empty();
        $("#products").append('<option>Choose your model</option>');
      }
    }
  });
  $('#country').change(function(){
    var countryNAME = $(this).val();
    if(countryNAME){
      $.ajax({
        type:"GET",
        url:"{{url('api/get-state-list')}}?country_name="+countryNAME,
        success:function(res){
          if(res){
            $("#state").empty();
            $("#city").empty();
            $("#state").append('<option>Province/State</option>');
            $("#city").append('<option>City</option>');
            $.each(res,function(key,value){
              $("#state").append('<option value="'+value+'" data-country="'+countryNAME+'">'+value+'</option>');
            });

          }else{
            $("#state").empty();
            $("#city").empty();
          }
        }
      });
    }else{
      $("#state").empty();
      $("#city").empty();
    }
  });
  $('#state').on('change',function(){
    var countryNAME = $(this).find(':selected').attr('data-country');
    var stateNAME = $(this).val();
    //console.log(countryNAME + stateNAME);
    if(stateNAME){
      $.ajax({
        type:"GET",
        url:"{{url('api/get-city-list')}}?state_name="+stateNAME+"&country_name="+countryNAME,
        success:function(res){
          if(res){
            $("#city").empty();
            $.each(res,function(key,value){
              $("#city").append('<option value="'+key+'">'+value+'</option>');
            });

          }else{
            $("#city").empty();
          }
        }
      });
    }else{
      $("#city").empty();
    }

  });
</script>

{!! NoCaptcha::renderJs() !!}
</body>
</html>
