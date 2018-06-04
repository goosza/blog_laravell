@extends("layout")
@section("links")
   @foreach($links as $link)
   <li><a href="/posts/{{$link->id}}">{{$link->name}}</a></li>
   @endforeach
@endsection

@section("body")
    <form action="/addPost" method="post" enctype="multipart/form-data">
       @csrf
    <div style="margin-top:5%">
        <p>
          <label>
            <input name="group1" type="radio" value="1" />
            <span>Веб-программирование</span>
          </label>
        </p>
        <p>
          <label>
            <input name="group1" type="radio" value="2" />
            <span>Гейм-разработка</span>
          </label>
        </p>
   
        <textarea id="textarea1" class="materialize-textarea" name="post_title" placeholder="Заголовок"></textarea>
        <textarea id="textarea1" class="materialize-textarea" name="post_body" placeholder="Содержание"></textarea>
        <input type="file" name="post_image">
    </div>
        <br>
        <button class="btn" style="margin-top:5%">Отправть пост</button>
    </form>
@endsection