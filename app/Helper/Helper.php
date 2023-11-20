<?php

namespace App\Helper;

class Helper
{
    public static function maptopropercatetory($input)
    {
        $mapping = [
            'storage' => 'Storage',
            'ext_storage' => 'External Storage',
            'int_storage' => 'Internal Storage',
            'cpu' => 'Processor(CPU)',
            'video_card' => 'Graphics Card',
            'motherboard' => 'Motherboard',
            'memory' => 'Memory (RAM)',
            'psu' => 'Power Supply Unit (PSU)',
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

        return $mapping[$input] ?? '';
    }

    public static function categoryList(): array
    {
        $mapping = [
            'storage' => 'Storage',
            'ext_storage' => 'External Storage',
            'int_storage' => 'Internal Storage',
            'cpu' => 'Processor(CPU)',
            'video_card' => 'Graphics Card',
            'motherboard' => 'Motherboard',
            'memory' => 'Memory (RAM)',
            'psu' => 'Power Supply Unit (PSU)',
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

        return $mapping;

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
