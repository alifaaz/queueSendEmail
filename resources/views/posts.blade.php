<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @include('sub-header')

        @if ($posts->count() >0)
            <x-post-cars-features :post="$posts[0]" />
         
            <div class="lg:grid lg:grid-cols-6">
                @foreach ($posts->skip(1) as $post)
                 <x-post-card  :post="$post" class="col-span-{{$loop->iteration<3 ? '3':'2'}}"/> 
                @endforeach
            
            </div>
        
         @else
                <p>no posts availlable lol hahahah</p>
           
        @endif
     
        <div class="lg:grid lg:grid-cols-3">

            {{-- <x-post-card />
            <x-post-card />
            <x-post-card /> --}}
        </div>
    </main>

</x-layout>
