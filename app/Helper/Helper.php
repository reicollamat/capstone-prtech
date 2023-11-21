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
            'brand_new' => 'Brand New',
        ];

        return $mapping[$input] ?? 'Unknown value';
    }

    /**
     * Logs data to the browser console for debugging purposes.
     *
     * @param  mixed  $data The data to be logged. It can be of any type.
     * @return void
     */
    public static function debug_to_console($data)
    {
        echo "<script>console.log('Debug Objects: ".$data."' );</script>";
    }

    /**
     * @return string
     *
     * Create a function that returns the string representation of time of the day for greetings
     * to accesss use Helper::getTimeofDay()
     */
    public static function getTimeOfDay()
    {
        date_default_timezone_set('Asia/Manila'); // Set your timezone here

        $time = intval(date('G')); // Get the hour in 24-hour format

        if ($time >= 5 && $time < 12) {
            return 'Morning';
        } elseif ($time >= 12 && $time < 18) {
            return 'Afternoon';
        } else {
            return 'Evening';
        }
    }
}
