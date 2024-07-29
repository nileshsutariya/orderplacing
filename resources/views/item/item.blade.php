@include('layouts.header')

<section class="content ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size:35px ;">
                            Items
                        </h3>
                    </div>
                    <div class="card-body">
                        @if(isset($item))
                            <form action="{{route('item.update',$item->id)}}" method="post">
                        @else
                            <form action="{{route('item.store')}}" method="post">
                        @endif
                            @csrf
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="group_id">Item Group</label>
                                        <select name="group_id" id="group_id" class="form-control">
                                            <option value="">-- Select Item Group --</option>
                                            @foreach ($itemgroup as $items)
                                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                                                {{-- <option value="@php if(isset($itemgroup))  {echo $itemgroup->name;} else echo old('name'); @endphp ">{{ $items->name }}</option> --}}

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name" class=" col-form-label ">Item Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="@php if(isset($item))  {echo $item->name;} else echo old('name'); @endphp ">
                                        <span class="text-danger">
                                            @error('name')
                                            {{$message}} @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class=" col-form-label text-dark">Description</label>
                                        <textarea type="text" class="form-control" id="description"
                                            name="description">@php if(isset($item)) {echo $item->description;} else echo old('description'); @endphp </textarea>
                                        <span class="text-danger">@error('description')
                                        {{$message}} @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price" class=" col-form-label text-dark">Price</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            value="@php if(isset($item)) {echo $item->price;}else echo old('price'); @endphp ">
                                        <span class="text-danger">@error('price')
                                        {{$message}} @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="qty" class=" col-form-label text-dark">qty</label>
                                        <input type="text" class="form-control" id="qty" name="qty"
                                            value="@php if(isset($item)){echo $item->qty;} else echo old('qty'); @endphp ">
                                        <span class="text-danger">@error('qty')
                                        {{$message}} @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="active" name="status" @php
                                            if(isset($item)){if($item['status']=='1' ){echo "checked" ;}} @endphp
                                                checked>
                                            <label for="active">is Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-success">submit</button>
                                <input type="hidden" class="form-control" id="id" name="id"
                                            value="@php if(isset($item))  {echo $item->id;} @endphp ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.footer')