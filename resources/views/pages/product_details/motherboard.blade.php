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
            <strong class="text-light mr-3">Socket:</strong>
        </td>
        <td>
            @if ($product->socket === null)
                None
            @else
                {{ $product->socket }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Form Factor:</strong>
        </td>
        <td>
            @if ($product->form_factor === null)
                None
            @else
                {{ $product->form_factor }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Max memory:</strong>
        </td>
        <td>
            @if ($product->max_memory === null)
                None
            @else
                {{ $product->max_memory }} GB
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Memory Slots:</strong>
        </td>
        <td>
            @if ($product->memory_slots === null)
                None
            @else
                {{ $product->memory_slots }}
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
</table>