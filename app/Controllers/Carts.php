<?php

namespace App\Controllers;


use App\Models\ShoppingCartModel;

class Carts extends BaseController
{
    public function __construct()
    {
        $this->cart_model = model(ShoppingCartModel::class);
    }

    public function index()
    {
        $data = [
            'carts' => $this->cart_model->get_carts(),
            'title' => 'Carts'
        ];

        return view('carts', $data);
    }
    public function add()
    {
        helper('form');

        $data = [
            'title' => 'Add cart'
        ];

        if ($this->request->is('post')) {
            $form_data = [
                'product_amount' => $this->request->getPost('amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'product_id' => $this->request->getPost('productID', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'user_id' => $this->request->getPost('userID', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];
            $this->cart_model->insert($form_data);
            return redirect()->to('carts');
        }

        return view('cart', $data);
    }

    public function edit($id)
    {
        helper('form');

        $data = [
            'title' => 'Edit cart',
            'cart' => $this->cart_model->get_cart_by_id($id),
        ];

        if ($this->request->is('post')) {
            $form_data = [
                'product_amount' => $this->request->getPost('amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];
            $this->cart_model->update($id, $form_data);
            return redirect()->to('carts');
        }

        return view('cart', $data);
    }

    public function delete($id)
    {
        if (is_numeric($id)) {
            $this->cart_model->delete($id);
        }

        return redirect()->to('carts');
    }
}
