<?php

namespace App\model;

class DiscountCode
{
    public string $code;
    public float $percent;

    /**
     * @param string $code
     * @param float $percent
     */
    public function __construct(string $code, float $percent)
    {
        $this->code = $code;
        $this->percent = $percent;
    }


}