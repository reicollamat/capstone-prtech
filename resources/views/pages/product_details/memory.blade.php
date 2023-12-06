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
            <strong class="text-dark mr-3">Speed:</strong>
        </td>
        <td>
            @if ($categoryproduct->speed === null)
                None
            @else
                @if (is_array($categoryproduct->speed) && count($categoryproduct->speed) > 1)
                    DDR{{ min($categoryproduct->speed) }} - {{ max($categoryproduct->speed) }}
                @else
                    DDR{{ $categoryproduct->speed }}
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Modules:</strong>
        </td>
        <td>
            @if ($categoryproduct->modules === null)
                None
            @else
                @if (is_array($categoryproduct->modules) && count($categoryproduct->modules) > 1)
                    {{ min($categoryproduct->modules) }} x {{ max($categoryproduct->modules) }}GB
                @else
                    {{ $categoryproduct->modules }}GB
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Price per GB:</strong>
        </td>
        <td>
            @if ($categoryproduct->price_per_gb === null)
                None
            @else
                {{ $categoryproduct->price_per_gb }}
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
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">First Word Latency:</strong>
        </td>
        <td>
            @if ($categoryproduct->first_word_latency === null)
                None
            @else
                {{ $categoryproduct->first_word_latency }} ns
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">CAS Latency:</strong>
        </td>
        <td>
            @if ($categoryproduct->cas_latency === null)
                None
            @else
                {{ $categoryproduct->cas_latency }}
            @endif
        </td>
    </tr>
</table>
