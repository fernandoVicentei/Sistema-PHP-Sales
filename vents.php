<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />


<div class="container  paddinglados">
    <h1  class="text-titulo">Historial de Ventas  <h1>

    <div class="container paddinglados boxshadow borderRadius ">
    <div class="container-full borderTop">
          <h2 class="has-text-centered has-text-white  is-size-4"> Filtro de Ventas  </h2>
        </div>
    <div class="table-container">
        <table class="table is-fullwidth" id="example"  data-order='[[ 5, "asc" ]]' data-page-length='5'>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>Fernando Vicente</td>
                <td>rfdfdfdsfdsfdsfdsfdsfdfs33ds</td>
                <td>
                    <span class="icon has-text-info">
                    <i class="fas fa-edit"></i>
                    </span>
                    <span class="icon has-text-danger">
                    <i class="fas fa-trash"></i>
                    </span>

                </td>
            </tr>
            <tr>
                <th>1</th>
                <td>Fernando Vicente</td>
                <td>rfdfdfdsfdsfdsfdsfdsfdfs33ds</td>
                <td>
                    <span class="icon has-text-info">
                    <i class="fas fa-edit"></i>
                    </span>
                    <span class="icon has-text-danger">
                    <i class="fas fa-trash"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th>1</th>
                <td>Fernando Vicente</td>
                <td>rfdfdfdsfdsfdsfdsfdsfdfs33ds</td>
                <td>
                    <span class="icon has-text-info">
                    <i class="fas fa-edit"></i>
                    </span>
                    <span class="icon has-text-danger">
                    <i class="fas fa-trash"></i>
                    </span>
                </td>
            </tr>
            <tr>
                <th>1</th>
                <td>Fernando Vicente</td>
                <td>rfdfdfdsfdsfdsfdsfdsfdfs33ds</td>
                <td>
                   <span class="icon has-text-info">
                    <i class="fas fa-edit"></i>
                    </span>
                    <span class="icon has-text-danger">
                    <i class="fas fa-trash"></i>
                    </span>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</diV>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script>
$(document).ready(function() {
	$('#example').DataTable({
		"columnDefs": [{
			"targets": 0
		}],
		language: {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ resultados",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": "Mostrando resultados _START_-_END_ de  _TOTAL_",
			"sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
			"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sSearch": "Buscar:",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
		}
	});
});

</script>