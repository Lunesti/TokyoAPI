<?php

namespace TokyoAPI\Model;

class Pagination
{
    //Attributs  
    private $_nbrElementPerPage;
    private $_totalElements;
    private $_currentPage;
    //creation date

    //Getters

    public function getNbrElementPerPage()
    {
        return $this->_nbrElementPerPage;
    }

    public function getTotalElements()
    {
        return $this->_totalElements;
    }

    public function getCurrentPage()
    {
        return $this->_currentPage;
    }

    //Setters

    public function setNbrElementPerPage($nbrElementPerPage)
    {
        $this->_nbrElementPerPage = $nbrElementPerPage;
    }

    public function setTotalElements($totalElements)
    {
        $this->_totalElements = $totalElements;
    }

    public function setCurrentPage($currentPage)
    {
        $this->_currentPage = $currentPage;
    }
}
