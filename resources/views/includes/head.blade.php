<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>@yield('meta_title') - {{ env('APP_NAME') }}</title>
@hasSection('meta_keywords')
<meta name="keywords" content="@yield('meta_keywords')">
@endif
@hasSection('meta_description')
<meta name="description" content="@yield('meta_description')">
@endif
<link href="https://fonts.googleapis.com/css?family=Lato:300,700|Open+Sans:400,700|Roboto:300,700,900" rel="stylesheet">
<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="/assets/vendor/fontawesome/js/fontawesome-all.min.js"></script>
<link href="/assets/css/normalize.css" rel="stylesheet">
@if(Request::is('product'))
<link href="/assets/vendor/swiper/css/swiper.min.css" rel="stylesheet">
@endif
<link href="/assets/css/mintgreen.css" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
<link rel="manifest" href="/assets/favicon/site.webmanifest">
<link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#00a300">
<meta name="theme-color" content="#ffffff">
