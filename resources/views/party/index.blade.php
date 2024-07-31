@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row ">
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
                        <h3 class="card-title">Party</h3>
                    </div>
                    @if (isset($party))
                        <form action="{{ route('party.update') }}" method="post">
                    @else
                        <form action="{{ route('party.store') }}" method="post">
                    @endif
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class=" col-form-label ">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{isset($party)? $party->name : old('name')}} ">
                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class=" col-form-label text-dark">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{isset($party)? $party->email : old('email')}} ">
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone number" class=" col-form-label text-dark">Phone number</label>
                                    <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                                        value="{{isset($party)?$party->phone_number : old('phonenumber')}} ">
                                    @error('phonenumber')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address" class=" col-form-label text-dark">Address</label>
                                    <textarea type="text" class="form-control" id="address" name="address">{{isset($party)?$party->address : old('address')}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gst" class=" col-form-label text-dark">GST No.</label>
                                            <input type="text" class="form-control" id="gst" name="gst"
                                                value="{{isset($party)? $party->gst : old('gst')}} ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pancardno" class=" col-form-label text-dark">PANCard No.</label>
                                            <input type="text" class="form-control" id="pancardno" name="pancardno"
                                                value="{{isset($party)?$party->pancard_no : old('pancardno')}} ">
                                        </div>
                                    </div>
                                </div>
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
                        </div>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{isset($party)? $party->id:''}}">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Party Data</h3>
                    </div>
                    <div class="card-body">
                    <table id="example1" class="table  table-hover table-valign-middle table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th> Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>GST No.</th>
                                <th>PANCard No.</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($parties as $value)

                                <tr>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td scope="row">
                                        {{$value->name}}
                                    </td>
                                    <td>
                                        {{$value->address}}
                                    </td>
                                    <td>
                                        {{$value->email}}
                                    </td>
                                    <td>
                                        {{$value->phone_number}}
                                    </td>
                                    <td>
                                        {{$value->gst}}
                                    </td>
                                    <td>
                                        {{$value->pancard_no}}
                                    </td>
                                    <td class="text-center">
                                        @if ($value->status == '1')
                                            <button class="btn btn-sm text-center btn-success">Active</button>
                                        @else
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn" href="{{route('party.edit', $value->id)}}">
                                            <i class="fa  fa-pen text-warning"></i> Edit
                                        </a>
                                        <a class="btn" href="{{route('party.delete', $value->id)}}">
                                            <i class="fa fa-trash text-danger"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>

                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@include('layouts.footer')
