<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.head')

    @foreach ($сommonData as $value)
    {!! $value->common_google_tag_head !!}
    @endforeach
</head>
<body>

    @foreach ($сommonData as $value)
    {!! $value->common_google_tag_bottom !!}
    @endforeach
  <style>
  #overlay {
    background: #ffffff;
    color: #666666;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 5000;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 25%;
  }
</style>
<div id="overlay">
  <img src="/assets/img/Preloader_7.gif" alt="Loading" /><br/>
  Loading...
</div>
@include('includes.header')
<main role="main">
  @yield('content')
</main>
<footer class="footer">
  @include('includes.footer')
</footer>
@include('includes.requestModal')
@if(Request::is('team'))
@include('includes.teamModal')
@endif
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.inputmask.bundle.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/jquery.paroller.min.js"></script>
<script src="/assets/js/main.js"></script>
@if(Request::is('product'))
<script src="/assets/vendor/swiper/js/swiper.min.js"></script>
<script>
var galleryTop = new Swiper('.gallery-top', {
  centeredSlides: true,
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
var galleryThumbs = new Swiper('.gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 'auto',
  touchRatio: 0.2,
  slideToClickedSlide: true,
  slidesOffsetAfter: 800,
});
galleryTop.controller.control = galleryThumbs;
galleryThumbs.controller.control = galleryTop;
</script>
@endif
@if(Request::is('team'))
<script type="text/javascript">
jQuery(document).ready(function($) {
  if (window.history && window.history.pushState) {
    window.history.pushState('back', null, '/team');
    $(window).on('popstate', function() {
      $('#memberModal').modal('toggle');
    });
  }

});
var infoModal = $('#memberModal');
$('.team-item-container').on('click', function(){
  $.ajax({
    type: "GET",
    url: "{{url('api/get-team-member')}}"+"/"+$(this).data('id'),
    dataType: 'json',
    success: function(data){
      memberPhoto = (data.team_member_photo === null ? 'http://via.placeholder.com/240?text=user' : "{{ asset('uploads') }}" + '/' + data.team_member_photo);
      htmlData = '<div class="modal-left-side"><div class="img-wrapper" style="background-image:url(&quot;'+memberPhoto+'&quot;)"><img src="'+memberPhoto+'"></div></div><div class="modal-right-side"><h4>'+data.team_member_name+'</h4>'
      +(data.team_member_position === null ? '' : '<h5>'+data.team_member_position+'</h5>')
      +(data.team_member_quote === null ? '' : '<h6>'+data.team_member_quote+'</h6>')
      +(data.team_member_hobby === null ? '' : '<p class="member-hobbies">'+data.team_member_hobby+'</p>')
      +(data.team_member_description === null ? '' : '<div class="member-info">'+data.team_member_description+'</div>')
      +(data.team_member_linkedin === null ? '' : '<p><a href="'+data.team_member_linkedin+'" class="linkedin-link" target="_blank"><i class="fab fa-linkedin"></i></a></p>')
      +(data.team_member_email === null ? '' : '<p class="member-email"><a href="mailto:'+data.team_member_email+'">'+data.team_member_email+'</a></p>')
      +'</div>';
      infoModal.find('.modal-body').html(htmlData);
      infoModal.modal('show');
    }
  });
  return false;
});

</script>
@endif
<script type="text/javascript">
jQuery(document).ready(function($) {
  wow = new WOW(
    {
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       0,          // default
      mobile:       false,       // default
      live:         true        // default
    }
  )
  wow.init();
});
/* =====================================================================
Select Box
===================================================================== */
/*
if ($('select').length) {
if (!$('link[href="/assets/js/plugins/chosen/chosen.min.css"]').length) {
$('head').prepend('<link rel="stylesheet" href="/assets/js/plugins/chosen/chosen.min.css">');
$.getScript('/assets/js/plugins/chosen/chosen.jquery.min.js', function () {
gfortSelectfn('.first-select');
});
} else {
$.getScript('/assets/js/plugins/chosen/chosen.jquery.min.js', function () {
gfortSelectfn('.first-select');
});
}
}
*/
/* =========================================================================
Select Box
========================================================================= */

function gfortSelectfn(selectClass) {
  $(selectClass).each(function () {

    var el = $(this),
    disableSearch = true,
    elAttr = el.attr('data-select-search');

    if (elAttr === 'true') {
      disableSearch = false;
    }

    el.chosen({
      width: '100%',
      inherit_select_classes: true,
      disable_search: disableSearch
    }).addClass('gfort-chosen-select');

  });
}
gfortSelectfn('select');

$("#state").append('<option>Province / State</option>');
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
      $("#products").trigger("chosen:updated");

    }else{
      $("#products").empty();
      $("#products").append('<option>Choose your model</option>');
      $("#products").trigger("chosen:updated");
    }
    gfortSelectfn('#products');
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
          $("#state").append('<option>Province / State</option>');
          $("#city").append('<option>City</option>');
          $("#state, #city").trigger("chosen:updated");
          $.each(res,function(key,value){
            $("#state").append('<option value="'+value+'" data-country="'+countryNAME+'">'+value+'</option>');
          });
          $("#state").trigger("chosen:updated");
          gfortSelectfn('#state, #city');

        }else{
          $("#state").empty();
          $("#city").empty();
          $("#state, #city").trigger("chosen:updated");
          gfortSelectfn('#state, #city');
        }
      }
    });
  }else{
    $("#state").empty();
    $("#city").empty();
    $("#state, #city").trigger("chosen:updated");
    gfortSelectfn('#state, #city');
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
          $("#city").trigger("chosen:updated");
          $.each(res,function(key,value){
            $("#city").append('<option value="'+key+'">'+value+'</option>');
          });
          $("#city").trigger("chosen:updated");
          gfortSelectfn('#city');

        }else{
          $("#city").empty();
          $("#city").trigger("chosen:updated");
          gfortSelectfn('#city');
        }
      }
    });
  }else{
    $("#city").empty();
    $("#city").trigger("chosen:updated");
    gfortSelectfn('#city');
  }

});
jQuery(document).ready(function ($) {

  $("#state, #city").trigger("chosen:updated");
  
  wow = new WOW(
    {
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       0,          // default
      mobile:       true,       // default
      live:         true        // default
    }
  )
  wow.init();
});
$(window).on('load', function(){
  $('#overlay').fadeOut();
});
</script>
{!! NoCaptcha::renderJs() !!}
@foreach ($сommonData as $value)
{!! $value->common_google_analytics !!}
@endforeach
</body>
</html>
