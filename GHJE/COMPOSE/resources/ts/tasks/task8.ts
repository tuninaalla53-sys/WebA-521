
// Задание 8: Окружность в квадрате
export function canCircleFitInSquare(circumference: number, squarePerimeter: number): boolean {
    const circleDiameter = circumference / Math.PI;
    const squareSide = squarePerimeter / 4;
    return circleDiameter <= squareSide;
}

declare global {
    interface Window { canCircleFitInSquareTS: (circumference: number, squarePerimeter: number) => boolean; }
}
window.canCircleFitInSquareTS = canCircleFitInSquare;