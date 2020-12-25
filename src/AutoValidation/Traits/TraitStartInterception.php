<?php

    namespace ShieldForce\AutoValidation\Traits;

    trait TraitStartInterception
    {
        public function __construct()
        {
            dd("trait");
        }
    }