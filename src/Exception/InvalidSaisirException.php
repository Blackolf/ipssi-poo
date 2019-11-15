<?php

namespace Ipssi\Evaluation\Exception;

class InvalidSaisirException extends InvalidDataException {
  // propriétés (ou attributs)

  public function __construct(string $erreurMsg)
  {
      parent::__construct($erreurMsg, 'FournisseurEntier', Customer::class);
  }

}
