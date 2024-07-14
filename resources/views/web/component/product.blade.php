<div class="product-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
    <div class="product-item__header">
        <div class="product-item__thumbnail">
            <a href="{{ route('product.details',$data->id) }}">
                <img src="{{ asset('') }}uploads/products/{{ $data->image }}" alt="Product" width="258" height="298">
            </a>
        </div>

    </div>
    <div class="product-item__info text-center">
        <div class="product-item__price">
            <span class="sale-price discount">${{ $data->price }}.<small class="separator">00</small></span>
            {{-- <span class="regular-price">$89.<small class="separator">00</small></span> --}}
        </div>
        <h2 class="product-item__title"><a href="{{ route('product.details',$data->id) }}">{{ $data->name }}</a>
        </h2>
    </div>
</div>
