
<?=$this->include('_partials/header')?>

<h1 class="my-3"><i class="fa-solid fa-clipboard-list me-2"></i><?=$title?></h1>

<div class="my-3 d-flex justify-content-between">
    <div>
        <a class="btn btn-primary" href="products/add"><i class="fa-solid fa-plus me-2"></i>Add</a>
    </div>
    <div></div>
</div>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Name</th>
        <th>Brand</th>
        <th>Description</th>
        <th class="text-end">Cost</th>
        <th class="text-end">Amount</th>
        <th class="text-end">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?=$product->id?></td>
            <td><?=$product->category?></td>
            <td><?=$product->name?></td>
            <td><?=$product->brand?></td>
            <td><?=$product->description?></td>
            <td class="text-end"><?=$product->cost?></td>
            <td class="text-end"><?=$product->amount?></td>
            <td class="text-end">
                <a href="products/edit/<?=$product->id?>" class="text-warning"><i class="fa-2x ms-2 fa-solid fa-pen-to-square"></i></a>
                <a href="products/delete/<?=$product->id?>" class="text-danger" onclick="return confirm('Do you want to delete?')"><i class="fa-2x ms-2 fa-solid fa-trash"></i></a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot class="table-dark">
    <tr>
        <th colspan="8">Total: <?=count($products)?></th>
    </tr>
    </tfoot>
</table>

<?=$this->include('_partials/footer')?>