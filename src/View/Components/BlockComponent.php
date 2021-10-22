<?php

namespace Arcanely\Editor\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;

abstract class BlockComponent extends BaseComponent
{
    public $block;

	public function __construct($block)
	{
        $this->block = $block;
	}

    /** @inheritDoc */
    public function render()
    {
        $alias = Str::kebab(class_basename($this));

        $tag = "arcanely::blocks.$alias";

        return view($tag);
    }
}