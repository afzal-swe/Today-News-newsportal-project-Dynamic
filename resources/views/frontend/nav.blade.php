@extends('layouts.front')


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
                               All News
                            @else
                            সকল খবর
                            @endif
                        </a>
                    </li>
                    
                </ol>
            </div>
        </div>

        
     
      <!-- ******** -->
      <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="row">
                @foreach ($posts as $row)
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
                {{ $posts->links() }}
            </div>

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