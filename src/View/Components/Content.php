<?php

namespace Arcanely\Editor\View\Components;

use Arcanely\Editor\View\Components\Component;

class Content extends Component
{

    public $content;
    public $blocks;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        if (is_string($content)) {
            $this->content = json_decode($content);
        } else {
            $this->content = $content;
        }
        $this->blocks = $this->content->blocks;
        
    }
}
