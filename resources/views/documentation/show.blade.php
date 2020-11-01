@extends(config('larabook.component_layout'))

@section('content')
    @component('components.'.$component['name'], $attributes)

    @endcomponent
@endsection

