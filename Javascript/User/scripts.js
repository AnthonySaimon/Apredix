document.getElementById('changePhotoBtn').addEventListener('click', function() {
    document.getElementById('uploadPhotoInput').click();
});

document.getElementById('uploadPhotoInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('profileImage').src = e.target.result;
    };

    reader.readAsDataURL(file);
});

document.getElementById('saveUsername').addEventListener('click', function() {
    const newUsername = document.getElementById('newUsername').value;
    if (newUsername) {
        document.getElementById('username').textContent = newUsername;
        alert('Nome de usuário alterado com sucesso!');
    } else {
        alert('Por favor, insira um nome de usuário.');
    }
});

document.getElementById('bioInput').addEventListener('input', function() {
    const bioLength = this.value.length;
    document.getElementById('bioCount').textContent = `${bioLength}/150`;
});
// Automatically save bio when the user types
document.getElementById('bioInput').addEventListener('input', function() {
    const bio = this.value;

    // Save the bio to localStorage
    localStorage.setItem('bio', bio);

    // Update the character count
    const charCount = bio.length;
    document.getElementById('bioCount').textContent = `${charCount}/150`;

    console.log("Bio auto-saved!");
});

// Load the saved bio when the page loads
window.onload = function() {
    if (localStorage.getItem('bio')) {
        document.getElementById('bioInput').value = localStorage.getItem('bio');
        document.getElementById('bioCount').textContent = `${localStorage.getItem('bio').length}/150`;
    }
}
