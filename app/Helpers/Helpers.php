<?php

use Illuminate\Support\Facades\File;

/**
 * Get image extension helper function
 */
if (!function_exists('getImageExtension')) {
    function getImageExtension($directory, $filename) {
        $files = File::files(public_path($directory));

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_FILENAME) == $filename) {
                return pathinfo($file, PATHINFO_EXTENSION);
            }
        }
        
        return null;
    }
}