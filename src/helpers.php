<?php

use Aslam\Bni\Bni;

if (!function_exists('bniapi')) {

    /**
     * bniapi
     *
     * @return Bri
     */
    function bniapi()
    {
        return app(Bni::class);
    }
}
