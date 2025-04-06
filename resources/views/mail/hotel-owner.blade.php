<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Hotel Registration</title>
    <style>
        body {
            font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8fafc;
            padding: 20px;
            margin: 0;
            color: #334155;
            line-height: 1.7;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
        }

        .header {
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-bottom: 35px;
        }
        .header h1{
            width: max-content;

        }
        h2 {
            color: #1e40af;
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 26px;
        }

        .message {
            margin-bottom: 35px;
            font-size: 16px;
        }

        .otp-section {
            background-color: #eff6ff;
            border-radius: 12px;
            padding: 30px;
            margin: 35px 0;
            text-align: center;
            border-left: 5px solid #3b82f6;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.1);
        }

        .otp-title {
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #64748b;
            margin-bottom: 18px;
            font-weight: 600;
        }

        .otp-code {
            font-size: 38px;
            font-weight: 800;
            color: #3b82f6;
            letter-spacing: 8px;
            margin: 0;
            padding: 8px 0;
            text-shadow: 0 1px 2px rgba(59, 130, 246, 0.2);
        }

        .expiry-note {
            margin-top: 18px;
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e2e8f0, transparent);
            margin: 35px 0;
        }

        .button {
            display: inline-block;
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 15px;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.4);
        }

        .signature {
            margin-top: 35px;
            line-height: 1.8;
        }

        .footer {
            margin-top: 45px;
            padding-top: 25px;
            border-top: 1px solid #e2e8f0;
            font-size: 13px;
            color: #64748b;
            text-align: center;
        }

        .social-links {
            margin: 20px 0;
        }

        .social-icon {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: #f1f5f9;
            border-radius: 50%;
            margin: 0 6px;
            line-height: 36px;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .support-message {
            margin-top: 25px;
            padding: 15px;
            background-color: #f8fafc;
            border-radius: 8px;
            font-size: 14px;
            border: 1px solid #e2e8f0;
        }

        @media screen and (max-width: 480px) {
            .email-container {
                padding: 25px;
            }
            
            .otp-section {
                padding: 20px 15px;
            }
            
            .otp-code {
                font-size: 28px;
                letter-spacing: 6px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">          
            <h1>E-Shelter</h1>
        </div>

        <h2>Welcome, {{ $ownerName }}!</h2>

        <div class="message">
            <p>Thank you for registering your property with our Hotel Booking platform. We're excited to have you join our network of exceptional accommodations in Cambodia.</p>
            
            <p>To ensure the security of your account and complete your registration, please verify your email address using the code below.</p>
        </div>

        <div class="otp-section">
            <div class="otp-title">Your Verification Code</div>
            <div class="otp-code">{{ $OTP }}</div>
            <div class="expiry-note">This code will expire in 5 minutes</div>
        </div>

        <p>Enter this code on the verification page to activate your account and start managing your property listings.</p>

        <div class="support-message">
            If you did not request this verification, please disregard this email or contact our support team immediately at <strong>support@e-shelter.com</strong>
        </div>

        <div class="signature">
            <p>We look forward to a successful partnership!</p>
            <p>Best regards,<br>
            <strong>The E-Shelter Team</strong></p>
        </div>

        <div class="divider"></div>

        <div class="footer">
            <div class="social-links">
                <span class="social-icon">📱</span>
                <span class="social-icon">📧</span>
                <span class="social-icon">🌐</span>
            </div>
            <p>&copy; {{ date('Y') }} E-Shelter System. All rights reserved.</p>
            <p>123 Booking Street, Suite 100, Hospitality City</p>
        </div>
    </div>
</body>
</html>