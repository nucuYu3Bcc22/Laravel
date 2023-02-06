@extends('layouts.front')


@section('content')
        <div class="container">
            <div class="row">
                <hr color="#c0c0c0">
                <div class="side col-md-3">
                    <h2><?php echo $data->name; ?>の天気予報</h2>
                    <div class="time">
                        <div><?php echo date("l g:i a", $currentTime); ?></div>
                        <div><?php echo date("jS F, Y",$currentTime); ?></div>
                        <div><?php echo ucwords($data->weather[0]->description); ?></div>
                    </div>
                    <div class="weather-forecast">
                        <img
                            src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                            class="weather-icon" />最高温度 <?php echo $data->main->temp_max; ?> °C / 
                            <span class="min-temperature">最低温度 <?php echo $data->main->temp_min; ?> °C</span>
                    </div>
                    <div class="time">
                        <div>湿度: <?php echo $data->main->humidity; ?> %</div>
                        <div>風速: <?php echo $data->wind->speed; ?> km/h </div>
                    </div>
                </div>
            </div>
        
    
            <!--<div class="container">-->
                <hr color="#c0c0c0">
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