<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-27
 * Time: 21:59
 */

namespace EmailEncrypt\Test\Cases;


use EmailEncrypt\Lib\EmailEncrypt;
use PHPUnit\Framework\TestCase;

class TestEmailEncrypt extends TestCase
{
    protected $testEmailArr = [
        'jjctc888@gmail.com',
        'cincycocoabloggers@gmail.com',
        'megan.howell@outlook.com',
        'nylecehuerta@yahoo.com',
        'jasmineflower2000@comcast.net',
        'hr.longbob@qq.com'
    ];
    protected $encodeArr = [];

    public function setUp() : void {
        foreach ($this->testEmailArr as $email){
            $encodeEmail = EmailEncrypt::encode($email);
            array_push($this->encodeArr , $encodeEmail);
            $this->assertNotFalse(filter_var($encodeEmail, FILTER_VALIDATE_EMAIL));
        }
    }

    public function testDecode(){
        foreach ($this->encodeArr as $k => $encodeEmail){
            $this->assertEquals($this->testEmailArr[$k] , EmailEncrypt::decode($encodeEmail));
        }
    }
}