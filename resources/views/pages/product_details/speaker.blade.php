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
            <strong class="text-dark mr-3">Configuration:</strong>
        </td>
        <td>
            @if ($product->configuration === null)
                None
            @else
                {{ $product->configuration }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Wattage:</strong>
        </td>
        <td>
            @if ($product->wattage === null)
                None
            @else
                {{ $product->wattage }} W
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Frequency response:</strong>
        </td>
        <td>
            @if ($product->frequency_response === null)
                None
            @else
                @if (is_array($product->noise_level) && count($product->noise_level) > 1)
                    {{ min($product->noise_level) }} Hz - {{ max($product->noise_level) }} kHz
                @else
                    {{ $product->noise_level }} kHz
                @endif
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