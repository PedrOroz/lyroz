<?php
  $body = '<!DOCTYPE html>
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
          font-family: "Open Sans", Arial, sans-serif;
        }
        p {
          margin:0 0 7px !important;
        }
        table a[href]{
          color: #000;
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
              <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:\'Open Sans\', Arial,sans-serif;font-size:15px;line-height:22px;color:#363636;">
                <tr>
                  <td style="padding:50px 30px 10px;background-color:#ffffff;">
                    '.(!empty($nombre) ? '<h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
                      '.ucwords(strtolower($nombre)).'
                    </h1>' : '').'
                    '.(!empty($email) ? '<p style="display: flex;align-items: center;justify-content: start;">
                      <a href="#" style="text-decoration:none;display: inline-flex">
                        <img src="cid:blackemailicon" width="30" height="30" alt="email" style="display:inline-block;color:#cccccc; margin-right:10px;">
                      </a>'.$email.'</p>' : '').'
                    '.(!empty($tel) ? '<p style="display: flex;align-items: center;justify-content: start;">
                      <a href="#" style="text-decoration:none;display: inline-flex">
                        <img src="cid:blackphoneicon" width="30" height="30" alt="'.LANG_TEL.'" style="display:inline-block;color:#cccccc; margin-right:10px;">
                      </a>'.$tel.'</p>' : '').'
                    '.(!empty($estado) ? '<p style="display: flex;align-items: center;justify-content: start;">
                      <img src="cid:blackstateicon" width="30" height="30" alt="'.LANG_ESTADO.'" style="display:inline-block;color:#cccccc; margin-right:10px;">
                      '.LANG_ESTADO.'&nbsp;<b>'.$estado.'</b></p>' : '').'
                    '.(!empty($ciudad) ? '<p style="display: flex;align-items: center;justify-content: start;">
                      <img src="cid:blackcityicon" width="30" height="30" alt="'.LANG_CIUDAD.'" style="display:inline-block;color:#cccccc; margin-right:10px;">
                      '.LANG_CIUDAD.'&nbsp;<b>'.$ciudad.'</b></p>' : '').'
                    '.(!empty($compania) ? '<p style="display: flex;align-items: center;justify-content: start;">
                      <img src="cid:blackcompanyicon" width="30" height="30" alt="'.LANG_EMPRESA.'" style="display:inline-block;color:#cccccc; margin-right:10px;">
                      '.LANG_EMPRESA.'&nbsp;<b>'.$compania.'</b></p>' : '').'
                    <p style="display: flex;align-items: center;justify-content: start;">
                      <img src="cid:blackagreeicon" width="30" height="30" alt="Check1" style="display:inline-block;color:#cccccc; margin-right:10px;">
                      <b>'.$check1.'</b>&nbsp;'.LANG_CHECK1.'</p>
                    '.(!empty($ciudad) ? '<p style="display: flex;align-items: center;justify-content: start;">
                      <img src="cid:'.($check2 == 'No' ? 'blackdisagreeicon' : 'blackagreeicon').'" width="30" height="30" alt="Check2" style="display:inline-block;color:#cccccc; margin-right:10px;">
                      <b>'.$check2.'</b>&nbsp;'.LANG_CHECK2_1.'&nbsp;<b>'.WEBSITE.'</b>&nbsp;'.LANG_CHECK2_2.'</p>' : '').'
                  </td>
                </tr>
                </tr>
                '.(!empty($mensaje) ? '<tr>
                  <td style="padding:15px 30px;background-color:#ffffff;color:#000000;border-top: 1px solid #bdc1c3;">
                    <p style="margin:0 0 8px 0;">'.$mensaje.'</p>
                  </td>
                </tr>' : '').'
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