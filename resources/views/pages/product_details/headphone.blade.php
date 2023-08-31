<table class="details d-flex mb-4">
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Sold:</strong>
        </td>
        <td>
            {{ $product->purchase_count }}
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Status:</strong>
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
            <strong class="text-dark mr-3">Condition:</strong>
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
            <strong class="text-dark mr-3">Type:</strong>
        </td>
        <td>
            @if ($product->type === null)
                None
            @else
                {{ $product->type }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Frequency Response:</strong>
        </td>
        <td>
            @if ($product->frequency_response === null)
                None
            @else
                @if (is_array($product->frequency_response) && count($product->frequency_response) > 1)
                    {{ min($product->frequency_response) }} Hz - {{ max($product->frequency_response) }} kHz
                @else
                    {{ $product->frequency_response }} kHz
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Microphone:</strong>
        </td>
        <td>
            @if ($product->microphone === null)
                None
            @else
                @if ($product->microphone === 1)
                    Yes
                @else
                    No
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Wireless:</strong>
        </td>
        <td>
            @if ($product->wireless === null)
                None
            @else
                @if ($product->wireless === 1)
                    Yes
                @else
                    No
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Enclosure type:</strong>
        </td>
        <td>
            @if ($product->enclosure_type === null)
                None
            @else
                {{ $product->enclosure_type }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Color:</strong>
        </td>
        <td>
            @if ($product->color === null)
                None
            @else
                {{ $product->color }}
            @endif
        </td>
    </tr>
</table>