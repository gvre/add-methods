<?php
/**
 * Trait that can add methods to an object at runtime.
 *
 * @package Gvre.AddMethods
 * @version 1.0
 * @author Giannis Vrentzos <gvre@gvre.gr>
 * @licence http://opensource.org/licenses/MIT MIT
 *
 */
Trait AddMethods
{
    private $methods = [];

    public function addMethod(...$args)
    {
        // Use \Closure::bind, instead of an assignment, to change the context of the closure
        $this->methods[$args[0]] = \Closure::bind($args[1], $this, get_class());
    }

    public function addMethods(array $methods)
    {
        foreach($methods as $m)
            $this->addMethod($m[0], $m[1]);
    }

    public function __call($name, $args)
    {
        if (isset($this->methods[$name])) {
            $f = $this->methods[$name];
            return $f($args);
        }
    }
}

