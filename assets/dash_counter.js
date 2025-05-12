//#region - start of - number counter animation
const counterAnim = (qSelector, start = 0, end, duration = 1000) => {
    const target = document.querySelector(qSelector);
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        target.innerText = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
            }
    };

    window.requestAnimationFrame(step);
};
   //#endregion - end of - number counter animation
   
document.addEventListener("DOMContentLoaded", () => {
counterAnim("#counter1", 100, 380, 400);
counterAnim("#counter2", 100, 409, 500);
// counterAnim("#counter3", 0, 10, 500);
});