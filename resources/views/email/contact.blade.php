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
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                                            <tr>
                                                <td class="spacer" width="30"></td>
                                                <td width="540">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                           class="full"
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
                                                                Soy <br>
                                                                <span> <strong>{{$name}}</strong> <br>
                                                                    <span style="font-family: 'Open Sans', Helvetica, Arial, sans-serif; color:#ffffff; font-size:18px;">
                                                                        @if(isset($email))<a style="color:#FFF"
                                                                                             href="mailto:{{$email}}">{{$email}}</a>
                                                                        <br>@endif
                                                                        @if(isset($city)) {{$city}} / @endif

                                                                        @if(isset($phone))<a style="color:#FFF"
                                                                                             href="tel:{{$phone}}">{{$phone}}</a>@endif
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td align="center" class="center"
                                                                style="margin: 0; font-weight: 300; font-size:16px ; color:#ffffff; font-family: 'Open Sans', Helvetica, Arial, sans-serif; line-height: 26px;mso-line-height-rule: exactly;">
                                                                <span>{{$message_form}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="40">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="spacer" width="30"></td>
                                            </tr>
                                            <!--[if gte mso 9]> </v:textbox> </v:rect> <![endif]-->
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