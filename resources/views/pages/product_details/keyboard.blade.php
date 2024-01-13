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
            <strong class="text-dark mr-3">Style:</strong>
        </td>
        <td>
            @if ($categoryproduct->style === null)
                None
            @else
                {{ $categoryproduct->style }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Switches:</strong>
        </td>
        <td>
            @if ($categoryproduct->switches === null)
                None
            @else
                {{ $categoryproduct->switches }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Backlit:</strong>
        </td>
        <td>
            @if ($categoryproduct->backlit === null)
                None
            @else
                {{ $categoryproduct->backlit }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Tenkeyless:</strong>
        </td>
        <td>
            @if ($categoryproduct->tenkeyless === null)
                None
            @else
                @if ($categoryproduct->tenkeyless === 1)
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
            @if ($categoryproduct->connection_type === null)
                None
            @else
                {{ $categoryproduct->connection_type }}
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
