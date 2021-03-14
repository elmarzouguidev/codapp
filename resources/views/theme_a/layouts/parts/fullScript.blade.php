<livewire:scripts />
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{asset('assets/bundles/lib.vendor.bundle.js')}}"></script>
@stack('scripts')
<script src="{{asset('assets/js/core.js')}}"></script>
<script src="{{asset('assets/js/page/project-index.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

@include('theme_a.layouts.parts.__eventScript')
<!----powered by Elmarzougui Abdelghafour at HaymacProduction----->
