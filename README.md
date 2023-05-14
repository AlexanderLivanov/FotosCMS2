# FotosCMS2
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/AlexanderLivanov/FotosCMS2)
![GitHub watchers](https://img.shields.io/github/watchers/AlexanderLivanov/FotosCMS2?style=social)
![GitHub commit activity](https://img.shields.io/github/commit-activity/y/AlexanderLivanov/FotosCMS2)
[![Netlify Status](https://api.netlify.com/api/v1/badges/d0550c54-5066-4eda-b7f9-192bd5fa6555/deploy-status)](https://app.netlify.com/sites/fotos-cms/deploys)


:exclamation: Система ещё в разработке
### 1. Преимущества
- логин и пароль хранятся в формате SHA-256
- сайт не использует php, поэтому не будут работать реверс-шеллы

### 2. Установка
1. Распакуйте архив в директорию сервера
2. Проверьте, что отображается главная страница
3. Перейдите по адресу _<ваш_сайт>/setup.html_
4. Следуйте инструкциям в установщике
5. Обязятельно удалите файл _setup.html_ и папку _setup_ ❗

### 3. Возможные проблемы:
- Забыл логин/пароль. Что делать?
  Хэши логина и пароля хранятся в директории сайта по пути _/a/security/apasswd.js_. Единственный способ поменять их - изменить значения переменных:
  
  ```js
  var alogin = '<hash>';
  var apasswd_hash = '<hash>';
  ```
  поменяйте значения <hash> на свои (в формате SHA-256)
