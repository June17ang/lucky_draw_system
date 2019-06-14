Simple: Lucky Draw System
=================
System 3 interface portal:
- Admin Portal
- Member Portal
- Visitor View Webpage

Admin Portal Feature:
---------
- Login feature [email: admin@admin.com; password: password]
    #redirect to draw number for prize
- Click to draw different prize winner
    * Grand Prize - 1 winner [Member with most number of winning number]
    * Second Prize - 2 winners [random pick]
    * Third Prize - 3 winners [random pick]

~ All lucky number are unique per Users
~ Each user can only win one prize

Member Portal Feature:
----------
- Login Feature: [email: member@member.com, password: password]
    #redirect to generate number
- Member can click to generate new winning numbers
- Member unable to generate number after admin started to draw prize.
- show own numbers
- show winner result
- Member who in the winner list will highlight in list.

Visitor Webpage:
-----------
- Login button
- Winner Result

Setup:
-------
1. Git clone this repo to local folder
2. Open terminal or command prompt then cd to target folder
3. Run ```php artisan key:generate ``` 
4. Open .env file to configure to your local env
5. Run ```composer install```
6. Run ```npm install```
7. Run ```php artisan config:cache``` **For test env
8. Run ```php artisan migrate:refresh --seed```
--to migrate data to database for testing.
9. Play around..

Project Implementation Duration: around 5 to 6 hours