<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-27
 * Time: 15:36
 */

namespace EmailEncrypt\Lib;

/**
 * 编码方法，不产生特殊字符，可逆向
 * 原输入字符串，将编码为2x长度的新字符串，即原字符串长16，新字符串将长32
 * 根据email规则 @前的字符串将限制为32位,编码后为64位（邮箱规则最大长度）
 * Class EmailEncrypt
 * @package EmailEncrypt\Lib
 */
class StrEncrypt
{
    const CHAR_MAP = [
        '0b0000' => 'F', '0b0001' => 'I', '0b0010' => 'R', '0b0011' => 'M',
        '0b0100' => 'O', '0b0101' => 'f', '0b0110' => 'i', '0b0111' => 'r',
        '0b1000' => 'm', '0b1001' => 'o', '0b1010' => 'J', '0b1011' => 'A',
        '0b1100' => 'N', '0b1101' => 'G', '0b1110' => 'C', '0b1111' => 'Z',
    ];

    /**
     * 编码email返回编码后的信息
     * @param string $str
     * @return string
     */
    public static function encode(string $str): string
    {
        $obStr = self::getStrAscii($str);
        $ret = "";
        $obArr = \str_split($obStr, 4);

        foreach ($obArr as $ob) {
            $ret .= self::CHAR_MAP['0b' . $ob];
        }
        return $ret;

    }

    /**
     * 解码email，返回编码前的信息
     * @param string $str
     * @return string
     */
    public static function decode(string $str): string
    {
        $ret = '';
        $obStr = self::getStrAsciiByMap($str);
        $obArr = \str_split($obStr, 8);
        foreach ($obArr as $char){
            $ret .= chr(bindec($char));
        }
        return $ret;

    }

    /**
     * 获取字符串8位2进制string表示
     * @param $str
     * @return string
     */
    private static function getStrAscii(string $str): string
    {
        $obStr = '';
        $strArr = str_split($str);
        foreach ($strArr as $char) {
            $obStr .= sprintf('%08b', ord($char));
        }
        return $obStr;
    }

    /**
     * 通过映射转换编码前的二进制string
     * @param $str
     * @return string
     */
    private static function getStrAsciiByMap(string $str) : string {
        $obStr = '';
        $unMap = array_flip(self::CHAR_MAP);
        $strArr = str_split($str);
        foreach ($strArr as $char){
            $obStr .= $unMap[$char];
        }
        return str_replace('0b' , '' , $obStr);
    }

}