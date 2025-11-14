
// Задание 9: Викторина
interface Question {
    question: string;
    options: string[];
    correct: number;
}

const questions: Question[] = [
    {
        question: "Столица Франции?",
        options: ["Лондон", "Берлин", "Париж"],
        correct: 2
    },
    {
        question: "2 + 2?",
        options: ["3", "4", "5"],
        correct: 1
    },
    {
        question: "Цвет неба?",
        options: ["Зеленый", "Синий", "Красный"],
        correct: 1
    }
];

export function calculateScore(answers: number[]): number {
    return answers.reduce((score, answer, index) => 
        answer === questions[index].correct ? score + 2 : score, 0
    );
}

declare global {
    interface Window { calculateScoreTS: (answers: number[]) => number; }
}
window.calculateScoreTS = calculateScore;