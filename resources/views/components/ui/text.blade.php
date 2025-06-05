 @props(['type', 'id', 'name', 'label', 'isrequired', 'value'])
@php
    $hasError = $errors->has($name);
@endphp
 <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="{{ $id }}">{{ $label}}</label>
    <textarea class="form-control" id="{{ $id }}" class="form-control {{ $hasError ? 'is-invalid border-danger' : '' }}" name="{{ $name }}"   {{ $isrequired ? 'required' : ''}} rows="4">{{$value ?? ''}}</textarea>
  </div>