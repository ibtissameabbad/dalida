@if(count($errors))
    <div class="form-group mt-4">
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
