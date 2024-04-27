@extends('admin.layouts.app')

@section('title', ($option ?? 'Agregar') . ' Usuario blog')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item active">Blog</li>
    </ol>
@endsection

@section('body')
	<div class="panel panel-default">
		<ul class="nav nav-tabs cnav-tabs" role="tablist">
			<li class="active" role="presentation">
				<a href="#info" aria-controls="info" role="tab" data-toggle="tab">INFORMACIÓN</a>
			</li>
			<li role="presentation">
				<a href="#passwd" aria-controls="passwd" role="tab" data-toggle="tab">CONTRASEÑA</a>
			</li>
		</ul>
		<form class="validate-form" method="POST" enctype="multipart/form-data" action="">
			{{ csrf_field() }}

			<div class="panel-body">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="info">
						<div class="row">
							<div class="form-group col-lg-4">
								<label>Nombre</label>
								<input type="text" name="dat[name]" class="form-control" value="{{ $reg->name ?? null }}" required>
							</div>
							<div class="form-group col-lg-4">
								<label>Num. Telefono</label>
								<input type="text" name="info[phone]" class="form-control" pattern="[0-9]{5,8}" value="{{ $reg->info->phone ?? null}}">
							</div>
							<div class="form-group col-lg-4">
								<label>Num. Celular</label>
								<input type="text" name="info[cellphone]" class="form-control" pattern="[0-9]{8,15}" value="{{ $reg->info->cellphone ?? null }}">
							</div>
                            <div class="col-lg-4 form-group">
                                        <label>Rol</label>
                                        {!! generate_select('dat[rol_id]', $roles, $rol_id ?? 0) !!}
                                    </div>
							<div class="form-group col-lg-4">
								<label>Email</label>
								<input type="email" name="dat[email]" class="form-control" value="{{ $reg->email ?? null }}" required>
							</div>
							<div class="form-group col-lg-8">
								<label>Dirección</label>
								<input type="text" name="info[address]" class="form-control" value="{{ $reg->info->address ?? null }}">
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="passwd">
						<div class="row">
							<div class="form-group col-lg-12">
								<label>Contraseña</label>
								<input type="password" name="dat[password]" class="form-control" @if(!isset($reg)) required @endif>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer bg-white">
				<button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
				<a class="btn btn-default" href="{{ route('users') }}">Cancelar</a>
			</div>
		</form>
	</div>
@endsection