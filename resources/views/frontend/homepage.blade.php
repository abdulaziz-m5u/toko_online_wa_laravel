@extends('frontend.layout')

@section('content')
<div class="home">
        <!-- Home Slider -->

        <div class="home_slider_container">
          <div class="owl-carousel owl-theme home_slider">
            <!-- Home Slider Item -->
            <div class="owl-item">
              <div
                class="home_slider_background"
                style="background-image: url({{ asset('frontend/images/home1.jpg') }})"
              ></div>
              <div class="home_slider_content">
                <div class="home_slider_content_inner">
                <div class="home_slider_subtitle">Iphone Berkualitas</div>
                  <div class="home_slider_title">Dapatkan Sekarang</div>
                </div>
              </div>
            </div>

            <!-- Home Slider Item -->
            <div class="owl-item">
              <div
                class="home_slider_background"
                style="background-image: url({{ asset('frontend/images/home2.jpg') }})"
              ></div>
              <div class="home_slider_content">
                <div class="home_slider_content_inner">
                  <div class="home_slider_subtitle">Iphone Berkualitas</div>
                  <div class="home_slider_title">Dapatkan Sekarang</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Home Slider Nav -->

          <div
            class="home_slider_next d-flex flex-column align-items-center justify-content-center"
          >
            <img src="{{ asset('frontend/images/arrow_r.png') }}" alt="" />
          </div>

          <!-- Home Slider Dots -->

          <div class="home_slider_dots_container">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="home_slider_dots">
                    <ul
                      id="home_slider_custom_dots"
                      class="home_slider_custom_dots"
                    >
                      <li class="home_slider_custom_dot active">
                        01.
                        <div></div>
                      </li>
                      <li class="home_slider_custom_dot">
                        02.
                        <div></div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="arrivals">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="section_title_container text-center">
                <div class="section_subtitle">pilihan</div>
                <div class="section_title">Produk Kami</div>
              </div>
            </div>
          </div>
          <div class="row products_container">
            <!-- Product -->
            @foreach($products as $product)
                <div class="col-lg-4 mb-5 product_col">
                <div class="product">
                    <div class="product_image">
                    <img src="{{ Storage::url($product->productImages->first()->path) }}" alt="" />
                    </div>
                    <div class="product_content clearfix">
                    <div class="product_info">
                        <div class="product_name">
                        <a href="{{ route('detail', $product->slug) }}">{{ $product->name }}</a>
                        </div>
                        <div class="product_price">Rp{{ number_format($product->price) }}</div>
                    </div>
                    <div class="product_options">
                        <div class="product_buy product_option">
                        <a href="{{ route('detail', $product->slug) }}">
                            <img src="{{ asset('frontend/images/shopping-bag-white.svg') }}" alt="" />
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
@endsection