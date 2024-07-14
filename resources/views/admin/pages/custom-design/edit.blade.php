@extends('admin.app.app')

@section('main-content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Edit Custom Design</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('custom_designs.index') }}">Custom
                                            Designs</a></li>
                                    <li class="breadcrumb-item active">Edit Custom Design</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('custom_designs.update', $customDesign->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    value="{{ old('title', $customDesign->title) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Thumbnail</label>
                                                <input type="file" class="form-control dropify" id="image"
                                                    name="image"
                                                    data-default-file="{{ asset('uploads/catalogs/' . $customDesign->image) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="catalogs-container">
                                                @foreach ($customDesign->catalogs as $catalog)
                                                    @include('admin.pages.catalogs.edit-catalog', [
                                                        'catalog' => $catalog,
                                                        'catalogCount' => $loop->iteration,
                                                    ])
                                                @endforeach
                                            </div>

                                            <div class="text-center mt-3">
                                                <button type="button" id="add-catalog" class="btn btn-success">Add
                                                    Catalog</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center ">
                                            <button type="submit" class="btn btn-primary">Update</button>
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

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const catalogsContainer = document.getElementById('catalogs-container');
                const addCatalogButton = document.getElementById('add-catalog');
                let catalogCount = {{ $customDesign->catalogs->count() + 1 }};

                function createCatalogSection() {
                    const catalogRow = document.createElement('div');
                    catalogRow.classList.add('row', 'mt-3');

                    const catalogNameCol = document.createElement('div');
                    catalogNameCol.classList.add('col-md-4');

                    const catalogFrontCol = document.createElement('div');
                    catalogFrontCol.classList.add('col-md-3');

                    const catalogBackCol = document.createElement('div');
                    catalogBackCol.classList.add('col-md-3');

                    const removeButtonCol = document.createElement('div');
                    removeButtonCol.classList.add('col-md-2');

                    catalogNameCol.innerHTML = `
                <label for="catalog_name_${catalogCount}" class="form-label">Catalog Name ${catalogCount}</label>
                <input type="text" class="form-control" id="catalog_name_${catalogCount}" name="catalog_names[]" value="{{ old('catalog_names.${catalogCount - 1}') }}">
            `;

                    catalogFrontCol.innerHTML = `
                <label for="catalog_front_${catalogCount}" class="form-label mt-3">Frontside Image</label>
                <input type="file" class="form-control dropify${catalogCount}" id="catalog_front_${catalogCount}" name="catalog_fronts[]" data-allowed-file-extensions="jpg jpeg png gif">
            `;

                    catalogBackCol.innerHTML = `
                <label for="catalog_back_${catalogCount}" class="form-label mt-3">Backside Image</label>
                <input type="file" class="form-control dropify${catalogCount}" id="catalog_back_${catalogCount}" name="catalog_backs[]" data-allowed-file-extensions="jpg jpeg png gif">
            `;

                    removeButtonCol.innerHTML = `
                <label class="form-label d-block mt-4">&nbsp;</label>
                <button type="button" class="btn btn-danger btn-remove-catalog" data-catalog-count="${catalogCount}">Remove</button>
            `;

                    catalogRow.appendChild(catalogNameCol);
                    catalogRow.appendChild(catalogFrontCol);
                    catalogRow.appendChild(catalogBackCol);
                    catalogRow.appendChild(removeButtonCol);

                    catalogsContainer.appendChild(catalogRow);

                    // Initialize Dropify for the new inputs
                    const dropifyInputs = catalogRow.querySelectorAll(`.dropify${catalogCount}`);
                    dropifyInputs.forEach((input) => {
                        new Dropify(input, {
                            messages: {
                                'default': `Drag and drop a file or click to select for ${input.id}`,
                                'replace': `Drag and drop or click to replace for ${input.id}`,
                                'remove': `Remove ${input.id}`,
                                'error': `File type is not allowed (${input.id})`,
                            }
                        });
                    });

                    catalogCount++;
                }

                function removeCatalogSection(catalogCount) {
                    const catalogSection = document.querySelector(`.row[data-catalog-count="${catalogCount}"]`);
                    if (catalogSection) {
                        catalogsContainer.removeChild(catalogSection);
                    }
                }

                addCatalogButton.addEventListener('click', createCatalogSection);

                catalogsContainer.addEventListener('click', function(event) {
                    if (event.target.classList.contains('btn-remove-catalog')) {
                        const catalogCount = event.target.getAttribute('data-catalog-count');
                        removeCatalogSection(catalogCount);
                    }
                });

                // Create an initial catalog section
                // createCatalogSection();
            });
        </script>
    @endpush
@endsection
