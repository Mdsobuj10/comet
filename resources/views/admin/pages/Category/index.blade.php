@extends('admin.layouts.app')


@section('main')
<div class="row">
    <div class="col-lg-8">
        @include('validate')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">permission table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th >name</th>
                                <th >slug</th>
                                <th>created at</th>
                                <th>status</th>
                                @if ($form_type == 'create')
                                <th>action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($categorys as $category)
                            <tr>
                                <td>{{$loop -> index + 1}}</td>
                                <td>{{$category -> name}}</td>
                                <td>{{$category -> slug}}</td>
                                 <td>{{$category -> created_at -> diffForHumans()}}</td>
                                <td>
                                    @if ($category-> status)
                                       <span class="badge badge-success">Active user</span>
                                       <a class=" btn text-danger" href="{{route('cetagory.status.update', $category -> id)}}"><i class="fa fa-times"></i></a>
                                       @else
                                       <span class="badge badge-danger">Block user</span>
                                       <a class=" btn btn-xl text-primary" href="{{route('cetagory.status.update', $category-> id)}}"><i class="fa fa-check"></i></a>

                                    @endif
                               </td>
                                
                               @if ($form_type == 'create')
                                <td>
                                 <a class=" btn btn-sm btn-primary" href="{{route('categorys.edit', $category -> id)}}"><i class="fa fa-edit"></i></a> 
                                     
                                  <form class="d-inline delete-btn" action="{{route('categorys.destroy', $category -> id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form> 
                                </td>
                                @endif 
                            </tr>
                            
                            @empty
                              <tr><td colspan="5" class=" text-center"> data not found</td></tr>
                            @endforelse 

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @if ($form_type == 'create')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Counter</h4>
               
                @include('validation') 
                @include('error')

            </div>
            <div class="card-body">
                <form action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input name="name" value="{{old('name')}}" type="text" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        
        @endif

        @if ($form_type == 'edite')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category Edite</h4>
                <a class="btn btn-sm d-inline btn-primary" href="{{route('categorys.index')}}"> back</a>
                @include('validation')
                @include('error')

            </div>
            <div class="card-body">
                <form action="{{route('categorys.update',$single_data -> id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label> Category name</label>
                        <input name="name" value="{{$single_data -> name}}" type="text" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
 
    </div>
</div>



@endsection