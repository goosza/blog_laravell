@extends("layout")
 @section("links")
   @foreach($links as $link)
   <li><a href="/posts/{{$link->id}}">{{$link->name}}</a></li>
   @endforeach
@endsection
  @section("body")

     <h1>{{$post->title}}</h1>
       <img src="{{asset($post->images)}}" alt="" class="responsive-img">
      <p>{{$post->body}}</p>
  
  <form action="/comment/{{$post->id}}" method="post">
    @csrf
        <textarea id="textarea1" class="materialize-textarea" name="comment_body"></textarea>
        <button class="btn" type="submit">Комментировать</button>
    </form> 
    <div style="margin-top:4%; margin-bottom:6%; font-size:25px;">Комментарии
    <div class="divider">
            
        </div>
    </div>
    
    @foreach($comments as $comment)
        <p>{{$comment->body}}</p>
        <p>{{$comment->created_at->diffForHumans()}}</p>
        <div class="divider">
            
        </div>
    @endforeach
  
@endsection

