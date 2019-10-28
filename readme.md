# Manual till webbtjänsten

## Mappar och filer
Mappen för projektet heter moment 5 - rest api och innehåller flera undermappar och filer. Dessa är:

- Classes. En klassmapp med olika funktioner med metoder för att kunna interagera med databasen. 
- Includes. En mapp med en config-fil som innehåller bl a inställningar till databasen och aktivering av min klassmapp.
- Node modules mapp som följer med paketet gulp. Dock finns det även en gitignore mapp som ignorerar node modules för 
tidsbesparing av diverse oändlösa filer. Med gulp-paketet skapades även en package-lock.json fil automatiskt där alla paket 
som hämtats sparas.
- webservice. En fil med php-kod för att kunna få min webbtjänst att fungera. I den inkluderas config-filen, 
och tre olika headers som t ex gör att man kan aktivera denna tjänst via en annan domän och använda samtliga metoder för GET,
POST, PUT och DELETE. Kod för att kunna konvertera till JSON-format las in och en switch method som kan byta mellan olika 
metoder för min fetch. I denna finns olika if/else satser för respektive metod, samt meddelanden för att visa om metoderna
fungerar eller ej. Ett anrop görs för json som returnerar resultatet.

## Paket och verktyg

För att kunna dela med mig av min kod och skicka till mitt repository här på github, har jag använt mig av Node.js som har ett 
pakethanteringssystem som heter npm. Jag har använt Visual studio Code (editor) för att kunna skapa mina kataloger 
med filer för mitt projekt. Installerade gulp paketetet direkt i terminalen i min editor, och när all kod var klar skickade jag 
iväg hela webbtjänst-projektet vidare till repon.

## Fil till databasen

För att komma åt databasen har jag exporterat den till en fil med denna repositorie.

## Länk till webbtjänsten

[Webbtjänst](http://studenter.miun.se/~reho0301/dt173g/moment5/webservice/webservice.php)
