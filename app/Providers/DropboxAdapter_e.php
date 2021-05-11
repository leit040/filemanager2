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



/*I need this adapter because in original adapter method what make link is named  getTemporaryLink but Laravel FileSystem want to getTemporaryUrl.*/
