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

                        @if (isset($item))
                            <form action="{{ route('item.update') }}" method="post">
                            @else
                                <form action="{{ route('item.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="group_id">Item Group</label>
                                    <select name="group_id" id="group_id" class="form-control">
                                        @if (!isset($item))
                                            <option value="">-- Select Item Group --</option>
                                        @endif
                                        @foreach ($itemgroup as $i)
                                            <option value="{{ $i->id }}" {{isset($item) && $item->group_id == $i->id ?'selected':''}}>{{ $i->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class=" col-form-label ">Item Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{isset($item)? $item->name : old('name')}} ">
                                        @error('name')<span class="text-danger">
                                            {{ $message }}
                                    </span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description" class=" col-form-label text-dark">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description">{{isset($item)? $item->description:old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price" class=" col-form-label text-dark">Price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{isset($item)? $item->price : old('price')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="qty" class=" col-form-label text-dark">qty</label>
                                    <input type="text" class="form-control" id="qty" name="qty"
                                    value="{{isset($item)?$item->qty : old('qty')}}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="active" name="status"
                                        {{ isset($item) && $item->status=='1' ? 'checked' : '' }} >
                                        <label for="active">is Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">submit</button>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value=" {{isset($item)? $item->id:""}} ">
                    </div>
                    </form>
                </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Item Group Data</h3>
                        </div>

                        <div class="card-body">

                        <table id="example1" class="table table-hover table-valign-middle table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Qauntity</th>
                                    <th>Status</th>
                                    @if (isset($items))
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="m-3 p-3">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($items as $value)
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
                                                <i class="fa fa-pen text-warning"></i> Edit
                                            </a>
                                            <a class="btn" href="{{ route('item.delete', $value->id) }}">
                                                <i class="fa fa-trash text-danger"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{$items->links('pagination::bootstrap-5')}}
                        </div>
                        {{-- Paginate {{ $items->links('pagination::bootstrap-5' ) }} --}}
                        {{-- {{ $items->links('pagination::bootstrap-4')}} --}}
                        {{-- {!! $items->links('pagination::bootstrap-5') !!} --}}
                        
                    </div>
                </div>
            </div>
        {{-- </div> --}}
</section>
<script type="text/javascript">
    $(function() {
        // $("#example1").DataTable({
        //     "responsive": true,
        //     "lengthChange": false,
        //     "autoWidth": false,
        // }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@include('layouts.footer')