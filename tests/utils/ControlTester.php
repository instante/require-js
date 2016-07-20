<?php

namespace Instante\Tests\RequireJS\Utils;

use Instante\Tests\Presenters\Helpers\LatteConfigurator;
use Instante\Tests\Presenters\PresenterTester;
use Instante\Tests\Presenters\TestResult;
use Nette\Application\UI\Control;

require_once __DIR__ . '/TestingPresenter.php';

class ControlTester
{
    /**
     * @param Control $control
     * @return TestResult
     */
    public static function test(Control $control)
    {
        $p = new TestingPresenter;
        $p->components['foo'] = $control;
        $p->templateFile = __DIR__ . '/fooComponent.latte';
        $pt = new PresenterTester($p, TEMP_DIR);
        LatteConfigurator::configureTester($pt);
        return $pt->runPresenter();
    }
}
