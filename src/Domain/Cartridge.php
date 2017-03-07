<?php

namespace GestionInfo\Domain;

class Cartridge 
{
    /**
     * Printer id.
     *
     * @var integer
     */
    private $id;

    /**
     * Printer title.
     *
     * @var string
     */
    private $printerstype;

    /**
     * Printer ip.
     *
     * @var string
     */
    private $inktype;

     /**
     * Printer location.
     *
     * @var string
     */
    private $inkname;

     /**
     * Printer achat.
     *
     * @var interger
     */
    private $quantite;

   
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getPrinterstype() {
        return $this->printerstype;
    }

    public function setPrinterstype($printerstype) {
        $this->printerstype = $printerstype;
        return $this;
    }

    public function getInktype() {
        return $this->inktype;
    }

    public function setInktype($inktype) {
        $this->inktype = $inktype;
        return $this;
    }

    public function getInkname() {
        return $this->inkname;
    }

    public function setInkname($inkname) {
        $this->inkname = $inkname;
        return $this;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
        return $this;
    }
}