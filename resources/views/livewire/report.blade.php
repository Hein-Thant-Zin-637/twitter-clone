<div>
    <button type="button" onclick="event.preventDefault()"  data-toggle="modal" data-target="#reportModal{{ $post->id }}"
        class="bg-white border-0 d-flex align-items-center div-info-more-item dropdown-item">
        <div>
            <img src="/svg/report.svg" alt="" style="width: 23px; height: 23px;">
        </div>
        <div class="ml-2"><span>Report Post</span></div>
    </button>

    <div class="modal fade" id="reportModal{{ $post->id }}" tabindex="-1" aria-labelledby="reportModallable"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div>
                    <button type="button" class="close float-start fs-3 m-3 mb-0" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submitReport">
                        @csrf
                        <div class="row">
                            <div class="info_author_photo p-1 col-1">
                                <img src="{{ asset(auth()->user()->profile ?? 'profile_default_image.jpg') }}"
                                    alt="..." style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                            </div>
                            <div class="mb-3 col-11">
                                <textarea wire:model="message" class="description form-control shadow-none border-0" rows="5"
                                    placeholder="Post your replay"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill float-end"
                            style="font-weight: bold; width: 80px">Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
