<input type="text" hidden value="{{ $catalog->id }}" name="catalog_ids[]" value="{{ $catalog->name }}">

<div class="row mt-3" data-catalog-count="{{ $catalogCount }}">
    <div class="col-md-4">
        <label for="catalog_name_{{ $catalogCount }}" class="form-label">Catalog Name {{ $catalogCount }}</label>
        <input type="text" class="form-control" id="catalog_name_{{ $catalogCount }}" name="catalog_names[]"
            value="{{ $catalog->name }}">
    </div>

    <div class="col-md-3">
        <label for="catalog_front_{{ $catalogCount }}" class="form-label mt-3">Frontside Image</label>
        <input type="file" class="form-control dropify"
            data-default-file="{{ asset('uploads/catalogs/fronts/' . $catalog->front_image) }}"
            id="catalog_front_{{ $catalogCount }}" name="catalog_fronts[]"
            data-allowed-file-extensions="jpg jpeg png gif">
    </div>

    <div class="col-md-3">
        <label for="catalog_back_{{ $catalogCount }}" class="form-label mt-3">Backside Image</label>
        <input type="file" class="form-control dropify"
            data-default-file="{{ asset('uploads/catalogs/backs/' . $catalog->back_image) }}"
            id="catalog_back_{{ $catalogCount }}" name="catalog_backs[]"
            data-allowed-file-extensions="jpg jpeg png gif">
    </div>

    <div class="col-md-2">
        <label class="form-label d-block mt-4">&nbsp;</label>
        <button type="button" class="btn btn-danger btn-remove-catalog"
            data-catalog-count="{{ $catalogCount }}">Remove</button>
    </div>
</div>
