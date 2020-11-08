@extends(config('larabook.component_layout'))

@section('content')
    @component($component['view'] ?? $component['name'], $attributes)
        {{ $attributes['slot'] ?? '' }}
    @endcomponent
@endsection

