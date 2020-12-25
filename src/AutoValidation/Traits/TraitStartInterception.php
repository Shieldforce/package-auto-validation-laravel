<?php

    namespace ShieldForce\AutoValidation\Traits;

    use Illuminate\Database\Eloquent\Model;
    use ShieldForce\AutoValidation\Observers\InterceptObserversModel;

    trait TraitStartInterception
    {
        public function __construct(Model $model)
        {
            $model::observe(new InterceptObserversModel);
        }
    }