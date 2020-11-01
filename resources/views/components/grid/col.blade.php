@props([ 'col' => 1, 'sm' => null, 'md' => null, 'lg' => null ])
@php
    $classes = '';
    $classes .= $sm ? ' sm:col-span-'.$sm : '';
    $classes .= $md ? ' md:col-span-'.$md : '';
    $classes .= $lg ? ' lg:col-span-'.$lg : '';
@endphp
<div {{ $attributes->merge(['class' => "col-span-{$col} {$classes}"]) }}>
    {{ $slot }}
</div>
