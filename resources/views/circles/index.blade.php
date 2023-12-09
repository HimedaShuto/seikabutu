<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href='/circles/create'>create</a>
        <div class='circles'>
            @foreach ($circles as $circle)
            <div class='circle'>
                <a href="/circles/{{ $circle->id }}"><h2 class='title'>{{ $circle->title }}</h2></a>
                <p class='body'>{{ $circle->body }}</p>
                <form action="/circles/{{ $circle->id }}" id="form_{{ $circle->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteCircle({{ $circle->id }})">delete</button>
                </form>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $circles->links() }}
        </div>
        <script>
            function deleteCircle(id){
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか?')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>