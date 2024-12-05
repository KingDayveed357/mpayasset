<!-- resources/views/auth/verify.blade.php -->

<form method="POST" action="{{ route('verify.otp') }}">
    @csrf
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label>OTP</label>
        <input type="text" name="otp" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Verify Account</button>
</form>
