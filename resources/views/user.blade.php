@include('layouts.header')

<section class="content ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h1 class="card-title " style="font-size:35px ;"><b>Users</b></h1>
                    </div>
                    <div class="card-body">
                        {{-- @if(isset($user))
                            <form action="{{route('user.update', $user->id)}}" method="post">
                        @else
                            <form action="{{route('user.store')}}" method="post">
                        @endif --}}
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="firstname" class=" col-form-label "> First name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname"
                                                value="@php if(isset($user))  {echo $user->first_name;} else echo old('firstname'); @endphp ">
                                                @error('firstname')
                                                <span class="text-danger">
                                                {{$message}} 
                                            </span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lastname" class=" col-form-label "> last name</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname"
                                                value="@php if(isset($user))  {echo $user->last_name;} else echo old('lastname'); @endphp ">
                                                @error('lastname')
                                                <span class="text-danger">
                                                {{$message}}
                                            </span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email" class=" col-form-label text-dark">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="@php if(isset($user)) {echo $user->email;}else echo old('email'); @endphp ">
                                                @error('email')<span class="text-danger">
                                            {{$message}} 
                                            </span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                   
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="phone number" class=" col-form-label text-dark">Phone
                                                number</label>
                                            <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                                                value="@php if(isset($user)){echo $user->phone_number;} else echo old('phonenumber'); @endphp ">
                                                @error('phonenumber')
                                                    <span class="text-danger">
                                                        {{$message}} 
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="password" class=" col-form-label text-dark">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                            @error('password')
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="confirm password" class=" col-form-label text-dark">Confirm Password</label>
                                            <input type="password" class="form-control" id="cpassword" name="cpassword">
                                            @error('cpassword') 
                                                <span class="text-danger">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="address" class=" col-form-label text-dark">Address</label>
                                            <textarea type="text" class="form-control" id="address"
                                                name="address">@php if(isset($user)) {echo $user->address;} else echo old('address'); @endphp </textarea>
                                                @error('address')<span class="text-danger">
                                            {{$message}} 
                                            </span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="active" name="status" @php
                                                    if (isset($user)) {
                                                        if ($user['status'] == '1') {
                                                            echo "checked";
                                                        }
                                                } @endphp >
                                                <label for="active">is Active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">submit</button>
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="@php if(isset($user))  {echo $user->id;} @endphp ">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


@include('layouts.footer')