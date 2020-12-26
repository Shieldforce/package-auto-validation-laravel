<?php

    namespace ShieldForce\AutoValidation\Observers;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class InterceptObserversModel
    {
        /**
         * @var Request
         */
        protected $request;

        /**
         * InterceptObserversModel constructor.
         * @param Request|null $request
         */
        public function __construct(Request $request=null)
        {
            $this->request = $request;
        }

        /**
         * @param $validator
         * @param Request $request
         * @return bool|\Illuminate\Http\RedirectResponse|void
         */
        public function returnType($validator)
        {
            if($this->request->routeType=="api")
            {
                return response()->json([
                    'code'       => 407,
                    'status'     => "error",
                    'message'    => "Validação de Campos não passou!!",
                    'data'       => [
                        "errorValidation" => $validator->errors()
                    ],
                ], 407)->throwResponse();
            }
            if($this->request->routeType=="web")
            {
                return back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with("errorValidation", $validator->errors())
                    ->throwResponse();
            }
            return true;
        }

        /**
         * @param Model $model
         * @param $method
         * @return bool|\Illuminate\Http\RedirectResponse|void
         */
        public function validationFieldsCustom(Model $model, $method, Request $request)
        {
            if(isset($model::rulesCustom($this->request)[$method]) &&  isset($this->request) && $this->request!=[])
            {
                $validator = Validator::make(
                    $this->request->all(),
                    $model::rulesCustom($this->request)[$method]["validations"] ?? [],
                    $model::rulesCustom($this->request)[$method]["messages"] ?? []
                );
                if($validator->fails())
                {
                    return $this->returnType($validator);
                }
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function creating(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("teste", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function created(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function saving(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function saved(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function updating(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function updated(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function retrieved(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function deleting(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function deleted(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function restoring(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

        /**
         * @param $class
         * @return bool|void|Mixed
         */
        public function restored(Model $model)
        {
            $request = $model::rulesCustom($this->request)["request"];
            $webExist = array_search("web", $model::rulesCustom($this->request)["request"]->route()->middleware());
            $webExist===false && $model::rulesCustom($this->request)["request"]->ajax()==false ? $request["routeType"]="web" : $request["routeType"]="api";
            if(method_exists($model, "rulesCustom") && isset($model::rulesCustom($this->request)[__FUNCTION__]))
            {
                return $this->validationFieldsCustom($model, __FUNCTION__, $request);
            }
            return true;
        }

    }
