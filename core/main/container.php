<?php

namespace Core\Main;

use Core\Router\Route;
use ReflectionClass;

class Container
{
    protected array $bindings = [];

    public function bind(String $key, String | callable $value)
    {
        if (!isset($this->bindings[$key])) {
            $this->bindings[$key] = $value;
        }
    }

    public function make(String $key)
    {
        if (array_key_exists($key, $this->bindings)) {

            $value = $this->bindings[$key];

            if (is_callable($value)) {
                return call_user_func($value);
            } else {
                return $this->resolve($value);
            }
        }

        return $this->resolve($key);
    }

    public function resolve(String $key)
    {
        $reflection = new ReflectionClass($key);

        if (!$reflection->isInstantiable()) {
            throw new \Exception("Invalid class! " . $key . " is not instantiable.");
        }

        $constructor = $reflection->getConstructor();

        if ($constructor != null) {
            $dependencies = $constructor->getParameters();
        }

        if ($constructor === null || count($dependencies) == 0) {
            return $reflection->newInstance();
        }

        $resolvedDependencies = array_map(function ($dependency) use ($key) {
            $name = $dependency->getName();
            $type = $dependency->getType();

            if ($type === null) {
                throw new \Exception("Failed to resolve class " . $key . ". " . $name . " is missing the type hint.");
            }

            if ($type->getName() === App::class) {
                return App::getInstance();
            }


            if ($type instanceof \ReflectionUnionType) {
                throw new \Exception("Failed to resolve " . $key . ". " . $name . " is a union type and can't be instantiated.");
            }

            if ($type->isBuiltin()) {
                throw new \Exception("Failed to resolve " . $key . ". " . $name . " is a built-in type and can't be instantiated.");
            }

            return $this->make($type->getName());
        }, $dependencies);

        return $reflection->newInstanceArgs($resolvedDependencies);
    }

    public function resolveMethod(array | callable $action, array $args)
    {
        $i = 0;
        if (!is_array($action)) {

            $reflectionFunction = new \ReflectionFunction($action);
            $parameters = $reflectionFunction->getParameters();

            if (count($parameters) == 0) {

                return $reflectionFunction->invoke();
            }

            $resolvedParameters = array_map(function ($parameter) use ($args, &$i) {
                $type = $parameter->getType();

                if ($type == null) {
                    if ($i < count($args)) {
                        return $args[$i++]["value"];
                    }
                } else {
                    return $this->make($type->getName());
                }
            }, $parameters);

            return $reflectionFunction->invokeArgs($resolvedParameters);
        } else {

            $object = $action[0];
            $method = $action[1];

            $reflectionMethod = new \ReflectionMethod($object, $method);
            $parameters = $reflectionMethod->getParameters();

            if (count($parameters) == 0) {

                return $reflectionMethod->invoke($object);
            }

            $resolvedParameters = array_map(function ($parameter) {
                $type = $parameter->getType();

                return $this->make($type->getName());
            }, $parameters);

            return $reflectionMethod->invokeArgs($object, $resolvedParameters);
        }
    }
}
