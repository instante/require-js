<?php

namespace Instante\RequireJS\Components;

use Instante\RequireJS\JSModuleContainer;

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
        $this->paths = $paths;
    }

    /** @return JsLoader */
    public function create()
    {
        return new JsLoader($this->dist, $this->paths, $this->jsModuleContainer);
    }
}
