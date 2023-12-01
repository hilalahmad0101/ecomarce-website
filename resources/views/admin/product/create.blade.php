@extends('layouts.admin')
@section('title')
    Create Product
@endsection
@section('content')
    <div class="content">
        <div class="page-inner">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title"><b>Create Product</b> </h3>
                            <a class="btn btn-primary   btn-sm"
                                href="https://geniusdevs.com/codecanyon/omnimart40/admin/item"><i
                                    class="fas fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                </div>

                <!-- Form -->


                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
                <!-- Nested Row within Card Body -->
                <form class="admin-form tab-form" action="{{ route('admin.product.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" name="name" class="form-control item-name" id="name"
                                            placeholder="Enter Name" value="">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group pb-0  mb-0">
                                        <label class="d-block">Featured Image *</label>
                                    </div>
                                    <div class="form-group pb-0 pt-0 mt-0 mb-0">
                                        <img class="admin-img lg" src="">
                                    </div>
                                    <div class="form-group position-relative ">
                                        <label class="file">
                                            <input type="file" accept="image/*" class="upload-photo"
                                                name="featured_image" id="file" aria-label="File browser example">
                                            <span class="file-custom text-left">Upload Image...</span>
                                        </label>
                                        <br>
                                        <span class="mt-1 text-info">Image Size Should Be 800 x 800. or square size</span>
                                    </div>
                                    @error('featured_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="sort_details">Short Description *</label>
                                        <textarea name="short_description" id="sort_details" class="form-control" placeholder="Short Description"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="details">Description *</label>
                                        <textarea name="description" id="description" class="form-control text-editor" rows="6"
                                            placeholder="Enter Description"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group mb-2">
                                        <label for="tags">Product Tags
                                        </label>
                                        <input type="text" name="tags" class="tags" id="tags"
                                            placeholder="Tags" value="">
                                        @error('tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords
                                        </label>
                                        <input type="text" name="meta_keyword" class="tags" id="meta_keywords"
                                            placeholder="Enter Meta Keywords" value="">
                                        @error('meta_keyword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">Meta Description
                                        </label>
                                        <textarea name="meta_description" id="meta_description" class="form-control" rows="5"
                                            placeholder="Enter Meta Description"></textarea>
                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-secondary mr-2">Save</button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="discount_price">Current Price
                                            *</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" id="current_price" name="current_price"
                                                class="form-control" placeholder="Enter Current Price" min="1"
                                                step="0.1" value="">
                                            @error('current_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="previous_price">Previous Price
                                        </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" id="previous_price" name="previous_price"
                                                class="form-control" placeholder="Enter Previous Price" min="1"
                                                step="0.1" value="">
                                            @error('previous_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="category_id">Select Category *</label>
                                        <select name="cat_id" id="category_id"
                                            data-href="https://geniusdevs.com/codecanyon/omnimart40/admin/get/subcategory"
                                            class="form-control">
                                            <option value="" selected>Select One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('cat_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="subcategory_id">Select Sub Category </label>
                                        <select name="sub_cat_id" id="subcategory_id"
                                            data-href="https://geniusdevs.com/codecanyon/omnimart40/admin/get/childcategory"
                                            class="form-control">
                                            <option value="">Select One</option>
                                        </select>
                                        @error('sub_cat_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="childcategory_id">Select Child Category </label>
                                        <select name="child_cat_id" id="childcategory_id" class="form-control">
                                            <option value="">Select One</option>
                                        </select>
                                        @error('child_cat_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="brand_id">Select Brand </label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value="" selected>Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="stock">Total in stock
                                            *</label>
                                        <div class="input-group mb-3">
                                            <input type="number" id="stock" name="total_stock" class="form-control"
                                                placeholder="Total in stock" value="">
                                                 @error('total_stock')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $("#category_id").on('change', function() {
            const cat_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.product.get.sub-category') }}",
                data: {
                    cat_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: (data) => {
                    $("#subcategory_id").html(data);
                }
            })
        })

        $("#subcategory_id").on('change', function() {
            const sub_cat_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.product.get.child-category') }}",
                data: {
                    sub_cat_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: (data) => {
                    $("#childcategory_id").html(data);
                }
            })
        })
    </script>
@endsection
