<?php

/**
 * Irányítatlan, egyszeres gráf.
 */
class Graf {
    /**
     * @var int
     */
    private $csucsokSzama;
    /**
     * A gráf élei
     * 
     * @var El[]
     */
    private $elek = [];
    /**
     * A gráf csúcsai
     * 
     * @var Csucs[]
     */
    private $csucsok = [];

    /**
     * Létehoz egy úgy, N pontú gráfot, élek nélkül.
     * 
     * @param int $csucsok A gráf csúcsainak száma
     */
    public function __construct($csucsok) {
        $this->csucsokSzama = $csucsok;
        
        // Minden csúcsnak hozzunk létre egy új objektumot
        for ($i = 0; $i < $csucsok; $i++) {
            $this->csucsok[] = new Csucs($i);
        }
    }
    
    /**
     * Hozzáad egy új élt a gráfhoz
     * 
     * @param int $cs1 Az él egyik pontja
     * @param int $cs2 Az él másik pontja
     * @throws Exception A csúcs indexe hibás
     */
    public function hozzaad($cs1, $cs2) {
        if ($cs1 < 0 || $cs1 >= $this->csucsokSzama ||
            $cs2 < 0 || $cs2 >= $this->csucsokSzama) {
            throw new Exception("Hibas csucs index");
        }
        
        // $cs1 mindig legyen kisebb, mint $cs2
        // Ha nem, akkor cseréljük meg
        if ($cs2 < $cs1) {
            $tmp = $cs1;
            $cs1 = $cs2;
            $cs2 = $tmp;
        }
        
        // Ha már szerepel az él, akkor nem kell felvenni
        foreach ($this->elek as $el) {
            if ($el->getCsucs1() === $cs1 && $el->getCsucs2() === $cs2) {
                return;
            }
        }
        
        $this->elek[] = new El($cs1, $cs2);
    }
    
    public function __toString() {
        $str = "Csucsok:\n";
        foreach ($this->csucsok as $cs) {
            $str .= $cs . "\n";
        }
        $str .= "Elek:\n";
        foreach ($this->elek as $el) {
            $str .= $el . "\n";
        }
        return $str;
    }
}
