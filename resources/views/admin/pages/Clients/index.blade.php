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
                    <table id="data-table" class="table data-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th >name</th>
                                <th >photo</th>
                                <th >create at</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($client as $client)
                            <tr>
                                <td>{{$loop -> index + 1}}</td>
                                <td>{{$client -> name}}</td>
                                <td>
                                    <img class="table-photo" src="{{url('storage/clients/'. $client -> logo )}}" alt="">
                                </td>
                                
                                 <td>{{$client -> created_at -> diffForHumans()}}</td>
                                <td>
                                    @if ($client -> status)
                                       <span class="badge badge-success">Active user</span>
                                       <a class=" btn text-danger" href="{{route('client.status.update', $client -> id)}}"><i class="fa fa-times"></i></a>
                                       @else
                                       <span class="badge badge-danger">Block user</span>
                                       <a class=" btn btn-xl text-primary" href="{{route('client.status.update', $client-> id)}}"><i class="fa fa-check"></i></a>

                                    @endif
                               </td>
                                
                                <td>
                                    
                                    <a class=" btn btn-sm btn-primary" href="{{route('slider.edit', $client-> id)}}"><i class="fa fa-edit"></i></a>
                                     
                                   <form class="d-inline delete-btn" action="{{route('client.destroy', $client -> id)}}" method="POST">
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
                <h4 class="card-title">Add New Slider</h4>
                @include('validation')
                @include('error')

            </div>
            <div class="card-body">
                <form action="{{route('client.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <br>
                        <img width="100%; object-fit:cover;" id="slider-preview-photo" src="" alt="">
                        <br>
                        <input name="logo" style="display: none" type="file" class="form-control" id="slider-photo">
                       
                        <label for="slider-photo">
                            <img style="width: 100px; cursor:pointer;" src="{{url('storage/admins/images.png')}}" alt="">
                        </label>
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
            <div class="card-header">
                <h4 class="card-title">Slider Edite</h4>
                <a class="btn btn-sm d-inline btn-primary" href="{{route('slider.index')}}"> back</a>
                @include('validation')
                @include('error')

            </div>
            <div class="card-body">
                <form action="{{route('slider.update',$single_slider -> id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label> Title</label>
                        <input name="title" value="{{$single_slider -> title}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Subtitle</label>
                        <input name="subtitle" value="{{$single_slider -> subtitle}}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <br>
                        <img width="100%; object-fit:cover;" id="slider-preview-photo" src="{{url('storage/slider/' . $single_slider -> photo)}}" alt="">
                        <br>
                        <input name="photo" style="display: none" type="file" class="form-control" id="slider-photo">
                       
                        <label for="slider-photo">
                            <img style="width: 100px; cursor:pointer;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2-ndncY4T3fxrZtvIzRderLgyRkzJGbALoZc5zuE8zg&s" alt="">
                        </label>
                    </div>
                    @foreach (json_decode($single_slider -> btns) as $btn )
                    <div class="btn-option-area">
                        <span>Button #</span>
                        <span class="badge badge-danger remove-btn" style="margin-left:170px; cursor:pointer">Remove</span>
                        
                        <input name="btn_title[]" value="{{$btn -> btn_title}}" class="form-control" placeholder="title" type="text">
                        <input name="btn_link[]" value="{{$btn -> btn_link}}" class="form-control" placeholder="link" type="text">
                        <br>
                          <select class="form-control" name="btn_type[]" >
                          <option @if ($btn -> btn_type ===  'btn btn-light-out') selected @endif value="btn btn-light-out">deaful butoon</option>
                          <option @if ($btn -> btn_type ===  'btn btn-color btn-full') selected @endif value="btn btn-color btn-full">Red</option>
                          </select>
                        
                    </div>
                    @endforeach
                    <div class="form-group slider-btn-otp">
                        <a id="slider-btn-click" class="btn btn-sm btn-info" href="">Add Button</a>
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