<div>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($rows as $row)
        <div class="col">
            <div class="card h-100">
                @if($partners[$row->partner_id]->image)
                    <img src="{{$partners[$row->partner_id]->image}}" class="card-img-top" alt="{{$partners[$row->partner_id]->name}}">
                @else
                    <div class="bg-gray-300 card-img-top" style="height:200px"></div>
                @endif
                <div class="card-body">
                    {{$partners[$row->partner_id]->name}}

                    {{-- <div class="mt-3">
                        <a href="#!" class="btn btn-secondary d-grid"
                        wire:click="unask('{{$row->partner_id}}')">문의 취소</a>
                    </div> --}}

                    <div class="mt-3">
                        <a href="/home/partner/message/{{$row->partner_id}}" class="btn btn-secondary d-grid">문의 내역</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

