<?php

namespace Instante\Tests\RequireJS\Components;

use Instante\RequireJS\Components\JsLoaderFactory;
use Instante\RequireJS\JsModuleContainer;
use Instante\Tests\Utils\Expose;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../utils/ControlTester.php';

$jsmc = new JsModuleContainer(__DIR__ . '/foobarbaz.json');

$jsLoader = (new JsLoaderFactory(TRUE, [], $jsmc))->create();
$jsLoaderX = new Expose($jsLoader);
Assert::equal($jsLoaderX->pathDefaults, $jsLoaderX->paths);

$jsLoader = (new JsLoaderFactory(TRUE, $p = ['dist' => 'd', 'sources' => 's', 'requirejs' => 'r'], $jsmc))->create();
$jsLoaderX = new Expose($jsLoader);
Assert::equal($p, $jsLoaderX->paths);
