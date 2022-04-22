<?php

namespace Arcanely\Editor\View\Components;

use Arcanely\Editor\View\Components\Component;

class Editor extends Component
{
    public $saveBtnId;
    public $content;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($saveBtnId, $content = null)
    {
        $this->saveBtnId = $saveBtnId;
        $this->content = $content;
    }

    public function recurseToolOptions($options) {
        $t = "";
        foreach($options as $k => $v) {
            // If the key is 'class' then don't wrap in quotes.
            if ($k == 'class') {
                $t .= "{$k}: {$v}, ";
            } elseif (is_string($v)) {
                $t .= "{$k}: \"{$v}\", ";
            } elseif (gettype($v) == 'array') {
                $t .= "{$k}: { ";
                $t .= $this->recurseToolOptions($v);
                $t .= "},";
            }
        }
        return $t;
    }

    public function toolsToJsObject() {
        $t = "{";
        foreach (config('editor.tools') as $tool => $options) {
            if (is_string($options)) { // No options passed; The value is a class.
                $t .= "{$tool}: {$options},";
            } elseif (gettype($options) == 'array') {
                $t .= "{$tool}: {";
                $t .= $this->recurseToolOptions($options);
                $t .= "},";
            }
        }
        $t .= "}";
        return $t;
    }
}
