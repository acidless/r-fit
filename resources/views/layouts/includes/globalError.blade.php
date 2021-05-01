@if($errors->any())
    <div class="row fixed-bottom pb-sm-1 pr-sm-4">
        <div class=" offset-md-9 col-md-3 offset-sm-7 col-sm-5 alert alert-dismissible card bg-danger text-white p-0">
            <button class="close" type="button" data-dismiss="alert">
                <span>x</span>
            </button>
            <div class="card-header">
                <h4 class="card-title font-weight-bold h2">Error</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{$errors->first()}}</p>
            </div>
        </div>
    </div>
    @elseif(session("message"))
    <div class="row fixed-bottom pb-sm-1 pr-sm-4">
        <div class=" offset-md-9 col-md-3 offset-sm-7 col-sm-5 alert alert-dismissible card bg-success text-white p-0">
            <button class="close" type="button" data-dismiss="alert">
                <span>x</span>
            </button>
            <div class="card-header">
                <h4 class="card-title font-weight-bold h2">Message</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{session("message")}}</p>
            </div>
        </div>
    </div>
@endif
