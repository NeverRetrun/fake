<?php declare(strict_types=1);

namespace Fake;


use Fake\Providers\Avatar\AvatarFactory;
use Fake\Providers\Avatar\Handlers\GitHubStyleAvatar;
use Fake\Providers\Nickname\NicknameFactory;
use InvalidArgumentException;

/**
 * @property AvatarFactory $avatar
 * @property NicknameFactory $nickname
 */
class Fake
{
    /**
     * @var array $providers
     */
    protected array $providers = [];

    /**
     * @var Fake|null Singleton
     */
    public static ?Fake $fake;

    public function __construct()
    {
        $this->putProvider('avatar', new AvatarFactory(new GitHubStyleAvatar()));
        $this->putProvider('nickname', new NicknameFactory());
    }

    /**
     * get self instance
     * @return Fake
     */
    public static function instance(): Fake
    {
        return self::$fake ?? new self;
    }

    /**
     * get provider instance
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->providers[$name])) {
            return $this->providers[$name];
        }

        throw new InvalidArgumentException('invalid provider name');
    }

    /**
     * put provider
     * @param string $name
     * @param $instance
     * @return Fake
     */
    public function putProvider(string $name, $instance): Fake
    {
        $this->providers[$name] = $instance;
        return $this;
    }
}