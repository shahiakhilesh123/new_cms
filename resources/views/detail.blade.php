@extends('layouts.app')

@section('content')
<style>
        .story{
            color: black;
            text-decoration: none;
        }
        .story:hover {
            text-decoration: underline; 
            cursor: pointer;
        }
</style>
<main class="nmf-mainclass">
        <section class="nmf-masterdtlsection nmftheme-white">
            <!-- </section> -->
            <div class="nmf-dtl-nested">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 21px; font-size: 22px;">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a style="text-decoration: none;" class="" href="/">Home</a></li>
                            <li class="breadcrumb-item"><a style="text-decoration: none;" class="" href="/{{ str_replace(' ', '-', $data['category']->name) }}">{{ $data['category']->name }}</a></li>
                            <!-- <li class="breadcrumb-item">District List</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="nestednmf-fullpost">
                                <div class="nestednmf-perpost">
                                    <h2 class=" font-25 font-600 ">{{ $data['blog']->name }}</h2>
                                    <p class="perpost=article">
                                        {{ $data['blog']->sort_description }}...
                                        <?php
                                        $chunks = str_split($data['blog']->sort_description, 70); 
                                        echo $chunks[0];
                                        ?>
                                    </p>
                                </div>
                                <figure class="nestednmf-figure">
                                    @if( $data['blog']->link != '')
                                    <iframe style="width: 100%;" height="320" src="{{ $data['blog']->link}}"></iframe>
                                    @else
                                    <?php $ff = isset($data['blog']->images->file_name) ? $data['blog']->images->file_name : ''; ?>
                                    <img src="{{ asset('file').'/'.$ff }}" alt="nestednmf-post">
                                    @endif
                                    <!-- <figcaption>पप्पू यादव और लालू यादव (फाइल फोटो)</figcaption> -->
                                </figure>
                                <p>
                                {{ $data['blog']->sort_description }}...
                                </p>
                            </div>
                            <div class="nmf-relatednews-master">
                                <div class="nmf-relatednews">
                                    <h2 class="font-16 font-600"> सम्बंधित ख़बरें</h2>
                                    <div class="nmf-featurespost">
                                        <div class="owl-carousel">
                                            @foreach($data['relates'] as $relate)
                                            <?php preg_match('#^([^.!?\s]*[\.!?\s]+){0,11}#',$relate->sort_description,$matches); 
                                            $ff = isset($relate->images->file_name) ? $relate->images->file_name : $relate->thumbnail->file_name;
                                            ?>
                                            <div class="item">
                                                <div class="nmf-featurespost-item">
                                                    <a href="{{ asset('/story') }}/<?php echo str_replace(' ', '-', $relate->eng_name); ?>">
                                                        <div class="media">
                                                            <img class="d-flex mr-3" src="{{ asset('file').'/'.$ff }}" style="height:84px;" alt="post-image">
                                                            <div class="media-body">
                                                                <h5 class="mt-0 font-600 font-14">
                                                                    {{$matches[0]}} ... 
                                                                </h5>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>
                               <?php echo $data['blog']->description; ?>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="nestednmf-ctrgry">
                                <div class="nestednmf-lsctctergy">
                                    <h2 class="font-600 font-16"><span><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55 55" style="enable-background:new 0 0 55 55;" xml:space="preserve"><g><g><path style="fill:#D91F26;" d="M9.867,4h35.258c3.242,0,5.876,2.628,5.876,5.876v35.258c-0.011,2.373-1.452,4.508-3.644,5.406c-2.186,0.921-4.711,0.433-6.404-1.234L5.695,14.048c-1.67-1.687-2.158-4.218-1.234-6.404C5.359,5.446,7.494,4.012,9.867,4"></path></g></g></svg></span>लेटेस्ट</h2>
                                    <div class="nmf-lsctctergy">
                                        @foreach($data['latests'] as $latest)
                                        <?php preg_match('#^([^.!?\s]*[\.!?\s]+){0,11}#',$latest->sort_description,$matches); 
                                       // if($latest->sort_description == '')
                                        $ff = isset($latest->images->file_name) ? $latest->images->file_name : (isset($latest->thumbnail->file_name) ? $latest->thumbnail->file_name : '');
                                        ?>
                                        <div class="nmf-lsctctergy-item">
                                            <a href="{{ asset('/story') }}/<?php echo str_replace(' ', '-', $latest->eng_name); ?>">
                                                <div class="media">
                                                    <img class="d-flex mr-3" src="{{ asset('file').'/'.$ff }}" style="height:84px; width:94px;" alt="post-image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 font-600 font-14">
                                                            {{ $matches[0] }}
                                                        </h5>

                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="nmf-sidebarads">
                                        <!-- <img class="img-responsive" src="{{ asset('frontend/images/nmf-sidebarads.png') }}" alt="post-image"> -->
                                    </div>
                                </div>

                            </div>
                            <div class="nestednmf-ctrgry">
                                <div class="nestednmf-lsctctergy">
                                    <h2 class="font-600 font-16"><span><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55 55" style="enable-background:new 0 0 55 55;" xml:space="preserve"><g><g><path style="fill:#D91F26;" d="M9.867,4h35.258c3.242,0,5.876,2.628,5.876,5.876v35.258c-0.011,2.373-1.452,4.508-3.644,5.406c-2.186,0.921-4.711,0.433-6.404-1.234L5.695,14.048c-1.67-1.687-2.158-4.218-1.234-6.404C5.359,5.446,7.494,4.012,9.867,4"></path></g></g></svg></span>लेटेस्ट</h2>
                                    <div class="nmf-lsctctergy">
                                        @foreach($data['videos'] as $video)
                                        <?php preg_match('#^([^.!?\s]*[\.!?\s]+){0,11}#',$video->sort_description,$matches); 
                                       // if($latest->sort_description == '')
                                        $ff = isset($video->images->file_name) ? $video->images->file_name : (isset($video->thumbnail->file_name) ? $video->thumbnail->file_name : '');
                                        ?>
                                        <div class="nmf-lsctctergy-item">
                                            <a href="{{ asset('/story') }}/<?php echo str_replace(' ', '-', $video->eng_name); ?>">
                                                <div class="media">
                                                    <img class="d-flex mr-3" src="{{ asset('file').'/'.$ff }}" style="height:84px; width:94px;" alt="post-image">
                                                    <div class="media-body">
                                                        <h5 class="mt-0 font-600 font-14">
                                                            {{ $matches[0] }}
                                                        </h5>

                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="nmf-sidebarads">
                                        <!-- <img class="img-responsive" src="{{ asset('frontend/images/nmf-sidebarads.png') }}" alt="post-image"> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>     
        </main>

        <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                autoplay: true, // Add autoplay option
                autoplayTimeout: 5000, // Adjust autoplay speed (milliseconds)
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 2
                    }
                }
            });
        });
    </script>

@endsection