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

                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class=" col-form-label ">Item Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="@php if(isset($item_group))  {echo $item_group->name;} else echo old('name'); @endphp ">
                                <span class="text-danger">
                                    @error('name')
                                    {{$message}} @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="description" class=" col-form-label text-dark">Description</label>
                                <textarea type="text" class="form-control" id="description"
                                    name="description">@php if(isset($item_group)) {echo $item_group->description;} else echo old('description'); @endphp </textarea>
                                <span class="text-danger">@error('description')
                                {{$message}} @enderror
                                </span>
                            </div>
                            
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-7">
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Item Group Data</h3>
                    </div>


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
                           @foreach ($item_groups as $item_group)
                                <tr>
                                    <td>
                                        {{$i++}}
                                    </td>
                                    <td scope="row">
                                        <td>{{ $item_group->name }}</td>
                                    </td>
                                    <td>
                                        <td>{{ $item_group->description }}</td>

                                    </td>
                                    <td class="text-cengroupter">
                                        @if ($item_group->status == '1')
                                            <button class="badge bg-success">Active</button>
                                        @else
                                            <button class="badge rounded-pill bg-danger">Inactive</button>
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
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
