<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Paise;
use App\Game;


class PHPMailerController extends Controller
{
    //
    // =============== [ Email ] ===================
    public function email()
    {
        $Paise = Paise::all();
        $Game = Game::all();
        return view("email", compact('Paise', 'Game'));
    }


    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request)
    {
        /**
         * para validar campos
         */
        $campo = [
            'Equipo' => 'required|string|max:100',
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'email' => 'required|email',
            'celular' => 'required|integer',
            'Pais' => 'required|string',
            'Juegos' => 'required|string',
            'emailAttachments' => 'required',
            'policy'=>'required',
        ];
        /**
         * :atribute toma los parametros
         */
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'emailAttachments.required' => 'La foto requerida'
        ];
        /**
         * metodo usado para enviar los datos en caso de error
         */
        $this->validate($request, $campo, $mensaje);


        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'campos.tauro94@gmail.com';   //  sender username
            $mail->Password = 'gmyjacxheniwccdr';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('campos.tauro94@gmail.com', 'Comic-Con Registration');
            $mail->addAddress($request->email);
            $mail->addReplyTo('campos.tauro94@gmail.com', 'SenderReplyName');

            if (isset($_FILES['emailAttachments'])) {
                for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }

            $Equipo = $request->Equipo;
            $Nombre = $request->Nombre;
            $Apellido = $request->Apellido;
            $email = $request->email;
            $celular = $request->celular;
            $Pais = $request->Pais;
            $Juegos = $request->Juegos;

            $mail->isHTML(true);                // Set email content format to HTML
            $mail->Subject = 'Comic-Con Registration';
            $mail->Body    =
                "<!DOCTYPE html>
                <html lang='es'>

                <head>
                    <meta charset='utf-8'>
                </head>
                <!-- INICIO TABLA 1-->
                <table cellpadding='0' cellspacing='0' border='0' width='100%' bgcolor='#f1f1f1'>
                    <tbody>
                        <tr height='25'>
                        </tr>
                        <tr>
                            <td dir='ltr' valign='top'></td>
                            <td dir='ltr' valign='middle'>
                                <a style='text-decoration:none;color:#262e33;border:0'>
                                    <img src='https://i.postimg.cc/fVRFM19n/Sin-t-tulo-1.png' width='300'>
                                </a>
                            </td>
                            <td dir='ltr' valign='top'></td>
                        </tr>
                        <tr height='25'>
                        </tr>
                        <tr>
                            <td dir='ltr'>
                            </td>
                            <td dir='ltr' width='800' id='m_771625768408470729main' bgcolor='#ffffff'
                                style='border-top:10px solid #ba4216;line-height:1.5'>
                                <font color='#888888'>
                                </font>
                                <font color='#888888'>
                                </font>
                                <table width='100%' cellpadding='20'>
                                    <tbody>
                                        <tr>
                                            <td dir='ltr' style='font-family:'Helvetica-Neue',helvetica,sans-serif;font-size:15px;color:#333333;line-height:21px'>
                                                <strong style='font-size:17px'> hola equipo $Equipo</strong>
                                                <br>
                                                Gracias por registrarse y participar pronto lo responderemos muchas gracias.
                                                <br>
                                                <font color='#888888'>
                                                    Nombre: $Nombre
                                                </font>
                                                <br>
                                                <font color='#888888'>
                                                    Apellido :$Apellido
                                                </font>
                                                <br>
                                                <font color='#888888'>
                                                    Correo :$email
                                                </font>
                                                <br>
                                                <font color='#888888'>
                                                    celular :$celular
                                                </font>
                                                <br>
                                                <font color='#888888'>
                                                    Pais :$Pais
                                                </font>
                                                <br>
                                                <font color='#888888'>
                                                    Juegos :$Juegos
                                                </font>
                                                <br>
                                                <table width='100%' cellpadding='15' cellspacing='0' border='0'
                                                    style='background:#f9f9f9'>
                                                    <tbody>
                                                        <tr>
                                                            <td dir='ltr' align='center'>
                                                                Puedes seguir cada unos de nuestros torneos en nuestra Web Site<br>
                                                                <a href='http://127.0.0.1:8000'
                                                                    style='color:#ffffff;font-family:Helvetica Neue,helvetica,sans-serif;text-decoration:none;font-size:14px;background:#ba4216;line-height:32px;padding:0 10px;display:inline-block;border-radius:3px'
                                                                    target='_blank'>Web Site</a>
                                                                <font color='#888888'>
                                                                </font>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <font color='#888888'>
                                                    <br>
                                                    <br>
                                                    <em style='color:#8c8c8c'>— Comic-Con</em>
                                                </font>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <font color='#888888'>
                                </font>
                            </td>
                            <td dir='ltr'>
                            </td>
                        </tr>
                        <tr height='25'>
                        </tr>
                        <tr>
                            <td dir='ltr' valign='top'>
                            </td>
                            <td dir='ltr' valign='top' width='800' align='center' style='font-family:'Helvetica
                                Neue',helvetica,sans-serif;font-size:12px;color:#bdbdbd;line-height:18px;padding-left:10px'>
                                Comic-Con, Latino America, 2022
                            </td>
                            <td dir='ltr' valign='top'>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- FIN TABLA 1-->
                </body>

                </html>

                ";

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                return back()->with("failed", "Correo electrónico no enviado.")->withErrors($mail->ErrorInfo);
            } else {
                return back()->with("success", "Registro Exitoso!!!.");
            }
        } catch (Exception $e) {
            return back()->with('error', 'No se pudo enviar el mensaje.');
        }
    }
}
