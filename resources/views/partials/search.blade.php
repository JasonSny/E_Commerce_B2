<form action="{{ route('products.search') }}" class="d-flex mt-3">
    <div class="form-group mb-0 mr-1">
        <input type="text" name="x" class="form-control" value="{{ request()->x ?? '' }}">
    </div>
    <button type="submit" class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>