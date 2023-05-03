
<?=$this->include('_partials/header')?>

<h1 class="my-3"><i class="fa-solid fa-clipboard-list me-2"></i><?=$title?></h1>

<div class="my-3 d-flex justify-content-between">
    <div>
        <a class="btn btn-primary" href="carts/add"><i class="fa-solid fa-plus me-2"></i>Add</a>
    </div>
    <div></div>
</div>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th>Item ID</th>
        <th>User ID</th>
        <th>User Name</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th class="text-end">Amount</th>
        <th class="text-end">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($carts as $cart): ?>
        <tr>
            <td><?=$cart->id?></td>
            <td><?=$cart->user_id?></td>
            <td><?=$cart->user_name?></td>
            <td><?=$cart->product_id?></td>
            <td><?=$cart->product_name?></td>
            <td class="text-end"><?=$cart->product_amount?></td>
            <td class="text-end">
                <a href="carts/edit/<?=$cart->id?>" class="text-warning"><i class="fa-2x ms-2 fa-solid fa-pen-to-square"></i></a>
                <a href="carts/delete/<?=$cart->id?>" class="text-danger" onclick="return confirm('Do you want to delete?')"><i class="fa-2x ms-2 fa-solid fa-trash"></i></a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot class="table-dark">
    <tr>
        <th colspan="7">Total: <?=count($carts)?></th>
    </tr>
    </tfoot>
</table>

<?=$this->include('_partials/footer')?>