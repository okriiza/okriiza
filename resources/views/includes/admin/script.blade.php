<script src="{{ url('themes/backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('themes/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('themes/backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ url('themes/backend/js/sb-admin-2.min.js') }}"></script>
{{-- <script src="{{ url('themes/backend/vendor/chart.js/Chart.min.js') }}"></script> --}}
{{-- <script src="{{ url('themes/backend/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('themes/backend/js/demo/chart-pie-demo.js') }}"></script> --}}
<script src="{{ url('themes/backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('themes/backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('themes/backend/js/demo/datatables-demo.js') }}"></script>
<script src="{{ url('themes/backend/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('themes/backend/vendor/select2/dist/js/select2.min.js') }}"></script>

<script>
	CKEDITOR.replace('body',{
		filebrowserUploadUrl: "{{route('post.articleimage', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
		
	});
</script>
<script>
	$(document).ready(function() {
		$('.select2').select2({
			tags: true,
			tokenSeparators: [','],
			placeholder: "Select Category",
			// allowClear: true
		});
	});
</script>