@extends('layouts.app')

@section('content')
<style>
    .breadcrumb {
        background: rgba(0, 0, 0, .03);
        margin-top: 30px;
        padding: 7px 20px;
        position: relative;
    }
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination nav ul.pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination nav ul.pagination li.page-item {
        margin: 0 5px;
    }

    .pagination nav ul.pagination li.page-item a.page-link {
        text-decoration: none;
        color: #333;
        padding: 5px 10px;
        border: 1px solid #333;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-size: 15px;
        height: 45px;
        line-height: 45px;
        margin-bottom: 10px;
        margin-right: 10px;
        text-align: center;
        width: 45px;
    }



    .pagination nav ul.pagination li.page-item a.page-link:hover {
        border: 1px solid #ff3d00;
    }

    .pagination nav ul.pagination li.page-item.active span.page-link {
        background: #ff3d00;
        border: none;
        color: #fff;
        /*color: #fff;
        padding: 5px 10px;
        border: 1px solid #007bff;
        border: 1px solid #eee; */
        border-radius: 0;
        display: inline-block;
        font-size: 15px;
        height: 45px;
        line-height: 45px;
        margin-bottom: 10px;
        margin-right: 10px;
        text-align: center;
        width: 45px;
    }

    .pagination nav ul.pagination li.page-item.disabled span.page-link{
        pointer-events: none;
        color: #ccc;
        border: 1px solid #ccc;
        padding: 5px 10px;
        font-size: 15px;
        height: 45px;
        line-height: 45px;
        margin-bottom: 10px;
        margin-right: 10px;
        text-align: center;
        width: 45px;
    }

