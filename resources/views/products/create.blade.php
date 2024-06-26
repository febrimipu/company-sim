<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product create') }}
        </h2>
    </x-slot>
    @section('content')
        <div class="page-body">
            <div class="container-xl">
                <x-alert />

                <div class="row row-cards">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            {{ __('Product Image') }}
                                        </h3>
                                        <img class="img-account-profile mb-2"
                                            src="{{ asset('assets/img/products/default.webp') }}" alt=""
                                            id="image-preview" />

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
                                    <div class="card-header">
                                        <div>
                                            <h3 class="card-title">
                                                {{ __('Product Create') }}
                                            </h3>
                                        </div>
                                        <div class="card-actions">
                                            <a href="{{ route('products.index') }}" class="btn-action">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M18 6l-12 12"></path>
                                                    <path d="M6 6l12 12"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row row-cards">
                                            <div class="col-md-12">
                                                <x-input name="name" id="name" placeholder="Product name"
                                                    value="{{ old('name') }}" />
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label for="category_id" class="form-label">
                                                        Product category
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    @if ($categories->count() == 1)
                                                        <select name="category_id" id="category_id"
                                                            class="form-select @error('category_id') is-invalid @enderror"
                                                            readonly>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category_id }}" selected>
                                                                    {{ $category_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <select name="category_id" id="category_id"
                                                            class="form-select @error('category_id') is-invalid @enderror">
                                                            <option selected="" disabled="">
                                                                Select a category:
                                                            </option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @if (old('category_id') == $category->id) selected="selected" @endif>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @endif

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

                                                    @if ($units->count() == 1)
                                                        <select name="unit_id" id="unit_id"
                                                            class="form-select @error('unit_id') is-invalid @enderror"
                                                            readonly>
                                                            @foreach ($units as $unit)
                                                                <option value="{{ $unit_id }}" selected>
                                                                    {{ $unit->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <select name="unit_id" id="unit_id"
                                                            class="form-select @error('unit_id') is-invalid @enderror">
                                                            <option selected="" disabled="">
                                                                Select a unit:
                                                            </option>
                                                            @foreach ($units as $unit)
                                                                <option value="{{ $unit->id }}"
                                                                    @if (old('unit_id') == $unit->id) selected="selected" @endif>
                                                                    {{ $unit->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @endif

                                                    @error('unit_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="buying_price"
                                                        class="form-label @error('buying_price') text-danger @enderror {{ '' ? 'required' : '' }}">
                                                        {{ __('Buying Price') }}
                                                        {{-- <span class="text-danger">*</span> --}}
                                                    </label>
                                                    <input type="number" name="buying_price" id="buying_price"
                                                        class="form-control @error('buying_price')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Buying Price" autocomplete=""
                                                        value="{{ old('buying_price') }}">
                                                    @error('buying_price')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="selling_price"
                                                        class="form-label @error('selling_price') text-danger @enderror {{ '' ? 'required' : '' }}">
                                                        {{ __('Selling Price') }}
                                                        {{-- <span class="text-danger">*</span> --}}
                                                    </label>
                                                    <input type="number" name="selling_price" id="selling_price"
                                                        class="form-control @error('selling_price')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Selling Price" autocomplete="0"
                                                        value="{{ old('selling_price') }}">
                                                    @error('selling_price')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="quantity"
                                                        class="form-label @error('quantity') text-danger @enderror {{ '' ? 'required' : '' }}">
                                                        {{ __('Quantity') }}
                                                        {{-- <span class="text-danger">*</span> --}}
                                                    </label>
                                                    <input type="number" name="quantity" id="quantity"
                                                        class="form-control @error('quantity')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Quantity" autocomplete=""
                                                        value="{{ old('quantity') }}">
                                                    @error('quantity')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="quantity_alert"
                                                        class="form-label @error('quantity_alert') text-danger @enderror {{ '' ? 'required' : '' }}">
                                                        {{ __('Quantity Alert') }}
                                                        {{-- <span class="text-danger">*</span> --}}
                                                    </label>
                                                    <input type="number" name="quantity_alert" id="quantity_alert"
                                                        class="form-control @error('quantity')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Quantity Alert" autocomplete=""
                                                        value="{{ old('quantity_alert') }}">
                                                    @error('quantity_alert')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="tax"
                                                        class="form-label @error('tax') text-danger @enderror {{ '' ? 'required' : '' }}">
                                                        {{ __('Tax') }}
                                                        {{-- <span class="text-danger">*</span> --}}
                                                    </label>
                                                    <input type="number" name="tax" id="tax"
                                                        class="form-control @error('tax')
                                                        is-invalid
                                                    @enderror"
                                                        placeholder="Tax" autocomplete="" value="{{ old('tax') }}">
                                                    @error('tax')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="tax_type">
                                                        {{ __('Tax Type') }}
                                                    </label>
                                                    <select name="tax_type" id="tax_type"
                                                        class="form-select @error('tax_type') is-invallid
                                                        @enderror">

                                                        @foreach (\App\Enums\TaxType::cases() as $taxType)
                                                            <option value="{{ $taxType->value }}"
                                                                @selected(old('tax_type') == $taxType->value)>
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
                                                <div class="mb-3">
                                                    <label class="form-label" for="notes"
                                                        class="form-label @error('notes') text-danger @enderror {{ '' ? 'required' : '' }}">
                                                        {{ __('Notes') }}
                                                        {{-- <span class="text-danger">*</span> --}}
                                                    </label>

                                                    <textarea name="notes" id="notes" rows="5" class="form-control @error('notes') is-invalid @enderror"
                                                        placeholder="Product notes"></textarea>

                                                    @error('notes')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <button class="btn btn-primary" type="submit">
                                                {{ __('Create') }}
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

</x-app-layout>
