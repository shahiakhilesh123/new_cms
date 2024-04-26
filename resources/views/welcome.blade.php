@extends('layouts.app')

@section('content')
<?php $setting = App\Models\Setting::where('id', '1')->first(); ?>
            <div class="ticker-news-area">
                <div class="cm-container">
                    <div class="news_ticker_wrap clearfix">
                        <div class="ticker_head">
                            <span class="ticker_icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>
                            <div class="ticker_title">लेटेस्ट न्यूज</div>
                        </div>
                        <div class="ticker_items">
                            <div class="owl-carousel ticker_carousel">
                                <?php
                                $latest_blog = App\Models\Blog::orderBy('id', 'DESC')->limit(5)->get();  
                                ?>
                                @foreach($latest_blog as $blog)
                                <?php  $truncated = $blog->name; ?>
                                <div class="item">
                                    <p><a
                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-area">
                <div class="cm_banner cm_banner-five">
                    <div class="banner-inner">
                        <div class="cm-container">
                            <div class="row">
                                <div class="cm-col-lg-7 cm-col-12 gutter-left">
                                    <div class="card">
                                        <div class="owl-carousel cm_banner-carousel-five">
                                            <?php
                                            $banner_blog = App\Models\Blog::orderBy('id', 'DESC')->limit(5)->get();   
                                            ?>
                                            @foreach($banner_blog as $blog)
                                            <?php
                                            $cat = App\Models\Category::where('id',$blog->categories_ids)->first();
                                            if (isset($blog->image_ids) || $blog->image_ids != '') {
                                                $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                            } else {
                                                $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                            }
                                            $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';   
                                            ?>
                                            <div class="item">
                                                <div class="post_thumb"
                                                    style="background-image: url({{asset('file').'/'.$ff }}); background-size:contain;">
                                                    <div class="post-holder">
                                                        <div class="entry_cats">
                                                            <ul class="post-categories">
                                                                <li><a href="#"
                                                                        rel="category tag">{{isset($cat->name) ? $cat->name : ''}}</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="post_title">
                                                            <h2><a
                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">{{ $blog->name }}</a></h2>
                                                        </div>
                                                        <div class="cm-post-meta">
                                                            <ul class="post_meta">
                                                                <li class="post_author">
                                                                    <a
                                                                        href="#">Cester
                                                                        Kinner</a>
                                                                </li>
                                                                <li class="posted_date">
                                                                    <a
                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                            class="entry-date published"
                                                                            datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            @endforeach            
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $banner_blog = App\Models\Blog::orderBy('id', 'DESC')->limit(4)->offset(5)->get(); 
                                ?>
                                <div class="cm-col-lg-5 cm-col-12 gutter-right">
                                    <div class="right-content-holder">
                                        <div class="custom_row clearfix">
                                            @foreach($banner_blog as $blog)
                                            <?php
                                            $cat = App\Models\Category::where('id',$blog->categories_ids)->first();
                                            if (isset($blog->image_ids) || $blog->image_ids != '') {
                                                $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                            } else {
                                                $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                            }
                                            $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';   
                                            ?>
                                            <div class="col small_posts">
                                                <div class="card">
                                                    <div class="post_thumb imghover"
                                                        style="background-image: url({{ asset('file').'/'.$ff }}); background-size:contain;">
                                                        <div class="post-holder">
                                                            <div class="entry_cats">
                                                                <ul class="post-categories">
                                                                    <li><a href="#"
                                                                            rel="category tag">{{ isset($cat->name) ? $cat->name : '' }}</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="post_title">
                                                                <h2><a
                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">{{ $blog->name }}</a></h2>
                                                            </div>
                                                            <!-- <div class="cm-post-meta">
                                                                <ul class="post_meta">
                                                                    <li class="post_author">
                                                                        <a
                                                                            href="#">Cester
                                                                            Kinner</a>
                                                                    </li>
                                                                    <li class="posted_date">
                                                                        <a
                                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                                class="entry-date published updated"
                                                                                datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                                    </li>
                                                                </ul>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-news-area news-area">
                <div class="cm-container">
                    <div id="media_image-5" class="widget cm-post-widget-section widget_media_image"><a
                            href="#"><img width="1170" height="90"
                                src="{{ asset('frontend/images/hori-ads.jpg') }}"
                                class="image wp-image-757  attachment-full size-full" alt
                                style="max-width: 100%; height: auto;" decoding="async"
                                srcset=""
                                sizes="(max-width: 1170px) 100vw, 1170px" /></a></div>
                                <?php
                                $second_row_blog = App\Models\Blog::where('categories_ids', $setting->secound_row_first_file)->orderBy('id', 'DESC')->limit(6)->get();  
                                $cat = App\Models\Category::where('id',$setting->secound_row_first_file)->first();
                                 ?>
                    <section class="cm-post-widget-section cm-post-widget-two">
                        <div class="section_inner">
                            <div class="section-title">
                                <h2>{{ isset($cat->name) ? $cat->name : '' }}</h2>
                            </div>
                            <?php 
                            $i = 0;
                            foreach($second_row_blog as $blog) { 
                                if (isset($blog->image_ids) || $blog->image_ids != '') {
                                    $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                } else {
                                    $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                }
                                $truncated = $blog->name;
                                $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                                if($i == 0 || $i == 2){
                            ?>
                            <div class="row">
                                <?php } if($i < 2) { ?>
                                    <div class="cm-col-lg-6 cm-col-md-12 cm-col-12">
                                        <article class="big-card">
                                            <div class="post_thumb">
                                                <a
                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                    <figure class="imghover">
                                                        <img width="800" height="450"
                                                            src="{{ asset('file').'/'.$ff }}"
                                                            alt="Obama&#8217;s speech made everyone scared"
                                                            decoding="async" />
                                                    </figure>
                                                </a>
                                                <div class="post-holder">
                                                    <div class="entry_cats">
                                                        <ul class="post-categories">
                                                            <li><a href="#"
                                                                    rel="category tag">{{ isset($cat->name) ? $cat->name : '' }}</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="post_title">
                                                        <h2><a
                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated ?></a></h2>
                                                    </div>
                                                    <div class="cm-post-meta">
                                                        <ul class="post_meta">
                                                            <li class="post_author">
                                                                <a
                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                                    Kinner</a>
                                                            </li>
                                                            <li class="posted_date">
                                                                <a
                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                        class="entry-date published"
                                                                        datetime="<?php echo $blog->created_at ?>"><?php echo $blog->created_at ?></a></time></a>
                                                            </li>
                                                            <!-- <li class="comments">
                                                                <a
                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/public-was-forced-to-go-against-the-violence/#comments">0</a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                    </div>
                                <?php } if($i >= 2) { 
                                    ?>
                                    <div class="cm-col-lg-3 cm-col-md-6 cm-col-12">
                                    <div class="small-card">
                                        <div class="post_thumb">
                                            <a
                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                <figure class="imghover">
                                                    <img width="800" height="450"
                                                        src="{{ asset('file').'/'.$ff }}"
                                                        class="attachment-cream-magazine-thumbnail-2 size-cream-magazine-thumbnail-2 wp-post-image"
                                                        alt="Obama&#8217;s speech made everyone scared"
                                                        decoding="async" />
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="post-holder">
                                            <div class="post_title">
                                                <h2><a
                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated ?></a></a></h2>
                                            </div>
                                            <div class="cm-post-meta">
                                                <ul class="post_meta">
                                                    <li class="post_author">
                                                        <a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                            Kinner</a>
                                                    </li>
                                                    <li class="posted_date">
                                                        <a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                class="entry-date published updated"
                                                                datetime="<?php echo $blog->created_at ?>"><?php echo $blog->created_at ?></time></a>
                                                    </li>
                                                    <!-- <li class="comments">
                                                        <a
                                                            href="https://demo.themebeez.com/demos-2/cream-magazine-free/obamas-speech-made-everyone-scared/#comments">0</a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                <?php
                                }
                                if ($i == 1 || $i == 5) {
                                ?>
                            </div>
                            <?php }  
                            $i++;
                        } ?>
                        </div>
                    </section>
                    <?php
                    $third_row_blog = App\Models\Blog::where('categories_ids', $setting->secound_row_secound_col_category)->orderBy('id', 'DESC')->limit(6)->get();  
                    $truncated = $blog->name;
                    $cat = App\Models\Category::where('id',$setting->secound_row_secound_col_category)->first();
                    ?>
                    <section class="cm-post-widget-section cm-post-widget-three">
                        <div class="section_inner">
                            <div class="section-title">
                                <h2>{{ isset($cat->name) ? $cat->name : '' }}</h2>
                            </div>
                            <div class="row">
                            @foreach($third_row_blog as $blog)
                            <?php
                            if (isset($blog->image_ids) || $blog->image_ids != '') {
                                $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                            } else {
                                $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                            }
                            $truncated = $blog->name;
                            $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                            ?>
                                <div class="cm-col-lg-4 cm-col-md-6 cm-col-12">
                                    <div class="card">
                                        <div class="post_thumb">
                                            <a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                <figure class="imghover">
                                                    <img width="720" height="540"
                                                        src="{{ asset('file').'/'.$ff }}"
                                                        class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                        alt="Conference for the world business" decoding="async" />
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="card_content">
                                            <div class="entry_cats">
                                                <ul class="post-categories">
                                                    <li><a href="#" rel="category tag">{{ isset($cat->name) ? $cat->name : ''}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="post_title">
                                                <h2><a href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated ?></a></h2>
                                            </div>
                                            <div class="cm-post-meta">
                                                <ul class="post_meta">
                                                    <li class="post_author">
                                                        <a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                            Kinner</a>
                                                    </li>
                                                    <li class="posted_date">
                                                        <a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                class="entry-date published updated"
                                                                datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </section>
                    <?php
                    $fourth_row_blog = App\Models\Blog::where('categories_ids', $setting->secound_row_third_file)->orderBy('id', 'DESC')->limit(6)->get();  
                    $cat = App\Models\Category::where('id',$setting->secound_row_third_file)->first();
                    ?>
                    <section class="cm-post-widget-section cm_post_widget_six">
                        <div class="section_inner">
                            <div class="section-title">
                                <h2>{{ isset($cat->name) ? $cat->name : ''}}</h2>
                            </div>
                            <div class="post_widget_inner">
                                <div class="row">
                                    @foreach($fourth_row_blog as $blog)
                                    <?php 
                                    if (isset($blog->image_ids) || $blog->image_ids != '') {
                                        $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                    } else {
                                        $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                    }
                                    $truncated = $blog->name;
                                    $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                                    ?>
                                    <div class="cm-col-lg-4 cm-col-md-6 cm-col-12">
                                        <div class="box">
                                            <div class="row">
                                                <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                    <div class="post_thumb">
                                                        <a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                            <figure class="imghover">
                                                                <img width="720" height="540"
                                                                    src="{{ asset('file').'/'.$ff }}"
                                                                    class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                    alt="{{ $blog->name }}"
                                                                    decoding="async" />
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                    <div class="right_box">
                                                        <div class="post_title">
                                                            <h2><a
                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                                        </div>
                                                        <div class="cm-post-meta">
                                                            <ul class="post_meta">
                                                                <li class="post_author">
                                                                    <a
                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                                        Kinner</a>
                                                                </li>
                                                                <li class="posted_date">
                                                                    <a
                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                            class="entry-date published updated"
                                                                            datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    <div id="media_image-6" class="widget cm-post-widget-section widget_media_image"><a
                            href="#"><img width="1170" height="135"
                                src="{{ asset('frontend/images/hori-ads.jpg') }}"
                                class="image wp-image-731  attachment-full size-full" alt
                                style="max-width: 100%; height: auto;" decoding="async"
                                srcset="{{ asset('frontend/images/hori-ads.jpg') }}"
                                sizes="(max-width: 1170px) 100vw, 1170px" /></a></div>
                </div>
            </div>
            <div class="middle-news-area news-area">
                <div class="cm-container">
                    <div class="left_and_right_layout_divider">
                        <div class="row">
                            <div class="cm-col-lg-8 cm-col-12 sticky_portion">
                                <div id="primary" class="content-area">
                                    <main id="main" class="site-main">
                                        <?php
                                          $fifth_row_blog = App\Models\Blog::where('categories_ids', $setting->third_row_category)->orderBy('id', 'DESC')->limit(6)->get();  
                                          $cat = App\Models\Category::where('id',$setting->third_row_category)->first();
                                          $i = 0; 
                                        ?>
                                        <section class="cm-post-widget-section cm_middle_post_widget_one">
                                            <div class="section_inner">
                                                <div class="section-title">
                                                    <h2>{{ isset($cat->name) ? $cat->name : '' }}</h2>
                                                </div>
                                                @foreach($fifth_row_blog as $blog)
                                                <?php 
                                                 if (isset($blog->image_ids) || $blog->image_ids != '') {
                                                    $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                                } else {
                                                    $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                                }
                                                $truncated = $blog->name;
                                                $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                                                ?>
                                                @if ($i == 0 || $i == 2 ) 
                                                <div class="row">
                                                @endif
                                                    @if ($i < 2)
                                                    <div class="cm-col-lg-6 cm-col-md-6 cm-col-12">
                                                        <article class="card">
                                                            <div class="post_thumb">
                                                                <a
                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                                    <figure class="imghover">
                                                                        <img width="720" height="540"
                                                                            src="{{ asset('file').'/'.$ff }}"
                                                                            class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                            alt="{{ $blog->name }}"
                                                                            decoding="async" />
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                            <div class="post-holder">
                                                                <div class="entry_cats">
                                                                    <ul class="post-categories">
                                                                        <!-- <li><a href="https://demo.themebeez.com/demos-2/cream-magazine-free/category/football/"
                                                                                rel="category tag">Football</a></li> -->
                                                                        <li><a href="#"
                                                                                rel="category tag">{{ isset($cat->name) ? $cat->name : '' }}</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="post_title">
                                                                    <h2><a
                                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                                                </div>
                                                                <div class="cm-post-meta">
                                                                    <ul class="post_meta">
                                                                        <li class="post_author">
                                                                            <a
                                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                                                Kinner</a>
                                                                        </li>
                                                                        <li class="posted_date">
                                                                            <a
                                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                                    class="entry-date published updated"
                                                                                    datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                                        </li>
                                                                        <!-- <li class="comments">
                                                                            <a
                                                                                href="https://demo.themebeez.com/demos-2/cream-magazine-free/people-are-cheering-for-the-brazilian-team/#comments">0</a>
                                                                        </li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </article>
                                                    </div>
                                                    @endif
                                                    @if($i >= 2)
                                                    <div class="cm-col-lg-6 cm-col-md-6 cm-col-12">
                                                        <article class="card card_layout_one">
                                                            <div class="boxes_holder">
                                                                <div class="row">
                                                                    <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                                        <div class="post_thumb">
                                                                            <a
                                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                                                <figure class="imghover">
                                                                                    <img width="720" height="540"
                                                                                        src="{{ asset('file').'/'.$ff }}"
                                                                                        class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                                        alt="{{ $blog->name }}"
                                                                                        decoding="async" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                                        <div class="post_title">
                                                                            <h2><a
                                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a>
                                                                            </h2>
                                                                        </div>
                                                                        <div class="cm-post-meta">
                                                                            <ul class="post_meta">
                                                                                <li class="post_author">
                                                                                    <a
                                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                                                        Kinner</a>
                                                                                </li>
                                                                                <li class="posted_date">
                                                                                    <a
                                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                                            class="entry-date published updated"
                                                                                            datetime="2018-11-12T11:00:55+05:45">{{ $blog->created_at }}</time></a>
                                                                                </li>
                                                                                <!-- <li class="comments">
                                                                                    <a
                                                                                        href="https://demo.themebeez.com/demos-2/cream-magazine-free/newly-launched-sports-car-is-on-sale/#comments">0</a>
                                                                                </li> -->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                    @endif
                                                @if ($i == 1 || $i == 5)
                                                </div>
                                                @endif
                                                <?php $i++; ?>
                                                @endforeach
                                            </div>
                                        </section>
                                        <?php
                                          $sixth_row_blog = App\Models\Blog::where('categories_ids', $setting->fourth_row_first_image)->orderBy('id', 'DESC')->limit(6)->get();  
                                          $cat = App\Models\Category::where('id',$setting->fourth_row_first_image)->first();
                                        ?>
                                        <section class="cm-post-widget-section cm_middle_post_widget_six">
                                            <div class="section_inner">
                                                <div class="section-title">
                                                    <h2>{{ isset($cat->name) ? $cat->name : '' }}</h2>
                                                </div>
                                                <div class="owl-carousel middle_widget_six_carousel">
                                                    @foreach($sixth_row_blog as $blog)
                                                    <?php 
                                                    if (isset($blog->image_ids) || $blog->image_ids != '') {
                                                        $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                                    } else {
                                                        $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                                    }
                                                    $truncated = $blog->name;
                                                    $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';
                                                    ?>
                                                    <div class="item">
                                                        <div class="card post_thumb"
                                                            style="background-image: url( {{ asset('file').'/'.$ff }} )">
                                                            <div class="card_content">
                                                                <div class="entry_cats">
                                                                    <ul class="post-categories">
                                                                        <li><a href="#"
                                                                                rel="category tag">{{ isset($cat->name) ? $cat->name : '' }}</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="post_title">
                                                                    <h2><a
                                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                                                </div>
                                                                <div class="cm-post-meta">
                                                                    <ul class="post_meta">
                                                                        <li class="post_author">
                                                                            <a
                                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                                                Kinner</a>
                                                                        </li>
                                                                        <li class="posted_date">
                                                                            <a
                                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                                    class="entry-date published"
                                                                                    datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                                        </li>
                                                                        <!-- <li class="comments">
                                                                            <a
                                                                                href="https://demo.themebeez.com/demos-2/cream-magazine-free/taking-photos-are-best-lifestyle-to-live/#comments">0</a>
                                                                        </li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                        <div id="media_image-7"
                                            class="widget cm-post-widget-section widget_media_image"><a
                                                href="#"><img width="728"
                                                    height="90"
                                                    src="{{ asset('frontend/images/hori-ads.jpg') }}"
                                                    class="image wp-image-756  attachment-full size-full" alt
                                                    style="max-width: 100%; height: auto;" decoding="async"
                                                    srcset="{{ asset('frontend/images/hori-ads.jpg') }}"
                                                    sizes="(max-width: 728px) 100vw, 728px" /></a></div>
                                        <?php
                                          $seven_row_blog = App\Models\Blog::where('categories_ids', $setting->fourth_row_first_cat)->orderBy('id', 'DESC')->limit(5)->get();  
                                          $cat = App\Models\Category::where('id',$setting->fourth_row_first_cat)->first();
                                          $i = 0;
                                        ?>
                                        <section class="cm-post-widget-section cm_middle_post_widget_four">
                                            <div class="section_inner">
                                                <div class="section-title">
                                                    <h2>{{ isset($cat->name) ? $cat->name : '' }}</h2>
                                                </div>
                                                <div class="row">
                                                    @foreach($seven_row_blog as $blog)
                                                    <?php
                                                    if (isset($blog->image_ids) || $blog->image_ids != '') {
                                                        $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                                    } else {
                                                        $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                                    }
                                                    $truncated = $blog->name;
                                                    $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';                                                
                                                    ?>
                                                    @if($i == 0 || $i == 1)
                                                    <div class="cm-col-lg-6 cm-col-md-6 cm-col-12">
                                                        @endif
                                                        @if($i == 0)
                                                        <div class="left-container">
                                                            <article class="card">
                                                                <div class="post_thumb">
                                                                    <a
                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                                        <figure class="imghover">
                                                                            <img width="720" height="540"
                                                                                src="{{ asset('file').'/'.$ff }}"
                                                                                class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                                alt="{{ $blog->name }}"
                                                                                decoding="async"
                                                                                srcset="{{ asset('file').'/'.$ff }} 1200w"
                                                                                sizes="(max-width: 720px) 100vw, 720px" />
                                                                        </figure>
                                                                    </a>
                                                                </div>
                                                                <div class="post-holder">
                                                                    <div class="entry_cats">
                                                                        <ul class="post-categories">
                                                                            <li><a href="#"
                                                                                    rel="category tag">{{ isset($cat->name) ? $cat->name : '' }}</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="post_title">
                                                                        <h2><a
                                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                                                    </div>
                                                                    <div class="post-excerpt">
                                                                        <p>&nbsp;</p>
                                                                    </div>
                                                                    <div class="cm-post-meta">
                                                                        <ul class="post_meta">
                                                                            <li class="post_author">
                                                                                <a
                                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                                                    Kinner</a>
                                                                            </li>
                                                                            <li class="posted_date">
                                                                                <a
                                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                                        class="entry-date published updated"
                                                                                        datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                                            </li>
                                                                            <!-- <li class="comments">
                                                                                <a
                                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/technologies-are-helping-for-business-plan/#comments">1</a>
                                                                            </li> -->
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                            </article>
                                                        </div>
                                                        @endif
                                                        @if($i == 1)
                                                        <div class="right-container">
                                                            <div class="row">
                                                        @endif
                                                            @if($i >= 1)
                                                                <div class="box">
                                                                    <div class="cm-col-md-12">
                                                                        <div class="row">
                                                                            <div
                                                                                class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                                                <div class="post_thumb">
                                                                                    <a
                                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                                                        <figure class="imghover">
                                                                                            <img width="720"
                                                                                                height="540"
                                                                                                src="{{ asset('file').'/'.$ff }}"
                                                                                                class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                                                alt="{{ $blog->name }}"
                                                                                                decoding="async" />
                                                                                        </figure>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                                                <div class="right_box">
                                                                                    <div class="post_title">
                                                                                        <h2><a
                                                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                                                                    </div>
                                                                                    <div class="cm-post-meta">
                                                                                        <ul class="post_meta">
                                                                                            <li class="post_author">
                                                                                                <a
                                                                                                    href="#">Cester
                                                                                                    Kinner</a>
                                                                                            </li>
                                                                                            <li class="posted_date">
                                                                                                <a
                                                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                                                        class="entry-date published updated"
                                                                                                        datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                                                            </li>
                                                                                            <!-- <li class="comments">
                                                                                                <a
                                                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/drone-is-being-favorite-among-the-youths/#comments">0</a>
                                                                                            </li> -->
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @if($i == 4)
                                                            </div>
                                                        </div>    
                                                        @endif
                                                    @if($i== 0 || $i == 4)    
                                                    </div>
                                                    @endif
                                                    <?php $i++; ?>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                        <div id="media_image-8"
                                            class="widget cm-post-widget-section widget_media_image"><a
                                                href="#"><img width="768"
                                                    height="90"
                                                    src="{{ asset('frontend/images/hori-ads.jpg') }}"
                                                    class="image wp-image-710  attachment-full size-full" alt
                                                    style="max-width: 100%; height: auto;" decoding="async"
                                                    srcset="{{ asset('frontend/images/hori-ads.jpg') }} 300w"
                                                    sizes="(max-width: 768px) 100vw, 768px" /></a></div>
                                    </main>
                                </div>
                            </div>
                            <div class="cm-col-lg-4 cm-col-12 sticky_portion">
                                <aside id="secondary" class="sidebar-widget-area">
                                    <!-- <div id="search-2" class="widget widget_search">
                                        <div class="widget-title">
                                            <h2>Search</h2>
                                        </div>
                                        <form role="search" class="cm-search-form" method="get"
                                            action="https://demo.themebeez.com/demos-2/cream-magazine-free/"><input
                                                type="search" name="s" placeholder="Search..." value><button
                                                type="submit" class="cm-submit-btn"><i
                                                    class="feather icon-search"></i></button></form>
                                    </div> -->
                                    <!-- <div id="cream-magazine-author-widget-3"
                                        class="widget widget_cream-magazine-author-widget">
                                        <div class="widget-title">
                                            <h2>Hello ! I am author</h2>
                                        </div>
                                        <div class="cm_author_widget">
                                            <div class="author_thumb post_thumb">
                                                <a
                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/morgan-howen/">
                                                    <figure class="imghover">
                                                        <img width="720" height="540"
                                                            src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/11/g-bhrthtr-720x540.jpg"
                                                            class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                            alt="Morgan Howen" decoding="async" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="author_name">
                                                <h4>Morgan Howen</h4>
                                            </div>
                                            <div class="author_desc">
                                                <p>Morgan is an example author of everest news. She has just a dummy
                                                    image &amp;</p>
                                            </div>
                                            <div class="author-detail-link">
                                                <a
                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/morgan-howen/">Read
                                                    about me</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div id="media_image-2" class="widget widget_media_image">
                                        <div class="widget-title">
                                            <h2>Recommended Host</h2>
                                        </div><a
                                            href="#"><img
                                                width="400" height="300"
                                                src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300.png"
                                                class="image wp-image-709  attachment-full size-full" alt
                                                style="max-width: 100%; height: auto;" decoding="async"
                                                srcset="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300.png 400w, https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300-300x225.png 300w"
                                                sizes="(max-width: 400px) 100vw, 400px" /></a>
                                    </div>
                                    <div id="categories-2" class="widget widget_categories">
                                        <div class="widget-title">
                                            <h2>Category</h2>
                                        </div>
                                        <ul>
                                            <?php $category =  App\Models\Category::get()->all();
                                            ?>
                                            @foreach($category as $showCat)
                                            <?php
                                             $count = App\Models\Blog::where('categories_ids', $showCat->id)->get()->count();
                                            ?>
                                            <li class="cat-item cat-item-16"><a
                                                    href="{{ asset('/cat') }}/{{  str_replace(' ', '-', $showCat->eng_name) }}">{{ $showCat->name }}</a>
                                                ({{$count}})
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="media_image-3" class="widget widget_media_image">
                                        <div class="widget-title">
                                            <h2>Recommended Host</h2>
                                        </div><a
                                            href="https://www.siteground.com/index.htm?afcode=6e8b4bff4267ce9bfec4c40627135030"><img
                                                width="400" height="300"
                                                src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300.png"
                                                class="image wp-image-709  attachment-full size-full" alt
                                                style="max-width: 100%; height: auto;" decoding="async"
                                                srcset="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300.png 400w, https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300-300x225.png 300w"
                                                sizes="(max-width: 400px) 100vw, 400px" /></a>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-news-area news-area">
                <div class="cm-container">
                    <?php
                     $eight_row_blog = App\Models\Blog::where('categories_ids', $setting->fourth_row_secound_cat)->orderBy('id', 'DESC')->limit(6)->get();  
                     $cat = App\Models\Category::where('id',$setting->fourth_row_secound_cat)->first();
                     $i = 0;
                    ?>
                    <section class="cm-post-widget-section cm-post-widget-three">
                        <div class="section_inner">
                            <div class="section-title">
                                <h2>{{ isset($cat->name) ? $cat->name : '' }}</h2>
                            </div>
                            <div class="row">
                                @forEach($eight_row_blog as $blog)
                                <?php 
                                if (isset($blog->image_ids) || $blog->image_ids != '') {
                                    $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                } else {
                                    $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                }
                                $truncated = $blog->name;
                                $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';                                                
                                ?>
                                <div class="cm-col-lg-4 cm-col-md-6 cm-col-12">
                                    <div class="card">
                                        <div class="post_thumb">
                                            <a
                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                <figure class="imghover">
                                                    <img width="720" height="540"
                                                        src="{{ asset('file').'/'.$ff }}"
                                                        class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                        alt="{{ $blog->name }}"
                                                        decoding="async" />
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="card_content">
                                            <div class="entry_cats">
                                                <ul class="post-categories">
                                                    <li><a href="#"
                                                            rel="category tag">{{ isset($cat->name) ? $cat->name : '' }}</a></li>
                                                </ul>
                                            </div>
                                            <div class="post_title">
                                                <h2><a
                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                            </div>
                                            <div class="cm-post-meta">
                                                <ul class="post_meta">
                                                    <li class="post_author">
                                                        <a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                            Kinner</a>
                                                    </li>
                                                    <li class="posted_date">
                                                        <a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                class="entry-date published"
                                                                datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                    </li>
                                                    <!-- <li class="comments">
                                                        <a
                                                            href="https://demo.themebeez.com/demos-2/cream-magazine-free/adham-finally-won-the-final-lap-of-car-race/#comments">0</a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <?php
                     $ninth_row_blog = App\Models\Blog::where('categories_ids', $setting->fifth_row_first_cat)->orderBy('id', 'DESC')->limit(6)->get();  
                     $cat = App\Models\Category::where('id',$setting->fifth_row_first_cat)->first();
                     $i = 0;
                    ?>
                    <section class="cm-post-widget-section cm_post_widget_six">
                        <div class="section_inner">
                            <div class="section-title">
                                <h2>{{ isset($cat->name) ? $cat->name : '' }}</h2>
                            </div>
                            <div class="post_widget_inner">
                                <div class="row">
                                @forEach($ninth_row_blog as $blog)
                                <?php 
                                if (isset($blog->image_ids) || $blog->image_ids != '') {
                                    $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                } else {
                                    $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                }
                                $truncated = $blog->name;
                                $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';                                                
                                ?>
                                    <div class="cm-col-lg-4 cm-col-md-6 cm-col-12">
                                        <div class="box">
                                            <div class="row">
                                                <div class="cm-col-lg-5 cm-col-md-5 cm-col-4">
                                                    <div class="post_thumb">
                                                        <a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                            <figure class="imghover">
                                                                <img width="720" height="540"
                                                                    src="{{ asset('file').'/'.$ff }}"
                                                                    class="attachment-cream-magazine-thumbnail-3 size-cream-magazine-thumbnail-3 wp-post-image"
                                                                    alt="{{ $blog->name }}"
                                                                    decoding="async" />
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="cm-col-lg-7 cm-col-md-7 cm-col-8">
                                                    <div class="right_box">
                                                        <div class="post_title">
                                                            <h2><a
                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                                        </div>
                                                        <div class="cm-post-meta">
                                                            <ul class="post_meta">
                                                                <li class="post_author">
                                                                    <a
                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                                        Kinner</a>
                                                                </li>
                                                                <li class="posted_date">
                                                                    <a
                                                                        href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                            class="entry-date published updated"
                                                                            datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                                </li>
                                                                <!-- <li class="comments">
                                                                    <a
                                                                        href="https://demo.themebeez.com/demos-2/cream-magazine-free/fried-rice-is-best-with-dry-fruits/#comments">0</a>
                                                                </li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    <div id="media_image-9" class="widget cm-post-widget-section widget_media_image"><a
                            href="#"><img width="1170" height="90"
                                src="{{ asset('frontend/images/hori-ads.jpg') }}"
                                class="image wp-image-757  attachment-full size-full" alt
                                style="max-width: 100%; height: auto;" decoding="async"
                                srcset="{{ asset('frontend/images/hori-ads.jpg') }} 1024w"
                                sizes="(max-width: 1170px) 100vw, 1170px" /></a></div>
                    <?php 
                    $tenth_row_blog = App\Models\Blog::where('categories_ids', $setting->fifth_row_second_cat)->orderBy('id', 'DESC')->limit(6)->get();  
                    $cat = App\Models\Category::where('id',$setting->fifth_row_second_cat)->first();
                    $i = 0;
                    ?>
                    <section class="cm-post-widget-section cm-post-widget-two">
                        <div class="section_inner">
                            <div class="section-title">
                                <h2>{{ isset($cat->name) ? $cat->name : '' }}</h2>
                            </div>
                            @forEach($tenth_row_blog as $blog)
                                <?php 
                                if (isset($blog->image_ids) || $blog->image_ids != '') {
                                    $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                } else {
                                    $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                }
                                $truncated = $blog->name;
                                $ff = isset($blog_file->file_name) ? $blog_file->file_name : '';                                                
                                ?>
                                @if($i == 0 || $i == 2)
                                <div class="row">
                                @endif
                                    @if($i < 2)
                                    <div class="cm-col-lg-6 cm-col-md-12 cm-col-12">
                                        <article class="big-card">
                                            <div class="post_thumb">
                                                <a
                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                    <figure class="imghover">
                                                        <img width="800" height="450"
                                                            src="{{ asset('file').'/'.$ff }}"
                                                            class="attachment-cream-magazine-thumbnail-2 size-cream-magazine-thumbnail-2 wp-post-image"
                                                            alt="{{ $blog->name }}"
                                                            decoding="async" />
                                                    </figure>
                                                </a>
                                                <div class="post-holder">
                                                    <div class="entry_cats">
                                                        <ul class="post-categories">
                                                            <li><a href="#"
                                                                    rel="category tag">{{ isset($cat->name) ? $cat->name : '' }}</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="post_title">
                                                        <h2><a
                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                                    </div>
                                                    <div class="cm-post-meta">
                                                        <ul class="post_meta">
                                                            <li class="post_author">
                                                                <a
                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">Cester
                                                                    Kinner</a>
                                                            </li>
                                                            <li class="posted_date">
                                                                <a
                                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                        class="entry-date published updated"
                                                                        datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                            </li>
                                                            <!-- <li class="comments">
                                                                <a
                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/technologies-are-helping-for-business-plan/#comments">1</a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @endif
                                    @if($i>=2)
                                    <div class="cm-col-lg-3 cm-col-md-6 cm-col-12">
                                        <div class="small-card">
                                            <div class="post_thumb">
                                                <a
                                                    href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>">
                                                    <figure class="imghover">
                                                        <img width="800" height="450"
                                                            src="{{ asset('file').'/'.$ff }}"
                                                            class="attachment-cream-magazine-thumbnail-2 size-cream-magazine-thumbnail-2 wp-post-image"
                                                            alt="{{ $blog->name }}"
                                                            decoding="async" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="post-holder">
                                                <div class="post_title">
                                                    <h2><a
                                                            href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><?php echo $truncated; ?></a></h2>
                                                </div>
                                                <div class="cm-post-meta">
                                                    <ul class="post_meta">
                                                        <li class="post_author">
                                                            <a
                                                                href="#">Cester
                                                                Kinner</a>
                                                        </li>
                                                        <li class="posted_date">
                                                            <a
                                                                href="{{ asset('story') }}/<?php echo str_replace(' ', '-', $blog->eng_name); ?>"><time
                                                                    class="entry-date published updated"
                                                                    datetime="{{ $blog->created_at }}">{{ $blog->created_at }}</time></a>
                                                        </li>
                                                        <!-- <li class="comments">
                                                            <a
                                                                href="https://demo.themebeez.com/demos-2/cream-magazine-free/virtual-reality-changing-the-life-of-people/#comments">0</a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($i == 1 || $i == 5)
                                </div>
                                @endif
                                <?php $i++; ?>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
@endsection