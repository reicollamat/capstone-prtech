<?php

namespace App\Helpers;

class ShippingHelper
{
    // /**
    //  * Compute the shipping cost for an order.
    //  *
    //  * @return int The shipping cost for a computer.
    //  *
    //  * @throws Some_Exception_Class A description of the exception that can be thrown.
    //  */
    // public static function computeShipping($basePrice = 150)
    // {
    //     // Add logic here to support various shipping prices
    //     return 10;
    // }

    /**
     * Calculates the shipping cost based on the weight of the item.
     *
     * @param  int  $weight The weight of the item in kilograms.
     * @param  int  $basePrice The base price for shipping.
     * @param  int  $shippingCost The cost per 5kg interval.
     * @return float|int The total cost of shipping.
     */
    public static function computeShipping($weight, $basePrice = 70, $shippingCost = 10): float|int
    {
        // Calculate the number of 5kg intervals
        $intervals = floor($weight / 5);

        // Calculate the remainder
        $remainder = $weight % 5;

        // Calculate the cost by adding 20 pesos for each interval and considering the remainder
        $cost = $intervals * $shippingCost;

        // Add cost for the remainder if it exists
        if ($remainder > 0) {
            $cost += $remainder;
        }

        return $cost + $basePrice;
    }
}
