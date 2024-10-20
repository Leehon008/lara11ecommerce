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
        <!-- new-promotion -->
        <div class="wg-box">
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('promotions.update', $promotion->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <fieldset class="name">
                    <div class="body-title">Promotion Heading <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" name="promo_heading" value="{{ $promotion->promo_heading }}"
                        required>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">Short Description <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" name="promo_description"
                        value="{{ $promotion->promo_description }}" required>
                </fieldset>

                <fieldset>
                    <div class="body-title">Upload Image <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <label class="uploadfile" for="myFile">
                            <input type="file" id="myFile" name="image" accept="image/*">
                        </label>
                        @if($promotion->image)
                        <img src="{{ asset($promotion->image) }}" alt="Current Image" width="80">
                        @endif
                    </div>
                </fieldset>

                <div class="bot">
                    <button class="tf-button w208" type="submit">Update</button>
                </div>
            </form>


            <!-- Form (already in place) -->

        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            var promotionId = $(this).data('id');
            var promotionName = $(this).data('name');

            // Update modal content
            $('#promotionName').text(promotionName);
            $('#deleteForm').attr('action', '/admin/promotions/delete/' + promotionId);

            // Show the modal
            $('#deleteModal').modal('show');
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
        $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: 'Are you sure?',
                text: 'Once deleted,you will not be able to restore',
                type: 'warning',
                buttons: ["No", "Yes"],
                confirmButtonColor: "#dc3545"
            }).then(function(result) {
                if (result) {
                    form.submit();
                }
            });
        })
    });
</script>
@endpush