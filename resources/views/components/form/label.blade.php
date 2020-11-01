@props([ 'for' => '', 'label' => '' ])
<label for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700">{{ $label }}</label>
{{ $slot }}
