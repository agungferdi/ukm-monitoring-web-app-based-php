<img width="833" alt="Screenshot 2025-03-20 at 04 19 27" src="https://github.com/user-attachments/assets/6cae6297-5e2a-4c65-bca1-f968bd53e17c" /># UKM Monitoring Web Application

## Overview
A web-based financial monitoring application for MSMEs (Micro, Small, and Medium Enterprises). This system facilitates cash flow monitoring for MSMEs in Probolinggo City, helping them track their financial positions and improve business management.

## Purpose
This application was developed to design and build a web-based system that simplifies cash position monitoring for MSMEs. The goal is to help these enterprises transition from being aid recipients (mustahik) to becoming financially independent contributors (muzaki).

##documentations

![Uploading Screenshot 2025-03-20 at 04.19<img width="1300" alt="Screenshot 2025-03-20 at 04 17 27" src="https://github.com/user-attachments/assets/189f4d0c-7f55-4c8c-af19-ab596102ef5b" />
<img width="1032" alt="Screenshot 2025-03-20 at 04 18 18" src="https://github.com/user-attachments/assets/6f60bb48-4c63-4b21-81ca-4e9bbc8457c9" />
<img width="1032" alt="Screenshot 2025-03-20 at 04 18 27" src="https://github.com/user-attachments/assets/37a980df-34db-470e-830e-331d5bb80c8c" />
<img width="1004" alt="Screenshot 2025-03-20 at 04 18 41" src="https://github.com/user-attachments/assets/13bfc522-df24-486f-9eae-1a7d2dcce095" />
<img width="875" alt="Screenshot 2025-03-20 at 04 18 52" src="https://github.com/user-attachments/assets/27cfcdb1-2ab9-4b87-bd81-8c31e6a7819f" />
<img width="846" alt="Screenshot 2025-03-20 at 04 19 02" src="https://github.com/user-attachments/assets/6049f285-22c0-4f81-a341-95e094ea46dc" />
<img width="844" alt="Screenshot 2025-03-20 at 04 19 13" src="https://github.com/user-attachments/assets/6b1fb3bf-7556-41fc-aaf1-911b5fc4d3ee" />
.27.png…]()

## Scope
### Area
Research was conducted in Probolinggo City, focusing on the needs of micro, small, and medium enterprises.

### Research Focus
- Business development programs
- Various business fields of participating MSMEs
- Financial management challenges for small businesses
- Post-funding monitoring procedures

### Technology Stack
- **Backend:** PHP, CodeIgniter
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Database:** MySQL

## Research Methodology
### Data Collection Methods
1. **Interviews:** Conducted with stakeholders and MSME owners
2. **Observation:** Direct observation of business operations
3. **Literature Review:** Information gathered from articles, books, journals, and web resources related to MSMEs and cash management systems

### Development Methodology
The project follows the Waterfall development methodology with these phases:
1. **Requirements:** Problem analysis and user expectation gathering
2. **Design:** System design development
3. **Implementation:** Development of system units and functionality testing
4. **Integration & Testing:** Module integration and testing
5. **Operation & Maintenance:** System deployment and maintenance

## Features
- User authentication and role-based access control
- Financial transaction management (income and expenses)
- Cash flow monitoring and visualization
- Financial reporting and analytics
- MSME profile management
- Performance tracking over time

## Installation and Setup
1. Clone the repository:
   ```
   git clone https://github.com/agungferdi/ukm-monitoring-web-app-based-php.git
   ```
2. Configure your web server to point to the project directory
3. Import the database schema from the provided SQL file
4. Configure the database connection in database.php
5. Access the application through your web browser

## Requirements
- PHP 7.3 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)

## Installation Steps

### 1. Clone the Repository
```bash
git clone https://github.com/agungferdi/ukm-monitoring-web-app-based-php.git
cd ukm-monitoring-web-app-based-php
```

### 2. Database Setup
1. Create a new MySQL database for the application
2. Import the database schema:
   ```bash
   mysql -u your_username -p your_database_name < database/db_monitoring.sql
   ```

### 3. Configuration
1. Open the database.php file and update your database connection settings:
   ```php
   $db['default'] = array(
       'dsn'   => '',
       'hostname' => 'localhost',
       'username' => 'your_db_username',
       'password' => 'your_db_password',
       'database' => 'your_database_name',
       'dbdriver' => 'mysqli',
       // ...other settings...
   );
   ```

2. Configure base URL in config.php:
   ```php
   $config['base_url'] = 'http://localhost/monitoring/';
   ```

### 4. Application Permissions
Make sure these directories are writable by your web server:
```bash
chmod -R 755 application/cache
chmod -R 755 application/logs
```

### 5. Web Server Configuration

#### For Apache
Make sure mod_rewrite is enabled and use the included .htaccess file.

#### For Nginx
Create a server block configuration:
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/ukm-monitoring;
    
    index index.php index.html;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }
}
```

### 6. Dependencies (Optional)
If using Composer:
```bash
composer install
```

### 7. Access the Application
Open your browser and navigate to your configured domain or `http://localhost/monitoring/`

## Default Login
- Email: admin@admin.com
- Password: password

## Troubleshooting
- If you encounter a "No input file specified" error, check your .htaccess configuration
- For database connection issues, verify credentials in the database.php file
- If sessions aren't working, ensure the application/cache directory is writable

## Project Structure
The application follows the CodeIgniter MVC framework structure:
- controllers - Application controllers
- models - Database models
- views - UI templates and views
- assets - CSS, JavaScript, and image files

## Screenshots
(You can add screenshots of your application here)

## Contributors
- Ferdiansyah Muhammad Agung

## License
This project is licensed under the MIT License

Similar code found with 2 license types
