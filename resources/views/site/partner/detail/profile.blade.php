<div class="d-flex flex-column gap-4">
    <!--card-->
    <div class="card">
        <!--img-->
        <div class="rounded-top-3 bg-gray-100"style="height: 12rem">
        </div>
        <div class="card-body p-md-5">
            <div class="d-flex flex-column gap-5">
                <!--img-->
                <div style="margin-top:-3rem;">
                    @if($partner['image'])
                        <img src="{{ $partner['image'] }}" alt="partner"
                            style="border-radius: 0.75rem; margin-top: -8rem; max-width: 25%;">
                    @else
                        <div class="bg-gray-300"
                            style="border-radius: 0.75rem; margin-top: -8rem; width: 25%; aspect-ratio: 1/1;"></div>
                    @endif
                </div>

                <div class="d-flex flex-column gap-5">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex flex-md-row flex-column justify-content-between gap-2">
                            <!--heading-->
                            <div>
                                <h1 class="mb-0">{{ $partner['name'] }}</h1>
                                <!--content-->
                                <div class="d-flex flex-lg-row flex-column gap-2">
                                    <small class="fw-medium text-gray-800">{{ $partner['company'] }}</small>
                                    <small class="fw-medium text-success">{{ $partner['career'] }}</small>
                                </div>
                            </div>
                            <!--button-->
                            <div class="d-flex flex-row gap-3 align-items-center">
                                <button class="btn btn-outline-secondary" wire:click="like">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-heart-fill me-1" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314">
                                            </path>
                                        </svg>
                                    </span>
                                    좋아요 ({{ $like_count }})
                                </button>

                                <a href="javascript:void(0)"
                                    class="btn btn-outline-secondary"
                                    wire:click="makeNewChat">
                                    채팅하기
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column gap-md-4 gap-2">
                            <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                <!--icon-->
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" class="bi bi-star-fill text-warning align-baseline"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                        </path>
                                    </svg>
                                </span>
                                <span>
                                    <!--text-->
                                    <span class="text-gray-800 fw-bold">5.0</span>
                                    (16&nbsp;Reviews)
                                </span>
                            </div>
                            <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                <!--icon-->
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" class="bi bi-people-fill text-primary align-baseline"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5">
                                        </path>
                                    </svg>
                                </span>
                                <!--text-->
                                <span>
                                    <span class="text-gray-800 fw-bold">40+</span>
                                    Mentees
                                </span>
                            </div>
                            @if(isset($partner['country']) && $partner['country'])
                            <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                <!--icon-->
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" class="bi bi-geo-alt-fill text-danger" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6">
                                        </path>
                                    </svg>
                                </span>
                                <!--text-->
                                <span>{{$partner['country']}}</span>
                            </div>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @if(isset($partner['skills']) && $partner['skills'])
    <!--card-->
    <div class="card">
        <!--card body-->
        <div class="card-body p-md-5 d-flex flex-column gap-3">
            <div class="d-flex flex-column gap-2">
                <!--heading-->
                <h3 class="mb-0">Skills</h3>

                <div class="gap-2 d-flex flex-wrap">
                    @php
                        $skills = explode(',', $partner['skills']);
                    @endphp
                    @foreach($skills as $skill)
                    <a href="#!"
                        style="text-decoration: none; padding: 6px 12px; border-radius: 20px;
                        color: #6c757d; border: 1px solid #dee2e6; font-size: 14px;">
                        {{trim($skill)}}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif


    <!--card-->
    <div class="card">
        <!--card body-->
        <div class="card-body p-md-5 d-flex flex-column gap-3">
            <!--heading-->
            <h3 class="mb-0">{{ $partner['title'] }}</h3>
            <div class="d-flex flex-column">
                <!--para-->
                <p class="mb-1">
                    {{ $partner['subtitle'] }}
                </p>
                <div class="collapse" id="collapseAbout">
                    <p class="my-3">
                        {{ $partner['description'] }}
                    </p>
                </div>
                <div>
                    <a class="btn-link" data-bs-toggle="collapse" href="#collapseAbout" role="button"
                        aria-expanded="false" aria-controls="collapseAbout">더보기</a>
                </div>
            </div>
        </div>
    </div>


</div>
