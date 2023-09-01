const searchInput = document.getElementById('search-input');
const lupa = document.getElementById('lupa');
const searchResults = document.getElementById('search-results');
const button1 = document.getElementById('button1');
const button2 = document.getElementById('button2');
const button3 = document.getElementById('button3');
const button4 = document.getElementById('button4');

lupa.addEventListener('click', function () {
    const searchTerm = searchInput.value.toLowerCase().trim();
    const h2Elements = document.querySelectorAll('h2');
    const results = [];

    if (searchTerm !== '') {
        for (let i = 0; i < h2Elements.length; i++) {
            const h2Element = h2Elements[i];

            if (h2Element.innerText.toLowerCase().includes(searchTerm)) {
                results.push(h2Element);
            }
        }
    }

    searchResults.innerHTML = '';

    results.forEach(function (result) {
        const li = document.createElement('li');
        li.textContent = result.innerText;
        li.addEventListener('click', function () {
            if (result.innerText === 'Matemática') {
                window.location.href = 'vistiar.html';
            } else if (result.innerText === 'Português') {
                window.location.href = 'visitar.html';
            } else if (result.innerText === 'Geografia') {
                window.location.href = 'visitar.html';
            } else if (result.innerText === 'História') {
                window.location.href = 'visitar.html';
            }
        });
        searchResults.appendChild(li);
    });

    searchResults.style.position = "absolute";
});