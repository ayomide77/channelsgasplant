@if ($currentSales->isNotEmpty())
{{-- @php
    $total = 0;
@endphp --}}
<div class="table-responsive">
<table class="table table-bordered table-striped table-checkable table-highlight-head">
    <thead>

        <tr>
            <th>
                <div>Customer</div>
            </th>
            <th>
                <div>Product</div>
            </th>
            {{-- <th>
                <div>Size</div>
            </th> --}}
            <th>
                <div>Order No</div>
            </th>
            <th>
                <div>Status</div>
            </th>
            {{-- <th>
                <div>Unit Price</div>
            </th> --}}
            <th>
                <div>Order(s)</div>
            </th>

            {{-- <th>
                <div>Toatal Price</div>
            </th> --}}
            <th>
                <div>Receipt</div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($currentSales as $order)
            <tr>
                <td>
                    <div>{{ $order->user->name }}</div>
                </td>
                <td>
                    <div>{{ $order->product->name }}</div>
                </td>
                {{-- <td>
                    <div>{{ $order->product->size }}</div>
                </td> --}}
                <td>
                    <div>{{'#-'}}{{ $order->order_no }}</div>
                </td>
                {{-- <td>
                    <div>&#8358;{{ $order->product->price }}</div>
                </td> --}}

                 <td>
                        @if ($order->status == 1)
                            <span class="badge outline-badge-success">{{ 'Completed' }}</span>
                        @else
                            <span class="badge outline-badge-warning">{{ 'Pending' }}</span>
                        @endif
                    </td>

                <td>
                    <div>{{ $order->count }}</div>
                </td>
                {{-- <td>
                    <div>&#8358;{{ $order->qty * $order->product->price }}</div>
                </td> --}}
                <td>
                    <div class="btn-group" role="group">
                    <a href="{{route("admin.generatereciept",$order->order_no)}}" class="btn btn-sm btn-success">View Receipt</a>
                    {{-- <a href="{{route("admin.generatereciept",$order->order_no)}}" class="btn btn-sm btn-info">Send Receipt</a> --}}
                    </div>
                </td>

            </tr>

            {{-- @php
                // GET TOTAL ORDERS PRICE
                /*
                this is achived by getting the order qty and multiply it 
                */ 
                $total += $order->qty * $order->product->price;
            @endphp --}}
        @endforeach
       
    </tbody>
</table>

{{-- <div class="row">
<div class="col-sm-12 col-md-6"><div class="btn btn-outline-info mb-2"><strong>Total Sales: &#8358;{{ $total }}</strong></div></div>
<div class="col-sm-12 col-md-6">
    {!!$currentSales->links()!!}
</div>
</div> --}}
@else
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-auto">
<div class="alert alert-info mb-4" role="alert">
    <strong>Info!</strong> {{ $info ?? '' }}</button>
</div>
</div>
@endif
{{-- INCLUDE CUSTOM JAVASCRIPT FILE --}}
@section('custom_scripts')
    @include('includes.confirmOrder')
@endsection
