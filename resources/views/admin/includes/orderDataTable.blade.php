{{-- INCLUDE CUSTOM JAVASCRIPT FILE --}}
@section('custom_scripts')
    @include('includes.confirmOrder')

    {{-- IMPORT SCRIPTS FOR DATA TABLE --}}
    @include('admin.includes.dataTableJs',array('tableID'=>'currentOrderTable'))
    {{-- IMPORT SCRIPTS FOR DATA TABLE --}}

@endsection

@if (count($orders) > 0)
<div class="table-responsive mb-4 mt-4">
    <table id="currentOrderTable" class="table table-hover non-hover" style="width:100%">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                {{-- <th>Size</th> --}}
                <th>Order No</th>
                <th>Order(s)</th>
                <th>Status</th>
                <th>Date Ordered</th>
                <th>Confirmed Date</th>
                <th>Confirmed By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->product->name }}</td>
                    {{-- <td>{{ $order->product->size }}</td> --}}
                    <td>{{'#'}}-{{ $order->order_no }}</td>
                    <td>{{ $order->count }}</td>
                    <td>
                        @if ($order->status == 1)
                            <span class="badge outline-badge-success">{{ 'Completed' }}</span>
                        @else
                            <span class="badge outline-badge-warning">{{ 'Pending' }}</span>
                        @endif
                    </td>
                    <td> {{ \Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</td>
                    <td>
                        @if ($order->status == 1)
                            {{ \Carbon\Carbon::parse($order->updated_at)->toFormattedDateString() }}
                        @else
                            {{ 'N/A' }}
                        @endif
                    </td>
                    <td>
                        @if ($order->status == 1)
                            {{ $order->staff->name }}
                        @else
                            {{ 'N/A' }}
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark btn-sm">Open</button>
                            <button type="button"
                                class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                                id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" data-reference="parent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-down">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                @if ($order->status)
                                    <a class="dropdown-item text-success">order confirmed</a>
                                @else
                                    <a class="dropdown-item text-info"
                                        href="{{ route('admin.generateinvoice', $order->order_no) }}">print
                                        invoice</a>
                                    <a class="dropdown-item text-warning confirm-order" href="#"
                                        order-no={{$order->order_no}}>confirm order</a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
<div class="col-xl-12 col-md-12 col-sm-12 col-12">
    <div class="alert alert-info mt-2" role="alert">
    <strong>Info!</strong> {{ $info ?? 'No pending orders' }}</button>
    </div>
</div>
@endif
</div>
