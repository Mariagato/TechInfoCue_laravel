@extends('email.layouts.app')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #F5F7FA" width="100%">
        <tr>
            <td valign="top" width="100%">
                <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" class="table_scale"
                                   style="background-color: {{get_info('template_color')}}; background-size:cover"
                                   width="600" background="{{asset('upload/mail/featured-background.png')}}">
                                <tr>
                                    <td align="center" width="100%">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="full"
                                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                               width="540">
                                            <tr>
                                                <td height="40">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="center"
                                                    style="padding-bottom: 5px; font-weight: 300; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color:#ffffff; font-size:24px; line-height:34px; mso-line-height-rule: exactly;">
                                                    Hola<br><span> <strong>{{$name}}</strong><br/></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" class="center"
                                                    style="margin: 0; font-weight: 300; font-size:15px ; color:#ffffff; font-family: 'Open Sans', Helvetica, Arial, sans-serif; line-height: 20px;mso-line-height-rule: exactly;">
                                                  <span>
                                                    Hemos recibido una solicitud de restablecimiento de contraseña para el usuario <a
                                                              style="color:#FFFFFF;font-weight: 600;"
                                                              href="mailto:{{$email}}">{{$email}}</a>
                                                    <br/><br/>
                                                    Para iniciar el proceso, haz clic en el siguiente enlace: <br>
                                                    <a style="color:#FFFFFF;font-weight: 600;"
                                                       href="{{route('password.reset',['token'=>$token])}}">
                                                        Reestablecer contraseña</a>
                                                    <br/><br/>
                                                    La URL caducará en 24 horas por motivos de  seguridad.
                                                    <br/><br/>
                                                    Si no has sido tu el que ha realizado la solicitud de restablecimiento de contraseña, haz caso omiso de este mensaje.<br/>
                                                    Si sigues experimentando problemas para acceder a tu cuenta, responde este mensaje indicando el problema.<br/>
                                                    <br/>
                                                    Cualquier duda estaremos atentos<br/><br/></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top: 15px;" valign="top">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                           style="background-color: #FFFFFF; border-radius: 5px; margin: 0">
                                                        <tr>
                                                            <td align="center"
                                                                style="background-color: #FFFFFF; border-radius: 5px; color: #0079ff; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 26px; margin: 0 !important; padding: 10px 25px"
                                                                valign="middle">
                                                                <a href="{{route('home')}}"
                                                                   style="border: none; font-weight: normal; font-style: normal; color:{{get_info('template_color')}};">Ir
                                                                    a la página</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="40">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

@endsection