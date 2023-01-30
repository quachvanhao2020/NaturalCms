<form method="POST">
    <?php if($mode == "get" && !isset($undeleted)){ ?>
    <div class="mb-3">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value="<?= $data["id"] ?>" disabled>
    </div>
    <?php }?>
    <?php foreach ($meta as $key => $value) { $type = $value['type']; ?>
    <div class="mb-3">
        <label class="form-label"><?= __($key) ?></label>
        <?php if($type == "string"){ ?>
        <input name="<?= $key ?>" type="text" class="form-control" value="<?= ($mode == "get" || $mode == "all") ? @$data[$key] : "" ?>" <?= isset($require[$key]) ? "required" : "" ?>>
        <?php } ?> 
        <?php if ($type == "integer"){?>
        <input name="<?= $key ?>" min=0 type="number" class="form-control" value="<?= $mode == "get" || $mode == "all" ? @$data[$key] : "" ?>" <?= isset($require[$key]) ? "required" : "" ?>>
        <?php } ?> 
        <?php if ($type == "array"){?>
        <select name="<?= $key ?>" class="form-control">
            <?php foreach ($value['value'] as $k => $v) { ?>
            <option value="<?= $v ?>" <?= @$data[$key] == $v ? "selected" : "" ?>><?= __($v) ?></option>
            <?php }?>
        </select>
        <?php } ?> 
        <?php if ($type == "factory"){?>
        <input name="<?= $key ?>" type="text" class="form-control" value="<?= $mode == "get" || $mode == "all" ? @$data[$key] : "" ?>" <?= isset($require[$key]) ? "required" : "" ?>>
        <?php }?>
        <?php if ($type == "color"){?>
        <input name="<?= $key ?>" type="color" class="form-control" value="<?= $mode == "get" || $mode == "all" ? @$data[$key] : "" ?>" <?= isset($require[$key]) ? "required" : "" ?>>
        <?php }?>
        <?php if ($type == "bool"){?>
        <input name="<?= $key ?>" type="hidden" value="0">
        <input name="<?= $key ?>" type="checkbox" <?= @$data[$key] == true ? "checked" : "" ?> <?= isset($require[$key]) ? "required" : "" ?>>
        <?php }?>
    </div>
    <?php }?>
    <?php if($mode == "all"){?>
    <div class="mb-3">
        <label class="form-label">Thứ tự</label>
        <input name="index" type="text" class="form-control" value="<?= @$data["index"] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Dữ liệu</label>
        <textarea style="height: 200px;" name="data" rows="10" class="form-control"><?= @$data["data"] ?></textarea>
    </div>
    <?php };?>
    <?php if($mode == "get"){?>
    <button type="submit" class="btn app-btn-primary">Lưu</button>
    <?php if(!isset($undeleted)){?>
    <a onclick="deleteform(event)" class="btn app-btn-danger">Xóa</a>
    <?php };?>
    <?php };?>
    <?php if($mode == "new"){?>
    <button type="submit" class="btn app-btn-primary">Tạo mới</button>
    <?php };?>
    <?php if($mode == "all"){?>
    <button type="submit" class="btn app-btn-primary">Nhập liệu</button>
    <?php };?>
</form>