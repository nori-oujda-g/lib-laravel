@props(['type', 'text'])
<div class="alert alert-{{ $type }} mx-4 col-11" role="alert">
    <p>{{ $slot }} </p>
</div>
