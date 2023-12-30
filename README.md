<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<!--suppress HtmlDeprecatedAttribute -->
<div align="center">
  <img src="./public/hbl.png" alt="HostBase Logo">
  <h1 align="center">HostBase</h1>
  <p align="center">
    The only Knowledge Base your hosting company needs!
    <br />
    <br />
  </p>
</div>

<!-- Preview -->
## 📸 Screenshot
![HostBase Screenshot](img.png)

### 🛠️ Built With

![Laravel](https://img.shields.io/badge/Laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-%235d60be.svg?style=for-the-badge&logo=alpine.js&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-%2365CAD4.svg?style=for-the-badge&logo=laravel&logoColor=white)

<br />

<!-- Features -->
## ✨ Features

- **TALL Stack Integration:** Utilizes the TALL stack for a modern and interactive user experience.
- **MagicKit Powered:** Built on top of the MagicKit preset.
- **Installer:** Intuitive installer available at `/installer` for easy setup and configuration.

<br />

<!-- Getting Started -->
## 🚀 Getting Started

1. Clone the repository
   ```sh
   git clone https://github.com/hostlift/hostbase.git

2. Install dependencies:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. Configure your environment variables:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

   Update `.env` with your database, email, and other configuration details.

4. Run migrations:

    ```bash
    php artisan migrate
    ```

5. Serve your application:

    ```bash
    php artisan serve
    ```

Visit [http://localhost:8000](http://localhost:8000) to access HostBase.

## Contributing

If you would like to contribute to HostBase, please follow our [Contribution Guidelines](CONTRIBUTING.md).

## License
HostBase is open-source software licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
