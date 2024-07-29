@include('layouts.header')

<section class="content ">
    <div class="container md-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title text-light">
                            item_groups
                        </h3>
                    </div>
                    <div class="card-body">
                        @if(isset($itemgroup))
                            <form action="{{route('itemgroup.update',$itemgroup->id)}}" method="post">
                        @else
                            <form action="{{route('itemgroup.store')}}" method="post">
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name" class=" col-form-label ">Item Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="@php if(isset($itemgroup))  {echo $itemgroup->name;} else echo old('name'); @endphp ">
                                        <span class="text-danger">
                                            @error('name')
                                            {{$message}} @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="description" class=" col-form-label text-dark">Description</label>
                                        <textarea type="text" class="form-control" id="description"
                                            name="description">@php if(isset($itemgroup)) {echo $itemgroup->description;} else echo old('description'); @endphp </textarea>
                                        <span class="text-danger">@error('description')
                                        {{$message}} @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="active" name="status" @php
                                            if(isset($itemgroup)){if($itemgroup['status']=='1' ){echo "checked" ;}} @endphp
                                                checked>
                                            <label for="active">is Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-success">submit</button>
                                <input type="hidden" class="form-control" id="id" name="id"
                                            value="@php if(isset($itemgroup))  {echo $itemgroup->id;} @endphp ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

@include('layouts.footer')