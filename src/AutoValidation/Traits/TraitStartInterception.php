<?php

    namespace ShieldForce\AutoValidation\Traits;

    trait TraitStartInterception
    {
        protected static function boot()
        {
            dd("boot");
        }

        public function __construct()
        {
            dd("construct");
        }
    }