<!--end::Modals-->
		<!--begin::Javascript-->
<!--		<script>var hostUrl = "{{asset('assets')}}/";</script>-->
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<!--		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>-->
<!--		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>-->
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
<!--		<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>-->
<!--		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>-->
<!--		<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>-->
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
<!--		<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>-->
<!--		<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>-->
<!--		<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>-->
<!--		<script src="{{asset('assets/js/custom/utilities/modals/create-campaign.js')}}"></script>-->
<!--		<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>-->
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
<!--<script>-->
<!--    $(document).ready(function (){-->

<!--        $.ajaxSetup({-->
<!--            headers: {-->
<!--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')-->
<!--            }-->
<!--        });-->
<!--    })-->



<!--</script>-->

<!--@yield('js')-->


<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "{{asset('assets')}}/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
	 	<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('assets/js/custom/apps/ecommerce/catalog/products.js')}}"></script>
		<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/create-campaign.js')}}"></script>
		<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
		<!--end::Custom Javascript-->

		<!--end::Javascript-->
<script>
    $(document).ready(function (){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })



</script>
<!--<script src="{{asset('assets/js/jquery.min.js')}}"></script>-->

<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		document.querySelectorAll('.ckeditor').forEach(editorElement => {
			ClassicEditor
					.create(editorElement)
					.catch(error => {
						console.error(error);
					});
		});
	});
</script>

<!--  Smart Wizard -->
<script src="{{asset('assets/js/smartWizard.js')}}"></script>
<script type="text/javascript">
	document.querySelectorAll('input[type="date"], input[type="time"]').forEach(function(input) {
		input.addEventListener("click", function() {
			this.showPicker();
		});
	});
</script>


<!--  DataTables Scripts -->
<!-- <script src="{{asset('assets/js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/pdfmake.min.js')}}"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
			"language": {
				"search": "Search:",
				"lengthMenu": "Show _MENU_ records",
				"info": "Showing _START_ to _END_ of _TOTAL_ records",
				"paginate": {
					"next": "Next",
					"previous": "Previous"
				}
			}
		});
	});
</script>-->

<!----- select2 ---->
<script src="{{asset('assets/js/select2.min.js')}}"></script>
<script>
	$(document).ready(function() {
		$('.select2').select2();
	});
</script>

@yield('js')
