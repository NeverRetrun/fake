<?php


namespace Fake\Providers\Avatar;


use Fake\Providers\ProviderInterface;

abstract class AvatarAbstract implements ProviderInterface
{
    /**
     * @var int size
     */
    protected int $size = 32;

    protected string $randomString = '';

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getRandomString(): string
    {
        return $this->randomString;
    }

    /**
     * @param string $randomString
     */
    public function setRandomString(string $randomString): void
    {
        $this->randomString = $randomString;
    }
}