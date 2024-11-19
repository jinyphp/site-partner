<div class="d-flex gap-2">
    @foreach ($rows as $item)
    <div class="">
    <a href="/partner/{{ $item->id }}">
        {{ $item->partner_name }}
        </a>
    </div>
    @endforeach
</div>
