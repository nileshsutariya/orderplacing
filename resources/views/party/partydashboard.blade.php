@include('layouts.partyheader')
<!-- Content Header (Page header) -->
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-uppercase">{{$party->name}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach ($cart as $value)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header border-0 m-0 ">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $value->name }}</h3>
                            </div>
                            <span>{{ $value->description }}</span><br>
                            <img class="product-image" src="{{ $value->image }}"  alt="">
                          </div>
                          <div class="card-body">
                            <div class="row text-right">
                                <div class="col-sm-12 text-right text-lg  ">
                                    <span class="price">₹ {{ $value->price }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.d-flex -->
                        <div class="card-footer" style="text-align: center;">
                            @if ($value->qty != 0 && $value->status != 0)
                                <a class="btn btn-primary" href="{{ route('cart', $value->id) }}">
                                    <i class="fa-light fa-cart-circle-check"></i>
                                    Add to cart
                                </a>
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value=" {{ $value->id }} ">
                            @else
                                <a class="btn text-danger ">
                                    Out of Stock
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- /.card -->

        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
</section>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
@include('layouts.footer')
