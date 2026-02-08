# Projekt oparty na Symfony 7 z wykorzystaniem FrankenPHP oraz bazy danych PostgreSQL. Poniżej znajdziesz instrukcję, jak szybko postawić środowisko i przygotować dane.
## Uruchomienie Środowiska

### Budowanie i start kontenerów:

    docker compose up -d --build

### Instalacja zależności Composer:

    docker ps (sprawdzamy nazwę kontenera php)

    docker exec -it (nazwa_kontenera_php) bash

    composer install

### Baza Danych i Dane (Fixtures)

Wykonanie migracji:

    docker compose exec php bin/console doctrine:migrations:migrate --no-interaction

Ładowanie fixtures:

    docker compose exec php bin/console doctrine:fixtures:load --no-interaction

        Uwaga: Ta komenda czyści bazę danych przed wgraniem nowych danych.

### Testy Jednostkowe (Unit Tests)

Uruchomienie wszystkich testów:

    docker compose exec php php bin/phpunit


### Główne Ścieżki (Routing)

#### Aplikacja posiada rozdzielone trasy dla widoków oraz API:

    Strona główna: http://localhost:8081/main

    Lista artykułów: http://localhost:8081/articles

    Podgląd artykułu: http://localhost:8081/article/{id}

    Wyszukiwarka: http://localhost:8081/search?q={fraza}

    Rejestracja: http://localhost:8081/register
