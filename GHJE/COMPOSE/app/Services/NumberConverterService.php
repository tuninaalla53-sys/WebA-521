<?php

namespace App\Services;

class NumberConverterService
{
    private array $units = ['', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'];
    private array $teens = ['десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать'];
    private array $tens = ['', '', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'];
    private array $hundreds = ['', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот'];
    private array $thousands = ['', 'тысяча', 'тысячи', 'тысяч'];

    public function convertToText(int $number): string
    {
        if ($number == 0) {
            return 'ноль';
        }
        
        $result = '';
        
        if ($number >= 1000) {
            $thousands = floor($number / 1000);
            $result .= $this->convertThreeDigit($thousands, true) . ' ';
            $result .= $this->getThousandForm($thousands) . ' ';
            $number %= 1000;
        }
        
        if ($number > 0) {
            $result .= $this->convertThreeDigit($number);
        }
        
        return trim($result);
    }

    private function convertThreeDigit(int $number, bool $isThousands = false): string
    {
        $result = '';
        
        if ($number >= 100) {
            $hundreds = floor($number / 100);
            $result .= $this->hundreds[$hundreds] . ' ';
            $number %= 100;
        }
        
        if ($number >= 20) {
            $tens = floor($number / 10);
            $result .= $this->tens[$tens] . ' ';
            $number %= 10;
            
            if ($number > 0) {
                $result .= $isThousands ? $this->getUnitForThousands($number) : $this->units[$number];
            }
        } elseif ($number >= 10) {
            $result .= $this->teens[$number - 10] . ' ';
        } elseif ($number > 0) {
            $result .= $isThousands ? $this->getUnitForThousands($number) : $this->units[$number];
        }
        
        return trim($result);
    }

    private function getUnitForThousands(int $number): string
    {
        return match($number) {
            1 => 'одна',
            2 => 'две', 
            3 => 'три',
            4 => 'четыре',
            default => $this->units[$number]
        };
    }

    private function getThousandForm(int $number): string
    {
        $lastDigit = $number % 10;
        $lastTwoDigits = $number % 100;
        
        if ($lastTwoDigits >= 11 && $lastTwoDigits <= 14) {
            return $this->thousands[3];
        }
        
        return match($lastDigit) {
            1 => $this->thousands[1],
            2, 3, 4 => $this->thousands[2],
            default => $this->thousands[3]
        };
    }
}