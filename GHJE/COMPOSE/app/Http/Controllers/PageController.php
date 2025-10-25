<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Метод для отображения таблицы
    public function showTable()
    {
       
        $headers = ['', 'Header 1', 'Header 2', 'Header 3', 'Header 4', 'Header 5'];
        
        // Создаем массив данных для таблицы
        $tableData = [
            ['Line 1', 23, 123, 43, 12, 76],
            ['Line 2', 23, 123, 43, 12, 76],
            ['Line 3', 34, 63, 25, 7, 23],
            ['Line 4', 23, 23, 23, 23, 23],
            ['Line 5', 23, 23, 23, 23, 23],
            ['Line 6', 23, 23, 23, 23, 23],
            ['Line 7', 23, 23, 23, 23, 23],
            ['Line 8', 23, 23, 23, 23, 23],
        ];
        
       
        return view('table', compact('headers', 'tableData'));
    }


  public function showHome()
    {
        return view('home');
    }


    // Метод для отображения бокового меню
    public function showSidebar()
    {
        // Создаем массив иконок меню
        $menuItems = [
            ['icon' => 'edit.png', 'alt' => 'Edit'],
            ['icon' => 'favorites.png', 'alt' => 'Favorites'],
            ['icon' => 'history.png', 'alt' => 'History'],
            ['icon' => 'security.png', 'alt' => 'Security'],
            ['icon' => 'settings.png', 'alt' => 'Settings'],
        ];
        
        return view('sidebar', compact('menuItems'));
    }

    // Метод для отображения карточек подписки
    public function showPricing()
    {
        // Создаем массив карточек подписки
        $pricingPlans = [
            [
                'class' => 'enterprise',
                'title' => 'ПРЕДПРИЯТИЕ',
                'price' => '69 долларов США',
                'features' => [
                    '10 ГБ дискового пространства',
                    'Пропускная способность 100 ГБ в месяц',
                    '20 учетных записей электронной почты',
                    'Неограниченное количество поддоменов'
                ]
            ],
            [
                'class' => 'professional',
                'title' => 'ПРОФЕССИОНАЛЬНЫЙ',
                'price' => '$29',
                'features' => [
                    '5 ГБ дискового пространства',
                    '50 ГБ ежемесячной пропускной способности',
                    '8 учетных записей электронной почты',
                    'Неограниченное количество поддоменов'
                ]
            ],
            [
                'class' => 'standard', 
                'title' => 'СТАНДАРТ',
                'price' => '$19',
                'features' => [
                    '3 ГБ дискового пространства',
                    '20 ГБ ежемесячной пропускной способности',
                    '3 аккаунта электронной почты',
                    'Неограниченное количество поддоменов'
                ]
            ],
            [
                'class' => 'basic',
                'title' => 'БАЗОВЫЙ',
                'price' => '$9',
                'features' => [
                    '1 ГБ дискового пространства',
                    '10 ГБ ежемесячной пропускной способности',
                    '2 аккаунта электронной почты',
                    'Неограниченное количество поддоменов'
                ]
            ]
        ];
        
        return view('pricing', compact('pricingPlans'));
    }
}