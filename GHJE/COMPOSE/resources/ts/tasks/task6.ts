// Задание 6: Конвертер валют
interface ExchangeRates {
    EUR: number;
    UAN: number;
    AZN: number;
}

const rates: ExchangeRates = {
    EUR: 0.85,
    UAN: 27.5,
    AZN: 1.7
};

export function convertCurrency(amount: number, currency: keyof ExchangeRates): number {
    return amount * rates[currency];
}

// Функция-обертка для глобального использования с проверкой типа
function convertCurrencyWrapper(amount: number, currency: string): number {
    const validCurrencies: (keyof ExchangeRates)[] = ['EUR', 'UAN', 'AZN'];
    
    if (validCurrencies.includes(currency as keyof ExchangeRates)) {
        return convertCurrency(amount, currency as keyof ExchangeRates);
    } else {
        throw new Error(`Неверная валюта: ${currency}. Допустимые: EUR, UAN, AZN`);
    }
}

declare global {
    interface Window { 
        convertCurrencyTS: (amount: number, currency: string) => number; 
    }
}

window.convertCurrencyTS = convertCurrencyWrapper;