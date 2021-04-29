@if($errors->any())
    <div class="card bg-danger text-white mb-3 container">
        <div class="card-body">
            {{$errors->first()}}
        </div>
    </div>
@endif

