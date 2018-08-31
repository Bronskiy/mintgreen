<div class="container">
  <div class="container">
    @foreach ($сommonData as $value)
    <div class="row">
      <div class="col-md-8">
        <h4>Get in touch.<span class="mobile-divider"></span> Start Minting Green.</h4>
        <div class="footer-contacts">
          <p><i class="fas fa-envelope"></i> <a href="mailto:{{ $value->common_email }}">{{ $value->common_email }}</a></p>
          <p><i class="fas fa-phone"></i> <a href="tel:+{{ preg_replace('/\D+/', '', $value->common_phone) }}">{{ $value->common_phone }}</a></p>
          <p><i class="fas fa-map-marker-alt"></i> {!! $value->common_address !!}</p>
        </div>
      </div>
      <div class="col-md-4 text-right">
        <ul class="list-inline social-bottom">
          <li class="list-inline-item"><a href="{{ $value->common_linked_in }}"><i class="fab fa-linkedin-in"></i></a></li>
          <li class="list-inline-item"><a href="{{ $value->common_twitter }}"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="{{ $value->common_facebook }}"><i class="fab fa-facebook-f"></i></a></li>
          <li class="list-inline-item"><a href="{{ $value->common_instagram }}"><i class="fab fa-instagram"></i></a></li>
        </ul>
        <h6>Join our mailing list!</h6>
        {!! Form::open(array('url' => 'subscribe/store', 'class'=>'subscribe-form', 'autocomplete' => 'off')) !!}
          <div class="input-group">
            {!! Form::email('subscriber_email', old('subscriber_email'), array('class'=>'form-control', 'placeholder' => "Your email address")) !!}
            {!! Form::submit( 'Submit' , array('class' => 'btn btn-secondary')) !!}
          </div>
          {!! Form::close() !!}
      </div>
    </div>
    @endforeach
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        @if ( ! $footerMenu->isEmpty() )
        <ul class="list-inline">
          @foreach ($footerMenu->where('mainmenu_id',0)->sortBy('footer_menu_order') as $value)
          <li class="list-inline-item"><a href="{{ $value->footer_menu_link }}">{{ $value->footer_menu_name }}</a></li>
          @endforeach
        </ul>
        @endif
      </div>
      <div class="col-md-6 copyright">
        <p class="m-0 text-white">&#9400; <?php echo date("Y"); ?> Mintgreen Blockchain Innovation Corp.</p>
      </div>
    </div>
  </div>
</div>
