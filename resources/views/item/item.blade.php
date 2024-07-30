@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Items</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Items</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Items</h3>
                    </div>
                    <div class="card-body">

                        @if (isset($items))
                            <form action="{{ route('item.update', $items->id) }}" method="post">
                            @else
                                <form action="{{ route('item.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="group_id">Item Group</label>
                                    <select name="group_id" id="group_id" class="form-control">
                                        @if (isset($items))
                                        @else
                                            <option value="">-- Select Item Group --</option>
                                        @endif
                                        @foreach ($itemgroup as $i)
                                            {{-- @php print_r("jhyffyeww");
                                                die();@endphp --}}
                                            <option value="{{ $i->id }}" <?php if (isset($items) && $items->group_id == $i->id) {
                                                echo 'selected';
                                            } ?>>{{ $i->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class=" col-form-label ">Item Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="@php if(isset($items))  {echo $items->name;} else echo old('name'); @endphp ">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description" class=" col-form-label text-dark">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description">@php
                                        if (isset($items)) {
                                            echo $items->description;
                                        } else {
                                            echo old('description');
                                        }
                                    @endphp </textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price" class=" col-form-label text-dark">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="@php if(isset($items)) {echo $items->price;}else echo old('price'); @endphp ">
                                    <span class="text-danger">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="qty" class=" col-form-label text-dark">qty</label>
                                    <input type="text" class="form-control" id="qty" name="qty"
                                        value="@php if(isset($items)){echo $items->qty;} else echo old('qty'); @endphp ">
                                    <span class="text-danger">
                                        @error('qty')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="active" name="status"
                                            @php
if(isset($items)){if($items['status']=='1' ){echo "checked" ;}} @endphp
                                            checked>
                                        <label for="active">is Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">submit</button>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="@php if(isset($items))  {echo $items->id;} @endphp ">
                    </div>
                    </form>
                </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-outline card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Item Group Data</h3>
                        </div>

                        <div class="card-body">

                        <table id="example1" class="table  table-hover table-valign-middle table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Qauntity</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="m-3 p-3">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($item as $value)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td scope="row">
                                            {{ $value->name }}
                                        </td>
                                        <td>
                                            {{ $value->description }}
                                        </td>
                                        <td>
                                            {{ $value->price }}
                                        </td>
                                        <td>
                                            {{ $value->qty }}
                                        </td>
                                        <td class="text-center">
                                            @if ($value->status == '1')
                                                <button class="btn btn-sm text-center btn-success">Active</button>
                                            @else
                                                <button class="btn btn-sm btn-danger">Inactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn" href="{{ route('item.edit', $value->id) }}">
                                                <i class="fa  fa-pen text-warning"></i> Edit
                                            </a>
                                            <a class="btn" href="{{ route('item.delete', $value->id) }}">
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
