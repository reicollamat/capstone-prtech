<table class="details d-flex mb-4">
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Sold:</strong>
        </td>
        <td>
            {{ $product->purchase_count }}
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Status:</strong>
        </td>
        <td>
            @if ($product->status === null)
                None
            @else
                {{ $product->status }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Condition:</strong>
        </td>
        <td>
            @if ($product->condition === null)
                None
            @else
                {{ $product->condition }}
            @endif
        </td>
    </tr>

    
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Speed:</strong>
        </td>
        <td>
            @if ($product->speed === null)
                None
            @else
                @if (is_array($product->speed) && count($product->speed) > 1)
                    DDR{{ min($product->speed) }} - {{ max($product->speed) }}
                @else
                    DDR{{ $product->speed }}
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Modules:</strong>
        </td>
        <td>
            @if ($product->modules === null)
                None
            @else
                @if (is_array($product->modules) && count($product->modules) > 1)
                    {{ min($product->modules) }} x {{ max($product->modules) }}GB
                @else
                    {{ $product->modules }}GB
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Price per GB:</strong>
        </td>
        <td>
            @if ($product->price_per_gb === null)
                None
            @else
                {{ $product->price_per_gb }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Color:</strong>
        </td>
        <td>
            @if ($product->color === null)
                None
            @else
                {{ $product->color }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">First Word Latency:</strong>
        </td>
        <td>
            @if ($product->first_word_latency === null)
                None
            @else
                {{ $product->first_word_latency }} ns
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">CAS Latency:</strong>
        </td>
        <td>
            @if ($product->cas_latency === null)
                None
            @else
                {{ $product->cas_latency }}
            @endif
        </td>
    </tr>
</table>