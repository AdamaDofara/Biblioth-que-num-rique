<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body >
    <h1>Test laravel</h1>
       {{-- <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        @foreach ($posts as $post)
            <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    @foreach($post->comments as $comment) 
                        <p class="card-text">{{$comment->content}}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
        </div> --}}
       {{-- <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            @foreach ($comments1 as $comment)
                <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$comment->post->title}}</h5>
                        {{-- @foreach($post->comments as $comment)  --}}
                            {{-- <p class="card-text">{{$comment->content}}</p> --}}
                        {{-- @endforeach --}}
                    {{--</div>
                </div>
            @endforeach
            </div> 
{{-- ManyTomany --}}
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            @forelse ($tags as $post)
                <h1 >{{$post->title}}</h1>
                    <div class="card-body">
                    @forelse ($post->tags as $tags)
                        {{-- <h5 class="card-title">{{$tag->name}}</h5> --}}
                        <span>{{$tags->name}} <em>{{$tags->created_at}}</em></span>
                    @empty
                        <span>ce post n'a pas de tag.</span>
                    @endforelse
                        
                        {{-- @foreach($post->comments as $comment)  --}}
                            {{-- <p class="card-text">{{$comment->content}}</p> --}}
                        {{-- @endforeach --}}
                    </div>
                </div>
            @empty
            <span>Aucun tag</span>
            @endforelse
            </div>
    </body>
</html>
