# TYCC Website API Documentation

## Base URL
\`\`\`
https://api.tycc.or.tz/api/v1
\`\`\`

## Authentication
All API endpoints require authentication using Laravel Sanctum tokens.

### Headers
\`\`\`
Content-Type: application/json
Accept: application/json
Authorization: Bearer {token}
\`\`\`

---

## 1. PROGRAMS API

### GET /programs
Retrieve all programs with optional filtering and pagination.

**Query Parameters:**
- `page` (integer, optional): Page number for pagination
- `per_page` (integer, optional): Items per page (default: 15, max: 100)
- `category` (string, optional): Filter by program category
- `status` (string, optional): Filter by status (active, inactive, completed)
- `search` (string, optional): Search in title and description
- `sort` (string, optional): Sort field (title, created_at, participants)
- `order` (string, optional): Sort order (asc, desc)

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "title": "Youth Business Incubator",
        "description": "A comprehensive 6-month program...",
        "full_description": "Our flagship program designed to nurture...",
        "category": "Incubation",
        "duration": "6 months",
        "participants": 150,
        "icon": "lightbulb",
        "features": ["1-on-1 Mentorship", "Funding Access"],
        "requirements": ["Age 18-35", "Business Idea"],
        "next_intake": "2024-03-01",
        "location": "TYCC Innovation Hub, Dar es Salaam",
        "cost": "Free",
        "status": "active",
        "created_at": "2024-01-15T10:00:00Z",
        "updated_at": "2024-01-15T10:00:00Z"
      }
    ],
    "first_page_url": "https://api.tycc.or.tz/api/v1/programs?page=1",
    "from": 1,
    "last_page": 2,
    "last_page_url": "https://api.tycc.or.tz/api/v1/programs?page=2",
    "next_page_url": "https://api.tycc.or.tz/api/v1/programs?page=2",
    "path": "https://api.tycc.or.tz/api/v1/programs",
    "per_page": 15,
    "prev_page_url": null,
    "to": 15,
    "total": 25
  },
  "message": "Programs retrieved successfully"
}
\`\`\`

### GET /programs/{id}
Retrieve a specific program by ID.

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "id": 1,
    "title": "Youth Business Incubator",
    "description": "A comprehensive 6-month program...",
    "full_description": "Our flagship program designed to nurture...",
    "category": "Incubation",
    "duration": "6 months",
    "participants": 150,
    "icon": "lightbulb",
    "features": ["1-on-1 Mentorship", "Funding Access"],
    "requirements": ["Age 18-35", "Business Idea"],
    "next_intake": "2024-03-01",
    "location": "TYCC Innovation Hub, Dar es Salaam",
    "cost": "Free",
    "status": "active",
    "created_at": "2024-01-15T10:00:00Z",
    "updated_at": "2024-01-15T10:00:00Z"
  },
  "message": "Program retrieved successfully"
}
\`\`\`

### POST /programs
Create a new program (Admin only).

**Request Body:**
\`\`\`json
{
  "title": "New Program Title",
  "description": "Short description of the program",
  "full_description": "Detailed description of the program",
  "category": "Training",
  "duration": "3 months",
  "participants": 0,
  "icon": "laptop",
  "features": ["Feature 1", "Feature 2"],
  "requirements": ["Requirement 1", "Requirement 2"],
  "next_intake": "2024-04-01",
  "location": "TYCC Center",
  "cost": "TSh 50,000",
  "status": "active"
}
\`\`\`

### PUT /programs/{id}
Update an existing program (Admin only).

### DELETE /programs/{id}
Delete a program (Admin only).

---

## 2. NEWS & EVENTS API

### GET /news
Retrieve all news articles with optional filtering and pagination.

**Query Parameters:**
- `page` (integer, optional): Page number for pagination
- `per_page` (integer, optional): Items per page (default: 15, max: 100)
- `category` (string, optional): Filter by news category
- `status` (string, optional): Filter by status (draft, published, archived)
- `search` (string, optional): Search in title and content
- `sort` (string, optional): Sort field (title, date, created_at)
- `order` (string, optional): Sort order (asc, desc)
- `featured` (boolean, optional): Filter featured articles

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "title": "TYCC Launches New Digital Innovation Hub",
        "excerpt": "A state-of-the-art facility equipped with modern technology...",
        "content": "The Tanzania Youth Chamber of Commerce has officially launched...",
        "category": "Innovation",
        "date": "2024-01-20",
        "image": "https://api.tycc.or.tz/storage/news/image1.jpg",
        "slug": "tycc-launches-digital-innovation-hub",
        "author": "TYCC Communications Team",
        "status": "published",
        "featured": true,
        "views": 1250,
        "created_at": "2024-01-20T10:00:00Z",
        "updated_at": "2024-01-20T10:00:00Z"
      }
    ],
    "first_page_url": "https://api.tycc.or.tz/api/v1/news?page=1",
    "total": 25
  },
  "message": "News articles retrieved successfully"
}
\`\`\`

### GET /news/{slug}
Retrieve a specific news article by slug.

### GET /events
Retrieve all events with optional filtering.

**Query Parameters:**
- `upcoming` (boolean, optional): Filter upcoming events only
- `category` (string, optional): Filter by event category
- `location` (string, optional): Filter by location

**Response:**
\`\`\`json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Youth Business Summit 2024",
      "description": "Tanzania's premier youth entrepreneurship event...",
      "date": "2024-03-15",
      "end_date": "2024-03-17",
      "time": "09:00:00",
      "end_time": "18:00:00",
      "location": "Dar es Salaam Convention Centre",
      "attendees_limit": 500,
      "registered_attendees": 245,
      "price": "25000",
      "currency": "TSh",
      "category": "Summit",
      "featured": true,
      "registration_open": true,
      "registration_deadline": "2024-03-10",
      "created_at": "2024-01-10T10:00:00Z",
      "updated_at": "2024-01-10T10:00:00Z"
    }
  ],
  "message": "Events retrieved successfully"
}
\`\`\`

### POST /events/{id}/register
Register for an event.

**Request Body:**
\`\`\`json
{
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "+255123456789",
  "organization": "Tech Startup Ltd",
  "dietary_requirements": "Vegetarian",
  "special_needs": "Wheelchair access"
}
\`\`\`

---

## 3. RESOURCES API

### GET /resources
Retrieve all resources with optional filtering.

**Query Parameters:**
- `category` (string, optional): Filter by resource category
- `type` (string, optional): Filter by resource type (PDF, Excel, Video, etc.)
- `featured` (boolean, optional): Filter featured resources

**Response:**
\`\`\`json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "TYCC Constitution",
      "description": "Official constitution and governance documents...",
      "type": "PDF",
      "category": "Governance",
      "file_size": "2.5 MB",
      "file_url": "https://api.tycc.or.tz/storage/resources/constitution.pdf",
      "download_count": 1250,
      "featured": true,
      "created_at": "2024-01-01T10:00:00Z",
      "updated_at": "2024-01-01T10:00:00Z"
    }
  ],
  "message": "Resources retrieved successfully"
}
\`\`\`

### POST /resources/{id}/download
Track resource download and return download URL.

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "download_url": "https://api.tycc.or.tz/storage/resources/constitution.pdf",
    "expires_at": "2024-01-20T11:00:00Z"
  },
  "message": "Download URL generated successfully"
}
\`\`\`

### GET /webinars
Retrieve all webinars.

**Response:**
\`\`\`json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Building Resilient Businesses in Challenging Times",
      "description": "Learn strategies for building businesses...",
      "duration": "45 minutes",
      "date": "2024-01-15",
      "speaker": "Dr. Sarah Mwangi, Business Consultant",
      "video_url": "https://api.tycc.or.tz/storage/webinars/webinar1.mp4",
      "thumbnail": "https://api.tycc.or.tz/storage/webinars/thumb1.jpg",
      "views": 1200,
      "featured": true,
      "created_at": "2024-01-15T10:00:00Z"
    }
  ],
  "message": "Webinars retrieved successfully"
}
\`\`\`

---

## 4. PARTNERSHIPS API

### GET /partners
Retrieve all partners with optional filtering.

**Query Parameters:**
- `category` (string, optional): Filter by partner category
- `featured` (boolean, optional): Filter featured partners
- `status` (string, optional): Filter by status (active, inactive)

**Response:**
\`\`\`json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "African Development Bank",
      "logo": "https://api.tycc.or.tz/storage/partners/afdb-logo.png",
      "category": "Financial Institution",
      "description": "Leading development finance institution...",
      "partnership_details": "Strategic funding partner providing $2M...",
      "website": "https://afdb.org",
      "partnership_since": "2022",
      "status": "active",
      "featured": true,
      "created_at": "2022-01-01T10:00:00Z",
      "updated_at": "2024-01-01T10:00:00Z"
    }
  ],
  "message": "Partners retrieved successfully"
}
\`\`\`

### GET /partnership-opportunities
Retrieve available partnership opportunities.

**Response:**
\`\`\`json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "Program Sponsorship",
      "description": "Support specific programs and initiatives",
      "benefits": ["Brand visibility", "Impact reporting", "Networking opportunities"],
      "requirements": ["Minimum commitment", "Alignment with mission"],
      "contact_person": "partnerships@tycc.or.tz"
    }
  ],
  "message": "Partnership opportunities retrieved successfully"
}
\`\`\`

---

## 5. CONTACT API

### POST /contact
Submit a contact form message.

**Request Body:**
\`\`\`json
{
  "name": "John Doe",
  "email": "john@example.com",
  "phone": "+255123456789",
  "subject": "membership",
  "message": "I would like to learn more about TYCC membership...",
  "organization": "Tech Startup Ltd"
}
\`\`\`

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "id": 123,
    "reference_number": "TYCC-2024-001",
    "status": "new",
    "created_at": "2024-01-20T10:00:00Z"
  },
  "message": "Your message has been sent successfully. We will get back to you soon."
}
\`\`\`

### GET /contact-info
Retrieve contact information.

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "address": {
      "street": "123 Business District",
      "city": "Dar es Salaam",
      "country": "Tanzania",
      "postal_code": "P.O. Box 12345"
    },
    "phone": ["+255 123 456 789", "+255 987 654 321"],
    "email": {
      "general": "info@tycc.or.tz",
      "programs": "programs@tycc.or.tz",
      "partnerships": "partnerships@tycc.or.tz"
    },
    "office_hours": {
      "monday_friday": "8:00 AM - 5:00 PM",
      "saturday": "9:00 AM - 1:00 PM",
      "sunday": "Closed"
    },
    "social_media": {
      "facebook": "https://facebook.com/tycc",
      "twitter": "https://twitter.com/tycc",
      "instagram": "https://instagram.com/tycc",
      "linkedin": "https://linkedin.com/company/tycc"
    }
  },
  "message": "Contact information retrieved successfully"
}
\`\`\`

---

## 6. MEMBERSHIP API

### POST /join-tycc
Submit a membership application.

**Request Body:**
\`\`\`json
{
  "personal_info": {
    "first_name": "John",
    "last_name": "Doe",
    "email": "john@example.com",
    "phone": "+255123456789",
    "date_of_birth": "1995-05-15",
    "gender": "male",
    "nationality": "Tanzanian",
    "region": "Dar es Salaam",
    "district": "Kinondoni",
    "address": "123 Main Street"
  },
  "education": {
    "highest_level": "university",
    "institution": "University of Dar es Salaam",
    "field_of_study": "Computer Science",
    "graduation_year": "2020"
  },
  "business_info": {
    "has_business": true,
    "business_name": "Tech Solutions Ltd",
    "business_type": "Technology",
    "business_stage": "startup",
    "registration_status": "registered",
    "employees_count": "1-5",
    "annual_revenue": "below_10m",
    "business_description": "We develop mobile applications for small businesses..."
  },
  "interests": {
    "programs_of_interest": ["Youth Business Incubator", "Digital Skills"],
    "skills_to_develop": ["Digital Marketing", "Financial Management"],
    "mentorship_interest": "both",
    "volunteer_interest": true
  },
  "references": [
    {
      "name": "Jane Smith",
      "relationship": "Business Partner",
      "phone": "+255987654321",
      "email": "jane@example.com"
    }
  ],
  "documents": {
    "id_document": "base64_encoded_file_or_file_upload",
    "cv": "base64_encoded_file_or_file_upload",
    "business_certificate": "base64_encoded_file_or_file_upload"
  },
  "agreements": {
    "terms_and_conditions": true,
    "privacy_policy": true,
    "code_of_conduct": true,
    "newsletter_subscription": true
  }
}
\`\`\`

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "application_id": "TYCC-APP-2024-001",
    "status": "pending_review",
    "submitted_at": "2024-01-20T10:00:00Z",
    "estimated_review_time": "5-7 business days"
  },
  "message": "Your membership application has been submitted successfully. You will receive an email confirmation shortly."
}
\`\`\`

### GET /membership-status/{application_id}
Check membership application status.

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "application_id": "TYCC-APP-2024-001",
    "status": "approved",
    "member_id": "TYCC-MEM-2024-001",
    "submitted_at": "2024-01-20T10:00:00Z",
    "reviewed_at": "2024-01-25T14:30:00Z",
    "status_history": [
      {
        "status": "submitted",
        "date": "2024-01-20T10:00:00Z",
        "note": "Application submitted"
      },
      {
        "status": "under_review",
        "date": "2024-01-22T09:00:00Z",
        "note": "Application under review"
      },
      {
        "status": "approved",
        "date": "2024-01-25T14:30:00Z",
        "note": "Application approved - Welcome to TYCC!"
      }
    ]
  },
  "message": "Application status retrieved successfully"
}
\`\`\`

---

## 7. NEWSLETTER API

### POST /newsletter/subscribe
Subscribe to newsletter.

**Request Body:**
\`\`\`json
{
  "email": "john@example.com",
  "name": "John Doe",
  "interests": ["programs", "events", "news"],
  "frequency": "weekly"
}
\`\`\`

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "subscription_id": "TYCC-SUB-2024-001",
    "status": "active",
    "subscribed_at": "2024-01-20T10:00:00Z"
  },
  "message": "Successfully subscribed to newsletter"
}
\`\`\`

### POST /newsletter/unsubscribe
Unsubscribe from newsletter.

**Request Body:**
\`\`\`json
{
  "email": "john@example.com",
  "reason": "too_frequent"
}
\`\`\`

---

## 8. STATISTICS API

### GET /statistics
Retrieve public statistics for the website.

**Response:**
\`\`\`json
{
  "success": true,
  "data": {
    "members": {
      "total": 1000,
      "new_this_month": 45,
      "active": 850
    },
    "programs": {
      "total": 5,
      "active": 5,
      "participants_total": 1200
    },
    "events": {
      "total_hosted": 30,
      "upcoming": 5,
      "total_attendees": 5000
    },
    "partners": {
      "total": 50,
      "active": 45,
      "categories": {
        "Financial Institution": 8,
        "International Organization": 12,
        "Corporate": 25,
        "Academic": 5
      }
    }
  },
  "message": "Statistics retrieved successfully"
}
\`\`\`

---

## Error Responses

All endpoints return consistent error responses:

\`\`\`json
{
  "success": false,
  "message": "Error description",
  "errors": {
    "field_name": ["Validation error message"]
  },
  "error_code": "VALIDATION_ERROR"
}
\`\`\`

### HTTP Status Codes
- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `500` - Internal Server Error

---

## Rate Limiting
- Public endpoints: 60 requests per minute
- Authenticated endpoints: 100 requests per minute
- File upload endpoints: 10 requests per minute

## File Upload Guidelines
- Maximum file size: 10MB
- Supported formats: PDF, DOC, DOCX, JPG, PNG, GIF
- Files are stored securely and scanned for malware
- Temporary URLs expire after 1 hour for security

## Pagination
All list endpoints support pagination with the following parameters:
- `page`: Page number (default: 1)
- `per_page`: Items per page (default: 15, max: 100)

## Search and Filtering
Most endpoints support search and filtering:
- `search`: Full-text search across relevant fields
- `sort`: Sort by field name
- `order`: Sort order (asc/desc)
- Category-specific filters as documented per endpoint
