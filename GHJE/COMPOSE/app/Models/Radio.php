<?php
namespace App\Models;

/**
 * Класс Radio - создает radio button
 * Наследует от класса Input
 */
class Radio extends Input
{
    // Приватное поле - доступно только внутри этого класса
    private $isChecked; // Состояние checked (true/false)

    /**
     * Конструктор класса Radio
     * @param string $_background - цвет фона
     * @param string $_width - ширина
     * @param string $_height - высота
     * @param string $_name - имя группы radio кнопок
     * @param string $_value - значение этой конкретной radio кнопки
     * @param bool $_isChecked - выбрана ли эта кнопка
     */
    public function __construct($_background, $_width, $_height, $_name, $_value, $_isChecked)
    {
        // Вызов родительского конструктора с фиксированным типом "radio"
        parent::__construct($_background, $_width, $_height, $_name, $_value, "radio");
        // Установка состояния checked через метод
        $this->setCheckedState($_isChecked);
    }

    /**
     * Получить состояние checked
     * @return bool - true если выбрано, false если нет
     */
    public function getCheckedState()
    {
        return $this->isChecked;
    }

    /**
     * Установить состояние checked
     * @param bool $isChecked - значение для установки
     */
    public function setCheckedState($isChecked)
    {
        // Преобразуем в boolean для надежности
        $this->isChecked = (bool)$isChecked;
    }
}
?>