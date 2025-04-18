@extends('layouts.app') <!-- Include your base layout if you have one -->

@section('content')
<div class="container">
    <h1>Atlassian Support</h1>
    <p><a href="#">Atlassian accounts Resources</a></p>
    <h2>Keep your Atlassian account secure</h2>
    <p>Protect your Atlassian account</p>

    <p>At Atlassian your security 
    matters to us. Help us keep your account and information safe. We recommend following the steps below regularly.</p>

        <p>Change the passwords for your online accounts (including your email accounts) and use a different password for each. Particularly if they use the same credentials you used for your Atlassian account.</p>
        <p>Enable two-step verification for your account to require an extra step when you log in to your account. <a href="#">Learn how to set up two-step verification.</a></p>
        <p>Use an API token for Jira and Confluence REST API basic authentication. <a href="#">Learn more about API tokens.</a></p>
        <p>If you use Bitbucket:
                <p>Review your account's sessions history and audit logs in Bitbucket (once you log in) to ensure no one other than you has made changes.</p>
                <p>Use an SSH key when performing Git operations. <a href="#">Learn more about SSH keys.</a></p>
                <p>Whitelist your IP addresses so that users can only access your Bitbucket content from those IP addresses. You must be a Bitbucket team admin (or account owner) to whitelist IP addresses.</p>
                <p>Use a password manager to help you generate and store strong passwords.</p>

    <h2>Stay secure when login details are stolen</h2>
    <p>We have security measures in place to detect whether your password is on a list of login details that have been stolen during another company’s breach.</p>

    <p>When we detect that you’re using the same password for your Atlassian account to log in to the website of a company that’s been breached, we invalidate your password and require you to set a new one as a precautionary measure. This helps to keep your Atlassian account secure and prevent attackers from gaining unauthorized access.</p>

    <p>If this happens, you’ll see an on-screen notification when you try to log in and we’ll send an email with more information. Follow the steps in the notification or email to set your new password.</p>

    <p>Was this helpful?</p>

    <button class="btn btn-success">Yes</button>
    <button class="btn btn-danger">No</button>

    <p>Provide feedback about this article</p>

    <a href="#">Ask the Community</a>
</div>
@endsection
