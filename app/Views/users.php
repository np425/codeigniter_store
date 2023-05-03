
<?=$this->include('_partials/header')?>

<h1 class="my-3"><i class="fa-solid fa-clipboard-list me-2"></i><?=$title?></h1>

<div class="my-3 d-flex justify-content-between">
    <div>
        <a class="btn btn-primary" href="users/add"><i class="fa-solid fa-plus me-2"></i>Add</a>
    </div>
    <div></div>
</div>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th class="text-end">Money</th>
        <th class="text-end">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?=$user->id?></td>
            <td><?=$user->name?></td>
            <td><?=$user->email?></td>
            <td class="text-end"><?=$user->money?></td>
            <td class="text-end">
                <a href="users/edit/<?=$user->id?>" class="text-warning"><i class="fa-2x ms-2 fa-solid fa-pen-to-square"></i></a>
                <a href="users/delete/<?=$user->id?>" class="text-danger" onclick="return confirm('Do you want to delete?')"><i class="fa-2x ms-2 fa-solid fa-trash"></i></a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot class="table-dark">
    <tr>
        <th colspan="5">Total: <?=count($users)?></th>
    </tr>
    </tfoot>
</table>

<?=$this->include('_partials/footer')?>