# TYCC Admin Panel

This Laravel application includes a Filament admin panel for managing all data.

## Accessing the Admin Panel

1. Start your Laravel development server:
   ```bash
   php artisan serve
   ```

2. Navigate to the admin panel:
   ```
   http://127.0.0.1:8000/admin
   ```

3. Login with these credentials:
   - **Email:** admin@tycc.or.tz
   - **Password:** password

## Available Resources

The admin panel includes the following resources for data management:

### Programs
- Create, edit, and delete programs
- Manage program categories, duration, location, and pricing
- Set featured programs and status

### News
- Manage news articles with rich text editor
- Upload images for news articles
- Set categories, tags, and featured status

### Events
- Create and manage events with date/time scheduling
- Handle registration settings and attendee limits
- Manage event categories and status

### Resources
- Upload and manage downloadable resources
- Set resource categories and descriptions

### Webinars
- Manage webinar scheduling and content
- Handle registration and participant limits

### Partners
- Manage partner information and logos
- Set partner categories and status

### Partnership Opportunities
- Create and manage partnership opportunities
- Set requirements and application deadlines

### Contact Messages
- View and manage contact form submissions
- Update contact information

### Membership Applications
- Review and manage membership applications
- Track application status

### Newsletter Subscriptions
- Manage newsletter subscriber list
- Handle subscription/unsubscription

### Testimonials
- Create and manage customer testimonials
- Set featured testimonials

## Features

- **Dashboard:** Overview statistics for all entities
- **Rich Text Editor:** For content management
- **File Upload:** For images and documents
- **Search & Filter:** Advanced filtering and search capabilities
- **Bulk Actions:** Perform actions on multiple records
- **Responsive Design:** Works on desktop and mobile devices

## Security

- Admin panel is protected by authentication
- All actions are logged
- CSRF protection enabled
- Session-based authentication

## Customization

You can customize the admin panel by:
- Modifying resource files in `app/Filament/Resources/`
- Adding custom widgets in `app/Filament/Widgets/`
- Customizing the theme in `app/Providers/Filament/AdminPanelProvider.php` 