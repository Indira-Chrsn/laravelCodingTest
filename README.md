# README
## How to Run Project
1. download file . zip and then extract
2. in project folder, open cmd
3. run composer install
4. search for .env.example file and rename it to .env
5. run php artisan key:generate
6. run php artisan storage:link
7. in .env file, change the database name
8. run php artisan migrate
9. run php artisan serve
10. go to *address*.books

## Application User Manual
1. when changing the num of books to show, you need to click the submit button to make change
2. search keyword is either the book's title or author
3. there are two hyperlinks, 1 is to go to top 10 author page and the other one is to vote

   *please note that only 100 data will be shown in the voting page's drop down list because of device limitation.
