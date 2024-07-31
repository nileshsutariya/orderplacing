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
                                value="@php if(isset($party))  {echo $party->name;} else echo old('name'); @endphp ">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class=" col-form-label text-dark">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="@php if(isset($party)) {echo $party->email;}else echo old('email'); @endphp ">
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone number" class=" col-form-label text-dark">Phone number</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                                value="@php if(isset($party)){echo $party->phone_number;} else echo old('phonenumber'); @endphp ">
                            @error('phonenumber')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" class=" col-form-label text-dark">Address</label>
                            <textarea type="text" class="form-control" id="address" name="address">@php
                                if (isset($party)) {
                                    echo $party->address;
                                } else {
                                    echo old('address');
                                }
                            @endphp </textarea>
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
                                    <input type="text" class="form-control" id="input-gst" name="gst"
                                        value="@php if(isset($party)){echo $party->gst;} else echo old('gst'); @endphp ">
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
                                        value="@php if(isset($party)){echo $party->pancard_no;} else echo old('pancardno'); @endphp ">
                                    @error('pancardno')
                                        <span class="text-danger" id="pancardno">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    {{-- <span id="pancardno" class="error">Invalid PAN Number</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="active" name="status" value="1"
                                            @php
                                            if(isset($itemgroup)){if($itemgroup['status']=='1' ){echo "checked" ;}} @endphp >
                                        <label for="active">is Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="@php if(isset($party))  {echo $party->id;} @endphp ">
                                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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

                        <table id="example" class="table table-responsive  table-hover table-valign-middle table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
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
                                @foreach ($parties as $value)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td scope="row">
                                            {{ $value->name }}
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
                                        <td>
                                            {{ $value->gst }}
                                        </td>
                                        <td>
                                            {{ $value->pancard_no }}
                                        </td>
                                        <td class="text-center">
                                            @if ($value->status == '1')
                                                <button class="badge bg-success">Active</button>
                                            @else
                                                <button class="badge bg-danger">Inactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn" href="{{ route('party.edit', $value->id) }}">
                                                <i class="fa  fa-pen text-warning"></i> Edit
                                            </a>
                                            <a class="btn" href="{{ route('party.delete', $value->id) }}">
                                                <i class="fa fa-trash text-danger"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    <div class="mt-3">
                        {{$parties->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script type="text/javascript">
// // function checksum(g){
// //     let regTest = /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/.test(g)
// //      if(regTest){
// //         let a=65,b=55,c=36;
// //         return Array['from'](g).reduce((i,j,k,g)=>{ 
// //            p=(p=(j.charCodeAt(0)<a?parseInt(j):j.charCodeAt(0)-b)*(k%2+1))>c?1+(p-c):p;
// //            return k<14?i+p:j==((c=(c-(i%c)))<10?c:String.fromCharCode(c+b));
// //         },0); 
// //     }
// //     return regTest
// // }

// // console.log(checksum('27AAPFU0939F1ZV'))
// // console.log(checksum('27AASCS2460H1Z0'))
// // console.log(checksum('29AAGCB7383J1Z4'))


// // $(document).ready(function() {
// //   $.validator.addMethod("gst", function(value3, element3) {
// //     var gst_value = value3.toUpperCase();
// //     var reg = /^([0-9]{2}[a-zA-Z]{4}([a-zA-Z]{1}|[0-9]{1})[0-9]{4}[a-zA-Z]{1}([a-zA-Z]|[0-9]){3}){0,15}$/;
// //     if (this.optional(element3)) {
// //       return true;
// //     }
// //     if (gst_value.match(reg)) {
// //       return true;
// //     } else {
// //       return false;
// //     }

// //   }, "Please specify a valid GSTTIN Number");

// //   $('#myform').validate({ // initialize the plugin
// //     rules: {
// //       gst: {
// //         required: true,
// //         gst: true
// //       }

// //     },
// //     submitHandler: function(form) {
// //       alert('valid form submitted');
// //       return false;
// //     }
// //   });
// // });

// $(function () {
//     $("#submit").click(function() {
//         var regex=/([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
//         if(regex.test($("#pancardno").val().toUpperCase())) {
//             $("#pancardno").css("visibility", "hidden");
//         } else {
//             $("#pancardno").css("visibility", "visible");
//         }
//     });
// });


//     // $(function() {
//     //     $("#example").DataTable({
//     //         "responsive": true,
//     //         "lengthChange": false,
//     //         "autoWidth": false,
//     //     }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     // });
</script>
@include('layouts.footer')