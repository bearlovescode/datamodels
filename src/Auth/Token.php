<?php
    namespace Bearlovescode\Datamodels\Auth;


    abstract class Token {
        public string $value = '';

       public function __construct(?string $tokenValue)
       {
           if ($tokenValue)
               $this->value = $tokenValue;
       }

       public function __toString(): string
       {
           return $this->value;
       }
    }