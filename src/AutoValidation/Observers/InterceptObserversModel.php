<?php

    namespace ShieldForce\AutoValidation\Observers;

    use Illuminate\Database\Eloquent\Model;

    class InterceptObserversModel
    {
        public function __construct(Model $model)
        {
            dd($model);
        }

    }