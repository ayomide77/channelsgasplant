<div class="col-lg-3 col-md-6 col-sm-6 mb-5">
    <div class="singel-products mt-30">
        <div class="products-image">
            <a href="{{ route('product', $product->slug) }}"> <img
                    src="{{ asset("chnlsgasplant/images/product/$product->image") }}"
                    alt="Products"></a>
        </div>
        <div class="products-contant">
            <h6 class="products-title"><a
                    href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
            </h6>
            <div class="price-rating d-flex justify-content-between">
                <div class="price">
                    <span
                        class="regular-price">&#8358;{{ $product->price }}</span>
                </div>
            </div>
            <p class="text">{{ $product->detail }}</p>
            <div class="products-cart add_to_cart_button">
                <a class="cart-add" href="{{ route('cart.create', ['id' => $product->id]) }}"><i class="fa fa-shopping-cart"></i> Add
                    to cart</a>
            </div>
        </div>
    </div>
</div>