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
            {{ $categoryproduct->status }}
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Condition:</strong>
        </td>
        <td>
            {{ $categoryproduct->condition }}
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
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Size:</strong>
        </td>
        <td>
            @if ($categoryproduct->size === null)
                None
            @else
                {{ $categoryproduct->size }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">RPM:</strong>
        </td>
        <td>
            @if ($categoryproduct->rpm === null)
                None
            @else
                @if (is_array($categoryproduct->rpm) && count($categoryproduct->rpm) > 1)
                    {{ min($categoryproduct->rpm) }} - {{ max($categoryproduct->rpm) }} RPM
                @else
                    {{ $categoryproduct->rpm }} RPM
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Airflow:</strong>
        </td>
        <td>
            @if ($categoryproduct->airflow === null)
                None
            @else
                @if (is_array($categoryproduct->airflow) && count($categoryproduct->airflow) > 1)
                    {{ min($categoryproduct->airflow) }} - {{ max($categoryproduct->airflow) }} CFM
                @else
                    {{ $categoryproduct->airflow }} CFM
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Noise Level:</strong>
        </td>
        <td>
            @if ($categoryproduct->noise_level === null)
                None
            @else
                @if (is_array($categoryproduct->noise_level) && count($categoryproduct->noise_level) > 1)
                    {{ min($categoryproduct->noise_level) }} - {{ max($categoryproduct->noise_level) }} dB
                @else
                    {{ $categoryproduct->noise_level }} dB
                @endif
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Pulse Width Modulation:</strong>
        </td>
        <td>
            @if ($categoryproduct->pwm === null)
                None
            @else
                @if ($categoryproduct->pwm === 1)
                    Yes
                @else
                    No
                @endif
            @endif
        </td>
    </tr>
</table>