</style>
<div class="cm-container" style="transform: none;">
                <div class="inner-page-wrapper" style="transform: none;">
                    <div id="primary" class="content-area" style="transform: none;">
                        <main id="main" class="site-main" style="transform: none;">
                            <div class="cm_archive_page" style="transform: none;">
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
                                                itemtype="http://schema.org/ListItem" class="trail-item trail-end"><a
                                                    href="{{ asset('/') }}{{ isset($category->site_url) ? $category->site_url : '-' }}"
                                                    itemprop="item"><span itemprop="name">{{ isset($category->name) ? $category->name : '' }}</span></a>
                                                <meta itemprop="position" content="3">
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="archive-container" style="transform: none;">
                                    <div class="row" style="transform: none;">
                                        <div class="cm-col-lg-8 cm-col-12 sticky_portion"
                                            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                                            <div class="theiaStickySidebar"
                                                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 61.6667px;">
                                                <div class="content-entry">
                                                    <section class="list_page_iner">
                                                        <div class="section-title">
                                                            <h1>Category: <span>{{ isset($category->name) ? $category->name : '' }}</span></h1>
                                                        </div>
                                                        <div class="list_entry">
                                                            <section class="post-display-grid">
                                                                <div class="section_inner">
                                                                    <div class="row">
                                                                    @if(count($blogs) > 0)
                                                                        @foreach($blogs as $blog)
                                                                        <?php
                                                                        //$blog_file = App\Models\File::where( "id", isset($blog->image_ids)? $blog->image_ids : $blog->thumb_images)->first();
                                                                        $truncated = $blog->name;
                                                                        if (isset($blog->image_ids) && $blog->image_ids != '' && !empty($blog->image_ids) && empty($blog->link)) {
                                                                            $blog_file = App\Models\File::where( "id", $blog->image_ids)->first();
                                                                        } else {
                                                                            $blog_file = App\Models\File::where( "id", $blog->thumb_images)->first();
                                                                        }
                                                                        $ff = isset($blog_file->file_name) ? $blog_file->file_name : "";
                                                                        $author = [];
                                                                        if(isset($blog->author)) {
                                                                            $author = App\Models\User::where( "id", $blog->author)->first();
                                                                        }
                                                                        ?>
                                                                        <div class="cm-col-lg-6 cm-col-md-6 cm-col-12">
                                                                            <article id="post-619"
                                                                                class="grid-post-holder post-619 post type-post status-publish format-standard has-post-thumbnail hentry category-lifestyle tag-photograph">
                                                                                <div class="card">
                                                                                    <div class="post_thumb">
                                                                                        <a
                                                                                            href="{{ asset('/') }}{{ isset($category->site_url) ? $category->site_url : '-' }}/<?php echo isset($blog->site_url) ? $blog->site_url : ''; ?>">
                                                                                            <figure class="imghover">
                                                                                                <img width="800"
                                                                                                    height="450"
                                                                                                    src="{{ asset('file').'/'.$ff }}"
                                                                                                    class="attachment-cream-magazine-thumbnail-2 size-cream-magazine-thumbnail-2 wp-post-image"
                                                                                                    alt="{{ $blog->name }}"
                                                                                                    decoding="async">
                                                                                            </figure>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="card_content">
                                                                                        <div class="entry_cats">
                                                                                            <ul class="post-categories">
                                                                                                <li><a href="{{ asset('/') }}{{ isset($category->site_url) ? $category->site_url : '' }}"
                                                                                                        rel="category tag">{{isset($category->name) ? $category->name : ''}}</a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="post_title">
                                                                                            <h2><a
                                                                                                    href="{{ asset('/') }}{{isset($category->site_url) ? $category->site_url : '-' }}/<?php echo isset($blog->site_url) ? $blog->site_url : ''; ?>">{{ $blog->name }}</a></h2>
                                                                                        </div>
                                                                                        <div class="cm-post-meta">
                                                                                            <ul class="post_meta">
                                                                                                <li class="post_author">
                                                                                                    <a
                                                                                                        href="#">{{ isset($author->name) ? $author->name : 'Admin'  }}</a>
                                                                                                </li>
                                                                                                <li class="posted_date">
                                                                                                    <a
                                                                                                        href="{{ asset('/') }}{{ isset($category->site_url) ? $category->site_url : '-' }}/<?php echo isset($blog->site_url) ? $blog->site_url : ''; ?>"><time
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
                                                                            </article>
                                                                        </div>
                                                                        @endforeach
                                                                    @else
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>
                                                    </section>
                                                    <div class="pagination">
                                                    {{ $blogs->links( "pagination::bootstrap-4") }}
                                                        <!-- <nav class="navigation pagination" aria-label="Posts">
                                                            <h2 class="screen-reader-text">Posts navigation</h2>
                                                            <div class="nav-links"><span aria-current="page"
                                                                    class="page-numbers current">1</span>
                                                                <a class="page-numbers"
                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/category/lifestyle/page/2/">2</a>
                                                                <a class="next page-numbers"
                                                                    href="https://demo.themebeez.com/demos-2/cream-magazine-free/category/lifestyle/page/2/">Next</a>
                                                            </div>
                                                        </nav> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cm-col-lg-4 cm-col-12 sticky_portion"
                                            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                                            <div class="theiaStickySidebar"
                                                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                                                <aside id="secondary" class="sidebar-widget-area">
                                                    
                                                    <div id="media_image-2" class="widget widget_media_image">
                                                        <div class="widget-title">
                                                            <h2>Recommended Host</h2>
                                                        </div><a
                                                            href="https://www.siteground.com/index.htm?afcode=6e8b4bff4267ce9bfec4c40627135030"><img
                                                                width="400" height="300"
                                                                src="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300.png"
                                                                class="image wp-image-709  attachment-full size-full"
                                                                alt="" style="max-width: 100%; height: auto;"
                                                                decoding="async" loading="lazy"
                                                                srcset="https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300.png 400w, https://demo.themebeez.com/demos-2/cream-magazine-free/wp-content/uploads/sites/7/2018/12/advt-400-300-300x225.png 300w"
                                                                sizes="(max-width: 400px) 100vw, 400px"></a>
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
                                                            // $count = App\Models\Blog::where('categories_ids', $showCat->id)->get()->count();
                                                            ?>
                                                            <li class="cat-item cat-item-16"><a
                                                                    href="{{ asset('/') }}{{  isset($showCat->site_url) ? $showCat->site_url : '' }}">{{ $showCat->name }}</a>
                                                                
                                                            </li>
                                                            @endforeach
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div id="media_image-3" class="widget widget_media_image">
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