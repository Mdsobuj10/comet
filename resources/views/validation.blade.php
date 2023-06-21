@if ($errors -> any())
<p class="alert alert-danger">{{$errors -> first()}} <button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if (Session::has('danger'))
<p class="alert alert-danger">{{Session::get('danger')}} <button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if (Session::has('success'))
<p class="alert alert-danger">{{Session::get('success')}} <button class="close" data-dismiss="alert">&times;</button></p>
@endif