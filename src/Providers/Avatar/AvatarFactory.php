<?php declare(strict_types=1);

namespace Fake\Providers\Avatar;


class AvatarFactory
{
    /**
     * @var AvatarAbstract avatar
     */
    protected AvatarAbstract $avatar;

    public function __construct(AvatarAbstract $avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * 设置头像尺寸
     * @param int $size
     * @return $this
     */
    public function setSize(int $size): AvatarFactory
    {
        $this->avatar->setSize($size);
        return $this;
    }

    /**
     * 获取文件内容
     * @return string
     */
    public function fileContent(): string
    {
        return $this->avatar->output();
    }

    /**
     * set avatar providers
     * @param AvatarAbstract $avatar
     * @return $this
     */
    public function setAvatarProviders(AvatarAbstract $avatar): AvatarFactory
    {
        $this->avatar = $avatar;
        return $this;
    }
}