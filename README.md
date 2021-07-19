<h1 align="center">
  <br>GAME'S CHAT BACKEND
</h1>

---

Challenge from the Fullstack Developer Bootcamp at <a href="https://geekshubsacademy.com/">GeeksHubs Academy</a> where have to develop a
Full Backend structure (DDBB + PHP + Laravel). This backend allow users to contact other colleagues, to form groups to play a video games or just search for games.

Deployed with Heroku: <a href="https://afp-gameparty.herokuapp.com/">https://afp-gameparty.herokuapp.com/</a>.

Starting date: July 7th 2021. <br>
Due date: July 19th 2021.

<img src="img/trelloScreen.png" width="1000">


## Instructions 🔧

The first step is to clone the repository and install the project dependencies in your local repository.

### `composer install`

Create the .env file and fill it with the values ​​from your database.

##### `DB_CONNECTION=mysql`
##### `DB_HOST=127.0.0.1`
##### `DB_PORT=3306`
##### `DB_DATABASE=laravel`
##### `DB_USERNAME=root`
##### `DB_PASSWORD=password`

Migrate the models to the database

### `php artisan migrate`

### `php artisan passport:install`

Run the server.

### `php artisan serve`

Finally, enter the endpoints petitions in Postman and send them.

<a href="https://www.postman.com/"><img src="img/runpostman.png" width="150"></a>

## Endpoints

- Register
   - POST /api/register --> Register a new user and returns a token.

- Login
   - POST /api/login --> Login a created user and returns a token.

- User
   - GET /api/users --> Shows all the users. (Only allowed user with id=1)
   - GET /api/users/profile --> Shows one user by id. 
   - PUT /api/users/{ID} --> Updates user's information by id.
   - DELETE /api/users/{ID} --> Deletes a user by id.

- Party
   - POST /api/parties --> Creates a new party. 
   - GET /api/parties --> Shows all the parties. 
   - GET /api/parties/name/{NAME} --> Shows one party by title.
   - GET /api/parties/game/{GAME_NAME} --> Shows one party by game name.
   - GET /api/parties/{ID} --> Shows one party by id. 
   - PUT /api/parties/{ID} --> Updates party's information by id.
   - DELETE /api/parties/{ID} --> Deletes a party by id. (Only allowed user with id=1)

-  Party_Users
   - POST /api/partyuser --> One user enters into a party.
   - GET /api/partyuser --> Shows all the party_users. (Only allowed user with id=1)
   - GET /api/partyuser/user --> Shows party_user by user.
   - GET /api/partyuser/party --> Shows party_user by party.   
   - DELETE /api/partyuser/delete --> One user leaves a party.

- Games
   - POST /api/games --> Creates a new game. (Only allowed user with id=1)
   - GET /api/games --> Shows all the games. 
   - GET /api/games/title/{TITLE} --> Shows one game by title.
   - GET /api/games/{ID} --> Shows one game by id. (Only allowed user with id=1)
   - PUT /api/games/{ID} --> Updates game's information by id. (Only allowed user with id=1)
   - DELETE /api/games/{ID} --> Deletes a game by id. (Only allowed user with id=1)

-  Messages
   - POST /api/messages --> Creates a new message. 
   - GET /api/messages --> Shows all the messages. (Only allowed user with id=1)
   - GET /api/messages/{USER_ID} --> Shows messages by user. (Only allowed user with id=1)
   - GET /api/messages/party/{PARTY_ID} --> Shows messages by party.
   - DELETE /api/messages/delete/{ID} --> Deletes a message by id. 



## Models relation

<img src="img/diagrama.png" width="1500">


## Used technologies

<img src="img/php.png" width="70"> <img src="img/laravel.png" width="60"> <img src="img/composer.png" width="45"> <img src="img/sql.png" width="60"> <img src="img/postman.png" width="50"> <img src="img/trello.png" width="50">

Installed dependencies: PASSPORT/LARAVEL 

## Developer ✍️

[Adriana Fayos](https://github.com/AdrianaFayos)

---