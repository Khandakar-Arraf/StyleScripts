<div class="product-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
    <div class="product-item__header">
        <div class="product-item__thumbnail">
            <a href="{{ route('custom-design.details', $data->id) }}">
                <img src="{{ asset('uploads/catalogs/' . $data->image) }}" alt="Product" width="100" height="100">
            </a>
        </div>
    </div>
    <div class="product-item__info text-center">
        <h2 class="product-item__title"><a href="{{ route('product.details', $data->id) }}">{{ $data->title }}</a>
        </h2>
    </div>
</div>
