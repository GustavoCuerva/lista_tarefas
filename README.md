
# Lista de tarefas - Laravel

Esse projeto foi feito por mim para treinar e testar os conhecimentos adquiridos com relação a ferramente laravel. Durante esse projeto foi utilizado bootstrap para facilitar o desenvolvimento do front-end, e php no backend.
Ao utilizar o laravel foi possivel treinar conceitos do CRUD, rotas, controllers, migrate e configuração da aplicação em laravel. Devido o objetivo desse projeto ser aplicar os conceitos aprendidos sobre a ferramenta laravel, ele possui mais coisas do que o nescessário, mas que foram implementadas para treinamento.
## Stack
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)

![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)

![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

## Instalação

De um git clone no projeto em seu servidor local e abra a pasta no terminal de sua preferencia.

Primeiramnete você deverá ter o composer intalado em sua máquina assim como o node.

Dentro do terminal na pasta dode o comando `composer install`

Vá até o seu php my admin, caso esteja utilizando o xampp que já deve estar iniciado, e crie uma nova base de dados.

Depois disso vá ao arquvio `.env.example` e o configure suas informações do banco de dados com algo do tipo:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= Nome da base de dados que você criou
DB_USERNAME=root
DB_PASSWORD=
```
E salve esse arquivo, `.env.example`, como `.env`

Voltando ao terminal de comando que está aberto na pasta raiz do projeto rode o comando `php artisan migrate`

Depois de terminar a execução do comando acima rode o comando final `php artisan serve`

Abra outro terminal na pasta e execute o comando `npm install`

Após terminar essa intalação rode `npm run dev`

Clique no link seguindo a instrução e caso ocorra algum erro como pedindo uma chave apenas clique em gerar chave.

## Screenshots

![home](https://user-images.githubusercontent.com/86535275/200401215-60c78d87-efec-4eab-bdf7-9d7ba46f48e5.png)

![list](https://user-images.githubusercontent.com/86535275/200401229-6edc5902-a3a5-4900-90a2-a47d99bc0e77.png)

![create](https://user-images.githubusercontent.com/86535275/200401162-6779049c-3b52-4e4f-876f-574884359e8a.png)

![task](https://user-images.githubusercontent.com/86535275/200401258-77e0cc30-4c21-4ce7-b834-2ffe3fb9a2fd.png)