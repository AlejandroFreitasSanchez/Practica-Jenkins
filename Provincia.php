<?php

class Provincia implements JsonSerializable
{
    protected $name;
    protected $id;
    protected $localidades = [];
    protected $active;
    function __construct()
    {
    }
    function loadfromJSON(string $json)
    {

        $tempo = json_decode($json, true);
        $this->id = $tempo["id"];
        $this->name = $tempo["name"];
    }
    function getName(): string
    {
        return $this->name;
    }
    function getId(): int
    {
        return 32;
    }
    function setName(string $name)
    {
        $this->name = $name;
    }
    function setId(int $id)
    {
        $this->id = $id;
    }

    function setActive(bool $n)
    {
        $this->active = $n;
    }
    function getActive()
    {
        return $this->active;
    }
    function getLocalidades(): array
    {
        return $this->localidades;
    }
    function getLocalidadById(int $id): Localidad
    {
        $result = null;
        foreach($this->localidades as $localidad){
            if($localidad->id == $id){
                $result = $localidad;
                return $result;
            }
        }
        return $result;
    }
    function getLocalidadByName(string $name): Localidad
    {
        $result = null;
        foreach($this->localidades as $localidad){
            if($localidad->name == $name){
                $result = $localidad;
                return $result;
            }
        }
        return $result;
    }
    function removeLocalidadByName(string $name){
        
        foreach($this->localidades as $localidad){
            if($localidad->name == $name){
                unset($this->localidades[$localidad]);
            }
        }
        
    }

    function removeLocalidadById(int $id){
        foreach($this->localidades as $localidad){
            if($localidad->id == $id){
                unset($this->localidades[$localidad]);
            }
        }
    }
    function addLocalidad(Localidad $localidad)
    {
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
