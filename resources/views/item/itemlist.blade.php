@include('layouts.header')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h1 class="card-title"style="font-size:35px ;"> Item data</h1>
                        <a href="{{route('item.create')}}" class="btn btn-danger float-right">Add item</a>
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
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($item as $value)
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>
                                        <td scope="row">
                                            {{$value->name}}
                                        </td>
                                        <td>
                                            {{$value->description}}
                                        </td>
                                        <td>
                                            {{$value->price}}
                                        </td>
                                        <td>
                                            {{$value->qty}}
                                        </td>
                                        <td class="text-center">
                                            @if ($value->status == '1')
                                                <button class="btn btn-sm text-center btn-success">Active</button>
                                            @else
                                                <button class="btn btn-sm btn-danger">Inactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn" href="{{route('item.edit',$value->id)}}">
                                                <i class="far  fa-edit text-success"></i> 
                                            </a>
                                            <a href="{{route('item.delete',$value->id)}}">
                                                <i class="fa fa-trash text-danger"></i> 
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
    </div>
</section>
<script type="text/javascript">
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

@include('layouts.footer')