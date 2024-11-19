<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>Id</th>
        <th width='200'> {!! xWireLink('type', "orderBy('type')") !!}</th>
        <th>이메일</th>
        <th width='200'>평가</th>
        <th width='200'>상태</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='50'>
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->id}}
                    </x-click>
                </td>
                <td width='200'>
                    <a href="{{prefix('admin')}}/site/partner/type">
                        {{$item->type}}
                    </a>
                </td>

                <td>
                    <div>
                        <x-click wire:click="edit({{$item->id}})">
                            {{$item->email}}
                        </x-click>
                    </div>
                    <div>{{$item->title}}</div>
                    <div>{{$item->description}}</div>
                </td>
                <td width='200'>
                    {{-- {{$item->like}} --}}
                </td>
                <td width='200'>
                    <div>
                        <a href="{{prefix('admin')}}/site/partner/invoice">
                            {{$item->status}}
                        </a>
                    </div>
                    <div>{{$item->expire}}</div>

                </td>

            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
