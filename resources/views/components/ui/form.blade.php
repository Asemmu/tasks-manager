@props(['action_route', 'method'])
<form style="width: 26rem;" method="{{ $method ?? 'POST' }}" action="{{ $action_route }}" {{ $attributes }}>
    @csrf
    {{  $slot }}
</form>