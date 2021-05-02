@foreach($weightData as $weight)
    <div class="col-sm-4 text-white mb-3">
        <p class="mb-2 h4 font-weight-bold">
        @switch(date("d", $weight->created_at->timestamp))
            @case(date("d"))
                Today
            @break
            @case (date("d", now()->subDay()->timestamp))
                Yesterday
            @break
            @default
                {{$weight->created_at->isoFormat('D MMMM YYYY')}}
            @break
            @endswitch
        </p>

        <hr class="bg-light my-1">
        <p><span class="text-success">{{$weight->amount}}</span> kilos</p>
    </div>
@endforeach
