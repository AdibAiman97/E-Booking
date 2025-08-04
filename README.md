# HAKIEMI'S E-BOOKING CAT HOTEL

A web-based application for managing a cat hotel. It provides a platform for cat owners to book accommodations for their pets and for administrators to manage bookings, users, and feedback.

# 1) Key Features

*   **Dual User Roles:** The system supports two main roles with distinct permissions:
    *   **Admin:** Has full control over the system, including managing users, vehicle categories (room types), and individual vehicle entries (rooms). They can also approve or cancel bookings and manage user feedback.
    *   **User/Customer:** Can register, log in, manage their profile, book rooms for their cats, view their booking history, and provide feedback.
*   **Booking Management:** A complete booking lifecycle is supported, from checking availability to booking, and admin approval.
*   **Profile Management:** Users can update their personal and cat's profile information.
*   **Feedback System:** Customers can submit feedback, which administrators can then review, approve, and publish on the site.
*   **Admin Dashboard:** A comprehensive dashboard for administrators to get an overview of the system and manage all its components.

# 2) Technology Stack

*   **Backend:** PHP
*   **Frontend:** HTML, CSS, JavaScript, jQuery, Bootstrap
*   **Database:** MySQL / MariaDB (SQL dump provided in the `DATABASE FILE` directory)

# 3) Project Structure

The application is organized into role-based modules and shared components:

*   `/admin`: Contains the administrator's dashboard, management pages, and backend logic.
*   `/usr`: The customer-facing portal for registration, login, booking, and profile management.
*   `/vendor`: Contains shared frontend libraries and assets like Bootstrap, jQuery, and FontAwesome.
*   `/DATABASE FILE`: Contains the `hotel_booking.sql` file to set up the database schema and initial data.
*   **Root Files:** Includes the main landing page (`index.php`), informational pages (`about.php`, `services.php`), and the main entry point for user login.

# 4) Project Preview

**Homepage**
<img width="800" height="600" alt="image" src="https://github.com/user-attachments/assets/65ccc104-f06a-4078-9442-432af673543b" />
<br>
**Admin Page**
<img width="800" height="600" alt="image" src="https://github.com/user-attachments/assets/3d15551b-d237-455b-a10f-8ad6fe3327c6" />
<br>
<img width="800" height="600" alt="image" src="https://github.com/user-attachments/assets/8271bd42-11db-4eb8-b512-51185b5b573c" />
<br>
<img width="800" height="600" alt="image" src="https://github.com/user-attachments/assets/994fb25a-8e2f-4fff-99be-1462a8ab67ca" />
<br>
**Customer Page**
<img width="800" height="600" alt="image" src="https://github.com/user-attachments/assets/8a75788a-2aeb-4b9b-bfaf-1a6149c7e0ba" />
<br>
<img width="800" height="600" alt="image" src="https://github.com/user-attachments/assets/a5078552-39b4-41f7-8c78-ed18aa1105be" />
<br>
<img width="1919" height="1078" alt="image" src="https://github.com/user-attachments/assets/81927c87-25b7-4f72-9132-090a9a97bd04" />

