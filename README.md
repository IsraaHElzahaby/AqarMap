# AqarMap
This is blog system is built by (symfony and vuejs)
1- Download The project from "master" branch
2- You can find comprised folders "vue-pages" and"vendor" uncomprise it
3- Go to your phpadmin , create new database called "blog_1_0" and  import file "blog_1_0" in it
4- You can find sql link , You have to edit it by your php myadmin username and password
  DATABASE_URL="mysql://user_name:pasword@127.0.0.1:3306/blog_1_0?serverVersion=5.7"
5-Open the commend line in the project to run the APIS by this command  "php -S 127.0.0.1:8000 -t public" 
  If you want to run apis in another port or domain please follow these steps
      -open vue-pages folder
      - you can find config.js file change "apiUrl" value to the wanted domain 
6-Open new command linr in this folder "vue-pages folder" and run this command "npm run serve"
7-To open the project on web go to this link "http://localhost:8080/"
8- You can find some of test cases in "src/Tests/Controller/Api"
