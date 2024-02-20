<!-- auth.email.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Email</title>
</head>

<body>
    <p>Dear User,</p>
    <br>
    <p>Mohon untuk melakukan reset password:</p>
    <ol>
        <li>Buka laman link dibawah ini:</li>
        <br>
        <li>
            <a href="{{ route('reset.password.get', $token) }}">Reset
                Password</a>
        </li>
    </ol>
    <br>
    <p>
        Jika Anda memiliki pertanyaan atau mengalami kesulitan dalam proses verifikasi, jangan ragu untuk
        menghubungi tim dukungan pelanggan kami di "Contact us" pada bagian bawah laman.
    </p>
    <br>
    <p>
        Terima kasih atas perhatiannya dan mohon untuk verifikasi dengan bijak.
    </p>
    <br>
    <p>Salam Hangat,</p>
    <p>Admin</p>
</body>

</html>
