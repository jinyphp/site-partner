<x-www-app>
    <x-www-layout>
        <x-www-main>

            <h2>고객 응대 내역</h2>
            @livewire('site-partner-message',[
                'direction' => 'receive'
                ]) 

        </x-www-main>
    </x-www-layout>
</x-www-app>
