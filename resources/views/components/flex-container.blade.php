@php
    $tag = $isList() ? 'li' : 'div';
    $hasWrapper = $hasWrapper();
@endphp
@if($hasWrapper)
    <{{ $tag }}
    {{
        $attributes->merge($getExtraAttributes(), escape: false)
    }}
    >
    @foreach ($getComponents() as $infolistComponent)
        {{ $infolistComponent }}
    @endforeach
    </{{ $tag }}>
@else
    @foreach ($getComponents() as $infolistComponent)
        {{ $infolistComponent }}
    @endforeach
@endif
