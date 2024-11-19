<x-www-app>
    <x-www-layout>
        <x-www-main>
            <div class="row">
                <div class="col-12 col-md-2">

                    <div class="list-group">
                        <a href="/partner" class="list-group-item list-group-item-action">파트너 찾기</a>
                        <a href="/partner/join" class="list-group-item list-group-item-action" aria-current="true">
                            파트너 가입
                        </a>
                        <a href="/partner/info" class="list-group-item list-group-item-action">
                            파트너 안내
                        </a>
                    <a href="#" class="list-group-item list-group-item-action">파트너 혜택</a>
                    <a href="#" class="list-group-item list-group-item-action">파트너 FAQ</a>
                        <a href="#" class="list-group-item list-group-item-action">문의하기</a>
                    </div>
                </div>
                <div class="col-12 col-md-10">
                    <h1>파트너 가입</h1>

                    <!-- 파트너 목록 -->
                    <section>
                        @livewire('site-partner-join')
                    </section>
                </div>
            </div>


        </x-www-main>
    </x-www-layout>
</x-www-app>
