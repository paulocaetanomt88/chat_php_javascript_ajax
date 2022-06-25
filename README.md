# ChatApp - chat em tempo real com PHP, Javascript, MySQL empregando AJAX (Asynchronous Javascript and XML) que é uma técnica javascript que utiliza o método XMLHttpRequest para fazer requisições assíncronas. Pensando de forma simples, uma função javascript assume o papel de navegador acessando uma determinada url e fornecendo como retorno o conteúdo HTML gerado pela url acessada.

Segui o video tutorial no Youtube porém fiz o código-fonte em português, criei minhas variáveis e adicionei comentários explicativos para melhorar a experiência de aprendizado e facilitar o entendimento de quem for analisar este projeto.
Quem quiser ver o video tutorial e projeto original pode acessar pelo link: <https://www.youtube.com/watch?v=VnvzxGWiK54>

Tecnologias empregadas: PHP, MySQL, Javascript e HTML
IDE utilizada: VS Code
Servidor: XAMPP

# Sobre a aplicação
Neste aplicativo de bate-papo, ao abri-lo pela primeira vez em seu navegador, é mostrado um formulário de inscrição onde você deve se inscrever com seus dados como nome, e-mail, senha e imagem. O campo de e-mail e imagem é totalmente validado, o que significa que você deve inserir apenas um e-mail válido e um arquivo de imagem. Depois de se inscrever com sucesso, você será redirecionado para a página do usuário, onde poderá ver seu nome completo, imagem, status e botão de logout na parte superior, e usuários como você aparecem na parte inferior se alguém se inscreveu.

Nesta página, você pode ver a imagem, o nome, o status e a última mensagem, se eles enviaram para você. Você precisa clicar no usuário específico ou também pode pesquisar qualquer usuário existente com o nome dele, então você será redirecionado para a página de bate-papo e lá poderá ver a imagem, o nome, o status desse usuário que vai conversar.

Depois de enviar uma mensagem para outro usuário, imediatamente essa mensagem aparecerá na sua caixa de bate-papo e em outra caixa de bate-papo do usuário para a qual você enviou a mensagem. Na caixa de bate-papo do receptor de mensagens, esse usuário recebeu a mensagem com a imagem do remetente. Lembre-se de que a caixa de bate-papo será rolada automaticamente para a parte inferior assim que a caixa de bate-papo começar a rolar. Você pode sair do aplicativo de bate-papo a qualquer momento e, assim que sair, imediatamente todos os outros usuários saberão que você saiu ou está offline.

Depois de sair, você pode fazer login novamente e com seu e-mail e senha que você usou ao se inscrever no formulário. Se você inseriu as credenciais corretas, será redirecionado para a página do usuário e todos os outros usuários saberão imediatamente que você fez logon e agora está ativo.
