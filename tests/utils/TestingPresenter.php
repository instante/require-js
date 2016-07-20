<?php

namespace Instante\Tests\RequireJS\Utils;

use Nette\Application\UI\Presenter;
use Nette\InvalidStateException;

class TestingPresenter extends Presenter
{
    public $components = [];
    public $templateFile;

    protected function createComponent($name)
    {
        if (isset($this->components[$name])) {
            return $this->components[$name];
        }
        return parent::createComponent($name);
    }

    public function renderDefault()
    {
        if ($this->templateFile === NULL) {
            throw new InvalidStateException('Template file must be set');
        }
        $this->getTemplate()->setFile($this->templateFile);
    }
}
