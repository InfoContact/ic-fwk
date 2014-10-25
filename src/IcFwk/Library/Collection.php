<?php

namespace InfoContact\IcFwk\Library;

/**
 * Classe Collection
 *
 * Permet la gestion de tableaux en tant qu'objets pour en simplifier l'utilisation.
 */
class Collection implements \IteratorAggregate, \ArrayAccess {

    private $items;

    public function __construct(array $items) {
        $this->items = $items;
    }
    
    /**
     * Récupère la valeur pour une clé $key
     * @param string $key
     * @return mixed
     */
    public function get($key) {
        $index = explode(".", $key);
        return $this->getValue($index, $this->items);
    }

    /**
     * 
     * @param array $indexes
     * @param array $value
     * @return mixed
     */
    private function getValue(array $indexes, $value) {
        $key = array_shift($indexes);
        if(empty($indexes)) {
            if(!array_key_exists($key, $value)) {
                return NULL;
            }
            $result = $value[$key];
            if(is_array($result)) {
                return new \InfoContact\IcFwk\Library\Collection($result);
            }
            return $result;
        }
        return $this->getValue($indexes, $value[$key]);
    }

    public function set($key, $value) {
        $this->items[$key] = $value;
    }

    public function has($key) {
        return array_key_exists($key, $this->items);
    }

    public function lists($key, $value) {
        $results = [];
        foreach ($this->items as $item) {
            $results[$item[$key]] = $item[$value];
        }
        return new \InfoContact\IcFwk\Library\Collection($results);
    }

    public function extract($key) {
        $results = [];
        foreach ($this->items as $item) {
            $results[] = $item[$key];
        }
        return new \InfoContact\IcFwk\Library\Collection($results);
    }

    public function join($glue) {
        return implode($glue, $this->items);
    }

    public function max($key = false) {
        if($key) {
            return $this->extract($key)->max();
        }
        return max($this->items);
    }

    public function offsetExists($offset) {
        return $this->has($offset);
    }

    public function offsetGet($offset) {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value) {
        $this->set($offset, $value);
    }

    public function offsetUnset($offset) {
        if($this->has($offset)) {
            unset($this->items[$offset]);
        }
    }
    public function getIterator() {
        return new \ArrayIterator($this->items);
    }

}
