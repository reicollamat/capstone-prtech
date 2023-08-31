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
            <strong class="text-dark mr-3">RPM:</strong>
        </td>
        <td>
            @if ($product->rpm === null)
                None
            @else
                @if (is_array($product->rpm) && count($product->rpm) > 1)
                    {{ min($product->rpm) }} - {{ max($product->rpm) }} RPM
                @else
                    {{ $product->rpm }} RPM
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Noise Level:</strong>
        </td>
        <td>
            @if ($product->noise_level === null)
                None
            @else
                @if (is_array($product->noise_level) && count($product->noise_level) > 1)
                    {{ min($product->noise_level) }} - {{ max($product->noise_level) }} dB
                @else
                    {{ $product->noise_level }} dB
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
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Size:</strong>
        </td>
        <td>
            @if ($product->size === null)
                None
            @else
                {{ $product->size }} mm
            @endif
        </td>
    </tr>
</table>