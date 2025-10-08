<?php

declare(strict_types=1);

namespace Xiphias\BladeFxApi\DTO;

class BladeFxTokenTransfer extends AbstractTransfer
{
    protected string $token;

//    /**
//     * @var array<string, string>
//     */
//    protected $transferPropertyNameMap = [
//        'token' => 'token',
//    ];

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return void
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
        $this->modifiedProperties['token'] = true;
    }

//    /**
//     * @param array $data
//     * @param bool $ignoreMissingProperties
//     * @return $this
//     */
//    public function fromArray(array $data, bool $ignoreMissingProperties = false)
//    {
//        foreach ($data as $property => $value) {
//            $normalizedPropertyName = $this->transferPropertyNameMap[$property] ?? null;
//
//            switch ($normalizedPropertyName) {
//                case 'token':
//                case 'username':
//                case 'fullname':
//                case 'email':
//                case 'avatar':
//                case 'idUser':
//                case 'idCompany':
//                case 'idLanguage':
//                case 'languageDescription':
//                case 'licenceExp':
//                    $this->$normalizedPropertyName = $value;
//                    $this->modifiedProperties[$normalizedPropertyName] = true;
//                    break;
//
//                default:
//                    if (!$ignoreMissingProperties) {
//                        throw new \InvalidArgumentException(sprintf('Missing property `%s` in `%s`', $property, static::class));
//                    }
//            }
//        }
//
//        return $this;
//    }
}
