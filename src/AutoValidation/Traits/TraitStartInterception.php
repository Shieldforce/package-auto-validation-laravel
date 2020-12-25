<?php

    namespace ShielfForce\AutoValidation\Traits;

    trait TraitStartInterception
    {
        public function __construct()
        {
            dd("trait");
        }
    }