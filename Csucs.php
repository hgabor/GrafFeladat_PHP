<?php

/**
 * A gráf egy csúcsa, és a hozzá tartozó adatok.
 */
class Csucs {
    /**
     * A csúcs azonosítója a gráfban
     * 
     * @var int
     */
    private $id;
    
    /**
     * Létrehoz egy új csúcsot a gráfban
     * 
     * @param int $id A csúcs azonosítója a gráfban
     */
    public function __construct(int $id) {
        $this->id = $id;
    }
    
    public function __toString() : string {
        return strval($this->id);
    }
}
