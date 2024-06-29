(function() {

document.addEventListener('DOMContentLoaded', function() {
    console.log("holaaa");
    const targetDate = new Date('June 6, 2025 00:00:00').getTime();
    
    const updateCountdown = () => {
        const now = new Date().getTime();
        const timeLeft = targetDate - now;
        
        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
        
        document.getElementById('dias').textContent = days;
        document.getElementById('horas').textContent = hours;
        document.getElementById('minutos').textContent = minutes;
        document.getElementById('segundos').textContent = seconds;
    };
    
    updateCountdown();
    setInterval(updateCountdown, 1000);
});
})() // IIFE