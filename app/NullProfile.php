<?php

namespace App;

class NullProfile extends Model
{
    protected $id = 0;
    protected $user_id = 0;
    protected $username = 'null_user';
    protected $biography = '';
    protected $address_1 = 'NullAddress';
    protected $address_2 = null;
    protected $city = 'NullCity';
    protected $state = 'ZZ';
    protected $country = 'US';
    protected $postal_code = '00000';
}
