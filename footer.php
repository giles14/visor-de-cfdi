<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$.extend( true, $.fn.dataTable.defaults, {
"searching": true,
"ordering": true,

} );
$(document).ready( function () {
$('table.dataTable').DataTable({
  "language": {
        "lengthMenu": "Mostrando _MENU_ filas por página",
        "zeroRecords": "No hay datos para mostrar - disculpa",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Sin datos",
        "infoFiltered": "(Filtrado de _MAX_ total de registros)"
  },
  /*stateSave: true,*/
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
  "pageLength": 50

});
} );
</script>
<script type="text/javascript">
$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
  $('#sidebar, #content').toggleClass('active');
  });
  });
</script>

</body>
</html>
