<?=$this->include('_partials/header')?>

<h1 class="my-3"><i class="fa-solid fa-clipboard-list me-2"></i><?=$title?></h1>

<?= validation_list_errors() ?>

<?=form_open()?>
<?=csrf_field()?>

<?php if( isset($product) ):?>
    <div class="row mb-3">
        <label class="col-form-label col-2">ID</label>
        <label class="col-form-label col-2"><?=$product->id??''?></label>
    </div>
<?php endif ?>

<div class="row mb-3">
    <label class="col-form-label col-2">Name</label>
    <div class="col-2">
        <input class="form-control" type="text" name="name" placeholder="Name" value="<?=$product->name??''?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2">Category</label>
    <div class="col-2">
        <input class="form-control" type="text" name="category" placeholder="No category" value="<?=$product->category??'No category'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2">Brand</label>
    <div class="col-2">
        <input class="form-control" type="text" name="brand" placeholder="No brand" value="<?=$product->brand??'No brand'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2">Description</label>
    <div class="col-2">
        <input class="form-control" type="text" name="description" placeholder="Description" value="<?=$product->description??'No description'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2">Cost</label>
    <div class="col-2">
        <input class="form-control" type="number" step="0.01" name="cost" min="0" placeholder="Cost" value="<?=$product->cost??'0'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2">Amount</label>
    <div class="col-2">
        <input class="form-control" type="number" name="amount" min="0" placeholder="Amount" value="<?=$product->amount??'0'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2"></label>
    <div class="col-2">
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-check me-2"></i>Save</button>
        <a class="btn btn-danger" href="products"><i class="fa-solid fa-x me-2"></i>Cancel</a>
    </div>
</div>

<?=form_close() ?>

<?=$this->include('_partials/footer')?>
