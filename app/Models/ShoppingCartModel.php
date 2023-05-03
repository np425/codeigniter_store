<?php

namespace App\Models;

use CodeIgniter\Model;

class ShoppingCartModel extends Model
{
    protected $table = 'shopping_carts';
    protected $allowedFields = ['product_id', 'user_id', 'product_amount'];
    protected $returnType = 'object';
    protected $validationRules = [
        'product_amount' => 'required',
    ];

    public function get_carts(): array {
        return $this
            ->join('users', 'shopping_carts.user_id = users.id')
            ->join('products', 'shopping_carts.product_id = products.id')
            ->select('shopping_carts.*, products.name AS product_name, users.name AS user_name')
            ->findAll();
    }

    public function get_cart_by_id($id) {
        return $this
            ->join('users', 'shopping_carts.user_id = users.id')
            ->join('products', 'shopping_carts.product_id = products.id')
            ->select('shopping_carts.*, products.name AS product_name, users.name AS user_name')
            ->find($id);
    }
}
