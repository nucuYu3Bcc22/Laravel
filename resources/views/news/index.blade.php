@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        
               <div class="container">
                    <div class="col col-lg-2">
                        <br>
                    </div>
                    <div class="left-contents">
                        <div class="card-contents">
                            <h3 class="left-text">今日の天気</h3>
                            <entry>
                                    <title>全般季節予報（２週間気温予報）</title>
                                            <id>https://www.data.jma.go.jp/developer/xml/data/20230129050733_0_VPZK70_010000.xml</id>
                                            <updated>2023-01-29T05:07:33Z</updated>
                                        <author>
                                            <name>気象庁</name>
                                        </author>
                                            <link type="application/xml" href="https://www.data.jma.go.jp/developer/xml/data/20230129050733_0_VPZK70_010000.xml"/>
                                        <content type="text">【２週間気温予報（概況）】</content>
                            </entry>
                        </div>
                    </div>
                </div>
                    
        
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <h2><strong>最新のヘッドライン</strong></h2> 
                                
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ secure_asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ Str::limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ Str::limit($headline->body, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ secure_asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection