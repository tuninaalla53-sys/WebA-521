
// Задание 1: Определение возрастной категории
interface AgeCategory {
    min: number;
    max: number;
    name: string;
}

const ageCategories: AgeCategory[] = [
    { min: 0, max: 11, name: 'Ребенок' },
    { min: 12, max: 18, name: 'Подросток' },
    { min: 19, max: 60, name: 'Взрослый' },
    { min: 61, max: 150, name: 'Пенсионер' }
];

export function checkAge(age: number): string {
    if (age < 0 || age > 150) {
        return 'Некорректный возраст';
    }
    
    const category = ageCategories.find(cat => 
        age >= cat.min && age <= cat.max
    );
    
    return category ? category.name : 'Не определено';
}

// Глобальная функция для использования в HTML
declare global {
    interface Window {
        checkAgeTS: (age: number) => string;
    }
}

window.checkAgeTS = checkAge;