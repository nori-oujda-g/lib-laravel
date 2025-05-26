@props(['type', 'text'])
<div class="alert alert-{{ $type }} mx-4 col-11 my-2 py-1" role="alert">
    <p style="margin-top: revert;">{{ $slot }} </p>
</div>
