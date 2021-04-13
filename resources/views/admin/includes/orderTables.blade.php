<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget ">
        <div class="widget-heading">
            <h5 class="">{{ $orderTableTitle ?? '' }}</h5>
        </div>
        <div class="widget-content">
            <div class="table-responsive">
                {{-- CHECK IF ORDERS ARE NOT EMPTY --}}
                @if (count($orders)>0)
                    <table class="table table-bordered table-striped table-checkable table-highlight-head">
                        <thead>

                            <tr>
                                <th>
                                    <div>Customer</div>
                                </th>
                                <th>
                                    <div>Product</div>
                                </th>
                                <th>
                                    <div>Size</div>
                                </th>
                                <th>
                                    <div>Order No</div>
                                </th>
                                <th>
                                    <div>Unit Price</div>
                                </th>
                                <th>
                                    <div>QTY</div>
                                </th>
                                <th>
                                    <div>Status</div>
                                </th>
                                <th>
                                    <div>Date Ordered</div>
                                </th>
                                <th>
                                    <div>Confirmed Date</div>
                                </th>
                                <th>
                                    <div>Confirmed By</div>
                                </th>
                                <th>
                                    <div>Action</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <div>{{ $order->user->name }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $order->product->name }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $order->product->size }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $order->order_no }}</div>
                                    </td>
                                    <td>
                                        <div>&#8358;{{ $order->product->price }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $order->qty }}</div>
                                    </td>
                                    <td>
                                        <div>

                                            @if ($order->status)
                                                <span class="badge outline-badge-success">{{ 'Completed' }}</span>
                                            @else
                                                <span class="badge outline-badge-warning">{{ 'Pending' }}</span>
                                            @endif
                                        </div>
                                    </td>


                                    <td>
                                        <div class="td-content"><span class="">
                                                {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </td>
                                    @if ($order->status)
                                        <td>
                                            <div class="td-content"><span class="">
                                                    {{ \Carbon\Carbon::parse($order->updated_at)->diffForHumans() }}</span>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="td-content"><span class="">{{'N/A'}}</span></div>
                                        </td>

                                    @endif
                                    @if ($order->status)
                                        <td>
                                            <div class="td-content"><span class="">{{ $order->staff->name }}</span></div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="td-content"><span class="">{{'N/A'}}</span></div>
                                        </td>
                                    @endif

                                    <div class="td-content">
                                        <td>
                                            @if ($order->status)
                                                <div class="btn-group" role="group" aria-label="confirm order">
                                                    <button type="button" class="btn btn-success">Confirmed</button>
                                                </div>
                                            @else
                                                <div class="btn-group" role="group" aria-label="confirm order">
                                                    <button type="button" class="btn btn-info confirm-order"
                                                        order-id="{{ $order->id }}"
                                                        user-id="{{ Auth::user()->id }}">Confirm Order</button>
                                                </div>
                                            @endif

                                        </td>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12 col-md-6">
                        {!! $orders->links() !!}
                    </div>
                @else
                    <div class="alert alert-info mb-4" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ...
                            </svg></button>
                        <strong>Info!</strong> {{ $info ?? '' }}</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- INCLUDE CUSTOM JAVASCRIPT FILE --}}
@section('custom_scripts')
    @include('includes.confirmOrder')
@endsection
