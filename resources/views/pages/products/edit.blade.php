@extends('layouts.app')

@section('title', 'Create New Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="/products" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit New Ticket</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/products">Tickets</a></div>
                    <div class="breadcrumb-item">Edit Ticket</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Your Ticket</h4>
                            </div>
                            <form action="{{ route('products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ticket
                                            Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input value="{{ old('name', $product->name) }}" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select
                                                class="form-control selectric @error('category_id') is-invalid @enderror"
                                                name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="invalid-feedback">
                                            test
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input value="{{ old('price', $product->price) }}" type="number"
                                                class="form-control @error('price') is-invalid @enderror" name="price">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input value="{{ old('stock', $product->stock) }}" type="number"
                                                class="form-control @error('stock') is-invalid @enderror" name="stock">
                                            @error('stock')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Criteria</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="form-group ">
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="criteria" value="individual"
                                                            class="selectgroup-input"
                                                            @if (old('criteria', $product->criteria) === 'individual') checked @endif>
                                                        <span class="selectgroup-button">Individual</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="criteria" value="group"
                                                            class="selectgroup-input"
                                                            @if (old('criteria', $product->criteria) === 'group') checked @endif>
                                                        <span class="selectgroup-button">Group</span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="form-group">
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="status" value="publish"
                                                            class="selectgroup-input" checked>
                                                        <span class="selectgroup-button">Publish</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="status" value="draft"
                                                            class="selectgroup-input"
                                                            @if (old('status', $product->status) === 'draft') checked @endif>
                                                        <span class="selectgroup-button">Draft</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="status" value="archived"
                                                            class="selectgroup-input"
                                                            @if (old('status', $product->status) === 'archived') checked @endif>
                                                        <span class="selectgroup-button">Archived</span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Ticket
                                            Favorite?</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="form-group">
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="favorite" value="0"
                                                            class="selectgroup-input"
                                                            @if (old('favorite', $product->favorite) == '0') checked @endif>
                                                        <span class="selectgroup-button">No</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="favorite" value="1"
                                                            class="selectgroup-input"
                                                            @if (old('favorite', $product->favorite) == '1') checked @endif>
                                                        <span class="selectgroup-button">Yes</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($product->image)
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Latest
                                                Ticket
                                                Image</label>
                                            <div class="col-sm-12 col-md-7">
                                                <img src="{{ asset("storage/$product->image") }}" alt="image"
                                                    class="img-fluid rounded" width="250">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                            @if ($product->image)
                                                Change
                                            @endif Ticket
                                            Image
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload"
                                                    @error('image') is-invalid @enderror />
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Edit Ticket</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
