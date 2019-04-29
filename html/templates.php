<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('PHPExcel.php');
require_once('PHPExcel/Writer/Excel5.php');
require_once ('fields.php');

abstract class Template{
    public $title;
    public $lastString;
    public $col;
    public $sheet;
    public $xls;
    abstract protected function makeCols();
    abstract protected function makeHeader();
    public function openSheet(){
        $this-> xls = new PHPExcel();
        $this->xls->setActiveSheetIndex(0);
        $this-> sheet = $this->xls->getActiveSheet();
        return;
    }
 }
class ReportTypeOne extends Template{
    public function makeCols(){
        return $this->col = [new numField(0),new dpNameField(1),new fnField(2), new bgField(3)];
    }
    public function makeHeader(){
        foreach($this->col as $field){
            $this->sheet->getColumnDimension($field->getColLetter($field->getColNum()))->setWidth($field->getWidth());
            $this->sheet->setCellValue($field->getColLetter($field->getColNum()). "1",$field->getText());
        }
        return;
    }
}
 
class ReportTypeTwo extends Template{
    public function makeCols() {
        return $this->col=[new numField(0),new fnField(1),new bgField(2), new hrsField(3)];
    }
    public function makeHeader(){
        foreach($this->col as $field){
            $this->sheet->getColumnDimension($field->getColLetter($field->getColNum()))->setWidth($field->getWidth());
            $this->sheet->setCellValue($field->getColLetter($field->getColNum()). "1",$field->getText());
        }
        return;
    }
}
 
class ReportTypeThree extends Template{
    public function makeCols() {
        return $this->col=[new numField(0),new fnField(1),new bgField(2), [new entDtField(3), new entTmField(4), "Вход"],[new extDtField(5), new extTmField(6), "Выход"],new hrsField(7)];
    }
    public function makeHeader(){
        foreach($this->col as $field){
            //echo "step";
            $type = is_array($field);
            if(!($type)){
                $colLetter = $field->getColLetter($field->getColNum());
                //echo $colLetter;
             //   $merged = $colLetter. '1'.':'. $colLetter. '2';
                
                //echo $merged;
                $this->sheet->getColumnDimension($colLetter)->setWidth($field->getWidth());                
                $this->sheet->setCellValue($colLetter. "1",$field->getText());
                //$this->sheet->mergeCells($merged);
                
            
            }
            else {
                $colLetter[0]= $field[0]->getColLetter($field[0]->getColNum());
                $colLetter[1]= $field[1]->getColLetter($field[1]->getColNum());
                $i=0;
                while($i<2){
                    $this->sheet->getColumnDimension($colLetter[$i])->setWidth($field[$i]->getWidth());                
                    $this->sheet->setCellValue($colLetter[$i]. "2",$field[$i]->getText());
                    $i++;
                }
                $this->sheet->setCellValue($colLetter[0]. "1",$field[2]);
                $merged = $colLetter[0]. '1'.':'. $colLetter[1]. '1';
                $this->sheet->mergeCells($merged);
            }
            
            
        }
        
        return;    
    }
            
            
            
}
        
    
