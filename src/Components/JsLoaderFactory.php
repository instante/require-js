<?php

namespace Instante\RequireJS\Components;

use Instante\RequireJS\JsModuleContainer;

class JsLoaderFactory
{

    /** @var bool */
    private $dist;

    /** @var JsModuleContainer */
    private $jsModuleContainer;

    /** @var array */
    private $paths;

    /**
     * @param bool $dist - use compiled dist files (false ~ use source js files from frontend/js)
     * @param array $paths (source, requirejs, dist)
     * @param JsModuleContainer $jsModuleContainer
     */
    public function __construct($dist = TRUE, array $paths = [], JsModuleContainer $jsModuleContainer)
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
