pogodynka
=========

A Symfony project created on November 17, 2016, 11:47 am.

Witajcie,
Przy pracy nad pogodynką natrafiłem na dwa problemy:

Po pierwsze kiedy zapisywałem do bazy nowe dane pogodowe a następnie w tej samej sesji próbowałem je odczytać w twigu,
dostawałem wynik sprzed wprowadzenia danych, podczas gdy w controllerze dane były aktualne.
Nie mogłem znaleźć niczego na ten temat na necie.
Skutkuje to tym, że po pierwszym wyszukiwaniu nowego miasta wysypuje się twig ( ponieważ widzi pustą tablicę z danymi )
a po ponownym wyszukaniu miasta zwracane są dane pogodowe

Druga rzecz to mapowanie pól danych json zwracanych przez zewnętrzne usługi.
Aby się do nich dostać skorzystałem z polecenia eval, co w przypadku najmniejszego błędu powoduje wysypanie się symfonii
Nie wiedziałem jak dane mapowanie validować, jedyne co mi przychodzi do głowy to zastosować wyrażenie regularne...


Cała strona opiera się na wywołaniach ajax, jeżeli włączy się wyświetlanie błędów i ostrzeżeń, strona może przestać chodzić.



Aby zobaczyć stronę stwórzcie projekt pogodynka

symfony new pogodynka

wgrajcie pliki do katalogu z projektem


Stwórzcie na localhoscie w bazie danych użytkownika symfony, z nazwą bazy danych symfony oraz hasłem symfony
( zgodnie z app/config/parameters.yml )

zaimportujcie bazę z symfony.sql


w katalogu pogodynka podajcie:
php bin/console server:start --force



aby zalogować się do panelu zarządzania
podajcie
użytkownika: Witold
oraz 
hasło: Witold@123


uruchomcie w przeglądarce http://localhost:8000/pogodynka

Zależy mi na współpracy z wami, mam nadzieję, że będziecie zadowoleni

Wiem, że mogło to zostać zrobione lepiej, ale zrobiłem na tyle na ile umiałem

Pozdrawiam :)