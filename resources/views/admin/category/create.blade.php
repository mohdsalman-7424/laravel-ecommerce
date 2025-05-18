@extends('admin.layout.app')

@section('title', 'Add New Category')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/vendors/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/vendors/date-picker.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Category Information</h5>
                            </div>

                            <form id="categoryForm" name="categoryForm" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="theme-form theme-form-2 mega-form">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="category_name" type="text" placeholder="Category Name">
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Image</label>
                                        <div class="col-sm-9">
                                            <div id="drop-area"
                                                 style="border: 2px dashed #ccc; padding: 30px; text-align: center; cursor: pointer; margin-bottom: 25px;">
                                                <p id="drop-text">Drag & Drop Image Here or Click to Select</p>
                                                <input type="file" name="image" id="fileElem" accept="image/*" style="display:none;">
                                                <img id="preview" src="#" alt="Image Preview"
                                                     style="display:none; max-width:100%; margin-top:10px;" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Category Slug</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="slug" type="text" placeholder="Category Slug">
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="status" name="status">
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Show in Menu</label>
                                        <div class="col-sm-9">
                                            <input class="form-check-input" type="radio" name="show_in_menu" value="1" checked id="showInMenu">
                                            <label class="form-check-label" for="showInMenu">Yes</label>
                                            <input class="form-check-input ml-3" type="radio" name="show_in_menu" value="0" id="showInMenu2">
                                            <label class="form-check-label" for="showInMenu2">No</label>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <div class="d-flex align-items-center justify-content-center gap-3">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            <button class="btn btn-light" type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{ url('public/admin/assets/js/bootstrap-tagsinput.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#categoryForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('category.store') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status === 'success') {
                            toastr.success("Category added successfully!");
                            window.location.href = "{{ route('category.index') }}";
                        } else {
                            toastr.error("Error adding category!");
                        }
                    },
                    error: function () {
                        toastr.error("An error occurred while adding the category!");
                    }
                });
            });

            // Drop zone handling
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('fileElem');
            const preview = document.getElementById('preview');
            const dropText = document.getElementById('drop-text');

            dropArea.addEventListener('click', () => fileInput.click());

            dropArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropArea.style.background = '#f8f9fa';
            });

            dropArea.addEventListener('dragleave', (e) => {
                e.preventDefault();
                dropArea.style.background = '';
            });

            dropArea.addEventListener('drop', (e) => {
                e.preventDefault();
                dropArea.style.background = '';
                if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                    fileInput.files = e.dataTransfer.files;
                    showPreview(e.dataTransfer.files[0]);
                }
            });

            fileInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    showPreview(this.files[0]);
                }
            });

            function showPreview(file) {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                        dropText.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
@endsection
