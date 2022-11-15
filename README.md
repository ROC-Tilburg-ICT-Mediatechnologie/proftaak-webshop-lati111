# De webshop (deelopdracht 3)
Proftaak-project waar je in je eentje aan werkt om je coding skills te oefenen:

>Leerdoelen (zoals in periode 1)
* Je volgt PSR-1 en PSR-12
* Je maakt gebruik van een namespace.
* Je maakt gebruik van functions.
* Je code is strictly typed en je gebruikt type hinting.
* Je zorgt voor een algemene errorhandler om errors op te vangen.
* Je zorgt ervoor dat in functies exceptions worden gemaakt wanneer nodig.
* Je werkt van scratch, dus ook geen tutorial of kopie van een ander project als start.
* Je gebruikt mysqli op een object georiënteerde manier.
* Je controleert input uit een formulier (i.v.m. security).
* Je maakt gebruik van $_SESSIONS.

>Leerdoelen (nieuw in periode 2)
* Je zet een use case diagram om in een webapp met PHP-classes
* Je kan een eenvoudig use case diagram maken
* Je maakt gebruik van private properties en private, protected of public methods
* Je kan het keyword extends toepassen om te erven van een parent class

## Inhoud project
Ontwikkelen van een webshop met winkelwagen (cart)

## Starten van de basiscode
Er is al basiscode waarin gebruik is gemaakt van het MVC-framework CodeIgniter (versie 4). Starten gaat op de volgende manier:
 * Installeer Docker
 * Open het project in PHPStorm
 * Open de Terminal in PHPStorm
 * Typ 'cd docker_webserver'
 * Typ 'docker-compose up' (dit kan even duren)
 * Open de browser en ga naar http://localhost
    
## Te ontwikkelen
Aan de hand van de tot nu toe verzamelde informatie en een eerste opzet van de webshop ga je deze voor een deel ontwikkelen!

Je werkt minimaal een use case van de koper uit en een use case van de winkelier:

Koper:
* Use case 'Opstellen boodschappenlijst':
  * Na aanklikken van het product wordt deze toegevoegd aan de winkelwagen (de cart tabel).
   Als dit product al in de cart zit dan wordt het aantal met 1 verhoogd.
  * Als een product is toegevoegd krijgt de koper een melding te zien dat het is toegevoegd en kan hij verder winkelen.  
* Use case 'Aanschaffen product':
  * Via een hyperlink kan de koper van de pagina met producten naar een pagina met de cart.
  * Op de pagina wordt direct de inhoud van de cart getoond met een afbeelding van de producten,
  het aantal, de totaalprijs per product en de totaalprijs van de hele cart.
 
* Use case 'Betalen met een waardebon':
  * De koper kan met een knop kiezen om de bestelling te doen.
  * De gegevens van de koper worden gevraagd, na controle volgt de volgende stap.
  * Er wordt om een code gevraagd van een waardebon (123431A, 76543B of 98222V). 
  Als de ingevoerde code klopt wordt op een laatste pagina bedankt voor de bestelling. 

Winkelier:
* Use case 'Toevoegen product':
  * Via een hyperlink kan de winkelier naar een login-pagina.
  * Nadat de juiste gegevens zijn ingevuld wordt de winkelier doorgeleid naar
  een pagina met producten. 
  * De winkelier kan hier producten toevoegen (eventueel ook Update/Delete).
  * Als de winkelier klaar is kan hij uitloggen en wordt de productenpagina getoond.  
    

## Planning
Maak in je github-project een project aan met als template 'Basic Kanban'.
Zet in de 'Todo' alle use cases (in detail). 
Als je gaat werken aan een use case sleep je die naar 'In progress'. En naar 'Done' als je er mee klaar bent.
Op deze manier hou je gevoel met wat er allemaal nog gebeuren moet.

## Tijd
**Let op**: Je krijgt op school 2 lesuren per week (6 weken in totaal, dus 12 lesuren, dus 9 klokuur) om hieraan te werken in de les. Dat is niet veel, het is daarom nodig om minimaal twee uur per week thuis aan deze opdracht te werken. Dan kom je op 21 klokuur. 
