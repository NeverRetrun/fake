<?php declare(strict_types=1);


namespace Fake\Providers\Nickname\Handlers;


use Fake\Providers\ProviderInterface;

class DictionaryNickname implements ProviderInterface
{
    /**
     * @var array $dictionary 字典
     */
    protected array $dictionary = [];

    public function output()
    {
        return $this->dictionary[random_int(0, count($this->dictionary))];
    }

    /**
     * from file read dictionary
     * @param string $filePath
     * @return DictionaryNickname
     */
    public function fromFile(string $filePath): DictionaryNickname
    {
        $dictionary       = file_get_contents($filePath);
        $this->dictionary = explode("\n", $dictionary);
        return $this;
    }

    /**
     * @param array $dictionary
     */
    public function setDictionary(array $dictionary): void
    {
        $this->dictionary = $dictionary;
    }
}