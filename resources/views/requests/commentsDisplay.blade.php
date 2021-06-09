@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 
            {{ date('Y-m-d\TH:i', strtotime($comment->created_at)) }}</p>
     <br>
        <a href="" id="reply"></a>
        {{-- <form method="post" action="{{ route('store_comment') }}">
            @csrf
            <div class="form-group">
                <input type=text name=body class="form-control" />
                <input type=hidden name=rq_id value="{{ $rq_id }}" />
                <input type=hidden name=parent_id value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type=submit class="btn btn-warning" value="Reply" />
            </div>
        </form> --}}
        @include('requests.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach