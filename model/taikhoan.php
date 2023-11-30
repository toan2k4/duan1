<?php 
function loadAll_tk(){
    $sql ="SELECT * FROM taikhoan WHERE 1";
    return pdo_query($sql);
}

function khoa_tk($id){
    $sql ="UPDATE taikhoan SET lock='1' WHERE id_tk = $id;";
    return pdo_query($sql);
}
function bo_khoa_tk($id){
    $sql ="UPDATE taikhoan SET lock='0' WHERE id_tk = $id;";
    return pdo_query($sql);
}

function dangnhap($email, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE email = '$email' and pass = '$pass'";
    $taikhoan = pdo_query_one($sql);
    return $taikhoan;
}

function dangxuat()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    
}

function insert_tk($name_tk, $pass, $full_name, $email){
    $sql = "INSERT INTO taikhoan(name_tk, pass, full_name, email) VALUES ('$name_tk', '$pass', '$full_name', '$email')";
    pdo_execute($sql);
}

function load_one_tk($id){
    $sql = "SELECT * FROM taikhoan WHERE id_tk = $id";
    return pdo_query_one($sql);
}

function update_tk($id_tk,$name_tk,$pass,$image_tk,$full_name,$email, $phone, $dia_chi){
    $sql = "UPDATE taikhoan SET name_tk='$name_tk'";
    if($pass == ''){
        $sql .= ",image_tk='$image_tk',full_name='$full_name',email='$email',phone='$phone',dia_chi='$dia_chi' WHERE id_tk = $id_tk";
    }else{
        $sql .= ",pass='$pass',image_tk='$image_tk',full_name='$full_name',email='$email',phone='$phone',dia_chi='$dia_chi' WHERE id_tk = $id_tk";
    }
    pdo_execute($sql);
}

function sendMail($email) {
    $sql="SELECT * FROM taikhoan WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);

    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['name_tk'], $taikhoan['pass']);
        
        return "0";
    } else {
        return "1";
    }
}

function sendMailPass($email, $username, $pass) {
    require 'public/PHPMailer/PHPMailer-master/src/Exception.php';
    require 'public/PHPMailer/PHPMailer-master/src/PHPMailer.php';
    require 'public/PHPMailer/PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'a19f7b8dec3a8f';                     //SMTP username
        $mail->Password   = 'cca5b9d1a9ce50';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('babyshop@gmail.com', 'DuAn1');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nguoi dung quen mat khau';
        $mail->Body    = 'Mau khau cua ban la' .$pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>