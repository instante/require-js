<?php

namespace Instante\RequireJS\Components;

use Instante\RequireJS\JsModuleContainer;

class JsLoaderFactory
{

    /** @var bool */
    private $source;

    /** @var JsModuleContainer */
    private $jsModuleContainer;

    /** @var array */
    private $paths;

    /**
     * @param bool $source - use source js files from frontend/js (false ~ use compiled .min.js files)
     * @param array $paths (source, requirejs, dist)
     * @param JsModuleContainer $jsModuleContainer
     */
    public function __construct($source = FALSE, array $paths = [], JsModuleContainer $jsModuleContainer)
    {
        $this->source = $source;
        $this->jsModuleContainer = $jsModuleContainer;
        $this->paths = $paths;
    }

    /** @return JsLoader */
    public function create()
    {
        return new JsLoader($this->source, $this->paths, $this->jsModuleContainer);
    }
}
