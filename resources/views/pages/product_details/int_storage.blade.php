<table class="details d-flex mb-4">
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Sold:</strong>
        </td>
        <td>
            {{ $categoryproduct->purchase_count }}
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
            <strong class="text-dark mr-3">Capacity:</strong>
        </td>
        <td>
            @if ($categoryproduct->capacity === null)
                None
            @else
                {{ $categoryproduct->capacity }} TB
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Price per GB:</strong>
        </td>
        <td>
            @if ($categoryproduct->price_per_gb === null)
                None
            @else
                ₱ {{ $categoryproduct->price_per_gb }}
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
            <strong class="text-dark mr-3">Cache:</strong>
        </td>
        <td>
            @if ($categoryproduct->cache === null)
                None
            @else
                {{ $categoryproduct->cache }} MB
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Form factor:</strong>
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
            <strong class="text-dark mr-3">Interface:</strong>
        </td>
        <td>
            @if ($categoryproduct->interface === null)
                None
            @else
                {{ $categoryproduct->interface }}
            @endif
        </td>
    </tr>
</table>
