# Development

## Tools Required

docker
git


## 1. Clone code

Clone the code to your local machine

```
git clone https://github.com/sukhpalsingh/readGurbaniWebApp.git
```
Change current directory to project directory

```
cd readGurbaniWebApp
```

## 2. Build container

```
docker run -p 8080:80 -d readgurbani
```

## 3. Install Dependencies

Go inside the container

```
docker-compose exec web bash
```

Change to site folder

```
cd /var/www/site
```

Install the packages

```
composer install
```

