<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@extends('layouts.default_with_menu')

@section('content')
    <form action="{{ url('/product') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                    <label  class="form-label">Category Name</label>
                    <input type="text"   name="category_name" class="form-control" >
            </div>
        </div>
        <button type="button" id="btn-add-product-list" class="btn btn-primary">+ เพิ่ม product</button>
        <div class="row mt-3" id='product-list'>
            <div class="col-6">
                <label>Product Name <button type="button"
                                        class="btn btn-danger ml-3 mt-2 mb-2 btn-del-product-list">ลบ</button></label>
                <input name="product_name[]" type="text" class="form-control" />
            </div>
        </div>

        <div class="mt-3 row">
            <button type="submit" class="btn btn-success">บันทึก</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Category Name</td>
                    <td>Product Name</td>
                    <td>User Name</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Category name</td>
                    <td>
                        <ul>
                            <li>Product 01.</li>
                            <li>Product 02.</li>
                        </ul>
                    </td>
                    <td>User name</td>
                </tr>
        </table>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        /* var count =1;
        $('#btn-add-product').on('click', function(){
            $("#add-product").append(`
            <div class="mt-3 col-6">
                <label class="form-label product-label">${count++}. Product Name
                    <button type="button" class="btn btn-danger btn-delete-product">ลบ</button>
                </label>
                    <input type="text" name="product_name[]" class="form-control">
            </div>
            `)
        })

        $(document).on('click','.btn-delete-product', function(){
            $(this).parent().parent().remove();
        })*/
        $('#btn-add-product-list').on('click', function(){
                $('#product-list').append(
                    `<div class="col-6">
                        <label>Product Name <button type="button"
                                                class="btn btn-danger ml-3 mt-2 mb-2 btn-del-product-list">ลบ</button></label>
                        <input name="product_name[]" type="text" class="form-control" />
                    </div>`);
            });

            $(document).on('click','.btn-del-product-list', function(){
                //console.log('clcik delete')
                $(this).parent().parent().remove();
            });
        });

</script>
@endsection
