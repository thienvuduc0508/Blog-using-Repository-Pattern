@if(count($post->comments) == 0)
    <h4 class="text-danger">Chưa có bình luận nào!</h4>
    @endif
@foreach($post->comments as $comment)
    <div >
        <div>
            <strong>{{ $comment->user->name }}: </strong>
            <p>{{$comment->comment}} </p>
        </div>
        <p> {{ $comment['created_at']->hour }}h:{{ $comment['created_at']->minute}}m |
            {{ $comment['created_at']->day}}/{{ $comment['created_at']->month }}/{{ $comment['created_at']->year }}</p>
        <hr>
    </div>
@endforeach
