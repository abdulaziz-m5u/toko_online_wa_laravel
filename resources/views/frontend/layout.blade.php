<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Iphone Berkualitas Import</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Wish shop project" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}"
    />
    <link
      href="{{ asset('frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}"
    />
    <link
      href="{{ asset('frontend/plugins/colorbox/colorbox.css') }}"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}" />
    @stack('style-alt')
</head>
  <body>
    <div class="super_container">
      <!-- Header -->

      <header class="header">
        <div
          class="header_inner d-flex flex-row align-items-center justify-content-start"
        >
          <div class="logo"><a href="{{ route('homepage') }}">ISHOP</a></div>
          <nav class="main_nav">
            <ul>
              <li><a href="{{ route('homepage') }}">home</a></li>
              @foreach(\App\Models\Category::get()->take(4) as $category)
              <li><a href="{{ route('kategori', $category->slug) }}">{{ $category->name }}</a></li>
              @endforeach
            </ul>
          </nav>

          <div
            class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"
          >
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </header>

      <!-- Menu -->

      <div
        class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400"
      >
        <div class="menu_close_container">
          <div class="menu_close">
            <div></div>
            <div></div>
          </div>
        </div>
        <div class="logo menu_mm"><a href="{{ route('homepage') }}">ISHOP</a></div>
        <nav class="menu_nav">
          <ul class="menu_mm">
            <li><a href="{{ route('homepage') }}">home</a></li>
            @foreach(\App\Models\Category::get() as $category)
                <li><a href="{{ route('kategori', $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </nav>
      </div>

      <!-- Home -->

      @yield('content')

      <!-- Footer -->

      <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <div class="footer_logo"><a href="{{ route('homepage') }}">ISHOP</a></div>
              <nav class="footer_nav">
                <ul>
                  <li><a href="{{ route('homepage') }}">home</a></li>
                  @foreach(\App\Models\Category::get()->take(4) as $category)
                    <li><a href="{{ route('kategori', $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
              </nav>
              <div class="copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script>
                All rights reserved | ishop
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/colorbox/jquery.colorbox-min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    @stack('script-alt')
</body>
</html>
