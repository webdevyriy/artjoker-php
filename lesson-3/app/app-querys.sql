# Посчитать сколько пользователей живет в каждой стране и каждом городе
SELECT COUNT(users.id) AS count_users,
       cities.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
GROUP BY city_id;

# Вывести список стран по возрастанию количества пользователей в стране. (Аналогично сделать для городов)
SELECT COUNT(users.id) AS count_users,
       cities.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
GROUP BY city_id
ORDER BY count_users;

/* ##########################################*/

SELECT COUNT(users.id) AS count_users_in_country, countries.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
GROUP BY countries.id;

-- Вывести список стран по возрастанию количества пользователей в стране. (Аналогично сделать для городов)

SELECT COUNT(users.id) AS count_users_in_country, countries.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
GROUP BY countries.id
ORDER BY count_users_in_country;

/* ##########################################*/

SELECT cities.name, COUNT(*)
from users
         JOIN cities ON users.city_id = cities.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE DATE(authorizatiONs.data) > DATE_SUB('2021-09-14 20:30:00', INTERVAL 3 DAY)
GROUP BY cities.name;

/* ##########################################*/

SELECT COUNT(users.id) AS count_users_in_country, countries.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE DATE(authorizatiONs.data) > DATE_SUB('2021-09-14 20:30:00', INTERVAL 3 DAY)
GROUP BY countries.id
ORDER BY count_users_in_country DESC;

#  Найти ту страну с которого максимальное количество авторизаций за (все время)
SELECT COUNT(users.id) AS count_users_in_country, countries.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
GROUP BY countries.id
ORDER BY count_users_in_country DESC
LIMIT 1;

#  Найти ту страну  с которого максимальное количество авторизаций за (за последние три дня)
SELECT COUNT(users.id) AS count_users_in_country, countries.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE DATE(authorizatiONs.data) > DATE_SUB('2021-09-14 20:30:00', INTERVAL 3 DAY)
GROUP BY countries.id
ORDER BY count_users_in_country DESC;

#  Найти ту страну  с которого максимальное количество авторизаций за (за последний месяц)
SELECT COUNT(users.id) AS count_users_in_country, countries.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE DATE(authorizatiONs.data) > MONTH(NOW())
GROUP BY countries.id
ORDER BY count_users_in_country DESC;

#  Найти ту страну  с которого максимальное количество авторизаций за (за последний квартал)
SELECT COUNT(users.id) AS count_users_in_country, countries.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE DATE(authorizatiONs.data) > now() - interval 3 mONth
GROUP BY countries.id
ORDER BY count_users_in_country DESC;


#  Найти ту страну  с которого максимальное количество авторизаций за (за последний год)
SELECT COUNT(users.id) AS count_users_in_country, countries.name
FROM users
         LEFT JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE DATE(authorizatiONs.data) > now() - interval 1 YEAR
GROUP BY countries.id
ORDER BY count_users_in_country DESC;

#  Найти тот город с которого максимальное количество авторизаций за (все время)
SELECT cities.name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
GROUP BY cities.name
ORDER BY count DESC;

# Посчитать сколько проживает пользователей по ролям в каждом городе
SELECT cities.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
WHERE roles.id = 2
GROUP BY cities.name
ORDER BY count DESC;

# Посчитать сколько проживает пользователей по ролям в каждом каждой стране

SELECT countries.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
WHERE roles.id = 3
GROUP BY countries.name
ORDER BY count DESC;


# Посчитать сколько раз заходили пользователи с ролью админ за последний месяц в разрезе каждой страны
SELECT countries.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
WHERE roles.id = 1
  AND DATE(authorizatiONs.data) > MONTH(NOW())
GROUP BY countries.name
ORDER BY count DESC;

# Посчитать сколько раз заходили пользователи с ролью админ за последний месяц в разрезе каждого города
SELECT cities.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE roles.id = 1
  AND DATE(authorizatiONs.data) > MONTH(NOW())
GROUP BY cities.name
ORDER BY count DESC;

# Найти всех пользователей у которых нет ни одной роли
SELECT *
FROM users
WHERE id NOT IN (SELECT user_id FROM roles_users);

# Посчитать сколько проживает в каждой стране и в каждом городе пользователей по всем существующим ролям

SELECT cities.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE roles.id = 1
GROUP BY cities.name
ORDER BY count DESC;

SELECT cities.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE roles.id = 2
GROUP BY cities.name
ORDER BY count DESC;

/* ##########################################*/

SELECT cities.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
WHERE roles.id = 3
GROUP BY cities.name
ORDER BY count DESC;

/* ##########################################*/

SELECT countries.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
WHERE roles.id = 1
GROUP BY countries.name
ORDER BY count DESC;

/* ##########################################*/

SELECT countries.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
WHERE roles.id = 2
GROUP BY countries.name
ORDER BY count DESC;

/* ##########################################*/

SELECT countries.name AS city_name, roles.name AS role_name, COUNT(users.id) AS count
from users
         JOIN cities ON users.city_id = cities.id
         JOIN authorizatiONs ON users.id = authorizatiONs.user_id
         LEFT JOIN countries ON cities.country_id = countries.id
         JOIN roles_users ON users.id = roles_users.user_id
         JOIN roles ON roles_users.role_id = roles.id
WHERE roles.id = 3
GROUP BY countries.name
ORDER BY count DESC;