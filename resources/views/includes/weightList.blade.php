@foreach($weightData as $weight)
    <div class="col-sm-4 text-white mb-3">
        <div class="d-flex mb-2 justify-content-between">
            <p class="h4 font-weight-bold">
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
            <button type="button" class="btn btn-link text-danger btn-lg p-1" data-toggle="modal" data-target={{"#deleteWeight-{$weight['id']}"}}>
                &times;
            </button>
        </div>

        <hr class="bg-light my-1">
        <p><span class="text-success">{{$weight->amount}}</span> kilos</p>
    </div>

    <div class="modal fade" id={{"deleteWeight-{$weight['id']}"}} tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you realy want to delete this weight data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form method="POST"  action="{{url("/me/weight/{$weight['id']}")}}">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
