<div class="table-responsive">
    @if ($orders->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Status</th>
                     <th scope="col">Qty</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row"><a href="">{{ $order->order_no }}</a></th>
                        <td>{{ $order->product->name }}</td>
                        <td>
                            @if ($order->status)
                                <span class="badge badge-success">{{ 'completed' }}</span>
                            @else
                                <span class="badge badge-warning">{{ 'processing' }}</span>
                            @endif
                        </td>

                        <td>{{$order->qty}}</td>

                        <td>&#8358;{{ $order->product->price }}</td>
                        
                        <td>&#8358;{{ $order->product->price * $order->qty }}</td>
                       
                        <td>
                            {{ \Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            <h6> {{ 'You have no pending order(s)' }} </h6>
        </div>
    @endif
</div>
