<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> {{ $content->website_name }} - {{ $content->website_description }}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}uploads/content/{{ $content->website_favicon }}">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400&amp;display=swap"
      rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/vendor/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/vendor/edumall-icon.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/vendor/bootstrap.min.css">
    {{-- dropify --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"
      integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Sweet Alert-->
    <link href="{{ asset('/assets') }}/admin/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/plugins/aos.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/plugins/jquery.powertip.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/plugins/glightbox.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/plugins/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/plugins/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/plugins/select2.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/web/css/style.css">

    @stack('style')
</head>
