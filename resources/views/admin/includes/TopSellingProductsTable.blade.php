<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing ">
    <div class="widget widget-table-three">

        <div class="widget-heading">
            <h5 class="">Top Selling Product</h5>
        </div>

        <div class="widget-content">
            @if (count($topSales) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
            
                        <tr>
                            <th>
                                <div class="th-content">Product</div>
                            </th>
                            <th>
                                <div class="th-content th-heading">Unit Price</div>
                            </th>
                            <th>
                                <div class="th-content th-heading">Quantity Sold</div>
                            </th>
                            <th>
                                <div class="th-content th-heading">Total Price</div>
                            </th>
                            <th>
                                <div class="th-content th-heading">Staff</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topSales as $topSale)
            
                            <tr>
                                <td>
                                    <div class="td-content product-name"><img
                                            src="/chnlsgasplant/images/product/{{ $topSale->image }}"
                                            alt="product">{{ $topSale->product_name }}</div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="pricing">&#8358;{{ $topSale->price }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content"><span
                                            class="discount-pricing">{{ $topSale->qty }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="td-content">
                                        &#8358;{{ $topSale->qty * $topSale->price }}</div>
                                </td>
                                <td>
                                    <div class="td-content"><a href="javascript:void(0);"
                                            class="">{{ $topSale->name }}</a></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
                <div class="alert alert-info mb-4" role="alert">
                  
                    <strong>Info!</strong> {{ 'No  Top Selling Product Found' }}</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

