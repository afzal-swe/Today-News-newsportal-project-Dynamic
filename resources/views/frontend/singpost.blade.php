@extends('layouts.front')

@section('meta')
    <meta property='og:url' content="{{ Request::fullUrl() }}" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="{{ $post_data->title_bn }}" />
    <meta property='og:title' content="{{ $post_data->title_en }}" />
    <meta property='og:description' content="{{ $post_data->details_bn }}" />
    <meta property='og:description' content="{{ $post_data->details_en }}" />
    <meta property='og:image' content="{{ $post_data->image }}" />
@endsection




@section('content')

<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">   
                   <li><a href="#"><i class="fa fa-home"></i></a></li>					   
                    <li>
                        <a href="{{ URL::to('/') }}">
                            @if (session()->get('lang')=='english')
                                {{ $post_data->category_en }}
                            @else
                                {{ $post_data->category_bn }}
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('/') }}">
                            @if (session()->get('lang')=='english')
                                {{ $post_data->subcategory_en }}
                            @else
                                {{ $post_data->subcategory_bn }}
                            @endif
                        </a>
                    </li>
                </ol>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-12 col-sm-12"> 											
                <header class="headline-header margin-bottom-10">
                    <h1 class="headline">
                        @if (session()->get('lang')=='english')
                            {{ $post_data->title_en }}
                        @else
                            {{ $post_data->title_bn }}
                        @endif
                    </h1>
                </header>
     
     
             <div class="article-info margin-bottom-20">
              <div class="row">
                    <div class="col-md-6 col-sm-6"> 
                     <ul class="list-inline">
                     
                     
                     <li>{{  $post_data->name }}</li>     <li><i class="fa fa-clock-o"></i> {{ $post_data->post_date }}</li>
                     </ul>
                    
                    </div>
                    {{-- <div class="col-md-6 col-sm-6 pull-right"> 						
                        <ul class="social-nav">
                            <div class="sharethis-inline-share-buttons"></div>
                    
                        </ul>						   
                    </div>						 --}}
                </div>				 
             </div>				
        </div>
      </div>
      <!-- ******** -->
      <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="single-news">
                <img src="{{ asset($post_data->image) }}" alt="{{ $post_data->title_bn }}" /><br><br>
                <div class="col-md-6 col-sm-6 pull-right"> 						
                    <ul class="social-nav">
                        <div class="sharethis-inline-share-buttons"></div>
                
                    </ul>						   
                </div>	
                <h4 class="caption"> 
                    @if (session()->get('lang')=='english')
                        {{ $post_data->title_en }}
                    @else
                        {{ $post_data->title_bn }}
                    @endif
                </h4><br>
                <p>
                    @if (session()->get('lang')=='english')
                        {!! $post_data->details_en !!}
                    @else
                        {!! $post_data->details_bn !!}
                    @endif
                </p>
            </div>
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
            <!-- ********* -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading">
                        @if (session()->get('lang')=='english')
                            More news <br>
                        @else
                            আরো সংবাদ<br>
                        @endif  
                    </h2>
                </div><br><br>
@php
$more = DB::table('posts')->where('cat_id',$post_data->cat_id)->orderBy('id','DESC')->limit(3)->get();
@endphp
                @foreach ($more as $row)
                @php
                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                @endphp
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news sng-border-btm">
                            <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                            <h4 class="heading-02" style="height: 70px">
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
            @php
$more = DB::table('posts')->where('cat_id',$post_data->cat_id)->orderBy('id','DESC')->skip(3)->limit(3)->get();
@endphp
                @foreach ($more as $row)
                @php
                $slug=preg_replace('/\s+/u','-',trim($row->title_bn));
                @endphp
                    <div class="col-md-4 col-sm-4">
                        <div class="top-news sng-border-btm">
                            <a href="{{ URL::to('view-post/'.$row->id.'/'.$slug) }}"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
                            <h4 class="heading-02" style="height: 70px">
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
        <div class="col-md-4 col-sm-4">
            <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
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
                                <div class="news-title-02">
                                   
                                    <h4 class="heading-03">
                                       
                                        <a href="#">
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
                                <div class="news-title-02">
                                   
                                    <h4 class="heading-03">
                                       
                                        <a href="#">
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
                                <div class="news-title-02">
                                   
                                    <h4 class="heading-03">
                                       
                                        <a href="#">
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
            <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
        </div>
      </div>
    </div>
</section>


{{-- this script use the comment share button --}}
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=649616841b502e0012c3f304&product=inline-share-buttons&source=platform" async="async">
</script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0" nonce="Xa6flNQ3">
</script>

@endsection