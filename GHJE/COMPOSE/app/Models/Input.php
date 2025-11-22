<?php
// Объявление пространства имен
namespace App\Models;

/**
 * Класс Input - наследует от Control
 * Представляет базовый input элемент с дополнительным типом
 */
class Input extends Control
{
    // Приватное свойство только для этого класса
    private $type; // Тип input элемента (text, password, email и т.д.)

    /**
     * Конструктор класса Input
     * @param string $_background - цвет фона
     * @param string $_width - ширина
     * @param string $_height - высота
     * @param string $_name - имя элемента
     * @param string $_value - значение элемента
     * @param string $_type - тип input элемента
     */
    public function __construct($_background, $_width, $_height, $_name, $_value, $_type)
    {
        // Вызов родительского конструктора для инициализации общих свойств
        parent::__construct($_background, $_width, $_height, $_name, $_value);
        // Установка специфического для Input свойства
        $this->type = $_type;
    }

    /**
     * Получить тип input элемента
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Установить тип input элемента
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
?>