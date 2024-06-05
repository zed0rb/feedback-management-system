# Feedback Management System

Welcome to the Feedback Management System! This application allows administrators to manage feedback submissions from users. This README will guide you through setting up the project, its key technologies, and how to interact with the application.

## Table of Contents

1. [Project Overview](#project-overview)
2. [Setup Instructions](#setup-instructions)
3. [Key Technologies](#key-technologies)
4. [Interacting with the Application](#interacting-with-the-application)

## Project Overview

The Feedback Management System is a web application built with PHP and MySQL. It consists of two main components:

1. **Admin Panel**: Allows administrators to view, delete, and mark feedback submissions as read.
2. **User Feedback Form**: Enables users to submit feedback, which is then stored in the database.

## Setup Instructions

To set up the Feedback Management System on your local machine, follow these steps:

### Prerequisites

- [Docker](https://www.docker.com/) installed on your machine.

### Instructions

1. **Clone the Repository**:

    ```
    git clone <repository-url>
    ```

2. **Navigate to the Project Directory**:

    ```
    cd feedback-management-system
    ```

3. **Build and Run Docker Containers**:

    ```
    docker-compose up --build
    ```

4. **Access the Application**:

    - Admin Panel: Visit `http://localhost:8080/admin.php` in your web browser.
    - User Feedback Form: Visit `http://localhost:8080/index.php` in your web browser.

5. **Interact with the Application**:

    - Use the admin credentials to log in to the admin panel.
    - admin credentials: username: admin, password: admin
    - Submit feedback via the user feedback form.

## Key Technologies

The Feedback Management System is built using the following key technologies:

- **PHP**: The backend scripting language used to handle server-side logic.
- **MySQL**: The relational database management system used for storing feedback submissions.
- **Docker**: Containerization technology used for easy deployment and environment consistency.
- **Bootstrap**: Frontend framework for building responsive and user-friendly web interfaces.

## Interacting with the Application

### Admin Panel

- **Login**: Access the admin panel by visiting `/admin.php` and logging in with valid credentials.
- **View Feedback**: View all feedback submissions, including their details.
- **Delete Feedback**: Delete unwanted feedback submissions from the system.
- **Mark as Read**: Mark feedback submissions as read to track which ones have been reviewed.

### User Feedback Form

- **Access**: Visit `/index.php` to access the user feedback form.
- **Submit Feedback**: Fill out the form with your name, email, and feedback text, then submit it.
- **Error Handling**: Error messages will be displayed if any validation errors occur during form submission.
