<?=$this->include('_partials/header')?>

<h1 class="my-3"><i class="fa-solid fa-clipboard-list me-2"></i><?=$title?></h1>

<?= validation_list_errors() ?>

<?=form_open()?>
<?=csrf_field()?>

<?php if( isset($cart) ):?>
    <div class="row mb-3">
        <label class="col-form-label col-2">Cart ID</label>
        <label class="col-form-label col-2"><?=$cart->id??''?></label>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">User ID</label>
        <label class="col-form-label col-2"><?=$cart->user_id??''?></label>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">User Name</label>
        <label class="col-form-label col-2"><?=$cart->user_name??''?></label>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-2">Product ID</label>
        <label class="col-form-label col-2"><?=$cart->product_id??''?></label>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-2">Product Name</label>
        <label class="col-form-label col-2"><?=$cart->product_name??''?></label>
    </div>
<?php endif ?>
<?php if(!isset($cart)):?>
    <div class="row mb-3">
        <label class="col-form-label col-2">User ID</label>
        <div class="col-2">
            <input class="form-control" type="number" min="1" name="userID" placeholder="User ID" value="<?=$cart->user_id??'1'?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">Product ID</label>
        <div class="col-2">
            <input class="form-control" type="number" min="1" name="productID" placeholder="Product ID" value="<?=$cart->product_id??'1'?>">
        </div>
    </div>
<?php endif ?>

<div class="row mb-3">
    <label class="col-form-label col-2">Amount</label>
    <div class="col-2">
        <input class="form-control" type="number" min="1" name="amount" placeholder="Amount" value="<?=$cart->product_amount??'1'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2"></label>
    <div class="col-2">
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-check me-2"></i>Save</button>
        <a class="btn btn-danger" href="carts"><i class="fa-solid fa-x me-2"></i>Cancel</a>
    </div>
</div>

<?=form_close() ?>

<?=$this->include('_partials/footer')?>
