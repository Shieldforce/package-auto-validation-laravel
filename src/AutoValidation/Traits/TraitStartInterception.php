<?php

    namespace ShieldForce\AutoValidation\Traits;

    use Illuminate\Database\Eloquent\Model;
    use ShieldForce\AutoValidation\Observers\InterceptObserversModel;

    trait TraitStartInterception
    {
        /**
         * Method boot is Model
         * Start Validation (self::observe(new ObserverValidation))
         */
        protected static function boot()
        {
            parent::boot();
            self::observe(new InterceptObserversModel);
        }
    }
