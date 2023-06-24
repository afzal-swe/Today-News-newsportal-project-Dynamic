@extends('layouts.front')
@section('content')


@php
    $firstsectionbig = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','DESC')->first();
    $first_section = DB::table('posts')->where('first_section',1)->orderBy('id','DESC')->limit(8)->get();
@endphp


<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>

                    {{-- Big Thumbnail Section Start --------------------------------------------------------------------------------------------}}
                    
                    <div class="col-md-10 col-sm-10">
                        <div class="lead-news">
                            <div class="service-img"><a href="#"><img src="{{ asset($firstsectionbig->image) }}" alt="Notebook"></a></div>
                            <div class="content">
                            <h4 class="lead-heading-01">
                                <a href="#">
                                    @if (session()->get('lang')=='english')
                                    {{ $firstsectionbig->title_en }}
                                    @else
                                    {{ $firstsectionbig->title_bn }}
                                    @endif
                                </a> 
                            </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Big Thumbnail Section End --------------------------------------------------------------------------------------------}}
                    
                </div>
                    {{-- First Section Start --------------------------------------------------------------------------------------------------}}
                    
                    <div class="row">
                        @foreach ($first_section as $row)
                            @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                            @endphp
                            <div class="col-md-3 col-sm-3">
                                <div class="top-news">
                                    <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                    <h4 class="heading-02" style="height: 80px;">
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                        @if (session()->get('lang')=='english')
                                        {{ $row->title_en }}
                                        @else
                                        {{ $row->title_bn }}
                                        @endif
                                        
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- First Section End --------------------------------------------------------------------------------------------------}}
                
                <!-- add-start -->	
                <div class="row">
                    @php
                        $horizontal2 = DB::table('ads')->where('type',2)->skip(1)->first();
                    @endphp

                    <div class="col-md-12 col-sm-12">
                        <div class="add">
                            @if ($horizontal2==NULL)
                            @else
                            <a href="{{ $horizontal2->link }}" target="_blank">
                                <img src="{{ asset( $horizontal2->ads) }}" alt="" />
                            </a>
                            @endif
                        </div>
                    </div>
                </div><!-- /.add-close -->	
                
                <!-- news-start -->
                <div class="row">

                    {{-- Secound Section First Block Start ----------------------------------------------------------------------------------------}}
                    @php
                        $first_cat = DB::table('categories')->first();
                        $first_cat_post = DB::table('posts')->where('cat_id',$first_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
                        $first_cat_post_small = DB::table('posts')->where('cat_id',$first_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
                    @endphp
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title">
                                    @if (session()->get('lang')=='english')
                                    {{ $first_cat->category_en }}
                                    @else
                                    {{ $first_cat->category_bn }}
                                    @endif
                                <a href="{{ route('more',$first_cat->id) }}">
                                    <span> 
                                        @if (session()->get('lang')=='english')
                                        More
                                        @else
                                        আরও 
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>

                            <div class="row">
                               
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{ asset($first_cat_post->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-02">
                                            <a href="#">
                                                @if (session()->get('lang')=='english')
                                                {{ $first_cat_post->title_en }}
                                                @else
                                                {{ $first_cat_post->title_bn }}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach ($first_cat_post_small as $row)
                                    @php
                                    $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                                    @endphp
                                        <div class="image-title">
                                            <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                            <h4 class="heading-03">
                                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                                    @if (session()->get('lang')=='english')
                                                    {{ $row->title_en }}
                                                    @else
                                                    {{ $row->title_bn }}
                                                    @endif
                                                    
                                                </a>
                                            </h4>
                                        </div>
                                    @endforeach  
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Secound Section First Block End ------------------------------------------------------------------------------------------}}


                    {{-- Secound Section Secound Block Start ---------------------------------------------------------------------------------------}}
                    @php
                        $second_cat = DB::table('categories')->skip(1)->first();
                        $second_cat_post = DB::table('posts')->where('cat_id',$second_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
                        $first_cat_post_small = DB::table('posts')->where('cat_id',$second_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
                    @endphp
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title">
                                @if (session()->get('lang')=='english')
                                {{ $second_cat->category_en }}
                                @else
                                {{ $second_cat->category_bn }}
                                @endif

                                <a href="{{ route('more',$second_cat->id) }}">
                                    <span> 
                                        @if (session()->get('lang')=='english')
                                        More
                                        @else
                                        আরও 
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>

                            <div class="row">
                               
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{ asset($second_cat_post->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-02">
                                            <a href="#">
                                                @if (session()->get('lang')=='english')
                                                {{ $second_cat_post->title_en }}
                                                @else
                                                {{ $second_cat_post->title_bn }}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach ($first_cat_post_small as $row)
                                    @php
                                    $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                                    @endphp
                                    <div class="image-title">
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-03">
                                            <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                                @if (session()->get('lang')=='english')
                                                {{ $row->title_en }}
                                                @else
                                                {{ $row->title_bn }}
                                                @endif
                                                
                                            </a>
                                        </h4>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Secound Section Secound Block End -----------------------------------------------------------------------------------------}}
                </div>					
            </div>

            <div class="col-md-3 col-sm-3">
                @php
                    $vertical = DB::table('ads')->where('type',1)->first();
                @endphp
                <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            @if ($vertical==NULL)
                            @else 
                            <a href="{{ $vertical->link }}" target="_blank">
                                <img src="{{ asset($vertical->ads) }}" alt="" />
                            </a>
                            @endif
                        </div>
                    </div>
                </div><!-- /.add-close -->	


               {{-- Live TV Section Start ----------------------------------------------------------------------------------------------------------}}
                @php
                    $tv=DB::table('livetvs')->first();
                @endphp
                @if ($tv->status==1)
                    
                    <!-- youtube-live-start -->	
                    <div class="cetagory-title-03">
                        @if (session()->get('lang')=='english')
                        Live TV
                        @else
                        লাইভ টিভি 
                        @endif 
                    </div>
                    <div class="photo">
                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                            {!! $tv->embed_code !!}
                        </div>
                    </div><!-- /.youtube-live-close -->	
                @endif
               {{-- Live TV Section End-------------------------------------------------------------------------------------------------------- --}}
                
                <!-- facebook-page-start------------------------------------------------------------------------------------------------------------->
                <div class="cetagory-title-03">
                    @if (session()->get('lang')=='english')
                    We are on Facebook
                    @else
                    ফেসবুকে আমরা
                    @endif
                    </div>
                    <div id="fb-root"></div>

                    <div class="fb-page" data-href="https://www.facebook.com/codeartist.IT" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/codeartist.IT" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/codeartist.IT">Code Artist.IT</a></blockquote></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0" nonce="99aqICqK"></script>
                    <!-- /.facebook-page-close--------------------------------------------------------------------------------------------------------->	
                
                <!-- add-start -->	
                <div class="row">
                    @php
                        $vertical2 = DB::table('ads')->where('type',1)->skip(1)->first();
                    @endphp
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            @if ($vertical2==NULL)
                            @else 
                            <a href="{{ $vertical2->link }}" target="_blank">
                                <img src="{{ asset($vertical2->ads) }}" alt="" />
                            </a>
                            @endif
                           
                        </div>
                    </div>
                </div><!-- /.add-close -->	
            </div>
        </div>
    </div>
</section><!-- /.1st-news-section-close -->



<!-- 2nd-news-section-start -->	


<section class="news-section">
    <div class="container-fluid">
        <div class="row">

            {{-- Thard Section First Block Start ---------------------------------------------------------------------------------------------------}}
            @php
                $thard_cat = DB::table('categories')->skip(2)->first();
                $thard_cat_post = DB::table('posts')->where('cat_id',$thard_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
                $thard_cat_post_small = DB::table('posts')->where('cat_id',$thard_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
            @endphp
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">

                    <div class="cetagory-title">
                        @if (session()->get('lang')=='english')
                        {{ $thard_cat->category_en }}
                        @else
                        {{ $thard_cat->category_bn }}
                        @endif

                        <a href="{{ route('more',$thard_cat->id) }}">
                            <span> 
                                @if (session()->get('lang')=='english')
                                More
                                @else
                                আরও 
                                @endif
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset($thard_cat_post->image) }}" alt="Notebook"></a>
                                <h4 class="heading-02">
                                    <a href="#">
                                        @if (session()->get('lang')=='english')
                                        {{ $thard_cat_post->title_en }}
                                        @else
                                        {{ $thard_cat_post->title_bn }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @foreach ($thard_cat_post_small as $row)
                            @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                            @endphp
                            <div class="image-title">
                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                <h4 class="heading-03">
                                    <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                        @if (session()->get('lang')=='english')
                                        {{ $row->title_en }}
                                        @else
                                        {{ $row->title_bn }}
                                        @endif
                                        
                                    </a>
                                </h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- Thard Section First Block End ---------------------------------------------------------------------------------------------------}}


            {{-- Thard Section Secound Block Start ---------------------------------------------------------------------------------------------------}}

            @php
            $fourth_cat = DB::table('categories')->skip(3)->first();
            $fourth_cat_post = DB::table('posts')->where('cat_id',$fourth_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
            $fourth_cat_post_small = DB::table('posts')->where('cat_id',$fourth_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
            @endphp
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title">
                        @if (session()->get('lang')=='english')
                        {{ $fourth_cat->category_en }}
                        @else
                        {{ $fourth_cat->category_bn }}
                        @endif

                        <a href="{{ route('more',$fourth_cat->id) }}">
                            <span> 
                                @if (session()->get('lang')=='english')
                                More
                                @else
                                আরও 
                                @endif
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset($fourth_cat_post->image) }}" alt="Notebook"></a>
                                <h4 class="heading-02">
                                    <a href="#">
                                        @if (session()->get('lang')=='english')
                                        {{ $fourth_cat_post->title_en }}
                                        @else
                                        {{ $fourth_cat_post->title_bn }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @foreach ($fourth_cat_post_small as $row)
                            @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                            @endphp
                            <div class="image-title">
                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                <h4 class="heading-03">
                                    <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                        @if (session()->get('lang')=='english')
                                        {{ $row->title_en }}
                                        @else
                                        {{ $row->title_bn }}
                                        @endif
                                        
                                    </a>
                                </h4>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            {{-- Thard Section Secound Block End ---------------------------------------------------------------------------------------------------}}
        </div>
        <!-- ******* -->


        

        {{-- Forth Section First Block Start ---------------------------------------------------------------------------------------------------}}
        <div class="row">
            @php
            $fifth_cat = DB::table('categories')->skip(4)->first();
            $fifth_cat_post = DB::table('posts')->where('cat_id',$fifth_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
            $fifth_cat_post_small = DB::table('posts')->where('cat_id',$fifth_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
            @endphp
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02">
                        @if (session()->get('lang')=='english')
                        {{ $fifth_cat->category_en }}
                        @else
                        {{ $fifth_cat->category_bn }}
                        @endif

                        <a href="{{ route('more',$fourth_cat->id) }}">
                            <span> 
                                @if (session()->get('lang')=='english')
                                More
                                @else
                                আরও 
                                @endif
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                    <div class="row">
                        @if ($fifth_cat_post==NULL)
                        @else
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="#">
                                        <img src="{{ asset($fifth_cat_post->image) }}" alt="Notebook">
                                    </a>
                                    <h4 class="heading-02">
                                        <a href="#">
                                            @if (session()->get('lang')=='english')
                                                {{ $fifth_cat_post->title_en }}
                                                @else
                                                {{ $fifth_cat_post->title_bn }}
                                            @endif
                                        </a>
                                        </h4>
                                </div>
                            </div>
                           
                        @endif
                        

                        <div class="col-md-6 col-sm-6">
                            @foreach ($fifth_cat_post_small as $row)
                            @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                            @endphp
                            <div class="image-title">
                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                    <img src="{{ asset($row->image) }}" alt="Notebook">
                                </a>
                                <h4 class="heading-03">
                                    <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                        @if (session()->get('lang')=='english')
                                            {{ $row->title_en }}
                                            @else
                                            {{ $row->title_bn }}
                                        @endif
                                    </a> 
                                </h4>
                            </div>
                            @endforeach
                            

                        </div>
                    </div>
                </div>
            </div>
            {{-- Forth Section First Block End ---------------------------------------------------------------------------------------------------}}



            {{-- Forth Section Secound Block Start ---------------------------------------------------------------------------------------------------}}
            @php
            $eight_cat = DB::table('categories')->skip(7)->first();
            $eight_cat_post = DB::table('posts')->where('cat_id',$eight_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
            $eight_cat_post_small = DB::table('posts')->where('cat_id',$eight_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
            @endphp
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02">
                        @if (session()->get('lang')=='english')
                        {{ $eight_cat->category_en }}
                        @else
                        {{ $eight_cat->category_bn }}
                        @endif

                        <a href="{{ route('more',$eight_cat->id) }}">
                            <span> 
                                @if (session()->get('lang')=='english')
                                More
                                @else
                                আরও 
                                @endif
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                    <div class="row">
                        @if ($eight_cat_post==NULL)
                        @else
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset($eight_cat_post->image) }}" alt="Notebook"></a>
                                <h4 class="heading-02">
                                    <a href="#">
                                        @if (session()->get('lang')=='english')
                                        {{ $eight_cat_post->title_en }}
                                        @else
                                        {{ $eight_cat_post->title_bn }}
                                        @endif
                                    </a> 
                                </h4>
                            </div>
                        </div>
                        @endif
                        
                        <div class="col-md-6 col-sm-6">
                            @foreach ($eight_cat_post_small as $row)
                            @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                            @endphp
                            <div class="image-title">
                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                    <img src="{{ asset($row->image) }}" alt="Notebook">
                                </a>
                                <h4 class="heading-03">
                                    <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                        @if (session()->get('lang')=='english')
                                        {{ $row->title_en }}
                                        @else
                                        {{ $row->title_bn }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- Forth Section Secound Block End ---------------------------------------------------------------------------------------------------}}
        </div>
        
        <!-- add-start -->	
        <div class="row">
            @php
                $horizontal3 = DB::table('ads')->where('type',2)->skip(2)->first();
                $horizontal4 = DB::table('ads')->where('type',2)->skip(3)->first();
            @endphp
            <div class="col-md-6 col-sm-6">
                <div class="add">
                    @if ($horizontal3==NULL)
                    @else
                    <a href="{{ $horizontal3->link }}" target="_blank">
                        <img src="{{ asset($horizontal3->ads) }}" alt="" />
                    </a>
                    @endif
                </div>
                    
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="add">
                    @if ($horizontal4==NULL)
                    @else
                    <a href="{{ $horizontal4->link }}" target="_blank">
                        <img src="{{ asset( $horizontal4->ads ) }}" alt="" />
                    </a>
                    @endif
                </div>
            </div>
        </div><!-- /.add-close -->	
        
    </div>
</section><!-- /.2nd-news-section-close -->


<!-- 3rd-news-section-start -->	
<section class="news-section">
    <div class="container-fluid">
        <div class="row">

            {{-- Fifth Section First Block Start ---------------------------------------------------------------------------------------------------}}
            @php
            $seven_cat = DB::table('categories')->skip(5)->first();
            $seven_cat_post = DB::table('posts')->where('cat_id',$seven_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
            $seven_cat_post_small = DB::table('posts')->where('cat_id',$seven_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
            $seven_cat_post_small2 = DB::table('posts')->where('cat_id',$seven_cat->id)->where('bigthumbnail',NULL)->skip(3)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
            @endphp
            <div class="col-md-9 col-sm-9">
                <div class="cetagory-title">
                    @if (session()->get('lang')=='english')
                    {{ $seven_cat->category_en }}
                    @else
                    {{ $seven_cat->category_bn }}
                    @endif

                    <a href="{{ route('more',$seven_cat->id) }}">
                        <span> 
                            @if (session()->get('lang')=='english')
                            More
                            @else
                            আরও 
                            @endif
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
                
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news">
                            <a href="#"><img src="{{ asset($seven_cat_post->image) }}" alt="Notebook"></a>
                            <h4 class="heading-02">
                                <a href="#">
                                    @if (session()->get('lang')=='english')
                                    {{ $seven_cat_post->title_en }}
                                    @else
                                    {{ $seven_cat_post->title_bn }}
                                    @endif
                                </a>
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @foreach ($seven_cat_post_small as $row)
                            @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                            @endphp
                        <div class="image-title">
                            <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                            <h4 class="heading-03">
                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                    @if (session()->get('lang')=='english')
                                    {{ $row->title_en }}
                                    @else
                                    {{ $row->title_bn }}
                                    @endif 
                                </a>
                            </h4>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-4 col-sm-4">
                        @foreach ($seven_cat_post_small2 as $row)
                            @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                            @endphp
                            <div class="image-title">
                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                <h4 class="heading-03">
                                    <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                        @if (session()->get('lang')=='english')
                                        {{ $row->title_en }}
                                        @else
                                        {{ $row->title_bn }}
                                        @endif
                                        
                                    </a>
                                </h4>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- Fifth Section First Block End ---------------------------------------------------------------------------------------------------}}
                <!-- ******* -->
                <br />
                <div class="row">
                    {{-- Six Section First Block Start ---------------------------------------------------------------------------------------------------}}
                    <div class="row">
                        @php
                            $six_cat = DB::table('categories')->skip(6)->first();
                            $six_cat_post = DB::table('posts')->where('cat_id',$six_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
                            $six_cat_post_small = DB::table('posts')->where('cat_id',$six_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
                        @endphp
                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title">
                                        @if (session()->get('lang')=='english')
                                        {{ $six_cat->category_en }}
                                        @else
                                        {{ $six_cat->category_bn }}
                                        @endif
                                    <a href="{{ route('more',$six_cat->id) }}">
                                        <span> 
                                            @if (session()->get('lang')=='english')
                                            More
                                            @else
                                            আরও 
                                            @endif
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="#"><img src="{{ asset($six_cat_post->image) }}" alt="Notebook"></a>
                                            <h4 class="heading-02">
                                                <a href="#">
                                                    @if (session()->get('lang')=='english')
                                                    {{ $six_cat_post->title_en }}
                                                    @else
                                                    {{ $six_cat_post->title_bn }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($six_cat_post_small as $row)
                                        @php
                                            $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                                        @endphp
                                            <div class="image-title">
                                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                                <h4 class="heading-03">
                                                    <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                                        @if (session()->get('lang')=='english')
                                                        {{ $row->title_en }}
                                                        @else
                                                        {{ $row->title_bn }}
                                                        @endif
                                                        
                                                    </a>
                                                </h4>
                                            </div>
                                        @endforeach  
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Six Section First Block End ---------------------------------------------------------------------------------------------------}}


                        {{-- Six Section Secound Block Start ---------------------------------------------------------------------------------------------------}}
                        
                        @php
                            $eight_cat = DB::table('categories')->skip(8)->first();
                            $eight_cat_post = DB::table('posts')->where('cat_id',$eight_cat->id)->where('bigthumbnail',1)->orderBy('id','DESC')->first(); // First Thumbnail Post SQL
                            $eight_cat_post_small = DB::table('posts')->where('cat_id',$eight_cat->id)->where('bigthumbnail',NULL)->orderBy('id','DESC')->limit(3)->get(); // First Thumbnail Post SQL
                        @endphp
                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title">
                                    @if (session()->get('lang')=='english')
                                    {{ $eight_cat->category_en }}
                                    @else
                                    {{ $eight_cat->category_bn }}
                                    @endif
    
                                    <a href="{{ route('more',$eight_cat->id) }}">
                                        <span> 
                                            @if (session()->get('lang')=='english')
                                            More
                                            @else
                                            আরও 
                                            @endif
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="#"><img src="{{ asset($eight_cat_post->image) }}" alt="Notebook"></a>
                                            <h4 class="heading-02">
                                                <a href="#">
                                                    @if (session()->get('lang')=='english')
                                                    {{ $eight_cat_post->title_en }}
                                                    @else
                                                    {{ $eight_cat_post->title_bn }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($eight_cat_post_small as $row)
                                        @php
                                            $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                                        @endphp
                                        <div class="image-title">
                                            <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                                            <h4 class="heading-03">
                                                <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                                    @if (session()->get('lang')=='english')
                                                    {{ $row->title_en }}
                                                    @else
                                                    {{ $row->title_bn }}
                                                    @endif
                                                    
                                                </a>
                                            </h4>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Six Section Secound Block End ---------------------------------------------------------------------------------------------------}}
    
                    </div>					
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->	


            </div>
            <div class="col-md-3 col-sm-3">
                <div class="tab-header">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                                @if (session()->get('lang')=='english')
                                Latest News
                                @else
                                সর্বশেষ
                                @endif
                            </a>
                        </li>
                        <li role="presentation" >
                            <a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                                @if (session()->get('lang')=='english')
                                Favourite
                                @else
                                জনপ্রিয়
                                @endif
                            </a>
                        </li>
                        <li role="presentation" >
                            <a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
                                @if (session()->get('lang')=='english')
                                Highest Read
                                @else
                                পঠিত
                                @endif
                            </a>
                        </li>
                    </ul>


                    @php
                        $latest = DB::table('posts')->orderBy('id','DESC')->limit(8)->get();
                        $favourite = DB::table('posts')->orderBy('id','DESC')->limit(8)->inRandomOrder()->get();
                        $highest = DB::table('posts')->orderBy('id','ASC')->limit(8)->inRandomOrder()->get();
                    @endphp

                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                @foreach ($latest as $row)
                                        @php
                                            $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                                        @endphp
                                <div class="news-title-02">
                                   
                                    <h4 class="heading-03">
                                       
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                            @if (session()->get('lang')=='english')
                                                {{$row->title_en}}
                                             @else
                                                 {{$row->title_bn}}
                                            @endif
                                         </a>
                                       
                                    </h4>
                                   
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                @foreach ($favourite as $row)
                                @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                                @endphp
                                <div class="news-title-02">
                                   
                                    <h4 class="heading-03">
                                       
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                            @if (session()->get('lang')=='english')
                                                {{$row->title_en}}
                                             @else
                                                 {{$row->title_bn}}
                                            @endif
                                         </a>
                                       
                                    </h4>
                                   
                                </div>
                                @endforeach
                                
                            </div>                                          
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab23">	
                            <div class="news-titletab">
                                @foreach ($highest as $row)
                                @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                                @endphp
                                <div class="news-title-02">
                                   
                                    <h4 class="heading-03">
                                       
                                        <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}">
                                            @if (session()->get('lang')=='english')
                                                {{$row->title_en}}
                                             @else
                                                 {{$row->title_bn}}
                                            @endif
                                         </a>
                                       
                                    </h4>
                                   
                                </div>
                                @endforeach

                            </div>						                                          
                        </div>
                    </div>
                </div>

                 
                <div class="cetagory-title-03">
                    <!-- Namaj Times -->
                        @php
                            $prayers = DB::table('prayers')->first();
                        @endphp
                        @if (session()->get('lang')=='english')
                            Prayer Times
                        @else
                        নামাজের সময়সূচি 
                        @endif
                        <!-- Namaj Times -->
                        <table class="table">
                            <tr>
                                <th>
                                    @if (session()->get('lang')=='english')
                                    Fajr
                                    <th>{{ $prayers->fajr_en }}</th>
                                    @else
                                    ফজর
                                    <th>{{ $prayers->fajr_bn }}</th>
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang')=='english')
                                    Johuhr
                                    <th>{{ $prayers->dhuhr_en }}</th>
                                    @else
                                    জোহুর
                                    <th>{{ $prayers->dhuhr_bn }}</th>
                                    @endif
                                </th>
                                
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang')=='english')
                                    asr
                                    <th>{{ $prayers->asr_en }}</th>
                                    @else
                                    আসর
                                    <th>{{ $prayers->asr_bn }}</th>
                                    @endif
                                </th>
                                
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang')=='english')
                                    maghrib
                                    <th>{{ $prayers->maghrib_en }}</th>
                                    @else
                                    মাগরিব
                                    <th>{{ $prayers->maghrib_bn }}</th>
                                    @endif
                                </th>
                                
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang')=='english')
                                    isha
                                    <th>{{ $prayers->isha_en }}</th>
                                    @else
                                    ইশা
                                    <th>{{ $prayers->isha_bn }}</th>
                                    @endif
                                </th>
                                
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang')=='english')
                                    jummah
                                    <th>{{ $prayers->jummah_en }}</th>
                                    @else
                                    জুম্মাহ
                                    <th>{{ $prayers->jummah_bn }}</th>
                                    @endif
                                </th>
                                
                            </tr>
                        </table>
                </div>

                <form action="" method="post">
                    <div class="old-news-date">
                       <input type="text" name="from" placeholder="From Date" required="">
                       <input type="text" name="" placeholder="To Date">			
                    </div>
                    <div class="old-date-button">
                        <input type="submit" value="খুজুন ">
                    </div>
               </form>
               <!-- news -->
               <br><br><br><br><br>
               <div class="cetagory-title-04">
                
                @if (session()->get('lang')=='english')
                    Importent Website
                @else
                    গুরুত্বপূর্ণ ওয়েবসাইট
                @endif 

                </div>

                @php
                    $website = DB::table('websites')->get();
                @endphp

               <div class="">
                    @foreach ($website as $row)
                        <div class="news-title-02">
                            <h4 class="heading-03">
                                <a href="{{ $row->website_link }}" target="_blank"><i class="fa fa-check" aria-hidden="true"></i> 
                                        
                                    @if (session()->get('lang')=='english')
                                        {{ $row->website_name_en }}
                                    @else
                                    {{ $row->website_name_bn }}
                                    @endif 
    
                                </a>
                            </h4>
                        </div>
                    @endforeach
               </div>

            </div>
        </div>
    </div>
</section><!-- /.3rd-news-section-close -->









<!-- gallery-section-start -->	
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="gallery_cetagory-title"> 
                    @if (session()->get('lang')=='english')
                    Photo Gallery 
                    @else
                    ফটো গ্যালারি
                    @endif
                </div>
@php
    $big_phpto = DB::table('photos')->where('type',1)->orderBy('id','DESC')->first();
    $small_phpto = DB::table('photos')->where('type',0)->orderBy('id','DESC')->limit(5)->get();
    
@endphp
                <div class="row">
                    @if ($big_phpto==NULL)
                    @else
                    <div class="col-md-8 col-sm-8">
                        <div class="photo_screen">
                            <div class="myPhotos" style="width:100%">
                                  <img src="{{ asset($big_phpto->photo) }}"  alt="Avatar">
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="col-md-4 col-sm-4">
                        
                        <div class="photo_list_bg">
                            @foreach ($small_phpto as $row)
                            
                            <div class="photo_img photo_border active">
                                
                                <a href="">
                                    <img src="{{ asset($row->photo) }}" alt="image" onclick="currentDiv(1)">
                                </a>
                                <div class="heading-03">
                                   <a href="">
                                    @if (session()->get('lang')=='english')
                                       {{ $row->title }}
                                    @else
                                    {{ $row->title }}
                                   @endif
                                   </a>
                                </div>
                            </div>
                            @endforeach 

                        </div>
                    </div>
                </div>

                <!--=======================================
                {{-- Video Gallery clickable jquary  @php
                                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                                @endphp  start --}}
            ========================================-->

                        <script>
                                var slideIndex = 1;
                                showDivs(slideIndex);

                                function plusDivs(n) {
                                  showDivs(slideIndex += n);
                                }

                                function currentDiv(n) {
                                  showDivs(slideIndex = n);
                                }

                                function showDivs(n) {
                                  var i;
                                  var x = document.getElementsByClassName("myPhotos");
                                  var dots = document.getElementsByClassName("demo");
                                  if (n > x.length) {slideIndex = 1}
                                  if (n < 1) {slideIndex = x.length}
                                  for (i = 0; i < x.length; i++) {
                                     x[i].style.display = "none";
                                  }
                                  for (i = 0; i < dots.length; i++) {
                                     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                  }
                                  x[slideIndex-1].style.display = "block";
                                  dots[slideIndex-1].className += " w3-opacity-off";
                                }
                            </script>

            <!--=======================================
                Video Gallery clickable  jquary  close
            =========================================-->

            </div>
            <div class="col-md-4 col-sm-5">
                <div class="gallery_cetagory-title"> 
                    @if (session()->get('lang')=='english')
                    Video Gallery 
                    @else
                    ভিডিও গ্যালারি
                    @endif
                    
                </div>
                @php
                $big_video = DB::table('videos')->where('type',1)->orderBy('id','DESC')->first();
                $small_video = DB::table('videos')->where('type',0)->orderBy('id','DESC')->limit(5)->get();
                
            @endphp
                <div class="row">
                    @if ( $big_video==NULL)
                    @else
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $big_video->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                </div>

                <div class="row">
                    <div class="col-md-12">
                    
                        <div class="gallery_sec owl-carousel">
                            @foreach ($small_video as $row)
                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <iframe width="140" height="120" src="https://www.youtube.com/embed/{{ $row->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @endforeach
                            

                        </div>
                    </div>
                </div>


                <script>
                    var slideIndex = 1;
                    showDivss(slideIndex);

                    function plusDivs(n) {
                      showDivss(slideIndex += n);
                    }

                    function currentDivs(n) {
                      showDivss(slideIndex = n);
                    }

                    function showDivss(n) {
                      var i;
                      var x = document.getElementsByClassName("myVideos");
                      var dots = document.getElementsByClassName("demo");
                      if (n > x.length) {slideIndex = 1}
                      if (n < 1) {slideIndex = x.length}
                      for (i = 0; i < x.length; i++) {
                         x[i].style.display = "none";
                      }
                      for (i = 0; i < dots.length; i++) {
                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                      }
                      x[slideIndex-1].style.display = "block";
                      dots[slideIndex-1].className += " w3-opacity-off";
                    }
                </script>

            </div>
        </div>
    </div>
</section><!-- /.gallery-section-close -->
@endsection