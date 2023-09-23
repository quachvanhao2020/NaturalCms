<?php
    $status = @$meta['status'];
?>
<table id="table" class="table">
    <thead>
        <tr>
            <th class="cell"><input type="checkbox" onclick="checkall(event)" ></th>
            <th class="cell">ID</th>
            <?php foreach ($meta as $key => $value) { if(@$display[$key] === false) continue; ?>
            <th class="cell"><?= __($key) ?></th>
            <?php }?>
            <th class="cell"><?= __("created") ?></th>
            <th class="cell"></th>
        </tr>
    </thead>
    <tbody>
        <?php unset($meta['status']); foreach ($data as $key => $value) { if(!is_arrays($value)) continue; ?>
        <tr>
            <td class="cell"><input type="checkbox" value="<?= $value["id"] ?>"></td>
            <td class="cell">#<?= $value["id"] ?></td>
            <?php foreach ($meta as $k => $v) { if(@$display[$k] === false) continue; ?>
            <?php if($v['type'] == "factory") { ?>
            <td class="cell"><a href="<?= @$metas[id($v['value'])]['router'] ?>?id=<?= $value[$k] ?>"><?= @$v['value'][$value[$k]][$display[$k]] ?></a></td>
            <?php } else {?>
            <?php if(@$v['ex'] == "href"){ ?>
            <td class="cell"><a target="_blank" href="<?= @$value[$k] ?>"><?= @$value[$k] ?></a></td>
            <?php } else if(@$v['ex'] == "img") {?>
            <td class="cell"><img class="pop" style="height: 50px;" src="<?= @$value[$k] ?>"></td>
            <?php }else{?>
            <td class="cell"><?= @$value[$k] ?></td>
            <?php }?>
            <?php }?>
            <?php }?>
            <?php if(isset($status_meta)){ ?>
            <td class="cell"><span class="badge bg-<?= isset($status_meta[$value["status"]]) ? $status_meta[$value["status"]] : "warning" ?>"><?= __(@$value["status"]) ?></span></td>
            <?php }?>
            <?php if(@$value["created"] instanceof DateTime){ ?>
            <td class="cell"><?= $value["created"]->format('Y-m-d H:i:s') ?></td>
            <?php }?>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="?id=<?= $value["id"] ?>">...</a></td>
            <?php if(isset($tree)){ ?>
            <td class="cell"><a class="btn-sm app-btn-secondary" href="?parent=<?= $value["id"] ?>">>>></a></td>
            <?php }?>
        </tr>
        <?php }; ?>
    </tbody>
</table>
<script>
    var table = document.getElementById("table");
    var confirmdelete = <?= @$confirmdelete == true ? 1 : 0 ?>;
    function checkall(e){
        var rs = table.children[1].children;
        for (e of rs) {
            var a = e.children[0].children[0];
            a.checked = !a.checked;
        }
    }
    function deletetable(e){
        if(confirmdelete){
            if(!confirm("IsOk!")) return;
        }
        var rs = table.children[1].children;
        var pr = "";
        for (e of rs) {
            var a = e.children[0].children[0];
            if(a.checked){
                pr += a.value + ",";
            }
            window.location.href = "?method=delete&pr="+pr;
        }
    }   
</script>