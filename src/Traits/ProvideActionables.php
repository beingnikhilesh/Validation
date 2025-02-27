<?php

namespace beingnikhilesh\Validation\Traits;

trait ProvidesActionables
{
    /**
     * Proxy any Actionable call to the right api call
     * @param $name
     * @return mixed
     */
    public function createActionable($name)
    {   
        if (in_array($name, array_keys($this->availableActionables))) {
            $class =  $this->availableActionables[$name];
            return new $class($this->config);
        }
    }

    /**
     * Get the list of available modules
     * @return array
     */
    public function getAvailableActionables()
    {
        return $this->availableActionables;
    }
    /**
     * Get the list of available modules keys
     * @return array
     */
    public function getAvailableActionableKeys()
    {
        return array_keys($this->getAvailableActionables());
    }
}
