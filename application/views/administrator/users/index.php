<style type="text/css">
	#tabel-data tr th {
		white-space: nowrap;
	}
	#tabel-data tr td {
		white-space: nowrap;
	}
</style>
<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				<?php echo $_render_menu_label ?>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<a href="<?php echo base_url('administrator/system/users_add') ?>" class="btn btn-success btn-bold btn-sm">
				<i class="fa fa-plus"></i> Tambah
			</a>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="mt-3 table-responsive">
			<table id="tabel-data" class="table table-bordered table-inverse table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Grup</th>
						<th>Nama Depan</th>
						<th>Nama Belakang</th>
						<th>Tgl Lahir</th>
						<th>Telepon</th>
						<th>Email</th>
						<th>Username</th>
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

<!-- datatable utils -->

<div id="dt_btn_utils" class="d-none">
	<a class="btn btn-primary btn-sm dt-edit"><i class="fa fa-edit"></i></a>
	<button class="btn btn-google btn-sm dt-delete"><i class="fa fa-trash"></i></button>
</div>

<!--begin::Modal-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peringatan !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="form-delete" method="post">
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
<!--end::Modal-->

<script type="text/javascript">
	$(document).ready(function() {

		$('#tabel-data').dataTable({
			ajax:{url:"<?php echo base_url('administrator/system/users_fetch') ?>",dataSrc:""},
			columns: [
				{data: null, render: function(data, row, columns, meta) {
					return meta.row + 1;
				}},
				{data: 'group_label'},
				{data: 'user_firstname'},
				{data: 'user_lastname'},
				{data: 'user_birth'},
				{data: 'user_phone'},
				{data: 'user_email'},
				{data: 'user_username'},
				{data: 'status_label'},
				{data: null, render: function(data, row, columns, meta){
					var dt_btn_utils = $('#dt_btn_utils').clone();
					var url = "<?php echo base_url('administrator/system/users_edit') ?>/";
					dt_btn_utils.find('.dt-edit').attr('href', url+data.user_id);
					dt_btn_utils.find('.dt-delete').attr({'target-id': data.user_id, 'onclick': 'dt_delete(this)'});
					return dt_btn_utils.html();
				}},
			],
		});

		$('#form-delete').submit(function(event) {
			$.post('<?php echo base_url('administrator/system/users_delete') ?>', $(this).serialize(), function(response, textStatus, xhr) {
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

	function dt_delete(t) {
		$.get('<?php echo base_url('administrator/system/users_modal/modal_delete') ?>', {'user_id': $(t).attr('target-id')}).done(function(data) {
			$('#modal-body-delete').html(data);
			$('#modal_delete').modal('show');
		});
	}
</script>