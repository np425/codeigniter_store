<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['product_id', 'user_id', 'product_cost', 'product_amount', 'order_state', 'order_date'];
    protected $returnType = 'object';
    protected $validationRules = [
        'product_cost' => 'required',
        'product_amount' => 'required',
        'order_state' => 'required',
        'order_date' => 'required'
    ];

    public function get_orders(): array {
        return $this
            ->join('users', 'orders.user_id = users.id')
            ->join('products', 'orders.product_id = products.id')
            ->select('orders.*, products.name AS product_name, users.name AS user_name')
            ->findAll();
    }

    public function get_order_by_id($id) {
        return $this
            ->join('users', 'orders.user_id = users.id')
            ->join('products', 'orders.product_id = products.id')
            ->select('orders.*, products.name AS product_name, users.name AS user_name')
            ->find($id);
    }
}
