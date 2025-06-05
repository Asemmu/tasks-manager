  @props(['id', 'name', 'label', 'options' , 'isrequired', 'value'])
@php
    $hasError = $errors->has($name);
@endphp
<div data-mdb-input-init class="form-outline mb-4 ">
    <label class="form-label" for="{{ $id }}">{{ $label}}</label>
    <select data-mdb-select-init name="{{ $name }}" class="select form-control {{ $hasError ? 'is-invalid border-danger' : '' }}" {{ $isrequired ? 'required' : ''}}>
        <option value="">Please Select</option>

        @foreach ($options as $option => $val)
            <option value="{{ $val }}" {{ $val == $value ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
      
    </select>
  </div>