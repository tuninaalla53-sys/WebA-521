<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Input;
use App\Models\Radio;
use App\Models\Checkbox;
use App\Models\Select;

// Встроенный класс HTMLConverter прямо в контроллере
class HTMLConverter
{
    /**
     * Преобразует объект Control в HTML код
     */
    public static function convertToHTML($control)
    {
        if ($control instanceof Radio) {
            return self::convertRadioToHTML($control);
        } elseif ($control instanceof Checkbox) {
            return self::convertCheckboxToHTML($control);
        } elseif ($control instanceof Select) {
            return self::convertSelectToHTML($control);
        } elseif ($control instanceof Input) {
            return self::convertInputToHTML($control);
        } else {
            return self::convertControlToHTML($control);
        }
    }

    /**
     * Преобразует Radio в HTML
     */
    private static function convertRadioToHTML($radio)
    {
        // Генерируем стили на основе свойств объекта
        $style = self::generateStyle($radio);
        
        // Проверяем состояние checked
        $checked = $radio->getCheckedState() ? ' checked' : '';
        
        // Создаем HTML код для radio button
        $html = '<input type="radio" name="' . htmlspecialchars($radio->getName()) . '"' .
                ' value="' . htmlspecialchars($radio->getValue()) . '"' .
                ' style="' . $style . '"' . $checked . '>' .
                '<label style="margin-left: 5px;">' . htmlspecialchars($radio->getValue()) . '</label><br>';
        
        return $html;
    }

    /**
     * Преобразует Checkbox в HTML
     */
    private static function convertCheckboxToHTML($checkbox)
    {
        // Генерируем стили
        $style = self::generateStyle($checkbox);
        
        // Проверяем состояние checked
        $checked = $checkbox->getCheckedState() ? ' checked' : '';
        
        // Создаем HTML код для checkbox
        $html = '<input type="checkbox" name="' . htmlspecialchars($checkbox->getName()) . '"' .
                ' value="' . htmlspecialchars($checkbox->getValue()) . '"' .
                ' style="' . $style . '"' . $checked . '>' .
                '<label style="margin-left: 5px;">' . htmlspecialchars($checkbox->getValue()) . '</label><br>';
        
        return $html;
    }

    /**
     * Преобразует Select в HTML
     */
    private static function convertSelectToHTML($select)
    {
        // Генерируем стили
        $style = self::generateStyle($select);
        
        // Начинаем создание select элемента
        $html = '<select name="' . htmlspecialchars($select->getName()) . '" style="' . $style . '">';
        
        // Добавляем option элементы из массива items
        foreach ($select->getItems() as $item) {
            // Проверяем, совпадает ли значение с выбранным
            $selected = ($item == $select->getValue()) ? ' selected' : '';
            $html .= '<option value="' . htmlspecialchars($item) . '"' . $selected . '>' . 
                     htmlspecialchars($item) . '</option>';
        }
        
        // Завершаем select элемент
        $html .= '</select><br>';
        
        return $html;
    }

    /**
     * Преобразует Input в HTML
     */
    private static function convertInputToHTML($input)
    {
        // Генерируем стили
        $style = self::generateStyle($input);
        
        // Создаем HTML код для input элемента
        $html = '<input type="' . htmlspecialchars($input->getType()) . '"' .
                ' name="' . htmlspecialchars($input->getName()) . '"' .
                ' value="' . htmlspecialchars($input->getValue()) . '"' .
                ' style="' . $style . '" placeholder="' . htmlspecialchars($input->getName()) . '"><br>';
        
        return $html;
    }

    /**
     * Преобразует базовый Control в HTML (запасной вариант)
     */
    private static function convertControlToHTML($control)
    {
        // Генерируем стили
        $style = self::generateStyle($control);
        
        // Создаем простой div элемент
        $html = '<div style="' . $style . '">' . 
                htmlspecialchars($control->getName()) . ': ' . 
                htmlspecialchars($control->getValue()) . '</div>';
        
        return $html;
    }

    /**
     * Генерирует строку CSS стилей на основе свойств объекта
     */
    private static function generateStyle($control)
    {
        // Начинаем с пустой строки
        $style = '';
        
        // Добавляем background-color если установлен
        if ($control->getBackground()) {
            $style .= 'background-color: ' . $control->getBackground() . ';';
        }
        
        // Добавляем width если установлена
        if ($control->getWidth()) {
            $style .= 'width: ' . $control->getWidth() . ';';
        }
        
        // Добавляем height если установлена
        if ($control->getHeight()) {
            $style .= 'height: ' . $control->getHeight() . ';';
        }
        
        // Добавляем общие стили для лучшего внешнего вида
        $style .= 'padding: 8px; margin: 5px; border: 1px solid #ddd; border-radius: 4px; font-family: Arial, sans-serif;';
        
        return $style;
    }
}

// Основной класс контроллера
class FormController extends Controller
{
    /**
     * Метод для отображения формы регистрации
     */
    public function showRegistrationForm()
    {
        // Создаем поле для имени пользователя
        $usernameInput = new Input('#f0f8ff', '250px', '35px', 'username', '', 'text');
        
        // Создаем поле для email
        $emailInput = new Input('#f0f8ff', '250px', '35px', 'email', '', 'email');
        
        // Создаем поле для пароля
        $passwordInput = new Input('#f0f8ff', '250px', '35px', 'password', '', 'password');
        
        // Создаем radio buttons для выбора пола
        $maleRadio = new Radio('#e6f7ff', 'auto', 'auto', 'gender', 'male', false);
        $femaleRadio = new Radio('#ffe6e6', 'auto', 'auto', 'gender', 'female', true);
        
        // Создаем checkbox для согласия с условиями
        $agreeCheckbox = new Checkbox('#f0fff0', 'auto', 'auto', 'agree_terms', 'yes', false);
        
        // Создаем select для выбора страны
        $countrySelect = new Select('#f8f0ff', '250px', '40px', 'country', 'USA', [
            'USA', 'Canada', 'UK', 'Germany', 'France', 'Other'
        ]);
        
        // Создаем select для выбора хобби
        $hobbiesSelect = new Select('#fff0f8', '250px', '80px', 'hobbies', 'Reading', [
            'Reading', 'Sports', 'Music', 'Travel', 'Cooking', 'Gaming'
        ]);
        
        // Создаем кнопку отправки формы
        $submitInput = new Input('#4CAF50', '120px', '40px', 'submit', 'Register', 'submit');
        
        // Преобразуем все элементы в HTML код
        $formElements = [
            'username' => HTMLConverter::convertToHTML($usernameInput),
            'email' => HTMLConverter::convertToHTML($emailInput),
            'password' => HTMLConverter::convertToHTML($passwordInput),
            'male_gender' => HTMLConverter::convertToHTML($maleRadio),
            'female_gender' => HTMLConverter::convertToHTML($femaleRadio),
            'agree_terms' => HTMLConverter::convertToHTML($agreeCheckbox),
            'country' => HTMLConverter::convertToHTML($countrySelect),
            'hobbies' => HTMLConverter::convertToHTML($hobbiesSelect),
            'submit' => HTMLConverter::convertToHTML($submitInput)
        ];
        
        // Передаем HTML код в представление
        return view('form', compact('formElements'));
    }
    
    /**
     * Метод для обработки данных формы
     */
    public function processRegistration(Request $request)
    {
        // Получаем все данные из формы
        $data = $request->all();
        
        // В реальном приложении здесь была бы валидация и сохранение в базу данных
        
        // Возвращаем обратно с сообщением об успехе
        return back()->with('success', 'Форма успешно отправлена!')->withInput();
    }
}