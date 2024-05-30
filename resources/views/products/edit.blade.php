<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Edit') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <form action="{{ route('products.update', $product->uuid) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            {{ __('Product Image') }}
                                        </h3>

                                        <img class="img-account-profile mb-2"
                                            src="{{ $product->product_image ? asset('storage/' . $product->product_image) : asset('assets/img/products/default.webp') }}"
                                            alt="" id="image-preview">
                                        <div class="small font-italic text-muted mb-2">
                                            JPG or PNG no larger than 2 MB
                                        </div>
                                        <input type="file" accept="image/*" id="image" name="product_image"
                                            class="form-control @error('product_image') is-invalid @enderror"
                                            onchange="previewImage();">

                                        @error('product_image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            {{ __('Product Details') }}
                                        </h3>

                                        {{-- Awal Form --}}

                                        {{-- @method('PATCH')  --}}
                                        <div class="row row-cards">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">
                                                        {{ __('Name') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" id="name" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Product name"
                                                        value="{{ old('name', $product->name) }}">
                                                </div>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="category_id" class="form-label">
                                                        Product category
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select name="category_id" id="category_id"
                                                        class="form-select @error('category_id') is-invalid @enderror">
                                                        <option selected="" disabled="">Select a category:</option>

                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                @if (old('category_id', $product->category_id) == $category->id) selected="selected" @endif>
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
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="unit_id">
                                                        {{ __('Unit') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <select name="unit_id" id="unit_id"
                                                        class="form-select @error('unit_id') is-invalid @enderror">
                                                        <option selected="" disabled="">
                                                            Select a unit:
                                                        </option>

                                                        @foreach ($units as $unit)
                                                            <option value="{{ $unit->id }}"
                                                                @if (old('unit_id', $product->unit_id) == $unit->id) selected="selected" @endif>
                                                                {{ $unit->name }}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('unit_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="buying_price">
                                                        {{ __('Buying Price') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="buying_price" id="buying_price"
                                                        class="form-control @error('buying_price') is-invalid @enderror"
                                                        placeholder="Buying Price"
                                                        value="{{ old('buying_price', $product->buying_price) }}">
                                                </div>
                                                @error('buying_price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="md-3">
                                                    <label class="form-label" for="selling_price">
                                                        {{ __('Selling Price') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="selling_price" id="selling_price"
                                                        class="form-control @error('selling_price') is-invalid @enderror"
                                                        placeholder="Selling Price"
                                                        value="{{ old('name', $product->selling_price) }}">
                                                </div>

                                                @error('selling_price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="md-3">
                                                    <label for="quantity" class="form-label">
                                                        {{ __('Quantity') }}
                                                        <span class="text-danger"*></span>
                                                    </label>
                                                    <input type="text" name="quantity" id="quantity"
                                                        class="form-control @error('quantity')
                                                    is-invalid
                                                @enderror"
                                                        placeholder="Quantity"
                                                        value="{{ old('quantity', $product->quantity) }}">
                                                </div>
                                                @error('quantity')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="md-3">
                                                    <label class="form-label" for="quantity_alert">
                                                        {{ __('Quantity Alert') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="quantity_alert" id="quantity_alert"
                                                        class="form-control @error('quantity_alert')
                                                    in-invalid
                                                @enderror"
                                                        placeholder="Quantity Alert"
                                                        value="{{ old('quantity_alert', $product->quantity_alert) }}">
                                                </div>
                                                @error('quantity_alert')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="md-3">
                                                    <label for="tax" class="form-label">
                                                        {{ __('Tax') }}
                                                    </label>
                                                    <input type="text" name="tax" id="tax"
                                                        class="form-control @error('tax')
                                                    is-invalid
                                                @enderror"
                                                        placeholder="Tax" value="{{ old('Tax', $product->tax) }}">
                                                </div>
                                                @error('tax')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="md-3">
                                                    <label for="tax_type" class="form-label">
                                                        {{ __('Tax Type') }}
                                                    </label>
                                                    <select name="tax_type" id="tax_type"
                                                        class="form-select @error('tax_type')
                                                    is-invallid
                                                @enderror">

                                                        @foreach (\App\Enums\TaxType::cases() as $taxType)
                                                            <option value="{{ $taxType->value }}">
                                                                @selected(old('tax_type', $product->tax_type) == $taxType->value)>
                                                                {{ $taxType->label() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('tax_type')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 mb-0">
                                                    <label for="notes" class="form-label">
                                                        {{ __('Notes') }}
                                                    </label>
                                                    <textarea name="notes" id="notes" rows="5" class="form-control @error('notes') is-invalid @enderror"
                                                    placeholder="Product notes">{{ old('notes', $product->notes) }}</textarea>
                                                    @error('notes')
                                                        <div class="invalid-fewdback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <button class="btn btn-primary" type="submit">
                                                {{ __('Update') }}
                                            </button>

                                            <a class="btn btn-danger" href="{{ url()->previous() }}">
                                                {{ __('Cancel') }}
                                            </a>
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
    @pushonce('page-scripts')
        <script src="{{ asset('assets/js/img-preview.js') }}"></script>
    @endpushonce
</x-app-layout>
