document.addEventListener("DOMContentLoaded", () => {
    const adviceContainer = document.querySelector("#ai-advice-container");
    if (!adviceContainer) return;

    const fetchAdvice = async () => {
        try {
            const response = await fetch('/api/advice');
            const data = await response.json();
            
            if (data.advice) {
                adviceContainer.innerHTML = `<p class="card-text">${data.advice}</p>`;
            }
        } catch (error) {
            console.error("Błąd AI:", error);
            adviceContainer.innerHTML = "Błąd podczas pobierania porady.";
        }
    };

    fetchAdvice();
});