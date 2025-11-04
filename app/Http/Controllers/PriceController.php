<?php

// app/Http/Controllers/PriceController.php

namespace App\Http\Controllers;

use App\Services\ProductService; // Servis sınıfımızı import ediyoruz.
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Ürünün KDV'li fiyatını hesaplar ve gösterir.
     *
     * @param Request $request
     * @param ProductService $productService Laravel bu parametreyi görerek servisi otomatik olarak enjekte eder.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, ProductService $productService)
    {
        // 1. Gelen istekten fiyat parametresini doğrula ve al.
        $validated = $request->validate([
            'price' => 'required|numeric|min:0'
        ]);

        $basePrice = (float) $validated['price'];

        // 2. İş mantığını yürütmek için Controller'ı değil, Service'i kullan.
        // Controller, servisin bu hesaplamayı NASIL yaptığını bilmek zorunda değil.
        // Sadece ne yaptığını bilir.
        $finalPrice = $productService->calculateVatPrice($basePrice);

        // 3. Sonucu JSON olarak döndür.
        return response()->json([
            'original_price' => $basePrice,
            'vat_rate'       => 20, // Serviste varsayılan değeri kullandık
            'final_price'    => $finalPrice
        ]);
    }
}
