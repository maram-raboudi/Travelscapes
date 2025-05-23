// favorites.js
document.addEventListener("DOMContentLoaded", () => {
    const heartIcons = document.querySelectorAll(".fa-heart");

    heartIcons.forEach(icon => {
        icon.addEventListener("click", () => {
            icon.classList.toggle("favorited");

            const placeName = icon.closest(".box").querySelector(".content h3").innerText;

            // Placeholder: Send to backend (you can replace with actual fetch call)
            console.log(`Favorite toggled for: ${placeName}`);
            // Example for later backend:
             fetch('favorites.php', {
                 method: 'POST',
                 headers: {'Content-Type': 'application/json'},
                 body: JSON.stringify({ place: placeName })
             });
        });
    });
});
