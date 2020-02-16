<?php
class Hotel {
    private $id;
    private $name;
    private $price;
    private $pref;
    private $city;
    private $address;
    private $memo;
    private $image;

    function __construct(int $id,string $name,int $price,string $pref,string $city,string $address,string $memo,string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->pref = $pref;
        $this->city = $city;
        $this->address = $address;
        $this->memo = $memo;
        $this->image = $image;
    }
    
    function getId():int {
		return $this->id;
	}
	
	function getName():string {
		return $this->name;
	}
	
	function getPrice():int {
		return $this->price;
	}
	
	function getPref():string {
		return $this->pref;
	}
	
	function getCity():string {
		return $this->city;
	}
	
	function getAddress():string {
		return $this->address;
	}
	
	function getMemo():string {
		return $this->memo;
	}
	
	function getImage():string {
		return $this->image;
	}
}
?>