@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Design</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.brands') }}">
                        <div class="text-tiny">Designs</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">New Design</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.brand_store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Design Category <span class="tf-color-1">*</span></div>
                    <select name="category_id" required>
                        <option readonly> Select Category</option>
                        @foreach ($categories as $category)

                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Design Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Brand name" name="name" tabindex="0"
                        value="{{ old('name') }}" aria-required="true" required="">
                    @error('name')
                    <span class="alert alert-danger text-center">{{ $message }} </span>
                    @enderror
                </fieldset>

                <fieldset class="hidden">
                    <div class="body-title">Design Slug Name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" readonly type="text" placeholder="Brand Slug" name="slug" tabindex="0"
                        value="{{ old('slug') }}" aria-required="true" required="">
                    @error('slug')
                    <span class="alert alert-danger text-center">{{ $message }} </span>
                    @enderror
                </fieldset>
                <div class="row mb-5">
                    <div class="col-md-4 col-lg-4">
                        <fieldset class="name">
                            <div class="body-title">Width <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="number"  step="0.01" placeholder="Width" name="width" tabindex="0"
                                value="{{ old('name') }}" aria-required="true" required="">
                            @error('width')
                            <span class="alert alert-danger text-center">{{ $message }} </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <fieldset class="name">
                            <div class="body-title"> Height <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="number"  step="0.01" placeholder="Height" name="height" tabindex="0"
                                value="{{ old('name') }}" aria-required="true" required="">
                            @error('height')
                            <span class="alert alert-danger text-center">{{ $message }} </span>
                            @enderror
                        </fieldset>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <fieldset class="name">
                            <div class="body-title">Price <span class="tf-color-1">*</span></div>
                            <input class="flex-grow" type="number"  step="0.01" placeholder="Price" name="price" tabindex="0"
                                value="{{ old('name') }}" aria-required="true" required="">
                            @error('price')
                            <span class="alert alert-danger text-center">{{ $message }} </span>
                            @enderror
                        </fieldset>
                    </div>
                </div>

                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span>
                    </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="upload-1.html" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span class="tf-color">click to
                                        browse</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*">
                            </label>
                        </div>
                    </div>
                    @error('image')
                    <span class="alert alert-danger text-center">{{ $message }} </span>
                    @enderror
                </fieldset>

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
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