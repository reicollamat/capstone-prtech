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
            <strong class="text-dark mr-3">Chipset:</strong>
        </td>
        <td>
            @if ($categoryproduct->chipset === null)
                None
            @else
                {{ $categoryproduct->chipset }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Memory:</strong>
        </td>
        <td>
            @if ($categoryproduct->memory === null)
                None
            @else
                {{ $categoryproduct->memory }} GB
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Core Clock:</strong>
        </td>
        <td>
            @if ($categoryproduct->core_clock === null)
                None
            @else
                {{ $categoryproduct->core_clock }} MHz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Boost Clock:</strong>
        </td>
        <td>
            @if ($categoryproduct->boost_clock === null)
                None
            @else
                {{ $categoryproduct->boost_clock }} MHz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Length:</strong>
        </td>
        <td>
            @if ($categoryproduct->length === null)
                None
            @else
                {{ $categoryproduct->length }} mm
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
