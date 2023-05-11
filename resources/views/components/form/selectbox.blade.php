<div class="mb-3">
    <label for="{{ $name }}" class="{{ $required ?? '' }}">{{ $labelName }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control {{ $class ?? '' }} form-control-sm">
        {{ $slot }}
    </select>
</div>
