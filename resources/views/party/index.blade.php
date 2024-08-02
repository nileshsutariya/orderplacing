<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <title>Login </title>
</head>

<body>

<section class="content">
    <div class="container-fluid  mx-auto">
        <div class="row">
            <div class="col-md-12 mt-5 p-4">
                <div class="card card-outline card-info mx-auto"  style="width: 40rem; bordered: 5px;">
                    <div class="card-header text-">
                        <h3 class="card-title">Party</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($party))
                            <form id="myform" action="{{ route('party.update') }}" method="post">
                        @else
                            <form id="myform" action="{{ route('party.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="name" class=" col-form-label ">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{isset($party)?  $party->name: old('name')}} ">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email" class=" col-form-label text-dark">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{isset($party)? $party->email:old('email')}} ">
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone number" class=" col-form-label text-dark">Phone number</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                                value="{{isset($party)?$party->phone_number: old('phonenumber')}} ">
                            @error('phonenumber')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class=" col-form-label text-dark">Address</label>
                            <textarea type="text" class="form-control" id="address" name="address">{{isset($party)? $party->address:old('address')}}</textarea>
                            @error('address')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gst" class=" col-form-label text-dark">GST No.</label>
                                    <input type="text" class="form-control" id="gst" name="gst"
                                        value="{{isset($party)?$party->gst:old('gst')}} ">
                                    @error('gst')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pancardno" class=" col-form-label text-dark">PANCard No.</label>
                                    <input type="text" class="form-control" id="pancardno" name="pancardno"
                                        value="{{isset($party)?$party->pancard_no:old('pancardno')}} ">
                                    @error('pancardno')
                                        <span class="text-danger" id="pancardno">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6"> 
                           <div class="form-group">
                                <label for="password" class=" col-form-label text-dark">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                     </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="confirm password" class=" col-form-label text-dark">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword">
                                @error('cpassword')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                      </div>
                      </div>
                      <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="active" name="status" value="1"
                                        {{ isset($party) && $party->status=='1' ? 'checked' : '' }} >
                                        <label for="active">is Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div><br>  
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{isset($party)? $party->id:''}} ">
                                <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>     
        </div>
    </div>
</section>

</body>
</html>
