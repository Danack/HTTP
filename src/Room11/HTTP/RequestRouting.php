<?php


namespace Room11\HTTP;

interface RequestRouting
{
    public function getMethod();
    
    public function getPath();
}
