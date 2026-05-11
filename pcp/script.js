document.getElementById('exercicioForm').addEventListener('submit', function(e) {
    const nome = document.getElementById('nome_aluno').value;
    if (nome.trim() === "") {
        alert("Por favor, preencha o nome do aluno.");
        e.preventDefault();
        return;
    }
    
    // Confirmação antes de enviar
    if (!confirm("Deseja realmente enviar suas respostas?")) {
        e.preventDefault();
    }
});
