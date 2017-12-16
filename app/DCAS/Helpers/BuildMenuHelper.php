<?php

use Tree\Node\Node;

if (!function_exists('getResult')) {
    function getOutput(Node $node)
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
}

if (!function_exists('printMenu')) {
    function printMenu(Node $tree)
    {
        $output = '';

        foreach ($tree->getChildren() as $node) {
            $output .= getOutput($node);
        }

        return $output;
    }
}