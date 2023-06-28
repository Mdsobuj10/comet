
@extends('admin.layouts.app')


@section('main')
<div class="row">
    <div class="col-lg-8">
        @include('validate')
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">permission table</h4>
                <a class="text-danger" href="{{route('admin.trash')}}">user trash <i class=" fa fa-arrow-right"></i></a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Role</th>
                                <th>Photo</th>
                                <th>created at</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            avator.png

                            @forelse ($admin as $item)
                                @if ($item -> name !== 'provider')
                                <tr>
                                    <td>{{$loop -> index + 1}}</td>
                                    <td>{{$item-> name}}</td>
                                    <td>{{$item -> role -> name}}</td>
                                    <td>
                                        @if  ($item -> photo == 'avator.png' )
                                            <img  style="width: 60px; height: 60px;object-fit: cover;" src="{{url('storage/admins/download.jfif')}}" alt="">
                                        @endif
                                      
                                    </td>
                                    <td>{{$item -> created_at -> diffForHumans()}}</td>
                                    <td>
                                         @if ($item -> status)
                                            <span class="badge badge-success">Active user</span>
                                            <a class=" btn text-danger" href="{{route('admin.status.update', $item -> id)}}"><i class="fa fa-times"></i></a>
                                            @else
                                            <span class="badge badge-danger">Block user</span>
                                            <a class=" btn btn-xl text-primary" href="{{route('admin.status.update', $item -> id)}}"><i class="fa fa-check"></i></a>

                                         @endif
                                    </td>
                                    <td>
                                        {{-- <a class=" btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a> --}}
                                        <a class=" btn btn-sm btn-primary" href="{{route('admin-user.edit', $item -> id)}}"><i class="fa fa-edit"></i></a>
                                        <a class=" btn btn-sm btn-primary" href="{{route('admin.trash.update', $item -> id)}}"><i class="fa fa-trash"></i></a>
                                        {{-- <a class=" btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a> --}}
                                        {{-- <form class="d-inline delete-btn" action="{{route('admin-user.destroy', $item -> id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                        </form> --}}
                                    </td>
                                </tr>
                        
                                @endif
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
                <h4 class="card-title">Add New user</h4>
                @include('validation')
                @include('error')
            </div>
            <div class="card-body">
                <form action="{{route('admin-user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" value="{{old('email')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>UserName</label>
                        <input name="username" type="text" value="{{old('username')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Cell</label>
                        <input name="cell" type="text" value="{{old('cell')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" id="" value="{{old('role')}}" class="form-control">
                            <option value="">select</option>
                            @foreach ($roles as $role )
                            <option value="{{$role -> id}}">{{$role -> name}}</option>
                            @endforeach
                        </select>
                  
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        {{-- @if ($form_type == 'edite')
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">edite permission</h4>
                <a class="btn btn-sm d-inline btn-primary" href="{{route('permission.index')}}"> back</a>
                @include('validation')
            </div>
            <div class="card-body">
                <form action="{{route('permission.update', $per -> id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label> Name</label>
                        <input name="name" value="{{$per -> name}}" type="text" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif --}}

    </div>
</div>
@endsection
