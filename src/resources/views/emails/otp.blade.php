<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kode Verifikasi Email JobHub</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 40px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); text-align: center;">
        <h1 style="color: #0284c7; margin-bottom: 20px;">Verifikasi Email Kamu</h1>
        <p style="color: #475569; font-size: 16px; line-height: 1.5; margin-bottom: 30px;">
            Terima kasih telah mendaftar di JobHub! Gunakan kode 6 digit di bawah ini untuk memverifikasi alamat email kamu.
        </p>
        <div style="background-color: #f1f5f9; padding: 20px; border-radius: 8px; font-size: 32px; font-weight: bold; letter-spacing: 5px; color: #0f172a; margin-bottom: 30px;">
            {{ $code }}
        </div>
        <p style="color: #64748b; font-size: 14px;">
            Kode ini hanya berlaku selama 15 menit. Tolong jangan berikan kode ini ke orang lain.
        </p>
        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 30px 0;">
        <p style="color: #94a3b8; font-size: 12px;">
            Jika kamu tidak mendaftar di JobHub, abaikan saja email ini.
        </p>
    </div>
</body>
</html>
