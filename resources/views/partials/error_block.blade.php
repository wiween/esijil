@if ($errors->has($item))
    <span class="help-block">
        <strong>{{ $errors->first($item) }}</strong>
    </span>
@endif