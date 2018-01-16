@extends('layout')

@section('title', '| Artists')

@section('content')

    @component('partials._container')
        @slot('slot1')
            Artists
        @endslot

        @slot('slot2')

                            <div class="post-box text-center">
                                <div class="post-header ">

                                    @foreach($artists as $posts)

                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <button type="button" class="panel-heading list-group-item " data-toggle="collapse" data-parent="#accordion" href="#collapse{{$posts[0]->id}}">
                                                    <h4 class="panel-title text-center">
                                                        <a>{{($posts[0]->artist_name)}} ({{count($posts)}})</a>
                                                    </h4>
                                                </button>
                                                <div id="collapse{{$posts[0]->id}}" class="panel-collapse collapse">
                                                    <div class="panel-body">

                                                        @foreach($posts->take(4) as $post)
                                                        <a href="{{url('post/'.$post->slug)}}">
                                                        <img src="{{asset('/images/' . $post->img)}}" height="200" width="400" alt="{{$post->artist_name . " _ " . $post->title}}" class="center-block img-responsive">
                                                        </a>

                                                        <p><span>Title:</span> <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></p>
                                                        @endforeach

                                                        <hr>
                                                        <p><a href="{{route('artistSingle', $post->artist_name)}}">Show All Posts With Works of Arts of This Artist</a></p>

                                                    </div>
                                                </div>
                                            </div>
                                @endforeach
                            </div>
                                        <button class="accordion">Accordian #1</button>
                                        <div class="accordion-content">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas deleniti molestias necessitatibus quaerat quos incidunt! Quas officiis repellat dolore omnis nihil quo, ratione cupiditate! Sed, deleniti, recusandae! Animi, sapiente, nostrum?
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas deleniti molestias necessitatibus quaerat quos incidunt! Quas officiis repellat dolore omnis nihil quo, ratione cupiditate! Sed, deleniti, recusandae! Animi, sapiente, nostrum?
                                            </p>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas deleniti molestias necessitatibus quaerat quos incidunt! Quas officiis repellat dolore omnis nihil quo, ratione cupiditate! Sed, deleniti, recusandae! Animi, sapiente, nostrum?
                                            </p>
                                        </div>


                                        <button class="accordion">Accordian #2</button>
                                        <div class="accordion-content">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas deleniti molestias necessitatibus quaerat quos incidunt! Quas officiis repellat dolore omnis nihil quo, ratione cupiditate! Sed, deleniti, recusandae! Animi, sapiente, nostrum?
                                            </p>
                                        </div>


                                        <button class="accordion">Accordian #3</button>
                                        <div class="accordion-content">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas deleniti molestias necessitatibus quaerat quos incidunt! Quas officiis repellat dolore omnis nihil quo, ratione cupiditate! Sed, deleniti, recusandae! Animi, sapiente, nostrum?
                                            </p>
                                        </div>



                    </div>
                </div>
        @endslot
    @endcomponent
@endsection

@section('scripts')

    <script>
        var accordions = document.getElementsByClassName("accordion");

        for (var i = 0; i < accordions.length; i++) {
            accordions[i].onclick = function() {
                this.classList.toggle('is-open');
                this.classList.toggle('active');

                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    // accordion is currently open, so close it
                    content.style.maxHeight = null;

                } else {
                    // accordion is currently closed, so open it
                    content.style.maxHeight = content.scrollHeight + "px";

                }
            }
        }
    </script>

    @endsection