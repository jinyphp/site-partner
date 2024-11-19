<div>
    <div class="mb-3">
        <label class="form-label">파트너 유형</label>
        {!! xSelect()
            ->table('site_partner_type','title')
            ->setWire('model.defer',"forms.type")
            ->setWidth("medium")
        !!}
    </div>

    <div class="col-md-6 position-relative">
        <label for="title" class="form-label">제목 *</label>
        <input type="title" class="form-control"
            wire:model="forms.title"
            id="title" required
            placeholder="파트너 소개 제목을 입력해 주세요">
    </div>

    <div class="mb-3">
        <label class="form-label">내용</label>
        <textarea class="form-control" placeholder="설명 내용을 입력해 주세요" rows="20"
            wire:model="forms.description">
        </textarea>
    </div>

    <div class="d-flex justify-content-center">
        <button class="btn btn-primary" wire:click="store">제출</button>
    </div>

</div>
