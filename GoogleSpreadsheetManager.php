<?php
//@spreadsheet_url = "https://docs.google.com/spreadsheets/d/1tSVu8sa-yQufrJL15cjTluQuheBDX_UhboTpBrutL5w/edit#gid=0"


require __DIR__ . '/vendor/autoload.php';

class GoogleSpreadsheetManager
{   
    private $range = "data!A1:ZZ";
    private $spreadsheetId = '1tSVu8sa-yQufrJL15cjTluQuheBDX_UhboTpBrutL5w';
    public $values;

    public function __construct() {
       $client = $this->getClient();
       $service = new Google_Service_Sheets($client);
       $response = $service->spreadsheets_values->get($this->spreadsheetId, $this->range);
       $this->values = $response->getValues();    
    }

    private function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
    
        // Load previously authorized credentials from a file.
        $credentialsPath = 'token.json';
        if (file_exists($credentialsPath)) {
            $accessToken = json_decode(file_get_contents($credentialsPath), true);
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));
    
            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    
            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
    
            // Store the credentials to disk.
            if (!file_exists(dirname($credentialsPath))) {
                mkdir(dirname($credentialsPath), 0700, true);
            }
            file_put_contents($credentialsPath, json_encode($accessToken));
            printf("Credentials saved to %s\n", $credentialsPath);
        }
        $client->setAccessToken($accessToken);
    
         // Refresh the token if it's expired.
         if ($client->isAccessTokenExpired()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
        }

        return $client;
    }
}