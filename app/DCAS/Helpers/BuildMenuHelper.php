<?php

namespace DCAS\Helpers;

use Tree\Node\Node;
use URL;

class BuildMenuHelper
{
    /**
     * @param $node
     * @return string
     */
    public static function getOutput($node)
    {
        if ($node->isLeaf()) {
            $output = '<li><a href="' . URL::to($node->getValue()->slug) . '">' . $node->getValue()->title . '</a></li>';
        } else {
            if ($node->getValue()->title == 'Features')
                $output = '<li class="dropdown drop-down drob-sub"><a class="dropdown-toggle" data-toggle="dropdown" href="' . URL::to($node->getValue()->slug) . '">' . $node->getValue()->title . '</a>' . '<ul class="dropdown-menu features-ui">';
            else
                $output = '<li class="dropdown drop-down"><a class="dropdown-toggle" data-toggle="dropdown" href="' . URL::to($node->getValue()->slug) . '">' . $node->getValue()->title . '</a>' . '<ul class="dropdown-menu">';

            foreach ($node->getChildren() as $nodec) {
                $output .= getOutput($nodec);
            }

            $output .= '</ul></li>';
        }

        return $output;
    }

    /**
     * @param $tree
     * @return string
     */
    public static function printMenu($tree)
    {
        $output = '';

        foreach ($tree->getChildren() as $node) {
            $output .= self::getOutput($node);
        }

        return $output;
    }
}
