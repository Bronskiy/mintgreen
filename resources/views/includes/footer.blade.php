<div class="container">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h4>Get in touch.<span class="mobile-divider"></span> Start Minting Green.</h4>
        @foreach ($сommonData as $value)
        <div class="footer-contacts">
          <p><a href="mailto:{{ $value->common_email }}"><i class="fas fa-envelope"></i> {{ $value->common_email }}</a></p>
          <p><a href="tel:+{{ preg_replace('/\D+/', '', $value->common_phone) }}"><i class="fas fa-phone"></i> {{ $value->common_phone }}</a></p>
          <p><a href="https://goo.gl/maps/roSFLUKbyJU2" target="_blank"><i class="fas fa-map-marker-alt"></i> {!! $value->common_address !!}</a></p>
        </div>
        @endforeach
      </div>
      <div class="col-md-4 text-right">
        <ul class="list-inline social-bottom">
          @foreach ($socialLinks as $value)
          <li class="list-inline-item" title="{{ $value->social_links_title }}"><a href="{{ $value->social_links_link }}" target="_blank">{!! $value->social_links_icon !!}</a></li>
          @endforeach
        </ul>
        <h6>Join our mailing list!</h6>
        {!! Form::open(array('url' => 'subscribe/store', 'class'=>'subscribe-form', 'autocomplete' => 'off')) !!}
        <div class="input-group">
          {!! Form::email('subscriber_email', old('subscriber_email'), array('class'=>'form-control', 'placeholder' => "Your email address", 'required'=>'required')) !!}
          {!! Form::submit( 'Submit' , array('class' => 'btn btn-secondary')) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
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
