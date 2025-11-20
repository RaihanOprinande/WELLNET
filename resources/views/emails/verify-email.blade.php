<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
    <h2>Welcome {{ $child->username }}!</h2>
    <p>Thank you for registering. Please verify your email address by clicking the button below:</p>

    <div style="margin: 30px 0;">
        <a href="{{ $verificationLink }}"
            style="background-color: #007BFF; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">
            Verify Email
        </a>
    </div>

    <p style="color: #666; font-size: 14px;">
        Or copy this link: <a href="{{ $verificationLink }}">{{ $verificationLink }}</a>
    </p>

    <p style="color: #999; font-size: 12px;">
        This link expires in 24 hours.
    </p>
</div>
