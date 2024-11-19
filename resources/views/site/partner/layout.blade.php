<x-www-app>
    <x-www-layout>
        <x-www-main>

            <section>
                <!--row-->
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-8 offset-xl-2">
                        <div class="text-center mb-6 d-flex flex-column gap-2">
                            <!--heading-->
                            <h2 class="mb-0 mx-xl-8 h1">다양한 파트너와 함께 같이 시작할 수 있습니다.</h2>
                            <!--para-->
                            <p class="mb-0">나에게 맞는 파트너를 선택하고 도움을 요청해 보세요.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 파트너 목록 -->
            <section>
                @livewire('site-partner')
            </section>

        </x-www-main>
    </x-www-layout>
</x-www-app>
