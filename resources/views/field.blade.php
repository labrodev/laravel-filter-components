<div class="form-group">
    <label class="col-sm-4 control-label">
        {{ $name }}
    </label>
    <div class="col-sm-4">
        <input class="form-control"
            name="filter[{{ $field }}]"
            value="{{ $currentSearchQuery }}" />
    </div>
</div>

