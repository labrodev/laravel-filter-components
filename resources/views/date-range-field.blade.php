<div class="form-group">
    <label class="col-sm-4 control-label">
        {{ $name }}
    </label>
    <div class="col-sm-2">
        <input class="form-control" 
            name="filter[{{ $field }}][]" 
            type="date" 
            value="{{ $currentSearchQuery[0] ?? null }}">
    </div>
    <div class="col-sm-2">
        <input class="form-control" 
            name="filter[{{ $field }}][]" 
            type="date"
            value="{{ $currentSearchQuery[1] ?? null }}"
        >
    </div>
</div>

