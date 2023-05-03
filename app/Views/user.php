<?=$this->include('_partials/header')?>

    <h1 class="my-3"><i class="fa-solid fa-clipboard-list me-2"></i><?=$title?></h1>

<?= validation_list_errors() ?>

<?=form_open()?>
<?=csrf_field()?>

<?php if( isset($user) ):?>
    <div class="row mb-3">
        <label class="col-form-label col-2">ID</label>
        <label class="col-form-label col-2"><?=$user->id??''?></label>
    </div>
<?php endif ?>

    <div class="row mb-3">
        <label class="col-form-label col-2">Name</label>
        <div class="col-2">
            <input class="form-control" type="text" name="name" placeholder="Name" value="<?=$user->name??''?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">Email</label>
        <div class="col-2">
            <input class="form-control" type="email" name="email" placeholder="Email" value="<?=$user->email??''?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">Password</label>
        <div class="col-2">
            <input class="form-control" type="password" name="password" placeholder="Password" value="<?=$user->password??''?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2">Money</label>
        <div class="col-2">
            <input class="form-control" type="number" step="0.01" min="0" name="money" placeholder="Money" value="<?=$user->money??'0'?>">
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-form-label col-2"></label>
        <div class="col-2">
            <button class="btn btn-success" type="submit"><i class="fa-solid fa-check me-2"></i>Save</button>
            <a class="btn btn-danger" href="users"><i class="fa-solid fa-x me-2"></i>Cancel</a>
        </div>
    </div>

<?=form_close() ?>

<?=$this->include('_partials/footer')?>