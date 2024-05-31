<x-app-layout>
    <x-slot name="header">
        <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                Overview
            </div>
            <h2 class="page-title">
                Products
            </h2>
        </div>
        <!-- Page title actions -->
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <span class="d-none d-sm-inline">
                    <a href="#" class="btn">
                        New view
                    </a>
                </span>
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                    data-bs-target="#modal-report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                    Create new report
                </a>
                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                    data-bs-target="#modal-report" aria-label="Create new report">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-responsive text-center">
                    @if ($products)
                        <x-empty title="No products found"
                            message="Try adjusting your search or filter to find what you're looking for."
                            button_label="{{ __('Add your first Product') }}"
                            button_route="{{ route('products.create') }}" />

                        <div style="text-center" style="padding-top:-25px">
                            <center>
                                <a href="{{ route('products.import.view') }}" class="">
                                    {{ __('Import Products') }}
                                </a>
                            </center>
                        </div>
                    @else
                        <div class="container-xl">
                            <x-alert />
                            @include('tables.product-table')
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @stack('page-libraries', 'page-scripts')

</x-app-layout>
