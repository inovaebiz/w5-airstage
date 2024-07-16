<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Attachments extends \Inbound  implements \Iterator {

    public function __construct($attachments)
    {
        $this->attachments = $attachments;
        $this->position = 0;
    }

    function get($key) {
        $this->position = $key;

        if( ! empty($this->attachments[$key]))
        {
            return new Attachment($this->attachments[$key]);
        }
        else
        {
            return FALSE;
        }
    }

    function rewind()
    {
        $this->position = 0;
    }

    function current()
    {
        return new Attachment($this->attachments[$this->position]);
    }

    function key()
    {
        return $this->position;
    }

    function next()
    {
        ++$this->position;
    }

    function valid()
    {
        return isset($this->attachments[$this->position]);
    }

}