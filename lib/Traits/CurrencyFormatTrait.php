<?php
namespace Lib\Traits;

trait currencyFormat
{
    public function toEuro($number)
    {
        return number_format($number, 2, ',', '.') . '€';
    }
}
