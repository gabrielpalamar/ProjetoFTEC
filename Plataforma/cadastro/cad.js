const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  
  const nome = form.nome.value;
  const email = form.email.value;
  const senha = form.senha.value;
  const confirmaSenha = form.confirma_senha.value;
  
  if (senha !== confirmaSenha) {
    alert('As senhas não conferem. Tente novamente.');
  } else {
    // Aqui pode ser feito o envio dos dados do formulário para um servidor, por exemplo.
    alert('Cadastro realizado com sucesso!');
    form.reset();
  }
});