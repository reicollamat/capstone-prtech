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
            <strong class="text-dark mr-3">Core Count:</strong>
        </td>
        <td>
            @if ($product->core_count === null)
                None
            @else
                {{ $product->core_count }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Core Clock:</strong>
        </td>
        <td>
            @if ($product->core_clock === null)
                None
            @else
                {{ $product->core_clock }} GHz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Boost Clock:</strong>
        </td>
        <td>
            @if ($product->boost_clock === null)
                None
            @else
                {{ $product->boost_clock }} GHz
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">TDP:</strong>
        </td>
        <td>
            @if ($product->tdp === null)
                None
            @else
                {{ $product->tdp }} W
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">Graphics:</strong>
        </td>
        <td>
            @if ($product->graphics === null)
                None
            @else
                {{ $product->graphics }}
            @endif
        </td>
    </tr>
    <tr>
        <td class="header">
            <strong class="text-dark mr-3">SMT:</strong>
        </td>
        <td>
            @if ($product->smt === null)
                None
            @else
                @if ($product->smt === 1)
                    Yes
                @else
                    No
                @endif
            @endif
        </td>
    </tr>
</table>