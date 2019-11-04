<!--begin:: Widgets/Download Files-->
<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				<?php echo $_render_menu_label ?>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<button onclick="dt_add(this)" class="btn btn-success btn-bold btn-sm">
				<i class="fa fa-plus"></i> Tambah
			</button>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="mt-3 table-responsive">
			<table id="tabel-data" class="table table-bordered table-inverse table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Parent</th>
						<th>Label</th>
						<th>Controller</th>
						<th>Function</th>
						<th>Href</th>
						<th>Icon</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>
<!--end:: Widgets/Download Files-->

<!-- datatable utils -->

<div id="dt_btn_utils" class="d-none">
	<button class="btn btn-primary btn-sm dt-edit"><i class="fa fa-edit"></i></button>
	<button class="btn btn-google btn-sm dt-delete"><i class="fa fa-trash"></i></button>
</div>

<!--begin::Modal Manage-->
<div class="modal fade" id="modal_navbar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="form-navbar-manage" method="post">
	            <div class="modal-body">
	            	<div id="modal-body-navbar">
	            		
	            	</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	                <button type="submit" class="btn btn-success">Simpan</button>
	            </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal Manage-->

<!--begin::Modal Delete-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="form-navbar-delete" method="post">
	            <div class="modal-body">
	            	<div id="modal-body-delete">
	            		
	            	</div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	                <button type="submit" class="btn btn-google">Hapus</button>
	            </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal Delete-->

<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').dataTable({
			ajax:{url:"<?php echo base_url('administrator/system/navbars_fetch') ?>",dataSrc:""},
			columns: [
				{data: null, render: function(data, row, columns, meta) {
					return meta.row + 1;
				}},
				{data: 'navbar_parent_label'},
				{data: 'navbar_label'},
				{data: 'navbar_controller'},
				{data: 'navbar_function'},
				{data: 'navbar_href'},
				{data: null, render(data, row, columns, meta){
					return '<i class="'+data.navbar_icon+'"></i>';
				}},
				{data: 'status_label'},
				{data: null, render: function(data, row, columns, meta){
					var dt_btn_utils = $('#dt_btn_utils').clone();
					dt_btn_utils.find('.dt-edit').attr({'target-id': data.navbar_id, 'onclick': 'dt_edit(this)'});
					dt_btn_utils.find('.dt-delete').attr({'target-id': data.navbar_id, 'onclick': 'dt_delete(this)'});
					return dt_btn_utils.html();
				}},
			],
		});

		$('#form-navbar-manage').submit(function(event) {
			$.post('<?php echo base_url('administrator/system/navbars_save') ?>', $(this).serialize(), function(response, textStatus, xhr) {
				if (response.status == true) {
					toastr.success(response.msg);
					setTimeout(function() {
						window.location.reload();
					}, 2000);
				} else {
					toastr.error(response.msg);
				}
			}, "json");
			return false;
		});

		$('#form-navbar-delete').submit(function(event) {
			$.post('<?php echo base_url('administrator/system/navbars_delete') ?>', $(this).serialize(), function(response, textStatus, xhr) {
				if (response.status == true) {
					toastr.success(response.msg);
					setTimeout(function() {
						window.location.reload();
					}, 2000);
				} else {
					toastr.error(response.msg);
				}
			}, "json");
			return false;
		});
	});

	function dt_add(t) {
		$.get('<?php echo base_url('administrator/system/navbars_modal/modal_add') ?>').done(function(data) {
			$('#modal-body-navbar').html(data);
			$('#modal_navbar').modal('show');
		});
	}

	function dt_edit(t) {
		$.get('<?php echo base_url('administrator/system/navbars_modal/modal_edit') ?>', {'navbar_id':$(t).attr('target-id')}).done(function(data) {
			$('#modal-body-navbar').html(data);
			$('#modal_navbar').modal('show');
		});
	}

	function dt_delete(t){
		$.get('<?php echo base_url('administrator/system/navbars_modal/modal_delete') ?>', {'navbar_id':$(t).attr('target-id')}).done(function(data) {
			$('#modal-body-delete').html(data);
			$('#modal_delete').modal('show');
		});
	}
</script>