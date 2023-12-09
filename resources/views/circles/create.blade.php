<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
       <h1>Blog Name</h1>
       <form action="/circles" method="POST">
           @csrf
           <div class="title">
               <h2>Title</h2>
               <input type="text" name="circle[title]" placeholder="タイトル" value="{{ old('circle.title') }}"/>
               <p class="title__error"  style="color:red">{{ $errors->first('circle.title') }}</p>
           </div>
           <div class="body">
               <h2>Body</h2>
               <textarea name="circle[body]" placeholder="今日も1日お疲れ様でした">{{ old('circle.body') }}</textarea>
               <p class="body__error" style="color:red">{{ $errors->first('circle.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
       </form>
       <div class="back">
           [<a href="/">戻る</a>]
       </div>
        </div>
    </body>
</html>