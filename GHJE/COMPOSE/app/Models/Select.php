<?php
namespace App\Models;

/**
 * Класс Select - создает select элемент
 * Наследует от класса Control (не от Input, т.к. это не input элемент)
 */
class Select extends Control
{
    // Приватное поле для хранения массива опций
    private $items; // Массив строк - элементов select

    /**
     * Конструктор класса Select
     * @param string $_background - цвет фона
     * @param string $_width - ширина
     * @param string $_height - высота
     * @param string $_name - имя select элемента
     * @param string $_value - выбранное значение
     * @param array $_items - массив опций для select
     */
    public function __construct($_background, $_width, $_height, $_name, $_value, $_items)
    {
        // Вызов родительского конструктора
        parent::__construct($_background, $_width, $_height, $_name, $_value);
        // Установка массива элементов через метод
        $this->setItems($_items);
    }

    /**
     * Получить массив элементов select
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Установить массив элементов select
     * @param array $items - массив строк
     */
    public function setItems($items)
    {
        // Проверяем, что передан массив
        if (is_array($items)) {
            $this->items = $items;
        } else {
            // Если не массив, создаем пустой массив
            $this->items = [];
        }
    }
}
?>