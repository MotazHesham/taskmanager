
@if($messages->count() >= 100)
    <div class="conversation-start">
        <span><button class="btn btn-light btn-pill" onclick="loadmore('{{$conversation->id}}')">load-more</button></span>
    </div>  
@endif

@foreach($messages as $message)
    <div class="bubble @if($message->user_id == Auth::id()) me @else you @endif" title="{{calculate_diff_date($message->created_at)}}">
        {{$message->message}}
    </div> 
@endforeach 
