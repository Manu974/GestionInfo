<?php

namespace GestionInfo\DAO;

use Doctrine\DBAL\Connection;
use GestionInfo\Domain\Printer;

class PrinterDAO extends DAO
{
    
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from imp order by imp_id desc";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $printers = array();
        foreach ($result as $row) {
            $printerId = $row['imp_id'];
            $printers[$printerId] = $this->buildDomainObject($row);
        }
        return $printers;
    }

    /**
     * Saves a printer into the database.
     *
     * @param \GestionInfo\Domain\Printer $printer The printer to save
     */
    public function save(Printer $printer) {
        $printerData = array(
            'imp_id' => $printer->getId(),
            'imp_name' => $printer->getName(),
            'imp_ip' => $printer->getIp(),
            'imp_location' => $printer->getLocation(),
            'ipm_achat' => $printer->getAchat()

            );

        if ($printer->getId()) {
            // The comment has already been saved : update it
            $this->getDb()->update('imp', $printerData, array('imp_id' => $printer->getId()));
        } else {
            // The printer has never been saved : insert it
            $this->getDb()->insert('imp', $printerData);
            // Get the id of the newly created printer and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $printer->setId($id);
        }
    }

    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Printers data.
     * @return \GestionInfo\Domain\Printer
     */
    protected function buildDomainObject(array $row) {
        $printer= new Printer();
        $printer->setId($row['imp_id']);
        $printer->setName($row['imp_name']);
        $printer->setIp($row['imp_ip']);
        $printer->setLocation($row['imp_location']);
        $printer->setAchat($row['ipm_achat']);
        return $printer;
    }
}