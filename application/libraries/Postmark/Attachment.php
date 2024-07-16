<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Attachment extends \Inbound {

    public function __construct($attachment)
    {
        $this->Attachment = $attachment;
        $this->Name = $this->Attachment->Name;
        $this->ContentType = $this->Attachment->ContentType;
        $this->ContentLength = $this->Attachment->ContentLength;
        $this->Content = $this->Attachment->Content;
    }

    private function _read()
    {
        return base64_decode(chunk_split($this->Attachment->Content));
    }

    public function Download($directory)
    {
        file_put_contents($directory . $this->Name, $this->_read());
    }
}