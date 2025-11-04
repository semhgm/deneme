<?php
namespace App\Services;

class ProductService
{
/**
* Verilen fiyata KDV ekleyerek nihai fiyatı hesaplar.
*
* @param float $price KDV'siz ham fiyat.
* @param int $vatRate Yüzde olarak KDV oranı (örn: 18).
* @return float KDV dahil nihai fiyat.
*/
public function calculateVatPrice(float $price, int $vatRate = 20): float
    {
        if ($price < 0) {
        return 0; // Veya bir hata fırlatılabilir.
    }

    $vatAmount = $price * ($vatRate / 100);
    $finalPrice = $price + $vatAmount;

    return round($finalPrice, 2);

    }
    }
