@extends('frontend.layout')

@section('content')
<div class="arrivals" style="margin-top: 96px;">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="section_title_container text-center">
                <div class="section_subtitle">kategori</div>
                <div class="section_title">{{ $category->name }}</div>
              </div>
            </div>
          </div>
          <div class="row products_container">
            <!-- Product -->
            @forelse($products as $product)
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
            @empty 
                <div class="col-lg-12 justify-center mb-5 product_col">
                    <h3 class="text-center">Produk Kosong !</h3>
                </div>
            @endforelse
          </div>
        </div>
      </div>
@endsection