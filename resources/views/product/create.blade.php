@extends('layout.default')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-6">
            <form method="post" action="/product">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input name="description" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input name="price" type="text" class="form-control" required>
                </div>
                <a class="btn btn-secondary" href="/product" role="button">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
