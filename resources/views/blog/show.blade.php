@extends('layouts.blog')

@section('title')
    {{ $post->title }}
@endsection



@section('content')

    <!-- Main Content -->
    <main class="main-content">


        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Blog content
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        -->

        <div class="section">
            <div class="container">

                <div class="text-center mt-8">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->created_at->diffForHumans() }} in <a href="{{ route('blog.category', $post->category->id) }}">{{ $post->category->name }}</a></p>
                </div>


                <div class="text-center my-8">
                    <img class="rounded-md" src="{{ asset('storage/'.$post->image) }}" alt="...">
                </div>


                <div class="row">
                    <div class="col-lg-8 mx-auto">

                      {!! $post->content !!}
                    </div>
                </div>


        @if($post->tags())

            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <div class="gap-xy-2 mt-6">
                        @foreach($post->tags as $tag)
                            <a class="badge badge-pill badge-secondary" href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }}</a>
                        @endforeach

                    </div>

                </div>
            </div>

        @endif


            </div>
        </div>


        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Comments
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section bg-gray">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <hr>
                        {{--   Discut comment here   --}}


                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                            var disqus_config = function () {
                            this.page.url = "{{ config('app.url') }}/blog/post/{{ $post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://inno-ping.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



                    </div>
                </div>

            </div>
        </div>

    </main>




@endsection
