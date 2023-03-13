@extends('frontend.layout')

@section('content')
<div class="product">
        <div class="container">
          <div class="row product-row">
            <div class="col">
              <div class="current_page">
                <ul>
                  <li><a href="{{ route('homepage') }}">Home</a></li>
                  <li><a href="{{ route('kategori', $product->categories->first()->slug) }}">{{ $product->categories->first()->name }}</a></li>
                  <li>{{ $product->name }}</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row" style="margin-top: 28px">
            <!-- Product Image -->
            <div class="col-lg-7">
              <div class="product_image">
                <div class="product_image_large">
                  <img src="{{ Storage::url($product->productImages->first()->path) }}" style="width: 100%" alt="" />
                </div>
                <div
                  style="overflow-x: auto;"
                  class="product_image_thumbnails m-0 d-flex flex-row align-items-start justify-content-start"
                >
                @foreach($product->productImages as $productImage)
                  <img src="{{ Storage::url($productImage->path) }}" data-image="{{ Storage::url($productImage->path) }}" class="product_image_thumbnail" alt="">
                @endforeach
                </div>
              </div>
            </div>

            <!-- Product Content -->
            <div class="col-lg-5">
              <div class="product_content">
                <div class="product_name" style="line-height:1.25;">{{ $product->name }}</div>
                <div class="product_price">Rp{{ number_format($product->price) }}</div>
                <!-- Product Size -->
                <div style="margin-top: 1rem;">
                  <p>
                    {{ $product->description }}
                  </p>
                  @auth
                    <a target="_blank" href="{{ $product->sku }}">click order</a>
                  @endauth
                </div>
                <form action="{{ route('checkout') }}" method="post" id="checkout_form">
                    @csrf 
                    <input type="hidden" name="productId" value="{{ $product->id }}">
                <div class="product_size_container">
                  <div class="form-group mt-4">
                    <h4>Nama Penerima :</h4>
                    <hr>
                    <div class="checkout_form_container" style="margin-top: 32px;">
                        <input type="text" name="name" value="{{ old('name') }}" class="checkout_input" placeholder="Nama Anda">
                        @error('name')
                          <span style="margin-top: -40px;color: var(--danger);">Nama harus diisi !</span>
                        @enderror
                        <input type="number" name="wa" value="{{ old('wa') }}" class="checkout_input" placeholder="No. Whatsapp Anda">
                        @error('wa')
                          <span style="margin-top: -40px;color: var(--danger);">Nomer Wa harus diisi !</span>
                        @enderror
                        <textarea name="alamat" class="checkout_comment checkout_input" placeholder="Alamat Lengkap  (Jl/RT/RW/Gang/No Rumah)" style="height: 80px;">{{ old('alamat') }}</textarea>
                        @error('alamat')
                          <span style="margin-top: -40px;color: var(--danger);">Alamat harus diisi !</span>
                        @enderror
                        <input type="text" name="kota" value="{{ old('kota') }}" class="checkout_input" placeholder="Kota/Kabupaten/Kecamatan">
                        @error('kota')
                          <span style="margin-top: -40px;color: var(--danger);">Kota/Kecamatan harus diisi !</span>
                        @enderror
                    </div>
                  </div>
                  <div class="button cart_button" style="background-color: lightgreen;width: 100%;margin-top: 1rem;">
                    <button type="submit" style="width:100%;height:100%;background-color:transparent;border: none;outline:none;color: green;">Order ke Whatsapp <i class="fa fa-whatsapp"></i></button>
                  </div>
                  </form>
                </div>
                </form>
              </div>
			</div>
          </div>

          <!-- Reviews -->

          <!-- <div class="row">
            <div class="col">
              <div class="reviews">
                <div class="reviews_title">Deskripsi</div>
                <div class="product_text">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Nulla quis quam ipsum. Pellentesque consequat tellus non
                    tortor tempus, id egestas elit iaculis. Proin eu dui porta,
                    pretium metus vitae, pharetra odio. Sed ac mi commodo,
                    pellentesque erat eget, accumsan justo. Etiam sed placerat
                    felis. Proin non rutrum ligula.
                  </p>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
@endsection

@push('style-alt')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product.css') }}" />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('frontend/styles/product_responsive.css') }}"
    />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/checkout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/checkout_responsive.css') }}">
    <style>
      @media screen and (min-width: 768px) {
        .product-row {
          margin-top: 50px;
        }

        .m-regular_radio:checked + label {
          background: #937c6f;
          color: #ffffff;
        }

        label {
          min-width: 100px;
          display: inline-block;
        }
      }
    </style>
@endpush

@push('script-alt')
<script src="{{ asset('frontend/js/product_custom.js') }}"></script>
@endpush