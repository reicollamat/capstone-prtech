<?php

namespace App\Helper;

class Helper
{
    public static function maptopropercatetory($input)
    {
        $mapping = [
            'storage' => 'Storage',
            'external_storage' => 'External Storage',
            'internal_storage' => 'Internal Storage',
            'processor_cpu' => 'Processor(CPU)',
            'graphics_card' => 'Graphics Card',
            'motherboard' => 'Motherboard',
            'memory_ram' => 'Memory (RAM)',
            'power_supply_unit_psu' => 'Power Supply Unit (PSU)',
            'computer_case' => 'Computer Case',
            'case_fan' => 'Case Fan',
            'cpu_cooler' => 'CPU Cooler',
            'monitor' => 'Monitor',
            'keyboard' => 'Keyboard',
            'mouse' => 'Mouse',
            'other_peripherals' => 'Other Peripherals',
            'speaker' => 'Speaker',
            'headphone' => 'Headphone',
            'webcam' => 'Webcam',
        ];

        return $mapping[$input] ?? 'Unknown value';
    }

    public static function maptopropercondition($input)
    {
        $mapping = [
            'used' => 'Used',
            'brand_new' => 'Brand New'
        ];

        return $mapping[$input] ?? 'Unknown value';
    }

    /**
     * Logs data to the browser console for debugging purposes.
     *
     * @param mixed $data The data to be logged. It can be of any type.
     * @return void
     */
    public static function debug_to_console($data)
    {
        echo "<script>console.log('Debug Objects: " . $data . "' );</script>";
    }
}
