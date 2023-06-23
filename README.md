# PHP_LOGIN
Projeto LOGIN, utilizando a linguagem PHP com conexão a um banco de dados desenvolvido em SQL, afim de realizar um login e cadastro com base no "user" e "password" em um banco de dados.

Antes de tudo, este projeto tem como objetivo a realização de um login e cadastro de um usuário e senha, alem de deslogar. Nota-se que utilizei conceitos de PHP orientado a objeto para a realização de todas ações do projeto, tanto para efetuar o login, cadastrar e deslogar. O arquivo "listusers.sql" é o banco de dados utilizado, desenvolvido em MySQL, de um forma totalmente simples. Este é um projeto bem minimalista, sem muitos detalhes, apenas para efetivar e colocar em pratica meu conhecimento. Tenho a inteção de em um futuro próximo aperfeiçoar mais, ou ate incrementar diversas funções, se não a realização de um projeto novo utilizando tais aprendizados. 


Nota -> O arquivo "session.php" realiza um verificação da existencia de alguma sessão, sendo chamado atraves de um "include" pelo arquivo "tela.php", afim de verificar se já possui uma sessão em andamento, caso seja negado, redirecionará para a página "index.html", para que efetue o login, caso exista, apenas entra na página normalmente.
