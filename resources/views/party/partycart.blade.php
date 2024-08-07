@include('layouts.partyheader')
<style>
    td,th{
        font-size: large;
    }
</style>
<section class="content mt-3">
    <div class="row">
<div class="col-md-8">
                    <div class="card card-outline card-primary m-3 ">
                        <div class="card-body">
                        <table  class="table ">
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
                            $i=1;
                            @endphp
                                @foreach ($item as $value)

                                    <tr>
                                        <td  style="width:50px;"> 
                                          <a class="btn p-0 mt-3" href="{{ route('cart.delete', $value->id) }}">
                                        <i class="fas fa-times p-0 "></i>
                                            </a>
                                        </td>
                                        <td  style="width:100px;" class="p-1">
                                            <img src="{{$value->image}}" style="width: 100px; height:100px;" alt="">
                                        </td> 
                                        <td scope="row">
                                            {{ $value->name }}
                                        </td>
                                        <td>
                                         <b>Delivery address :</b> 
                                            {{ $party ->address}}
                                        </td>
                                        <td style="width: 50px;">
                                        <input type="text" min="0" class="form-control qty" id="qty{{$i}}" name="qty[]" value="{{$value->qty}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                        </td>
                                        <td >
                                            {{ $value->price }}
                                            <input type="hidden" class="form-control price" id="price{{$i}}" name="price[]" value=" {{ $value->price }}">
                                        </td>
                                    </tr>
                                 @php
                                 $i++;
                                 @endphp
                                @endforeach
                                <input type="hidden" class="form-control" id="number" value="{{$i}}">
                            </tbody>
                        </table>
                    </div>

                    </div>
                    <a href="{{route('partydashboard.index')}}">
                    <input class="btn btn-warning  m-3" value="Continue shopping">
                    </a>
                    </div>
                    <div class="col-md-3 ml-5 pl-4">
                    <div class="card card-outline card-info m-3" style="height: 97%;">
                    <div class="card-header">
                        <h3 class="card-title "  style="font-size: 30px;">Final Amount</h3>
                    </div>
                    <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-md">Total Products  </span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                      <span type="text-md" id="subqty"  name="subqty">{{$totalqty}}</span>
                      <input type="hidden"id="subqty"  name="subqty" value="{{$totalqty}}">
                  </p>
                </div>
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-md text-bold">SubTotal</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                      <span class=" text-md" id="subtotal" name="subtotal">{{$total}} </span>
                      <input type="hidden"id="subtotal"  name="subtotal" value="{{$total}}">
                  </p>
                </div>
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-md">Tax</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                      <span type="text-md" id="tax">{{$taxpercentage->tax}} %</span>
                      <input type="hidden"id="tax"  name="tax" value="{{$taxpercentage->tax}}">
                  </p>
                </div>
               
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-md">Tax Amount</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                      <span type="text-md" name="taxamount"  id="taxamount">{{intval($tax)}}</span>
                      <input type="hidden"id="taxamount"  name="taxamount" value="{{$tax}}">
                  </p>
                </div>
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-md text-bold">Final Total</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                      <span class=" text-md" id="finaltotal" name="finaltotal">{{($total +$tax)}}</span>
                      <input type="hidden"id="finaltotal" name="finaltotal" value="{{($total +$tax)}}">
                  </p>
                </div>
                    </div>
                    <div class="card-footer">
                      <input type="submit" class="btn btn-warning btn-block" value="purchace all">
                </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
        $(document).ready(function() {
            $(document).on("input", ".qty", function () {

                var number = $('#number').val();
                var total = 0;
                var subqty=0;
                for (var i = 1; i < number; i++) {
                    var ta = $("#price" + i).val();
                    var sq= $("#qty" + i).val();
                    if (ta != undefined && sq != undefined) {
                        total += parseInt(ta*sq);
                        subqty += parseInt(sq);
                    }
                    $("#subtotal").text(total);
                    $("#subtotal").val(total);
                    $("#subqty").text(subqty);
                    $("#subqty").val(subqty);

                }
                var taxpercentage= $('#taxpercentage').text();
                taxpercentage = taxpercentage.replace('%', '');
                var tax=  parseInt(total * (taxpercentage / 100))
               $('#taxamount').text(tax);
               $('#taxamount').val(tax);

                var finaltotal = parseInt(total) + parseInt(tax);
                $("#finaltotal").text(finaltotal);
                $("#finaltotal").val(finaltotal);
            });
          });
   </script>

@include('layouts.footer')
                       
              