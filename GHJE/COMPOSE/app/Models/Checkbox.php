<?php
namespace App\Models;

/**
 * Класс Checkbox - создает checkbox элемент
 * Наследует от класса Input
 */
class Checkbox extends Input
{
    // Приватное поле для хранения состояния
    private $isChecked; // Состояние checked (true/false)

    /**
     * Конструктор класса Checkbox
     * @param string $_background - цвет фона
     * @param string $_width - ширина
     * @param string $_height - высота
     * @param string $_name - имя checkbox
     * @param string $_value - значение checkbox
     * @param bool $_isChecked - состояние checked
     */
    public function __construct($_background, $_width, $_height, $_name, $_value, $_isChecked)
    {
        // Вызов родительского конструктора с типом "checkbox"
        parent::__construct($_background, $_width, $_height, $_name, $_value, "checkbox");
        // Установка состояния
        $this->setCheckedState($_isChecked);
    }

    /**
     * Получить состояние checked
     * @return bool
     */
    public function getCheckedState()
    {
        return $this->isChecked;
    }

    /**
     * Установить состояние checked
     * @param bool $isChecked
     */
    public function setCheckedState($isChecked)
    {
        $this->isChecked = (bool)$isChecked;
    }
}
?>