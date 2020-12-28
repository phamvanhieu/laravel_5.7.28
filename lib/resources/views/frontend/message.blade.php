@extends('frontend.master')
@section('content')
<!-- Login  -->
<div class="col-sm-8 col-lg-9 mtb_20">
  <div class="row">
    <div id="comments" class="comments-area mt_20">
      <h3 class="comment-title">{{$count_message}} Tin Nhắn Từ Admin</h3>
      <ul class="comment-list mt_20">
        @foreach ($data as $item)
        <li class="comment">
          <article class="comment-body mtb_20"> 
            <div class="comment-main">
              <?php $id = $item->contact_id ;$contact = App\Contact::find($id); ?>
            <h5 class="author-name"> <span class="comment-name">TÔI</span><small class="comment-date" style="color: #fff">
                {{date( "H:i:s d/m/Y ",strtotime($contact->created_at ))}} </small> </h5>
            <div class="comment-content">{{$contact->note}}.</div>
            <h5 class="author-name"> <span class="comment-name">ADMIN</span>
              <small class="comment-date" style="color: #fff">
                {{date( "H:i:s d/m/Y ",strtotime($item->created_at ))}} </small> </h5>
                <div class="comment-content">{{$item->note}}.</div>
            </div>
          </article>
        </li>
        @endforeach
        {{ $data->links('vendor.pagination.default') }}
      </ul>
    </div>
  </div>
</div>
<!-- End Login  -->
@endsection