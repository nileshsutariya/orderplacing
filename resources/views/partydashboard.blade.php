
@include('layouts.partyheader')
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard </h1>
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
          @foreach($items as $value)
          <div class="col-lg-2">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h2 class="card-title"style="font-size:30px;">{{$value->name}}</h2>
                </div>
                <span>{{$value->description}}</span>
              </div>
              <div class="card-body">
                
                <img src="{{$value->image}}"  style="width: 260px; height: 200px;" alt="">
                
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">Price</span>
                    <span>{{$value->price}}</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    @if($value->qty==0)
                      <span class="text-danger">
                      <i class="fas fa-arrow-down"></i> Not In Stock 
                    </span>
                    @else
                      <span class="text-success">
                      <i class="fas fa-arrow-up"></i> In Stock 
                    </span>
                    @endif
                  </p>
                  
                </div>
                <!-- /.d-flex -->
                <div class="card-footer float-right">
                <a class="btn" href="{{ route('item.edit', $value->id) }}">
                <i class="fas fa-shopping-cart text-secondary"></i> 
                      Add to cart
                  </a>
                  @if($value->qty!=0)
                  <a class="btn" href="{{ route('party.ordernow', $value->id) }}">
                      <i class="fas fa-shopping-bag text-primary"></i> 
                      Buy now
                  </a> 
                  @endif 
                </div>
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