<?php
include_once 'nav.php';
require_once '../vendor/autoload.php';
use Twilio\Rest\Client;

$sid    = $GLOBALS['twilio_account_sid'];
$token  = $GLOBALS['twilio_auth_token'];
$client = new Client( $sid, $token );
?>
<div class="container">
    <div class="row">
        <div class="col-md">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col"><?php echo word('phone_numbers') ?></th>
                        <th scope="col"><?php echo word('name') ?></th>
                        <th scope="col">Voice Url</th>
                        <th scope="col">SMS Url</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($client->conferences->read(array("friendlyName" => "44_5426258_1531870106")) as $conference) { ?>
                    <tr>
                        <td><?php echo $conference->dateCreated->format("Y-m-d H:i:s") ?></td>
                        <td><?php echo $conference->friendlyName ?></td>
                        <td><?php foreach($client->conferences($conference->sid)->participants->read() as $participant) {?>
                            <li><?php echo var_dump($participant) ?></li>
                            <?php } ?>
                        </td>
                        <td></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once 'footer.php';
