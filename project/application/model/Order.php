<?php

namespace App\model;

class Order
{
    public int $order_id;
    public int $user_id;
    public int $food_id;

    /**
     * @param int $order_id
     * @param int $user_id
     * @param int $food_id
     */
    public function __construct(int $order_id, int $user_id, int $food_id)
    {
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $this->food_id = $food_id;
    }


}