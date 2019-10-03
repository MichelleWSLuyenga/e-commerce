<?php
  include('../../connect.php');
  $id = $_GET["id"];
  $sql = " SELECT * FROM admin_reseller WHERE id = '".$id."' ";
  $query = mysql_db_query($dbname, $sql) or die("Can't Query");
  $row = mysql_fetch_array($query);

  $reseller_username = $row['reseller_username'];
  $reseller_password = $row['reseller_password'];
  $reseller_firstname = $row['reseller_firstname'];
  $reseller_lastname = $row['reseller_lastname'];
  $reseller_email = $row['reseller_email'];

  require_once('class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->IsHTML(true);
  $mail->IsSMTP();
  $mail->SMTPAuth = true; // enable SMTP authentication
  //$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
  $mail->Host = "mail.vgreseller.com"; // sets GMAIL as the SMTP server
  $mail->Port = 25; // set the SMTP port for the GMAIL server
  $mail->Username = "do-not-reply@vgreseller.com"; // GMAIL username
  $mail->Password = "demo166"; // GMAIL password
  $mail->From = "do-not-reply@vgreseller.com"; // "name@yourdomain.com";
  $mail->FromName = "Reseller Online";  // set from Name
  $mail->Subject = "[Reseller Online Account] New sign-in";
  $mail->Body = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
  <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
  <meta name='format-detection' content='date=no' />
  <meta name='format-detection' content='address=no' />
  <meta name='format-detection' content='telephone=no' />
  <meta name='x-apple-disable-message-reformatting' />
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i' rel='stylesheet' />
  <title>Email Template</title>
  <style type='text/css' media='screen'>
    body { padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4f4f4; -webkit-text-size-adjust:none }
    a { color:#b04d4d; text-decoration:none }
    p { padding:0 !important; margin:0 !important } 
    img { -ms-interpolation-mode: bicubic; }
    .mcnPreviewText { display: none !important; }       
    @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
      u + .body .gwfw { width:100% !important; width:100vw !important; }
      .m-shell { width: 100% !important; min-width: 100% !important; }
      .m-center { text-align: center !important; }
      .center { margin: 0 auto !important; }
      .p10 { padding: 10px !important; }
      .p30-20 { padding: 30px 20px !important; }
      .td { width: 100% !important; min-width: 100% !important; }
      .m-br-15 { height: 15px !important; }
      .m-td,
      .m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }
      .m-block { display: block !important; }
      .fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }
      .logo img { width: 100% !important; max-width: 190px !important; height: auto !important; }
      .column,
      .column-top,
      .column-bottom { float: left !important; width: 100% !important; display: block !important; }
      .content-spacing { width: 15px !important; }
    }
  </style>
