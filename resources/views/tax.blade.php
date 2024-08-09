@include('layouts.adminheader')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tax</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tax</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tax</h3>
                    </div>
                    @if (isset($tax))
                            <form action="{{ route('tax.update') }}" method="post">
                            @else
                                <form action="{{ route('tax.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class=" col-form-label ">Tax</label>
                                <input type="text" class="form-control" id="tax" name="tax"
                                    value="{{$tax->tax}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                    @error('tax')
                                    <span class="text-danger">
                                    {{$message}} 
                                </span>
                                @enderror
                            </div>
                            
                            <input type="hidden" class="form-control" id="id" name="id"
                            value=" {{$tax->id}} ">
                         <button type="submit" class="btn btn-primary">submit</button>
                        </form>
                </div>
            </div>   
            </div>
            </div>

          </div>
        </section>

@include('layouts.footer')
