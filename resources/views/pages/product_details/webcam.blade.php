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
            <strong class="text-dark mr-3">Resolutions:</strong>
        </td>
        <td>
            @if ($categoryproduct->resolutions === null)
                None
            @else
                @if (is_array($categoryproduct->resolutions))
                    {{ implode(', ', $categoryproduct->resolutions) }}
                @endif
            @endif
        </td>
    </tr>
    <tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Connection:</strong>
        </td>
        <td>
            @if ($categoryproduct->connection === null)
                None
            @else
                {{ $categoryproduct->connection }}
            @endif
        </td>
    </tr>
    <td class="header">
        <strong class="text-dark mr-3">Focus type:</strong>
    </td>
    <td>
        @if ($categoryproduct->focus_type === null)
            None
        @else
            {{ $categoryproduct->focus_type }}
        @endif
    </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Operating System:</strong>
        </td>
        <td>
            @if ($categoryproduct->os === null)
                None
            @else
                @if (is_array($categoryproduct->os))
                    {{ implode(', ', $categoryproduct->os) }}
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">FOV Angle:</strong>
        </td>
        <td>
            @if ($categoryproduct->fov === null)
                None
            @else
                {{ $categoryproduct->fov }}°
            @endif
        </td>
    </tr>
</table>
