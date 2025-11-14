
// Задание 7: Расчет скидки
export function calculateDiscount(amount: number): number {
    let discount = 0;
    if (amount >= 200 && amount < 300) discount = 0.03;
    else if (amount >= 300 && amount < 500) discount = 0.05;
    else if (amount >= 500) discount = 0.07;
    return amount * (1 - discount);
}

declare global {
    interface Window { calculateDiscountTS: (amount: number) => number; }
}
window.calculateDiscountTS = calculateDiscount;