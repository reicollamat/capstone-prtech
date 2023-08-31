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
            <strong class="text-dark mr-3">Chipset:</strong>
        </td>
        <td>
            @if ($product->chipset === null)
                None
            @else
                {{ $product->chipset }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Memory:</strong>
        </td>
        <td>
            @if ($product->memory === null)
                None
            @else
                {{ $product->memory }} GB
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Core Clock:</strong>
        </td>
        <td>
            @if ($product->core_clock === null)
                None
            @else
                {{ $product->core_clock }} MHz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Boost Clock:</strong>
        </td>
        <td>
            @if ($product->boost_clock === null)
                None
            @else
                {{ $product->boost_clock }} MHz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Length:</strong>
        </td>
        <td>
            @if ($product->length === null)
                None
            @else
                {{ $product->length }} mm
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