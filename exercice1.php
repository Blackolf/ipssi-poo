<?php

require_once('vendor/autoload.php');

use Ipssi\Evaluation\Exception\InvalidSaisirException ;


$climate = new League\CLImate\CLImate;

class Diviseur {
  private $erreurMsg ;
  public function division($index, $diviseur)
  {
    $this->erreurMsg ="";
    $res = null;// valeur a retourné

    $this->checkSaisir($index,"indice");
    $this->checkSaisir($diviseur,"diviser");

    $valeurs = [17, 12, 15, 38, 29, 157, 89, -22, 0, 5];
    if($index < 0 || $index > count($valeurs)){
      $this->throwException("indice saisir a dépassé la taille de la table (".count($valeurs).")",1);
    }

    if($diviseur === 0){
      $this->throwException("le diviseur ne peux pas être égale à 0");
    }

    if($this->checkErreur()){
      $res = $valeurs[$index] / $diviseur;
    }

    return $res;
  }

  function checkSaisir($valCheck,$type){
    if($this->checkValInt($valCheck,$type)){
      $this->checkNull($valCheck,$type);
    }
  }

  function checkValInt($valCheck,$type){
    $res = true;
    if( is_numeric($valCheck) === false || ( $valCheck % 1) != 0){
      $this->throwException("La valeur $type n'est pas un entier ");
      $res = false;
    }
    return $res;
  }

  function checkNull($valCheck,$type){
    $res = true;

    if( trim($valCheck) === "" ){
      $this->throwException("La valeur $type est vide ");
      $res = false;
    }
    return $res;
  }


  private function throwException($msg="",$type=""){
    switch ($type) {

      case 1:
      $msg = " Erreur config tableau : ".$msg;
      break;

      default :
      $msg = " Erreur saisir : ".$msg;
      break;
    }
    $this->erreurMsg .= "\r\n".$msg;
  }

  private function checkErreur(){
    if($this->erreurMsg != ""){
      throw new InvalidSaisirException("\r\n".$this->erreurMsg);
      return false;
    }
    return true;
  }

}

$end = false;
do {
  unset($e);
  echo PHP_EOL;
  $input = $climate->input("Entrez l’indice de l’entier à diviser : ");
  $index = $input->prompt();

  $input = $climate->input("Entrez le diviseur : ");
  $diviseur = $input->prompt();
  try {
    $climate->output("Le résultat de la division est : " . (new Diviseur())->division($index, $diviseur));
    $end = true;
  } catch( InvalidSaisirException $e ){
    echo "Erreur";
    echo $e->getInvalidData();
  }catch (\Exception $e) {
    echo "Erreur2";

    echo $e->getMessage();
  }
} while (isset($e));
