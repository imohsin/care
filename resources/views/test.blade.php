# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-9648b923091bd54934ba9a10fef68750');
$domain = "sandbox9813cfb7e36d4ffca2dce93b57eac2fb.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandbox9813cfb7e36d4ffca2dce93b57eac2fb.mailgun.org>',
                        'to'      => 'sid <imohsins@chmail.ir>',
                        'subject' => 'Hello sid',
                        'text'    => 'Congratulations sid, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));