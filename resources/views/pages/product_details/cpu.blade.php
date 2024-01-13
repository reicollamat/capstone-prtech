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
            <strong class="text-dark mr-3">Core Count:</strong>
        </td>
        <td>
            @if ($categoryproduct->core_count === null)
                None
            @else
                {{ $categoryproduct->core_count }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Core Clock:</strong>
        </td>
        <td>
            @if ($categoryproduct->core_clock === null)
                None
            @else
                {{ $categoryproduct->core_clock }} GHz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Boost Clock:</strong>
        </td>
        <td>
            @if ($categoryproduct->boost_clock === null)
                None
            @else
                {{ $categoryproduct->boost_clock }} GHz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">TDP:</strong>
        </td>
        <td>
            @if ($categoryproduct->tdp === null)
                None
            @else
                {{ $categoryproduct->tdp }} W
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Graphics:</strong>
        </td>
        <td>
            @if ($categoryproduct->graphics === null)
                None
            @else
                {{ $categoryproduct->graphics }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">SMT:</strong>
        </td>
        <td>
            @if ($categoryproduct->smt === null)
                None
            @else
                @if ($categoryproduct->smt === 1)
                    Yes
                @else
                    No
                @endif
            @endif
        </td>
    </tr>
</table>
