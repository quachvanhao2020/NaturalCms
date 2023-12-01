<?php
    function cmsformvalue(string $key){
        global $mode;
        global $data;
        global $default;
        $a = "";
        if(isset($default[$key])){
            $a = $default[$key];
        }
        return $mode == "get" || $mode == "all" ? @$data[$key] : $a;
    }
    function cmsformdisplay(string $key){
        global $require;
        global $control;
        $data = "";
        if(isset($require[$key])){
            $data .= "required ";
        }
        if($control->readonly){
            $data .= "readonly ";
        }
        return $data;
    }
?>
<form method="POST">
    <?php if($mode == "get" && !isset($undeleted)){ ?>
    <div class="mb-3">
        <label class="form-label">ID</label>
        <input type="text" class="form-control" value="<?= $data["id"] ?>" disabled>
    </div>
    <?php }?>
    <?php foreach ($meta as $key => $value) { $type = $value['type']; $option = @$options[$key]; ?>
    <div class="mb-3" <?= isset($display[$key]) && $display[$key] == false ? 'style="display:none;"' : "" ?> >
        <label class="form-label"><?= __($key) ?></label>
        <?php if($type == "string"){ ?>
        <input name="<?= $key ?>" type="text" class="form-control" value="<?= cmsformvalue($key); ?>" <?= cmsformdisplay($key); ?>>
        <?php } ?> 
        <?php if ($type == "integer"){?>
        <input name="<?= $key ?>" <?= isset($value['min']) ? "min=".$value['min'] : "" ?> <?= isset($value['max']) ? "max=".$value['max'] : "" ?> type="number" class="form-control" value="<?= cmsformvalue($key); ?>" <?= cmsformdisplay($key); ?>>
        <?php } ?> 
        <?php if ($type == "float"){?>
        <input name="<?= $key ?>" <?= isset($value['min']) ? "min=".$value['min'] : "" ?> <?= isset($value['max']) ? "max=".$value['max'] : "" ?> step="<?= @$value['step'] ?>" type="number" class="form-control" value="<?= cmsformvalue($key); ?>" <?= cmsformdisplay($key); ?>>
        <?php } ?> 
        <?php if ($type == "array"){?>
        <select name="<?= $key ?>" class="form-control">
            <?php foreach ($value['value'] as $k => $v) { ?>
            <option value="<?= $v ?>" <?= @$data[$key] == $v ? "selected" : "" ?>><?= __($v) ?></option>
            <?php }?>
        </select>
        <?php } ?> 
        <?php if ($type == "factory"){?>
        <?php if (!empty($display[$key])){ $vv = $value['value']?>
        <select name="<?= $key ?>" class="form-control">
            <?php if($option){ if(isset($option['empty']) && $option['empty']){ ?>
            <option value="" <?= @$data[$key] == "" ? "selected" : "" ?>><?= __("empty") ?></option>
            <?php }} ?>
            <?php foreach ($vv as $k => $v) { if(!is_arrays($v)) continue; ?>
            <option value="<?= $v['id'] ?>" <?= @$data[$key] == $v['id'] ? "selected" : "" ?>><?= __($v[$display[$key]]) ?></option>
            <?php }?>
        </select>
        <?php }else{?>
        <input name="<?= $key ?>" type="text" class="form-control" value="<?= cmsformvalue($key); ?>" <?= cmsformdisplay($key); ?>>
        <?php } ?> 
        <?php }?>
        <?php if ($type == "color"){?>
        <input name="<?= $key ?>" type="color" class="form-control" value="<?= cmsformvalue($key); ?>" <?= cmsformdisplay($key); ?>>
        <?php }?>
        <?php if ($type == "bool"){?>
        <input name="<?= $key ?>" type="hidden" value="0">
        <input name="<?= $key ?>" type="checkbox" <?= @$data[$key] == true ? "checked" : "" ?> <?= cmsformdisplay($key); ?>>
        <?php }?>
        <?php if($type == "json"){ ?>
        <div style="position: relative;">
            <input name="<?= $key ?>" type="text" class="form-control" value="<?= cmsformvalue($key); ?>" <?= cmsformdisplay($key); ?>>
            <a href="json.php?<?= isset($data[$key]) ? "file=".$data[$key]."&" : "" ?>default=<?= @$default[$key] ?>"><div style="position: absolute;top: 0;right: 4px;padding: 4px;font-size: larger;">:::</div></a>
        </div>
        <?php } ?> 
    </div>
    <?php }?>
    <?php if($control->readonly == false){ ?>
    <?php if($mode == "all"){?>
    <div class="mb-3">
        <label class="form-label"><?= __("thutu") ?></label>
        <input name="index" type="text" class="form-control" value="<?= @$data["index"] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label"><?= __("dulieu") ?></label>
        <textarea style="height: 200px;" name="data" rows="10" class="form-control"><?= @$data["data"] ?></textarea>
    </div>
    <?php };?>
    <?php if($mode == "get"){?>
    <button type="submit" class="btn app-btn-primary"><?= __("luu") ?></button>
    <?php if(!isset($undeleted)){?>
    <a onclick="deleteform(event)" class="btn app-btn-danger"><?= __("xoa") ?></a>
    <?php };?>
    <?php };?>
    <?php if($mode == "new"){?>
    <button type="submit" class="btn app-btn-primary"><?= __("taomoi") ?></button>
    <?php };?>
    <?php if($mode == "all"){?>
    <button type="submit" class="btn app-btn-primary"><?= __("nhaplieu") ?></button>
    <?php };?>
    <?php };?>
</form>