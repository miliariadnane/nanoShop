@auth

<h5 class="mb-4"> Post a comment about the product </h5>
<form method="POST" action="{{ $action }}">
    @csrf
    <div class="row">
        <div class="col-3">
            <img class="img-thumbnail img-fluid rounded-circle" src="/admin/img/user.jpg" width="45%">
            <img class="img-fluid" src="/admin/img/arrow-right.png" width="35%">
        </div>
        <div class="col-9">
            <textarea class="form-control my-3" name="content" id="content" rows="3"></textarea>

            <x-errors my-class="danger"></x-errors>

            <button type="submit" class="btn btn-primary btn-block float-right">
                <i class="fas fa-plus-circle"></i>
                Create a comment!
            </button>
        </div>
    </div>
</form>

@else

<a href="{{ route('login') }}" class="btn btn-success">Sign In</a> to post a comment ! 

@endauth