@extends('layouts.main')

@section('content')
<!-- banner section start -->
<h1>Игра {{$id}}:</h1>
<h1>Nick: {{$nick}}:</h1>
    <table id="field">
        <tr>
            <td id="0"> </td>
            <td id="1"> </td>
            <td id="2"> </td>
        </tr>
        <tr>
            <td id="3"> </td>
            <td id="4"> </td>
            <td id="5"> </td>
        </tr>
        <tr>
            <td id="6"> </td>
            <td id="7"> </td>
            <td id="8"> </td>
        </tr>
    </table>
@endsection
@push('scripts')
    <script>
        const gamerId = {{$gamerId}};
        const csrf = '{{csrf_token()}}'
    </script>
@endpush
