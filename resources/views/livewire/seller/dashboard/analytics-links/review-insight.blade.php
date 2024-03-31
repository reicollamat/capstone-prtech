<div>
    <div class="container-fluid p-4">
        <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white">Review Insight</h5>

        <div class="grid xl:grid-cols-1 gap-3">
            <div class="h-full p-3 border border-gray-200 bg-white rounded-lg">
                <div class="p-2 mb-2 border-b border-gray-200 bg-white flex items-center gap-3">
                    <h6 class="uppercase mb-0 text-sm text-nowrap font-semibold text-gray-700">Filter :</h6>
                    <div class="w-full flex justify-between">
                        <div class="flex gap-3">
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $category != null ? \App\Helpers\CustomHelper::maptopropercatetory($category) : 'Select Category' }}
                                </button>
                                <ul class="dropdown-menu !pl-0">
                                    @foreach (\App\Helpers\CustomHelper::categoryList() as $category => $value)
                                        <li>
                                            <button type="button" wire:click="categoryChange('{{ $category }}')"
                                                class="dropdown-item" href="#">{{ $value }}
                                            </button>
                                        </li>
                                    @endforeach
                                    {{-- <li> --}}
                                    {{--     <button type="button" wire:click="$set('summary', 'Yearly')" class="dropdown-item" --}}
                                    {{--         href="#">Yearly --}}
                                    {{--     </button> --}}
                                    {{-- </li> --}}
                                </ul>
                            </div>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $sentiment != null ? $sentiment . ' Sentiment' : 'Select Sentiment' }}
                                </button>
                                <ul class="dropdown-menu !pl-0">
                                    <li>
                                        <button type="button" wire:click="sentimentChange('Positive')"
                                            class="dropdown-item" href="#">Positive
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" wire:click="sentimentChange('Negative')"
                                            class="dropdown-item" href="#">Negative
                                        </button>
                                    </li>
                                    {{-- <li> --}}
                                    {{--     <button type="button" wire:click="$set('summary', 'Yearly')" class="dropdown-item" --}}
                                    {{--         href="#">Yearly --}}
                                    {{--     </button> --}}
                                    {{-- </li> --}}
                                </ul>
                            </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-outline-secondary" wire:click="resetFilter">
                            reset
                        </button>
                    </div>

                </div>
                <table class="w-full table-auto">
                    <thead class="border-bottom border-gray-400">
                        <tr class="p-2">
                            <th>
                                {{-- <form action="#" class="d-flex" role="search"> --}}
                                {{--     <input class="form-control !border-none !rounded-none" type="text" --}}
                                {{--            wire:model="search" --}}
                                {{--         placeholder="Search Product" aria-label="Search Product"> --}}
                                {{-- </form> --}}
                                <div class="input-group">
                                    <span class="input-group-text !border-none bg-transparent">
                                        <i class="bi bi-search text-sm"></i>
                                    </span>
                                    <input class="form-control !border-none !rounded-none" type="text"
                                        wire:model.live.debounce.500ms="search" placeholder="Start Search on Reviews"
                                        aria-label="Search Product">
                                </div>

                            </th>
                            <th class="text-gray-700 text-sm">Categrory</th>
                            <th class="text-gray-700 text-sm">Sentiment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($this->getReviews->count() > 0)
                            @foreach ($this->getReviews as $review)
                                <tr class="my-2 border-b border-gray-200">
                                    <td class="text-sm truncate text-pretty p-1.5">{{ $review->text }}</td>
                                    <td class="text-xs p-1">
                                        <span
                                            class="bg-info-subtle text-blue-700 text-center text-nowrap text-xs font-medium px-3 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                            {{ CustomHelper::maptopropercatetory($review->product->category) }}
                                        </span>
                                        {{--                                        {{ CustomHelper::maptopropercatetory($review->product->category) }} --}}
                                    </td>
                                    <td class="text-sm p-1">
                                        {{--                                        {{ $review->sentiment === 1 ? 'Positive' : 'Negative' }} --}}
                                        @if ($review->sentiment === 1)
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium px-3 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Positive</span>
                                        @elseif($review->sentiment === 0)
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium px-3 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Negative</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{--                @foreach ($this->getReviews as $review) --}}
                {{--                    {{ $review->text }} --}}
                {{--                @endforeach --}}

                <div class="content-center pt-3">
                    {{ $this->getReviews()->links() }}
                </div>

            </div>
            <div class="p-3 border border-gray-200 bg-white rounded-lg">
                <div class="p-2 mb-2 border-b border-gray-200 bg-white flex items-center gap-3">
                    <h6 class="uppercase mb-0 text-sm text-nowrap font-semibold text-gray-700">Configure Stopwords:</h6>
                    <div class="w-full flex justify-between">
                        <div class="flex gap-3">

                        </div>

                        {{-- <button type="button" class="btn btn-sm btn-outline-success"> --}}
                        {{--     Stopwords Menu --}}
                        {{-- </button> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Stopwords Menu
                        </button>

                        <!-- Modal -->
                        <div class="modal modal-lg fade" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">User Stopwords</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Have you ever looked at a word cloud generated from your product descriptions
                                            and felt it lacked focus? Stop words might be the culprit! Stop words are
                                            common words like "the," "a," "an," and "is" that don&apos;t hold much
                                            meaning on
                                            their own. While they're essential for grammar, they can clutter your word
                                            cloud, obscuring the keywords that truly define your products.</p>
                                        <p class="font-semibold">
                                            To begin customizing your stop words, simply type the words you'd like to
                                            add.
                                            Each word should be separated by a space. When you're done, click "Save
                                            Changes".
                                        </p>
                                        <textarea wire:model.blur="user_stopwords" class="form-control" aria-label="With textarea"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary" wire:click="updateAllCharts">
                                            <div class="flex justify-center items-center gap-2">
                                                <div wire:loading wire:target="updateAllCharts">
                                                    <div class="spinner-border spinner-border-sm" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                                <span>Save Changes</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <h6 class="uppercase mb-2 text-sm font-semibold text-gray-700">Reviews Word Cloud</h6>
                    <hr class="m-0 w-16 text-green-900">
                    <div class="grid grid-cols-2 gap-2 pt-1.5">
                        <div>
                            <h6 class="uppercase my-2 text-xs font-semibold text-gray-500">Click to enlarge positive
                                reviews.</h6>
                            <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false"
                                wire:init="fetchPositiveCommentsApi">
                                <button class="w-full h-full" type="button" @click="showModal = !showModal">
                                    <div wire:loading wire:target="fetchPositiveCommentsApi"
                                        class="relative w-full h-72">
                                        <div role="status"
                                            class="flex gap-2.5 flex-column items-center justify-center h-full w-full bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">

                                            <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 16 20">
                                                <path
                                                    d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                                <path
                                                    d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" />
                                            </svg>
                                            <span class="text-center">Please Wait...</span>
                                        </div>
                                    </div>
                                    <div wire:loading.remove wire:target="fetchPositiveCommentsApi">
                                        <img src="{{ asset($p_asset) }}"
                                            class="img-fluid img-thumbnail rounded-start border-0 self-center"
                                            alt="">
                                    </div>
                                </button>

                                <div x-cloak x-transition.opacity x-show="showModal"
                                    class="fixed z-1 inset-0 bg-black/50" wire:loading.remove
                                    wire:target="fetchPositiveCommentsApi">
                                </div>

                                <div x-cloak x-transition.duration.500ms x-show="showModal"
                                    class="fixed inset-0 z-50 grid place-content-center">
                                    <div @click.away="showModal = false"
                                        class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Positive
                                                        Reviews
                                                        Wordcloud</h1>

                                                </div>
                                                <div class="flex justify-center modal-body" x-transition.opacity>
                                                    <img src="{{ asset($p_asset) }}"
                                                        class="img-fluid img-thumbnail rounded-start border-0 self-center"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full flex gap-2 pt-3 justify-end">
                                            <button type="button" class="btn btn-outline-secondary"
                                                @click="showModal = false">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h6 class="uppercase my-2 text-xs font-semibold text-gray-500">Click to enlarge negative
                                reviews.</h6>
                            <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false"
                                wire:init="fetchNegativeCommentsApi">
                                <button type="button" @click="showModal = !showModal" class="w-full ">
                                    <div wire:loading wire:target="fetchNegativeCommentsApi"
                                        class="relative w-full h-72 flex items-center justify-center">
                                        <div role="status"
                                            class="flex gap-2.5 flex-column items-center  justify-center h-full w-full bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
                                            <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 16 20">
                                                <path
                                                    d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                                <path
                                                    d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" />
                                            </svg>
                                            <span class="text-center">Please Wait...</span>
                                        </div>
                                    </div>
                                    <div wire:loading.remove wire:target="fetchNegativeCommentsApi">
                                        <img src="{{ asset($n_asset) }}"
                                            class="img-fluid img-thumbnail rounded-start border-0 self-center"
                                            alt="">
                                    </div>
                                </button>

                                <div x-cloak x-transition.opacity x-show="showModal"
                                    class="fixed z-1 inset-0 bg-black/50" wire:loading.remove
                                    wire:target="fetchNegativeCommentsApi">
                                </div>

                                <div x-cloak x-transition.duration.500ms x-show="showModal"
                                    class="fixed inset-0 z-50 grid place-content-center" wire:loading.remove
                                    wire:target="fetchNegativeCommentsApi">
                                    <div @click.away="showModal = false"
                                        class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Negative
                                                        Reviews
                                                        Wordcloud</h1>

                                                </div>
                                                <div class="flex justify-center modal-body" x-transition.opacity>
                                                    <img src="{{ asset($n_asset) }}"
                                                        class="img-fluid img-thumbnail rounded-start border-0 self-center"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full flex gap-2 pt-3 justify-end">
                                            <button type="button" class="btn btn-outline-secondary"
                                                @click="showModal = false">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 h-50">
                    <h6 class="uppercase mb-2 text-sm font-semibold text-gray-700">Reviews Word Cloud</h6>
                    <div class="relative h-100">
                        <div class="h-100">
                            <canvas id="commentsChart" width="400" height="400" wire:ignore>
                                Your browser does not support the HTML canvas tag.
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        let ctx = document.getElementById('commentsChart');

        let labels = {!! json_encode(array_keys($commentsCount)) !!};
        let data = {!! json_encode(array_values($commentsCount)) !!};

        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Word Count',
                    data: data,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                indexAxis: 'y',
                // Element options apply to all the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                    bar: {
                        borderWidth: 4,
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Comments Insight',
                    }
                }
            },
        });

        Livewire.on('updateCommentsChart', (newCommentsCount) => {
            console.log('Previous comments count:', labels, data);

            let newdata = $wire.commentsCount;

            const keysArray = Object.keys(newdata);
            const valuesArray = Object.values(newdata);

            myChart.data.labels = keysArray;
            myChart.data.datasets[0].data = valuesArray;

            console.log(myChart.data.labels);
            console.log('fired from livewire.on');

            console.log(keysArray, valuesArray)

            myChart.update();
        });
    </script>
@endscript
