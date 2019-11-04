<?php $navbar_parent = $this->db->order_by('navbar_id', 'asc')->where('navbar_status', '1')->where('navbar_parent', '0')->get('_sys_navbar')->result() ?>
<?php function generate_navbar($navbar_id) {?>
    <?php 
        $parent = get_instance()->db->order_by('navbar_id', 'asc')->where('navbar_status', '1')->where('navbar_id', $navbar_id)->get('_sys_navbar')->row();
        $child = get_instance()->db->order_by('navbar_id', 'asc')->where('navbar_status', '1')->where('navbar_parent', $parent->navbar_id)->get('_sys_navbar');
        $is_have_childs = $child->num_rows(); 
        $childs = $child->result(); 
    ?>

    <?php if ($is_have_childs > 0): ?>
    <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon <?php echo $parent->navbar_icon ?>"></i><span class="kt-menu__link-text"><?php echo $parent->navbar_label ?></span><i class="kt-menu__hor-arrow la la-angle-down"></i><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
		<div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
			<ul class="kt-menu__subnav">
		        <?php foreach ($childs as $var): ?>
		            <?php generate_navbar($var->navbar_id, 1) ?>
		        <?php endforeach ?>
		     </ul>
		</div>
	</li>
    <?php else: ?>
    	<li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url($parent->navbar_href) ?>" class="kt-menu__link "><i class="kt-menu__link-icon <?php echo $parent->navbar_icon ?>"></i><span class="kt-menu__link-text"><?php echo $parent->navbar_label ?></span></a></li>
	<?php endif ?>
<?php } ?>
 
<ul class="kt-menu__nav ">

    <?php foreach ($navbar_parent as $var): ?>
        <?php generate_navbar($var->navbar_id) ?>
    <?php endforeach ?>

</ul>