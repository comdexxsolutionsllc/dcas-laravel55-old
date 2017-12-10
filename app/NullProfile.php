<?php

namespace App;

/**
 * App\NullProfile
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 */
class NullProfile extends Model
{
    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var int
     */
    protected $user_id = 0;

    /**
     * @var string
     */
    protected $username = 'null_user';

    /**
     * @var string
     */
    protected $biography = '';

    /**
     * @var string
     */
    protected $address_1 = 'NullAddress';

    /**
     * @var null
     */
    protected $address_2 = null;

    /**
     * @var string
     */
    protected $city = 'NullCity';

    /**
     * @var string
     */
    protected $state = 'ZZ';

    /**
     * @var string
     */
    protected $country = 'US';

    /**
     * @var string
     */
    protected $postal_code = '00000';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getBiography(): string
    {
        return $this->biography;
    }

    /**
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address_1;
    }

    public function getAddress2()
    {
        return $this->address_2;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postal_code;
    }
}
