<?php
// Google API Client ийн үндсэн файлуудыг ачаалж байна
require_once 'libs/google-api-php-client/vendor/autoload.php'; // татсан фолдерын зам

$KEY_FILE_LOCATION = 'service-account.json';
$property_id = 'G-RDR1TFN2Q4'; // GA4 Property ID

$client = new Google_Client();
$client->setAuthConfig($KEY_FILE_LOCATION);
$client->addScope('https://www.googleapis.com/auth/analytics.readonly');

$analytics = new Google\Service\AnalyticsData($client);

$request = new Google\Service\AnalyticsData\RunReportRequest([
    'dimensions' => [
        ['name' => 'pagePath']
    ],
    'metrics' => [
        ['name' => 'screenPageViews']
    ],
    'dateRanges' => [
        ['startDate' => '30daysAgo', 'endDate' => 'today']
    ],
    'dimensionFilter' => [
        'filter' => [
            'fieldName' => 'pagePath',
            'stringFilter' => [
                'value' => $_SERVER['REQUEST_URI'],
                'matchType' => 'EXACT'
            ]
        ]
    ]
]);

$response = $analytics->properties->runReport("properties/{$property_id}", $request);
$views = $response->getRows()[0]->getMetricValues()[0]->getValue();

echo "<footer><p>Энэ хуудсыг {$views} удаа үзсэн байна</p></footer>";
