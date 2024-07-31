@include('layouts.header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Item Group</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Item Group</li>
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
                        <h3 class="card-title">Item Group</h3>
                    </div>
                    @if (isset($itemgroup))
                            <form action="{{ route('itemgroup.update') }}" method="post">
                            @else
                                <form action="{{ route('itemgroup.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class=" col-form-label ">Item Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ isset($itemgroup)? $itemgroup->name : old('name')}}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{$message}}
                                        @enderror
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="description" class=" col-form-label text-dark">Description</label>
                                <textarea type="text" class="form-control" id="description"
                                    name="description">{{ isset($itemgroup)? $itemgroup->description : old('description')}}</textarea>
                            </div>
                            
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="active" name="status" value="1" 
                                        {{ isset($itemgroup) && $itemgroup->status=='1' ? 'checked' : '' }} >
                                        <label for="active">is Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{ isset($itemgroup)? $itemgroup->id:''}}">
                            <button type="submit" class="btn btn-success">Submit</button>
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

                    <table id="example1" class="table  table-hover table-valign-middle table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                           @foreach ($itemgroups as $item_group)
                                <tr>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td scope="row">
                                        {{ $item_group->name }}
                                    </td>
                                        <td>{{ $item_group->description }}</td>
                                    <td class="text-cengroupter">
                                        @if ($item_group->status == '1')
                                            <button class="badge bg-success">Active</button>
                                        @else
                                            <button class="badge bg-danger">Inactive</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn" href="{{route('itemgroup.edit',$item_group->id)}}">
                                            <i class="fa fa-pen text-warning"></i> Edit
                                        </a>
                                        <a class="btn" href="{{route('itemgroup.delete',$item_group->id)}}">
                                            <i class="fa fa-trash text-danger"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{$itemgroups->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function() {
        // $("#example1").DataTable({
        //     "responsive": true,
        //     "lengthChange": false,
        //     "autoWidth": false,
        // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@include('layouts.footer')
