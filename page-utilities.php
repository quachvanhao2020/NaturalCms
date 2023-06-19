<div class="page-utilities">
    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
        <div class="col-auto">
            <form class="table-search-form row gx-1 align-items-center">
                <?php if(is_array(@$data2)) { foreach ($data2 as $key => $value){ ?>
                <div class="col-auto">
                    <select name="<?= $key ?>" class="form-control" style="padding-top: 2px !important;">
                        <option value=""><?= __("All") ?></option>
                        <?php foreach ($value as $k => $v){ ?>
                        <option value="<?= strtolower($v) ?>" <?= @$_GET[$key] == $v ? "selected" : "" ?>><?= __($v) ?></option>
                        <?php };?>
                    </select>
                </div>
                <?php }};?>
                <div class="col-auto">
                    <select name="key" class="form-control" style="padding-top: 2px !important;">
                        <?php foreach ($data as $key => $value){ ?>
                        <option value="<?= $key ?>" <?= @$_GET['key'] == $key ? "selected" : "" ?>><?= __($key) ?></option>
                        <?php };?>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="text" name="value" class="form-control search-orders" placeholder="Nội dung">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn app-btn-secondary"><?= __("search") ?></button>
                </div>
            </form>
        </div>
        <?php if($control->readonly == false){ ?>
        <div class="col-auto">						    
            <a class="btn app-btn-secondary" href="?method=all">
                <?= __("nhaplieu") ?>
            </a>
        </div>
        <div class="col-auto">						    
            <a class="btn app-btn-secondary" href="?method=new">
                <?= __("create") ?>
            </a>
        </div>
        <div class="col-auto">						    
            <a class="btn app-btn-secondary" onclick="deletetable(event)">
                <?= __("delete") ?>
            </a>
        </div>
        <?php }?>
    </div>
</div>