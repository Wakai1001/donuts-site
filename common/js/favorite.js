const hearts = document.querySelectorAll('.heart');
const popup = document.getElementById('popup');

hearts.forEach(heart => {
    heart.addEventListener('click', () => {
        const isActive = heart.classList.toggle('clicked');

        showPopup(isActive ? 'お気に入りに追加しました' : 'お気に入りを解除しました');
    });
});

function showPopup(message) {
    popup.textContent = message;
    popup.classList.add('show');
    setTimeout(() => {
        popup.classList.remove('show');
    }, 1500);
}
