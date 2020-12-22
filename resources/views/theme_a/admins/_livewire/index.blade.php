
@extends('theme_a.layouts.app')

@section('content')

    @include('theme_a.admins._livewire.__section_a')

@endsection

@push('styles')


@endpush

@push('scripts')

    <script>

        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

    </script>

@endpush
