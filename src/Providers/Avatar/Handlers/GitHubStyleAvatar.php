<?php declare(strict_types=1);

namespace Fake\Providers\Avatar\Handlers;

use Fake\Providers\Avatar\AvatarAbstract;
use Fake\Providers\Avatar\AvatarFactory;
use Identicon\Identicon;


class GitHubStyleAvatar extends AvatarAbstract
{
    /**
     * @var Identicon
     */
    protected Identicon $handle;

    public function __construct()
    {
        $this->handle = new Identicon();
    }

    public function output()
    {
        $randomString = $this->randomString;

        if (strlen($randomString) === 0) {
            $randomString = uniqid();
        }

        return $this->handle->getImageData($randomString, $this->size);
    }
}