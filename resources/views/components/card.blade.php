<div class="card custom-card">
    <div class="card-header justify-content-between">
        <h3 class="card-title">{{ $title }}</h3>
        @isset($info)
            {{ $info }}
        @endisset
        @isset($action)
            {{ $action }}
        @endisset
    </div>
    <div class="card-body">
        {{ $body }}
    </div>
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
