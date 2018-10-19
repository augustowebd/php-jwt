<?php
/**
 * Created by PhpStorm.
 * User: Milad Rahimi <info@miladrahimi.com>
 * Date: 6/1/2018 AD
 * Time: 19:16
 */

namespace MiladRahimi\Jwt\Cryptography\Keys;

use MiladRahimi\Jwt\Exceptions\InvalidKeyException;

class PrivateKey
{
    /**
     * @var resource
     */
    private $resource;

    /**
     * PrivateKey constructor.
     *
     * @param string $fileFullPath
     * @throws InvalidKeyException
     */
    public function __construct(string $fileFullPath)
    {
        $this->resource = openssl_pkey_get_private('file:///' . $fileFullPath);

        if (empty($this->resource)) {
            throw new InvalidKeyException();
        }
    }

    /**
     * @return resource
     */
    public function getResource()
    {
        return $this->resource;
    }
}