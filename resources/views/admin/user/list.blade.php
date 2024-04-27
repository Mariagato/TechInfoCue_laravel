@extends('admin.layouts.app')

@section('body')
	<div class="panel panel-default">
		<div class="panel-heading heading-actions">
			<a class="btn btn-outline-main btn-sm" href="{{ route('users.edit',['id' => 0]) }}">
				<i class="fa fa-plus-circle"></i>
				<span> Agregar Usuario Blog</span>
			</a>
		</div>
		<div class="list_table">
			<table class="table table-striped b-t b-b" id="datatable" width="100%">
				<thead>
					<tr>
						<th width="10">#</th>
						<th>Nombre</th>
						<th>Usuario (correo)</th>
						<th>Celular</th>
						{{-- <th>Email</th> --}}
						<th width="150">Opciones</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
@endsection

@section('js_vars')
	<script>
		var del_message = '¿Deseas eliminar este usuario?',
            title_order_model = 'users',
            url_get_model = '{{ route('users') }}',
            columns = [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
                },
				{
                    "data": "info_users.phone"
                },
                {
                    "data": "options"
                }
            ];
	</script>
@endsection	