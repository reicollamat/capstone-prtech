<div>
    <div>
        <button wire:click="test">
            Start
        </button>
    </div>

    @if($loading)
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    @else
         <div class="row justify-content-center w-1/2">
                  <iframe src="{{ asset('sales.pdf') }}" width="50%" height="600"  id="myPdfIframe">
                      This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('sales.pdf') }}">Download PDF</a>
                  </iframe>
         </div>
        @endif


</div>

@script
<script>
    counter  = 0;

    Livewire.on('reload-iframe', () => {
        console.log('reload iframe');
        var iframe = document.getElementById("myPdfIframe");
        var doc = iframe.contentDocument || iframe.contentWindow;
        doc.location.reload(true);
    });
</script>
@endscript
