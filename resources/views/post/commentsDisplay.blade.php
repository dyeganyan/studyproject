@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf

            <div class="mt-4">
                <x-input type="text" name="body" class="form-control" />
                <x-input type="hidden" name="post_id" value="{{ $post_id }}" />
                <x-input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <x-button type="submit">Reply</x-button>
            </div>
            <hr />
        </form>
        @include('post.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
