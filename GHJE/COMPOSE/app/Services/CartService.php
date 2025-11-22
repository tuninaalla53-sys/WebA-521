<?php

namespace App\Services;

class CartService
{
    public function processCart(array $cartItems): array
    {
        $groupedItems = [];
        
        foreach ($cartItems as $item) {
            $name = $item['name'];
            
            if (isset($groupedItems[$name])) {
                $groupedItems[$name]['count']++;
                $groupedItems[$name]['total_price'] += $item['price'];
            } else {
                $groupedItems[$name] = [
                    'name' => $item['name'],
                    'image' => $item['image'],
                    'price' => $item['price'],
                    'count' => 1,
                    'total_price' => $item['price']
                ];
            }
        }
        
        return array_values($groupedItems);
    }

    public function calculateTotal(array $cart): int
    {
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['total_price'];
        }
        
        return $total;
    }
}