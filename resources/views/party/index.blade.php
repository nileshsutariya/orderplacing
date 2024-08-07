<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
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
                </div>
                @error('email')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                        value="{{ isset($party) ? $party->phone_number : old('phonenumber') }}" placeholder="Phone Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-telephone-fill"></span>
                            </div>
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
                @error('address')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="gst" name="gst"
                        value="{{ isset($party) ? $party->gst : old('gst') }}" placeholder="GST Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-pencil-fill"></span>
                            </div>
                        </div>
                    </div>
                    @error('gst')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="pancardno" name="pancardno"
                        value="{{ isset($party) ? $party->pancard_no : old('pancardno') }}" placeholder="PAN Number">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-pen-fill"></span>
                            </div>
                        </div>
                    </div>
                    @error('pancardno')
                        <span class="text-danger" id="pancardno">
                            {{ $message }}
                        </span>
                    @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
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
                    </div>
                    @error('cpassword')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="active" name="status" value="1"
                                    {{ isset($party) && $party->status == '1' ? 'checked' : '' }}>
                                <label for="active">is Active
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" id="id" name="id"
                    value="{{ isset($party) ? $party->id : '' }} ">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <a href="{{ route('loginform') }}" class="text-center">Login</a>
            </div>
        </div>
    </div>
</section>

</body>
</html>
@endif
