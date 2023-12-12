<div class="d-flex justify-content-between mb-2">
    <h5>Return/Refund Items:</h5>
    <a href="{{route('profile.edit', ['is_mypurchase' => 1])}}" class="btn bg-primary text-light p-2 rounded mt-0">
        <i class="bi bi-arrow-clockwise">Refresh</i>
    </a>
</div>

<div class="card text-center">
    <div class="card-header">
        <div class="row mx-4 mb-2 align-items-center text-center">
            <div class="col-1 p-0">
                Reference#
            </div>
            <div class="col-2 p-0">
                Shop
            </div>
            <div class="col-3 p-0">
                Product
            </div>
            <div class="col-3 p-0">
                Status
            </div>
            <div class="col-2 p-0">
                Agreement
            </div>
            <div class="col-1 p-0">
                Details
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="accordion accordion-flush" id="accordionFlush">
            <div class="accordion-item border">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed d-block py-2" id="trackAccordion"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-id" aria-expanded="false"
                        aria-controls="collapse-id">
                        <div class="row mx-1 mb-2 align-items-center text-center">
                            <div class="col-1 p-0">
                                1312321#
                            </div>
                            <div class="col-2 p-0">
                                sfsffewf
                            </div>
                            <div class="col-3 p-0">
                                fwefewgreggsd
                            </div>
                            <div class="col-3 p-0">
                                Stfewfatus
                            </div>
                            <div class="col-2 p-0">
                                fergfegr
                            </div>
                            <div class="col-1 p-0">
                                regregergre
                            </div>
                            <i class="bi bi-chevron-compact-down text-primary"></i>
                        </div>
                    </button>
                </h2>
            </div> {{-- accordion header --}}

            <div id="collapse-id" class="accordion-collapse collapse"
                data-bs-parent="#accordionFlush">
                <div class="accordion-body bg-secondary-subtle p-2">
                    test
                </div> {{-- accordion items --}}
            </div>
        </div>{{-- accordionFlush --}}
    </div>
    <div class="card-footer text-body-secondary">
        2 days ago
    </div>
</div>
