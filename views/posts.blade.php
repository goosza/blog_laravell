@extends("layout")
@section("links")
   @foreach($links as $link)
   <li><a href="/posts/{{$link->id}}">{{$link->name}}</a></li>
   @endforeach
@endsection
@section("body")
   @foreach($posts as $post)
   <h1>{{$post->title}}</h1>
   <p>{{str_limit($post->body, 350)}}</p>
   <a href="/post/{{$post->id}}">читать далее</a>
   <div class="divider" style="margin-top:3%"></div>
   @endforeach
    
@endsection