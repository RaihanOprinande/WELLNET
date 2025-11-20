<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; text-align: center;">
    <h2>✓ Email Verified Successfully!</h2>
    <p>Hi {{ $userName }}, your email has been verified.</p>

    <div style="margin: 30px 0;">
        <p>Redirecting to your app...</p>
        <a href="{{ $deepLink }}"
           style="background-color: #28A745; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">
            Open App
        </a>
    </div>

    <script>
        setTimeout(() => {
            window.location.href = "{{ $deepLink }}";
        }, 2000);
    </script>
</div>
