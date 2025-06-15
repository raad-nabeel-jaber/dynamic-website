# Stand Blog Project

This project is a blog website based on the "Stand Blog" template by TemplateMo. It has been customized to include a dynamic backend and a dashboard for content management.

## Project Structure

The project is organized as follows:

- `index.html`: The main landing page.
- `about.html`: The about us page.
- `blog.html`: The blog entries page.
- `post-details.html`: The page for a single blog post.
- `contact.html`: The contact us page.
- `assets/`: Contains all the static assets like CSS, JavaScript, images, and fonts.
- `vendor/`: Contains third-party libraries like Bootstrap and jQuery.
- `dashbord/`: Contains the backend files and dashboard interface for managing the website content.
- `task26.sql`: The SQL dump file for the project's database.

## Getting Started

To run this project locally, you will need a local server environment like XAMPP or WAMP.

### Prerequisites

- A web server (Apache is recommended)
- PHP
- MySQL or MariaDB database

### Installation

1.  **Clone the repository or download the project files.**
2.  **Place the project files** in your web server's root directory (e.g., `htdocs` for XAMPP).
3.  **Import the database:**
    -   Open your database management tool (like phpMyAdmin).
    -   Create a new database.
    -   Import the `task26.sql` file into the newly created database.
4.  **Configure the database connection:**
    -   You may need to update the database connection details in the PHP files located in the `dashbord/` directory to match your database credentials (hostname, username, password, database name).
5.  **Run the project:**
    -   Open your web browser and navigate to `http://localhost/[your-project-folder-name]/`.

## Usage

- The main website is publicly accessible.
- To manage the content, navigate to the dashboard at `http://localhost/[your-project-folder-name]/dashbord/`.

## Built With

-   HTML5
-   CSS3
-   JavaScript
-   [Bootstrap](https://getbootstrap.com/)
-   [jQuery](https://jquery.com/)
-   PHP
-   MySQL

---
