<?php

namespace Arcanely\Editor\View\Components\Blocks;

use Arcanely\Editor\View\Components\BlockComponent;

class NestedList extends BlockComponent { 

    public function recurseLists($items, $type) {
        $s = "";
        if (sizeof($items) > 0) {  
            foreach ($items as $item) {
                if (sizeof($item->items) == 0) {
                    $s .= "<li>{$item->content}</li>";
                } else {
                    $s .= "<li>{$item->content}<{$type}>";
                    $s .= $this->recurseLists($item->items, $type);
                    $s .= "</{$type}></li>";
                }
            }
        }
        return $s;
    }

}
