
При обращение к сайту из index.php запускается феуция класса route & loader
класс route подгружает определенный контроллер из папки /controller 
так же он содержит массив всех адрессов сайти с контроллерами и вьюшками
loader  в свою очередь после подгузки контроллера собирает страницу из header'a footer'a & main'a
header & footer грузится стандартно для админки и всего остального
main он подгружает из адреса массива $main_route->action

файл htaccess позволяет перекидывть все обращения к файлу на index.php

основным стиллиризатором используется bootstap для ускорения и упращения верстки

строка $loader->render($route->get_route()) в index.php какраз запускает router &  loader в следсвии чего отдает готовую страницу клиенту

в папки template содержатся страницы сайта основного и admin'a при необходимости добавить страницу мы добавляем документ в папку и 
в классе роутера дописываем массив $main_route где должен находится название контроллера и путь к html файлу тем самым мы обеспечиваем загружку контроллера и только потом html документа 

папка helpers содержит php файлы которые помогают в ajax запросах


!!!!!!!!!!!!!!!!!!!!!!!!!!!!!бля удалить потом эту строку
по поводу бд
у нас должна быть целая карточка номера набодоби 1с-битрикс куда мы будим вводить информацию о номере
свободны-хуедны описание превьюшка галлерея второе описание под то что там находится скидка под горящие

поиск по дате бронирование 

бляяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяяя ну нахуй заново придумывать то Wordpress было бы заебись
в админку лепим 
-в обработке
-забранированно
-свободно
КОРОЧЕ СТАТУС НОМЕРОВ + ЗАКАЗЫ
-сколько прирост в деньгах ща месяц день год(а как считать?? вопрос админ будет вводить данные ну типа по другому никак или
добавить рплатой картой и так хуярить, а как тогда быть с тем что оплаченно непосредственно на ресепшене?)

!!!!!!!!!!!!!!!!!!DELETE 
-добавить фильтр в поиск типы видов номерев там одноместный вся хуйня
-3d просмотр комнат ~ не обезятельно!!

------------------------------------------------------------------------------
визитка сайта с бронирование номера
-в админке полный CRUD (CRAED, READ, UPDATE, DELETE )
--просмотр и одобрение заявок
--календарь заявок
--комнаты
