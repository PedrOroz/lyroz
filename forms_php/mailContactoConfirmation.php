<?php
  $body_confirmation = '<!DOCTYPE html>
    <html lang="es" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
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
              <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                <tr>
                  <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                    <a href="'.(defined('URL_CARPETA_FRONT') ? URL_CARPETA_FRONT : URL_FRONT).'" style="text-decoration:none;">
                      <img src="cid:logoemailheader" width="165" alt="Logo" style="width:165px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0;font-size:24px;line-height:28px;font-weight:bold;">
                    <a href="'.(defined('URL_CARPETA_FRONT') ? URL_CARPETA_FRONT : URL_FRONT).'" style="text-decoration:none;">
                      <img src="cid:headerbienvenido" width="600" alt="" style="width:100%;height:auto;display:block;border:none;text-decoration:none;color:#363636;">
                      </a>
                  </td>
                </tr>
                <tr>
                  <td style="padding:30px;background-color:#ffffff;">
                    <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;text-align:center;">
                      '.LANG_BIENVENIDO.' '.WEBSITE.'!
                    </h1>
                    <p style="margin:0;text-align:center;">
                      '.LANG_ESTIMADO.' <strong>'.ucwords(strtolower($nombre)).',</strong> '.LANG_MENSAJE_CORREO_AUTORESPUESTA1.' '.WEBSITE.' '.LANG_MENSAJE_CORREO_AUTORESPUESTA2.'
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="padding:30px;text-align:center;font-size:12px;background-color:#ffffff;color:#000000;border-top: 1px solid #bdc1c3;">
                    <p style="margin:0 0 8px 0;">
                      <a href="'.(defined('URL_FACEBOOK') ? URL_FACEBOOK : URL_FACEBOOK_CMS).'" style="text-decoration:none;">
                        <img src="cid:facebookicon" width="40" height="40" alt="Facebook" style="display:inline-block;color:#cccccc;">
                      </a>
                      <a href="'.(defined('URL_INSTAGRAM') ? URL_INSTAGRAM : URL_INSTAGRAM_CMS).'" style="text-decoration:none;">
                        <img src="cid:instagramicon" width="40" height="40" alt="Instagram" style="display:inline-block;color:#cccccc;">
                      </a>
                      <a href="'.(defined('URL_LINKEDIN') ? URL_LINKEDIN : URL_LINKEDIN_CMS).'" style="text-decoration:none;">
                        <img src="cid:linkedinicon" width="40" height="40" alt="Linkedin" style="display:inline-block;color:#cccccc;">
                      </a>
                      <a href="'.(defined('URL_PINTERES') ? URL_PINTERES : URL_PINTERES_CMS).'" style="text-decoration:none;">
                        <img src="cid:pinteresicon" width="40" height="40" alt="Pinteres" style="display:inline-block;color:#cccccc;">
                      </a>
                      <a href="'.(defined('URL_VIMEO') ? URL_VIMEO : URL_VIMEO_CMS).'" style="text-decoration:none;">
                        <img src="cid:vimeoicon" width="40" height="40" alt="Vimeo" style="display:inline-block;color:#cccccc;">
                      </a>
                      <a href="'.(defined('URL_YOUTUBE') ? URL_YOUTUBE : URL_YOUTUBE_CMS).'" style="text-decoration:none;">
                        <img src="cid:youtubeicon" width="40" height="40" alt="Youtube" style="display:inline-block;color:#cccccc;">
                      </a>
                      <a href="'.(defined('URL_WHATSAPP') ? URL_WHATSAPP : URL_WHATSAPP_CMS).'" style="text-decoration:none;">
                        <img src="cid:whatsappicon" width="40" height="40" alt="Whatsapp" style="display:inline-block;color:#cccccc;">
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