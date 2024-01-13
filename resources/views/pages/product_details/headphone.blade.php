<table class="details d-flex mb-4">
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Sold:</strong>
        </td>
        <td>
            {{ $categoryproduct->product->purchase_count}}
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
            <strong class="text-dark mr-3">Type:</strong>
        </td>
        <td>
            @if ($categoryproduct->type === null)
                None
            @else
                {{ $categoryproduct->type }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Frequency Response:</strong>
        </td>
        <td>
            @if ($categoryproduct->frequency_response === null)
                None
            @else
                @if (is_array($categoryproduct->frequency_response) && count($categoryproduct->frequency_response) > 1)
                    {{ min($categoryproduct->frequency_response) }} Hz - {{ max($categoryproduct->frequency_response) }} kHz
                @else
                    {{ $categoryproduct->frequency_response }} kHz
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Microphone:</strong>
        </td>
        <td>
            @if ($categoryproduct->microphone === null)
                None
            @else
                @if ($categoryproduct->microphone === 1)
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
            @if ($categoryproduct->wireless === null)
                None
            @else
                @if ($categoryproduct->wireless === 1)
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
            @if ($categoryproduct->enclosure_type === null)
                None
            @else
                {{ $categoryproduct->enclosure_type }}
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