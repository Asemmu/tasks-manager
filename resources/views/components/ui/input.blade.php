@props(['type', 'id', 'name', 'label', 'isrequired', 'value'])
@php
    $hasError = $errors->has($name);
@endphp
<div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="{{ $id }}">{{ $label}}</label>
    <input type="{{ $type }}" id="{{ $id }}" class="form-control {{ $hasError ? 'is-invalid border-danger' : '' }}" name="{{ $name }}"   {{ $isrequired ? 'required' : ''}} value="{{ $value ?? '' }}"/>
</div>