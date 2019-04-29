<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Employee{
    public $ln = Null;
    public $fn = Null;
    public $mn = Null;
    public $bage = Null;
    public $bageSince = Null;
    public $bageExpired = Null;
    public function getFullName(){
        return $this->ln. " ". $this->fn. " ". $this->mn;
    }
    public function getBage(){
        return;
    }
    public function isAccessAllowed($date){
        return;
    }
}

