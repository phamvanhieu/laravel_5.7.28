@if (Session::has('error'))
    <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif
@if (Session::has('message'))
    <p class="alert alert-success">{{Session::get('message')}}</p>
@endif