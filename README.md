# symfony-recruitment

### uruchomienie szkieletu aplikacji:
  - sklonuj repozytorium używając poleceń git,
  - uruchom dockera,
  - aplikacja będzie dostępna pod adresem http://localhost:80,
  - w celu instalacji vendorów wejdź do dokera poleceniem:
    - docker exec -it symfony-recruitment_symfony_1 /bin/bash,
  - zainstaluj zależności composerem,
  - aplikacja musi być napisana w dostarczonym frameworku symfony,
  - dane dostępowe do bazy danych są zdefiniowane w .env.  
  - czyszczenie cache (o ile potrzebne) w osobnej konsoli, użyj poleceń:
    - docker exec -it symfony-recruitment_redis_1 /bin/bash
    - redis-cli
    - flushall
  
### oddanie gotowej aplikacji:
  - korzystając z poleceń git zrób pull-request do repozytorium. 
  - Używaj języka angielskiego :)

## aplikacja powinna posiadać następujące funkcjonalności:
- dodawanie kategorii produktu (category),
- dodawanie produktu wraz z kategorią (product),
- zwrot listy produktów wraz z przypisaną kategorią.

## aplikacja powinna zawierać: 
- możliwość dodawania kategorii produktu do bazy danych, np. sztućce, 
- możliwość dodawania produktu do bazy danych, np. widelec,
- możliwość odczytania, z bazy danych, produktów z przypisaną kategorią,
- walidację poprawności wprowadzanych danych - wraz z komunikatami błędów.
- wyżej wymienione funkcjonalności powinny być obsługiwane przez endpointy REST API (products, categories).

### dodatkowo, jeżeli uznasz za konieczne, zaimplementuj formularze:
- z możliwością dodawania produktu,
- z możliwością  dodawania kategorii,
- wyświetlanie listy produktów z przypisanymi kategoriami,
- w przypadku błednej walidacji pól formularza: name, symbol - powinien pojawić się komunikat błędu.

## struktura bazy danych:

### tabela kategorie (category)
- kolumny: "name"

### tabela produkt (product)
  -kolumny: "name", "category", "symbol".

## założenia do bazy danych:
- jeden produkt w jednej kategorii
- nazwy produktów i karegorii muszą mieć minimum 5 a max 20 znaków i muszą być unikalne
- pole kod produktu musi składać się z wielkiej litery od A do J oraz z trzech cyfr np. od A000 do J999
- pole kod produktu musi być unikalne

## dodatkowe uwagi:
  - szacujemy czas wykonania zadania na 2 godziny, ale dopuszczamy lekkie opóźnienie w uzasadnionych przypadkach ;)
  - dobór dodatkowych bundli, o ile potrzebne, pozostawiamy Tobie.

## POWODZENIA!
