@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 30px;">Product Purchasing process</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('party.orderconfirm') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" style="font-size: 25px;">Contact info</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name" class=" col-form-label ">Buyer Name</label>
                                                <input type="text" class="form-control" id="buyer" name="buyer" value="{{$party->name}}"readonly>
                                                @error('name')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="phone_number" class=" col-form-label ">phone number</label>
                                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$party->phone_number}}">
                                                @error('phone_number')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="address" class=" col-form-label text-dark">Address</label>
                                                <textarea type="text" class="form-control" id="address" name="address">{{$party->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card text-left">
                                <div class="card-header">
                                    <h4 class="card-title">Purchasing Item</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name" class=" col-form-label ">Item Name</label>
                                                <input type="text" class="form-control" id="item" name="item"
                                                    value="{{$item->name}} " readonly>
                                                @error('name')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="price" class=" col-form-label text-dark">Price</label>
                                                <input type="text" class="form-control" id="price" name="price"
                                                    value="{{$item->price}}" readonly>
                                                @error('price')<span class="text-danger">
                                                        {{ $message }}
                                                </span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="qty" class=" col-form-label text-dark">qty</label>
                                                <input type="text" class="form-control" id="qty" name="qty">
                                                @error('qty')<span class="text-danger">
                                                        {{ $message }}
                                                </span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">submit</button>
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value=" {{$party->id}} ">
                                    <input type="hidden" class="form-control" id="total1" name="total1">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ml-5 pl-4">
            <div class="card card-outline card-info " style="height: 97%;">
                    <div class="card-header">
                        <h3 class="card-title "  style="font-size: 30px;">Final Amount</h3>
                    </div>
                    <div class="card-body">
                    <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class=" text-md">Price</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                      <span class=" text-md">{{$item->price}}
                    </span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-md">Qty</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                      <span type="text-md" id="qty1">
                  </p>
                </div>
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-md text-bold">Total</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                      <span class=" text-md" id="total" name="total">
                    </span>
                  </p>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
        $(document).ready(function() {
            $(document).on("input", "#qty", function () {
                var qty = $(this).val();
                $("#qty1").text(qty);
                var price = $("#price").val();
                var total = price * qty;
                $("#total").text(total);
                $("#total1").val(total);
            });
      });
   </script>
@include('layouts.footer')