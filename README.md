# 🎰 Casino Landing 🎲

### 🛠 На чем сделано
- 💚 Vue 3 
- 🎨 PrimeVue 4 (тут все компоненты из него)
- 🐘 PHP (два простых скрипта)
- 🗄 MySQL (одна табличка)
- 🎭 Vuelidate (для валидации формы)

## 📦 Как поднять

### Сначала убедись что есть:
- Node.js 
- MAMP 
- Git

### 1️⃣ Ставим проект
```bash
# Клонируем репозиторий
git clone [ссылка на твой репозиторий]

# Переходим в папку
cd casino-landing

# Ставим зависимости
npm install
```

### 2️⃣ Настраиваем базу
1. 🚀 Открываем MAMP
2. 📂 Заходим в phpMyAdmin 
3. 🗄 Создаем базу:
```sql
CREATE DATABASE CasinoLanding CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

4. 📝 Создаем таблицу:
```sql
CREATE TABLE bonuses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tg_id VARCHAR(255) NOT NULL,
    bonus_amount INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX email_idx (email),
    INDEX created_at_idx (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

### 3️⃣ Настраиваем MAMP
1. 🎯 Открываем MAMP
2. ⚙️ Preferences -> Web Server
3. 📂 Document Root - указываем на папку с проектом
4. 🚀 Перезапускаем сервер

### 4️⃣ Запускаем
```bash
npm run dev
```

## 🎨 Если захочешь что-то поменять

### Вероятности бонусов
В `get-bonus.php` есть массив `$bonuses` - там все настройки бонусов и их вероятностей. Можешь менять как хочешь, главное чтобы сумма вероятностей была 100%.

## 🐛 Если что-то пошло не так

### CORS ошибки
Если в консоли CORS:
1. Проверь заголовки в PHP файлах
2. Посмотри настройки прокси в `vite.config.js`

### Проблемы с базой
1. Проверь доступы к MySQL в `submit-bonus.php` (обычно root/root)
2. Убедись что таблица создалась с правильной кодировкой

---

### 🎉 Вроде всё!
Если что непонятно - пиши в телегу, разберемся! 🚀