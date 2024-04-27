@extends('admin.layouts.app')

@section('title', 'Mi cuenta')

@section('breadcrumb')
    <ol class="breadcrumb bread-main">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi-action-home"></i></a></li>
        <li class="breadcrumb-item active">Mi cuenta</li>
    </ol>
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ul class="nav nav-tabs cnav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab"
                                                              data-toggle="tab">INFORMACIÓN</a></li>
                </ul>
                <form class="validate-form" method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="info">
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{$reg->name ?? null}}" required/>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Email (Usuario)</label>
                                        <input type="email" class="form-control" name="email"
                                               value="{{$reg->email ?? null}}" required/>
                                        @if ($errors->has('email'))
                                            <small class="invalid-feedback">
                                                {{ $errors->first('email') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <label class="md-check">
                                                <input type="checkbox" class="show_pass_check" id="change_password"
                                                        {{ ($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation')) ? 'checked' : ''  }}>
                                                <i class="indigo"></i>
                                                Cambiar contraseña
                                            </label>
                                        </p>
                                    </div>

                                    <div class="col-lg-4 form-group show_pass">
                                        <label>Contraseña actual</label>
                                        <input type="password" class="form-control"
                                               name="current_password" disabled required/>
                                        @if ($errors->has('current_password'))
                                            <small class="invalid-feedback">
                                                {{ $errors->first('current_password') }}
                                            </small>
                                        @endif
                                    </div>

                                    <div class="col-lg-4 form-group show_pass">
                                        <label>Nueva contraseña</label>
                                        <input type="password" class="form-control" id="password"
                                               name="password" disabled required/>
                                        @if ($errors->has('password'))
                                            <small class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </small>
                                        @endif
                                    </div>

                                    <div class="col-lg-4 form-group show_pass">
                                        <label>Repite tu nueva contraseña</label>
                                        <input type="password" class="form-control" id="retype_password"
                                               name="password_confirmation" disabled required/>
                                        @if ($errors->has('password_confirmation'))
                                            <small class="invalid-feedback">
                                                {{ $errors->first('password_confirmation') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer bg-white">
                        <button type="submit" class="btn btn-main"><i class="fa fa-save"></i> Guardar</button>
                        <a href="{{route('dashboard')}}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection