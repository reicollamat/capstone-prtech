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
            <strong class="text-dark mr-3">Screen size:</strong>
        </td>
        <td>
            @if ($categoryproduct->screen_size === null)
                None
            @else
                {{ $categoryproduct->screen_size }}"
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Resolution:</strong>
        </td>
        <td>
            @if ($categoryproduct->resolution === null)
                None
            @else
                @if (is_array($categoryproduct->resolution) && count($categoryproduct->resolution) > 1)
                    {{ min($categoryproduct->resolution) }} x {{ max($categoryproduct->resolution) }}
                @else
                    {{ $categoryproduct->resolution }}
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Refresh rate:</strong>
        </td>
        <td>
            @if ($categoryproduct->refresh_rate === null)
                None
            @else
                {{ $categoryproduct->refresh_rate }} Hz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Response Time:</strong>
        </td>
        <td>
            @if ($categoryproduct->response_time === null)
                None
            @else
                {{ $categoryproduct->response_time }} ms
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Panel type:</strong>
        </td>
        <td>
            @if ($categoryproduct->panel_type === null)
                None
            @else
                {{ $categoryproduct->panel_type }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Aspect ratio:</strong>
        </td>
        <td>
            @if ($categoryproduct->aspect_ratio === null)
                None
            @else
                {{ $categoryproduct->aspect_ratio }}
            @endif
        </td>
    </tr>
</table>
