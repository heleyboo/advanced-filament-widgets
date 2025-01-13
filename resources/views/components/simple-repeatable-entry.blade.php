@php
    $childComponentContainers = $getChildComponentContainers();
    $tag = $isList() ? 'ul' : 'div';
@endphp

<{{ $tag }}
    {{
        $attributes->merge($getExtraAttributes(), escape: false)
    }}
>

@foreach ($childComponentContainers as $container)
    {{ $container }}
@endforeach

</{{ $tag }}>
