<div>
    <div class="mt-5 d-flex flex-column-reverse mb-4 chat-body">
        @foreach ($messages as $message)
                @if ($message->sender_id == auth()->user()->id)
                    @if ($message->media_id != null)
                    <div class="d-inline-flex justify-content-end pe-3 chat-time">{{ $message->time($message->id) }}</div>
                    <div class="d-inline-flex justify-content-end p-2">
                        <div class="d-flex flex-column">
                            <img width="300px" height="300px" class="rounded" src="{{ "/storage/" . $message->media->media }}" alt="image">
                            <div class="d-inline-flex justify-content-end pt-1">
                                @if ($message->message != null)
                                    <div class="bg-primary fs-6 text-white p-2 sender-radius">{{ $message->message }}</div>
                                @endif
                            </div>     
                        </div>
                    </div>
                    @else
                        <div class="d-inline-flex justify-content-end pe-3 chat-time">{{ $message->time($message->id) }}</div>
                        <div class="d-inline-flex justify-content-end p-2">
                            <span class="bg-primary fs-6 text-white p-2 sender-radius">{{ $message->message }}</span>
                        </div>
                    @endif
                @else
                    @if ($message->media_id != null)
                    <div class="d-inline-flex justify-content-start ps-3 chat-time">{{ $message->time($message->id) }}</div>
                        <div class="d-inline-flex justify-content-start p-2">
                            <div class="d-flex">
                                <div class="d-flex flex-column">
                                    <img width="300px" height="300px" class="rounded" src="{{ "/storage/" . $message->media->media }}" alt="image">
                                    <div class="d-inline-flex justify-content-start pt-1">
                                        @if ($message->message != null)
                                            <div class="bg-light fs-6 p-2 receiver-radius">{{ $message->message }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="dropdown chat-select-menu ms-1">
                                    <button class="btn btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $message->id }}">Report Message</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Report Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="ReportMessage({{ $message->id }}, {{ $message->sender_id }})" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="info_author_photo p-1 col-1">
                                                
                                                <img src=" {{auth()->user()->profile ?? '/profile_default_image.jpg'}}" alt="..."
                                                    style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                                            </div>
                                            <div class="mb-3 col-11">
                                                <textarea wire:model="description" class="description form-control shadow-none border-0" rows="5"
                                                    placeholder="Description"></textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary rounded-pill"
                                                    style="font-weight: bold; width: 80px">Report</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    @else
                        <div class="d-inline-flex justify-content-start ps-3 chat-time">{{ $message->time($message->id) }}</div>
                        <div class="d-inline-flex justify-content-start p-2">
                            <span class="bg-light fs-6 p-2 receiver-radius">{{ $message->message }}</span>
                            <div class="dropdown chat-select-menu ms-1">
                                <button class="btn btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $message->id }}">Report Message</button></li>
                                </ul>
                            </div>
                        </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Report Form</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="ReportMessage({{ $message->id }}, {{ $message->sender_id }})" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="info_author_photo p-1 col-1">
                                                    
                                                    <img src=" {{auth()->user()->profile ?? '/profile_default_image.jpg'}}" alt="..."
                                                        style="width:3rem;height:3rem" class="mr-3 rounded-circle">
                                                </div>
                                                <div class="mb-3 col-11">
                                                    <textarea wire:model="description" class="description form-control shadow-none border-0" rows="5"
                                                        placeholder="Description"></textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary rounded-pill"
                                                        style="font-weight: bold; width: 80px">Report</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                    @endif
                @endif  
        @endforeach
        <div class="text-center mt-4">
            <img class="rounded-circle small-profile ms-1" src="https://static.wikia.nocookie.net/aesthetics/images/a/a3/Pure_blue.png/revision/latest/thumbnail/width/360/height/450?cb=20210323184329" alt="...">
            <h4>{{ $reciever->name }}</h4>
        </div>
    </div>
    
    <div class="d-flex justify-content-between fixed-bottom chat-foot border-top pt-1 pb-1 bg-light fs-5">    
        <form wire:submit.prevent="save" enctype="multipart/form-data" class="d-flex">
            @csrf
            @if ($image)
                <div class="d-flex flex-column">
                    <div class="position-relative">
                        <div class="position-absolute">
                            <button type="button" wire:click="resetImage" class="border-0 btn btn-light fs-6 rounded-circle"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <img width="140px" height="130px" src="{{ $image->temporaryUrl() }}" alt="">
                    </div>
                    <div class="p-1">
                        <input type="text" wire:model="message" name="text" class="chat-text2 form-control shadow-none border-0 bg-light" placeholder="Start a new message">
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button {{ $hasMessage ? 'disabled' : "" }} type="submit" class="border-0 btn btn-light fs-5"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
            @else
                <div>
                    <label for="file-input1" class="fs-5 btn btn-light mb-0"><i class="fa-solid fa-image"></i></label>
                    <input id="file-input1" wire:model="image" name="media" hidden type="file">
                </div>
                {{-- <div>
                    <label for="file-input2" id="emoji_picker" class="fs-5 btn btn-light mb-0"><i class="fa-solid fa-face-smile"></i></label>
                    <input id="file-input2" hidden type="file">  
                </div> --}}
                <div class="p-1">
                    <input type="text" wire:model.live="message" name="text" class="chat-text form-control shadow-none border-0 bg-light" placeholder="Start a new message">
                </div>
                <div>
                    <button {{ $hasMessage ? 'disabled' : "" }} type="submit" class="border-0 btn btn-light fs-5"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
            @endif
        </form>
    </div>

</div>

