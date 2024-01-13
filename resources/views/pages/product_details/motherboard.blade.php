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
            <strong class="text-dark mr-3">Socket:</strong>
        </td>
        <td>
            @if ($categoryproduct->socket === null)
                None
            @else
                {{ $categoryproduct->socket }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Form Factor:</strong>
        </td>
        <td>
            @if ($categoryproduct->form_factor === null)
                None
            @else
                {{ $categoryproduct->form_factor }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Max memory:</strong>
        </td>
        <td>
            @if ($categoryproduct->max_memory === null)
                None
            @else
                {{ $categoryproduct->max_memory }} GB
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Memory Slots:</strong>
        </td>
        <td>
            @if ($categoryproduct->memory_slots === null)
                None
            @else
                {{ $categoryproduct->memory_slots }}
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
