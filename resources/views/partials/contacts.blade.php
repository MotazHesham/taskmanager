
    @foreach($conversations as $conversation)
    @php
        if($conversation->receiver_id == Auth::id()){
            $receiver = true;
            $user = $conversation->sender;
        }else{
            $receiver = false;
            $user = $conversation->receiver;
        }
        $message = $conversation->messages->last();
        if($message){
            if($receiver){
                $viewed = $conversation->receiver_viewed;
            }else{
                $viewed = $conversation->sender_viewed;
            }
        }else{
            $viewed = 1;
        }
    @endphp
    
        <div class="person" data-chat="person{{$conversation->id}}" data-conversationid="{{$conversation->id}}">
            <div class="user-info">
                <div class="f-head"> 
                    @if($user->photo)
                        <img src="{{asset($user->photo->getUrl('thumb'))}}" alt="avatar">
                    @else 
                        <img src="{{asset('img/90x90.jpg')}}" alt="avatar">
                    @endif 
                </div>
                <div class="f-body">
                    <div class="meta-info">
                        <span class="user-name" data-name="{{$user->name}}">{{$user->name}}</span>
                        @if($message)
                            <span class="user-meta-time" 
                                    style="font-size:10px;
                                            @if(!$viewed) color:orange @endif
                                            @if(app()->getLocale() == 'ar') left:11px @else right:0 @endif" >
                                            {{calculate_diff_date($message->created_at)}}
                            </span> 
                        @endif
                    </div>
                    <span class="preview" @if(!$viewed) style="color:orange" @endif>{{$message->message ?? 'New Contact'}}</span>
                </div>
            </div>
        </div>       
    @endforeach 