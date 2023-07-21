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
            <strong class="text-light mr-3">Capacity:</strong>
        </td>
        <td>
            @if ($product->capacity === null)
                None
            @else
                {{ $product->capacity }} TB
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Price per GB:</strong>
        </td>
        <td>
            @if ($product->price_per_gb === null)
                None
            @else
                ₱ {{ $product->price_per_gb }}
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
            <strong class="text-light mr-3">Cache:</strong>
        </td>
        <td>
            @if ($product->cache === null)
                None
            @else
                {{ $product->cache }} MB
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Form factor:</strong>
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
            <strong class="text-light mr-3">Interface:</strong>
        </td>
        <td>
            @if ($product->interface === null)
                None
            @else
                {{ $product->interface }}
            @endif
        </td>
    </tr>
</table>