</head>
<body class='body' style='padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4f4f4; -webkit-text-size-adjust:none;'>
  <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#f4f4f4' class='gwfw'>
    <tr>
      <td align='center' valign='top' style='padding: 50px 10px;' class='p10'>
        <table width='650' border='0' cellspacing='0' cellpadding='0' class='m-shell'>
          <tr>
            <td class='td' bgcolor='#ffffff' style='border-radius: 6px; width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;'>
              <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td bgcolor='#ffffff' style='padding: 25px 50px; border-bottom: 2px solid #f4f4f4; border-radius: 6px 6px 0px 0px;' class='p30-20'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td width='200' class='logo img' style='font-size:0pt; line-height:0pt; text-align:left;'><img src='cid:dark' alt='PHPMailer' width='191' height='35' border='0' alt='' /></td>
                        <td class='img' width='20' style='font-size:0pt; line-height:0pt; text-align:left;'></td>
                        <td align='right' width='120'>
                          <table border='0' cellspacing='0' cellpadding='0'>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td style='padding: 50px; border-bottom: 2px solid #f4f4f4;' class='p30-20'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td class='fluid-img' style='padding-bottom: 40px; font-size:0pt; line-height:0pt; text-align:left;'><img src='cid:logo' alt='PHPMailer' width='550' height='292' border='0' alt='' /></td>
                      </tr>
                      <tr>
                        <td>
                          <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                              <th class='column-top' width='300' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;'>
                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td class='h2' style='color:#333333; font-family: Montserrat, Arial, sans-serif; font-size:30px; line-height:40px; text-align:left;'><multiline> Welcome to VG Online Platform. <span class='m-hide'><br /><br /></span>
                                    </multiline></td>
                                  </tr>
                                  <tr>
                                    <td class='h5' style='padding-bottom: 20px; color:#000000; font-family:Montserrat, Arial, sans-serif; font-size:14px; line-height:18px; text-align:left; font-weight:bold; text-transform:uppercase;'><multiline> Dear ".$reseller_firstname." ".$reseller_lastname.",<br /></multiline></td>
                                  </tr>
                                </table>
                              </th>
                              <th style='padding-bottom: 25px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;' class='column' width='20'></th>
                              <th class='column-top' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;'>
                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td class='text' style='padding-bottom: 20px; color:#000000; font-family:Arial, sans-serif; font-size:15px; line-height:30px; text-align:left; min-width:auto !important;'><multiline>Here are your login details.<br /> Username : ".$reseller_username."<br /> Password : ".$reseller_password."<br /></multiline></td>
                                  </tr>
                                  <tr>
                                    <td class='price' style='padding-bottom: 20px; color:#000000; font-family: Montserrat, Arial, sans-serif; font-size:20px; line-height:24px; text-align:left; font-weight:bold;'><multiline>
                                    </multiline></td>
                                  </tr>
                                  <tr>
                                    <td align='left'>
                                      <table border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                          <td class='text-button' style='color:#ffffff; font-family: Montserrat, Arial, sans-serif; font-size:14px; line-height:18px; text-align:center; text-transform:uppercase; padding:12px 25px; background:#000000; border-radius:3px;'><multiline><a href='http://www.vgreseller.com/admin/' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none;'><span class='link-white' style='color:#ffffff; text-decoration:none;'>LOGIN</span></a></multiline></td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </th>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td style='padding: 50px; border-bottom: 2px solid #f4f4f4;' class='p30-20'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td class='h3' style='padding-bottom: 30px; color:#333333; font-family: Montserrat, Arial, sans-serif; font-size:20px; line-height:25px; text-align:left;'><multiline>VG-INDUSTRIAL</multiline></td>
                      </tr>
                      <tr>
                        <td class='text' style='padding-bottom: 30px; color:#555555; font-family:Arial, sans-serif; font-size:15px; line-height:30px; text-align:left; min-width:auto !important;'><multiline>The company has always given its highest priority at providing each client with the best. It is equipped with a team of highly experienced tailors and an effective Quality Control Department that verifies each detail to confirm that the client is provided with the finest designed clothing.</multiline></td>
                      </tr>
                      <tr>
                        <td align='left'>
                          <table border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                              <td class='text-button' style='color:#ffffff; font-family: Montserrat, Arial, sans-serif; font-size:14px; line-height:18px; text-align:center; text-transform:uppercase; padding:12px 25px; background:#000000; border-radius:3px;'><multiline><a href='http://www.vg-industrial.com/about_4.php' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none;'><span class='link-white' style='color:#ffffff; text-decoration:none;'>MORE DETAILS</span></a></multiline></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td style='padding: 50px;' class='p30-20'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td style='padding-bottom: 32px;'>
                          <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                              <th class='column' width='200' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;'>
                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td class='img m-center' style='font-size:0pt; line-height:0pt; text-align:left;'><img src='cid:dark' alt='PHPMailer' width='191' height='35' border='0' alt='' /></td>
                                  </tr>
                                </table>
                              </th>
                              <th style='padding-bottom: 25px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;' class='column' width='1'></th>
                              <th class='column' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;'>
                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td align='right'>
                                      <table class='center' border='0' cellspacing='0' cellpadding='0' style='text-align:center;'>
                                        <tr>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </th>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                              <th class='column-top' width='370' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;'>
                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td class='text-footer m-center' style='color:#666666; font-family:Arial, sans-serif; font-size:13px; line-height:18px; text-align:left; min-width:auto !important;'><multiline>VG - Reseller <br /><br /> 166 Soi Sukhumvit Soi 50, Sukhumvit Rd., On-Nuch, 10260. Bangkok. Thailand.<br /> Phone : 662 331 3750<br /> Fax : 662 331 3752<br />  Email : info@vg-industrial.com </multiline></td>
                                  </tr>
                                </table>
                              </th>
                              <th style='padding-bottom: 25px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;' class='column' width='1'></th>
                              <th class='column-bottom' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:bottom;'>
                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                  <tr>
                                  </tr>
                                </table>
                              </th>
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
      </td>
    </tr>
  </table>
</body>
</html>

  ";
  $mail->AddAddress("do-not-reply@vgreseller.com", "Reseller Online");
  $mail->AddAddress($reseller_email, "Reseller Online");
  $mail->Send();
  if($mail)
  {
    echo "  <script language='javascript'> window.location='../reseller/view.php'; </script> ";
  }

?>