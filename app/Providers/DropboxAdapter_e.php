<?php


namespace App\Providers;


class DropboxAdapter_e extends \Srmklive\Dropbox\Adapter\DropboxAdapter
{
    /**
     * @throws \Exception
     */
    public function getTemporaryUrl($path): string
    {
        return $this->client->getTemporaryLink($path);
    }
}
