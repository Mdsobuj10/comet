@extends('admin.layouts.app')


@section('main')
<div class="row">
    <div class="col-lg-8">
        @include('validate')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">role table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>slug</th>
                                <th>permission</th>
                                <th>created at</th>
                                <th>Users</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{$loop -> index + 1}}</td>
                                <td>{{$role -> name}}</td>
                                <td>{{$role -> slug}}</td>
                                <td>
                                    @forelse (json_decode($role -> permission) as $item )
                                        <ul style="list-style: none; padding-left:0px;">
                                            <li>
                                             <i class="fa fa-angle-right"></i>   {{$item}}
                                            </li>
                                        </ul>
                                    @empty
                                        <li>data not fount</li>
                                    @endforelse
                                </td>
                                <td>{{$role -> created_at -> diffForHumans()}}</td>
                                <td>
                                    <ul>
                                        @forelse (json_decode($role -> users) as $item)
                                        <li>{{$item -> name}}</li>
                                        @empty
                                          <li>not found user</li>
                                        @endforelse
                                    </ul>
                                    </td>
                                <td>
                                    {{-- <a class=" btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a> --}}
                                    <a class=" btn btn-sm btn-primary" href="{{route('role.edit', $role -> id)}}"><i class="fa fa-edit"></i></a>
                                    {{-- <a class=" btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a> --}}
                                    <form class="d-inline delete-btn" action="{{route('role.destroy', $role -> id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                    
                            @empty
                              <tr><td colspan="6" class=" text-center"> data not found</td></tr>
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
                <h4 class="card-title">Add New role</h4>
                @include('validation')
                @include('error')
            </div>
            <div class="card-body">
                <form action="{{route('role.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label> Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">

                       @forelse ($permissions as $item )
                       <ul style="list-style:none; padding-left:0px;">
                        <li>
                            <label for="permission">
                                <input id="permission" type="checkbox" name="permission[]" value="{{$item -> name}}" > {{$item -> name}} </label>
                        </li>
                       </ul> 
                       @empty
                           <li>no record founds</li>
                       @endforelse
                    </div
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
        @if ($form_type == 'edite')
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">edite Role</h4>
                <a class="btn btn-sm d-inline btn-primary" href="{{route('role.index')}}"> back</a>
            </div>
            @include('validation')
            @include('error')
            <div class="card-body">
                <form action="{{route('role.update', $edite -> id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label> Name</label>
                        <input name="name" value="{{$edite -> name}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <ul style="list-style: none; padding-left:0px;">
                            @forelse (json_decode($permissions) as $item)
                                <li>
                                    <label><input type="checkbox" @if (in_array( $item -> name,  json_decode($edite -> permission)))
                                        checked
                                    @endif name="permission[]" value="{{$item -> name}}" id="">{{$item -> name}}</label>
                                </li>
                            @empty
                                
                            @endforelse
                        </ul>
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
