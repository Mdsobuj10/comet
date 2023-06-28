
@if (Session::has('danger'))
<p class="alert alert-danger">{{Session::get('danger')}} <button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if (Session::has('success'))
<p class="alert alert-success">{{Session::get('success')}} <button class="close" data-dismiss="alert">&times;</button></p>
@endif

