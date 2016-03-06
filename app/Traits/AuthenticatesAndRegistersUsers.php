<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 06/03/16
 * Time: 13:20
 */

namespace FRD\Traits;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use FRD\Traits\RegistersUsers;

trait AuthenticatesAndRegistersUsers
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
    }
}