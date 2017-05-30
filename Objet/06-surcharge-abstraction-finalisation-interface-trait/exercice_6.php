<?php
abstract class Vehicule // N'est plus instanciable
{
	final public function demarrer() // fonction non modifiable par les classes enfants
	{
		return 'je demarre';
	}
	
	abstract public function carburant(); // la fonction doit maintenant être redéfinie OBLIGATOIREMENT
	
	public function nombreDeTestObligatoire()
	{
		return 100;
	}
}
//-----------------------
class Peugeot extends Vehicule
{
	public function carburant(){
		return 'Essence';
	}
	
	public function nombreDeTestObligatoire()
	{
		return parent::nombreDeTestObligatoire() + 70; // je surchage la fonction en ajoutant 70 à son traitement de base
	}
}
//-----------------------
class Renault extends Vehicule
{
	public function carburant(){
		return 'Diesel';
	}
	
	public function nombreDeTestObligatoire()
	{
		return parent::nombreDeTestObligatoire() + 30; // je surchage la fonction en ajoutant 30 à son traitement de base
	}
}
//-----------------------






/*
1.	Faire en sorte de ne pas avoir d'objet Vehicule. // abstract

2. 	Obligation pour la Renault et la Peugeot de posséder la même méthode demarrer() qu'un Véhicule de base . // extends + final

3.	Obligation pour la Renault de déclarer un carburant diesel et pour la Peugeot de déclarer un carburant essence (exemple: return 'diesel'; -ou- return 'essence';). // abstract

4.	La Renault doit effectuer 30 tests de + qu'un véhicule de base. // redefinition + surcharge

5.	La Peugeot doit effectuer 70 tests de + qu'un véhicule de base. // redefinition + surcharge

6.	Effectuer les affichages nécessaire. // echo
*/