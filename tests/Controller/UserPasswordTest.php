<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Formatter\ApiResponseFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(User::class)]
class UserPasswordTest extends TestCase
{
public function testUserEntityAccessors(): void
{
$user = new User();
$token = 'test_token_123';
$tempPass = 'hashed_password_abc';

$user->setPasswordChangeToken($token);
$user->setTempPassword($tempPass);

$this->assertEquals($token, $user->getPasswordChangeToken());
$this->assertEquals($tempPass, $user->getTempPassword());
}
public function testUserCreation(): void
{
    $user = new User();
    $user->setEmail('test@example.com');
    $user->setPassword('123456');

    $this->assertEquals('test@example.com', $user->getEmail());
}

}
