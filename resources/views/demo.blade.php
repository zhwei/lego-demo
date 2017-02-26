<!doctype html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    @include('lego::styles')
    <link href="//cdn.bootcss.com/highlight.js/9.9.0/styles/github.min.css" rel="stylesheet">
    <style>
        #body {
            margin: 0 auto;
            float: none;
        }

        pre code {
            line-height: 2em;
        }
    </style>
</head>
<body>

<div id="body" class="col-md-12">
    <h1 class="text-center">{{ $title }} &middot; Lego Demo</h1>
    <hr>
    <ul>
        @foreach($demos as $item => $name)
            <li><a href="{{ action('LegoController@demo', $item) }}">{{ $name }}</a></li>
        @endforeach
    </ul>
    <hr>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Code</div>
            <div class="panel-body">
                <pre><code class="php">{!! $code !!}</code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Demo</div>
            <div class="panel-body">
                {!! $widget !!}
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<hr>
<footer class="text-center">
    <p>
        GitHub：
        <a href="https://github.com/wutongwan/laravel-lego" target="_blank">Lego</a> |
        <a href="https://github.com/zhwei/lego-demo" target="_blank">Lego Demo</a>
    </p>
    <p>
        Author：<a href="https://github.com/zhwei" target="_blank">@zhwei</a>
    </p>
</footer>

@include('lego::scripts')

<script src="//cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>

<script>
    $(document).ready(function () {
        $('pre code').each(function (i, block) {
            hljs.highlightBlock(block);
        });
    });
</script>
</body>
</html>
