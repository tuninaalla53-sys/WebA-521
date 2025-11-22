<?php
// Объявление пространства имен для организации кода
namespace App\Models;

/**
 * Базовый класс Control - родительский класс для всех элементов управления
 * Содержит общие свойства и методы для всех UI элементов
 */
class Control
{
    // Защищенные свойства - доступны в этом классе и наследниках
    protected $background; // Цвет фона элемента
    protected $width;      // Ширина элемента
    protected $height;     // Высота элемента
    protected $name;       // Имя элемента для формы
    protected $value;      // Значение элемента

    /**
     * Конструктор класса - вызывается при создании нового объекта
     * @param string $_background - цвет фона
     * @param string $_width - ширина
     * @param string $_height - высота  
     * @param string $_name - имя элемента
     * @param string $_value - значение элемента
     */
    public function __construct($_background, $_width, $_height, $_name, $_value)
    {
        // Инициализация свойств объекта переданными значениями
        $this->background = $_background;
        $this->width = $_width;
        $this->height = $_height;
        $this->name = $_name;
        $this->value = $_value;
    }

    // Методы получения значений свойств (геттеры)
    
    /**
     * Получить цвет фона элемента
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Получить ширину элемента
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Получить высоту элемента
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Получить имя элемента
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Получить значение элемента
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    // Методы установки значений свойств (сеттеры)

    /**
     * Установить цвет фона
     * @param string $background
     */
    public function setBackground($background)
    {
        $this->background = $background;
    }

    /**
     * Установить ширину
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Установить высоту
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Установить имя
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Установить значение
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
?>