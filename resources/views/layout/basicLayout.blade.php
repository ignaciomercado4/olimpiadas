<!DOCTYPE html>
<html lang="en">
@include('components.layoutHtmlHead')
<body style="background-color: #8acdef; font-family: 'Quicksand', Sans Serif !important;">

    {{-- nav --}}
    @include('components.layoutHtmlNav')

    {{-- main container --}}
    <div>
        @yield('body')
    </div>
    {{-- end main container --}}


    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>