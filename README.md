# Budget Manager

A backend application to manage personal budgets, allowing users to track their incomes and expenses efficiently. The project follows the **MVC** (Model-View-Controller) pattern and runs locally using **XAMPP**.

## 📌 Table of Contents

- [Project Overview](#project-overview)  
- [Features](#features)  
- [Technologies Used](#technologies-used)  
- [Installation and Setup](#installation-and-setup)  

---

## 📖 Project Overview

The *Budget Manager* provides **RESTful services** for managing users, incomes, and expenses.  
It works alongside a frontend interface where users can visualize their financial data, generate reports, and analyze expenses.

---

## ✨ Features

- 🔒 **User authentication & session management**  
- 📊 **Track incomes and expenses** (categorized)  
- 📆 **Monthly and yearly financial summaries**  
- 📅 **Custom date range reporting**  

---

## 🛠 Technologies Used

- **PHP (with MVC pattern)** – Core backend logic  
- **MySQL** – Database for user and financial data  
- **Apache Server** – Provided by XAMPP for local hosting  
- **JavaScript** – Used for frontend interactivity (when applicable)  

---

## 🚀 Installation and Setup

To run this project locally, follow these steps:

1. **Install XAMPP**:  
   - Download XAMPP from [Apache Friends](https://www.apachefriends.org/index.html).  
   - Install and start **Apache** and **MySQL**.

2. **Set Up the Database** 
   - Open **phpMyAdmin** ([http://localhost/phpmyadmin](http://localhost/phpmyadmin)).  
   - Create a database (e.g., `budget_manager`).  
   - Import `database.sql` to set up the tables.  

3. **Configure Environment Variables**:
   - Duplicate the `.env.example` file and rename it to `.env`.  
   - Open `.env` and set your database credentials:   

   ```ini
   $host = 'localhost';
   $db_user = 'root';
   $db_password = '';
   $db_name = 'budget_manager';

4. **Start Apache and MySQL**:
   - Start both **Apache** and **MySQL** from the XAMPP control panel.

5. **Access the Backend**:
   - Visit [http://localhost/budget_manager](http://localhost/budget_manager) in your browser.

6. **Author**:
- GitHub - [@SebastianJast](https://github.com/SebastianJast)
- Website - [Sebastian](https://sebastianjast.github.io/Responsive_CV/)