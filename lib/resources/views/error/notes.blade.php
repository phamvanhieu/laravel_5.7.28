@if (Session::has('errors'))
    <p class="alert alert-danger">{{Session::get('errors')}}</p>
@endif