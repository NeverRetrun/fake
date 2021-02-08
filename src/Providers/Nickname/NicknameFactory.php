<?php declare(strict_types=1);

namespace Fake\Providers\Nickname;


use Fake\Providers\Nickname\Handlers\DictionaryNickname;
use Fake\Providers\Nickname\Handlers\MobileNickname;
use Fake\Providers\ProviderInterface;

class NicknameFactory
{
    /**
     * @var ProviderInterface[]
     */
    protected array $handlers = [];

    public function __construct(?string $dictionaryPath = null)
    {
        $defaultDictionaryPath = __DIR__ . '/Handlers/dictionary.txt';

        $this->handlers = [
            (new DictionaryNickname())
                ->fromFile($dictionaryPath ?? $defaultDictionaryPath),
            new MobileNickname(),
        ];
    }

    public function random(): string
    {
        $random = random_int(0, 9);

        if ($random < 8) {
            return $this->handlers[0]->output();
        } else {
            return $this->handlers[1]->output();
        }
    }
}