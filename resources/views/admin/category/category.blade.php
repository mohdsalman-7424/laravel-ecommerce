@extends('admin.layout.app')
@section('title', 'All Categories')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Category</h5>
                            <form class="d-inline-flex">
                                <a href="{{ route('category.create') }}" class="align-items-center btn btn-theme d-flex">
                                    <i data-feather="plus-square"></i>Add New
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive category-table">
                            <div>
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Date</th>
                                            <th>Product Image</th>
                                            <th>Icon</th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->created_at->format('d-m-Y') }}</td>

                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ url('public/admin/assets/images/product/' . $category->image) }}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="category-icon">
                                                        <img src="{{ url('public/admin/assets/images/icons/' . $category->icon) }}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </td>

                                                <td>{{ $category->slug }}</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('category.edit', $category->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalToggle">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>

                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
