# <strong>EXPENSES</strong> (feito com Laravel 12)

Requisitos:
```
PHP 8.2 ou superior
Composer 2.2 ou superior
Node JS 22 ou superior
Xampp atualizado
```
<hr>

### PASSOS PARA INSTALAR O PROJETO (após tê-lo clonado)

Instalar as dependências do PHP e do Node JS (necessário pois estes arquivos não são compartilhados devido ao gitignore):
```
composer install
npm install
```

Informações sensíveis:
```
Duplicar o arquivo .env.example e renomeá-lo para .env
Alterar os dados do banco de dados conforme o que possui
```

Traduzir projeto para português:
```
https://github.com/lucascudo/laravel-pt-BR-localization
```

Instalar o Laravel Permissions:
```
https://spatie.be/docs/laravel-permission/v6/introduction
```

Gerar a chave no .env:
```
php artisan key:generate
```

Programar a validação diária para o framework verificar o dia da virada do mês:
```
crontab -e
Após tê-lo acessado, adicionar: * * * * * php /home/seu_usuario/caminho-do-projeto/artisan schedule:run >> /dev/null 2>&1
```

Executar as migrations junto das seeders
```
php artisan migrate --seed
```

Ligar o servidor
```
npm run dev
```
<hr>
