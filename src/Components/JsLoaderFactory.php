<?php

namespace Instante\RequireJS\Components;

use Instante\RequireJS\JSModuleContainer;

/**
 * Temporarily residing in skeleton - will move to frontend package in future
 */
class JsLoaderFactory
{

    /** @var bool */
    private $dist;

    /** @var JSModuleContainer */
    private $jsModuleContainer;

    /** @var array */
    private $paths;

    /**
     * @param bool $dist - use compiled dist files (false ~ use source js files from frontend/js)
     * @param array $paths (source, requirejs, dist)
     * @param JSModuleContainer $jsModuleContainer
     */
    public function __construct($dist = TRUE, array $paths = [], JSModuleContainer $jsModuleContainer)
    {
        $this->dist = $dist;
        $this->jsModuleContainer = $jsModuleContainer;
        if (!isset($paths['dist'])) {
            $paths['dist'] = 'js/';
        }
        if (!isset($paths['sources'])) {
            $paths['sources'] = '../frontend/src/js/';
        }
        if (!isset($paths['requirejs'])) {
            $paths['requirejs'] = '../frontend/bower_components/requirejs/require.js';
        }
        $this->paths = $paths;
    }

    /** @return JsLoader */
    public function create()
    {
        return new JsLoader($this->dist, $this->paths, $this->jsModuleContainer);
    }
}
