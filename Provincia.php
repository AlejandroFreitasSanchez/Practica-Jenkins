<?php
class Provincia implements JsonSerializable{
    protected $name;
    protected $id;
    protected $localidades ;
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
    function setName(string $name){
        $this->name=$name;
    }
    function setId(int $id){
        $this->id=$id;
    }

    function getLocalidades(): array{
        return $this->localidades;
    }
    function addLocalidad(string $localidad){
        $this->localidades[] = $localidad;
    }
    public function  jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'name' => $this->getName(),
            'localidades' => $this->getLocalidades()
        ];
    }
} 