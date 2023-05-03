<?php

namespace App\Controllers;


use App\Models\OrderModel;

class Orders extends BaseController
{
    public function __construct()
    {
        $this->order_model = model(OrderModel::class);
    }

    public function index(): string
    {
        $data = [
            'orders' => $this->order_model->get_orders(),
            'title' => 'Orders'
        ];

        return view('orders', $data);
    }
    public function add()
    {
        helper('form');

        $data = [
            'title' => 'Add order'
        ];

        if ($this->request->is('post')) {
            $form_data = [
                'product_amount' => $this->request->getPost('amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'product_id' => $this->request->getPost('productID', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'product_cost' => $this->request->getPost('cost', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'user_id' => $this->request->getPost('userID', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'order_date' => $this->request->getPost('date', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'order_state' => $this->request->getPost('state', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];
            $this->order_model->insert($form_data);
            return redirect()->to('orders');
        }

        return view('order', $data);
    }

    public function edit($id)
    {
        helper('form');

        $data = [
            'title' => 'Edit order',
            'order' => $this->order_model->get_order_by_id($id),
        ];

        if ($this->request->is('post')) {
            $form_data = [
                'product_amount' => $this->request->getPost('amount', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'product_cost' => $this->request->getPost('cost', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'order_date' => $this->request->getPost('date', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'order_state' => $this->request->getPost('state', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ];
            $this->order_model->update($id, $form_data);
            return redirect()->to('orders');
        }

        return view('order', $data);
    }

    public function delete($id)
    {
        if (is_numeric($id)) {
            $this->order_model->delete($id);
        }

        return redirect()->to('orders');
    }
}
