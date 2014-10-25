<?php

namespace InfoContact\IcFwk\Library;

/**
 * Classe Collection
 *
 * Permet la gestion de tableaux en tant qu'objets pour en simplifier l'utilisation.
 */
class Collection implements \IteratorAggregate, \ArrayAccess {

    /** @var array $items Tableau de données */
    private $items;

    /**
     * Permet la création de la collection
     * @param array $items Tableau de données
     */
    public function __construct(array $items) {
        $this->items = $items;
    }
    
    /**
     * Récupère la valeur pour une clé $key
     * <p>
     * La méthode est chaînable, on peut accèder aux sous clé par chainage ou en une seule fois.
     * Ex :<br>
     * <pre><code>
     * $maCollection->get("key")->("subkey");
     * $maCollection->get("key.subkey");
     * </code></pre>
     * </p>
     * @param string $key
     * @return mixed
     */
    public function get($key) {
        $index = explode(".", $key);
        return $this->getValue($index, $this->items);
    }

    /**
     * Permet de récupérer la valeur de manière récursive via chainabilité
     * @param array $indexes Tableau des clés successives
     * @param array $value Tableau de recherche
     * @return mixed Valeur de la clé (null si n'existe pas)
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

    /**
     * 
     * @param string $key
     * @param mixed $value
     */
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
