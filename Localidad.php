<?php
class Localidad implements JsonSerializable{
    public $name;
    protected $id;
    protected $active;
    function __construct(){
    }
    function loadfromJSON(string $json){

        $tempo=json_decode($json,true);
        $this->id=$tempo["id"];
        $this->name=$tempo["name"];
    }
    function getName(): string{
        return $this->name;
    }
    function getId(): int {
        return $this->id;
    }
    function getActive(): bool{
        return $this->active;
    }
    function setActive(bool $a){
        $this->active=$a;
    }
    function setName(string $name){
        $this->name=$name;
    }
    function setId(int $id){
        $this->id=$id;
    }
    public function  jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'name' => $this->getName()
        ];
    }
} 