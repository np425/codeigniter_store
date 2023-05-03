<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $allowedFields = ['name', 'brand', 'description', 'cost', 'amount', 'category'];
    protected $returnType = 'object';
    protected $validationRules = [
        'name' => 'required',
        'brand' => 'required',
        'description' => 'required',
        'cost' => 'required',
        'amount' => 'required',
        'category' => 'required',
    ];

    public function get_products(): array {
        return $this->findAll();
    }
}
