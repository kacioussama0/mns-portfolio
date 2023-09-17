@extends('layouts.header')
@section('title','Blog')

@section('content')

<div class="port_sec_warapper mb-5">
    <div class="port_singleblog_wrapper prt_toppadder80 prt_bottompadder80 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_wrapper">
                        <div class="blog_data">
                            <div class="blog_thumb">
                                <img src="{{asset('storage/' . $post->thumbnail)}}" alt="blog-image" class="img-fluid">
                            </div>
                            <div class="blog_content">
                                <div class="blog_postinfo pb-3">
                                    <ul>
                                        <li><a href="javascript:;"> <i class="fas fa-calendar-alt"></i>{{date_format($post->created_at,'M d, Y')}}</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog_heading">{{$post->title}}</h4>
                                {!! $post->description !!}
                                <div class="blog_shareinfo">

                                    <div class="blog_social">
                                        <ul class="social_list">
                                            <li>
                                                <a href="javascript:;" class="siderbar_icon">
                                                    <span class="first_icon"><i class="fab fa-facebook-f nav_fb"></i></span>
                                                    <span class="second_icon"><i class="fab fa-facebook-f nav_fb"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="siderbar_icon">
                                                    <span class="first_icon"><i class="fab fa-linkedin-in nav_in"></i></span>
                                                    <span class="second_icon"><i class="fab fa-linkedin-in nav_in"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="siderbar_icon">
                                                    <span class="first_icon"><i class="fab fa-whatsapp nav_whats"></i></span>
                                                    <span class="second_icon"><i class="fab fa-whatsapp nav_whats"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="siderbar_icon">
                                                    <span class="first_icon"><i class="fab fa-twitter nav_twit"></i></span>
                                                    <span class="second_icon"><i class="fab fa-twitter nav_twit"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" class="siderbar_icon">
                                                    <span class="first_icon"><i class="fab fa-instagram nav_insta"></i></span>
                                                    <span class="second_icon"><i class="fab fa-instagram nav_insta"></i></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blogsidebar_wrapper">
                        <div class="widget search_widget">
                            <form>
                                <input class="form-control" type="text" value="" required="" name="search" placeholder="Search here...">
                                <a href="javascript:;" class="blog_searchicon"><i class="fas fa-search"></i></a>
                            </form>
                        </div>
                        <div class="widget repost_widget">
                            <h4 class="widget_title">Recent Post</h4>
                            <div class="widget_rp">
                                <ul>
                                    @foreach($latestPosts AS $post)
                                        <li>
                                            <div class="rp_thumb"><a href="javascript:;"><img src="{{asset('storage/' . $post->thumbnail)}}" width="80" height="80" alt="image" class="img-fluid"/></a></div>
                                            <div class="rp_data">
                                                <a href="javascript:;" class="rp_heading">{{$post->title}}</a>
                                                <div><a href="javascript:;" class="rp_date">{{date_format($post->created_at,'M d, Y')}}</a></div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="widget categroies_widget">
                            <h4 class="widget_title">Categories</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="javascript:;">{{$category->name}} <span class="category_num">({{count($category->posts)}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
