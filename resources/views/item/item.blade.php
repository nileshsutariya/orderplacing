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

                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="group_id">Item Group</label>
                                <select name="group_id" id="group_id" class="form-control">
                                    <option value="">-- Select Item Group --</option>
                                    {{-- @foreach ($itemgroup as $i) --}}
                                    {{-- <option value="{{ $i->id }}" <?php if (isset($item) && $item->group_id == $i->id) { --}}
                                            // echo 'selected';
                                        // } 
                                        // ?>
                                        {{-- >{{ $i->name }}  --}}
                                    {{-- </option> --}}
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name" class=" col-form-label ">Item Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="@php if(isset($item))  {echo $item->name;} else echo old('name'); @endphp ">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="description" class=" col-form-label text-dark">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description">@php
                                    if (isset($item)) {
                                        echo $item->description;
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

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price" class=" col-form-label text-dark">Price</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            value="@php if(isset($item)) {echo $item->price;}else echo old('price'); @endphp ">
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
                                            value="@php if(isset($item)){echo $item->qty;} else echo old('qty'); @endphp ">
                                        <span class="text-danger">
                                            @error('qty')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

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
                        <h3 class="card-title">Item Data</h3>
                    </div>


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
                            {{-- @php
                                $i = 1;
                            @endphp
                            @foreach ($item as $value)
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
                                            <i class="fa  fa-pen text-warning"></i> Edit
                                        </a>
                                        <a class="btn" href="{{route('item.delete',$value->id)}}">
                                            <i class="fa fa-trash text-danger"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
