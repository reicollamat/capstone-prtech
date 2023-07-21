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
            <strong class="text-light mr-3">Type:</strong>
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
            <strong class="text-light mr-3">PSU:</strong>
        </td>
        <td>
            @if ($product->psu === null)
                None
            @else
                {{ $product->psu }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Side Panel:</strong>
        </td>
        <td>
            @if ($product->sidepanel === null)
                None
            @else
                {{ $product->sidepanel }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">External 5.25" Bays:</strong>
        </td>
        <td>
            @if ($product->external_525_bays === null)
                None
            @else
                {{ $product->external_525_bays }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Internal 3.5" Bays:</strong>
        </td>
        <td>
            @if ($product->internal_35_bays === null)
                None
            @else
                {{ $product->internal_35_bays }}
            @endif
        </td>
    </tr>
</table>