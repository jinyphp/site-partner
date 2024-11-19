<!--card-->
<div class="card">
    <!--card body-->
    <div class="card-body px-md-5 pt-2">
        <div class="d-flex flex-column gap-4 mt-4">
            <!--heading-->
            <h3 class="mb-0">
                지원 플랜
            </h3>
            <div class="d-flex flex-column gap-3">
                <!--content-->
                <div class="d-flex flex-column gap-1">
                    <span>시작 가격</span>
                    <div class="d-flex flex-row align-items-center gap-1">
                        <h3 class="mb-0 h2">{{$partner['price_time']}}</h3>
                        <small class="text-gray-800 fw-medium">/ time</small>
                    </div>
                </div>
                {{-- <div class="d-flex flex-column gap-2">
                    <!--heading-->
                    <div>
                        <h4 class="mb-1">Every Month Of Mentorship</h4>
                    </div>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                        <li class="d-flex flex-row gap-2">
                            <!--icon-->
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor"
                                    class="bi bi-person-video text-primary" viewBox="0 0 16 16">
                                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5">
                                    </path>
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm10.798 11c-.453-1.27-1.76-3-4.798-3-3.037 0-4.345 1.73-4.798 3H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1z">
                                    </path>
                                </svg>
                            </span>
                            <!--text-->
                            <span>1 session/week&nbsp;(1:1 Sessions)</span>
                        </li>
                        <li class="d-flex flex-row gap-2">
                            <!--icon-->
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor"
                                    class="bi bi-chat-left-dots-fill text-primary"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2">
                                    </path>
                                </svg>
                            </span>
                            <!--text-->
                            <span>Within 12hours&nbsp;(Chat Support)</span>
                        </li>
                        <li class="d-flex flex-row gap-2">
                            <!--icon-->
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor"
                                    class="bi bi-list-task text-primary" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z">
                                    </path>
                                    <path
                                        d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z">
                                    </path>
                                </svg>
                            </span>
                            <!--text-->
                            <span>Everyday&nbsp;(Tasks &amp; Followup)</span>
                        </li>
                    </ul>
                </div> --}}
            </div>

            <div class="d-flex flex-column gap-3">
                @if (!$asked)
                <a href="#!" class="btn btn-primary d-grid" wire:click="ask">문의하기</a>
                @else
                <a href="#!" class="btn btn-secondary d-grid" wire:click="unask">문의 취소</a>
                @endif

            </div>
        </div>
    </div>
</div>
