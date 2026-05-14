<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your confirmation code</title>
</head>
<body style="margin: 0; background: #09090b; color: #ffffff; font-family: Arial, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background: #09090b; padding: 32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 520px; border: 1px solid rgba(255,255,255,0.12); background: #18181b; padding: 32px;">
                    <tr>
                        <td>
                            <p style="margin: 0 0 16px; color: #fde68a; font-size: 12px; font-weight: 700; letter-spacing: 4px; text-transform: uppercase;">{{ $vipClient->brand->name }}</p>
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 300;">Your confirmation code</h1>
                            <p style="margin: 18px 0 0; color: #d4d4d8; line-height: 1.7;">Use this code to confirm your private service request. It expires in 10 minutes.</p>
                            <div style="margin: 28px 0; border: 1px solid rgba(253,230,138,0.35); background: #09090b; padding: 22px; text-align: center; color: #fde68a; font-size: 42px; font-weight: 700; letter-spacing: 8px;">{{ $code }}</div>
                            <p style="margin: 0; color: #a1a1aa; font-size: 13px; line-height: 1.6;">If you did not request this code, you can ignore this email.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
