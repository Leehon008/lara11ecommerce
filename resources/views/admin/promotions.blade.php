@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Promotions</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- New Promotion Form -->
        <div class="wg-box">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form class="form-new-product form-style-1" action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Promotion Heading <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Promotion Heading" name="promo_heading" value="{{ old('promo_heading') }}" required>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Short Description <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Promotion Description" name="promo_description" value="{{ old('promo_description') }}" required>
                </fieldset>

                <fieldset>
                    <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="upload-1.html" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image" accept="image/*" required>
                            </label>
                        </div>
                    </div>
                    @error('image')
                        <span class="alert alert-danger text-center">{{ $message }} </span>
                    @enderror
                </fieldset>

                <div class="bot">
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>

        <!-- Promotions Table -->
        <div class="wg-box mt-5">
            <div class="wg-table table-all-user mt-4">
                <div class="table-responsive">
                    @if (Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}
                    @endif
                    <h3>Current Promotions</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promotions as $index => $promotion)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><img src="{{ asset($promotion->image) }}" alt="Promotion Image" width="80"></td>
                                    <td>{{ $promotion->promo_heading }}</td>
                                    <td>{{ $promotion->promo_description }}</td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('admin.promotion_edit', $promotion->id) }}" >
                                                <div class="item edit">
                                                    <i class="icon-edit-3"></i>
                                                </div>
                                            </a>
                                            <form action="{{ route('admin.promotion_delete', $promotion->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                
                                                <div class="item text-danger delete">
                                                    <i class="icon-trash-2"></i>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $promotions->links('pagination::bootstrap-5') }}
                </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        // Delete confirmation with SweetAlert
        $('.delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: 'Are you sure?',
                text: 'Once deleted, you will not be able to restore this promotion!',
                type: 'warning',
                buttons: ["No", "Yes"],
                confirmButtonColor: "#dc3545"
            }).then(function(result) {
                if (result) {
                    form.submit();
                }
            });
        });
    });

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
