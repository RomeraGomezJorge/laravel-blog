# Blogger Web App

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)



## Project Overview

This project is a Blogger Web Application designed for a single registered user who plays the dual role of both blogger and administrator. The primary purpose of this application is to facilitate the registered user in creating and publishing articles on their personal blog. Public users can access the application to read the published articles and navigate the homepage to select the articles they wish to read.

## Features

- <b>User Authentication:</b> The application allows a single user to log in, and manage their account.

- <b>Article Management:</b> The authenticated user, acting as both blogger and administrator, has full control over article management. They can create, edit, filter, sort and delete articles, ensuring fresh and up-to-date content on their blog.

- <b>Category and Tag Management:</b> The user can also manage categories and tags for their articles, simplifying content organization and enhancing visitor's content search experience

- <b>Multilanguage Support: </b> The application is equipped with multilanguage support, making it easy to adapt the user interface to different languages and regions.

## Screenshots
### Blog
![Block Section](https://i.imgur.com/LZ7IoeV.png)

### Backoffice

![Backoffice Section](https://i.imgur.com/6K7Tixx.png)<br><br>
![Backoffice Section](https://i.imgur.com/ezUrgkH.png)<br><br>
![Backoffice Section](https://i.imgur.com/XRKmUfZ.png)

## Access Credentials

### Backoffice

- **Username**: admin@example.com
- **Password**: password

# Instructions to set up the project

To get the project up and running after cloning the repository, follow these steps:


1. Start by cloning the project repository to your local machine using Git:
    ```    
   git clone https://github.com/RomeraGomezJorge/laravel-blog.git
   ```

2. Move to the directory of the project using your terminal:
    ```    
   cd laravel-blog
   ```   

3. Before you can run the application, you need to configure the environment variables. Start by renaming the .env.example file to .env: 
    ```
    mv .env.example .env
    ```
4. Download and create the container images by executing the following command to start the services using Docker Compose:
    ```
    docker-compose up
    ```
5. Once the previous command finishes execution, open another terminal in the root directory of the project and check the status of all services by using the following command:
    ```
    docker-compose ps
    ```
   If everything is correct, you should see output similar to the following (where "UP" indicates that the service is running):
    ```
    blog_app_1        docker-php-entrypoint Up 0.0.0.0:80->80/tcp,:::
    blog_db_1         docker-entrypoint.sh  Up 0.0.0.0:3304->3306/tcp
    blog_phpmyadmin_1 docker-entrypoint.sh  Up 0.0.0.0:9004->80/tcp,:
    ```
6. Access the **blog_app** container (in the example, it is named **blog_app_1**)  using the following command to enter the interactive terminal of the container:
     ```
     docker exec -it blog_app_1 /bin/bash
    ```

7. Rename **.env.example** file to **.env**
    ```
    mv .env.example .env
    ```
    
8. Install Laravel and Node.js dependencies using the following commands:
    ```
    composer install && npm install
    ```
   
9. Connect to MySQL using the following command:
    ```
    mysql -h db -P 3306 -u root -proot
   
   
    ```

10. Create the database by executing the following command in the MySQL client within the container:
    ```
    CREATE DATABASE blog;
    ```
   
11. Exit the MySQL client with the command:
    ```
    exit
    ```

12. Run Laravel migrations using the following command to set up the database structure:
     ```
     php artisan migrate:fresh --seed
     ```
   
13. Finally, to start the development server, run the following command:
     ```
     npm run dev
     ```
   

Now, the project should be configured and working correctly. Enjoy working on it!

