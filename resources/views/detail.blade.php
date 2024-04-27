@extends('layouts.app')

@section('content')
<style>
    .breadcrumb {
        background: rgba(0, 0, 0, .03);
        margin-top: 30px;
        padding: 7px 20px;
        position: relative;
    }
</style>
<div class="cm-container" style="transform: none;">
                <div class="inner-page-wrapper" style="transform: none;">
                    <div id="primary" class="content-area" style="transform: none;">
                        <main id="main" class="site-main" style="transform: none;">
                            <div class="cm_post_page_lay_wrap" style="transform: none;">
                                <div class="breadcrumb  default-breadcrumb" style="display: block;">
                                    <nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs"
                                        itemprop="breadcrumb">
                                        <ul class="trail-items" itemscope=""
                                            itemtype="http://schema.org/BreadcrumbList">
                                            <meta name="numberOfItems" content="3">
                                            <meta name="itemListOrder" content="Ascending">
                                            <li itemprop="itemListElement" itemscope=""
                                                itemtype="http://schema.org/ListItem" class="trail-item trail-begin"><a
                                                    href="/"
                                                    rel="home" itemprop="item"><span itemprop="name">Home</span></a>
                                                <meta itemprop="position" content="1">
                                            </li>
                                            <li itemprop="itemListElement" itemscope=""
                                                itemtype="http://schema.org/ListItem" class="trail-item"><a
                                                    href="{{ asset('/') }}{{  str_replace(' ', '-', $data['category']->eng_name) }}"
                                                    itemprop="item"><span itemprop="name">{{ $data['category']->name }}</span></a>
                                                <meta itemprop="position" content="2">
                                            </li>
                                            <!-- <li itemprop="itemListElement" itemscope=""
                                                itemtype="http://schema.org/ListItem" class="trail-item trail-end"><a
                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/public-was-forced-to-go-against-the-violence"
                                                    itemprop="item"><span itemprop="name">Public was forced to go
                                                        against the violence</span></a>
                                                <meta itemprop="position" content="3">
                                            </li> -->
                                        </ul>
                                    </nav>
                                </div>
                                <div class="single-container" style="transform: none;">
                                    <div class="row" style="transform: none;">
                                        <div class="cm-col-lg-8 cm-col-12 sticky_portion"
                                            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                            <div class="theiaStickySidebar"
                                                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                                                <div class="content-entry">
                                                    <article id="post-232"
                                                        class="post-detail post-232 post type-post status-publish format-standard has-post-thumbnail hentry category-politics tag-public-voices">
                                                        <div class="the_title">
                                                            <h1>{{ $data['blog']->name }}</h1>
                                                        </div>
                                                        <div class="cm-post-meta">
                                                            <ul class="post_meta">
                                                                <li class="post_author">
                                                                    <a
                                                                        href="#">{{ isset($data['author']->name) ? $data['author']->name : 'Admin'  }}</a>
                                                                </li>
                                                                <li class="posted_date">
                                                                    <a
                                                                        href="#"><time
                                                                            class="entry-date published"
                                                                            datetime="{{ $data['blog']->created_at }}">{{ $data['blog']->created_at }}</time></a>
                                                                </li>
                                                                <!-- <li class="comments">
                                                                    <a
                                                                        href="https://demo.themebeez.com/demos-2/cream-magazine-free/public-was-forced-to-go-against-the-violence/#comments">0</a>
                                                                </li> -->
                                                                <li class="entry_cats">
                                                                    <a href="/{{ str_replace(' ', '-', $data['category']->name) }}"
                                                                        rel="category tag">{{ $data['category']->name }}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="post_thumb">
                                                            <figure>
                                                            @if( $data['blog']->link != '')
                                                            <iframe class="attachment-full size-full wp-post-image" width="1280" height="853" src="{{ $data['blog']->link}}"></iframe>
                                                            @else
                                                            <?php $ff = isset($data['blog']->images->file_name) ? $data['blog']->images->file_name : ''; ?>
                                                                <img width="1280" height="853"
                                                                    src="{{ asset('file').'/'.$ff }}"
                                                                    class="attachment-full size-full wp-post-image"
                                                                    alt="{{ $data['blog']->name }}"
                                                                    decoding="async"
                                                                    srcset="{{ asset('file').'/'.$ff }} 1024w"
                                                                    sizes="(max-width: 1280px) 100vw, 1280px">
                                                            @endif
                                                            </figure>
                                                        </div>
                                                        <div class="the_content">
                                                            <div class="row">
                                                                <?php echo $data['blog']->description; ?>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="post_tags">
                                                            <a href="https://demo.themebeez.com/demos-2/cream-magazine-free/tag/public-voices/"
                                                                rel="tag">public voices</a>
                                                        </div> -->
                                                    </article>
                                                </div>
                                                <section class="cm_related_post_container">
                                                    <div class="section_inner">
                                                        <div class="section-title">
                                                            <h2>Related articles</h2>
                                                        </div>
                                                        <div class="row">
                                                        @foreach($data['latests'] as $latest)
                                                        <?php 
                                                        $ff = isset($latest->images->file_name) ? $latest->images->file_name : (isset($latest->thumbnail->file_name) ? $latest->thumbnail->file_name : ''); 
                                                        $author = [];
                                                        if(isset($blog->author)) {
                                                            $author = App\Models\User::where( "id", $blog->author)->first();
                                                        }
                                                        ?>
                                                            <div class="cm-col-lg-6 cm-col-md-6 cm-col-12">
                                                                <div class="card">
                                                                    <div class="post_thumb">
                                                                        <a
                                                                            href="{{ asset('/') }}{{ str_replace(' ', '-', isset($data['category']->eng_name) ? $data['category']->eng_name : '-' ) }}/<?php echo str_replace(' ', '-', $latest->eng_name); ?>">
                                                                            <figure class="imghover">
                                                                                <img width="800" height="450"
                                                                                    src="{{ asset('file').'/'.$ff }}"
                                                                                    class="attachment-cream-magazine-thumbnail-2 size-cream-magazine-thumbnail-2 wp-post-image"
                                                                                    alt="{{ $latest->name }}"
                                                                                    decoding="async" loading="lazy">
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                    <div class="card_content">
                                                                        <div class="entry_cats">
                                                                            <ul class="post-categories">
                                                                                <li><a href="{{ asset('/') }}{{  str_replace(' ', '-', isset($data['category']->eng_name) ? $data['category']->eng_name : '' ) }}"
                                                                                        rel="category tag">{{ $data['category']->name }}</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="post_title">
                                                                            <h2><a
                                                                                    href="{{ asset('/') }}{{ str_replace(' ', '-', isset($data['category']->eng_name) ? $data['category']->eng_name : '-' ) }}/<?php echo str_replace(' ', '-', $latest->eng_name); ?>">{{ $latest->name }} </a></h2>
                                                                        </div>
                                                                        <div class="cm-post-meta">
                                                                            <ul class="post_meta">
                                                                                <li class="post_author">
                                                                                    <a
                                                                                        href="#">{{ isset($author->name) ? $author->name : 'Admin'  }}</a>
                                                                                </li>
                                                                                <li class="posted_date">
                                                                                    <a
                                                                                        href="{{ asset('/') }}{{ str_replace(' ', '-', isset($data['category']->eng_name) ? $data['category']->eng_name : '-' ) }}/<?php echo str_replace(' ', '-', $latest->eng_name); ?>"><time
                                                                                            class="entry-date published"
                                                                                            datetime="{{ $latest->created_at }}">{{ $latest->created_at }}</time></a>
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
                                            </div>
                                        </div>
                                        <div class="cm-col-lg-4 cm-col-12 sticky_portion"
                                            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                            
                                            <aside id="secondary" class="sidebar-widget-area">
                                            <div id="media_image-2" class="widget widget_media_image">
                                                        <div class="widget-title">
                                                            <h2>Recommended Host</h2>
                                                        </div><a
                                                            href="#"><img
                                                                width="400" height="300"
                                                                src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300.png"
                                                                class="image wp-image-709  attachment-full size-full"
                                                                alt="" style="max-width: 100%; height: auto;"
                                                                decoding="async" loading="lazy"
                                                                srcset="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300.png 400w, https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300-300x225.png 300w"
                                                                sizes="(max-width: 400px) 100vw, 400px"></a>
                                                    </div>
                                            <div class="theiaStickySidebar"
                                                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 841.656px;">
                                                <aside id="secondary" class="sidebar-widget-area">
                                                    <div id="categories-2" class="widget widget_categories">
                                                        <div class="widget-title">
                                                            <h2>Category</h2>
                                                        </div>
                                                        <ul>
                                                        <?php $category =  App\Models\Category::get()->all(); ?>
                                                        @foreach($category as $showCat)
                                                        <?php
                                                        //$count = App\Models\Blog::where('categories_ids', $showCat->id)->get()->count();
                                                        ?>
                                                        <li class="cat-item cat-item-16"><a
                                                                href="{{ asset('/') }}{{  str_replace(' ', '-', $showCat->eng_name) }}">{{ $showCat->name }}</a>
                                                        </li>
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                                </aside>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
@endsection