<?php

namespace App\Http\Middleware;

use App\MenuBar;
use Closure;
use Tree\Node\Node;

class BuildMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tableMenu = MenuBar::orderBy('parent_id', 'ASC')->orderBy('ordering', 'ASC')->get();

        session(['menu' => $this->buildMenuTree($tableMenu)]);

        return $next($request);
    }

    /**
     * @param $tableMenu
     * @return Node
     */
    private function buildMenuTree($tableMenu)
    {
        $root = (new Node('root'));

        foreach ($tableMenu as $row) {
            $node = new Node($row);

            if ($node->getValue()->parent_id == '0') {
                $root->addChild($node);
            } else {
                foreach ($root->getChildren() as $cursor) {
                    $this->InsertNode($cursor, $node);
                }
            }
        }

        return $root;
    }

    /**(
     * @param Node $sourceNode
     * @param Node $newNode
     * @return Node
     */
    private function InsertNode(Node $sourceNode, Node $newNode)
    {
        if ($sourceNode->getValue()->id == $newNode->getValue()->parent_id) {
            $sourceNode->addChild($newNode);
        } else {
            foreach ($sourceNode->getChildren() as $cursor) {
                $this->InsertNode($cursor, $newNode);
            }
        }

        return $sourceNode;
    }
}
