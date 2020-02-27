<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-27
 * Time: 15:47
 */


require './vendor/autoload.php';

//echo base64_encode('我爱你');
echo \EmailEncrypt\Lib\StrEncrypt::encode('I love You!');
//echo \EmailEncrypt\Lib\StrEncrypt::decode('CimmoI');
//var_dump(\EmailEncrypt\Lib\EmailEncrypt::encode('jjctc8888_fromed@gmail.com'));

//echo \EmailEncrypt\Lib\StrEncrypt::decode('iirMiOiirMiORNiFiOiirMrMiOrMiOiirNRiiriiiOiiiArMiOiJiNrMiOiiiJiArMiOiiiJMRMMMmMRMMMRMMMmMOrfMRMMMRMmrfMOMRiJiNiArMiOiJiNiAiirMiOiJiirMrmiMrmiM');
//echo base64_encode('walkingdeer2001343sffffefs');
//var_dump(\EmailEncrypt\Lib\EmailEncrypt::decode('iJiJiMrOiMMmMmMmMmfZiirRiZiGifiO@gmail.com'));

//echo \EmailEncrypt\Lib\EmailEncrypt::decode('rriIiNiAioiCiriOififrRMRMFMFMF@yahoo.com');