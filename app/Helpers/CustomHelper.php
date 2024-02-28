<?php

namespace App\Helpers;

class CustomHelper
{
    public static function maptopropercatetory($input)
    {
        $mapping = [
            //            'storage' => 'Storage',
            'case_fan' => 'Case Fan',
            'computer_case' => 'Computer Case',
            'cpu' => 'Processor (CPU)',
            'cpu_cooler' => 'CPU Cooler',
            'int_storage' => 'Internal Storage',
            'ext_storage' => 'External Storage',
            'headphone' => 'Headphone',
            'keyboard' => 'Keyboard',
            'memory' => 'Memory (RAM)',
            'monitor' => 'Monitor',
            'motherboard' => 'Motherboard',
            'mouse' => 'Mouse',
            'other_peripherals' => 'Other Peripherals',
            'psu' => 'Power Supply Unit (PSU)',
            'speaker' => 'Speaker',
            'video_card' => 'Graphics Card',
            'webcam' => 'Webcam',
        ];

        return $mapping[$input] ?? 'Not Listed';
    }

    public static function categoryList(): array
    {
        $mapping = [
            //            'storage' => 'Storage',
            'case_fan' => 'Case Fan',
            'computer_case' => 'Computer Case',
            'cpu' => 'Processor (CPU)',
            'cpu_cooler' => 'CPU Cooler',
            'ext_storage' => 'External Storage',
            'int_storage' => 'Internal Storage',
            'headphone' => 'Headphone',
            'keyboard' => 'Keyboard',
            'memory' => 'Memory (RAM)',
            'monitor' => 'Monitor',
            'motherboard' => 'Motherboard',
            'mouse' => 'Mouse',
            'other_peripherals' => 'Other Peripherals',
            'psu' => 'Power Supply Unit (PSU)',
            'speaker' => 'Speaker',
            'video_card' => 'Graphics Card',
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
