<?php
  $bodyLogInNewUser = '<!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta name="x-apple-disable-message-reformatting">
      <title></title>
      <!--[if mso]>
      <style>
        table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
        div, td {padding:0;}
        div {margin:0 !important;}
        a[href]{color: #ffffff;}
      </style>
      <noscript>
        <xml>
          <o:OfficeDocumentSettings>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
      </noscript>
      <![endif]-->
      <style>
        table, td, div, h1, p, a {
          font-family: Arial, sans-serif;
        }
        table a[href]{
          color: #ffffff;
        }
        @media screen and (max-width: 530px) {
          .unsub {
            display: block;
            padding: 8px;
            margin-top: 14px;
            border-radius: 6px;
            background-color: #555555;
            text-decoration: none !important;
            font-weight: bold;
          }
          .col-lge {
            max-width: 100% !important;
          }
        }
        @media screen and (min-width: 531px) {
          .col-sml {
            max-width: 27% !important;
          }
          .col-lge {
            max-width: 73% !important;
          }
        }
      </style>
    </head>
    <body style="margin:0;padding:0;word-spacing:normal;background-color:#ffffff;">
      <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#ffffff;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
          <tr>
            <td align="center" style="padding:0;">
              <!--[if mso]>
              <table role="presentation" align="center" style="width:600px;">
              <tr>
              <td>
              <![endif]-->
              <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">';

                if(!empty($obj_user->getEmail_user())){
$bodyLogInNewUser .= '<tr>
                  <td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#ede7e7;">
                    <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;text-align:center;">'.$lang_global["DATOS DE ACCESO"].'</h1>
                    <p style="margin:0;font-size:14px;line-height:20px;color:#ffffff"><strong>'.$lang_global["Nombre"].':</strong> '.(!empty($obj_user->getName_user()) ? $obj_user->getName_user() : $lang_global["Usuario"]).'</p>
                    <p style="margin:0;font-size:14px;line-height:20px;color:#ffffff"><strong>'.$lang_global["Correo electrónico"].':</strong> <a href="mailto:'.$obj_user->getEmail_user().'" target="_blank" style="color: #ffffff;text-decoration:none;">'.$obj_user->getEmail_user().'</a></p>
                  </td>
                </tr>';
                }

$bodyLogInNewUser .= '<tr>
                  <td style="padding:30px;background-color:#ffffff;text-align: center;">
                    <p style="margin:0;">
                      <a href="'.(defined('URL_CARPETA_FRONT') ? URL_CARPETA_FRONT : URL_FRONT).'iniciar-sesion" style="background: #f4c858; text-decoration: none; padding: 13px 35px; color: #000000; border-radius: 100px; display:inline-block; mso-padding-alt:0;text-underline-color:#f4c858">
                        <!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%;mso-text-raise:20pt">&nbsp;</i><![endif]-->
                        <span style="mso-text-raise:10pt;font-weight:bold;">'.$lang_global["Acceder"].'</span>
                        <!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%">&nbsp;</i>
                        <![endif]-->
                      </a>
                    </p>
                  </td>
                </tr>
              </table>
              <!--[if mso]>
              </td>
              </tr>
              </table>
              <![endif]-->
            </td>
          </tr>
        </table>
      </div>
    </body>
  </html>';