    <?php $depth = 1;
    foreach ($menus as $menu){
        $pos = explode('-', $menu->position);
        while ($depth > count($pos)){?>
                        </ul>
                    </li>
                    <?php $depth--;
        }
        $depth = count($pos);
        if($menu->uri == ''){?>
            <li><?php echo $menu->content?> :separator &nbsp; &nbsp; -
                <?php $value = $menu->node_id.'~'.$menu->content.'~'.$menu->title.'~'.$menu->uri.'~'.$menu->role_id.'~'.$menu->module_target.'~'.$menu->position;?>
                <a href="#" onclick="edit('<?php echo $value?>')">edit</a>
                <a href="<?php echo base_url('menus/delete/'.$menu->node_id)?>"><i class="fa fa-times"></i></a>
            </li>
        <?php } else if($menu->uri != '#'){?>
        <li title="<?php echo $menu->title?>">
            <span><?php echo $menu->content?></span> &nbsp; &nbsp; -
            <?php $value = $menu->node_id.'~'.$menu->content.'~'.$menu->title.'~'.$menu->uri.'~'.$menu->role_id.'~'.$menu->module_target.'~'.$menu->position;?>
            <a href="#" onclick="edit('<?php echo $value?>')">edit</a> &nbsp;
            <a href="<?php echo base_url('menus/delete/'.$menu->node_id)?>"><i class="fa fa-times"></i></a>
        </li>
        <?php } else {?>
        <li>
            <span>
                <?php echo $menu->content?>
            </span> &nbsp; &nbsp; -
            <?php $value = $menu->node_id.'~'.$menu->content.'~'.$menu->title.'~'.$menu->uri.'~'.$menu->role_id.'~'.$menu->module_target.'~'.$menu->position.'~'.$menu->note;?>
            <a href="#" onclick="edit('<?php echo $value?>')">edit</a>
            <a href="<?php echo base_url('menus/delete/'.$menu->node_id)?>"><i class="fa fa-times"></i></a>
            <ul>
        <?php }
    }?>
