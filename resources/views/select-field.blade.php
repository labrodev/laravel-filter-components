<div class="form-group">
    <label class="col-sm-4 control-label">
        {{ $name }}
    </label>
    <div class="col-sm-4">
        <select name="filter[{{ $field }}]"
            class="form-control">
            <option>{{ __('None') }}</option>
            @foreach ($options as $optionValue => $option)
                <option value="{{ $optionValue }}"
                    {{ $optionValue == $currentSearchQuery ? 'selected' : ''}}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
    </div>
</div>
