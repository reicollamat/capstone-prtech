<table class="details d-flex mb-4">
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Sold:</strong>
        </td>
        <td>
            {{ $categoryproduct->purchase_count }}
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Status:</strong>
        </td>
        <td>
            @if ($categoryproduct->status === null)
                None
            @else
                {{ $categoryproduct->status }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Condition:</strong>
        </td>
        <td>
            @if ($categoryproduct->condition === null)
                None
            @else
                {{ $categoryproduct->condition }}
            @endif
        </td>
    </tr>

    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Configuration:</strong>
        </td>
        <td>
            @if ($categoryproduct->configuration === null)
                None
            @else
                {{ $categoryproduct->configuration }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Wattage:</strong>
        </td>
        <td>
            @if ($categoryproduct->wattage === null)
                None
            @else
                {{ $categoryproduct->wattage }} W
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Frequency response:</strong>
        </td>
        <td>
            @if ($categoryproduct->frequency_response === null)
                None
            @else
                @if (is_array($categoryproduct->noise_level) && count($categoryproduct->noise_level) > 1)
                    {{ min($categoryproduct->noise_level) }} Hz - {{ max($categoryproduct->noise_level) }} kHz
                @else
                    {{ $categoryproduct->noise_level }} kHz
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Color:</strong>
        </td>
        <td>
            @if ($categoryproduct->color === null)
                None
            @else
                {{ $categoryproduct->color }}
            @endif
        </td>
    </tr>
</table>
