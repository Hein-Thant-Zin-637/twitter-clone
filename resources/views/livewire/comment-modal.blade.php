<div>
    <button type="button" onclick="event.preventDefault()" data-toggle="modal" data-target="#commentModal{{ $post->id }}"
        class="bg-white border-0 text-dark text-decoration-none d-flex align-items-center gap-2">
        <img src="/svg/comment.svg" alt="" style="width: 23px; height: 23px;">
        <span>{{ $count }}</span>
    </button>

    <div class="modal fade" id="commentModal{{ $post->id }}" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div>
                    <button type="button" class="close float-start fs-3 m-3 mb-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  
                    <livewire:comment :post="$post" />
                </div>
            </div>
        </div>
    </div>
</div>