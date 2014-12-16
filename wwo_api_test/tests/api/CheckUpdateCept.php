<?php
$defaultParams = [
    'method' => 'system.setting.checkupdate',
    'uuid' => '222',
    'appid' => '1000',
    'sign' => '1000',
    'platform' => 'iphone',
    'os' => 'ios7.1',
    '_v' => '1.0',
    '_timestamp' => '1000',
];

$I = new ApiTester($scenario);
$I->wantTo('check update');
//$I->amHttpAuthenticated('service_user', '123456');
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendPOST('', $defaultParams);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('last_version');
$I->seeResponseContainsJson(['errno' => 0]);
$I->seeResponseContainsJson(['data' => ['last_version' => '0.7.0']]);

/**
array (
    'errno' => 0,
    'msg' => '',
    'data' =>
    array (
        'timestamp' => 1418710308,
        'last_version' => '0.7.0',
        'app_mate' =>
        array (
        'force' => 0,
        'whatnew' => '更新内容<br />
        1  修复若干BUG<br />',
        'download_url' => 'http://www.gangxu.co/download/wwoapp_last.apk',
        ),
    ),
)
 */