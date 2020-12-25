<?php


    trait TraitStartInterception
    {
        public function __construct()
        {
            dd("trait");
        }
    }