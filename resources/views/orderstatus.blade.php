@include('layouts.adminheader')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Order Status</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">OrderStatus</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col order-first">
                <h5><i class="bi bi-exclamation-circle-fill m-2 text-warning"></i>Pending</h5>
            </div>
            <div class="col">
                <h5><i class="bi bi-clock-fill m-2 text-info"></i>Shipped</h5>
            </div>
            <div class="col order-last">
                <h5><i class="bi bi-check-circle-fill m-2 text-success"></i>Completed</h5>
            </div>
        </div>
    </div>
</section>
<section class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card card-outline card-secondary shadow">
                    <div class="card-header">
                        <h3 class="card-title">Order Status</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Buyer Name</th>
                                        <th>Address</th>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partyOrders as $order)
                                        <tr>
                                            <td class="text">{{ $order->buyer_name }}</td>
                                            <td class="text">{{ $order->address }}</td>
                                            <td class="text">{{ $order->item_name }}</td>
                                            <td class="text">{{ $order->price }}</td>
                                            <td class="text">{{ $order->qty }}</td>
                                            <td class="text">{{ $order->price * $order->qty }}</td>
                                            <td>
                                                @if ($order->status == '0')
                                                    <form action="{{ route('statusupdate', $order->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-warning" style="border: none;" value="0"><i class="bi bi-exclamation-circle-fill m-2"> Pending </i></button>
                                                    </form>
                                                @elseif($order->status == '1')
                                                    <form action="{{ route('statusupdate', $order->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-info" style="border: none;" name="changeStatus" value="1"><i class="bi bi-clock-fill m-2"> Shipped </i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('statusupdate', $order->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-success" style="border: none;" name="changeStatus" value="2"><i class="bi bi-check-circle-fill m-2"> Completed </i></button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
