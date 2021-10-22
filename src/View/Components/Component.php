<?php

namespace Arcanely\Editor\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;

abstract class Component extends BaseComponent
{
	protected string $namespace;

	public function __construct(string $namespace)
	{
		$this->namespace = $namespace;
	}

    /** @inheritDoc */
    public function render()
    {
        $alias = Str::kebab(class_basename($this));

        $tag = "arcanely::$alias";

        return view($tag);
    }
}