<?php
    namespace Bearlovescode\Datamodels;

    abstract class ArrayBackedDataModel extends DataModel
    {
        private array $data = [];

        public function setProperty(string $k, mixed $v): void
        {
            $this->__set($k, $v);
        }

        public function toArray(): array
        {
            return $this->data;
        }

        public function __get(string $name)
        {
            return $this->data['name'];
        }

        public function __set(string $name, $value): void
        {
            $this->data[$name] = $value;
        }

        public function __isset(string $name): bool
        {
            return isset($this->data[$name]);
        }
    }