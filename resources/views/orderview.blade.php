@include('layouts.adminheader')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Order View</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">OrderView</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card card-outline card-secondary shadow">
                    <div class="card-header">
                        <h3 class="card-title">Order View</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($partyOrders as $order)
                            <div class="col-md-12 mb-3">
                                <div class="card card-outline card-container" style="width: 100%;" id="card{{ $order->buyer_name }}"> {{--  id --}}
                                    <div class="card-body">
                                        {{-- <div class="text text-lg">Order ID: {{ $order->id }}</div> --}}
                                        <div class="text text-lg text-bold">BUYER NAME </div>{{ $order->buyer_name }}{{--  id --}}
                                        <button class="btn btn-light float-right show-more" data-id="{{ $order->id }}">{{--  id --}}
                                            Show More Detail
                                        </button>
                                        <div class="extra-details" id="extra{{ $order->id }}" style="display: none;">{{--  id --}}
                                            <hr>
                                            <h5>Shipping Details</h5>
                                            <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <div class="text text-bold">Order Id : {{ $order->id }}</div>
                                                    <div class="text">Buyer Name (Shipping to) : {{ $order->buyer_name }}</div>
                                                    <div class="text">Phone Number : {{ $order->phone_number }}</div>
                                                    <div class="text">Address : {{ $order->address }}</div>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Order Status</th>
                                                </tr>
                                                </thead>
                                                <hr>
                                                <tbody>
                                                <tr>
                                                    <td class="text">{{ $order->item_name }}</td>
                                                    <td class="text">{{ $order->price }}</td>
                                                    <td class="text">{{ $order->qty }}</td>
                                                    <td class="text">{{ $order->price * $order->qty }}</td>
                                                   <td> 
                                                    @if($order->status == 0)
                                                        <div class="text-danger">Pending</div>
                                                    @elseif($order->status == 1)
                                                        <div class="text-warning">Shipped</div>
                                                    @else
                                                        <div class="text-success">Completed</div>
                                                    @endif
                                                   </td>
                                                    {{-- <td class="text">{{ $order->status }}</td> --}}
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.show-more').on('click', function() {
            var cardId = $(this).data('id');
            var card = $('#card' + cardId);
            var extraDetails = $('#extra' + cardId);
            card.toggleClass('expanded');
            extraDetails.slideToggle();
        });
    });
</script>
<style>
    .card-container.expanded {
        height: auto;
    }
    .extra-details {
        margin-top: 20px;
    }
</style>
@include('layouts.footer')
