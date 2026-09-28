<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediQueue - Login</title>


<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f4f7fb;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .login-box {
        width: 100%;
        max-width: 380px;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .logo {
        text-align: center;
        margin-bottom: 25px;
    }

    .logo h1 {
        margin: 0;
        font-size: 28px;
        color: #2563eb;
    }

    .logo p {
        margin: 6px 0 0;
        font-size: 13px;
        color: #666;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-size: 14px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 11px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
    }

    input:focus {
        outline: none;
        border-color: #2563eb;
    }

    .login-btn {
        width: 100%;
        padding: 11px;
        border: none;
        border-radius: 6px;
        background: #2563eb;
        color: white;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-btn:hover {
        background: #1d4ed8;
    }

    .google-btn {
        display: block;
        width: 100%;
        padding: 11px;
        margin-top: 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        background: white;
        color: #333;
        text-align: center;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
    }

    .google-btn:hover {
        background: #f8fafc;
    }

    .divider {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 18px 0;
        color: #999;
        font-size: 12px;
    }

    .divider::before,
    .divider::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #e5e7eb;
    }

    .notice {
        margin-bottom: 18px;
        padding: 10px;
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 6px;
        color: #1e40af;
        font-size: 12px;
        line-height: 1.5;
    }

    .error {
        margin-bottom: 15px;
        padding: 10px;
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 6px;
        color: #b91c1c;
        font-size: 13px;
    }
</style>


</head>

<body>

<div class="login-box">


<div class="logo">
    <h1>MediQueue</h1>
    <p>LLCC School Clinic</p>
</div>

<div class="notice">
    <strong>LLCC Account Required</strong><br>
    Only authorized LLCC accounts can access MediQueue.
</div>

@if ($errors->any())
    <div class="error">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <label for="email">LLCC Email</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="yourname@llcc.edu.ph"
            value="{{ old('email') }}"
            required
        >
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            required
        >
    </div>

    <button type="submit" class="login-btn">
        Login
    </button>
</form>

<div class="divider">
    OR
</div>

<a href="{{ route('google.redirect') }}" class="google-btn">
    Continue with Google
</a>


</div>

</body>
</html>
