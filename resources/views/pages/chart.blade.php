@extends("layouts.app")

@section("content")
    <canvas id="myChart" data="{{json_encode($weightData->getCollection())}}"></canvas>
@endsection

@section("scripts")
    <script src="{{asset("js/graph.js")}}"></script>
@endsection
