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
    var trs = table.children[1].children;
    var shiftHeld = false;
    var cutr = null;
    function handleShift(e) { shiftHeld = e.shiftKey }
    document.addEventListener("keydown", (e)=>{
        if(e.keyCode == 46){
            deletetable(e);
            return;
        }
        handleShift(e);
    }, true);
    document.addEventListener("keyup", handleShift, true);
    for (e of trs) {
        e.checkbox = e.children[0].children[0];
        e.tid = e.children[1];
        e.active = function(e){
            var a = this.checkbox;
            if(e){
                a.checked = true;
                this.className = "active_row";
            }else{
                a.checked = false;
                this.className = "";
            }
        }
        e.checkbox.addEventListener('change',(event) => {
            shiftHeldAuto(event);
        });
        e.tid.addEventListener('click',(event) => {
            var target = event.target;
            var tr = target.parentNode;
            tr.active(true);
        });
    }
    function shiftHeldAuto(){
        var target = event.target;
        var tr = target.parentNode.parentNode;
        tr.active(target.checked);
        if(target.checked){
            if(cutr == null){
                cutr = tr;
            }else{
                if(shiftHeld){
                    var is = false;
                    for(e of trs){
                        if(is){
                            e.active(true);
                        }
                        if((e == cutr || e == tr) && is == false){
                            is = true;
                            continue;
                        }
                        if((e == cutr || e == tr) && is == true){
                            is = false;
                            break;
                        }
                    }
                    cutr = null;
                }
            }
        }
    }
    function checkall(event){
        for (e of trs) {
            e.active(event.target.checked);
        }
    }
    function deletetable(event){
        if(confirmdelete){
            if(!confirm("IsOk!")) return;
        }
        var pr = "";
        for (e of trs) {
            var a = e.checkbox;
            if(a.checked){
                pr += a.value + ",";
            }
            window.location.href = "?method=delete&pr="+pr;
        }
    }   
</script>