<?php
    namespace Bearlovescode\Datamodels;

    abstract class DataModel
    {
        public function __construct(mixed $data = null)
        {
            if ($data)
                $this->hydrate($data);
        }

        protected function hydrate(mixed $data): void
        {
            if (is_array($data))
                $this->hydrateWithArray($data);

            if (is_object($data))
                $this->hydrateWithObject($data);
        }


        private function hydrateWithArray(array $data): void
        {
            foreach ($data as $k => $v)
                $this->setProperty($k, $v);
        }

        private function hydrateWithObject(object $data): void
        {
            $this->hydrateWithArray(get_object_vars($data));
        }

        /**
         * @param string $k
         * @param mixed $v
         * @return void
         */
        public function setProperty(string $k, mixed $v): void
        {
            if (property_exists($this, $k))
                $this->$k = $v;
        }

        public function toArray() : array
        {
            $a = [];
            $props = get_object_vars($this);

            foreach ($props as $prop)
                $a[$prop] = $this->{$prop};

            return $a;
        }
    }