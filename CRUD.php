<?php
    include('phpmailer/PHPMailerAutoload.php');
    // ====================================================== Donor =======================================================

    function connection() //database connection
    {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bloodbank";

        $conn = mysqli_connect($server, $username, $password, $dbname);
        return $conn;
    }

    function donorinsert($data) //donor data insertion
    {
        $con = connection();

        $name=$data['fname'];
        $email=$data['email'];
        $contact=$data['contact'];
        $b_group=$data['Blood_grp'];
        $lock=$data['passwrd'];
        $address=$data['adres'];

        if($con)
        {
            $sql = "insert into donor (name, email, contact, bloodgrp, password, address) values ('$name', '$email', '$contact', '$b_group', '$lock', '$address')";
            $res = mysqli_query($con, $sql);
            return $res;
        }
        else
            echo "No Connection";
    }

    function dlogin($data) //donor login
    {
        $conn=connection();

        $mail = $data['email'];
        $lock = $data['passkey'];

        if($conn)
        {
            $sql = "select * from donor where email = '$mail' and password = '$lock'";
            $res = mysqli_query($conn, $sql);
            return $res;
        }
        else
            echo "No connection";
    }

    function donorbyID($data) //donor sort by b-group -> used in search
    {
        $conn=connection();
        $blood = $data['Blood_grp'];
        if($conn)
        {
            $sql = "select * from donor where bloodgrp = '$blood'";
            $res = mysqli_query($conn, $sql);
            return $res;
        }
        else
            echo "No connection";
    }

    function DashD($data) //donor dashboard display
    {
        $conn=connection();

        if($conn)
        {
            $sql = "select * from donor where email = '$data'";
            $res = mysqli_query($conn, $sql);
            return $res;
        }
        else
            echo "No connection";
    }

    function Dmail($data) //send request info to donor
    {
        $dinfoS = DashD($data['emailD']);
        $dinfoC = mysqli_fetch_assoc($dinfoS);

        $mail = new phpmailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'abirangshu.gc2@gmail.com';
        $mail->Password = 'rjhfogthqdvkdedh';

        $mail->setFrom('abirangshu.gc2@gmail.com','E-Blood Bank');
        $mail->addAddress($data['emailD']);
        $mail->addReplyTo('abirangshu.gc2@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Blood Request Mail';
        $message = "";
        $message = $message."Hi, <b>".$dinfoC['name']."</b>.<br>You have a blood donation request from <i>".$data['emailU']."</i>.<br>Kindly check your Dashboard for more information regarding the request";
        $mail->Body = $message;

        if($mail->send())
        {
            return 1;
        }
        else
            return 0;
    }

    function updateD($data) //update donor info
    {
        $conn = connection();

        $name=$data['fname'];
        $email=$data['email'];
        $contact=$data['contact'];
        $lock=$data['passwrd'];
        $address=$data['adres'];

        if($conn)
        {
            $sql = "update donor set name='$name', contact='$contact', password='$lock', address='$address' where email='$email'";
            $res = mysqli_query($conn,$sql);
            return $res;
        }
    }

    function deldonor($data) //donor delete
    {
        $conn = connection();
        if($conn)
        {
            $sql = "delete from donor where email = '$data'";
            $res = mysqli_query($conn, $sql);
            return $res;
        }
    }

    // ======================================================== User ==============================================================

    function userinsert($data) //user data insertion
    {
        $conn = connection();

        $name=$data['fname'];
        $email=$data['email'];
        $contact=$data['contact'];
        $lock=$data['passwrd'];
        $address=$data['adres'];

        if($conn)
        {
            $sql = "insert into user (name, email, contact, password, address) values ('$name', '$email', '$contact', '$lock', '$address')";
            $res = mysqli_query($conn, $sql);
            return $res;
        }
        else
            echo "No Connection";

    }

    function ulogin($data) //user login
    {
        $conn=connection();

        $mail = $data['email'];
        $lock = $data['password'];

        if($conn)
        {
            $sql = "select * from user where email = '$mail' and password = '$lock'";
            $res = mysqli_query($conn, $sql);
            return $res;
        }
        else
            echo "No connection";
    }

    function DashU($data) // user dashboard display
    {
        $conn=connection();

        // $mail = $data['email'];
        // $lock = $data['passkey'];

        if($conn)
        {
            $sql = "select * from user where email = '$data'";
            $res = mysqli_query($conn, $sql);
            return $res;
        }
        else
            echo "No connection";
    }

    function Umail($data) //send requst info to User
    {
        $uinfoS = DashU($data['emailU']);
        $uinfoC = mysqli_fetch_assoc($uinfoS);

        $mail = new phpmailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'abirangshu.gc2@gmail.com';
        $mail->Password = 'rjhfogthqdvkdedh';

        $mail->setFrom('abirangshu.gc2@gmail.com','E-Blood Bank');
        $mail->addAddress($data['emailU']);
        $mail->addReplyTo('abirangshu.gc2@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Request Check Mail';
        $message = "";
        $message = $message."Hi, <b>".$uinfoC['name']."</b>.<br>You have submitted a blood recipient request to <i>".$data['emailD']."</i>.<br>You will get a reply to your request shortly.";
        $mail->Body = $message;

        if($mail->send())
        {
            return 1;
        }
        else
            return 0;
    }

    function updateU($data) //update user info
    {
        $conn = connection();

        $name=$data['fname'];
        $email=$data['email'];
        $contact=$data['contact'];
        $lock=$data['passwrd'];
        $address=$data['adres'];

        if($conn)
        {
            $sql = "update user set name='$name', contact='$contact', password='$lock', address='$address' where email='$email'";
            $res = mysqli_query($conn,$sql);
            return $res;
        }
    }

    function deluser($data)
    {
        $conn = connection();
        if($conn)
        {
            $sql = "delete from user where email = '$data'";
            $res = mysqli_query($conn, $sql);
            return $res;
        }
    }

    // ======================================================= Request ==========================================================

    function datainsert($data) //request table data insertion
    {
        $con = connection();

        $Uemail = $data['emailU'];
        $Demail = $data['emailD'];
        $date = $data['date'];
        $pp = $data['purpose'];
        $address = $data['adres'];

        if($con)
        {
            $sql = "insert into request (user, donor, date, purpose, address) values ('$Uemail', '$Demail', '$date', '$pp', '$address')";
            $res = mysqli_query($con, $sql);
            return $res;
        }
        else
            echo "No Connection";

    }
    
    function Requesterinfo($data) //show user request in Donor dashboard
    {
        $con = connection();

        if($con)
        {
            $sql = "select * from request where donor='$data'";
            $res = mysqli_query($con, $sql);
            return $res;
        }
        else
            echo "No Connection";

    }

    function donorinfo($data) //show donor email in mail
    {
        $con = connection();

        if($con)
        {
            $sql = "select * from request where user='$data'";
            $res = mysqli_query($con, $sql);
            return $res;
        }
        else
            echo "No Connection";

    }

    function replyMail($data,$action) // mail to user if donor accept/reject request
    {
        $dinfoS = donorinfo($data);
        $dinfoC = mysqli_fetch_assoc($dinfoS);

        $uinfoS = DashU($data);
        $uinfoC = mysqli_fetch_assoc($uinfoS);

        $mail = new phpmailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'souvik.de1612@gmail.com';
        $mail->Password = 'rjhfogthqdvkdedh';

        $mail->setFrom('abirangshu.gc2@gmail.com','E-Blood Bank');
        $mail->addAddress($data);
        $mail->addReplyTo('abirangshu.gc2@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Donor Reply Mail';
        $message = "";

        if($action == "approved")
            $message = $message."Hi, <b>".$uinfoC['name']."</b>.<br>Congratulations, the donor - <i>".$dinfoC['donor']."</i> have ".$action." your request for giving blood";
        else
            $message = $message."Hi, <b>".$uinfoC['name']."</b>.<br>Apologies, the donor - <i>".$dinfoC['donor']."</i> have ".$action." your request for giving blood";
        
        $mail->Body = $message;

        if($mail->send())
        {
            return 1;
        }
        else
            return 0;
    }

    function tfdetails($data,$action,$id)
    {
        $con = connection();

        $sql1 = "select * from request where id = '$id'";
        $rp = mysqli_query($con,$sql1);
        $rpfa = mysqli_fetch_assoc($rp);
        $ur = $rpfa['user'];
        $dn = $rpfa['donor'];
        $dt = $rpfa['date'];
        $pp = $rpfa['purpose'];
        $ad = $rpfa['address'];
        
        $sql2 = "insert into replyd (user, donor, date, purpose, address, reply) values ('$ur', '$dn', '$dt', '$pp', '$ad', '$action')";
        $rp2 = mysqli_query($con,$sql2);
        if($rp2 == 1)
        {
            $sql3 = "delete from request where id = '$id'";
            $rp3 = mysqli_query($con,$sql3);
            if($rp3 == 1)
                return $rp3;
        }
    }

    function showreply($data)
    {
        $con = connection();

        if($con)
        {
            $sql = "select * from replyd where donor='$data'";
            $res = mysqli_query($con, $sql);
            return $res;
        }
        else
            echo "No Connection";
    }

    function deleteRequestedUser($id) {
        $conn = connection();
 
         
         if($conn) {
             $sql = "delete from request where id='$id'";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function countRequestedUser() {
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from request";
 
             $response = mysqli_query($conn, $sql);

             $records = mysqli_num_rows($response);
 
             return $records;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function getAllReqUsers() {
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from request";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function deleteRepliedDonor($id) {
        $conn = connection();
 
         
         if($conn) {
             $sql = "delete from replyd where id='$id'";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function countRepliedDonor() {
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from replyd";
 
             $response = mysqli_query($conn, $sql);

             $records = mysqli_num_rows($response);
 
             return $records;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function getAllRepDonors() {
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from replyd";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

    //For Admin
    function loginAdmin($data) {
        $email = $data["email"];
        $password = $data["password"];
        
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from admin where email='$email' and password='$password'";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function countUsers() {
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from user";
 
             $response = mysqli_query($conn, $sql);

             $records = mysqli_num_rows($response);
 
             return $records;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function countDonors() {
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from donor";
 
             $response = mysqli_query($conn, $sql);

             $records = mysqli_num_rows($response);
 
             return $records;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function getAllUsers() {
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from user";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function getAllDonors() {
        $conn = connection();
 
         
         if($conn) {
             $sql = "select *from donor";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function deleteDonor($email) {
        $conn = connection();
 
         
         if($conn) {
             $sql = "delete from donor where email='$email'";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }

     function deleteUser($email) {
        $conn = connection();
 
         
         if($conn) {
             $sql = "delete from user where email='$email'";
 
             $response = mysqli_query($conn, $sql);
 
             return $response;
         }
         else {
             echo "Database Not Connected";
         }
     }
?>