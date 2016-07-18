<?php

namespace Instante\RequireJS\Components;

use Instante\Application\UI\Control;
use Instante\RequireJS\JSModuleContainer;

class JsLoader extends Control
{
    private static $pathDefaults
        = [
            'dist' => 'js/',
            'sources' => '../frontend/src/js/',
            'requirejs' => '../frontend/bower_components/requirejs/require.js',
        ];

    /** @var bool @template */
    private $source;

    /** @var JSModuleContainer @template */
    private $jsContainer;

    /** @var array @template */
    private $paths;

    /**
     * @param bool $source - use source assets? (for development purposes)
     * @param array $paths
     * @param JSModuleContainer $jsModuleContainer
     */
    public function __construct($source, array $paths, JSModuleContainer $jsModuleContainer)
    {
        parent::__construct();
        $this->source = $source;
        $this->jsContainer = $jsModuleContainer;
        $this->paths = $paths + static::$pathDefaults;
    }

    public function beforeRender($args = [])
    {
        $this->template->{'module'} = isset($args['module']) ? $args['module'] : 'script';
    }
}
