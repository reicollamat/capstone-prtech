<div x-transition.duration.500ms>
    <div class="d-flex justify-center my-4" x-transition.duration.500ms>
        <form action="#">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label w-full text-center">Order Number</label>
                <input type="text" class="form-control" id="formGroupExampleInput"
                       placeholder="xxx-xxx-xxx">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label w-full text-center">Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput2"
                       placeholder="example@gmail.com">
            </div>
            <div class="d-flex justify-center mt-4">
                <button type="button" class="btn btn-outline-dark hover:bg-white hover:text-black"
                        wire:click.prevent="track">
                    Track
                </button>
            </div>
        </form>
    </div>
    <div class="my-4 px-24">
        <div wire:loading wire:target="track" class="w-full">
            <hr>
            <div class="d-flex flex-column justify-center gap-3">
                <div class="w-full h-full d-flex justify-center items-center x-transition" x-transition.duration.500ms>
                    <div class="spinner-grow" style="width: 2rem; height: 2rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <p class="text-center"> Tracking Order...</p>
            </div>
        </div>


    </div>
</div>
