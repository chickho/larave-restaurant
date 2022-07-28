<!-- Libs JS -->
<script src="/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/libs/jquery/dist/jquery.slim.min.js"></script>
<script src="/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="/libs/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="/libs/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="/libs/flatpickr/dist/plugins/rangePlugin.js"></script>
<script src="/libs/peity/jquery.peity.min.js"></script>
<!-- Tabler Core -->
<script src="/js/jquery-3.6.0.min.js"></script>
<script src="/js/tabler.min.js"></script>
<script src="/libs/sweetalert2/js/sweetalert2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {

    $('#Example').DataTable({
        processing: true,
        stateSave: true,
        order: [],
        dom: "lBfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],


        rowReorder: {
            selector: "td:nth-child(2)",
        },

        responsive: true,
    });

});
</script>
<script>
 document.body.style.display = "block"
</script>
<script>
 function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function(oFREvent) {
   imgPreview.src = oFREvent.target.result;
  }
 }
</script>
@stack('scripts')
