
// Задание 5: Проверка палиндрома
export function isPalindrome(num: number): boolean {
    const str = num.toString();
    return str === str.split('').reverse().join('');
}

declare global {
    interface Window { isPalindromeTS: (num: number) => boolean; }
}
window.isPalindromeTS = isPalindrome;