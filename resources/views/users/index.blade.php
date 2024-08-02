@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Party</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Party</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h1 class="card-title ">Party</h1>
                    </div>
                    <div class="card-body">
                        @if (isset($user))
                            <form action="{{ route('user.update') }}" method="post">
                        @else
                            <form action="{{ route('user.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first_name" class=" col-form-label "> First name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{isset($user)? $user->first_name : old('first_name')}} ">
                                    @error('first_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name" class=" col-form-label "> last name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{isset($user)? $user->last_name : old('last_name')}} ">
                                    @error('last_name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email" class=" col-form-label text-dark">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                    value="{{isset($user)? $user->email : old('email')}} ">
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone number" class=" col-form-label text-dark">Phone
                                        number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{isset($user)?$user->phone_number : old('phone_number')}} ">
                                    @error('phone_number')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address" class=" col-form-label text-dark">Address</label>
                                    <textarea type="text" class="form-control" id="address" name="address">{{isset($user)?$user->address : old('address')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="active" name="status"
                                    {{isset($user) && $user->status=='1' ? 'checked' : '' }} >
                                    <label for="active">is Active
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                        <input type="hidden" class="form-control" id="id" name="id"
                        value="{{isset($user)? $user->id:''}}">
                    </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Party Data</h3>
                        <!-- <input class="form-control" type="search" id="search" name="search" placeholder="Search"> -->
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-hover table-valign-middle table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    @if(!isset($user))
                                    <th class="text-center">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody >
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($users as $value)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td scope="row">
                                            {{ $value->first_name }}
                                        </td>
                                        <td>
                                            {{ $value->last_name }}
                                        </td>
                                        <td>
                                            {{ $value->address }}
                                        </td>
                                        <td>
                                            {{ $value->email }}
                                        </td>
                                        <td>
                                            {{ $value->phone_number }}
                                        </td>
                                        <td class="text-center">
                                            @if ($value->status == '1')
                                                <button class="badge bg-success">Active</button>
                                            @else
                                                <button class="badge bg-danger">Inactive</button>
                                            @endif
                                        </td>
                                        @if(!isset($user))
                                        <td>
                                            <a class="btn" href="{{ route('user.edit', $value->id) }}">
                                                <i class="fa  fa-pen text-warning"></i> Edit
                                            </a>
                                            <a class="btn" href="{{ route('user.delete', $value->id) }}">
                                                <i class="fa fa-trash text-danger"></i> Delete
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{$users->links('pagination::bootstrap-5')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> 
</section>
<!-- <script>
     $(document).ready(function() {
        $(document).on("input", "#search", function() {
             var search=$(this).val();  
            $.ajax ({     
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                {{-- url: "{{route('user.index')}}", --}}
                data: {
                    'search':search,
                },
                type: 'POST',
                success: function(data) {
                    console.log(data)
                    var i=1;
                    var a ="";
                    if(data.length==0){
                        console.log("data is null");
                    }else{
                       data.forEach(function(value){
                            console.log("dfghjkl");
                                a += `<tr>
                                <td>`+i+`</td>
                                <td>`+value.first_name+`</td>
                                <td>`+value.last_name+`</td>
                                <td>`+value.email+`</td>
                                <td>`+value.address+`</td>
                                <td>`+value.phone_number+`</td>
                                <td> `;
                                 if(value.status == 1){
                                    a+=`<button class="btn btn-sm text-center btn-success">Active</button>
                                 `; }else{
                                    a+=`
                                <button class="btn btn-sm btn-danger">Inactive</button>
                                 `; }
                                 a+= `
                                </td>
                                <td>
                                {{-- <a class="btn" href="`;{{route('user.edit', ['id' => $value->id])}} --}}
                                a+=`">
                                                <i class="fa  fa-pen text-warning"></i> Edit
                                            </a>
                                            {{-- <a class="btn" href="`;{{route('user.delete', ['id' => $value->id])}}
                                   a+=`"> --}}
                                                <i class="fa fa-trash text-danger"></i> Trash
                                            </a>
                                </td>
                                </tr>`;
                        });
                        $('#a1').html(a);
                        console.log("end");
                    }
                        }
                        });
                    });
            });  
</script> -->

@include('layouts.footer')