@props([ 'rows' => 4, 'gap' => 6])
<div {{ $attributes->merge(['class' => "grid grid-cols-{$rows} gap-{$gap}" ]) }}>
    {{ $slot }}
</div>
