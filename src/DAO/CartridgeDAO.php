<?php

namespace GestionInfo\DAO;

use Doctrine\DBAL\Connection;
use GestionInfo\Domain\Cartridge;

class CartridgeDAO extends DAO
{
    
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from cartridge order by car_id desc";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $cartridges = array();
        foreach ($result as $row) {
            $cartridgeId = $row['car_id'];
            $cartridges[$cartridgeId] = $this->buildDomainObject($row);
        }
        return $cartridges;
    }

    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id The user id.
     *
     * @return \GestionInfo\Domain\Printer|throws an exception if no matching user is found
     */
    public function find($id) {
        $sql = "select * from cartridge where car_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No user matching id " . $id);
    }

    /**
     * Saves a cartridge into the database.
     *
     * @param \GestionInfo\Domain\Printer $cartridge The cartridge to save
     */
    public function save(Cartridge $cartridge) {
        $cartridgeData = array(
            'car_id' => $cartridge->getId(),
            'car_printerstype' => $cartridge->getPrinterstype(),
            'car_inktype' => $cartridge->getInktype(),
            'car_inkname' => $cartridge->getInkname(),
            'car_quantite' => $cartridge->getQuantite()

            );

        if ($cartridge->getId()) {
            // The comment has already been saved : update it
            $this->getDb()->update('cartridge', $cartridgeData, array('car_id' => $cartridge->getId()));
        } else {
            // The cartridge has never been saved : insert it
            $this->getDb()->insert('cartridge', $cartridgeData);
            // Get the id of the newly created cartridge and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $cartridge->setId($id);
        }
    }

    /**
     * Removes an article from the database.
     *
     * @param integer $id The printer id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('cartridge', array('car_id' => $id));
    }

    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Printers data.
     * @return \GestionInfo\Domain\Cartridge
     */
    protected function buildDomainObject(array $row) {
        $cartridge= new Cartridge();
        $cartridge->setId($row['car_id']);
        $cartridge->setPrinterstype($row['car_printerstype']);
        $cartridge->setInktype($row['car_inktype']);
        $cartridge->setInkname($row['car_inkname']);
        $cartridge->setQuantite($row['car_quantite']);
        return $cartridge;
    }
}
