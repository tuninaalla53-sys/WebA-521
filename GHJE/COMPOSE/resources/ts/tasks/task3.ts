
// Задание 3: Проверка одинаковых цифр в числе
export function hasDuplicateDigits(num: number): boolean {
    const digits = num.toString().split('');
    return digits.some((digit, index) => digits.indexOf(digit) !== index);
}

declare global {
    interface Window { hasDuplicateDigitsTS: (num: number) => boolean; }
}
window.hasDuplicateDigitsTS = hasDuplicateDigits;