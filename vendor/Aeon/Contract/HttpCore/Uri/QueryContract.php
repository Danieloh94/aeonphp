<?php

    namespace Aeon\Contract\HttpCore\Uri;

    interface QueryContract
    {
        public function __toString();
        public function get();
        public function set($query);
    }