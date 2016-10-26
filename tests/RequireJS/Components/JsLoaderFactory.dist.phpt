<?php

namespace Instante\Tests\RequireJS\Components;

use Instante\RequireJS\Components\JsLoaderFactory;
use Instante\RequireJS\JsModuleContainer;
use Instante\Tests\RequireJS\Utils\ControlTester;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../utils/ControlTester.php';

$jsmc = new JsModuleContainer(__DIR__ . '/foobarbaz.json');
$jsmc->useModule('foo-bar-baz');
$jsLoader = (new JsLoaderFactory(FALSE, FALSE, [], $jsmc))->create();

$result = ControlTester::test($jsLoader);

Assert::match('~script\.min\.js~', $result->getResponseBody());
Assert::match('~foo-bar-baz~', $result->getResponseBody());
Assert::notContains('Debug mode is available but disabled', $result->getResponseBody());
