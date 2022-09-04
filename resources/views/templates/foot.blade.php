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
<!-- <script src="/js/swiper.min.js"></script> -->
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
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {


   $('#Example').DataTable({
        processing: true,
        stateSave: true,
        order: [],
        dom: "lBfrtip", 
        buttons: [
            { extend: 'copy', footer: true },
            { extend: 'excel', footer: true },
            { extend: 'csv', footer: true },
            { extend: 'pdf', footer: true },
            { extend: 'print', footer: true,},
        ],
        rowReorder: {
            selector: "td:nth-child(2)",
        },
        responsive: true,
        footerCallback: function(row, data,start,end,display) {
          var api = this.api();

          var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };

            total = api
                .column(4)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            pageTotal = api
                .column(4, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            $(api.column(4).footer()).html('Rp. ' + pageTotal);
            // $(api.column(4).footer()).html('Rp. ' + pageTotal + ' ( Rp. ' + total + ' total)');
        }
    });


        let dateData = $('#dateRange').val();
        let minDateFilter = "";
        let maxDateFilter = "";
        let table = $.fn.dataTableExt.afnFiltering.push(
          function(settings, data, dataIndex) {
            data[3] = new Date(data[3]).getTime();
            if (typeof data[3] == 'undefined') {
              data[3] = new Date(data[0]).getTime();
            }
              if (minDateFilter && !isNaN(minDateFilter)) {
                  if (data[3] <= minDateFilter) {
                      return false;
                  }
              }

              if (maxDateFilter && !isNaN(maxDateFilter)) {
                  if (data[3] >= maxDateFilter) {
                      return false;
                  }
              }

              return true;
          }
        )

      $("#dateRange").on('change', function() {
          dateData = $(this).val();
          let splitDate = dateData.split("to")
          minDateFilter = new Date(splitDate[0]).getTime();
          maxDateFilter =new Date(splitDate[1]).getTime();

          // DataTables initialisation
          var table = $('#Example').DataTable();
          // Refilter the table
          $("#dateRange").on('change', function() {
              table.draw();
          });

      });

    flatpickr('.range', {
        mode: "range"
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

 var swiper = new Swiper(".swiper-container", {
  slidesPerView: 1.5,
  spaceBetween: 10,
  centeredSlides: true,
  freeMode: true,
  grabCursor: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  breakpoints: {
    500: {
      slidesPerView: 1
    },
    700: {
      slidesPerView: 1.5
    }
  }
});
</script>
@stack('scripts')
