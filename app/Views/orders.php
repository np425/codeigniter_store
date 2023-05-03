
<?=$this->include('_partials/header')?>

<h1 class="my-3"><i class="fa-solid fa-clipboard-list me-2"></i><?=$title?></h1>

<div class="my-3 d-flex justify-content-between">
    <div>
        <a class="btn btn-primary" href="orders/add"><i class="fa-solid fa-plus me-2"></i>Add</a>
    </div>
    <div></div>
</div>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Order Date</th>
        <th>Order State</th>
        <th class="text-end">Amount</th>
        <th class="text-end">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?=$order->id?></td>
            <td><?=$order->user_id?></td>
            <td><?=$order->user_name?></td>
            <td><?=$order->product_id?></td>
            <td><?=$order->product_name?></td>
            <td><?=$order->order_date?></td>
            <td><?=$order->order_state?></td>
            <td class="text-end"><?=$order->product_amount?></td>
            <td class="text-end">
                <a href="orders/edit/<?=$order->id?>" class="text-warning"><i class="fa-2x ms-2 fa-solid fa-pen-to-square"></i></a>
                <a href="orders/delete/<?=$order->id?>" class="text-danger" onclick="return confirm('Do you want to delete?')"><i class="fa-2x ms-2 fa-solid fa-trash"></i></a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot class="table-dark">
    <tr>
        <th colspan="9">Total: <?=count($orders)?></th>
    </tr>
    </tfoot>
</table>

<?=$this->include('_partials/footer')?>