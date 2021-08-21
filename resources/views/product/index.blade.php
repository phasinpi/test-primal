@extends('layout.default')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-12">
            <a class="btn btn-primary" href="/product/create" role="button">Add product</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if($products->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Price
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                {{$product->description}}
                            </td>
                            <td>
                                {{number_format($product->price, 2)}}
                            </td>
                            <td class="d-inline-flex">
                                <a class="btn btn-warning" href="/product/{{$product->id}}/edit" role="button">Edit</a>
                                <form class="form-delete" role="form" method="POST" action="/product/{{ $product->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            No have product
            @endif
        </div>
    </div>
</div>
<?php if (!empty($product->id)) { ?>
    <script>
        $(".form-delete").submit(function () {
            if (confirm("Delete this product?")) {
                form.get(0).submit();
            }
            return false;
        });
    </script>
    <?php } ?>
@endsection
