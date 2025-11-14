
// Задание 2: Спецсимволы клавиш
const symbols: string[] = ['!)', '@', '#', '$', '%', '^', '&', '*', '(', ')'];

export function getSymbol(num: number): string {
    if (num < 0 || num > 9) return 'Неверное число';
    return symbols[num];
}

declare global {
    interface Window { getSymbolTS: (num: number) => string; }
}
window.getSymbolTS = getSymbol;