<?php $sidebar_parent = $this->db->order_by('sidebar_index', 'asc')->where('sidebar_status', '1')->where('sidebar_parent', '0')->get('_sys_sidebar')->result() ?>
<?php $parent_submenu = $this->db->where('sidebar_controller', $_controller)->where('sidebar_function', $_function)->get('_v_sys_sidebar'); ?>
<?php function generate_menu($sidebar_id) {?>
    <?php $controller = get_instance()->router->fetch_class(); ?>
    <?php $function = get_instance()->router->fetch_method(); ?>
    <?php 
        $parent = get_instance()->db->order_by('sidebar_index', 'asc')->where('sidebar_status', '1')->where('sidebar_id', $sidebar_id)->get('_sys_sidebar')->row();
        $child = get_instance()->db->order_by('sidebar_index', 'asc')->where('sidebar_status', '1')->where('sidebar_parent', $parent->sidebar_id)->get('_sys_sidebar');
        $is_have_childs = $child->num_rows(); 
        $childs = $child->result(); 
    ?>

    <?php if ($is_have_childs > 0): ?>
    <li id="sidebar_<?php echo strtolower(str_replace(' ', '-', $parent->sidebar_label)) ?>" class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon <?php echo $parent->sidebar_icon ?>"></i><span class="kt-menu__link-text"><?php echo $parent->sidebar_label ?></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
		<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
			<ul class="kt-menu__subnav">
				<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text"><?php echo $parent->sidebar_label ?></span></span></li>
		        <?php foreach ($childs as $var): ?>
		            <?php generate_menu($var->sidebar_id) ?>
		        <?php endforeach ?>
		     </ul>
		</div>
	</li>
    <?php else: ?>
		<li class="kt-menu__item <?php echo (($parent->sidebar_controller == $controller) && ($parent->sidebar_function == $function)) ? 'kt-menu__item--active' : '' ?>" aria-haspopup="true"><a href="<?php echo base_url($parent->sidebar_href) ?>" class="kt-menu__link "><i class="kt-menu__link-icon <?php echo $parent->sidebar_icon ?>"></i><span class="kt-menu__link-text"><?php echo $parent->sidebar_label ?></span></a></li>
	<?php endif ?>
<?php } ?>

<ul class="kt-menu__nav ">

    <?php foreach ($sidebar_parent as $var): ?>
        <?php generate_menu($var->sidebar_id) ?>
    <?php endforeach ?>

</ul>

<?php if ($parent_submenu->num_rows() > 0): ?>
    <script type="text/javascript">
        $('#sidebar_<?php echo strtolower(str_replace(' ', '-', $parent_submenu->row('sidebar_controller_parent_label'))) ?>').addClass('kt-menu__item--active');
    </script>
<?php endif ?>