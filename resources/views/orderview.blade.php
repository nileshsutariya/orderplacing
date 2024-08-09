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
                            @if(isset($partyorders))
                            @foreach($partyorders as $key=> $order)
                            <div class="col-md-12 mb-3">
                                <div class="card card-outline card-container" style="width: 100%;" id="card{{ $order->buyer_name }}"> 
                                    <div class="card-body">
                                        {{-- <div class="text text-lg">Order ID: {{ $order->id }}</div> --}}
                                      
                                        <div class="row">
                                            <div class="col-md-6 ">
                                            <span class="text-lg text-bold">
                                            BUYER NAME
                                            </span><br>
                                            {{ $order->buyer_name }} 
                                            </div>
                                            <div class="col-md-6 text-right text-bold">
                                                @if($order->status == 0)
                                                
                                                    <div class="text-danger"><i class="bi bi-exclamation-circle-fill m-2"></i>Pending</div>
                                                @elseif($order->status == 1)
                                                    <div class="text-warning"><i class="bi bi-clock-fill m-2"></i>Shipped</div>
                                                @else
                                                    <div class="text-success"><i class="bi bi-check-circle-fill m-2"></i>Completed</div>
                                                @endif
                                                
                                        <button class="btn btn- float-right show-more mt-2" data-id="{{ $order->id }}">
                                            Show More Detail
                                        </button>
                                        </div>
                                        </div>
                                        
                                        <div class="extra-details" id="extra{{ $order->id }}" style="display: none;">
                                            <hr>
                                            <h4>Shipping Details</h4>
                                            <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <div class="text"><b>Order Id : </b>{{ $order->id }}
                                                    </div>
                                                    <div><b>Buyer Name (Shipping to) : </b>{{ $order->buyer_name }}</div>
                                                    <div><b>Phone Number :  </b>{{ $order->buyer_phone_number }}</div>
                                                    <div><b>Address : </b> {{ $order->buyer_address }}</div>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                                </thead>
                                                <hr>
                                                <tbody>
                                                    @foreach ($orderitem[$key] as $item)
                                                    <tr>
                                                        <td class="text">{{ $item->item_name }}</td>
                                                        <td class="text">{{ $item->price }}</td>
                                                        <td class="text">{{ $item->qty }}</td>
                                                        <td class="text">{{ $item->price * $item->qty }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="text-right">
                                            <div class="text"><b>Sub Total  : </b>  {{ $order->subtotal }}</div>
                                                    <div class="text"><b>Tax  :  </b>{{ $order->tax_percentage }}  %</div>
                                                    <div class="text"><b>Tax Amount :  </b>{{ $order->tax_amount }}</div> 
                                                    <div class="text"><b>Final Total :  </b>{{ $order->final_total }}</div> 
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
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
