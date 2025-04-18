<h2>MFA Verification</h2>
<form method="POST" action="{{ route('mfa.verify') }}">
    @csrf
    <label>Enter your MFA code:</label>
    <input type="text" name="code" required />
    <button type="submit">Verify</button>
</form>
