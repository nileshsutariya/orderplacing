@include('layouts.partyheader')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 ">Draft Orders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Draft Orders </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card card-outline card-info shadow">
                    <div class="card-header">
                        <h3 class="card-title">Draft Order</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-outline card-primary m-3 ">
                                    <div class="card-body">
                                        <table class="table table-responsive">
                                            <form action="{{route('order.store')}}" method="POST">
                                                @csrf
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Product</th>
                                                        <th>Delivery</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="m-3 p-3">
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($item as $value)
                                                        <tr>
                                                            <td style="width:50px;">
                                                                <a class="btn p-0 mt-3"
                                                                    href="{{ route('cart.delete', $value->id) }}">
                                                                    <input type="hidden" class="form-control" id="id{{$i}}"
                                                                        name="id[]" value="{{ $value->id}}">
                                                                    <i class="fas fa-times p-0 "></i>
                                                                </a>
                                                            </td>
                                                            <td style="width:100px;" class="p-1">
                                                                <img src="{{asset('imageuploaded/'.$value->image)}}"
                                                                    style="width: 100px; height:100px;">
                                                            </td>
                                                            <td scope="row">
                                                                {{ $value->name }}
                                                            </td>
                                                            <td>
                                                                <b>Delivery address :</b>
                                                                {{ $party->address}}
                                                            </td>
                                                            <td style="width: 50px;">
                                                                <input type="text" min="0" class="form-control qty"
                                                                    id="qty{{$i}}" name="qty[]" value="{{$value->qty}}"
                                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                            </td>
                                                            <td>
                                                                {{ $value->price }}
                                                                <input type="hidden" class="form-control price"
                                                                    id="price{{$i}}" name="price[]"
                                                                    value=" {{ $value->price }}">
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i++;
                                                            @endphp
                                                    @endforeach
                                                    <input type="hidden" class="form-control" id="number"
                                                        value="{{$i}}">
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-outline card-primary m-3" style="height: 97%;">
                                    <div class="card-header">
                                        <h3 class="card-title " style="font-size: 30px;">Final Amount</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <p class="ml-auto col-sm   ">
                                                <span class="text-md float-left">Total Products </span>
                                                <span class="text-md float-right" id="subqty" name="subqty">
                                                    {{$totalqty}}
                                                </span>
                                                <input type="hidden" id="subqty" name="subqty" value="{{$totalqty}}">
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="ml-auto col-sm ">
                                                <span class="text-md float-left text-bold">SubTotal</span>
                                                <span class="text-md float-right" id="subtotal" name="subtotal">
                                                    {{$total}}
                                                </span>
                                                <input type="hidden" id="subtotal" name="subtotal" value="{{$total}}">
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="ml-auto col-sm ">
                                                <span class="text-md float-left ">Tax</span>
                                                <span class="text-md float-right" id="tax">
                                                    {{$taxpercentage->tax}} %
                                                </span>
                                                <input type="hidden" id="tax" name="tax"
                                                    value="{{$taxpercentage->tax}}">
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="ml-auto col-sm   ">
                                                <span class="text-md float-left">Tax Amount</span>
                                                <span class="text-md float-right" name="taxamount" id="taxamount">
                                                    {{intval($tax)}}
                                                </span>
                                                <input type="hidden" id="amount" name="taxamount"
                                                    value="{{intval($tax)}}">
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="ml-auto col-sm   ">
                                                <span class="text-md float-left text-bold">Final Total</span>
                                                <span class="text-md float-right" id="finaltotal" name="finaltotal">
                                                    {{intval($total + $tax)}}
                                                </span>
                                                <input type="hidden" id="final" name="finaltotal"
                                                    value="{{intval($total + $tax)}}">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{route('partydashboard.index')}}" class="text-dark">
                            <button class="btn btn-warning m-3">Continue shopping
                        </a>
                    </div>
                </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("input", ".qty", function () {

            var number = $('#number').val();
            var total = 0;
            var subqty = 0;
            for (var i = 1; i < number; i++) {
                var ta = $("#price" + i).val();
                var sq = $("#qty" + i).val();
                if (ta != undefined && sq != undefined) {
                    total += parseInt(ta * sq);
                    subqty += parseInt(sq);
                }
                $("#subtotal").text(total);
                $("#subtotal").val(total);
                $("#subqty").text(subqty);
                $("#subqty").val(subqty);

            }
            var taxpercentage = $('#tax').text();
            taxpercentage = taxpercentage.replace('%', '');
            var tax = parseInt(total * (taxpercentage / 100))
            $('#taxamount').text(tax);
            $('#amount').val(tax);

            var finaltotal = parseInt(total) + parseInt(tax);
            $("#finaltotal").text(finaltotal);
            $("#final").val(finaltotal);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on("input", ".qty", function () {
            var idc = $(this).attr('id');

            idc = idc.replace('qty', '');
            // console.log(idc);
            var qty = $(this).val();
            var id = $('#id' + idc).val();
            //  console.log(id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('cart.qty.update')}}",
                data: {
                    'qty': qty,
                    'id': id,
                },
                type: 'POST',
                success: function (data) {
                    // console.log(data)
                }
            });
        });
    });  
</script>

@include('layouts.footer')
                       
              