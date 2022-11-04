<div>
    @foreach($posts as $post)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{$post->title}}
            </div>
            <div class="panel-body">
                {{$post->description}}
            </div>
            <form action="{{$post->link}}">
                <button type="submit" value="View Post" class='link btn btn-default' >View Post</button>
            </form>
        </div>
    @endforeach
</div>