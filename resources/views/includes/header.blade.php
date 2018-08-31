<nav class="navbar fixed-top navbar-expand-lg fixed-top">
  <div class="container">
    @foreach ($сommonData as $value)
    <a class="navbar-brand" href="/"><img src="{{ asset('uploads') . '/'.  $value->common_logo }}" alt="logo"></a>
    @endforeach
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <span class="mobile-hr"></span>
    <div class="collapse navbar-collapse justify-content-md-center" id="navbarResponsive">
      @if ( ! $mainMenu->isEmpty() )
      <ul class="navbar-nav">
        @foreach ($mainMenu->where('mainmenu_id',0)->sortBy('main_menu_order') as $value)
        <li class="nav-item {{{ (Request::is(preg_replace('|/|','',$value->menu_link)) ? 'active' : '') }}}"><a class="nav-link" href="{{ $value->main_menu_link }}">{{ $value->main_menu_name }}</a></li>
        @endforeach
      </ul>
      @endif
    </div>
    <span class="mobile-hr"></span>
    <div class="header-buttons">
      <a class="btn btn-outline-primary" data-toggle="modal" data-target="#myRequest" href="#">Request a quote</a>
      <a class="btn btn-outline-secondary" href="/invest">Invest</a>
    </div>
  </div>
</nav>
<header>

</header>
