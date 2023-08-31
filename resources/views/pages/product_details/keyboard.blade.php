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
            <strong class="text-dark mr-3">Style:</strong>
        </td>
        <td>
            @if ($product->style === null)
                None
            @else
                {{ $product->style }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Switches:</strong>
        </td>
        <td>
            @if ($product->switches === null)
                None
            @else
                {{ $product->switches }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Backlit:</strong>
        </td>
        <td>
            @if ($product->backlit === null)
                None
            @else
                {{ $product->backlit }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Tenkeyless:</strong>
        </td>
        <td>
            @if ($product->tenkeyless === null)
                None
            @else
                @if ($product->tenkeyless === 1)
                    Yes
                @else
                    No
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Connection type:</strong>
        </td>
        <td>
            @if ($product->connection_type === null)
                None
            @else
                {{ $product->connection_type }}
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