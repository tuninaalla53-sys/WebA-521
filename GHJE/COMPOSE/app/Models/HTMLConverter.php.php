<?php

namespace App\Models;

use App\Models\Control;
use App\Models\Input;
use App\Models\Radio;
use App\Models\Checkbox;
use App\Models\Select;

class HTMLConverter
{
    public static function convertToHTML(Control $control)
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

    private static function convertRadioToHTML(Radio $radio)
    {
        $style = self::generateStyle($radio);
        $checked = $radio->getCheckedState() ? ' checked' : '';
        
        $html = '<input type="radio" name="' . htmlspecialchars($radio->getName()) . '"' .
                ' value="' . htmlspecialchars($radio->getValue()) . '"' .
                ' style="' . $style . '"' . $checked . '>' .
                htmlspecialchars($radio->getValue()) . '<br>';
        
        return $html;
    }

    private static function convertCheckboxToHTML(Checkbox $checkbox)
    {
        $style = self::generateStyle($checkbox);
        $checked = $checkbox->getCheckedState() ? ' checked' : '';
        
        $html = '<input type="checkbox" name="' . htmlspecialchars($checkbox->getName()) . '"' .
                ' value="' . htmlspecialchars($checkbox->getValue()) . '"' .
                ' style="' . $style . '"' . $checked . '>' .
                htmlspecialchars($checkbox->getValue()) . '<br>';
        
        return $html;
    }

    private static function convertSelectToHTML(Select $select)
    {
        $style = self::generateStyle($select);
        
        $html = '<select name="' . htmlspecialchars($select->getName()) . '" style="' . $style . '">';
        
        foreach ($select->getItems() as $item) {
            $selected = ($item == $select->getValue()) ? ' selected' : '';
            $html .= '<option value="' . htmlspecialchars($item) . '"' . $selected . '>' . 
                     htmlspecialchars($item) . '</option>';
        }
        
        $html .= '</select><br>';
        
        return $html;
    }

    private static function convertInputToHTML(Input $input)
    {
        $style = self::generateStyle($input);
        
        $html = '<input type="' . htmlspecialchars($input->getType()) . '"' .
                ' name="' . htmlspecialchars($input->getName()) . '"' .
                ' value="' . htmlspecialchars($input->getValue()) . '"' .
                ' style="' . $style . '" placeholder="' . htmlspecialchars($input->getName()) . '"><br>';
        
        return $html;
    }

    private static function convertControlToHTML(Control $control)
    {
        $style = self::generateStyle($control);
        
        $html = '<div style="' . $style . '">' . 
                htmlspecialchars($control->getName()) . ': ' . 
                htmlspecialchars($control->getValue()) . '</div>';
        
        return $html;
    }

    private static function generateStyle(Control $control)
    {
        $style = '';
        
        if ($control->getBackground()) {
            $style .= 'background-color: ' . $control->getBackground() . ';';
        }
        
        if ($control->getWidth()) {
            $style .= 'width: ' . $control->getWidth() . ';';
        }
        
        if ($control->getHeight()) {
            $style .= 'height: ' . $control->getHeight() . ';';
        }
        
        $style .= 'padding: 5px; margin: 2px; border: 1px solid #ccc;';
        
        return $style;
    }
}