@include('layouts.header')

<section class="content ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h1 class="card-title " style="font-size:35px ;"><b>Party</b></h1>
                    </div>
                    <div class="card-body">
                        @if(isset($party))
                            <form action="{{route('party.update', $party->id)}}" method="post">
                        @else
                            <form action="{{route('party.store')}}" method="post">
                        @endif
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name" class=" col-form-label ">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="@php if(isset($party))  {echo $party->name;} else echo old('name'); @endphp ">
                                                @error('name')
                                                <span class="text-danger">
                                                {{$message}} 
                                            </span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="email" class=" col-form-label text-dark">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="@php if(isset($party)) {echo $party->email;}else echo old('email'); @endphp ">
                                                @error('email')<span class="text-danger">
                                            {{$message}} 
                                            </span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="phone number" class=" col-form-label text-dark">Phone number</label>
                                            <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                                                value="@php if(isset($party)){echo $party->phone_number;} else echo old('phonenumber'); @endphp ">
                                                @error('phonenumber')
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
                                                name="address">@php if(isset($party)) {echo $party->address;} else echo old('address'); @endphp </textarea>
                                                @error('address')<span class="text-danger">
                                            {{$message}} 
                                            </span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                            <label for="gst" class=" col-form-label text-dark">GST No.</label>
                                            <input type="text" class="form-control" id="gst" name="gst"
                                                value="@php if(isset($party)){echo $party->gst;} else echo old('gst'); @endphp ">
                                                @error('gst')
                                                    <span class="text-danger">
                                                        {{$message}} 
                                                    </span>
                                                @enderror
                                        </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="pancardno" class=" col-form-label text-dark">PANCard No.</label>
                                            <input type="text" class="form-control" id="pancardno" name="pancardno"
                                                value="@php if(isset($party)){echo $party->pancard_no;} else echo old('pancardno'); @endphp ">
                                                @error('pancardno')
                                                    <span class="text-danger">
                                                        {{$message}} 
                                                    </span>
                                                @enderror
                                        </div>
                                        </div>
                                    </div>
                                    
                              
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="active" name="status" @php
                                                    if (isset($party)) {
                                                        if ($party['status'] == '1') {
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
                                    value="@php if(isset($party))  {echo $party->id;} @endphp ">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


@include('layouts.footer')