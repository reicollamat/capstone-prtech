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
            <strong class="text-dark mr-3">Efficiency:</strong>
        </td>
        <td>
            @if ($product->efficiency === null)
                None
            @else
                +80 {{ $product->efficiency }}
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
            <strong class="text-dark mr-3">Modular:</strong>
        </td>
        <td>
            @if ($product->modular === null)
                None
            @else
                {{ $product->modular }}
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