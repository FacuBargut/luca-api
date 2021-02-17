Instrucciones:
-Para poder ejecutar las migraciones, hacerlo con: php artisan migrate
-Luego, ejecutar los seeder con: php artisan db:seed

Con los pasos anteriores, se crearan las tablas y los datos para rellenar las mismas.

*Nota: Mi DB, llamada Luca, la monte en un servidor LAMP, eso hay que configurarlo en el .env

Hay 3 controladores: QuestionController, SubjectController y StudentController con sus respectivos EndPoints y en ellos se pueden realizar un CRUD en cada Entidad.