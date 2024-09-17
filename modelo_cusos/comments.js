document.addEventListener('DOMContentLoaded', () => {
    const commentForm = document.getElementById('commentForm');
    const commentInput = document.getElementById('commentInput');
    const commentsContainer = document.getElementById('commentsContainer');

    commentForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const commentText = commentInput.value.trim();
        if (commentText === '') return;

        // Create new comment element
        const commentDiv = document.createElement('div');
        commentDiv.classList.add('fscoment');

        commentDiv.innerHTML = `
            <div class="user">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Etrj7SYknitFM3_TL7O2S1YoU7yswbXBLQ&s" alt="User">
                <h2>Nome de usuario</h2>
            </div>
            <div class="comentario">
                ${commentText}
            </div>
        `;

        // Append new comment to the comments container
        commentsContainer.appendChild(commentDiv);

        // Clear input field
        commentInput.value = '';
    });
});
