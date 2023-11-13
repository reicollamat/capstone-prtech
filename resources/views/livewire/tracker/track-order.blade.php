<div x-transition.duration.500ms>
    <div class="d-flex justify-center my-4" x-transition.duration.500ms>
        <form action="#">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label w-full text-center">Order Number</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="xxx-xxx-xxx">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label w-full text-center">Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="example@gmail.com">
            </div>
            <div class="d-flex justify-center mt-4">
                <div class="w-full">
                    <button class="flex w-full no-underline decoration-0 text-black" type="button"
                        wire:click.prevent="track">
                        <span
                            class="lg:!h-12 w-full  h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-6 border border-black hover:bg-gray-800 hover:text-white transition duration-500 ease-in-out">
                            Track Order
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="my-4 px-24">
        <div wire:loading wire:target="track" class="w-full">
            <hr>
            <div class="d-flex flex-column justify-center gap-3">
                <p class="text-center">Tracking, Please wait a moment.</p>
                <div class="w-full h-full d-flex justify-center items-center x-transition" x-transition.duration.500ms>
                    <div class="spinner-grow" style="width: 2rem; height: 2rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
