<div>
    <!--row-->
    <div class="row g-4">

        {{-- <div class="col-12">
            <div class="d-flex flex-md-row gap-2 flex-column justify-content-between">
                <!--form-->
                <form>
                    <label for="mentorInputSearch" class="form-label visually-hidden">Search</label>
                    <input type="search" class="form-control" id="mentorInputSearch"
                        placeholder="Search by company, skills or role">
                </form>
                <div class="d-grid d-md-flex">
                    <a href="mentor-list.html" class="btn btn-primary">Explore all mentors</a>
                </div>
            </div>
        </div> --}}

        @foreach ($partners as $partner)
        <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
            <!--card-->
            <div class="card rounded-4 card-bordered card-lift">
                <div class="p-3 d-flex flex-column gap-3">
                    <div class="position-relative">
                        <!--img-->
                        <a href="/partner/{{$partner->id}}">
                            @if($partner->image)
                                <img src="{{ $partner->image }}" alt="partner"
                                    class="img-fluid w-100 rounded-4">
                            @else
                                <div class="bg-secondary w-100 rounded-4" style="aspect-ratio: 16/9"></div>
                            @endif
                        </a>
                        @php
                            $created = new Carbon\Carbon($partner->created_at);
                            $now = Carbon\Carbon::now();
                            $diffDays = $created->diffInDays($now);
                        @endphp
                        @if($diffDays <= 30)
                        <div class="position-absolute bottom-0 left-0 p-3">
                            <span class="badge text-bg-success">New Partner</span>
                        </div>
                        @endif
                    </div>
                    <!--content-->
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex flex-column gap-2">
                            <div>
                                <div class="d-flex align-items-center gap-2">
                                    <h3 class="mb-0">
                                        <a href="/partner/{{$partner->id}}"
                                            class="text-reset">{{$partner->name}}</a>
                                        </h3>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <span class="text-gray-800">{{$partner->position}}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between fs-6">
                                <div>
                                    @if($partner->company)
                                        <span>@ {{$partner->company}}</span>
                                    @endif

                                    @if($partner->career)
                                        <div class="vr mx-2 text-gray-200"></div>
                                        <span>{{$partner->career}} yrs Exp.</span>
                                    @endif
                                </div>
                                <div class="d-flex gap-1 align-items-center lh-1">
                                    @if($partner->star)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            fill="currentColor" class="bi bi-star-fill text-warning"
                                            viewBox="0 0 16 16">
                                            <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                        </path>
                                        </svg>
                                        <span class="fw-bold text-dark">{{$partner->star}}</span>
                                    @endif

                                    @if($partner->reviews)
                                        <span>(0 Reviews)</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div>
                                @if($partner->price_time)
                                    <span>시작가격</span>
                                    <div class="d-flex flex-row gap-1 align-items-center">
                                        <h4 class="mb-0">${{$partner->price_time}}</h4>
                                        <span style="font-size: 12px">/ Time</span>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <a href="#!" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                    data-bs-target="#signupModal">의뢰문의</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- 페이지네이션 -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div>
            전체 {{$partners->total()}}명의 파트너
        </div>
        <div>
            {{ $partners->onEachSide(2)->links('pagination::bootstrap-4') }}
        </div>
        <div>
            <a href="/partner/join" class="btn btn-primary">파트너 등록</a>
        </div>
    </div>


</div>
