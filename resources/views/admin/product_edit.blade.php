@extends('layouts.admin')
@section('content')
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Edit Product {{ $product->name }}</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('home.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}">
                            <div class="text-tiny">Products</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Edit product</div>
                    </li>
                </ul>
            </div>
            <!-- form-add-product -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{ route('admin.product.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0" value="{{ $product->name }}" required>
                        <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                        @error('name')
                            <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </fieldset>
            
                    <fieldset class="name hidden">
                        <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" readonly placeholder="Enter product slug" name="slug" tabindex="0" value="{{ $product->slug }}" required>
                        <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                        @error('slug')
                            <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </fieldset>
            
                    <div class="gap22 cols">
                        <fieldset class="brand">
                            <div class="body-title mb-10">Product Design <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select name="brand_id" id="brand" onchange="updatePrice()" required>
                                    <option value="">Select Design</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" data-price="{{ $brand->price }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_id')
                                <span class="alert alert-danger text-center">{{ $message }}</span>
                            @enderror
                        </fieldset>
            
                        <fieldset class="name">
                            <div class="body-title mb-10">Featured</div>
                            <div class="select mb-10">
                                <select name="featured">
                                    <option value="0" {{ $product->featured == '0' ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $product->featured == '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                            @error('featured')
                                <span class="alert alert-danger text-center">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
            
                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">Regular Price <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="number" step="0.01" id="price" placeholder="Enter regular price" name="regular_price" value="{{ $product->regular_price }}" required>
                            @error('regular_price')
                                <span class="alert alert-danger text-center">{{ $message }}</span>
                            @enderror
                        </fieldset>
            
                        <fieldset class="name">
                            <div class="body-title mb-10">Sale Price</div>
                            <input class="mb-10" type="number" step="0.01" placeholder="Enter sale price" name="sale_price" value="{{ $product->sale_price }}">
                            @error('sale_price')
                                <span class="alert alert-danger text-center">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>
                    
                    <fieldset class="shortdescription">
                        <div class="body-title mb-10">Short Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10 ht-150" name="short_description" placeholder="Short Description" required>{{ $product->short_description }}</textarea>
                        <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                        @error('short_description')
                            <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </fieldset>
                </div>
                
                <div class="wg-box">
                    <fieldset>
                        <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            @if ($product->image)
                                <div class="item" id="imgpreview">
                                    <img src="{{ asset('uploads/products/' . $product->image) }}" class="effect8" alt="">
                                </div>
                            @endif
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="myFile" name="image" accept="image/*">
                                </label>
                            </div>
                        </div>
                        @error('image')
                            <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </fieldset>
            
                    <fieldset>
                        <div class="body-title mb-10">Upload Gallery Images</div>
                        <div class="upload-image mb-16">
                            @if ($product->images)
                                @foreach (explode(',', $product->images) as $img)
                                    <div class="item gitems">
                                        <img src="{{ asset('uploads/products/' . $img) }}" alt="">
                                    </div>
                                @endforeach
                            @endif
            
                            <div id="galUpload" class="item up-load">
                                <label class="uploadfile" for="gFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="text-tiny">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="gFile" name="images[]" accept="image/*" multiple>
                                </label>
                            </div>
                        </div>
                        @error('images')
                            <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </fieldset>
            
                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">Update product</button>
                    </div>
                </div>
            </form>


            <!-- /form-add-product -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->
@endsection

@push('scripts')
    <script>
        function updatePrice() {
        var brand = document.getElementById('brand');
        var price = document.getElementById('price');
        var selectedOption = brand.options[brand.selectedIndex];
        price.value = selectedOption.getAttribute('data-price');
    }

    </script>
    <script>
        $(function() {
            $("#myFile").on("change", function(e) {
                const photoImp = $("#myFile");
                const [file] = this.files;
                if (file) {
                    $("#imgpreview img").attr('src', URL.createObjectURL(file));
                    $("#imgpreview").show();
                }
            })

            $("#gFile").on("change", function(e) {
                const photoImp = $("#gFile");
                const gPhotos = this.files;
                $.each(gPhotos, function(key, val) {
                    $('#galUpload').prepend(
                        `<div class="item gitems"><img src="${URL.createObjectURL(val)}" /></div>`
                    );
                });

            })

            $("input[name='name']").on("change", function() {
                $("input[name='slug']").val(StringToSlug($(this).val()));
            })
        });

        function StringToSlug(Text) {
            return Text.toLowerCase()
                .replace(/[^\w ] + /g, "")
                .replace(/ +/g, "-");
        }
    </script>
@endpush
