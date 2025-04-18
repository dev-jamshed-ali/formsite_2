use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;

class TestsMail implements ShouldQueue
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer; 
    }

    public function handle()
    {
        $this->mailer->to('younasali22@gmail.com')
            ->subject('My Email Subject')
            ->send($this->buildEmailBody());
    }

    protected function buildEmailBody()
    {
        // Build and return the email body here
        return view('emails.tests_mail')->render();
    }
}
