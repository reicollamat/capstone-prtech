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
            <strong class="text-light mr-3">Resolutions:</strong>
        </td>
        <td>
            @if ($product->resolutions === null)
                None
            @else
                @if (is_array($product->resolutions))
                    {{ implode(', ', $product->resolutions) }}
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <tr>
            <td class="header">
                <strong class="text-light mr-3">Connection:</strong>
            </td>
            <td>
                @if ($product->connection === null)
                    None
                @else
                    {{ $product->connection }}
                @endif
            </td>
        </tr>
        <td class="header">
            <strong class="text-light mr-3">Focus type:</strong>
        </td>
        <td>
            @if ($product->focus_type === null)
                None
            @else
                {{ $product->focus_type }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">Operating System:</strong>
        </td>
        <td>
            @if ($product->os === null)
                None
            @else
                @if (is_array($product->os))
                    {{ implode(', ', $product->os) }}
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-light mr-3">FOV Angle:</strong>
        </td>
        <td>
            @if ($product->fov === null)
                None
            @else
                {{ $product->fov }}°
            @endif
        </td>
    </tr>
</table>