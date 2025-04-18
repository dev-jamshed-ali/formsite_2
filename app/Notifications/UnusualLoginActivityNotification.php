<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;


class UnusualLoginActivityNotification extends Notification
{
    use Queueable;

    // Add properties to hold the login activity details
    public $email;
    public $time;
    public $location;
    public $device;
    public $browser;
    public $ipAddress;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Use the passed user instance
        $user = $this->user;

        // Generate a unique token for the user
        $id = $user->id;

        // Retrieve user information
        $email = $user->email;
        $time = $user->getLastLoginTime();
        $location = $user->getLocation(); // Use the getLocation method
        $deviceAndBrowser = $user->getBrowserAndDevice(); // Use the getBrowserAndDevice method
        $ipAddress = $user->getPublicIPAddress(); // Use the getPublicIPAddress method

        // Define the URLs for "This was me" and "This wasn't me" actions
        $wasMeUrl = url('admin/unlock-account/' . $id); // Modify the URL as needed
        $wasntMeUrl = url('admin/forget-password'); // Modify the URL as needed
        $whyImGettingThisEmail = url('admin/protect-your-account');
        // Define the email subject
        $subject = 'Unusual Login Activity Notification';
    $emailContent = "
        <p>Hello,</p>
        <p>We noticed some unusual login activity with your Ginicoe account.</p>
        <p>Email: $email</p>
        <p>Time: $time</p>
        <p>Location: {$location['city']}, {$location['region']}, {$location['country']}</p>
        <p>Device:".@$deviceAndBrowser['device']."</p>
        <p>Browser:".@$deviceAndBrowser['browser']."</p>
        <p>IP Address: $ipAddress</p>
        <p>To make sure your account is secure, let us know if this was you.</p>
        <p><a href='$wasMeUrl'>This was me</a></p>
        <p>If this login was not you, please take action: <a href='$wasntMeUrl'>This wasn't me</a></p>
        <p><a href='$whyImGettingThisEmail'>Why am I getting this email?</a></p>
        <p>Regards,</p>
        <p>GiniCoe</p>
    ";

    return (new MailMessage)
    ->subject($subject)
    ->view('emails.unusual_activity_notification', ['content' => $emailContent]); // Set the MIME type to 'text/html'
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
