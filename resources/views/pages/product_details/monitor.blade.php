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
            <strong class="text-dark mr-3">Screen size:</strong>
        </td>
        <td>
            @if ($product->screen_size === null)
                None
            @else
                {{ $product->screen_size }}"
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Resolution:</strong>
        </td>
        <td>
            @if ($product->resolution === null)
                None
            @else
                @if (is_array($product->resolution) && count($product->resolution) > 1)
                    {{ min($product->resolution) }} x {{ max($product->resolution) }}
                @else
                    {{ $product->resolution }}
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Refresh rate:</strong>
        </td>
        <td>
            @if ($product->refresh_rate === null)
                None
            @else
                {{ $product->refresh_rate }} Hz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Response Time:</strong>
        </td>
        <td>
            @if ($product->response_time === null)
                None
            @else
                {{ $product->response_time }} ms
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Panel type:</strong>
        </td>
        <td>
            @if ($product->panel_type === null)
                None
            @else
                {{ $product->panel_type }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Aspect ratio:</strong>
        </td>
        <td>
            @if ($product->aspect_ratio === null)
                None
            @else
                {{ $product->aspect_ratio }}
            @endif
        </td>
    </tr>
</table>