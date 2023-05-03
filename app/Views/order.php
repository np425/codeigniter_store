<?=$this->include('_partials/header')?>

<h1 class="my-3"><i class="fa-solid fa-clipboard-list me-2"></i><?=$title?></h1>

<?= validation_list_errors() ?>

<?=form_open()?>
<?=csrf_field()?>

<?php if( isset($order) ):?>
    <div class="row mb-3">
        <label class="col-form-label col-2">Order ID</label>
        <label class="col-form-label col-2"><?=$order->id??''?></label>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">User ID</label>
        <label class="col-form-label col-2"><?=$order->user_id??''?></label>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">User Name</label>
        <label class="col-form-label col-2"><?=$order->user_name??''?></label>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-2">Product ID</label>
        <label class="col-form-label col-2"><?=$order->product_id??''?></label>
    </div>
    <div class="row mb-3">
        <label class="col-form-label col-2">Product Name</label>
        <label class="col-form-label col-2"><?=$order->product_name??''?></label>
    </div>
<?php endif ?>
<?php if(!isset($order)):?>
    <div class="row mb-3">
        <label class="col-form-label col-2">User ID</label>
        <div class="col-2">
            <input class="form-control" type="number" min="1" name="userID" placeholder="Amount" value="<?=$order->order_id??'1'?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">Product ID</label>
        <div class="col-2">
            <input class="form-control" type="number" min="1" name="productID" placeholder="Amount" value="<?=$order->product_id??'1'?>">
        </div>
    </div>
<?php endif ?>

<div class="row mb-3">
    <label class="col-form-label col-2">Order Date</label>
    <div class="col-2">
        <input class="form-control" type="datetime-local" name="date" placeholder="Date" value="<?=$order->order_date??''?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2">Order State</label>
    <div class="col-2">
        <input class="form-control" type="text" name="state" placeholder="State" value="<?=$order->order_state??'Reserved'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2">Amount</label>
    <div class="col-2">
        <input class="form-control" type="number" min="1" name="amount" placeholder="Amount" value="<?=$order->product_amount??'1'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2">Cost</label>
    <div class="col-2">
        <input class="form-control" type="number" min="1" step="0.01" name="cost" placeholder="Cost" value="<?=$order->product_cost??'1'?>">
    </div>
</div>

<div class="row mb-3">
    <label class="col-form-label col-2"></label>
    <div class="col-2">
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-check me-2"></i>Save</button>
        <a class="btn btn-danger" href="orders"><i class="fa-solid fa-x me-2"></i>Cancel</a>
    </div>
</div>

<?=form_close() ?>

<?=$this->include('_partials/footer')?>
