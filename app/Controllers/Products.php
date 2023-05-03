<?php

namespace App\Controllers;


use App\Models\ProductModel;

class Products extends BaseController
{
    public function __construct()
    {
        $this->product_model = model(ProductModel::class);
    }

    public function index(): string
    {
        $data = [
            'products' => $this->product_model->get_products(),
            'title' => 'Products'
        ];

        return view('products', $data);
    }
    public function add()
    {
        helper('form');

        $data = [
            'title' => 'Add product'
        ];

        if ($this->request->is('post')) {
            $form_data = [
                'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'brand' => $this->request->getPost('brand', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'description' => $this->request->getPost('description', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'cost' => $this->request->getPost('cost', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'amount' => $this->request->getPost('amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'category' => $this->request->getPost('category', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];
            $this->product_model->insert($form_data);
            return redirect()->to('products');
        }

        return view('product', $data);
    }

    public function edit($id)
    {
        helper('form');

        $data = [
            'title' => 'Edit product',
            'product' => $this->product_model->find($id),
        ];

        if ($this->request->is('post')) {
            $form_data = [
                'name' => $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'brand' => $this->request->getPost('brand', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'description' => $this->request->getPost('description', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'cost' => $this->request->getPost('cost', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'amount' => $this->request->getPost('amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'category' => $this->request->getPost('category', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];
            $this->product_model->update($id, $form_data);
            return redirect()->to('products');
        }

        return view('product', $data);
    }

    public function delete($id)
    {
        if (is_numeric($id)) {
            $this->product_model->delete($id);
        }

        return redirect()->to('products');
    }
}
