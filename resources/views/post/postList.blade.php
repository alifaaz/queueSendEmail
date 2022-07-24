
            <article>

                <h1>   {{ $post->title}}
                     <a href="/post/{{$post->title}}">></a></h1>
            
                   By <a href="/authors/{{$post->user->nickname}}">{{$post->user->name}}</a>   <h4>{{$post->cat->name}}</h4>
                <p>
                     {{$post->exerpt}}
                </p>
              
            </article>


            