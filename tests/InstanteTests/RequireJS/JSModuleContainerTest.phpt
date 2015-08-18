<?php

namespace InstanteTests\RequireJS;

use Instante\RequireJS\JSModuleContainer;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../bootstrap.php';

class JSModuleContainerTest extends TestCase
{
    public function testContainer()
    {
        $c = new JSModuleContainer(__DIR__ . '/deps.json');
        $c->useModule('foo', ['fooConfig']);
        $c->useModule('baz');
        $c->configureModule('foobar', function() { return 'foobarConfig'; });
        $c->configureModule('unused', ['this is not used']);
        $modules = $c->getModules();
        Assert::same(1, count(array_filter($modules, function($pair) {
            return isset($pair['baz']) && count($pair['baz'] === 0);
        })), "Module with no config loaded with empty array config");
        Assert::same('foobarConfig',
            array_slice(array_filter($modules, function($pair) {
                return isset($pair['foobar']);
            }), 0)[0]['foobar'], "callback configuration test");

        // modules are intentionally nested in single-element arrays to preserve their order in JS
        Assert::equal([
            ['baz' => []],
            ['foobar' => 'foobarConfig'],
            ['foo' => ['fooConfig']],

        ], $modules, "everything OK");
    }
}

run(new JSModuleContainerTest);
