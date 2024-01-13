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
            <strong class="text-dark mr-3">PSU:</strong>
        </td>
        <td>
            @if ($categoryproduct->psu === null)
                None
            @else
                {{ $categoryproduct->psu }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Side Panel:</strong>
        </td>
        <td>
            @if ($categoryproduct->sidepanel === null)
                None
            @else
                {{ $categoryproduct->sidepanel }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">External 5.25" Bays:</strong>
        </td>
        <td>
            @if ($categoryproduct->external_525_bays === null)
                None
            @else
                {{ $categoryproduct->external_525_bays }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Internal 3.5" Bays:</strong>
        </td>
        <td>
            @if ($categoryproduct->internal_35_bays === null)
                None
            @else
                {{ $categoryproduct->internal_35_bays }}
            @endif
        </td>
    </tr>
</table>
