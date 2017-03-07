<?php

namespace GestionInfo\Domain;

class Printer 
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
    private $name;

    /**
     * Printer ip.
     *
     * @var string
     */
    private $ip;

     /**
     * Printer location.
     *
     * @var string
     */
    private $location;

     /**
     * Printer achat.
     *
     * @var \DateTime
     */
    private $achat;

    public function __construct() {
        
        $this->date = new \DateTime();
    }   
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getIp() {
        return $this->ip;
    }

    public function setIp($ip) {
        $this->ip = $ip;
        return $this;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
        return $this;
    }

    public function getAchat() {
        return $this->achat;
    }

    public function setAchat($achat) {
        $this->achat = $achat;
        return $this;
    }
}