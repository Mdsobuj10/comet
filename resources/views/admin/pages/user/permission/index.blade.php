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
                                <th>name</th>
                                <th>slug</th>
                                <th>created at</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($all_permission as $all_permission)
                            <tr>
                                <td>{{$loop -> index + 1}}</td>
                                <td>{{$all_permission -> name}}</td>
                                <td>{{$all_permission -> slug}}</td>
                                <td>{{$all_permission -> created_at -> diffForHumans()}}</td>
                                <td>
                                    {{-- <a class=" btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a> --}}
                                    <a class=" btn btn-sm btn-primary" href="{{route('permission.edit', $all_permission -> id)}}"><i class="fa fa-edit"></i></a>
                                    {{-- <a class=" btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a> --}}
                                    <form class="d-inline delete-btn" action="{{route('permission.destroy', $all_permission -> id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
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
                <h4 class="card-title">Add New permission</h4>
                @include('validation')
            </div>
            <div class="card-body">
                <form action="{{route('permission.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label> Name</label>
                        <input name="name" type="text" class="form-control">
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
        @endif

    </div>
</div>
@endsection