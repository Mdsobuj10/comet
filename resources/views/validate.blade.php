

@if (Session::has('danger-main'))
<p class="alert alert-danger">{{Session::get('danger-main')}} <button class="close" data-dismiss="alert">&times;</button></p>
@endif

@if (Session::has('success-main'))
<p class="alert alert-success">{{Session::get('success-main')}} <button class="close" data-dismiss="alert">&times;</button></p>
@endif

