<?php
class ProvinciaController
{
    private $connection;
    public static $KEY = "provincia";
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    //guardar item, cierto si se ha podido insertar
    function save(Provincia $item):bool
    {
        $this->connection->hset(ProvinciaController::$KEY, $item->getId(), json_encode($item));
        $tempo = $this->connection->hget(ProvinciaController::$KEY, $item->getId());
        if ($tempo != null)
            return true;
        else
            return false;
    }
    //borra el elemento
    function remove(int $id): bool
    {
        $tempo = $this->connection->hdel(ProvinciaController::$KEY, $id);
        if ($tempo != null)
            return
                true;
        else
            return false;
    }

    function getAll(): ?array
    {
        $items=null;
        
        $elements=$this->connection->hgetAll(ProvinciaController::$KEY);
        if($elements!=null){
            $items= array();
            foreach ($elements as $json_text){
                $tempo=new Provincia();
                $tempo->loadfromJSON($json_text);
                array_push($items,$tempo);
            }
        }
        return $items;
    }
    function getById(int $id): ? Provincia
    {
        
        $item = new Provincia();
        $json_text = $this->connection->hget(ProvinciaController::$KEY, $id);
        if ($json_text != null) {
            
            $item->loadfromJSON($json_text);
        }
        return $item;          
    }

    function getAllLocalidades(): array
    {
        $items=null;
        
        $elements=$this->connection->hgetAll(ProvinciaController::$KEY);
        if($elements!=null){
            $items= array();
            foreach ($elements as $json_text){
                $tempo=new Provincia();
                $tempo->loadfromJSON($json_text);
                array_push($items,$tempo->getLocalidades());
                
            }
        }
        return $items;
    }

    function findLocalidad(string $name): Localidad
    {
        $item = new Localidad();
        foreach($this->getAll() as $localidad){
            if($localidad->name == $name){
                $item = new Localidad($localidad->id, $localidad->name);
                return $item;
            }
        }
        return $item;
    }
}
