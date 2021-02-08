<?php declare(strict_types=1);

namespace Fake\Providers\Nickname\Handlers;


use Fake\Providers\ProviderInterface;

class MobileNickname implements ProviderInterface
{
    protected string $placeholder = '*';

    public function output()
    {
        return $this->prefix()
            . str_repeat($this->placeholder, 4) .
            $this->tail();
    }

    public function tail(): string
    {
        $excepts = [
            '0000',
            '1111',
            '2222',
            '3333',
            '4444',
            '5555',
            '6666',
            '7777',
            '8888',
            '9999'
        ];

        $tail = $this->random();
        if (in_array($tail, $excepts)) {
            return $this->tail();
        }

        return $tail;
    }

    /**
     * 随机数
     * @param int $length
     * @return string
     * @throws \Exception
     */
    protected function random(int $length = 4): string
    {
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= (string)random_int(0, 9);
        }

        return $result;
    }

    /**
     * random mobile number prefix
     * @return string
     * @throws \Exception
     */
    public function prefix(): string
    {
        $except = [
            154,
            157,
        ];

        $programs = [
            [130, 139],
            [150, 159],
            [180, 189]
        ];

        [$min, $max] = $programs[random_int(0, 2)];
        $result = random_int($min, $max);

        if (in_array($result, $except)) {
            return $this->prefix();
        }

        return (string)$result;
    }
}