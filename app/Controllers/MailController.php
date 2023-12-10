<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReclamationModel;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class MailController extends BaseController
{
    public function isOnline($site = "https://www.google.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }

    public function decline_reclam()
    {
        if ($this->request->getMethod() == 'post') {
            // dd($this->request->getPost("NumReclamation"));
            // dd($this->request->getPost("Explications"));
            $model = new ReclamationModel();
            $user = $model->find($this->request->getPost("NumReclamation"));
            $Model = new UserModel();
            $User = $Model->find($user["PseudoNom"]);

            $mail = new PHPMailer(true);

            try {

                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'testmailcodeigniter2648@gmail.com';
                $mail->Password   = 'njya cllc emjz dywj';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                $mail->setFrom('testmailcodeigniter2648@gmail.com', 'Sport Club');
                $mail->addAddress($User["Email"], $User["PseudoNom"]);
                $mail->isHTML(true);
                $imagePath = 'img/images/logo.png';
                $mail->AddEmbeddedImage($imagePath, 'logo', 'your-logo.png');

                $mail->Subject = 'Claim Declined';
                $mail->Body    = '<body style="font-family: "Arial", sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; background-color: #f8f8f8;">

            <div style="max-width: 600px; text-align: center; padding: 20px; background-color: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

                <h1 style="color: #ff0000;">Claim Declined ❌😢</h1>

                <p style="color: #555;">Dear ' . $User["PseudoNom"] . ',</p>

                <p style="color: #555;">Thank you for your recent claim. 🙏 After careful consideration, we regret to inform you that your claim has been declined.</p>
                <p>For this reasen:</p>
                <p> <span style ="color:#FF0000;">' . $this->request->getPost("Explications") . '</span></p>
                <p>😞 We understand the importance of your concerns and appreciate your understanding.</p>

                <p style="color: #555;">If you have any further questions or would like additional information, please feel free to contact us. We are here to assist you. 🤝</p>
We understand the importance of your concerns and appreciate your understanding.
                <p style="color: #555;">Best regards,<br><span style="font-weight:bold;">Sport Club</span></p>

                <img src="cid:logo" alt="Your Logo" style="max-width: 100%; height: 60px; margin-top: 20px;">
            </div>
            </body>';

                $mail->send();
                $reclam = new ReclamationModel();
                $reclam
                    ->where('NumReclamation', $this->request->getPost("NumReclamation"))
                    ->set(['Status' => "Decline"])
                    ->update();
                return redirect()->to(base_url('/list-reclame'));
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
    public function decline($id)
    {
        $model = new ReclamationModel();
        $user = $model->find($id);
        $Model = new UserModel();
        $User = $Model->find($user["PseudoNom"]);

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'testmailcodeigniter2648@gmail.com';
            $mail->Password   = 'njya cllc emjz dywj';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('testmailcodeigniter2648@gmail.com', 'Sport Club');
            $mail->addAddress($User["Email"], $User["PseudoNom"]);
            $mail->isHTML(true);
            $imagePath = 'img/images/logo.png';
            $mail->AddEmbeddedImage($imagePath, 'logo', 'your-logo.png');

            $mail->Subject = 'Claim Declined';
            $mail->Body    = '<body style="font-family: "Arial", sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; background-color: #f8f8f8;">

            <div style="max-width: 600px; text-align: center; padding: 20px; background-color: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

                <h1 style="color: #ff0000;">Claim Declined ❌😢</h1>

                <p style="color: #555;">Dear ' . $User["PseudoNom"] . ',</p>

                <p style="color: #555;">Thank you for your recent claim. 🙏 After careful consideration, we regret to inform you that your claim has been declined. 😞 We understand the importance of your concerns and appreciate your understanding.</p>

                <p style="color: #555;">If you have any further questions or would like additional information, please feel free to contact us. We are here to assist you. 🤝</p>

                <p style="color: #555;">Best regards,<br><span style="font-weight:bold;">Sport Club</span></p>

                <img src="cid:logo" alt="Your Logo" style="max-width: 100%; height: 60px; margin-top: 20px;">
            </div>
            </body>';

            $mail->send();
            $reclam = new ReclamationModel();
            $reclam
                ->where('NumReclamation', $id)
                ->set(['Status' => "Decline"])
                ->update();
            return redirect()->to(base_url('/list-reclame'));
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function accept($id)
    {
        $model = new ReclamationModel();
        $user = $model->find($id);
        $Model = new UserModel();
        $User = $Model->find($user["PseudoNom"]);

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'testmailcodeigniter2648@gmail.com';
            $mail->Password   = 'njya cllc emjz dywj';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;


            $mail->setFrom('testmailcodeigniter2648@gmail.com', 'Sport Club');
            $mail->addAddress($User["Email"], $User["PseudoNom"]);
            $imagePath = 'img/images/logo.png';
            $mail->AddEmbeddedImage($imagePath, 'logo', 'your-logo.png');

            $mail->isHTML(true);
            $mail->Subject = 'Claim Accepted';
            $mail->Body    = '<body style="font-family: "Arial", sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; background-color: #f8f8f8;">

            <div style="max-width: 600px; text-align: center; padding: 20px; background-color: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

                <h1 style="color: #00cc00;">Reclamation Accepted 🎉</h1>

                <p style="color: #555;">Dear ' . $User["PseudoNom"] . ',</p>
                <p style="color: #555;">Great news! Your reclamation has been accepted. 🌟 We appreciate your patience and understanding during this process. Our team has worked to address your concerns, and we are pleased to inform you of the resolution.</p>

                <p style="color: #555;">If you have any further questions or need additional assistance, feel free to reach out. We\'re here to help! 🤗</p>

                <p style="color: #555;">Best regards,<br><span style="font-weight:bold;">Sport Club</span></p>
                <img src="cid:logo" alt="Your Logo" style="max-width: 100%; height: 60px; margin-top: 20px;">
            </div>
            </body>';

            $mail->send();
            $reclam = new ReclamationModel();
            $reclam
                ->where('NumReclamation', $id)
                ->set(['Status' => "Accept"])
                ->update();

            return redirect()->to(base_url('/list-reclame'));
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
