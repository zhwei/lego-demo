@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">{{ $title }} &middot; Code</div>
            <div class="panel-body">
                <pre><code class="php">{!! $code !!}</code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">{{ $title }} &middot; Demo</div>
            <div class="panel-body">
                {!! $widget !!}
            </div>
        </div>
    </div>
@endsection

@push('lego-scripts')
<script src="//cdn.bootcss.com/highlight.js/9.9.0/highlight.min.js"></script>

<script>
    $(document).ready(function () {
        $('pre code').each(function (i, block) {
            hljs.highlightBlock(block);
        });
    });
</script>
@endpush
