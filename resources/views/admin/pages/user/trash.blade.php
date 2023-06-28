
@extends('admin.layouts.app')


@section('main')
<div class="row">
    <div class="col-lg-12">
        @include('validate')
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">permission table</h4>
                <a class="text-danger" href="{{route('admin-user.index')}}">user show<i class=" fa fa-arrow-right"></i></a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Photo</th>
                                <th>created at</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            avator.png

                            @forelse ($trash as $item)
                                @if ($item -> name !== 'provider')
                                <tr>
                                    <td>{{$loop -> index + 1}}</td>
                                    <td>{{$item-> name}}</td>
                                    <td>
                                        @if  ($item -> photo == 'avator.png' )
                                            <img  style="width: 60px; height: 60px;object-fit: cover;" src="{{url('storage/admins/download.jfif')}}" alt="">
                                        @endif
                                      
                                    </td>
                                    <td>{{$item -> created_at -> diffForHumans()}}</td>
    
                                    <td>
                                        {{-- <a class=" btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a> --}}
                                        <a class=" btn btn-sm btn-primary" href="{{route('admin.trash.update', $item -> id)}}">restor</a>
                                        {{-- <a class=" btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a> --}}
                                        <form class="d-inline delete-btn" action="{{route('admin-user.destroy', $item -> id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
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
@endsection
