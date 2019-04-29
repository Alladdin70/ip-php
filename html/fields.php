<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
abstract class Field{
    abstract protected function getText();
    abstract protected function getWidth();
    abstract protected function getColNum();

    private $colNum;
    private $letters = ["A","B","C","D","E","F","G","H","I","J","K","L","M"];
    
    public function getColLetter($colNum){
        return $this->letters[$colNum];
    }   
}
class numField extends Field{
    public function getText() {
        return "№ п/п";
    }
    public function getWidth(){
        return 8;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function numField($colNum){
        $this->colNum =$colNum;
        return;
    }
    
}

class fnField extends Field{
    public function getText() {
        return "ФИО сотрудника";
    }
    public function getWidth(){
        return 35;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function fnField($colNum){
        $this->colNum =$colNum;
        return;
    }
}
class bgField extends Field{
    public function getText() {
        return "№ пропуска (ID card)";
    }
    public function getWidth(){
        return 20;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function bgField($colNum){
        $this->colNum =$colNum;
        return;
    }
}
class dpNameField extends Field{
    public function getText() {
        return "Название подрядной организации";
    }
    public function getWidth(){
        return 40;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function dpNameField($colNum){
        $this->colNum =$colNum;
        return;
    }
}
class hrsField extends Field{
    public function getText() {
        return "Количество часов";
    }
    public function getWidth(){
        return 18;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function hrsField($colNum){
        $this->colNum =$colNum;
        return;
    }
}


class entDtField extends Field{
    public function getText() {
        return "Дата";
    }
    public function getWidth(){
        return 10;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function entDtField($colNum){
        $this->colNum =$colNum;
        return;
    }
}
class entTmField extends Field{
    public function getText() {
        return "Время";
    }
    public function getWidth(){
        return 10;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function entTmField($colNum){
        $this->colNum =$colNum;
        return;
    }
}
class extDtField extends Field{
    public function getText() {
        return "Дата";
    }
    public function getWidth(){
        return 10;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function extDtField($colNum){
        $this->colNum =$colNum;
        return;
    }
}
class extTmField extends Field{
    public function getText() {
        return "Время";
    }
    public function getWidth(){
        return 10;
    }
    public function getColNum(){
        return $this->colNum;
    }
    function extTmField($colNum){
        $this->colNum =$colNum;
        return;
    }
}