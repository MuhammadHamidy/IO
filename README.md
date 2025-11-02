
# International Office Website - Universitas Pertamina  

Welcome to the repository for the **International Office Website** of Universitas Pertamina! This website is developed using the Laravel framework and serves as a hub for international collaboration, student exchange programs, and global engagement activities.

---

## Features  

- **Admissions**: Includes information for both inbound and outbound students interested in applying.  
- **Global Network**: Highlights partnerships and collaborations with international institutions.  
- **Programs**: Details about various academic and non-academic programs.  
- **Research**: Information on international research collaborations and opportunities.  
- **News & Updates**: Keeps students and partners updated with the latest news and international events.  
- **Contact Us**: Easy-to-use forms for inquiries and collaborations.    

---

## Tech Stack  

- **Framework**: Laravel  
- **Backend**: PHP  
- **Frontend**: Blade, Bootstrap, CSS, JavaScript  
- **Database**: PostgreSQL  

---

## Getting Started  

Follow these steps to set up the project locally and start contributing:  

### Prerequisites  

1. Install [Composer](https://getcomposer.org/).  
2. Install [Node.js](https://nodejs.org/).  
3. Install [Git](https://git-scm.com/) and [TortoiseHg](https://tortoisehg.bitbucket.io/).  

### Installation  

1. Clone the repository using Mercurial:  
   - Install TortoiseHg and set up Mercurial on your machine.  
   - Obtain the repository URL and credentials from the administrator.  
   - Clone the repository:  
      ```bash  
      hg clone https://phorge.universitaspertamina.ac.id/source/Io/  
      cd Io 
      ```  
   - You will need to authenticate using your username and password to access the repository.

2. Install dependencies:  
   ```bash  
   composer install  
   npm install  
   npm run dev  
   ```  

3. Set up the `.env` file:  
   - Duplicate `.env.example` and rename it to `.env`.  
   - Configure database credentials and other settings.  

4. Generate the application key:  
   ```bash  
   php artisan key:generate  
   ```  

5. Run migrations:  
   ```bash  
   php artisan migrate  
   ```  

6. Start the development server:  
   ```bash  
   php artisan serve  
   ```  

---

## License  

This project is licensed under the [MIT License](LICENSE).  

--- 

## Contact  

For any questions or inquiries, please reach out to:  
- **Email**: international.office@universitaspertamina.ac.id 
- **Website (Development)**: [https://international-test.universitaspertamina.ac.id/
](https://international-test.universitaspertamina.ac.id/
)  
- **Website (Live)**: [https://international.universitaspertamina.ac.id/
](https://international.universitaspertamina.ac.id/
)  

---  

*I am a temporary readme...*
# IO
