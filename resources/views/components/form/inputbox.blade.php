<div class="mb-3">
    <label for="{{ $name }}" class="{{ $required ?? '' }}">{{ $labelName }}</label>
    <input type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}" class="form-control form-control-sm" placeholder="{{ $placeholder ?? '' }}">
</div>
