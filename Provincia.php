<?php
class Provincia implements JsonSerializable{
    protected $name;
    protected $id;
    protected $localidades ;
    protected $acive;
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
        return 32;
    }
    function setName(string $name){
        $this->name=$name;
    }
    function setId(int $id){
        $this->id=$id;
    }

    function setAcive(bool $n){
        $this->acive=$n;
    }
    function getAcive(){
        return $this->acive;
    }
    function getAllLocalidades(): array{
        $provincias = ["adawd", "aDawd"];
        return $provincias;
    }
    
    function addLocalidad(Localidad $localidad){
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