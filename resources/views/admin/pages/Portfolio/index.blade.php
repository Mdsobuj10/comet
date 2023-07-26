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
                                <th >title</th>
                                <th >category</th>
                                <th >client</th>
                                <th >date</th>
                                <th>created at</th>
                                <th>status</th>
                                @if ($form_type == 'create')
                                <th>action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($portflio as $portflio)
                            <tr>
                                <td>{{$loop -> index + 1}}</td>
                                <td>{{$portflio -> title}}</td>
                                <td>{{$portflio -> category}}</td>
                                <td>{{$portflio -> client}}</td>
                                <td>{{$portflio -> date}}</td>
                                 <td>{{$portflio -> created_at -> diffForHumans()}}</td>
                                <td>
                                    @if ($portflio-> status)
                                       <span class="badge badge-success">Active user</span>
                                       <a class=" btn text-danger" href="{{route('cetagory.status.update', $portflio -> id)}}"><i class="fa fa-times"></i></a>
                                       @else
                                       <span class="badge badge-danger">Block user</span>
                                       <a class=" btn btn-xl text-primary" href="{{route('cetagory.status.update', $portflio-> id)}}"><i class="fa fa-check"></i></a>

                                    @endif
                               </td>
                                
                               @if ($form_type == 'create')
                                <td>
                                 <a class=" btn btn-sm btn-primary" href="{{route('categorys.edit', $portflio -> id)}}"><i class="fa fa-edit"></i></a> 
                                     
                                  <form class="d-inline delete-btn" action="{{route('categorys.destroy', $portflio -> id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form> 
                                </td>
                                @endif 
                            </tr>
                            
                            @empty
                              <tr><td colspan="8" class=" text-center"> data not found</td></tr>
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
                <h4 class="card-title">Add New Portfolio</h4>
               
                @include('validation') 
                @include('error')

            </div>
            <div class="card-body">
                <form action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input name="name" value="{{old('name')}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>featured images</label>
                        <br>
                        <img width="100%; object-fit:cover;" id="slider-preview-photo" src="" alt="">
                        <br>
                        <input name="photo" style="display: none" type="file" class="form-control" id="slider-photo">
                       
                        <label for="slider-photo">
                            <img style="width: 100px; cursor:pointer;" src="{{url('storage/admins/images.png')}}" alt="">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>gallery</label>
                        <br>
                        <div class="gellay-image"></div>
                        <input name="photo" style="display:none" type="file"  multiple class="form-control portflio-gallery-name" id="portflio-photo">
                       
                        <label for="portflio-photo">
                            <img style="width: 100px; cursor:pointer;" src="{{url('storage/admins/images.png')}}" alt="">
                        </label>
                        <div class="form-group">
                            <label>desc</label>
                            <br>
                            <textarea  name="" id="portfolio" cols="40" rows="2">ready</textarea>
                        </div>
                        <div class="form-group">
                            <label>Types</label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>steps</label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Clients name</label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input name="name" value="{{old('name')}}" type="date" class="form-control">
                        </div>

                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        
        @endif

        {{-- @if ($form_type == 'edite')
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
  --}}
    </div>
</div>



@endsection