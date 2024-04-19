@extends('layouts.app')

@section('content')
    <?php 
    $setting = App\Models\Setting::where('id', '1')->first(); 
    $pageDetail = App\Models\Pages::where('id', '1')->first();
    $pageSequence = App\Models\PageSequence::where('page_id', $pageDetail->id)->orderBy('sequence', 'ASC')->get()->toArray();
    $slide = App\Models\Blog::where('id', $pageSequence[0]['blog_id'])->first(); 
    $blog_file = App\Models\File::whereRaw( "find_in_set('".$slide->image_ids."', id)")->first();
    $ff = isset($blog_file->file_name) ? $blog_file->file_name : ''; 
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .img_media:hover, .link:hover {
            /* background-color: #48483d; */
            filter: brightness(0.6);
            cursor: pointer;
        }
        .blog_container {
        position: relative;
        }

        .blog_image {
        display: block;
        }

        .blog_overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .3s ease;
        }

        .blog_container:hover .blog_overlay {opacity: 1;}

        .blog_icon {
        color: white;
        font-size: 30px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
        }
        .a_link:hover {
            text-decoration: underline; 
            cursor: pointer;
        }
        .fa-video-camera:hover {
        color: #eee;
        }
        a {
            color: rgb(246 248 250);
            text-decoration: none;
        }
        .story{
            color: black;
            text-decoration: none;
        }
    </style>
    <div class="nmf-herosec">
            <div class="nmf-bkrng-news"><img src="{{ asset('frontend/images/bkng-news.jpg') }}" /></div>
            <div class="nmf-titlenewssec">
                <div class="nmf-titlebanner" style="background:url({{ asset('file').'/'.$ff }}) !important;">
                    <h2 class="a_link"><a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $slide->eng_name); ?>">{{ isset($slide->name) ? $slide->name : '' }}</a></h2>
                    <p class="a_link"><a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $slide->eng_name); ?>">{{ isset($slide->sort_description) ? $slide->sort_description : '' }}</a></p>
                </div>
                <div class="nmf-relatedvidos">
                    <div class="nmf-toptitle">
                        @for($i = 1; $i < count($pageSequence)-1; $i++)
                        <?php
                        $blog = App\Models\Blog::where('id', $pageSequence[$i]['blog_id'])->first(); 
                        $truncated = substr($blog->name, 0, 50) . '...';
                        if(isset($blog->link)) {
                            $blog_file = App\Models\File::where("id",$blog->thumb_images)->first();
                        } else {
                            $blog_file = App\Models\File::whereRaw( "find_in_set(id, '".$blog->image_ids."')")->first();
                        }
                        $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                        ?>
                        <div class="nmf-othrlist">
                            <div class="media">
                                <span class="img_media link <?php if(isset($blog->link)) { echo "blog_container"; } ?>">
                                <img class="<?php if(isset($blog->link)) { echo "blog_image"; } ?>" src="{{ asset('file').'/'.$ff }}" style="width: 140px;">
                                <?php if(isset($blog->link)) { ?>
                                <div class="blog_overlay">
                                <a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>" class="blog_icon">
                                    <i class="fa fa-video-camera"></i>
                                </a>
                                </div>
                                <?php } ?>    
                                </span>
                                <a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                <div class="media-body" style="width: 100%; margin-left: 5px;">
                                    <h5 class="mt-0 font-16 a_link"><?php echo $truncated; ?></h5>
                                </div>
                                </a>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <?php //die(); ?>
        <div class="clearfix"></div>
        <div class="container">
        <?php 
        $blog = App\Models\Blog::where('categories_ids', $setting->secound_row_first_file)->first(); 
        $file = App\Models\File::where('id', $blog->image_ids)->first(); 
        ?>
            <div class="nmfcardlistsec mt-4">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="nmf-singlecard">
                            <a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                <h3 class="a_link">
                                    {{ $blog->name }}
                                </h3>
                                <div class="nmf-singlecard-img link"><img src="{{ asset('file').'/'.$file->file_name }}" style="height: 229px;" /></div>
                            </a>

                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="nmf-postcrd">
                            <div class="row">
                    <?php
                            $blogs = App\Models\Blog::whereRaw("find_in_set('".$setting->secound_row_secound_col_category."',categories_ids)")->limit(6)->get(); 
                    
                    ?>
                    @foreach($blogs as $blog)
                    <?php 
                    //preg_match('#^([^.!?\s]*[\.!?\s]+){0,11}#',$blog->name,$matches);
                    $truncated = substr($blog->name, 0, 70) . '...';
                    $blog_file = App\Models\File::whereRaw( "find_in_set(id, '".$blog->image_ids."')")->first();
                    $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';  
                    ?>
                                <div class="col-12 col-md-4">
                                <a class="story" href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                    <div class="nest-postcard" style="height: 95%;">
                                        <div class="nest-postcard-img link">
                                            <img src="{{ asset('file').'/'.$ff }}" style="height:82px;" />
                                        </div>
                                        <p class=" font-12 font-600 a_link"> <?php echo $truncated; ?> </p>
                                    </div>
                                </a>
                                </div>
                                <?php $truncated = ""; ?>
                    @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                    <?php $file = App\Models\File::where('id', $setting->secound_row_third_file)->first(); ?>
                        <div class="nmf-ads link"><img class="" src="{{ asset('file').'/'.$file->file_name }}" style="height: 339px;" /></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="nmf-fullad-sec mt-4 link"><a href="#"><img src="{{ asset('frontend/images/hori-ads.jpg') }}" /></a></div>
            </div>
            <div class="col-12 col-md-12">
                <div class="nmf-featurespost mt-4">
                    <div class="owl-carousel 1st">
                    <?php
                            $blogs = App\Models\Blog::whereRaw("find_in_set('".$setting->third_row_category."',categories_ids)")->limit(8)->get(); 
                    ?>
                    @foreach($blogs as $blog)
                    <?php 
                    //preg_match('#^([^.!?\s]*[\.!?\s]+){0,18}#',$blog->name,$matches);
                    $truncated = substr($blog->name, 0, 90) . '...';
                    $blog_file = App\Models\File::whereRaw( "find_in_set(id, '".$blog->image_ids."')")->first(); 
                    $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                    ?>
                        <div class="item">
                            <div class="nmf-featurespost-item" style="padding: 0px 0px;">
                                <a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                    <div class="featurespost-img link"><img src="{{ asset('file').'/'.$ff }}"  style="width: 100%;height: 208px;"/></div>
                                    <div class="featurespost-tyl"><p class="font-16 font-600 a_link" style="height: 92px;"> <?php echo $truncated; ?> </p></div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="nmf-mainmanoranjansec">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <?php
                          $file = App\Models\File::where('id', $setting->fourth_row_first_image)->first(); 
                          $fourth_row_first_image = isset($file->file_name) ? $file->file_name : ''; 
                        ?>
                        <div class="owl-carousel nmf-horoscope-sec 2nd" style="background:url({{ asset('file').'/'.$fourth_row_first_image }}); background-repeat: no-repeat;background-size: cover;background-position: center; height:358px;">
                        <?php
                        $blogs = App\Models\Blog::where("categories_ids",$setting->fourth_row_first_cat)->limit(10)->get(); 
                        ?>
                        @foreach($blogs as $blog)
                            <?php 
                            //preg_match('#^([^.!?\s]*[\.!?\s]+){0,18}#',$blog->sort_description,$matches);
                            $truncated = (strlen($blog->name) > 20) ? substr($blog->name, 0, 70) . '...' : $blog->name;
                            $blog_file = App\Models\File::whereRaw( "find_in_set(id, '".$blog->image_ids."')")->first(); 
                            $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                            ?>
                            <div class="item">
                                    <div class="nmf-featurespost-item" style="padding: 0px 0px;">
                                        <a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                            <div class="featurespost-img link">
                                            <div class="manoranjansec-item nmf-titlebanner a_link" style="color: #ffffff; background:url({{ asset('file').'/'.$fourth_row_first_image }}); background-repeat: no-repeat;background-size: cover;background-position: center; height:358px;">
                                            <img src="{{ asset('file').'/'.$ff }}" style="margin-top: 15%; width:100px; height: 100px;"/>
                                            <h5 style="color: #ffffff; margin-top: 15%; margin-left:20px"><?php echo $truncated; ?></h5>
                                            </div>
                                             </div>
                                        </a> 
                                    </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="nmf-manoranjansec bg-white">
                            <?php $cat = App\Models\Category::where('id', $setting->fourth_row_secound_cat)->first(); ?>
                            <h2 class="font-600 font-16"><span><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55 55" style="enable-background:new 0 0 55 55;" xml:space="preserve"><g><g><path style="fill:#D91F26;" d="M9.867,4h35.258c3.242,0,5.876,2.628,5.876,5.876v35.258c-0.011,2.373-1.452,4.508-3.644,5.406c-2.186,0.921-4.711,0.433-6.404-1.234L5.695,14.048c-1.67-1.687-2.158-4.218-1.234-6.404C5.359,5.446,7.494,4.012,9.867,4"></path></svg></span>{{$cat->name}}</h2>
                            <?php
                            $blogs = App\Models\Blog::whereRaw("find_in_set('".$setting->fourth_row_secound_cat."',categories_ids)")->first(); 
                            $blog_file = App\Models\File::whereRaw( "find_in_set(id, '".$blogs->image_ids."')")->first(); 
                            $truncated = (strlen($blogs->name) > 20) ? substr($blogs->name, 0, 70) . '...' : $blogs->name;
                            $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                            ?>
                            <div class="manoranjansec-item nmf-titlebanner a_link" style="color: #ffffff; background:url({{ asset('file').'/'.$ff }}); background-repeat: no-repeat;background-size: cover;background-position: center;">
                                    <h2 style="color: #ffffff; margin-top: 15%;">{{ $truncated }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nmf-toomoresec">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="nmf-aurbhisec">
                            <h2 class="font-16"><a href="#">See more <span><img src="{{ asset('frontend/images/nmf-arrow.svg') }}" /></span></a></h2>
                            <?php
                            $blogs = App\Models\Blog::whereRaw("find_in_set('".$setting->fifth_row_first_cat."',categories_ids)")->first(); 
                            $blog_file = App\Models\File::whereRaw( "find_in_set(id, '".$blogs->image_ids."')")->first(); 
                            $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                            ?>
                            <div class="nmf-featurespost link"><img src="{{ asset('file').'/'.$ff }}" style="height: 282px;" /></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <?php
                    $blogs = App\Models\Blog::whereRaw("find_in_set('".$setting->fifth_row_second_cat."',categories_ids)")->whereNotNull('link')->orderBy('id', 'DESC')->first(); 
                    $link = isset($blogs->link) ? $blogs->link : '';
                    ?>
                        <div class="nmf-vidopost"><iframe style="width: 100%;" height="320" src="{{ $link}}"></iframe></div>
                    </div>
                </div>
        </div>
        <script>
        $(document).ready(function () {
            $('.1st').owlCarousel({
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
                        items: 5
                    }
                }
            });
        });
        $(document).ready(function () {
            $('.2nd').owlCarousel({
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
                        items: 1
                    }
                }
            });
        });
    </script>
@endsection