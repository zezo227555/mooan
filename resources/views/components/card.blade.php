<div class="card custom-card">
    @if (isset($title) || isset($info) || isset($action))
        <div class="card-header justify-content-between">
            @isset($title)
                <h3 class="card-title">{{ $title }}</h3>
            @endisset
            @isset($info)
                {{ $info }}
            @endisset
            @isset($action)
                {{ $action }}
            @endisset
        </div>
    @endif
    @isset($body)
        <div class="card-body">
            {{ $body }}
        </div>
    @endisset
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
